<?php

include_once "../includes/db.php";

Class FacilityModel{
    public $con;

    public function getAllFacility(){
        $this->con = Database::connect();
        if($this->con){
            $sql = "select * from facilities where deleted_at is null";
            $statement = $this->con->prepare($sql);
            $result = $statement->execute();
            if($result){
                return $statement->fetchAll();
            }else{
                return null;
            }
        }
    }

    public function insertFacility($name,$price,$qty,$vendor){
        $this->con = Database::connect();
        if($this->con){
            $sql = "insert into facilities(fac_name,fac_price,fac_qty,fac_vendor) values (:name,:price,:qty,:vendor)";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":price",$price);
            $statement->bindParam(":qty",$qty);
            $statement->bindParam(":vendor",$vendor);
            $result = $statement->execute();
            return $result;
        }
    }

    public function getFacilityById($id){
        $this->con = Database::connect();
        if($this->con){
            $sql = "select * from facilities where fac_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            if($result){
                return $statement->fetch();
            }else{
                return null;
            }
        }
    }

    public function updateFacility($id,$name,$price,$qty,$vendor){
        $this->con = Database::connect();
        if($this->con){
            $sql = "update facilities set fac_name=:name,fac_price=:price,fac_qty=:qty,fac_vendor=:vendor where fac_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":id",$id);
            $statement->bindParam(":name",$name);
            $statement->bindParam(":price",$price);
            $statement->bindParam(":qty",$qty);
            $statement->bindParam(":vendor",$vendor);
            $result = $statement->execute();
            return $result;
        }
    }

    public function deleteFacility($id){
        $this->con = Database::connect();
        if($this->con){
            $today = new DateTime();
            $strDate = $today->format('Y-m-d H:i:s');
            $sql = "update facilities set deleted_at=:date where fac_id=:id";
            $statement = $this->con->prepare($sql);
            $statement->bindParam(":date",$strDate);
            $statement->bindParam(":id",$id);
            $result = $statement->execute();
            return $result;
        }
    }
}

?>