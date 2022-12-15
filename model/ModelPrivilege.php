<?php

class ModelPrivilege extends Crud {

    protected $table = 'privilege';
    protected $primaryKey = 'id';


    protected $fillable = ['privilege', 'id'];
}