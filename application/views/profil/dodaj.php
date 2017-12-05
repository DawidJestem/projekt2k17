<?php
$kategorie = $this->aukcjeModel->wczytajKategorie();
?>
<div class="container">

    <?= form_open_multipart(site_url('profil/dodaj')) ?>
    <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>

    <div class="row form-content">
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Tytuł</label>
                    <input class="form-control" type="text" name="tytul">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Kategoria</label>
                    <select class="form-control" name="kategoria">
                        <?php
                        foreach ($kategorie as $a) {
                            ?>
                            <option value="<?= $a['id'] ?>"><?= $a['nazwa'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <p>Jeśli kategoria jest inna niż wyżej podana, wpisz 1</p>
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Opis</label>
                    <textarea class="form-control" style="resize: none;" name="opis" rows="2"></textarea>
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Cena</label>
                    <input class="form-control" type="number" min="1" name="cena">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Minimalna cena<sup>1</sup></label>
                    <input class="form-control" type="number" min="1" name="minimalna" value="1">
                    <p><sup>1</sup> - konieczne tylko przy aukcjach z ceną minimalną</p>
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Spadek ceny<sup>2</sup></label>
                    <input class="form-control" type="number" min="1" name="spadek" value="1">
                    <p><sup>2</sup> - konieczne tylko przy aukcjach holenderskich</p>
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Koniec aukcji</label>
                    <input class="form-control" type="date" name="koniec">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <label>Zdjęcie</label>
                    <input class="form-control" type="file" name="zdjecie" accept="image/*">
                </div>
            </div>
        </div>
        <div class="col-xs-12 form-input">
            <div class="row">
                <div class="col-xs-push-3 col-xs-6">
                    <button class="btn btn-default col-xs-12" value="Dodaj aukcję">Dodaj aukcję</button>
                </div>
            </div>
        </div>
    </div>

    </form>
</div>
