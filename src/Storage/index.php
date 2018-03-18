<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="/PiePHP/webroot/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>My cinema</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/PiePHP">My cinema</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown width-90">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Movies
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if(isset($_SESSION['idUser'])): ?>
                        <a class="dropdown-item" href="/PiePHP/film/addForm">Ajouter un film</a>
                    <?php endif; ?>
                        <a class="dropdown-item" href="/PiePHP/film">Recherche films</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/PiePHP/genre">
                    Genres
                    </a>
                    
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/PiePHP/membre">Members</a>
                </li>
            </ul>
            <div class="d-flex justify-content-end w-100">
            <?php if(!isset($_SESSION['idUser'])): ?>
                <a href="/PiePHP/user" class="btn btn-outline-info ml-5" type="submit">Login</a>
                <a href="/PiePHP/user/register" class="btn btn-outline-success ml-2" type="submit">Register</a>
            <?php else: ?>
                <a href="/PiePHP/user/profile" class="btn btn-outline-info ml-2" type="submit">My Profile</a>
                <a href="/PiePHP/user/logout" class="btn btn-outline-danger ml-2" type="submit">Logout</a>
                
            <?php endif; ?>
            </div>
        </div>
    </div>
    </nav>


<?= $view ?>


    
</body>
</html>