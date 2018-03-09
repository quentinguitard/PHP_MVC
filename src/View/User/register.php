
<div class="container-fluid">
    <div class="row">
        <div class="background-white-light container col-8 rounded pt-3 mb-4 mt-4">

            <form action="../user/add" method="post">
                <div class="form-group row">
                    <label for="email" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-2 col-form-label">Password</label>
                    <div class="col-10">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nom" class="col-2 col-form-label">Nom</label>
                    <div class="col-10">
                       <input type="text" name="nom" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prenom" class="col-2 col-form-label">Prenom</label>
                    <div class="col-10">
                        <input type="text" name="prenom" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="adresse" class="col-2 col-form-label">Adresse</label>
                    <div class="col-10">
                        <input type="text" name="adresse" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ville" class="col-2 col-form-label">Ville</label>
                    <div class="col-10">
                        <input type="text" name="ville" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cpostal" class="col-2 col-form-label">Code Postal</label>
                    <div class="col-10">
                        <input type="text" name="cpostal" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date_naissance" class="col-2 col-form-label">Date de naissance</label>
                    <div class="col-10">
                        <input type="date" name="date_naissance" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="abonnement" class="col-2 col-form-label">Abonnement</label>
                    <div class="col-10">
                        <select class="form-control custom-select" name='id_abonnement'>
                                <option selected>Choose...</option>    
                        @foreach($aboList as $values)
                                <option value="<?= $values['id_abonnement']; ?>">{{$values['nom']}}</option>
                            @endforeach
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col d-flex flex-row-reverse">
                        <input type="submit" class="btn btn-primary" value="Envoyer" >
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>