<?php
class Transaction extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['group_id'])) {
            header('location:' . BASEURL . '/home/redirecting');
            exit;
        }
        if ($_SESSION['group_id'] == 3) {
            header('location:' . BASEURL . '/home/redirecting');
            exit;
        }
    }

    public function index()
    {
        $data['group_id'] = $_SESSION['group_id'];
        $data['title'] = "Customer Transactions";
        $data['menu'] = "Transaction";
        $data['submenu'] = "Transaction Progress";
        $data['transaction'] = $this->model('rental_model')->getTransactionsByVendorId($_SESSION['user_id']);

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('vendor/transaction', $data);
        $this->view('templates/admin/footer');
    }


    public function payment() {
        $data['group_id'] = $_SESSION['group_id'];
        $data['title'] = "Customer Payment";
        $data['menu'] = "Payment";
        $data['submenu'] = "Payment Data";
        $vendorId = $_SESSION['user_id'];
    
        // Retrieve transactions with vendor account details
        $data['transaction'] = $this->model('rental_model')->getTransactionsByVendorId($vendorId);
    
        // Debug output
        error_log("Transaction Data: " . print_r($data['transaction'], true));
    
        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('vendor/payment', $data);
        $this->view('templates/admin/footer');
    }
    
    public function cancel($id)
    {
        $sts = 3;
        $this->model('rental_model')->trans($id, $sts);
        Flasher::setFlash_modal('Transaction has been successfully rejected.', 'Transaction Rejected!', 'danger');
        header('location: ' . BASEURL . '/transaction');
        exit;
    }

    public function finished($id)
    {
        $sts = 2;
        $this->model('rental_model')->trans($id, $sts);
        Flasher::setFlash_modal('Transaction has been successfully accepted.', 'Transaction Accepted!', 'success');
        header('location: ' . BASEURL . '/transaction');
        exit;
    }

    public function report()
    {
        $data['group_id'] = $_SESSION['group_id'];
        $data['title'] = "Report";
        $data['menu'] = "Transaction";
        $data['submenu'] = "Finished Transactions";
        $data['transaction'] = $this->model('rental_model')->reportdata();

        $this->view('templates/admin/header', $data);
        $this->view('templates/admin/sidebar', $data);
        $this->view('vendor/report', $data);
        $this->view('templates/admin/footer');
    }

    public function print_report()
    {
        $data['group_id'] = $_SESSION['group_id'];
        $data['title'] = "Report";
        $data['menu'] = "Transaction";
        $data['submenu'] = "Finished Transactions";
        $data['transaction'] = $this->model('rental_model')->reportdata();

        $this->view('vendor/print_report', $data);
    }

    public function update()
    {
        $this->model('rental_model')->update_transaction($_POST);
        if (!empty($_POST['return_date'])) {
            $this->model('rental_model')->update_return($_POST);
            $this->model('rental_model')->updateStatus(1, $_POST['equipment_id']);
        }

        Flasher::setFlash_modal('Transaction data has been successfully updated.', 'Transaction Data Updated!', 'success');
        header('location: ' . BASEURL . '/transaction');
        exit;
    }

    public function upload_proof()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rentalId = $_POST['rental_id'];
            $paymentProof = $_FILES['payment_proof'];

            // Validate file
            $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
            if (!in_array($paymentProof['type'], $allowedTypes)) {
                die('Invalid file type.');
            }

            // Move uploaded file
            $targetDir = 'uploads/payment_proofs/';
            $targetFile = $targetDir . basename($paymentProof['name']);
            if (!move_uploaded_file($paymentProof['tmp_name'], $targetFile)) {
                die('Failed to upload file.');
            }

            // Save file info to database
            $this->model('rental_model')->savePaymentProof($rentalId, $targetFile);

            Flasher::setFlash_modal('Payment proof has been successfully uploaded.', 'Payment Proof Uploaded!', 'success');
            header('location: ' . BASEURL . '/transaction/payment');
        }
    }
    public function delete($id)
    {
        if ($_SESSION['group_id'] != 1) {
            Flasher::setFlash_modal('You do not have permission to delete transactions.', 'Error!', 'danger');
            header('location: ' . BASEURL . '/transaction/reports');
            exit;
        }

        if ($this->model('rental_model')->deleteTransaction($id) > 0) {
            Flasher::setFlash_modal('Transaction has been successfully deleted.', 'Success!', 'success');
        } else {
            Flasher::setFlash_modal('Failed to delete the transaction.', 'Error!', 'danger');
        }
        header('location: ' . BASEURL . '/transaction/reports');
        exit;
    }
}
