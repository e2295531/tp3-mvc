 <?php
 
 session_start();
date_default_timezone_set('UTC');
 require_once __DIR__.'/library/RequirePage.php';
 require_once __DIR__.'/vendor/autoload.php';
 require_once __DIR__.'/library/Twig.php';
 require_once __DIR__.'/library/Validation.php';
 require_once __DIR__.'/library/CheckSession.php';

require "vendor/autoload.php";

use dompdf\dompdf;
 
 require_once __DIR__.'/model/Crud.php';
 require_once __DIR__.'/model/ModelJournal.php';

 if(isset($_GET["url"]) && isset($_SESSION['user_nom'])){
    $page= $_GET["url"];
    $nom= $_SESSION['user_nom'];
 }
 else{
    $page='accueil';
    $nom='visiteur';
    
 }
 

  $data=['date'=>date('y-m-d'),'ip'=> $_SERVER['REMOTE_ADDR'],'userName'=>$nom,'page'=> $page];
 
  //print_r($data);

 $Journal=new ModelJournal();
 $insertJ= $Journal->insert($data);





//$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';
$url = isset($_GET["url"]) ? explode ('/', ltrim($_GET["url"], '/')) : '/';



if($url == '/'){
    require_once 'controller/ControllerHome.php';
    $controller = new ControllerHome;
    echo $controller->index();
}else{
    $requestURL = $url[0];
    $requestURL = ucfirst($requestURL);
    $controllerPath = __DIR__.'/controller/Controller'.$requestURL.'.php';

    if(file_exists($controllerPath)){
        require_once($controllerPath);
        $controllerName = 'Controller'.$requestURL;
        $controller = new $controllerName;
        if(isset($url[1])){
                $method = $url[1];
                if(isset($url[2])){
                    $value = $url[2];
                    echo $controller->$method($value);
                }else{
                    echo $controller->$method();
                }
        }else{
            echo $controller->index();
        }
        
    }else{
        require_once 'controller/ControllerHome.php';
        $controller = new ControllerHome;
        echo $controller->error();
    }
}



?>