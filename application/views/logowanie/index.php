<div class="container">
  <?=form_open('logowanie')?>

    <h1 class="text-center">Logowanie</h1>

    <div class="row form-content">
        <div class="col-xs-12">
            <?=validation_errors('<div class="alert alert-danger">','</div>')?>
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
                    <input class="form-control" type="password" name="haslo">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <button class="btn btn-default col-xs-12" value="Zaloguj">zaloguj się</button>
                </div>
            </div>
        </div>
    </div>
  </form>
</div>
