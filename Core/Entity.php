<?php
namespace Core;
use \Core\ORM;
class Entity
{
    public $ORM;
    public $table;
    public $params; 

    public function __construct($params, $id){
        $this->ORM = new ORM();
        $this->table = strtolower(substr(str_replace('Model', '', get_class($this)),1)) . 's';
        $this->params = $params;
        $this->id = $id;
        var_dump($this->table);
        var_dump($this->params);
    }
    public function save(){
        if(!isset($this->id)){
            $this->ORM->create($this->table,$this->params);
        }
        else {
            $this->ORM->update($this->table, $this->id,$this->params);
        }
    }

    public function read($id){
        $this->ORM->read($this->id);
    }

    public function delete($id){
        $this->ORM->delete($this->table, $this->id);
    }
    public function read_all(){
        $this->ORM->read_all();
    }
}
