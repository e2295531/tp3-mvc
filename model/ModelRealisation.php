<?php


class ModelRealisation extends Crud{

    protected $table="realisation";
    protected $primaryKey='ReProjetId';
    protected $secondKey='ReProjetId';


    protected $fillable=['ReProjetId','ReProjerId'];
   



}
?>