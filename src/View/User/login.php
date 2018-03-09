<div class="container-fluid">
    <div class="row">
        <div class="container col-8 background-white-light rounded pt-3 mb-4 mt-4">

            <form action="/PiePHP/user/login" method="post">
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
                    <div class="col d-flex flex-row-reverse">
                        <input type="submit" class="btn btn-primary" value="Envoyer" >
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>