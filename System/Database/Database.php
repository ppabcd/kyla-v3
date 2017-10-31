<?php
namespace System\Database;
/**
 * Database Class
 * From David Naista
 */
use System\Database\ResultSet;
class Database extends ResultSet
{
    private $configs = [];
    public function __construct()
    {
        $this->configs = require_once('Config/connection.php');
        $this->instance = new \Mysqli($this->configs['host'], $this->configs['username'], $this->configs['password'], $this->configs['database']);
        if(mysqli_connect_errno()){
            $con = new \Mysqli($this->configs['host'], $this->configs['username'], $this->configs['password']);
            $con->query('CREATE DATABASE '.$this->configs['database']);
            echo "Failed to connect to database. Please Reload this page.";
        }
    }
    public function query($query){
        $this->sql = $query;
    }
    public function getAll($tableName){
        $this->sql = "SELECT * FROM ".$tableName;
        return $this->execute();
    }
    public function getWhere($tableName,$where=array()){
        $this->sql = "SELECT * FROM ".$tableName;
        if(is_array($where)){
            $this->sql .= " WHERE ";
            $i = 0;
            foreach($where as $key => $value){
                $i++;
                $this->sql .= $key ."='".$value."' ";
                if($i <count($where)) $this->sql .= " AND ";
            }
        }
        return $this->execute();
    }
    public function delete($tableName, $where = array()){
        $this->sql = "DELETE * FROM ".$tableName;
        if(is_array($where)){
            $i++;
            $this->sql .= $key ."='".$value."' ";
            if($i <count($where)) $this->sql .= " AND ";
        }
        return $this->execute();
    }
    public function insert($tableName,$params= array()){
        $this->sql = "INSERT INTO ".$tableName." (";
        $total = count($params);
        $i = 0;

        foreach ($params as $key=>$value){
            $i++;
            $this->sql = $this->sql.$key;
            if($i <$total){
                $this->sql = $this->sql.',';
            }
        }
        $this->sql = $this->sql.") VALUES (";

        $i = 0;
        foreach ($params as $key => $value) {
            $i++;
            $this->sql = $this->sql."'".$value."'";
            if($i < $total){
                $this->sql = $this->sql.',';
            }
        }
        $this->sql = $this->sql.")";
        return $this->execute();
    }
    public function update($tableName,$data=array(),$where=array()){
        $this->sql = "UPDATE ".$tableName. " SET ";
        $total = count($data);

        $i = 0;

        foreach ($data as $key => $value) {
            $i++;
            $this->sql = $this->sql.$key."='".$value."' ";

            if($i< $total){
                $this->sql = $this->sql.",";
            }
        }
        if(is_array($where) && count($where)>0){
            $this->sql .= ' WHERE ';
            $i = 0;
            foreach ($where as $key => $value) {
                $i++;
                $this->sql .= $key."='".$value."' ";
                if($i < count($where)) $this->sql .= " AND ";
            }
        }
        return $this->execute();
    }
    public function bindParams($values){
        if(is_array($values)){
            foreach ($values as $v) {
                $this->replaceParam($v);
            }
        }
        else {
            $this->replaceParam($values);
        }
    }
    public function execute(){
        $query = $this->instance->query($this->sql) or die(mysqli_error($this->instance));
        return new ResultSet($query);
    }
    private function replaceParam($v){
        for ($i=0; $i <strlen($this->sql) ; $i++) {
            if($this->sql[$i] = '?'){
                $this->sql = substr_replace($this->sql,mysql_escape_string($v),$i,1);
                break;
            }
        }
    }
}
