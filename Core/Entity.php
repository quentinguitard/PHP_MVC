<?php
namespace Core;

use \Core\ORM;

class Entity
{
    public $ORM;
    public $table;
    public $params; 

    public function __construct($params, $id = null){
        $this->ORM = new ORM();
        $this->table = strtolower(substr(str_replace('Model', '', get_class($this)),1)) . 's';
        $this->params = $params;
        $this->id = $id;
    }
    public function save(){
        if(!isset($this->id)){
            return $this->ORM->create($this->table,$this->params);
        }
        else {
            $this->ORM->update($this->table, $this->id,$this->params);
        }
    }

    public function read($id){
       return $this->ORM->read($this->id);
    }

    public function delete($id){
        $this->ORM->delete($this->table, $this->id);
    }
    public function find($option){
        return $this->ORM->find($this->table,$option);
    }
}
