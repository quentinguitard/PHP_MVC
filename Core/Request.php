<?php
namespace Core;

class Request
{

    public function __construct(){
        foreach($_REQUEST as $key => $values){
            $this->{$key} = trim(stripslashes(htmlspecialchars($values)));
        }
    }

}
