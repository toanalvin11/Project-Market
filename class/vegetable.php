<?php
class vegetable
{
    private $VegetableID;
    private $CategoryID;
    private $VegetableName;
    private $Unit;
    private $Amount;
    private $Image;
    private $Price;

    public function __construct($VegetableID, $CategoryID, $VegetableName, $Unit, $Amount, $Image, $Price)
    {
        $this->VegetableID = $VegetableID;
        $this->CategoryID = $CategoryID;
        $this->VegetableName = $VegetableName;
        $this->Unit = $Unit;
        $this->Amount = $Amount;
        $this->Image = $Image;
        $this->Price = $Price;
    }

    public static function getAll()
    {
        include "../vegetable/connection.php";
        $allsanpham = mysqli_query($mysqli, "SELECT * FROM vegetable");
        if (mysqli_num_rows($allsanpham) > 0) {
            return $allsanpham;
        }
        return null;
    }

    public static function getListByVegeID($vegeID)
    {
        include "../vegetable/connection.php";
        $sanpham = mysqli_query($mysqli, "SELECT * FROM vegetable WHERE VegetableID = '$vegeID'");
        if (mysqli_num_rows($sanpham) > 0) {
            return $sanpham;
        }
        return null;
    }

    public static function getListByCateID($cateid)
    {
        include "../vegetable/connection.php";
        $sptheodanhmuc = mysqli_query($mysqli, "SELECT * FROM vegetable WHERE CategoryID = '$cateid'");
        if (mysqli_num_rows($sptheodanhmuc) > 0) {
            return $sptheodanhmuc;
        }
        return null;
    }

    public static function getListByCateIDs($cateids)
    {
        include "../vegetable/connection.php";
        $product = mysqli_query($mysqli, "SELECT * FROM vegetable WHERE CategoryID IN (" . implode(",", 
        array_keys($cateids)) . ")");
        if (mysqli_num_rows($product) > 0) {
            return $product;
        }
        return null;
    }

    public function getByID($vegetableID)
    {
        include "../vegetable/connection.php";
        $letid = mysqli_query($mysqli, "SELECT * FROM orderdetail WHERE VegetableID = '$vegetableID'");
        if (mysqli_num_rows($letid) > 0) {
            return $letid;
        }
        return null;
    }

    public function getVegetableID()
    {
        return $this->VegetableID;
    }

    public function getCategoryID()
    {
        return $this->CategoryID;
    }

    public function getVegetableName()
    {
        return $this->VegetableName;
    }

    public function getUnit()
    {
        return $this->Unit;
    }

    public function getAmount()
    {
        return $this->Amount;
    }

    public function getImage()
    {
        return $this->Image;
    }

    public function getPrice()
    {
        return $this->Price;
    }

    public function setVegetableID($VegetableID): void
    {
        $this->VegetableID = $VegetableID;
    }

    public function setCategoryID($CategoryID): void
    {
        $this->CategoryID = $CategoryID;
    }

    public function setVegetableName($VegetableName): void
    {
        $this->VegetableName = $VegetableName;
    }

    public function setUnit($Unit): void
    {
        $this->Unit = $Unit;
    }

    public function setAmount($Amount): void
    {
        $this->Amount = $Amount;
    }

    public function setImage($Image): void
    {
        $this->Image = $Image;
    }

    public function setPrice($Price): void
    {
        $this->Price = $Price;
    }
}
