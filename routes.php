<?php
use \Core\Router;

Router::connect('',['controller'=>'UserController','action'=>'index']);
Router::connect('user',['controller'=>'UserController','action'=>'userLogin']);
//Router::connect('user/test',['controller'=>'UserController','action'=>'test']);
Router::connect('user/register',['controller'=>'UserController','action'=>'register']);
Router::connect('user/add',['controller'=>'UserController','action'=>'registerAction']);

Router::connect('user/login',['controller'=>'UserController','action'=>'login']);

Router::connect('user/profile',['controller'=>'UserController','action'=>'profile']);
Router::connect('user/editProfile',['controller'=>'UserController','action'=>'editProfile']);

Router::connect('user/logout',['controller'=>'UserController','action'=>'logout']);

Router::connect('film',['controller'=>'FilmController','action'=>'index']);
Router::connect('film/search',['controller'=>'FilmController','action'=>'searchFilm']);

Router::connect('film/filmInfo', ['controller' => 'FilmController', 'action' => 'filmInfo']);
Router::connect('film/edit', ['controller' => 'FilmController', 'action' => 'editFilm']);