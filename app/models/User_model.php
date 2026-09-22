<?php

class User_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email)
    {
        $q = "SELECT * FROM users WHERE email ='$email'";
        $this->db->query($q);
        return $this->db->single();
    }

    public function findUserByUsername($username)
    {
        $q = "SELECT name, email FROM users WHERE username ='$username'";
        $this->db->query($q);
        return $this->db->single();
    }

    public function insertUser($data)
    {
        // Insert into users table
        $query = "INSERT INTO users (group_id, username, password, name, email, date_created) VALUES (:group_id, :username, :password, :name, :email, now())";
        $this->db->query($query);
    
        // Bind values
        $this->db->bind(':group_id', $data['group_id']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->execute();
    
        // Retrieve the last inserted user ID using the email
        $user = $this->getLastInsertedUserId($data['email']);
        $user_id = $user['user_id'];
    
        $group_id = $data['group_id'];
    
        // Check user role and insert into the appropriate table
        if ($group_id == '1') { // Admin
            $query = "INSERT INTO admin (user_id, date_created, date_updated) VALUES (:user_id, now(), now())";
            $this->db->query($query);
            $this->db->bind(':user_id', $user_id);
            $this->db->execute();
        } else if ($group_id == '2') { // Vendor
            // Insert into vendor table
            $query = "INSERT INTO vendor (user_id) VALUES (:user_id)";
            $this->db->query($query);
            $this->db->bind(':user_id', $user_id);
            $this->db->execute();
    
            // Retrieve the vendor_id of the newly inserted vendor
            $vendor = $this->getVendorIdByUserId($user_id);
            $vendor_id = $vendor['vendor_id'];
    
            // Insert into vendor_account table
            $query = "INSERT INTO vendor_account (vendor_id, bank_name, account_number, account_holder_name, date_created) VALUES (:vendor_id, :bank_name, :account_number, :account_holder_name, now())";
            $this->db->query($query);
            $this->db->bind(':vendor_id', $vendor_id);
            $this->db->bind(':bank_name', $data['bank_name']);
            $this->db->bind(':account_number', $data['account_number']);
            $this->db->bind(':account_holder_name', $data['account_holder_name']);
            $this->db->execute();
        } else { // Customer
            $query = "INSERT INTO customer (user_id, address, gender, phone_number, id_number, photo) VALUES (:user_id, '', '', '', '', '')";
            $this->db->query($query);
            $this->db->bind(':user_id', $user_id);
            $this->db->execute();
        }
    
        return $user_id;
    }
    
    // Function retrieves user_id by email
    public function getLastInsertedUserId($email)
    {
        $this->db->query('SELECT user_id FROM users WHERE email = :email ORDER BY user_id DESC LIMIT 1');
        $this->db->bind(':email', $email);
        return $this->db->single();
    }
    
    // Function retrieves vendor_id by user_id
    public function getVendorIdByUserId($user_id)
    {
        $this->db->query('SELECT vendor_id FROM vendor WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        return $this->db->single();
    }
    
    
    public function login($username, $password)
{
    //Login query
    $this->db->query('SELECT * FROM users WHERE username = :username');

    //Bind value
    $this->db->bind(':username', $username);

    $row = $this->db->singleOBJ();

    if ($row) { // Check if a row was found
        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row; // Return user data if password is verified
        } else {
            return false; // Return false if password is incorrect
        }
    } else {
        return false; // Return false if user is not found
    }
}

    public function getallcustomer()
    {
        $this->db->query('SELECT t1.name, t1.user_id, t1.username, t1.email, t2.photo, t2.phone_number, t2.address, t2.gender, t2.id_number FROM users t1 INNER JOIN customer t2 ON t1.user_id=t2.user_id');
        return $this->db->resultSet();
    }
    public function getallvendor()
    {
        $this->db->query('SELECT  username, name, user_id, email FROM users WHERE group_id=2');
        return $this->db->resultSet();
    }

    public function getcomplete($id)
    {
        $q = "SELECT id_number FROM customer WHERE user_id ='$id'";
        $this->db->query($q);
        return $this->db->resultSet();
    }

    public function getname($id)
    {
        $q = "SELECT name FROM users WHERE user_id ='$id'";
        $this->db->query($q);
        return $this->db->single();
    }

    public function complete_profile($data, $photo)
{
    $query = "UPDATE customer SET
        address = :address, 
        gender = :gender, 
        phone_number = :phone_number, 
        id_number = :id_number,
        photo = :photo
    WHERE user_id= :user_id";

    $this->db->query($query);
    $this->db->bind('user_id', $data['user_id']);
    $this->db->bind('address', $data['address']);
    $this->db->bind('gender', $data['gender']);
    $this->db->bind('phone_number', $data['phone_number']);
    $this->db->bind('id_number', $data['id_number']);
    $this->db->bind('photo', $photo);

    try {
        $this->db->execute();
    } catch (Exception $e) {
        // Handle exception
        return false;
    }

    return $this->db->rowCount();
}
public function deleteUserData($id) {
    $query = "DELETE FROM users WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind('user_id', $id);
    $this->db->execute();
    return $this->db->rowCount();
}

public function getUserById($id) {
    $this->db->query("SELECT * FROM users WHERE user_id = :user_id");
    $this->db->bind('user_id', $id);
    return $this->db->single();
}

public function getVendorById($id)
{
    $query = "SELECT * FROM users WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind(':user_id', $id);
    return $this->db->single(); // Assuming single() method is available to fetch a single row
}
public function deleteVendorData($id)
{
    $query = "DELETE FROM users WHERE user_id = :user_id";
    $this->db->query($query);
    $this->db->bind(':user_id', $id);
    $this->db->execute();
    return $this->db->rowCount();
}
public function updateVendorData($data)
{
    $query = "UPDATE users SET name = :name, username = :username, email = :email";
    if (isset($data['password'])) {
        $query .= ", password = :password";
    }
    $query .= " WHERE user_id = :user_id";

    $this->db->query($query);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':user_id', $data['user_id']);
    if (isset($data['password'])) {
        $this->db->bind(':password', $data['password']);
    }
    $this->db->execute();

    return $this->db->rowCount();
}
public function updateUserData($data)
{
    $query = "UPDATE users SET name = :name, username = :username, email = :email";

    if (isset($data['password'])) {
        $query .= ", password = :password";
    }

    $query .= " WHERE user_id = :user_id";

    $this->db->query($query);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':user_id', $data['user_id']);

    if (isset($data['password'])) {
        $this->db->bind(':password', $data['password']);
    }

    $this->db->execute();
    return $this->db->rowCount();
}
public function updateUserProfile($data) {
    $query = "UPDATE users SET
        username = :username, 
        profile_picture = :profile_picture
    WHERE user_id = :user_id";

    $this->db->query($query);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':profile_picture', $data['profile_picture']);

    try {
        $this->db->execute();
    } catch (Exception $e) {
        error_log("Error updating user profile: " . $e->getMessage());
        return false;
    }

    return $this->db->rowCount();
}

public function updateVendorAccount($data) {
    $query = "UPDATE vendor_account SET
        bank_name = :bank_name,
        account_number = :account_number,
        account_holder_name = :account_holder_name
    WHERE vendor_id = (SELECT vendor_id FROM vendor WHERE user_id = :user_id)";

    $this->db->query($query);
    $this->db->bind(':user_id', $data['user_id']);
    $this->db->bind(':bank_name', $data['bank_name']);
    $this->db->bind(':account_number', $data['account_number']);
    $this->db->bind(':account_holder_name', $data['account_holder_name']);

    try {
        $this->db->execute();
    } catch (Exception $e) {
        error_log("Error updating vendor account: " . $e->getMessage());
        return false;
    }

    return $this->db->rowCount();
}
public function getVendorAccountDetails($vendorId) {
    $this->db->query(
        "SELECT va.bank_name, va.account_number, va.account_holder_name 
         FROM vendor_account va
         JOIN vendor v ON va.vendor_id = v.vendor_id
         WHERE v.user_id = :vendor_id"
    );
    $this->db->bind(':vendor_id', $vendorId);
    
    return $this->db->single();
}
}
