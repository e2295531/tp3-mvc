<?php


class ModelProjet extends Crud{

    protected $table="projet";
    protected $primaryKey="projetId";


    protected $fillable=['projetId','titre','dateDebut','dateFin'];
   



}
?>