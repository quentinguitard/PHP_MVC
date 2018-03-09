<div class="container">
    <div class="row">
        <div class="col" id="img">
            <h2>{{$filmInfo['titre']}}</h2>
            <input type="hidden" value="<?= $filmInfo['titre'];?>" id="name">
            <img>
        </div>
        <div class="col">
            <p>{{$filmInfo['resum']}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Genre du film : {{$genreNom['nom_genre']}}</h4>
        </div>
        <div class="col">
            @!empty ($distribNom)
            <h4>Distributeur du film : {{$distribNom[0]['nom_distrib']}}</h4>
            @endisset

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
    $('<img>').attr("src", 'https://image.tmdb.org/t/p/w400/' + msg.results[0].poster_path).appendTo('#img')
    
  });



</script>









