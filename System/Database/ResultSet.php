<?php
namespace System\Database;
/**
 * Result Set
 */
class ResultSet
{

    public function __construct($queryName)
    {
        $this->query = $queryName;
    }
    public function toArray(){
        $data = array();
        if($this->query){
            while($record = mysqli_fetch_assoc($this->query)){
                array_push($data,$record);
            }
        }
        return $data;
    }
    public function toObject(){
        $data = array();
        if($this->query){
            while($record = mysqli_fetch_object($this->query)){
                array_push($data,$record);
            }
        }
        return $data;
    }
    public function numRows(){
        return mysqli_num_rows($this->query);
    }
}
