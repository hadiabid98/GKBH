<?php
    if(!empty($_POST['login_username']) && !empty($_POST['login_password'])){
        $usern = $_POST['login_username'];
        $password = $_POST['password'];
        $con = mysqli_connect("localhost", "root", "");
        mysqli_select_db($con, "gkbh");
        if(!$con){  
            echo 'not connect to the server';  
        }  
        if(!mysqli_select_db($con,'gkbh')){  
            echo 'database not selected';  
        }
        $query = mysqli_query($con, "SELECT * FROM customers WHERE 'User Name'='$login_username'");
        $numrows=mysqli_num_rows($query);
        echo $numrows;
        if($numrows != 0){
            while($row=mysqli_fetch_assoc($query)){
                $dbUsern=$row['User Name'];
                $dbPassword=$row['password'];
                echo $dbUsern;
                echo $dbPassword;
                echo password_verify($password, $dbPassword);

            }
            if($email == $dbUsern && password_verify($password, $dbPassword)){
                echo "done";
                session_start();  
                $_SESSION['sess_user']=$user;  
  
                /* Redirect browser */  
                header("Location: index.html");
            }
        }else{
            echo "Invalid Username or Password";
        }
    }else{
        echo "All fields are mandatory";
    }
?>