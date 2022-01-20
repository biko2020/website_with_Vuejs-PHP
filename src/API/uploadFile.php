<?php 

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
        
        header("Access-Control-Allow-Methods: POST, PUT, GET, OPTIONS");
    
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}


$_POST = json_decode($_POST['data'],true); // decode data


if (isset($_GET['action'])) {

    $action = $_GET['action'];

}

$destination_path ='';
$image_name = '';
$File_Extention ='';
$image = '';

 // repertoir de destination
if ($action == 'slide') {
    $destination_path = 'uploadSlide/';
}

if ($action == 'products') {
    $destination_path = 'upload/';
}

if ($action == 'partenaire') {
    $destination_path = 'uploadPartenaire/';
}

if ($action == 'fournisseur') {
    $destination_path = 'uploadFournisseur/';
}

    //si le nom du fichier n'est pas vide
if (!empty($_FILES))  {
      
    if(isset($_FILES['monFichier']['name']))
    {
    // récuperer le nom du fichier
    $image_name = $_FILES['monFichier']['name']; 

    // les extentions autorisees
    $Valid_Extentions = array("jpg","jpeg","png");

    // l'extention de notre fichier
    $File_Extention = pathinfo($image_name, PATHINFO_EXTENSION);

    // si l'extention de notre fichier se trouver parmis les extentions autorisees
    if(in_array($File_Extention, $Valid_Extentions))
    {
        
    // repertoir de destination
    
       $destination_path = $destination_path; // $destination_path = __DIR__.'/upload/'.$image_name;
    
    // fichier source
    $target_path =  basename( $_FILES["monFichier"]["name"]);//$target_path = 'upload/' . time() . '.' . $extension;
    // fichier temporaire
    $tmp_path = $_FILES['monFichier']['tmp_name'];
  
    // deplacer le fichier du repertoir temporaire vers le répertoir de destination 
    if (move_uploaded_file($tmp_path, $destination_path.$target_path))
       {
       // si oui recupere le fichier dans la variable $image   
       $message = 'image charger avec success !';
       $image = $target_path;
       }
       else{
       //si non il y a un probleme    
       $message = 'Erreur de Télechargement du fichier ...!';
       }
       }
       else{
       $message = 'Seulement les extentions .jpg, .jpeg and .png a upload';
       }
       }
       else{
       $message = 'sélectionner l image';
       }
   
    $request = array(
    'message'  => $message,
    'image'   => $image
    );

    echo json_encode($request);
}


?>
