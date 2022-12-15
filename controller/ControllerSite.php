<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelSite');
RequirePage::requireModel('ModelProjet');
require "vendor/autoload.php";

use Dompdf\Dompdf;

class ControllerSite{

    public function index(){
       $site =new ModelSite;
       $projet=new ModelProjet;
       $selectProjet=$projet->select('projetId');
       $selectSite=$site->select('siteId');
       
       //print_r($selectProjet);
        Twig::render('site-index.php',['sites'=>$selectSite,'projets'=>$selectProjet,'site_list'=>"Liste de site"]);
       
    }

    public function create(){
        $projet=new ModelProjet;
       $selectProjet=$projet->select('projetId');
        Twig::render('site-create.php',['projets'=>$selectProjet]);
    }
    public function store(){
       

         $validation = new Validation;
        extract($_POST);
        $validation->name('nomSite')->value($nomSite)->pattern('alpha')->required()->max(45);
        $validation->name('prix')->value($prix)->pattern('int')->required()->max(50);
       
        
         if($validation->isSuccess()){
            $site = new ModelSite;
             $insert=$site->insert($_POST);
             RequirePage::redirectPage('site');
            
        }else{
            $errors = $validation->displayErrors();
            $projet = new ModelProjet;
            $selectProjet = $projet->select('projetId');
            twig::render('site-create.php', ['errors' => $errors,'projets'=>$selectProjet, 'site' => $_POST]);
        }

       

       
      
     }
     public function show($id){

        $site= new ModelSite;
        $projet=new ModelProjet;
        $selectProjet=$projet->select('projetId');
        $selectsite =$site ->selectId($id);

        twig::render('site-show.php',['site' => $selectsite,'projets'=>$selectProjet]);
     }
     public function edit($id){
        $site= new ModelSite;
        $projet=new ModelProjet;
        $selectProjet=$projet->select('projetId');
        $selectsite =$site ->selectId($id);

        twig::render('site-edit.php',['site' => $selectsite,'projets'=>$selectProjet]);
     }
     public function update(){
      $site = new ModelSite;
      $update = $site->update($_POST);
      print_r($update);
      RequirePage::redirectPage('site');
  }
  public function delete(){
      $site = new ModelSite;
      $delete = $site->delete($_POST['siteId']);
      RequirePage::redirectPage('site');

  }
    public function print($id)
    {
        $site = new ModelSite;
        $projet = new ModelProjet;
        $selectProjet = $projet->select('projetId');
        $selectSite  = $site->selectId($id);

       
        
       
        //// génère des PDF 
        $dompdf = new Dompdf();
        ob_start();
        require('./view/pdf-view.php');
        $html = ob_get_contents();
        ob_get_clean();

        $dompdf->loadHtml($html);

        // (Facultatif) Configurer le format et l'orientation du papier
        $dompdf->setPaper('A4', 'portrait');

        // Rendre le HTML au format PDF
        $dompdf->render();

        //Exporter le PDF généré vers le navigateur
        $dompdf->stream('print-details.pdf', ['Attachment' => false]);
       
    }
  
}
?>