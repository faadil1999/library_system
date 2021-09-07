<?php

class Book{

    private $id_book ;
    private $title;
    private $author;
    private $yearPub;
    private $placePub;
    private $stokNum;
    private $UDK;
    private $BBK;
    private $amount_copy;

    public function __construct()
    {
        
    }

    public function setIdBook($idBook)
    {
        $this->id_book = $idBook;
    }

    public function setTtitle($_title)
    {
        $this->title = $_title;
    }
    public function setAuthor($_author)
    {
        $this->author = $_author;
    }
    public function setYearPub($_yearPub)
    {
        $this->yearPub = $_yearPub;
    }

    public function setPlacePub($_placePub)
    {
        $this->placePub = $_placePub;
    }
    
    public function setStockNum($_stockNum)
    {
        $this->stokNum = $_stockNum;
    }
    
    public function setUDK($_UDK)
    {
        $this->UDK = $_UDK;
    }
    
    public function setBBK($_BBK)
    {
        $this->BBK = $_BBK;
    }
    
    public function setAmountCopy($_amountCopy)
    {
        $this->amount_copy = $_amountCopy;
    }

    //les geters 

    public function getIdBook()
    {
        return $this->id_book ;
    }

    public function getTtitle()
    {
        return $this->title ;
    }
    public function getAuthor()
    {
        return $this->author ;
    }
    public function getYearPub()
    {
        return $this->yearPub ;
    }

    public function getPlacePub()
    {
        return $this->placePub ;
    }
    
    public function getStockNum()
    {
        return $this->stokNum ;
    }
    
    public function getUDK()
    {
       return $this->UDK ;
    }
    
    public function getBBK()
    {
        return $this->BBK ;
    }
    
    public function getAmountCopy()
    {
     return $this->amount_copy ;
    }
    //requete sql pour rassem
    //SELECT * FROM (reader INNER JOIN issue ON (reader.id_reader = issue.reader)) INNER JOIN info_books ON (issue.book = info_books.id_book) WHERE reader.id_reader = 1 

    public function booksWithReader($id_user)
    {       


    }

    public function bookList(){

        $db = Database::connect();
        $req = $db->query("SELECT * FROM info_books");
        $result = array();
        while($row = $req->fetchObject()){
            $result[] = $row;
        }

        return $result;
        Database::disconnect();

    }
    //SELECT * FROM (fines INNER JOIN issue ON (fines.id_issue = issue.id_issue)) INNER JOIN reader ON (reader.id_reader = issue.reader) INNER JOIN info_books ON (issue.book = info_books.id_book) WHERE reader.id_reader = 1; 
    
    //SELECT * (FROM issue INNER JOIN reader ON (reader.id_reader = issue.reader)) INNER JOIN info_books ON (issue.book = info_books.id_book) WHERE reader.id_reader = 1; 
    

    public function bookListForReader($_id_redear){
        $db = Database::connect();
        $req = $db->query("SELECT * FROM (reader INNER JOIN issue ON (reader.id_reader = issue.reader)) INNER JOIN info_books ON (issue.book = info_books.id_book) WHERE reader.id_reader = $_id_redear 
        ");
        $result = array();
        while($row = $req->fetchObject()){
            $result[] = $row;
        }

        return $result;
        Database::disconnect();

    }
    //SELECT * FROM info_books WHERE title like '%pe%' OR author LIKE '%pe%' ORDER BY title

    public function seachTitle($Seachtitle){
        
        $db = Database::connect();

        $req = $db->query("SELECT * FROM info_books WHERE title like '%" . $Seachtitle . "%'  OR author LIKE '%" . $Seachtitle . "%' ORDER BY title");
        $result = array();

        while($row = $req->fetchObject()){
            $result [] = $row;
        }
        return $result;
        Database::disconnect();
    }

    public function issueFines($_id_reader){

        $db= Database::connect();
        $req = $db->query("SELECT * FROM issue INNER JOIN reader ON (reader.id_reader = issue.reader) INNER JOIN info_books ON (issue.book = info_books.id_book) WHERE reader.id_reader = $_id_reader
        ");
        $result = array();

        while($row = $req->fetchObject()){
            $result[] = $row;
        }
        return $result;
        Database::disconnect();

    }

    public function finesReader( $id_issues){

        $receipt = random_int(12345,98765);
        $expir = 1;
        $somme = 3;
        $db = Database::connect();
        $sql = "INSERT INTO fines (id_issue ,expired , sum ,receipt_num , status_pay) VALUES(?,?,?,?,?)";
        $statment = $db->prepare($sql);
        $statment->execute(array($id_issues , $expir , $somme , $receipt , 0 ));
        Database::disconnect();
    }

    public function updateFines($id_issues){
        $db = Database::connect();
        $sql = "SELECT expired ,sum FROM fines WHERE id_issue = ?";
        $statment = $db->prepare($sql);
        $statment->execute(array($id_issues));
        $fine = $statment->fetch();
        Database::disconnect();
        $somme = $fine['sum']+3;
        $daypass = $fine['expired']+1; 
        $db2 = Database::connect();
        $sql2 = "UPDATE fines set expired = ? , sum = ? WHERE id_issue = ?";
        $statment2 = $db2->prepare($sql2);
        $statment2->execute( array($daypass, $somme , $id_issues));
        Database::disconnect();
    }

    public function finesExist($id_issues){
        $db  = Database::connect();
        $sql = "SELECT * FROM fines WHERE id_issue = ?";
        $req =$db->prepare($sql);
        $req->execute(array($id_issues));
          $exist = $req->rowCount();
        return $exist;
         Database::disconnect();
    }

    public function finesOfReader($_id_reader){
        $db= Database::connect();
        $req = $db->query("SELECT * FROM (fines INNER JOIN issue ON (fines.id_issue = issue.id_issue)) INNER JOIN reader ON (reader.id_reader = issue.reader) INNER JOIN info_books ON (issue.book = info_books.id_book) WHERE reader.id_reader = $_id_reader 
        ");
        $result = array();

        while($row = $req->fetchObject()){
            $result[] = $row;
        }
        return $result;
        Database::disconnect();
    }

}



?>