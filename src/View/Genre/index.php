<div class="container mt-4">
    <div class="row d-flex justify-content-around">
        <div class="col-5 rounded">
            <table class="table background-white-light table-striped">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th scope="col">#</th>  -->
                        <th>Genres</th>
                        @isset($_SESSION['idUser'])
                        <th>Edit</th>
                        <th>Delete</th>
                        @endisset
                    </tr>
                </thead>
                <tbody>
                    @foreach($allGenre as $values)
                
                    <tr>
                        <!-- <th scope="row">{{$values['id_genre']}}</th> -->
                        <td>{{ucfirst($values['nom_genre'])}}</a></td>
                        @isset($_SESSION['idUser'])
                        <td><a class="text-dark" href="/PiePHP/genre?id_genre=<?= $values['id_genre']; ?>"><i class="far fa-edit"></i></a></td>
                        <td><a class="text-dark" href='/PiePHP/genre/delete?id_genre=<?= $values['id_genre']; ?>'><i class="fas fa-trash-alt"></i></a></td>
                        @endisset
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-5">
        @isset($_SESSION['idUser'])
        @isset($_GET['id_genre'])
        <div class='background-white-dark'>
            <form action="/PiePHP/genre/edit" method="post">
                <h2 class=' ml-3 pt-4 pl-3 text-light'>Modifier Genre :</h2>
                <div class="form-group row ml-3 mr-3 ">

                    <label for="titre" class="col col-form-label text-light">Nom du genre: </label>
                    <input type="text" name="nom_genre" value="{{$genreDetail['nom_genre']}}" class="form-control mr-3 ml-3">
                    <input type="hidden" name="id_genre" value="{{$genreDetail['id_genre']}}">                    
                    <button class="btn btn-info ml-3 mb-3 mt-3"  type="submit">Modifier</button>
                </div>
            </form>
            </div>
            @else
            <div class='background-white-light'>
            <form action="/PiePHP/genre/add" method="post">
                <h2 class=' ml-3 pt-4 pl-3'>Ajouter Genre :</h2>
                <div class="form-group row ml-3 mr-3 ">

                    <label for="titre" class="col col-form-label">Nom du genre: </label>
                    <input type="text" name="nom_genre" class="form-control mr-3 ml-3">
                    <button class="btn btn-success ml-3 mb-3 mt-3"  type="submit">Ajouter</button>
                </div>
            </form>
            </div>
            @endif
            @endisset
        </div>
    </div>
</div>