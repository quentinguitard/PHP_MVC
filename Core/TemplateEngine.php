<?php

namespace Core;

class TemplateEngine
{
    public function __construct($file){
        $this->file =$file;
    }
    public function parse($scope = []){
        $file = file_get_contents($this->file);
        $explode = explode(PHP_EOL, $file);
        var_dump($file);
        $result = '';
        for($i = 0; $i < count($explode); $i++){
            $line = str_split($explode[$i]);
            if($line[0] == '@' && $explode[$i] != '@endif'){
                $explode[$i] = str_replace('@', '<?php ', $explode[$i]) . ': ?>';
            }
            elseif($explode[$i] == '@endif' && $explode[$i] ="@endisset" && $explode[$i] ="@endempty"){
                $explode[$i] = "<?php endif; ?>";
            }
            $result .= $explode[$i] . "\n";
            
        }
        var_dump($result);
        return $result;
    }
}

?>
