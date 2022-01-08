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
    // ---> debut CRUD (Create Read Update Delete) REST API pour *** Categories
    // inserer une catégorie
    if ($action == 'create') {
        $CategorieName = $_POST['CategorieName'];
        
        //to prevent from mysqli injection 
        $CategorieName = stripslashes($CategorieName);
        
        
        $sql = "INSERT INTO categorie(CategorieId,CategorieName) VALUES (NULL,'$CategorieName')";
        $result = $con -> query($sql);

            if($result === true){  
                    $request['message'] = "Catégorie Enregistrer avec success";
                                
                    }  
                    else{  
                        $request['error'] = true;
                        $request['message']="Probléme d'enregistrement de donnée";
                    }

    }
    // mettre ajour une catégorie 
    if ($action == 'update') {

        $CategorieId = $_POST['CategorieId'];
        $CategorieName = $_POST['CategorieName'];

        $CategorieName = stripslashes($CategorieName);

        $sql = "UPDATE categorie SET CategorieName = '$CategorieName' WHERE CategorieId = '$CategorieId'";
        $result = $con -> query($sql);
            if ($result === true) {
                $request['message'] = "la modification des données réussi";
            } else {
                $request['message'] = "Erreur de Modification des données ..!";
            }

    }
    // supprimer une catégorie
    if ($action == 'delete') {
        $id = $_POST['id'];
        
        $sql = "DELETE FROM categorie WHERE CategorieId = '$id' ";
        $result = $con -> query($sql);
            if ($result == true) {
                $request['message'] = "Suppression de Catégorie ";
            } else {
                $request['message'] =  "Erreur de suppression de catégorie";
             }
    }
    // seléctionner une catégorie
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
    // ---> debut CRUD (Create Read Update Delete) REST API pour *** Produits
    // Enregister un nouveau produit
    if ($action == 'createProduct') {

        $RefCategorie = $_POST['RefCategorie'];
        $ProductName = $_POST['ProductName'];
        $ProductDecrip = $_POST['ProductDecrip'];
        $PhotoFileName =  $_POST['PhotoFileName'];

        // to prevent from mysqli injection 
        $RefCategorie =  stripslashes($RefCategorie);
        $ProductName =  stripslashes($ProductName);
        $ProductDecrip =  stripslashes($ProductDecrip);
        $PhotoFileName =  stripslashes($PhotoFileName);

        
        $sql = "INSERT INTO `products`(`ProductId`, `RefCategorie`, `ProductName`, `ProductDecrip`, `PhotoFileName`) VALUES (NULL,'$RefCategorie','$ProductName','$ProductDecrip','$PhotoFileName')";
        $result = $con -> query($sql);

            if($result === true){  
                $request['message'] = "Produit Enregistrer avec success";  
            }  
            else{  
                $request['error'] = true;
                $request['message']="Probléme d'enregistrement de donnée";
            }

    }
    // filter les produits par categorie
    if ($action == 'Filter_Products') {
        $sql = "SELECT * FROM products";  
            $result = $con -> query($sql);
            $count = mysqli_num_rows($result); 
            $NameProducts = array();

            if($count > 0){  
                while($row = $result -> fetch_assoc()) {
                    array_push($NameProducts, $row);
                }
            $request['error'] = false;
            $request['message'] = $NameProducts;
                        
            }  
            else{  
                $request['error'] = true;
                $request['message']=" Error!";
            }

    }
    // mettre a jour un produit
    if ($action == 'Update_Product') {

        $ProductId = $_POST['ProductId'];
        $ProductName = $_POST['ProductName'];
        $RefCategorie = $_POST['RefCategorie'];
        $ProductDecrip = $_POST['ProductDecrip'];
        $PhotoFileName =  $_POST['PhotoFileName'];

        

        // to prevent from mysqli injection 
        $ProductId =  stripslashes($ProductId);
        $RefCategorie = stripslashes($RefCategorie);
        $ProductName =  stripslashes($ProductName);
        $ProductDecrip =  stripslashes($ProductDecrip);
        $PhotoFileName =  stripslashes($PhotoFileName);

        $sql = "UPDATE `products` SET `RefCategorie`='$RefCategorie',`ProductName`='$ProductName',`ProductDecrip`='$ProductDecrip',`PhotoFileName`='$PhotoFileName' WHERE `ProductId`='$ProductId'";
        $result = $con -> query($sql);
            if ($result === true) {
                $request['message'] = "la modification des données réussi";
            } else {
                $request['message'] = "Erreur de Modification des données ..!";
            }

    }

    if ($action == 'delete_Produit') {
    $ImageName = '';

        $id = $_POST['id'];
        $ImageName = $_POST['PhotoFileName'];
        
        $sql = "DELETE FROM products WHERE ProductId = '$id' ";
        $result = $con -> query($sql);
            if ($result == true) {
                $request['message'] = "Suppression de Produit ";
            } else {
                $request['message'] =  "Erreur de suppression de produit";
             }

    // supprimer l'image du repertoire avec la function unlink  
    unlink('upload/'.$ImageName); 
    }

$con -> close();
echo json_encode($request);// encode Data
die();
?>