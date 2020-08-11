<?php
    $con = mysqli_connect("localhost", "root", "");
    mysqli_select_db($con, "gkbh");

    if(!$con){  
        echo 'not connect to the server';  
    }  
    if(!mysqli_select_db($con,'gkbh')){  
        echo 'database not selected';  
    }
    $Fname = $_POST['fname'];
    $lname = $_POST['Lname'];
    $usern = $_POST['register_username'];
    $pass = $_POST['register_password'];
    $Email = $_POST['register_email'];
    $contact = $_POST['contact '];
    $address = $_POST['home address'];
    $city = $_POST['city'];
    if($pass == $cPass){
        $hash = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 11));
        $sql = "INSERT INTO `customer`(`First Name`, `Last Name`, `User Name`, `Password`, `Email Address`, `Contact Number`, `Home Address`, `City`) VALUES  ('$fname','$lame','$usern','$pass','$Email','$contact','$address','$city')";
        if(!mysqli_query($con,$sql)){
            echo $fame, "\n";
            echo $lame, "\n";
            echo $Email, "\n";
            echo $pass, "\n";
            echo 'Not inserted';  
        }  
        else{  
            echo 'Data Inserted';  
        }  
        header("refresh:3; url=../index.html");
    }else{
        echo "Passwords donot match";
    }
?>