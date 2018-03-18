<?php
use \Core\Router;

Router::connect('',['controller'=>'UserController','action'=>'index']);


Router::connect('user',['controller'=>'UserController','action'=>'userLogin']);
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
Router::connect('film/editFilm', ['controller' => 'FilmController', 'action' => 'edit']);
Router::connect('film/addForm', ['controller' => 'FilmController', 'action' => 'addForm']);
Router::connect('film/add', ['controller' => 'FilmController', 'action' => 'addFilm']);
Router::connect('film/delete', ['controller' => 'FilmController', 'action' => 'deleteFilm']);


Router::connect('genre', ['controller' => 'GenreController', 'action' => 'index']);
Router::connect('genre/edit', ['controller' => 'GenreController', 'action' => 'editGenre']);
Router::connect('genre/add', ['controller' => 'GenreController', 'action' => 'add']);
Router::connect('genre/delete', ['controller' => 'GenreController', 'action' => 'delete']);

Router::connect('membre', ['controller' => 'MembreController', 'action' => 'index']);
Router::connect('membre/info', ['controller' => 'MembreController', 'action' => 'info']);
Router::connect('membre/delete', ['controller' => 'MembreController', 'action' => 'deleteFilm']);
Router::connect('membre/addFilm', ['controller' => 'MembreController', 'action' => 'addFilm']);








