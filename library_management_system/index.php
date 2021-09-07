

<?php include 'principal.php'; ?>

<?php
require 'form_handlers/register_handler.php';
require 'form_handlers/login_handler.php';



?>
<body class="library">

<?php

    
        if(isset($_POST["register_button"])){
    
            echo '
        <script >

            $(document).ready(function(){
        
                $("#form_registration").show();
                $("#form_login").hide();
        
            });
    
         </script>
        ';
    }else{
        echo'      <script >

        $(document).ready(function(){
        
            $("#form_registration").hide();
            $("#form_login").show();
        
        });
        
        </script>';
    }


?>
   


    <div class="container">
        <div class="row">
           
            <div class="login_box">

                <div class="header_form">
                    <h2>Library club</h2>
                </div>

                <div id="form_registration">
                    <form action="index.php" method="post" >
                            <h4>Registration</h4>
                            <label for="first_name" class="elem_form">First name:
                                <input type="text" name="first_name" class="form-control" value=''>
                                <p class="errorComment"><?php echo $errorFirstname; ?></p>
                            </label>
                            <br>
                            <label for="last_name" class="elem_form">Last name: 
                                <input type="text" name="last_name" class="form-control" value=''>
                                <p class="errorComment"><?php echo $errorLastName; ?></p>
                            </label>
                            <br>
                            <label for="adresse" class="elem_form">Address:
                                <input type="text" name="adresse" class="form-control" value=''>
                                <p class="errorComment"><?php echo $errorAdress; ?></p>
                                
                            </label>
                            <br>
                            <label for="num_tel" class="elem_form">Phone:
                                <input type="tel" name="num_tel" class="form-control" value=''>
                                <p class="errorComment"><?php echo $errorNumTel; ?></p>
                            </label>
                            <br>
                            <label for="password" class="elem_form">Password:
                                <input type="password" name="password" id="" class="form-control">
                                <p class="errorComment"><?php echo $errorPassword; ?></p>
                            </label>
            
                            <br>
                            <input type="submit" name="register_button" class="btn btn-primary" id="send_form" value="Register"> 
                        
                            <br>
                            <a id="sign_up" href="#">Already have an account ? Log in here</a>
                    </form>
                </div>
          
                <div id="form_login">
                    <form action="index.php" method="post">
                    <h4>Log in</h4>
                        <label for="num_tel" class="elem_form">Phone:
                                <input type="tel" name="num_tel" class="form-control" value=''>
                                <p class="errorComment"><?php echo  $errorTel ;?></p>
                        </label>
                        <br>
                        <label for="password" class="elem_form">Password:
                            <input type="password" name="password" id="" class="form-control">
                            <p class="errorComment"><?php echo $errorPasswordLog ;?></p>
                        </label>
                        <br>
                        <button type="submit" name="login_button" class="btn btn-primary" id="send_form">Login</button>
                        <br>
                        <a id="sign_in" href="#">Need an account ? Register here!</a>
                    </form>
                </div>
            </div>         
        </div>
    
    </div>
           
</body>
</html>