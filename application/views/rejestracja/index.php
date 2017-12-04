<div class="container">
  <?=form_open(site_url('rejestracja'))?>

    <h1 class="text-center">Rejestracja</h1>

    <div class="row form-content">
        <div class="col-xs-12">
            <?=validation_errors('<div class="alert alert-danger">','</div>')?>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Imię</label>
                    <input class="form-control" type="text" name="imie">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Nazwisko</label>
                    <input class="form-control" type="text" name="nazwisko">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Login</label>
                    <input class="form-control" type="text" name="login">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Hasło</label>
                    <input class="form-control" type="password" name="haslo1">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Powtórz hasło</label>
                    <input class="form-control" type="password" name="haslo2">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <button class="btn btn-default col-xs-12" value="Zarejestruj">Zarejestruj</button>
                </div>
            </div>
        </div>
    </div>
  </form>
</div>
