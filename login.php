<?php

require('./config.php');
$msg = "";

 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email=$_POST["email"];
    $password=$_POST["password"];
    // echo $email;
    // echo "<br>";
    // echo $password;
    do{
        if(empty($email) ||  empty($password)){
                $msg =  "All fields Required";
                // break;
            }
            // if($sql){
            //     $msg = "Sucesss";
            //     header("Location:index.php");
            //     exit;
            //  }
            //  else{
            //     $msg  ="msg went wrong". mysqli_error($db);
            //  }
            else{
                $sql = mysqli_query($db,"SELECT * FROM  `users`  WHERE email='$email'");
                $row=mysqli_fetch_assoc($sql);
           if(mysqli_num_rows($sql)>0){

            if($password != $row["password"]){

                $msg = "Wrong Password";
            }
            else {
                $msg = "Success";
                session_start();
                $_SESSION["id"]=$row["id"];
                $_SESSION["name"]=$row["name"];
                $_SESSION["image"]=$row["image"];
                header("Location:index.php");
                exit;
            }
           } 

           else {
            
            $msg = "User Not Registered";
           }

        }
     } while(false);
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Sign up form</title>
    <!-- stylesheet -->
<link rel="stylesheet" href="./css/form.css">
<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="wrapper">
        <h1>Login</h1>

        <?php
        if(!empty($msg)){
            echo "
        <div class='msg'>
            <h1><strong>$msg</strong></h1>
        </div>
        ";
        }
        ?>
        <form action="#" method="post">
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <div class="recover">
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit">Login</button>
        </form>
        <div class="member">
            Not a member? <a href="./signup.php">Register Now
            </a>
        </div>
        <div class="member">
            Back to <a href="./index.php">Home page
            </a>
        </div>
    </div>
</body>
</html>