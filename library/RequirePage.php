<?php
class RequirePage{
 static public function requireModel($page){
 return require_once 'model/'.$page.'.php';
 }

 static  public function redirectPage($page){
      
    
      return header("location:http://localhost/tp3-mvc/$page");
 }
}
?>