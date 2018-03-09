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
                <?php foreach ($allGenre as $values): ?>:
                    <option value="<?= $values['id_genre'] ?>"><?= htmlspecialchars($values['nom_genre']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <select class="custom-select" name='id_distrib'>
                <option selected>Choisir distributeur</option>
                <?php foreach ($allDistrib as $values): ?>:
                    <option value="<?= $values['id_distrib'] ?>"><?= htmlspecialchars($values['nom_distrib']) ?></option>
                <?php endforeach; ?>
            </select>
        </form>
        </div>
    </div>
</div>
<?php if(isset($filmSearch)): ?>
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
                <?php foreach ($filmSearch as $values): ?>
               
                <tr>
                    <th scope="row"><?= htmlspecialchars($values['id_film']) ?></th>
                    <td><a class="text-dark" href="/PiePHP/film/filmInfo?id_film=<?= $values['id_film']; ?>"><?= htmlspecialchars($values['titre']) ?></a></td>
                    <td><?= htmlspecialchars($values['nom_genre']) ?></td>
                    <td><?= htmlspecialchars($values['nom_distrib']) ?></td>
                </tr>
                </a>
                <?php endforeach; ?>
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
<?php endif; ?>