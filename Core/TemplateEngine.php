<?php

namespace Core;

class TemplateEngine
{
    public function parse($view){
        $view = "<?php echo 'BITE'; ?>";
        return $view;
    }
}
