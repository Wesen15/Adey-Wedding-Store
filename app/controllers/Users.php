<?php

class Users extends Controller
{
    const ROLE_ADMIN = 1;
    const ROLE_vendor = 2;
    const ROLE_CUSTOMER = 3;

    public function index()
    {
        if (!$_SESSION || $_SESSION['group_id'] == self::ROLE_CUSTOMER) {
            header('location:' . BASEURL . '/home/redirecting');
        }
    }

    public function register_customer()
    {
        $this->insertNewUser(self::ROLE_CUSTOMER, "register");
    }

    public function add_user()
    {
        $group_id = $_POST['role'];
        $this->insertNewUser($group_id, "add_user");
    }

    private function setViewData($title, $menu, $submenu, $data)
    {
        $dt['group_id'] = $_SESSION['group_id'];
        $dt['title'] = $title;
        $dt['menu'] = $menu;
        $dt['submenu'] = $submenu;
        $this->view('templates/admin/header');
        $this->view('templates/admin/sidebar', $dt);
        $this->view('admin/add_user', $data);
        $this->view('templates/admin/footer');
    }

    public function insertNewUser($group_id, $code)
    {
        $data = [
            'group_id' => $group_id,
            'username' => '',
            'password' => '',
            'confirmPassword' => '',
            'name' => '',
            'email' => '',
            'bank_name' => '',
            'account_holder_name' => '',
            'account_number' => '',
            'usernameError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'nameError' => '',
            'emailError' => '',
            'bankNameError' => '',
            'accountHolderNameError' => '',
            'accountNumberError' => ''
        ];
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
            // Populate $data array with form data
            $data = [
                'group_id' => $group_id,
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'role' => trim($_POST['role']),
                'bank_name' => isset($_POST['bank_name']) ? trim($_POST['bank_name']) : '',
                'account_holder_name' => isset($_POST['account_holder_name']) ? trim($_POST['account_holder_name']) : '',
                'account_number' => isset($_POST['account_number']) ? trim($_POST['account_number']) : '',
                'usernameError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'nameError' => '',
                'emailError' => '',
                'bankNameError' => '',
                'accountHolderNameError' => '',
                'accountNumberError' => ''
            ];
    
            // Validation and error handling (as needed)
    
            if (empty($data['usernameError']) && empty($data['passwordError']) && empty($data['confirmPasswordError']) && empty($data['nameError']) && empty($data['emailError']) && empty($data['bankNameError']) && empty($data['accountHolderNameError']) && empty($data['accountNumberError'])) {
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
                // Insert user and get the user ID
                $user_id = $this->model('User_model')->insertUser($data);
    
                // Check if the inserted user is a vendor and add vendor account details if applicable
                if ($data['role'] == '2') {
                    $vendor = $this->model('User_model')->getVendorIdByUserId($user_id);
                    $vendor_id = $vendor['vendor_id'];
    
                    $vendorData = [
                        'vendor_id' => $vendor_id,
                        'bank_name' => $data['bank_name'],
                        'account_holder_name' => $data['account_holder_name'],
                        'account_number' => $data['account_number']
                    ];
                }
    
                // Handle success message and view redirection
                // Flasher::setFlash('User added successfully', 'success');
                header('Location: ' . BASEURL . 'dashboard/vendor_data');
            } else {
                // Handle validation errors and view redirection
                $this->view('dashboard/vendor_data', $data);
            }
        } else {
            $this->view('dashboard/vendor_data', $data);
        }
    }
    

        public function login()
    {
        $data = [
            'title' => 'Login page',
            'username' => '',
            'password' => '',
            'usernameError' => '',
            'passwordError' => ''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'username' => trim($_POST['username']),
                'password' => trim($_POST['password']),
                'usernameError' => '',
                'passwordError' => '',
            ];

            if (empty($data['username'])) {
                $data['usernameError'] = 'Please enter your username.';
            }

            if (empty($data['password'])) {
                $data['passwordError'] = 'Please enter password.';
            }

            if (empty($data['usernameError']) && empty($data['passwordError'])) {
                $loggedInUser = $this->model('User_model')->login($data['username'], $data['password']);
                if ($loggedInUser) {
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordError'] = 'The password or username is incorrect. Please try again.';
                    $this->view('templates/customer/header');
                    $this->view('home/login', $data);
                    $this->view('templates/customer/footer');
                }
            }
        }

        $this->view('templates/customer/header');
        $this->view('home/login', $data);
        $this->view('templates/customer/footer');
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['group_id'] = $user->group_id;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;

        if ($_SESSION['group_id'] == self::ROLE_ADMIN || $_SESSION['group_id'] == self::ROLE_vendor) {
            header('location:' . BASEURL . '/dashboard');
        } else {
            $profileCompletion = $this->model('user_model')->getcomplete($_SESSION['user_id']);
            if (is_null($profileCompletion['id_number'])) {
                header('location:' . BASEURL . '/home/complete_profile');
            } else {
                header('location:' . BASEURL . '/customer');
            }
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('location:' . BASEURL . '/home');
    }

    public function delete_user($id)
    {
        // Ensure the user is logged in and has the appropriate permissions
        if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] != 1) {
            Flasher::setFlash_modal('Error', 'You do not have permission to access this page.', 'danger');
            header('location:' . BASEURL . '/dashboard/customer_data');
            exit;
        }

        // Get user data by ID
        $user = $this->model('User_model')->getUserById($id);

        // Check if user exists
        if (!$user) {
            Flasher::setFlash_modal('Error', 'User not found.', 'danger');
            header('location:' . BASEURL . '/users/vendor');
            exit;
        }

        // Delete user
        if ($this->model('User_model')->deleteUserData($id) > 0) {
            Flasher::setFlash_modal('Success', 'User has been successfully deleted.', 'success');
        } else {
            Flasher::setFlash_modal('Error', 'User failed to delete.', 'danger');
        }
        header('location: ' . BASEURL . '/dashboard/customer_data');
        exit;
    }
    public function delete_vendor($id)
{
    // Ensure the user is logged in and has the appropriate permissions
    if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] != 1) {
        Flasher::setFlash_modal('Error', 'You do not have permission to access this page.', 'danger');
        header('location:' . BASEURL . '/home');
        exit;
    }

    // Get vendor data by ID
    $vendor = $this->model('User_model')->getVendorById($id);

    // Check if vendor exists
    if (!$vendor) {
        Flasher::setFlash_modal('Error', 'Vendor not found.', 'danger');
        header('location:' . BASEURL . '/dashboard/vendor_data');
        exit;
    }

    // Delete vendor
    if ($this->model('User_model')->deleteVendorData($id) > 0) {
        Flasher::setFlash_modal('Success', 'Vendor has been successfully deleted.', 'success');
    } else {
        Flasher::setFlash_modal('Error', 'Vendor failed to delete.', 'danger');
    }
    header('location: ' . BASEURL . '/dashboard/vendor_data');
    exit;
}

// Handle form submission for editing an vendor
public function edit_vendor($id) {
    // Ensure the user is logged in and has the appropriate permissions
    if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] != 1) {
        Flasher::setFlash_modal('Error', 'You do not have permission to access this page.', 'danger');
        header('location:' . BASEURL . '/home');
        exit;
    }

    $data['vendor'] = $this->model('User_model')->getVendorById($id);
    $this->view('admin/edit_vendor', $data);
}

// Handle form submission for editing an vendor
public function update_vendor()
{
    if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] != 1) {
        Flasher::setFlash_modal('Error', 'You do not have permission to access this page.', 'danger');
        header('location:' . BASEURL . '/home');
        exit;
    }

    $data = [
        'user_id' => $_POST['user_id'],
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
    ];

    if (!empty($_POST['password'])) {
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    if ($this->model('User_model')->updateVendorData($data) > 0) {
        Flasher::setFlash_modal('Success', 'Vendor has been successfully updated.', 'success');
    } else {
        Flasher::setFlash_modal('Error', 'Vendor failed to update.', 'danger');
    }

    header('location: ' . BASEURL . '/dashboard/vendor_data');
    exit;
}
public function update_user()
{
    if (!isset($_SESSION['group_id']) || $_SESSION['group_id'] != 1) {
        Flasher::setFlash_modal('Error', 'You do not have permission to access this page.', 'danger');
        header('location:' . BASEURL . '/dashboard/customer_data');
        exit;
    }

    $data = [
        'user_id' => $_POST['user_id'],
        'name' => $_POST['name'],
        'username' => $_POST['username'],
        'email' => $_POST['email'],
    ];

    if (!empty($_POST['password'])) {
        $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    }

    if ($this->model('User_model')->updateUserData($data) > 0) {
        Flasher::setFlash_modal('Success', 'User has been successfully updated.', 'success');
    } else {
        Flasher::setFlash_modal('Error', 'User failed to update.', 'danger');
    }

    header('location: ' . BASEURL . '/dashboard/customer_data');
    exit;
}
public function update_profile()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'user_id' => $_SESSION['user_id'],
            'username' => trim($_POST['username']),
            'profile_picture' => $_SESSION['profile_picture'], // Default to current picture
            'bank_name' => trim($_POST['bank_name'] ?? ''),
            'account_number' => trim($_POST['account_number'] ?? ''),
            'account_holder_name' => trim($_POST['account_holder_name'] ?? ''),
        ];

        // Initialize Photo Data
        if (!empty($_FILES['profile_picture']['tmp_name'])) {
            $temp = $_FILES['profile_picture']['tmp_name'];
            $name = rand(0, 9999) . "_" . $_FILES['profile_picture']['name'];
            $size = $_FILES['profile_picture']['size'];
            $type = $_FILES['profile_picture']['type'];
            $folder = "customer_photo/";

            // Validate file size and type
            if ($size < 2048000 && in_array($type, ['image/jpeg', 'image/png', 'image/jpg'])) {
                if (move_uploaded_file($temp, $folder . $name)) { // Upload to folder
                    $data['profile_picture'] = $name; // Update profile picture name in data array
                } else {
                    $data['profile_pictureError'] = 'Failed to upload image.';
                }
            } else {
                $data['profile_pictureError'] = 'Invalid file size or type.';
            }
        }

        // Update the database
        $userModel = $this->model('User_model');
        $profileUpdated = $userModel->updateUserProfile($data);

        if ($profileUpdated) {
            // Update session variables
            $_SESSION['username'] = $data['username'];
            $_SESSION['profile_picture'] = $data['profile_picture'];

            if ($_SESSION['group_id'] == 2) {
                // Update vendor account details
                $vendorAccountUpdated = $userModel->updateVendorAccount($data);

                if ($vendorAccountUpdated) {
                    $_SESSION['bank_name'] = $data['bank_name'];
                    $_SESSION['account_number'] = $data['account_number'];
                    $_SESSION['account_holder_name'] = $data['account_holder_name'];
                }
            }

            echo json_encode(['message' => 'Profile successfully updated.', 'profile_picture' => $data['profile_picture']]);
        } else {
            echo json_encode(['message' => 'Failed to update profile.']);
        }
    } else {
        echo json_encode(['message' => 'Invalid request.']);
    }
}

public function getVendorAccountDetails()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $vendorId = trim($_POST['user_id']);

        // Fetch vendor account details
        $userModel = $this->model('User_model');
        $vendorAccount = $userModel->getVendorAccountDetails($vendorId);

        if ($vendorAccount) {
            echo json_encode(['success' => true, 'data' => $vendorAccount]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to fetch vendor account details']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request']);
    }
}

}
