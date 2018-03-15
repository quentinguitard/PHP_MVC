<div class="container mt-4">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <input type="hidden" value="<?= $filmInfo['titre'];?>" id="name">
            <div class="p-2" id="img"></div>
            
        </div>
        <div class="col background-white-light border rounded p-2">
        <form action="../film/editFilm" method="post">
                <div class="form-group row ml-2 mr-2">
                    <label for="titre" class="col-2 col-form-label">Titre: </label>
                    <input type="text" value="{{ $filmInfo['titre']}}" name="titre" class="form-control">
                </div>
                <div class="form-group row ml-2 mr-2">
                    <label for="resum" class="col-2 col-form-label">Resume:</label>
                        <textarea rows="4" name="resum" class="form-control">{{$filmInfo['resum']}}</textarea>
                </div>
                <div class="form-group row ml-2 mr-2">
                    <label for="Nom" class="col-2 col-form-label">Genre: </label>
                    <select class="custom-select" name="id_genre">
                        <option value='none' selected>Changer genre</option>
                        @foreach ($allGenre as $values):
                            <option value="<?= $values['id_genre'] ?>">{{$values['nom_genre']}}</option>
                        @endforeach
                    </select>
                </div>    
                <div class="form-group row ml-2 mr-2">
                    <label for="Nom" class="col-2 col-form-label">Distributeur: </label>
                    <select class="custom-select" name="id_distrib">
                        <option value='none' selected>Changer distibuteur</option>
                        @foreach ($allDistrib as $values):
                            <option value="<?= $values['id_distrib'] ?>">{{$values['nom_distrib']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                </div>
                <div class="col d-flex justify-content-end m-4">
                    <input type="hidden" value="<?= $filmInfo['id_film'];?>" name="id_film">
                    <a href="/PiePHP/film/delete?id_film=<?= $filmInfo['id_film'];?>" class="text-light"><button class="btn btn-danger">DELETE <i class="far fa-trash-alt"></i></button></a>
                    <a href="/PiePHP/film/editFilm" class="text-light ml-3"><button  type="submit" class="btn btn-dark">MODIFIER <i class="fas fa-edit"></i></button></a>
                </div>  
            </div>
        </div>
        
    </form>
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