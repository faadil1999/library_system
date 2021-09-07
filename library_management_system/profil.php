<?php include 'principal.php';

require 'form_handlers/classes/Reader.php';
require 'form_handlers/classes/Books.php';

$obj = new Reader();


$obj->loadDataReader($_SESSION['log_num_tel'],$_SESSION['log_password']);

/*echo $obj->getFirstName()." <br>";
echo $obj->getDateRegistr()."<br>";
echo $obj->getLastName()." <br>";
echo $obj->getTelNum()." <br>";
echo $obj->getAdress()." <br>";
*/

$livre = new Book();
$livre ->bookListForReader($obj->getIdReader());


?>

<script >
  $(document).ready(function(){
    $(".Mybooks").hide();
    $(".data_personal").show();

  });

</script>

<body class="library">

<?php
  include 'navigation.php';
?>

    <div class="container">
      <div class="row profil_data">
              <div class="col-md-12 profil"><h3>Profil of <?php echo $obj->getFirstName() ;?></h3></div>
              <div class="col-md-5 pic_pro">
                <img class="img-fluid" src="assets/images/user.png" alt="user">
              </div>
              <div class="col-md-6 data_personal" >  
                <label for="first_name">First name: <p name="firt_name"><?php echo $obj->getFirstName(); ?></p></label>
                <br>
                <label for="second_name">Second name: <p name="second_name"><?php echo $obj->getLastName(); ?></p></label>
                <br>
                <label for="phone">Phone number: <p name="phone"><?php echo $obj->getTelNum(); ?></p></label>
                <br>
                <label for="address">Address: <p name="address"> <?php echo $obj->getAdress();?></p></label>
                <br>
                <label for="date_registr">Date registration:<p name="date_registr"><?php echo $obj->getDateRegistr(); ?></p></label>
                <br>
                <button class="btn btn-primary" id="mybooks">Books with me</button>
              </div>       
             <div class="col-md-6 Mybooks">
             
              <table class="table bckListBook">
                <thead class="thead-light">
                  <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>data taken</th>
                    <th>date delive</th>
                    <th>status delive</th>
                  </tr>
                </thead>
                  <tbody>
        
       
             <?php
              foreach($livre ->bookListForReader($obj->getIdReader()) as $livre_user){

            
             ?>
                <tr>
                  <td><?php echo $livre_user->title ;?></td>
                  <td><?php echo $livre_user->author ;?></td>
                  <td><?php echo $livre_user->date_out ;?></td>
                  <td><?php echo $livre_user->date_deliv ;?></td>
                  <td><?php if($livre_user->status_deliv == 1)
                              {echo "Yes";}
                            else{
                              echo "No";
                            }    ;?></td>
                </tr>
                
               <?php
               
              }
               ?>
                  </tbody>
                </table>
               <button class="btn btn-primary" id="personalData">Personal data</button>
            </div>
        
      </div>
</body>
</html>