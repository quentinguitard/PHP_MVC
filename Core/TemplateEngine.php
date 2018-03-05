<?php

namespace Core;

class TemplateEngine
{
    public function __construct($file){
        $this->file =$file;
    }
    
    public function parse(){
            $storage = str_replace('Storage','View',$this->file);
        $patterns = [
            '/@if\s*\((.+)\)/',
            '/@elseif\s*\((.+)\)/',
            '/@else\b/',
            '/@foreach\s*\((.+)\)/',
            '/@endif\b/',
            '/@endforeach\b/',
            '/@isset\s*\((.+)\)/',
            '/@endisset\b/',
            '/@empty\s*\((.+)\)/',
            '/@!empty\s*\((.+)\)/',
            '/@endempty/',
            '/{{(.+)}}/'
        ];

        $replacements = [
            '<?php if($1): ?>',
            '<?php elseif($1): ?>',
            '<?php else: ?>',
            '<?php foreach ($1): ?>',
            '<?php endif; ?>',
            '<?php endforeach; ?>',
            '<?php if(isset($1)): ?>',
            '<?php endif; ?>',
            '<?php if(empty($1)): ?>',
            '<?php if(!empty($1)): ?>',
            '<?php endif; ?>',
            '<?= htmlspecialchars($1) ?>'
        ];

        $content = file_get_contents($storage);
        $content = preg_replace($patterns, $replacements, $content);
        file_put_contents($this->file, $content);
        var_dump($this->file, file_get_contents($this->file));
        return $this->file;
        
    }
}

?>
