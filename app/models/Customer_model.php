<?php

class Customer_model {
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function userCheckout($customerId)
    {
        $this->db->query("SELECT t1.picture, t1.item_name, t2.rental_id, t2.price,  t2.rental_date, t2.return_date, t2.rental_status 
                          FROM equipment t1 
                          INNER JOIN rental t2 ON t1.equipment_id = t2.equipment_id 
                          WHERE t2.customer_id = :customer_id 
                          ORDER BY t2.rental_id DESC");
        $this->db->bind(':customer_id', $customerId);
        return $this->db->resultSet();
    }
    
    public function payment($id)
    {
        $this->db->query(
            "SELECT t1.picture, t1.item_name, t2.rental_id, t2.price,  t2.rental_date, t2.return_date, t2.payment_proof, t2.rental_status, va.bank_name, va.account_number, va.account_holder_name
             FROM equipment t1 
             INNER JOIN rental t2 ON t1.equipment_id = t2.equipment_id 
             INNER JOIN vendor v ON t1.added_by = v.user_id
             INNER JOIN vendor_account va ON v.vendor_id = va.vendor_id
             WHERE t2.rental_id = :rental_id"
        );
        $this->db->bind(':rental_id', $id);
        
        $result = $this->db->single();
        
        // Debug output
        error_log("Rental ID: " . $id);
        error_log("Query Result: " . print_r($result, true));
        
        return $result;
    }
    public function payments($id)
    {
        $this->db->query("SELECT  t1.picture, t1.item_name, t2.rental_id, t2.price,  t2.rental_date, t2.return_date, t2.payment_proof, t2.rental_status FROM equipment t1 INNER JOIN rental t2 ON t1.equipment_id=t2.equipment_id WHERE t2.rental_id='$id'");
        return $this->db->resultSet(); 
    }
    public function upload_proof($data, $name)
    {
        $this->db->query("UPDATE rental SET payment_proof = :payment_proof, rental_status = :rental_status WHERE rental_id= :rental_id");
        $this->db->bind('payment_proof', $name);
        $this->db->bind('rental_status', 1);
        $this->db->bind('rental_id', $data['rental_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

}