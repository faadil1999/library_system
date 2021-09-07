$(document).ready(function(){


    $("#sign_up").click(function(){
        $("#form_login").slideDown("slow",function(){
            $("#form_registration").slideUp("slow");
        });
    });
  

    $("#sign_in").click(function(){
        $("#form_login").slideUp("slow",function(){
            $("#form_registration").slideDown("slow");
        });
    });

    $("#mybooks").click(function(){
       
        $(".data_personal").fadeOut("slow",function(){
            $(".Mybooks").fadeIn("slow");
        });
    

    });

    $("#personalData").click(function(){
       
        $(".Mybooks").fadeOut("slow",function(){
            $(".data_personal").fadeIn("slow");
        });
    

    })
});