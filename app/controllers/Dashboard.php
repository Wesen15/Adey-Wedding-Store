<?php

class Dashboard extends Controller 
{
   public function __construct()
    {
        if(!$_SESSION) {
            header('location:' . BASEURL . '/home/redirecting');
        }
        if($_SESSION['group_id'] == 3) {
            header('location:' . BASEURL . '/home/redirecting');
        }
    }

    public function index() 
    {
        $data['group_id'] = $_SESSION['group_id'];
        $data = array(
			'total_transactions'       => $this->model('Rental_model')->totaltransactions(),
			'total_user'            => $this->model('Rental_model')->totaluser(),
			'total_vendor'         => $this->model('Rental_model')->totalvendor(),
			'total_equipment'       => $this->model('Rental_model')->totalequipment()
        );
        $data['title'] = "Dashboard";
        $this->view('templates/admin/header');
        $this->view('templates/admin/sidebar', $data);
        $this->view('admin/dashboard', $data);
        $this->view('templates/admin/footer');
    }

    public function add_user()
    {
        $dt['group_id'] = $_SESSION['group_id'];
        $dt['title'] = "Add User";
        $dt['menu'] = "User";
        $dt['submenu'] = "Add User";
        $data = NULL;
        $this->view('templates/admin/header');
        $this->view('templates/admin/sidebar', $dt);
        $this->view('admin/add_user', $data);
        $this->view('templates/admin/footer');
    }

    public function customer_data() 
    {
        $data['group_id'] = $_SESSION['group_id'];
        $data['title'] = "Customer Data";
        $data['menu'] = "customer";
        $data['submenu'] = "Data Customer";
        $data['Users'] = $this->model('User_model')->getallcustomer();
        $this->view('templates/admin/header');
        $this->view('templates/admin/sidebar',$data);
        $this->view('admin/customer', $data);
        $this->view('templates/admin/footer');
    }

    public function vendor_data() 
    {
        $data['group_id'] = $_SESSION['group_id'];
        $data['title'] = "Venders Data";
        $data['menu'] = "Venders";
        $data['submenu'] = "Venders Data";
        $data['vendor'] = $this->model('User_model')->getallvendor();
        //var_dump($data); die;
        $this->view('templates/admin/header');
        $this->view('templates/admin/sidebar',$data);
        $this->view('admin/vendor', $data);
        $this->view('templates/admin/footer');
    }
}