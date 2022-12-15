<?php

abstract class Crud extends PDO {

    public function __construct(){

       
       parent::__construct('mysql:host=localhost; dbname=gestion_projet; port=3306; charset=utf8', 'root', '');
       
       
    }

    public function select($champ='id',$secondKey=null ,$order='ASC' ){
        
        if($secondKey!=null){
             $sql = "SELECT * FROM $this->table ORDER BY $champ $order,$secondKey $order ";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll();
        }
       
        else{
           $sql = "SELECT * FROM $this->table ORDER BY $champ $order";
        $stmt  = $this->query($sql);
        return  $stmt->fetchAll(); 
        }
        
        
    }

    public function selectId($value,$secondKey=null){

        if($secondKey!=null){
            $sql = "SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey and $this->$secondKey = :$this->$secondKey";
            $stmt = $this->prepare($sql);
            $stmt->bindValue(":$this->primaryKey", $value);
            $stmt->bindValue(":$this->$secondKey", $secondKey);
            $stmt->execute();
        }
        else{
             $sql ="SELECT * FROM $this->table WHERE $this->primaryKey = :$this->primaryKey";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $value);
        $stmt->execute();
        
        }
       
        $count = $stmt->rowCount();
        if($count == 1 ){
            return $stmt->fetch();
        }else{
            header("location: {{path}}home/error");
        }
    }

    public function insert($data){

        $data_keys=array_fill_keys($this->fillable,'');
        $data_map=array_intersect_key($data,$data_keys);

        $nomChamp = implode(", ",array_keys($data_map));
        $valeurChamp = ":".implode(", :", array_keys($data_map));

        $sql = "INSERT INTO $this->table ($nomChamp) VALUES ($valeurChamp)";
        
        $stmt = $this->prepare($sql);
        //print_r($stmt);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 
        if(!$stmt->execute()){
           print_r($stmt->errorInfo());
        }else{
            return $this->lastInsertId();
        }
    }
    
    public function update( $data){
        $champRequete = null;
        foreach($data as $key=>$value){
            $champRequete .= "$key = :$key, ";
        }
        $champRequete = rtrim($champRequete, ", ");

        $sql = "UPDATE $this->table SET $champRequete WHERE $this->primaryKey= :$this->primaryKey";

        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        } 
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

    public function delete( $id,$sec=null){

        if($sec!=null){
            $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey and  $this->secondKey=:$this->secondKey";
            $stmt = $this->prepare($sql);
            $stmt->bindValue(":$this->primaryKey", $id);
            $stmt->bindValue(":$this->secondKey", $sec);
        }else{
        
        $sql = "DELETE FROM $this->table WHERE $this->primaryKey = :$this->primaryKey ";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$this->primaryKey", $id);
        }
        
       
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
        }else{
            return true;
        }
    }
}


?>