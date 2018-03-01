<?php
namespace Core;

class ORM extends Database
{
    public function create($table,$fields){
        $sql = "INSERT INTO ".$table;
        $fieldsKeys = "";
        $fieldsValues = "";
        $count = 1;
        foreach($fields as $key => $values){
            if(count($fields) == $count){
                $fieldsKeys .= $key;
                $fieldsValues .= "'" .$values. "'";
                
            }
            else{
                $count++;
                $fieldsKeys .= $key . ", ";
                $fieldsValues .= "'" .$values. "', ";
            }
        }        
        $sql .= " (" .$fieldsKeys . ") VALUES (" . $fieldsValues .")";
        var_dump($sql);
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
        return $this->getConnection()->lastInsertId(); 
    }

    public function read($table, $id){
        $sql = "SELECT * FROM " . $table . " WHERE id = ". $id;
        $stmt = $this->getConnection()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }

    public function update($table, $id, $fields){
        $sql = "UPDATE ".$table." SET ";
        $set = "";
        $count = 1;
        foreach($fields as $key => $values){
            if(count($fields) == $count){
                $set .= $key . " = '" . $values ."'";
            }
            else{
                $set .= $key . " = '" . $values . "', ";
                $count++;
            }
        }
        $sql .= $set . " WHERE id=" . $id;
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
    }
    public function delete($table, $id){
        $sql = "DELETE from ".$table." WHERE id=". $id;
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute();
    }

    public function find($table, $params = [
        "WHERE" => "1",
        "ORDER BY" => "id ASC",
        "LIMIT" => ""
    ]){
        $sql = "SELECT * FROM " . $table;
        foreach($params as $key => $value){
            $sql.= " " . $key . " " . $value;
        }
        var_dump($sql);
        $stmt = $this->getConnection()->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
}
