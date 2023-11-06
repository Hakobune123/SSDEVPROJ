<?php

    require "../private/autoload.php"; 
    $Error = "";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = $_POST['email']; 
        if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
        {
            $Error = " Please enter a valid email address";
        }

        $PermissionsLvl = 0;
        $user_name = esc($_POST['user_name']); 

        $url_address = a(60);
     //   $url_address = "FixmeLater";

        $password = esc($_POST['password']);


        if ($Error == "") {
            $query = "INSERT INTO users (url_address, user_name, password, email, PermissionsLvl) VALUES (:url_address, :user_name, :password, :email, :PermissionsLvl)";
    
            $stmt = $connection->prepare($query);
            
            $stmt->bindParam(':url_address', $url_address);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':PermissionsLvl', $PermissionsLvl);
            echo $query;
            $stmt->execute();
    
        }

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
