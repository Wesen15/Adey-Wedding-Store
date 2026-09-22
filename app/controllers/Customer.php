<?php

class customer extends Controller
{
    public function __construct()
    {
        if (!$_SESSION) {
            header('location:' . BASEURL . '/home/redirecting');
        }
    }

    public function index()
    {
        $data['equipment'] = $this->model('rental_model')->getEquipmentForCustomers();
        $this->view('templates/customer/header');
        $this->view('home/index', $data);
        $this->view('templates/customer/footer');
    }

    public function dashboard()
    {
        //echo 'Ini halaman admin';
        $this->view('templates/customer/header');
        $this->view('home/index');
        $this->view('templates/customer/footer');
    }
    public function checkout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        if (!isset($_SESSION['user_id'])) {
            Flasher::setFlash('Error', 'Please log in first.', 'danger');
            header('Location: ' . BASEURL . '/home/login');
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
    
        $data['transaction'] = $this->model('Rental_model')->getActiveTransactionsByCustomerId($customerId);
    
        if (empty($data['transaction'])) {
            Flasher::setFlash('Info', 'No transactions found.', 'info');
        }
    
        $data['equipment'] = $this->model('Rental_model')->getEquipmentForCustomers();
    
        $this->view('templates/customer/header');
        $this->view('customer/checkout', $data);
        $this->view('templates/customer/footer');
    }
    
    public function payment($id)
    {
        $data['transaction'] = $this->model('Customer_model')->payment($id);
        $data['equipment'] = $this->model('rental_model')->getEquipmentForCustomers();
    
        // Debug output
        error_log("Transaction Data: " . print_r($data['transaction'], true));
        error_log("Equipment Data: " . print_r($data['equipment'], true));
    
        $this->view('templates/customer/header');
        $this->view('customer/payment', $data);
        $this->view('templates/customer/footer');
    }
    
    public function printpayment($id)
    {
        $data['transaction'] = $this->model('Customer_model')->payments($id);
        $data['equipment'] = $this->model('rental_model')->getEquipmentForCustomers();
        $this->view('customer/printpayment', $data);
    }

    public function upload_proof()
    {
        //Inisialisasi Data picture
        $temp = $_FILES['picture']['tmp_name'];
        $name = rand(0, 9999) . $_FILES['picture']['name'];
        $size = $_FILES['picture']['size'];
        $type = $_FILES['picture']['type'];
        $folder = "photo_evidence/";
        //Melakukan pengecekan ukuran file dan format
        if ($size < 2048000 and ($type == 'image/jpeg' or $type == 'image/png' or $type == 'image/jpg')) {
            move_uploaded_file($temp, $folder . $name); //Melakukan upload ke folder/name
            //Input ke database
            if ($this->model('Customer_model')->upload_proof($_POST, $name) > 0) {    //Menambahkan ke database
                Flasher::setFlash('Proof of payment has been successfully uploaded!', ' Wait for payment confirmation a maximum of 1 x 24 hours.', 'success');
                $this->payment($_POST['rental_id']);
                exit;
            } else {
                Flasher::setFlash('Error,', ' Proof of payment failed to upload!', 'danger');
                $this->payment($_POST['rental_id']);
                exit;
            }
        } else {
            Flasher::setFlash('Error,', 'Proof of payment failed to upload!, Incorrect upload format.', 'danger'
        );
            $this->payment($_POST['rental_id']);
            exit;
        }
    }

    public function cancelOrder($rental_id)
{
    if ($this->model('Rental_model')->cancelOrder($rental_id)) {
        Flasher::setFlash('Success', 'Order canceled successfully.', 'success');
    } else {
        Flasher::setFlash('Error', 'Failed to cancel order.', 'danger');
    }
    header('Location: ' . BASEURL . '/customer/checkout');
    exit;
}

}
