<?php
class customer {
    private $CustomerID;
    private $Password;
    private $Fullname;
    private $Address;
    private $City;
    
    public function __construct($CustomerID, $Password, $Fullname, $Address, $City) {
        $this->CustomerID = $CustomerID;
        $this->Password = $Password;
        $this->Fullname = $Fullname;
        $this->Address = $Address;
        $this->City = $City;
    }

    public static function getByID($cusid) {
        include "../vegetable/connection.php";
        $query = mysqli_query($mysqli, "SELECT * FROM customers WHERE CustomerID = '$cusid'");
        if (mysqli_num_rows($query) > 0) {
            $result = mysqli_fetch_assoc($query);
            return $result;
        }
        return null;
    }
    
    public static function add($cus) {
        include "../vegetable/connection.php";
        $id = $cus->getCustomerID();
        $fullname = $cus->getFullname();
        $password = $cus->getPassword();
        $address = $cus->getAddress();
        $city = $cus->getCity();
        $query = mysqli_query($mysqli, "SELECT Fullname FROM customers WHERE Fullname = '$fullname'");
        if (mysqli_num_rows($query) > 0) {
            return 1;
        } else {
            $queryrg = mysqli_query($mysqli, "INSERT INTO customers VALUES ('$id','$password','$fullname','$address',
            '$city')");
            if (!$queryrg) {
                return false;
            } else {
                return 2;
            }
        }
        return false;
    }

    public function getCustomerID() {
        return $this->CustomerID;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function getFullname() {
        return $this->Fullname;
    }

    public function getAddress() {
        return $this->Address;
    }

    public function getCity() {
        return $this->City;
    }

    public function setCustomerID($CustomerID): void {
        $this->CustomerID = $CustomerID;
    }

    public function setPassword($Password): void {
        $this->Password = $Password;
    }

    public function setFullname($Fullname): void {
        $this->Fullname = $Fullname;
    }

    public function setAddress($Address): void {
        $this->Address = $Address;
    }

    public function setCity($City): void {
        $this->City = $City;
    }
    
}
