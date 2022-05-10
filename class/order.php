<?php
class order
{
    private $OrderID;
    private $CustomerID;
    private $Date;
    private $Total;
    private $Note;

    public function __construct($OrderID, $CustomerID, $Date, $Total, $Note)
    {
        $this->OrderID = $OrderID;
        $this->CustomerID = $CustomerID;
        $this->Date = $Date;
        $this->Total = $Total;
        $this->Note = $Note;
    }

    public static function getAllOrder($cusID)
    {
        include "../vegetable/connection.php";
        $query = mysqli_query($mysqli, "SELECT * FROM orders WHERE CustomerID = '$cusID'");
        if (mysqli_num_rows($query) > 0) {
            return $query;
        }
        return null;
    }

    public static function getOrderDetail($orderid)
    {
        include "../vegetable/connection.php";
        $query = mysqli_query($mysqli, "SELECT * FROM orderdetail WHERE OrderID = '$orderid'");
        if (mysqli_num_rows($query) > 0) {
            return $query;
        }
        return null;
    }

    public function getOrderID()
    {
        return $this->OrderID;
    }

    public function getCustomerID()
    {
        return $this->CustomerID;
    }

    public function getDate()
    {
        return $this->Date;
    }

    public function getTotal()
    {
        return $this->Total;
    }

    public function getNote()
    {
        return $this->Note;
    }

    public function setOrderID($OrderID)
    {
        $this->OrderID = $OrderID;
    }

    public function setCustomerID($CustomerID)
    {
        $this->CustomerID = $CustomerID;
    }

    public function setDate($Date)
    {
        $this->Date = $Date;
    }

    public function setTotal($Total)
    {
        $this->Total = $Total;
    }

    public function setNote($Note)
    {
        $this->Note = $Note;
    }
}
