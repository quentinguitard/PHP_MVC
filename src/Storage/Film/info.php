<div class="container mt-4">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <input type="hidden" value="<?= $filmInfo['titre'];?>" id="name">
            <div class="p-2" id="img"></div>
            
        </div>
        <div class="col d-flex flex-column justify-content-end ">
            <div class="d-flex border background-white-light-7 rounded p-1 mb-3">
                <h2 class="p-2"><?= htmlspecialchars($filmInfo['titre']) ?></h2>
                <p> ( <?= htmlspecialchars($filmInfo['annee_prod']) ?> )</p>
            </div>
            <p class="border background-white-light-7 rounded p-3"><?= htmlspecialchars($filmInfo['resum']) ?></p>
            <h6 class="border background-white-light-7 rounded p-2">Genre: <?= htmlspecialchars($genreNom['nom_genre']) ?></h6>
            <?php if(!empty($distribNom)): ?>
            <h6 class="border background-white-light-7 rounded p-2">Distributeur: <?= htmlspecialchars($distribNom[0]['nom_distrib']) ?></h6>
            <?php endif; ?>
        </div>
    </div>
    <?php if(isset($_SESSION['idUser'])): ?>
    <div class="row">
        <div class="col">
        </div>
        <div class="col d-flex justify-content-end">
            
        <a href="/PiePHP/film/delete?id_film=<?= $filmInfo['id_film'];?>" class="text-light "><button class="btn btn-danger">DELETE <i class="far fa-trash-alt"></i></button></a>
            
        <a href="/PiePHP/film/edit?id_film=<?= $filmInfo['id_film'];?>" class="text-light ml-3"><button  type="button" class="btn btn-dark">MODIFIER <i class="fas fa-edit"></i></button></a>
        </div>  
    </div>
    <?php endif; ?>
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









