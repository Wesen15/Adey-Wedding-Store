<?php

class Home extends Controller
{

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (isset($_SESSION['user_id'])) {
            $this->redirecting();
        }
    
        $data['equipment'] = $this->model('Rental_model')->getEquipmentForCustomers();
        $this->view('templates/customer/header');
        $this->view('home/index', $data);
        $this->view('templates/customer/footer');
    }

    public function landing()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        $data['equipment'] = $this->model('Rental_model')->getEquipmentForCustomers();
        $this->view('templates/customer/header');
        $this->view('home/index', $data);
        $this->view('templates/customer/footer');
    }
    
    public function redirecting()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['group_id'])) {
            if (basename($_SERVER['REQUEST_URI']) != 'home') {
                header('Location: ' . BASEURL . '/home');
                exit();
            }
        } else {
            switch ($_SESSION['group_id']) {
                case 1:
                    header('Location: ' . BASEURL . '/dashboard');
                    exit();
                case 2:
                    header('Location: ' . BASEURL . '/dashboard');
                    exit();
                case 3:
                    header('Location: ' . BASEURL . '/customer');
                    exit();
                default:
                    header('Location: ' . BASEURL . '/home');
                    exit();
            }
        }
    }
    
    public function login()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (isset($_SESSION['user_id'])) {
            $this->redirecting();
        }
    
        $data = NULL;
        $this->view('templates/customer/header');
        $this->view('home/login', $data);
        $this->view('templates/customer/footer');
    }
    
    public function register()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (isset($_SESSION['user_id'])) {
            $this->redirecting();
        }
    
        $data = NULL;
        $this->view('templates/customer/header');
        $this->view('home/register', $data);
        $this->view('templates/customer/footer');
    }
    
    public function detail($id)
    {
        $data['detail'] = $this->model('rental_model')->equipmentdetail($id);
        $data['equipment'] = $this->model('rental_model')->getEquipmentForCustomers();
        if (!empty($_SESSION['user_id'])) {
            if ($_SESSION['group_id'] == 3) {
                $data['getcomplete'] = $this->model('user_model')->getcomplete($_SESSION['user_id']);
            } else {
                $data['getcomplete'][0]['id_number'] = NULL;
            }
        } else {
            $data['getcomplete'][0]['id_number']= NULL;
        }
            $this->view('templates/customer/header');
        $this->view('home/equipmentdetail', $data);
        $this->view('templates/customer/footer');
    }

    public function rent()
    {
        if (!isset($_SESSION['user_id'])) {
            Flasher::setFlash('Error', 'Please log in first.', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    
        $userId = $_SESSION['user_id'];
        $getId = $this->model('Rental_model')->getCustomerId($userId);
    
        if (is_array($getId) && isset($getId['customer_id'])) {
            $customerId = $getId['customer_id'];
        } else {
            Flasher::setFlash('Error', 'Customer ID not found!', 'danger');
            header('Location: ' . BASEURL . '/error-page');
            exit;
        }
    
        // Retrieve the vendor_id (equipment owner)
        $equipment = $this->model('Rental_model')->getEquipmentById($_POST['equipment_id']);
        if (!$equipment || !isset($equipment['added_by'])) {
            Flasher::setFlash('Error', 'Equipment not found or vendor_id missing!', 'danger');
            header('Location: ' . BASEURL . '/error-page');
            exit;
        }
        $vendorId = $equipment['added_by'];
    
        $data = [
            'equipment_id' => $_POST['equipment_id'],
            'rental_date' => $_POST['rental_date'],
            'return_date' => $_POST['return_date'],
            'price' => $_POST['price'],
            'vendor_id' => $vendorId
        ];
    
        if ($this->model('Rental_model')->add_rent($data, $customerId) > 0) {
            $this->model('Rental_model')->updateStatus(0, $_POST['equipment_id']); // Status is not available
            Flasher::setFlash('Success', 'Equipment rented successfully! Please checkout.', 'success');
            header('Location: ' . BASEURL . '/home/detail/' . $_POST['equipment_id']);
            exit;
        } else {
            Flasher::setFlash('Error', 'Failed to rent equipment!', 'danger');
            header('Location: ' . BASEURL . '/home/detail/' . $_POST['equipment_id']);
            exit;
        }
    }
    
    public function search()
    {
        if ($_POST['equipment'] === 'choose') {
            header('location:' . BASEURL . '/home');
        }
        $this->detail($_POST['equipment']);
    }

    public function complete_profile()
{
    if (empty($_SESSION) || in_array($_SESSION['group_id'], [1, 2])) {
        $this->redirecting();
    }

    $cek = $this->model('user_model')->getcomplete($_SESSION['user_id']);
    if (!empty($cek[0]['id_number'])) {
        $this->redirecting();
    }

    $data = [
        'usernameError' => '',
        'passwordError' => '',
        'confirmPasswordError' => '',
        'addressError' => '',
        'genderError' => '',
        'phone_numberError' => '',
        'id_numberError' => '',
        'get_name' => $this->model('user_model')->getName($_SESSION['user_id'])
    ];

    $this->view('templates/customer/header');
    $this->view('home/complete_profile', $data);
    $this->view('templates/customer/footer');
}

public function complete_action()
{
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    $data = [
        'user_id' => trim($_POST['user_id']),
        'address' => trim($_POST['address']),
        'gender' => trim($_POST['gender']),
        'phone_number' => trim($_POST['phone_number']),
        'id_number' => trim($_POST['id_number']),
        'addressError' => '',
        'genderError' => '',
        'phone_numberError' => '',
        'id_numberError' => ''
    ];

    // Initialize Photo Data
    $temp = $_FILES['photo']['tmp_name'];
    $name = rand(0, 9999) . $_FILES['photo']['name'];
    $size = $_FILES['photo']['size'];
    $type = $_FILES['photo']['type'];
    $folder = "customer_photo/";

    // Validate file size and type
    if ($size < 2048000 && in_array($type, ['image/jpeg', 'image/png', 'image/jpg'])) {
        move_uploaded_file($temp, $folder . $name); // Upload to folder

        // Insert into database
        if ($this->model('User_model')->complete_profile($data, $name) > 0) {
            Flasher::setFlash_modal('Profile successfully completed.', 'Profile successfully completed!', 'success');
            header('location: ' . BASEURL . '/home');
            exit;
        } else {
            Flasher::setFlash_modal('Error!', 'Failed to complete profile!', 'danger');
            header('location: ' . BASEURL . '/home');
            exit;
        }
    } else {
        Flasher::setFlash_modal('Error!', 'Failed to complete profile! Invalid file size or type.', 'danger');
        header('location: ' . BASEURL . '/home');
        exit;
    }
}


public function equipmentList()
{
    $data['equipment'] = $this->model('Rental_model')->getEquipmentForCustomers();
    
    // Debug: Check if data is being fetched correctly
    error_log("Equipment Data: " . print_r($data['equipment'], true));

    $this->view('templates/customer/header');
    $this->view('home/equipmentlist', $data);
    $this->view('templates/customer/footer');
}


}
