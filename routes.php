<?php

Router::connect('/',['controller'=>'app','action'=>'index']);
Router::connect('index/add',['controller'=>'ContactController','add'=>'render']);