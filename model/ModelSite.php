<?php


class ModelSite extends Crud{

    protected $table="site";
    protected $primaryKey="siteId";


    protected $fillable=['siteId','nomSite','prix','siteProjetId'];
   



}



?>