<?php
require('./config.php');

$msg = "";

 if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST['username'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $gender=$_POST['gender'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    $userid = md5(substr($name,0,3).substr($phone,0,3).random_int(10000,99999));
    // echo $userid;
    $target='./db-images/users/';
   $filename=$_FILES["image"]["name"];
//    $filetype1=$_FILES["image"]["type"];
//    echo $filetype1;
//    echo "<br>";
   $filetype=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
//    echo $filename ;
$target_file=$target.basename(md5("userid".$filename).".".$filetype);
$file=md5("userid".$filename).".".$filetype;
do{
    if(empty($name) || empty($email) || empty($phone) || empty($gender) || empty($file) || empty($password) || empty($cpassword)){
            $msg = "All fields Required";
            break;
        }
        elseif($password != $cpassword){
                $msg = "password should match";
                break;
            }
            else{
                if($filetype =="jpg" || $filetype=="jpeg" || $filetype=="png"){
if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
    $sql = mysqli_query($db,"INSERT INTO `users`(`name`, `phone`, `email`, `gender`, `image`, `password`, `userid`) VALUES ('$name','$phone','$email','$gender','$file','$password','$userid')");

    if($sql){
            $msg = "Sucesss";
            header("Location:login.php");
            exit;
         }
         else{
            $msg  ="msg went wrong". mysqli_error($db);
         }
        }

else{
    $msg= "Image not moved";
}
                }
            else
            {
                $msg="Image not accepted";
            }
        }
}while(false);









    // if(empty($name) || empty($email) || empty($phone) || empty($gender) || empty($password) || empty($cpassword)){
    //     echo "All fields Required";
    // }
    // elseif($password != $cpassword){
    //     $msg = "password should match";
    // }
    // else{
    //  $sql = mysqli_query($db,"INSERT INTO `users`(`name`, `phone`, `email`, `gender`, `image`, `password`, `userid`) VALUES ('$name','$phone','$email','$gender','image','$password','$userid')");

    //  if($sql){
    //     $msg = "Sucesss";
    //     header("Location:login.php");
    //     exit;
    //  }
    //  else{
    //     $msg  ="msg went wrong". mysqli_error($db);
    //  }
    // }

    // echo $name;
    // echo $email;
    // echo $phone;
    // echo $gender;
    // echo $password;
    // echo $cpassword;
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="wrapper">
        <h1>Signup</h1>
<?php
        if(!empty($msg)){
            echo "
        <div class='msg'>
            <h1><strong>$msg</strong></h1>
        </div>
        ";
        }
        ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <input type="text" placeholder="Username" name="username">
            <input type="email" placeholder="email" name="email">
            <input type="phone" placeholder="phone" name="phone">
            <div class="gender">
                <div>
                    Gender:<input type="radio" name="gender" value="Male">Male
                </div>
                <div>
                    <input type="radio" name="gender" value="Female"> Female
                </div>
            </div>
           Upload your Image: <input type="file" name="image">
           <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Re-Enter Password" name="cpassword" >
            <button type="submit">Sign Up</button>
        </form>
        <!-- <div class="terms">
            <input type="checkbox" id="checkbox">
            <label for="checkbox">I agree to these <a href="#">Terms & Conditions</a>
            </label>
        </div> -->

        <div class="member">
            Already a member? <a href="./login.php">Login Here
            </a>
            <div class="member">
                Back to <a href="./index.php">Home page </a>
            </div>
        </div>
    </div>
</body>

</html>