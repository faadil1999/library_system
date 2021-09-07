<?php

    include 'principal.php';

    require 'form_handlers/classes/Reader.php';
    
    require 'form_handlers/classes/Books.php';

    include 'navigation.php';
?>

<body class="library">
    <div class="container">
        <table class="table bckListBook">
                <thead class="thead-light">
                  <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Year Publication</th>
                    <th>Place Publication</th>
                    <th>amount Copy</th>
                  </tr>
                </thead>
                  <tbody>
                 
                  <?php
    $book = new Book();
  
   

    foreach($book->bookList() as $livre){

        ?>
        <tr>
                  <td><?php echo $livre->title ;?></td>
                  <td><?php echo $livre->author ;?></td>
                  <td><?php echo $livre->yearPub ;?></td>
                  <td><?php echo $livre->placePub ;?></td>
                  <td><?php echo $livre->amount_copy ;?></td>
        </tr>          
<?php
    }

?>
    
    </div>
