

<div class="container-fluid ">
    <div class="row">
        <div class="container col-8 border border-dark rounded pt-3 mb-4 mt-4">

            <form action="../user/editProfile" method="post">
                <div class="form-group row">
                    <label for="email" class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input value="<?= htmlspecialchars($userProfile['email']) ?>" type="email" name="email" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-2 col-form-label">Nouveau Password</label>
                    <div class="col-10">
                        <input type="password" autocomplete="off" name="password" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Nom" class="col-2 col-form-label">Nom</label>
                    <div class="col-10">
                       <input type="text" value="<?= htmlspecialchars($userProfile['nom']) ?>" name="nom" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="prenom" class="col-2 col-form-label">Prenom</label>
                    <div class="col-10">
                        <input type="text" value="<?= htmlspecialchars($userProfile['prenom']) ?>" name="prenom" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="adresse" class="col-2 col-form-label">Adresse</label>
                    <div class="col-10">
                        <input type="text" value="<?= htmlspecialchars($userProfile['adresse']) ?>" name="adresse" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="ville" class="col-2 col-form-label">Ville</label>
                    <div class="col-10">
                        <input type="text" value="<?= htmlspecialchars($userProfile['ville']) ?>" name="ville" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cpostal" class="col-2 col-form-label">Code Postal</label>
                    <div class="col-10">
                        <input type="text" value="<?= htmlspecialchars($userProfile['cpostal']) ?>" name="cpostal" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="abonnement" class="col-2 col-form-label">Abonnement</label>
                    <div class="col-10">
                        <select class="form-control" name='id_abonnement'>
                            <option value="<?= $aboUser['id_abonnement']; ?>"><?= htmlspecialchars($aboUser['nom']) ?></option>
                            <?php foreach ($aboList as $values): ?>
                                <option value="<?= $values['id_abonnement']; ?>"><?= htmlspecialchars($values['nom']) ?></option>
                            <?php endforeach; ?>
                    </select>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" value="Modifier" >
            </form>
        </div>
    </div>
</div>