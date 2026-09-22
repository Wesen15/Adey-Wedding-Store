<?php

class Rental_model
{
    private $category = 'category';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get all equipment, filter by Vendor if user is not an admin
    public function getAllEquipment()
    {
        $this->db->query('SELECT * FROM equipment ORDER BY status DESC');
        return $this->db->resultSet();
    }
    public function getAllCategory()
    {
        $this->db->query('SELECT * FROM ' . $this->category);
        return $this->db->resultSet();
    }

    public function add_equipment($data, $name)
    {
        $query = "INSERT INTO equipment 
                  (category_code, item_name, description, status, price, location,  picture, added_by) 
                  VALUES 
                  (:category_code, :item_name, :description, :status, :price, :location, :picture, :added_by)";
    
        $this->db->query($query);
        $this->db->bind(':category_code', $data['category_code']);
        $this->db->bind(':item_name', $data['item_name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':picture', $name);
        $this->db->bind(':added_by', $_SESSION['user_id']); // Assuming user_id is stored in session
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function update($id)
    {
        $q = "SELECT * FROM equipment mb, category tp WHERE mb.category_code = tp.category_code AND mb.equipment_id = :id";
        $this->db->query($q);
        $this->db->bind(':id', $id);
        return $this->db->resultSet();
    }

    public function update_equipment($data)
    {
        $query = "UPDATE equipment SET
                    item_name = :item_name,
                    category_code = :category_code, 
                    description = :description, 
                    status = :status,
                    price = :price,
                    location = :location
                  WHERE equipment_id = :equipment_id"; // Removed the trailing comma here
    
        $this->db->query($query);
        $this->db->bind(':item_name', $data['item_name']); 
        $this->db->bind(':category_code', $data['category_code']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':equipment_id', $data['equipment_id']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    public function update_equipment_picture($name, $data)
    {
        $this->db->query("UPDATE equipment SET picture = :picture WHERE equipment_id= :equipment_id");
        $this->db->bind('picture', $name);
        $this->db->bind('equipment_id', $data['equipment_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteEquipmentData($id)
    {
        $query = "DELETE FROM equipment WHERE equipment_id = :equipment_id";
        $this->db->query($query);
        $this->db->bind('equipment_id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getPhotoById($id)
    {
        $q = "SELECT picture FROM equipment WHERE equipment_id = :id";
        $this->db->query($q);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    
    public function equipmentDetail($equipment_id)
    {
        $q = "SELECT * FROM equipment mb, category tp WHERE mb.category_code = tp.category_code AND mb.equipment_id = :equipment_id";
        $this->db->query($q);
        $this->db->bind(':equipment_id', $equipment_id);
        return $this->db->resultSet();
    }

    public function add_category($data)
    {
        $query = "INSERT INTO category
                    VALUES
                ('', :category_code, :category_name)";
    
        $this->db->query($query);
        $this->db->bind('category_code', $data['category_code']);
        $this->db->bind('category_name', $data['category_name']);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function update_category($data)
    {
        $this->db->query("UPDATE category 
                    SET category_code = :category_code, 
                    category_name = :category_name 
                    WHERE category_id = :category_id");
        $this->db->bind('category_code', $data['category_code']);
        $this->db->bind('category_name', $data['category_name']);
        $this->db->bind('category_id', $data['category_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete_category($id)
    {
        $query = "DELETE FROM category WHERE category_id = :category_id";
        $this->db->query($query);
        $this->db->bind('category_id', $id);
    
        $this->db->execute();
    
        return $this->db->rowCount();
    }

    public function add_rent($data, $customerId)
    {
        $query = "INSERT INTO rental (customer_id, equipment_id, rental_date, return_date, price, payment_proof, rental_status, vendor_id)
                  VALUES (:customer_id, :equipment_id, :rental_date, :return_date, :price,'', :rental_status, :vendor_id)";
        
        $this->db->query($query);
        $this->db->bind(':customer_id', $customerId);
        $this->db->bind(':equipment_id', $data['equipment_id']);
        $this->db->bind(':rental_date', $data['rental_date']);
        $this->db->bind(':return_date', $data['return_date']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':rental_status', 0); // Default status
        $this->db->bind(':vendor_id', $data['vendor_id']);
        $this->db->execute();
        
        return $this->db->rowCount();
    }
    
    
    public function paymentData()
    {
        $this->db->query("SELECT  t1.item_name, t2.*, t3.phone_number, t4.name 
                            FROM equipment t1 JOIN rental t2 ON t1.equipment_id = t2.equipment_id
                            JOIN customer t3 ON t2.customer_id = t3.customer_id
                            JOIN users t4 ON t3.user_id = t4.user_id WHERE t2.rental_status=1 ORDER BY rental_id DESC");
        return $this->db->resultSet();
    }

    public function trans($id, $sts)
    {
        $this->db->query("UPDATE rental SET rental_status = :rental_status WHERE rental_id= :rental_id");
        $this->db->bind('rental_status', $sts);
        $this->db->bind('rental_id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function Transactiondata()
    {
        $this->db->query("SELECT t1.item_name, t2.*, t4.name AS customer_name, t5.status_name 
                          FROM equipment t1 
                          JOIN rental t2 ON t1.equipment_id = t2.equipment_id
                          JOIN customer t3 ON t2.customer_id = t3.customer_id
                          JOIN users t4 ON t3.user_id = t4.user_id 
                          JOIN status t5 ON t2.rental_status = t5.rental_status 
                          WHERE t2.rental_status != 1 AND t2.rental_status != 6 AND t2.rental_status != 0 
                          ORDER BY t2.rental_status ASC");
        return $this->db->resultSet();
    }
    
    public function reportData()
    {
        $this->db->query("SELECT t1.status, t1.item_name, t2.*, t4.name, t5.status_name 
                          FROM equipment t1 
                          JOIN rental t2 ON t1.equipment_id = t2.equipment_id
                          JOIN customer t3 ON t2.customer_id = t3.customer_id
                          JOIN users t4 ON t3.user_id = t4.user_id 
                          JOIN status t5 ON t2.rental_status = t5.rental_status 
                          WHERE t2.rental_status = 6 
                          ORDER BY rental_id DESC");
        return $this->db->resultSet();
    }

    public function update_transaction($data)
    {
        $this->db->query("UPDATE rental SET rental_status = :rental_status WHERE rental_id= :rental_id");
        $this->db->bind('rental_status', $data['rental_status']);
        $this->db->bind('rental_id', $data['rental_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update_return($data)
    {
        $this->db->query("UPDATE rental SET return_date = :return_date WHERE rental_id= :rental_id");
        $this->db->bind('return_date', $data['return_date']);
        $this->db->bind('rental_id', $data['rental_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function totalTransactions()
    {
        $this->db->query("SELECT COUNT(rental_id) FROM rental WHERE rental_status=6");
        return $this->db->single();
    }

    public function totalUser()
    {
        $this->db->query("SELECT COUNT(customer_id) FROM customer");
        return $this->db->single();
    }

    public function totalVendor()
    {
        $this->db->query("SELECT COUNT(vendor_id) FROM vendor");
        return $this->db->single();
    }

    public function totalEquipment()
    {
        $this->db->query("SELECT COUNT(equipment_id) FROM equipment");
        return $this->db->single();
    }

    public function getTotalAvailableEquipment() {
        $this->db->query("SELECT COUNT(*) as total FROM equipment WHERE status = 'Available'");
        return $this->db->single()['total'];
    }
    public function getEquipmentByVendorId($vendor_id)
    {
        $this->db->query('SELECT * FROM equipment WHERE added_by = :vendor_id');
        $this->db->bind(':vendor_id', $vendor_id);
        return $this->db->resultSet();
    }
    public function getEquipmentForCustomers()
    {
        $query = "SELECT * FROM equipment WHERE status IN (1, 7)";
        $this->db->query($query);
        
        // Log the query for debugging
        error_log("Query: " . $query);
        
        $result = $this->db->resultSet();
        
        // Log the result for debugging
        error_log("Result: " . print_r($result, true));
        
        return $result;
    }
    
    
    public function getEquipmentById($equipment_id)
    {
        $this->db->query('SELECT * FROM equipment WHERE equipment_id = :equipment_id');
        $this->db->bind(':equipment_id', $equipment_id);
        return $this->db->single();
    }
    
    public function getTransactionsByVendorId($vendorId)
    {
        $this->db->query(
            "SELECT t1.equipment_id, t1.item_name, t1.status, t2.*, t4.name, t5.status_name, va.bank_name, va.account_number, va.account_holder_name 
             FROM equipment t1 
             JOIN rental t2 ON t1.equipment_id = t2.equipment_id
             JOIN customer t3 ON t2.customer_id = t3.customer_id
             JOIN users t4 ON t3.user_id = t4.user_id 
             JOIN status t5 ON t2.rental_status = t5.rental_status 
             JOIN vendor v ON t1.added_by = v.user_id
             JOIN vendor_account va ON v.vendor_id = va.vendor_id
             WHERE t1.added_by = :vendor_id
             ORDER BY t2.rental_status ASC"
        );
        $this->db->bind(':vendor_id', $vendorId);
        
        $result = $this->db->resultSet();
        
        // Debug output
        error_log("Vendor ID: " . $vendorId);
        error_log("Query Result: " . print_r($result, true));
        
        return $result;
    }
    
    
    
    public function getPaymentsByVendorId($vendorId)
    {
        $this->db->query(
            'SELECT r.*, e.item_name, va.bank_name, va.account_number, va.account_holder_name 
            FROM rental r 
            JOIN equipment e ON r.equipment_id = e.equipment_id
            JOIN vendor v ON e.added_by = v.user_id
            JOIN vendor_account va ON v.vendor_id = va.vendor_id
            WHERE v.vendor_id = :vendor_id'
        );
        $this->db->bind(':vendor_id', $vendorId);
        return $this->db->resultSet();
    }
    
    public function getVendorAccountDetails($vendorId)
    {
        $this->db->query('SELECT * FROM vendor_account WHERE vendor_id = :vendor_id');
        $this->db->bind(':vendor_id', $vendorId);
        return $this->db->single();
    }
    
    public function getCustomerId($userId)
    {
        $this->db->query("SELECT customer_id FROM customer WHERE user_id = :user_id");
        $this->db->bind(':user_id', $userId);
        return $this->db->single(); // Use single() to get a single record as an associative array
    }
    
public function updateStatus($sts, $id)
{
    $this->db->query("UPDATE equipment SET status = :status WHERE equipment_id = :equipment_id");
    $this->db->bind(':status', $sts);
    $this->db->bind(':equipment_id', $id);
    return $this->db->execute();
}
public function deleteTransaction($rental_id) {
    $this->db->query("DELETE FROM rental WHERE rental_id = :rental_id");
    $this->db->bind('rental_id', $rental_id);
    $this->db->execute();
    return $this->db->rowCount();
}
public function cancelOrder($rental_id)
{
    // Update rental status to canceled (7)
    $query = "UPDATE rental SET rental_status = 7 WHERE rental_id = :rental_id";
    $this->db->query($query);
    $this->db->bind(':rental_id', $rental_id);
    $this->db->execute();

    // Update equipment status to available (1)
    $equipmentQuery = "UPDATE equipment SET status = 1 WHERE equipment_id = (SELECT equipment_id FROM rental WHERE rental_id = :rental_id)";
    $this->db->query($equipmentQuery);
    $this->db->bind(':rental_id', $rental_id);
    $this->db->execute();

    return $this->db->rowCount() > 0;
}

public function getActiveTransactionsByCustomerId($customer_id)
{
    $query = "SELECT rental.*, equipment.picture, equipment.item_name, equipment.price
              FROM rental
              JOIN equipment ON rental.equipment_id = equipment.equipment_id
              WHERE rental.customer_id = :customer_id 
              AND rental.rental_status NOT IN (6, 7)"; // Exclude completed (6) and canceled (7) transactions
    $this->db->query($query);
    $this->db->bind('customer_id', $customer_id);
    return $this->db->resultSet();
}

}
