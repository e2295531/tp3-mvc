<?php


class ModelDeveloppeur extends Crud{

    protected $table="developpeur";
    protected $primaryKey="devId";


    protected $fillable=['devId','nom','adresse','email','tel'];
   



}
?>