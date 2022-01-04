<?php

//phpinfo();
   
      
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Allow every origin in $_SERVER['HTTP_ORIGIN'] 
        
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
        header("content-type: application/json");
    }
    
    // received options requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
        exit(0);
    }



// Initialize the session
session_start();

$_POST = json_decode($_POST['data'],true); // decode data
require_once 'config.php';
$username = $_POST['user'];  
$password = $_POST['pwd'];  

      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "select * from users where username = '$username' and password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
           $request['message'] = "Successfuly";
                     
        }  
        else{  
            $request['error'] = true;
            $request['message']="E-mail ou mot de passe invalide";
        }

        $con -> close();
        echo json_encode($request);// encode Data
        die();
?>