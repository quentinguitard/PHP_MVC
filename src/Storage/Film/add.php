<div class="container mt-4">
    <div class="row">
        <div class="col">
        </div>
        <div class="col background-white-light border rounded p-2">
        <form action="../film/add" method="post">
                <div class="form-group row ml-2 mr-2">

                        <label for="titre" class="col col-form-label">Titre: </label>
                        <input type="text"  name="titre" class="form-control">
                </div>
                <div class="form-group row ml-2 mr-2">
                    <label for="resum" class="col col-form-label">Resume:</label>
                        <textarea rows="4" name="resum" class="form-control"></textarea>
                </div>
                <div class="form-group row ml-2 mr-2">
                    <label for="Nom" class="col col-form-label">Genre: </label>
                    <select class="custom-select" name="id_genre">
                        <option value='none' selected>Choisir genre</option>
                        <?php foreach ($allGenre as $values): ?>:
                            <option value="<?= $values['id_genre'] ?>"><?= htmlspecialchars($values['nom_genre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>    
                <div class="form-group row ml-2 mr-2">
                    <label for="Nom" class="col col-form-label">Distributeur: </label>
                    <select class="custom-select" name="id_distrib">
                        <option value='none' selected>Choisir distibuteur</option>
                        <?php foreach ($allDistrib as $values): ?>:
                            <option value="<?= $values['id_distrib'] ?>"><?= htmlspecialchars($values['nom_distrib']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group row ml-2 mr-2">
                    <div class="col">
                        <label for="duree_min" class="col col-form-label">Durée:</label>
                        <input type="number" class="form-control" name="duree_min" min="0" max="1000" step="1" value="0" />                    
                    </div>
                    <div class="col">
                        <label for="annee_prod" class="col col-form-label">Année de production: </label>
                        <input type="number" class="form-control" name="annee_prod" min="1850" max="2099" step="1" value="2018" />
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                </div>
                <div class="col d-flex justify-content-end m-4">
                    <a href="/PiePHP/film/add" class="text-light"><button  type="submit" class="btn btn-success">ADD <i class="far fa-plus-square"></i></button></a>
                </div>  
            </div>
        </div>
        
    </form>