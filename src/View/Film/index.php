<div class="container mt-5 mb-5">
    <div class="row mb-2">
        <div class="col">
        <form method='post' action='/PiePHP/film/search'>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search Movie" name='searchFilm'>
                <div class="input-group-append">
                    <button type='submit' class="btn btn-outline-secondary" type="button"><i class="fas fa-search 3x"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <select class="custom-select" name="id_genre">
                <option selected>Choisir genre</option>
                @foreach ($allGenre as $values):
                    <option value="<?= $values['id_genre'] ?>">{{$values['nom_genre']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select class="custom-select" name='id_distrib'>
                <option selected>Choisir distributeur</option>
                @foreach ($allDistrib as $values):
                    <option value="<?= $values['id_distrib'] ?>">{{$values['nom_distrib']}}</option>
                @endforeach
            </select>
        </form>
        </div>
    </div>
</div>
@isset($filmSearch)
<div class="container">
    <div class="row">
        <table class="table background-white-light table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Distributeur</th>
                </tr>
            </thead>
            <tbody>
                @foreach($filmSearch as $values)
               
                <tr>
                    <th scope="row">{{$values['id_film']}}</th>
                    <td><a class="text-dark" href="/PiePHP/film/filmInfo?id_film=<?= $values['id_film']; ?>">{{$values['titre']}}</a></td>
                    <td>{{$values['nom_genre']}}</td>
                    <td>{{$values['nom_distrib']}}</td>
                </tr>
                </a>
                @endforeach
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example " >


<?php
$page_before_after = 4;
$pagination = "";
if($nb_pages != 1){
	if($page > 1){
	    $previous = $page - 1;
		$pagination .= "<li class='page-item'><a class='page-link text-dark' href='/PiePHP/film/search?page=".$previous."'>Previous</a></li>";
		
        for($i = $page - $page_before_after; $i < $page; $i++){
            if($i > 0){
                $pagination .= "<li class='page-item'><a class='page-link text-dark' href='/PiePHP/film/search?page=".$i."'>".$i."</a></li>";
            }
        }
	}
}
$pagination .= "<li class='page-item disabled'><a class='page-link text-muted' href='#'>".$page." </a></li>";

	for($i=$page + 1; $i <= $nb_pages; $i++){
	$pagination .= "<li class='page-item'><a class='page-link text-dark' href='/PiePHP/film/search?page=".$i."'>".$i."</a></li> ";
		if($i >= $page + $page_before_after){
			break;
		}
	}
	if($page != $nb_pages){
	$next = $page +1;
	$pagination .= "<li class='page-item'><a class='page-link text-dark' href='/PiePHP/film/search?page=".$next."'>next</a></li>";
	}


echo "<ul class='pagination justify-content-center'>".$pagination."</ul>";

				?>
    </nav>
</div>
@endisset