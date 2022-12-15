<?php

class ControllerHome{

    public function index(){
      //return 'Welcome';
      $data=['name' => 'petter', 'Welcome'=>'Welcome'];
      twig::render("home-index.php",$data);

     
    }

    public function error(){
      twig::render("home-error.php");
    }
}