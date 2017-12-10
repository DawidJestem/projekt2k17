<div class="container detail-message">
    <div class="col-xs-12">
        <?= validation_errors('<div class="alert alert-danger">', '</div>') ?>
    </div>
    <div class="col-xs-12">
        <h2>Rozmowa z
            <?php
            if ($rozmowy) {
                $uzytkownik = $this->db->get_where('uzytkownicy', array('id' => $id))->row_array();
                echo $uzytkownik['imie'] . ' ' . $uzytkownik['nazwisko'];
            };
            ?>
        </h2>
    </div>
    <?php
    if ($wiadomosci) {
        foreach ($wiadomosci as $a) {
            $uzytkownik = $this->db->get_where('uzytkownicy', array('id' => $a['idUzytkownika']))->row_array();
            ?>
            <div class="col-xs-12">
                <div class="single-message">
                    <p><b><?= $uzytkownik['imie'] . ' ' . $uzytkownik['nazwisko'] ?></b>
                        <small><?= $a['data'] ?></small>
                    </p>
                    <p><?= $a['tresc'] ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <p>Brak wiadomości</p>
        <?php
    }
    ?>
    <div class="col-xs-12">
        <?= form_open('wiadomosci/rozmowa/' . $id) ?>
        <textarea class="form-control" style="resize: none;" name="tresc" rows="8"></textarea>
        <button class="btn btn-default" type="submit" value="Wyślij wiadomość">Wyślij wiadomość</button>
        </form>
    </div>
</div>
