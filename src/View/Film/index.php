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
    <ul class="pagination justify-content-center">
    <li class="page-item disabled ">
    <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
    <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
    <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
    <li class="page-item">
    <a class="page-link text-dark" href="#">Next</a>
    </li>
    </ul>
    </nav>
</div>
@endisset