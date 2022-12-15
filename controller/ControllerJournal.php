<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelSite');
RequirePage::requireModel('ModelProjet');
RequirePage::requireModel('ModelJournal');


class ControllerJournal{

    public function index(){
       $journal =new ModelJournal();
       
       
       $selectJournal=$journal->select('id');
       
       //print_r($selectProjet);
        Twig::render('journal-index.php',['journals'=>$selectJournal]);
       
    }
    public function store(){
        $journal =new ModelJournal;
        $insert=$journal->insert($_POST);
        
 
        RequirePage::redirectPage('journal');
        
        

    }

    public function delete(){
        $journal = new ModelJournal;
        $delete = $journal->delete($_POST['id']);
        RequirePage::redirectPage('journal');
  
    }

}