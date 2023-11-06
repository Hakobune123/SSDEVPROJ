<?php

    require "../private/autoload.php"; 
    $Error = "";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST"){

        $email = $_POST['email']; 
        if(!preg_match("/^[\w\-]+@[\w\-]+.[\w\-]+$/", $email))
        {
            $Error = " Please enter a valid email address";
        }

        $password = e$_POST['password'];


        $arr['password'] = $password
        $arr['email'] = $email

        $query = "select * from users where email = :email && password = password limit 1";
        $stm = $connection -> prepare($query);
        $check = $stm->execute($arr);
        

        if($check){

            $data = $stm->fetchAll(PDO::FETCH_OBJ);
                if(is_array($data)){
    
                    $data = $data[0];
                    $_SESISON['url_address'] = $data
                    header("location: index.php");
                    die;
                }           

         }







    }

?>


<! DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<form method= "post">

        <div><?php
            if(isset($Error) && $Error != ""){

                echo $Error;

            }


        ?></div>



    <div>Login</div>
    <input type="varchar" name="user_name" required><br><br>
    <input type="password" name="password" required><br><br>

    <input type= "submit" value= "Login">
</form>

</body>
</html>
