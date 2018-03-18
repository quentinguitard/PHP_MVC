<div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-4 background-white-light-7 rounded p-3">
            <h6>Nom : </h6>
            <h4><?= htmlspecialchars(ucfirst($membreDetail['nomUser'])) ?></p>
            <h6>Email :</h6>
            <h4><?= htmlspecialchars($membreDetail['email']) ?></h4>
            <h6>Code Postal :</h6>
            <h4><?= htmlspecialchars($membreDetail['cpostal']) ?></h4>
        </div>
        <div class="col-4 background-white-light-7 rounded p-3">
            <h6>Prenom :</h6>
            <h4><?= htmlspecialchars(ucfirst($membreDetail['prenomUser'])) ?></h4>
            <h6>Abonnement :</h6>
            <h4><?= htmlspecialchars($membreDetail['nomAbo']) ?></h4>
            <h6>Ville :</h6>
            <h4><?= htmlspecialchars($membreDetail['ville']) ?></h4>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    <div class="row mb-2">
        <div class="col">
        <form method='post' action='/PiePHP/membre/addFilm?id_membre=<?= $membreDetail['id_membre'] ?>'>
        <label for="id_film"  class="col-2 col-form-label" >Ajouter a l'historique:</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="ID FILM" name='id_film'>
                <div class="input-group-append">
                    <button type='submit' class="btn btn-outline-secondary" type="button"><i class="fas fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="row">
        <table class="table background-white-light table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Vue le</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($historiqueMembre as $values): ?>
               
                <tr>
                    <th scope="row"><?= htmlspecialchars($values['id_film']) ?></th>
                    <td><a class="text-dark" href="/PiePHP/film/filmInfo?id_film=<?= $values['id_film']; ?>"><?= htmlspecialchars($values['titre']) ?></a></td>
                    <td><?= htmlspecialchars($values['date_v']) ?></td>
                    <td><a class="text-dark" href='/PiePHP/membre/delete?id_membre=<?= $values['id_membre']; ?>&id_film=<?= $values['id_film']; ?>'><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                </a>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>