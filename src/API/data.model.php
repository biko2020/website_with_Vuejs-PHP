<?php

        
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Allow every origin in $_SERVER['HTTP_ORIGIN'] 
        
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');     //cache for 1 day
        header("content-type: application/json");
    }
    
    // received options requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            
            header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
        exit(0);
    }




$_POST = json_decode($_POST['data'],true);  //decode data
require_once 'config.php';

if (isset($_GET['action'])) {

    $action = $_GET['action'];

}

    if ($action == 'create') {
        $CategorieName = $_POST['CategorieName'];
        
        //to prevent from mysqli injection 
        $CategorieName = stripslashes($CategorieName);
        
        $sql = "INSERT INTO categorie(CategorieId,CategorieName) VALUES (NULL,'$CategorieName')";
        $result = $con -> query($sql);

            if($result === true){  
                    $request['message'] = "Catégorie Enregistrer";
                                
                    }  
                    else{  
                        $request['error'] = true;
                        $request['message']="Probléme d'enregistrement de donnée";
                    }

    }
       

    if ($action == 'getCategorie') {

        $sql = "SELECT * FROM categorie";  
            $result = $con -> query($sql);
            $count = mysqli_num_rows($result); 
            $NameCategorie = array();

            if($count > 0){  
                while($row = $result -> fetch_assoc()) {
                    array_push($NameCategorie, $row);
                }
            $request['error'] = false;
            $request['NameCategorie'] = $NameCategorie;
                        
            }  
            else{  
                $request['error'] = true;
                $request['message']=" Error!";
            }

    }  

$con -> close();
echo json_encode($request);// encode Data
die();
?>