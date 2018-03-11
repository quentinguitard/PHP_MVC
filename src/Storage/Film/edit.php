<div class="container mt-4">
    <div class="row">
        <div class="col flex-column d-flex justify-content-center">
            <input type="hidden" value="<?= $filmInfo['titre'];?>" id="name">
            <div class="p-2" id="img"></div>
            
        </div>
        <div class="col background-white-light border rounded p-2">
        <form action="../film/edit" method="post">
                <div class="form-group row ml-2 mr-2">
                    <label for="titre" class="col-2 col-form-label">Titre: </label>
                    <input type="text" value="<?= htmlspecialchars( $filmInfo['titre']) ?>" name="titre" class="form-control">
                </div>
                <div class="form-group row ml-2 mr-2">
                    <label for="resum" class="col-2 col-form-label">Resume:</label>
                        <textarea rows="4" name="resum" class="form-control"><?= htmlspecialchars($filmInfo['resum']) ?></textarea>
                </div>
                <div class="form-group row ml-2 mr-2">
                    <label for="Nom" class="col-2 col-form-label">Genre: </label>
                    <select class="custom-select" name="nom_genre">
                        <option selected>Changer genre</option>
                        <?php foreach ($allGenre as $values): ?>:
                            <option value="<?= $values['id_genre'] ?>"><?= htmlspecialchars($values['nom_genre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>    
                <div class="form-group row ml-2 mr-2">
                    <label for="Nom" class="col-2 col-form-label">Distributeur: </label>
                    <select class="custom-select" name="nom_distrib">
                        <option selected>Changer distibuteur</option>
                        <?php foreach ($allDistrib as $values): ?>:
                            <option value="<?= $values['id_distrib'] ?>"><?= htmlspecialchars($values['nom_distrib']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col d-flex justify-content-end m-4">
        <a href="/PiePHP/film " class="text-light"><button  type="button" class="btn btn-dark">MODIFIER <i class="fas fa-edit"></i></button></a>
        </div>  
    </div>
</div>

<script>
var name = $('#name').val();
$.ajax({
  url: `https://api.themoviedb.org/3/search/movie/?api_key=fa45b49e89f7709536f5154c2b13a4ee&query=`+name,

    crossDomain: true,
    dataType: 'jsonp'
    }).done(function( msg ) {
    console.log(msg.results[0].poster_path );
    $('<img>').attr("src", 'https://image.tmdb.org/t/p/w300/' + msg.results[0].poster_path).appendTo('#img')
    
  });



</script>