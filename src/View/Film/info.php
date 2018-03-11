<div class="container mt-4">
    <div class="row">
        <div class="col flex-column d-flex justify-content-center">
            <input type="hidden" value="<?= $filmInfo['titre'];?>" id="name">
            <div class="p-2" id="img"></div>
            
        </div>
        <div class="col d-flex flex-column ">
            <div class="d-flex border background-white-light-7 rounded p-1 mb-3">
                <h2 class="p-2">{{$filmInfo['titre']}}</h2>
                <p> ( {{$filmInfo['annee_prod']}} )</p>
            </div>
            <p class="border background-white-light-7 rounded p-3">{{$filmInfo['resum']}}</p>
            <h4 class="border background-white-light-7 rounded p-2">Genre: {{$genreNom['nom_genre']}}</h4>
            @!empty ($distribNom)
            <h4 class="border background-white-light-7 rounded p-2">Distributeur: {{$distribNom[0]['nom_distrib']}}</h4>
            @endisset
        </div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col d-flex justify-content-end">
        <a href="/PiePHP/film/edit?id_film=<?= $filmInfo['id_film'];?>" class="text-light"><button  type="button" class="btn btn-dark">MODIFIER <i class="fas fa-edit"></i></button></a>
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









