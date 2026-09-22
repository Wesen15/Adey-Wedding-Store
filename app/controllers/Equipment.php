<?php

class Equipment extends Controller 
{
    public function __construct()
    {
        if (!$_SESSION) {
            header('location:' . BASEURL . '/home/redirecting');
        }
        if ($_SESSION['group_id'] == 3) { // Assuming group_id 3 is for some restricted role
            header('location:' . BASEURL . '/home/redirecting');
        }
    }
    
    public function index() 
    {
        $data['group_id'] = $_SESSION['group_id'];
        $data['title'] = "Equipment Data";
        $data['menu'] = "Equipment";
        $data['submenu'] = "Data Equipment";

        if ($_SESSION['group_id'] == 2) { // Assuming group_id 2 is for Vendor
            $data['equipment'] = $this->model('Rental_model')->getEquipmentByVendorId($_SESSION['user_id']);
        } else {
            $data['equipment'] = $this->model('Rental_model')->getAllEquipment();
        }

        $data['category'] = $this->model('Rental_model')->getAllCategory();
        $data['total_equipment'] = $this->model('Rental_model')->totalequipment();

        $this->view('templates/admin/header');
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/equipment', $data);
        $this->view('templates/admin/footer');
    }

    public function add_equipment()
    {
        $temp = $_FILES['picture']['tmp_name'];
        $name = rand(0, 9999) . $_FILES['picture']['name'];
        $size = $_FILES['picture']['size'];
        $type = $_FILES['picture']['type'];
        $folder = "equipment_photo/";

        if ($size < 2048000 && ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/jpg')) {
            move_uploaded_file($temp, $folder . $name);

            if ($this->model('Rental_model')->add_equipment($_POST, $name) > 0) {
                Flasher::setFlash_modal('Equipment data has been successfully added.', 'Equipment Data Added!', 'success');
                header('location: ' . BASEURL . '/equipment');
                exit;
            } else {
                Flasher::setFlash_modal('Error, Equipment data failed to add.', 'Equipment data failed to add!', 'danger');
                header('location: ' . BASEURL . '/equipment');
                exit;
            }
        } else {
            Flasher::setFlash_modal('Error, Equipment data failed to add.', 'Equipment data failed to add!', 'danger');
            header('location: ' . BASEURL . '/equipment');
            exit;
        }
    }

    public function detail($id)
    {
        $data['group_id'] = $_SESSION['group_id'];
        $data['title'] = "Detail Equipment";
        $data['menu'] = "Equipment";
        $data['submenu'] = "Detail Equipment";
        $data['detail'] = $this->model('Rental_model')->equipmentDetail($id);

        $this->view('templates/admin/header');
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/equipment_detail', $data);
        $this->view('templates/admin/footer');
    }

    public function delete($id)
    {
        $data = $this->model('Rental_model')->getPhotoById($id);

        if (is_file("equipment_photo/" . $data['picture'])) {
            unlink("equipment_photo/" . $data['picture']);
        }

        if ($this->model('Rental_model')->deleteEquipmentData($id) > 0) {
            Flasher::setFlash_modal('Equipment data has been successfully deleted.', 'Equipment Data Deleted!', 'success');
            header('location: ' . BASEURL . '/equipment');
            exit;
        } else {
            Flasher::setFlash_modal('Error, equipment data failed to delete.', 'Equipment data failed to delete!', 'danger');
            header('location: ' . BASEURL . '/equipment');
            exit;
        }
    }

    public function update()
    {
        $temp = $_FILES['picture']['tmp_name'];

        if ($temp) {
            $name = rand(0, 9999) . $_FILES['picture']['name'];
            $size = $_FILES['picture']['size'];
            $type = $_FILES['picture']['type'];
            $folder = "equipment_photo/";

            $oldpicture = $this->model('Rental_model')->getPhotoById($_POST['equipment_id']);

            if ($size < 2048000 && ($type == 'image/jpeg' || $type == 'image/png' || $type == 'image/jpg')) {
                move_uploaded_file($temp, $folder . $name);

                if (is_file("equipment_photo/" . $oldpicture['picture'])) {
                    unlink("equipment_photo/" . $oldpicture['picture']);
                }

                $this->model('Rental_model')->update_equipment_picture($name, $_POST);

                Flasher::setFlash_modal('Equipment data has been successfully updated.', 'Equipment Data Updated!', 'success');
                header('location: ' . BASEURL . '/equipment');
                exit;
            } else {
                Flasher::setFlash_modal('Error, equipment data failed to update.', 'Equipment data failed to add!', 'danger');
                header('location: ' . BASEURL . '/equipment');
                exit;
            }
        }

        if ($this->model('Rental_model')->update_equipment($_POST)) {
            Flasher::setFlash_modal('Equipment data has been successfully updated.', 'Equipment Data Updated!', 'success');
            header('location: ' . BASEURL . '/equipment');
            exit;
        }

        header('location: ' . BASEURL . '/equipment');
    }

    public function category_data()
    {
        $data['group_id'] = $_SESSION['group_id'];
        $data['title'] = "Category Equipment";
        $data['menu'] = "Equipment";
        $data['submenu'] = "Category Equipment";
        $data['category'] = $this->model('Rental_model')->getAllCategory();

        $this->view('templates/admin/header');
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/equipment_category', $data);
        $this->view('templates/admin/footer');
    }

    public function add_category()
    {
        if ($this->model('Rental_model')->add_category($_POST) > 0) {
            Flasher::setFlash_modal('Data Category Equipment has been successfully added.', 'Category Equipment Added!', 'success');
            header('location: ' . BASEURL . '/equipment/category_data');
            exit;
        } else {
            Flasher::setFlash_modal('Error, failed to add Equipment type data.', 'Failed to add Equipment type data!', 'danger');
            header('location: ' . BASEURL . '/equipment/category_data');
            exit;
        }
    }

    public function update_category()
    {
        if ($this->model('Rental_model')->update_category($_POST)) {
            Flasher::setFlash_modal('Data Category Equipment has been successfully updated.', 'Category Equipment updated!', 'success');
            header('location: ' . BASEURL . '/equipment/category_data');
            exit;
        } else {
            Flasher::setFlash_modal('Error, failed to update Equipment type data.', 'Failed to update Equipment type data!', 'danger');
            header('location: ' . BASEURL . '/equipment/category_data');
            exit;
        }
    }

    public function delete_category($id)
    {
        if ($this->model('Rental_model')->delete_category($id) > 0) {
            Flasher::setFlash_modal('Data Category Equipment has been successfully deleted.', 'Category Equipment Deleted!', 'success');
            header('location: ' . BASEURL . '/equipment/category_data');
            exit;
        } else {
            Flasher::setFlash_modal('Error, failed to delete Equipment type data.', 'Failed to delete Equipment type data!', 'danger');
            header('location: ' . BASEURL . '/equipment/category_data');
            exit;
        }
    }
    public function listEquipment() {
        $userId = $_SESSION['user_id'];
        $isAdmin = $_SESSION['group_id'] == '1';
        
        $rentalModel = $this->model('Rental_model');
        $equipmentList = $rentalModel->getAllEquipment($userId, $isAdmin);
        
        // Load view with equipment list
        $this->view('equipment/index', ['equipment' => $equipmentList]);
    }
    
}
