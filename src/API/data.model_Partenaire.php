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

//Enregistrer le slide
if ($action == 'create_Partenaire') {

    $PartenaireName = mysqli_real_escape_string($con, $_POST['PartenaireName']);
    $PhotoFileName = $_POST['PhotoFileName'];
       
    $PartenaireName = str_replace("'", "", $PartenaireName);

    $PartenaireName = stripslashes($PartenaireName);


    $sql = "INSERT INTO `partenaire`(`id`, `nom`, `PhotoFileName`) VALUES (NULL,'$PartenaireName','$PhotoFileName')";
    $result = $con -> query($sql);

    
     if($result === true){  
        $request['message'] = "Produit Enregistrer avec succés";  
     }  
    else{  
        $request['error'] = true;
        $request['message']= "Probléme d'enregistrement de donnée";
     }
    
}

   // selectionner les slides

if ($action == 'getPartenaire') {

    $sql = "SELECT * FROM partenaire";  
        $result = $con -> query($sql);
        $count = mysqli_num_rows($result); 
        

        $NamePartenaire = array();

        if($count > 0){  
            while($row = $result -> fetch_assoc()) {
                array_push($NamePartenaire, $row);
            }
        $request['error'] = false;
        $request['NamePartenaire'] = $NamePartenaire;
                             
        }  
        else{  
            $request['error'] = true;
            $request['message']=" Error!";
        }

}  

// mettre a jour un Slide
if ($action == 'Update_Partenaire') {
    
    $id = $_POST['id'];
    $PartenaireName = $_POST['PartenaireName'];
    $PhotoFileName =  $_POST['PhotoFileName'];
    $ImageToDelete = $_POST['ImageToDelete'];
    
    // fonction pour remplacer l'apostrophe 
    $PartenaireName = str_replace("'", "", $PartenaireName);


    // to prevent from mysqli injection 
    $id =  stripslashes($id);
    $PartenaireName =  stripslashes($PartenaireName);

    $PhotoFileName =  stripslashes($PhotoFileName);
    $ImageToDelete = stripslashes($ImageToDelete);

    $sql = "UPDATE `partenaire` SET `nom`='$PartenaireName',`PhotoFileName`='$PhotoFileName' WHERE `id`='$id'";
    $result = $con -> query($sql);
        if ($result === true) {
            $request['message'] = "la modification des données réussi";
            // supprimer l'ancien image dans le repertoir upload par l'image actuelle
            if ($ImageToDelete != $PhotoFileName) {
                unlink('uploadPartenaire/'.$ImageToDelete); 
            }
               
        } else {
            $request['message'] = "Erreur de Modification des données ..!";
        }

}
// supprimer une Slide
if ($action == 'delete_Partenaire') {
    $ImageName = '';

        $id = $_POST['id'];
        $ImageName = $_POST['PhotoFileName'];
        
        $sql = "DELETE FROM partenaire WHERE id = '$id' ";
        $result = $con -> query($sql);
            if ($result == true) {
                $request['message'] = "Suppression de Produit ";
            } else {
                $request['message'] =  "Erreur de suppression de produit";
             }

    // supprimer l'image du repertoire avec la function unlink  
    unlink('uploadPartenaire/'.$ImageName); 
    }
   

$con -> close();
echo json_encode($request);// encode Data
die();

?>