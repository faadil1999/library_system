<?php

    include 'principal.php';

    require 'form_handlers/classes/Reader.php';
    
    require 'form_handlers/classes/Books.php';

    include 'navigation.php';
    
    $obj2 = new Reader();

    $obj2->loadDataReader($_SESSION['log_num_tel'],$_SESSION['log_password']);
?>
<script>
     $(document).ready(function() {
        // auto refresh page after 1 second
        setInterval('refreshPage()', 50000);
    });
 
    function refreshPage() { 
        location.reload(); 
    }

</script>


<body class="library">
    <div class="container">
        <table class="table bckListBook">
                <thead class="thead-light">
                  <tr>
                    <th>Days expired</th>
                    <th>Sum</th>
                    <th>Receipt num</th>
                  </tr>
                </thead>
                  <tbody>
                  <?php
    $book = new Book();
    $today = date("Y-m-d");
    $deadLineTime = date("23:58");
    $currentTime = date("H:i"); 

    foreach($book->issueFines($obj2->getIdReader()) as $fines){
      $datedb = date( $fines->date_deliv ) ;
      if($today > $datedb && $fines->status_deliv == 0){
       // echo"yessss";
        //echo $currentTime;
        //echo $deadLineTime;  
        if($book->finesExist($fines->id_issue) == 0){
        $book->finesReader($fines->id_issue);
        }

        if($fines->status_deliv == 0 && $currentTime == $deadLineTime ){
          $book->updateFines($fines->id_issue);
        }
      }
     

    } 
    foreach($book->finesOfReader($obj2->getIdReader()) as $fines){
      if($fines->status_pay == 0){
     
        ?>
        <tr>
                  <td><?php echo $fines->expired ;?></td>
                  <td><?php echo $fines->sum ;?></td>
                  <td><?php echo $fines->receipt_num ;?></td>
                 
        </tr>          
<?php
    }
  }

?>
    
    </div>
