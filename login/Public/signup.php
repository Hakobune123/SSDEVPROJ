<?php

    require "../private/autoload.php"; 
    $Error = "";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = $_POST['email']; 
        if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
        {
            $Error = " Please enter a valid email address";
        }

        $date = date("Y-m-d H:i:s");
        $user_name = $_POST['user_name']; 

        $url_address = a(60);
        $password = $_POST['password'];

        $query = "insert into users (url_address, user_name, password, email, date) values ('$url_address','$user_name', '$password', '$email', '$date')";

        echo  $query;

        mysqli_query($connection, $query); 

    }

?>


<! DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<form method= "post">

        <div><?php
            if(isset($Error) && $Error != ""){

                echo $Error;

            }


        ?></div>



    <div>Signup</div>
    <input type="varchar" name="user_name" required><br><br>
    <input type="email" name="email" required><br><br>
    <input type="password" name="password" required><br><br>

    <input type= "submit" value= "signup">
</form>

</body>
</html>