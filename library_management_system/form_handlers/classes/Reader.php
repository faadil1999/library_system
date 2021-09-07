<?php
    require 'database.php';

    class Reader{
       private $id_reader; 
       private $first_name ;
       private $last_name;
       private $adress;
       private $num_tel;
       private $date_registration;
       private $password;

       public function __construct (){

        
       }

//these function are created to modify the values of object's        
       public function setIdReader($_id_reader){
            $this->id_reader = $_id_reader;
       }

       public function setFirstName($_firstname)
       {
           $this->first_name = $_firstname;
       }
     
       
       public function setLastName($_lastname)
       {
           $this->last_name = $_lastname;
       }

       
       public function setAdress($_adress)
       {
           $this->adress = $_adress;
       }

       
       public function setNumTel($_num_tel)
       {
           $this->num_tel = $_num_tel;
       }

       
       public function setDateRegistr($_date_registration)
       {
           $this->date_registration = $_date_registration;
       }

       
       public function setPassword($_password)
       {
           $this->password = $_password;
       }
// these functions get are created to take the values of object's values ;
       
       public function getIdReader()
       {
          return $this->id_reader ;
       }

       public function getFirstName()
       {
           return $this->first_name;
       }

       public function getLastName()
       {
           return $this->last_name;
       }

       public function getAdress()
       {
           return $this->adress;
       }

       public function getDateRegistr()
       {
          return $this->date_registration;
       }

       public function getTelNum()
       {
           return $this->num_tel;
       }

       public function getPassword()
       {
           return $this->password;
       }

       public function presentation(){

            echo "$this->first_name est un gar tres simple";

       }
     
       public function insertReader()
       {
           $db = Database::connect();
           $sql = "INSERT INTO reader(first_name , last_name , r_address , num_tel , date_registr , r_password) VALUES(? , ? , ? , ? , ? , ? )";
           $statement = $db->prepare($sql);
           $statement->execute(array($this->first_name , $this->last_name , $this->adress , $this->num_tel , $this->date_registration , $this->password));
           Database::disconnect();

        }
//this function allow us to verify if user exist in our data base
     public function user_exist()
    {
        $db  = Database::connect();
        $sql = "SELECT * FROM reader WHERE num_tel = ?";
        $req =$db->prepare($sql);
        $req->execute(array($this->num_tel));
          $exist = $req->rowCount();
        return $exist;
         Database::disconnect();
    }
//this function allow us to verify if user exist in our data base through phone number and password

    public function user_exist_login()
    {
        $db = Database::connect();
        $sql = "SELECT *FROM reader WHERE num_tel = ? AND r_password = ?";
        $req = $db->prepare($sql);
        $req->execute(array($this->num_tel , $this->password));
        $exist = $req->rowCount();
        echo $exist;
        return $exist;
        Database::disconnect();
    }
//this function is for loading data from data base to our class
    public function loadDataReader($phoneNumber , $r_password)
    {   
        $db = Database::connect();
        $sql = "SELECT *FROM reader WHERE num_tel = ? AND r_password = ?";
        $statement = $db->prepare($sql);
        $statement->execute(array($phoneNumber , $r_password));
        $profil = $statement->fetch();
        Database::disconnect();
        $this->setIdReader($profil['id_reader']);
        $this->setFirstName($profil['first_name']);
        $this->setLastName($profil['last_name']);
        $this->setAdress($profil['r_address']);
        $this->setNumTel($profil['num_tel']);
        $this->setDateRegistr($profil['date_registr']);
        $this->setPassword($profil['r_password']);
    }

    }

?>

