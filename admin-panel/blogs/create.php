<?php
   session_start();

   if($_SESSION["id"] == true){
   
       $name = $_SESSION["name"];
       $image = $_SESSION["image"];
   
       require_once('../../config.php');
       if($_SERVER["REQUEST_METHOD"] == "POST"){
           $title = $_POST['title'];
           $description = addslashes($_POST["description"]);
           $category = $_POST['category'];
   
           $blogid = md5(substr($title,0,3).substr($category,0,3).random_int(10000,99999));
   
           $target = '../../db-images/blogs/';
           $filename = $_FILES["image"]["name"];
           $filetype = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
           $target_file = $target.basename(md5("blogid".$filename).".".$filetype);
           $file = md5("blogid".$filename).".".$filetype;
   
           do{
               if(empty($title) || empty($description) || empty($category) || empty($file)){
                   $msg = "All fields are required";
               }
               else{
                   if($filetype == "jpg" || $filetype == "jpeg" || $filetype == "png"){
                       if(move_uploaded_file($_FILES["image"]["tmp_name"],$target_file)){
                           $sql = mysqli_query($db, "INSERT INTO `blogs`(`title`, `description`, `image`, `category`, `author`, `blogid`) VALUES ('$title','$description','$file','$category','$name','$blogid')");
                           if($sql){
                               $mgs = "Success";
                               header("Location: index.php");
                               exit;
                           }
                           else{
                               $msg = "Something went wrong" . mysqli_error($db);
                           }
                       }
                       else{
                           $msg = "Image not Moved";
                       }
                   }
                   else{
                       $msg = "Image Not Accepted";
                   }
               }
           }while(false);
       }
   
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive admin dashboard</title>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/admin.css">
    
    <!-- Box Icons Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>


    <!----------------MAIN SECTION ----------------------------->
    <div class="main">
        <!------------- Top Search Bar ---------------------->
        <div class="topbar">
            <div class="name">
                Welcome <?php echo $name; ?>
            </div>
            <div class="user">
            <?php
                    echo "<img src='../../db-images/users/$image'>";
                ?>
                 <?php echo "$image" ?>
            </div>
            <a href="../../index.php" class="admin-btn btn-blg">Back to home</a>

        </div>

        <!-- Admin Content -->
        <div class="admin-content">
            <div class="button-group">
                <a href="./create.php" class="admin-btn btn-blg">Add Blog</a>
                <a href="./index.php" class="admin-btn btn-blg">Manage Blogs</a>
                
            </div>
           
            <div class="content">
                <h2 class="page-title">Create a Blog</h2>
                <?php

            if(!empty($msg)){
                echo "
                    <div class='message'>
                        <h4><strong>$msg</strong></h4>
                    </div>
                ";
            }

        ?>

                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" id="" class="text-input">
                    </div>
                    <div>
           <label>Description</label>
             <textarea name="description" id="body" rows="30" cols="178"></textarea>
            </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    <!-- <div>
                        <label>Topic</label>
                        <select name="topic" class="text-input">
                            <option value="">Graphic Designing</option>
                            <option value="">Video Editing</option>
                        </select>
                    </div> -->
                    <div>
                        <label>Category</label>
                        <input type="text" name="category" id="category" class="text-input">
                    </div>
                    <div>
                        <button type="submit" class="admin-btn btn-blg">Add Post</button>
                    </div>
                </form>

            </div>

        </div>
    </div>


    <!----- CkEditor 5 Script -------------------->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>

    <script src="../js/script.js"></script>

</body>
</html>
<?php 
}
else{
    header("Location: ../../index.php");
}

?>