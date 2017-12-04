<?php
$kategoria=$this->db->get_where('kategorie',array('id'=>$aukcja['idKategorii']))->row_array();
$uzytkownik=$this->db->get_where('uzytkownicy',array('id'=>$aukcja['idUzytkownika']))->row_array();
if($aukcja['zdjecie']) $zdjecie=base_url($aukcja['zdjecie']);
else $zdjecie=base_url('zdjecia/brak.png');
?>
<div class="container auction-details">
  <div class="col-xs-12 col-md-4">
    <img class="img-responsive" src="<?=$zdjecie?>">
  </div>
  <div class="col-xs-12 col-md-8">
    <h2><b><?=$aukcja['tytul']?></b></h2>
    <p><b>Sprzedający:</b> <?=$uzytkownik['imie'].' '.$uzytkownik['nazwisko']?></p>
    <p><b>Prowadzący:</b> <?php if($aukcja['idProwadzacego']) {
      $prowadzacy=$this->db->get_where('uzytkownicy',array('id'=>$aukcja['idProwadzacego']))->row_array();
      echo $prowadzacy['imie'].' '.$prowadzacy['nazwisko'];
    } else echo 'brak'; ?></p>
    <p><b>Opis:</b> <?=$aukcja['opis']?></p>
    <?php
    if($aukcja['aktywna']) {
      if($this->session->userdata('zalogowany') && $this->session->userdata('id')!=$uzytkownik['id']) {
        switch($aukcja['idKategorii']) {
          case '1':
          case '2': {
            ?>
            <?=form_open('aukcje/szczegoly/'.$aukcja['id'], array('class' => 'add-new-price form-content'))?>
            <div class="form-input">
                <input class="form-control" type="number" name="cena" min="<?=($aukcja['cena']+1)?>" value="<?=$aukcja['cena']?>">
            </div>
            <input class="btn btn-default" type="submit" name="podbij" value="Podbij cenę">
            </form>
            <?php
            break;
          }
          case '3': {
            ?>
            <p><b>Cena:</b> <?=number_format($aukcja['cena'],2).' zł'?></p>
            <p><b>Spadek co godzinę:</b> <?=number_format($aukcja['spadek'],2).' zł'?></p>
            <?=form_open('aukcje/szczegoly/'.$aukcja['id'])?>
            <input class="btn btn-default" type="submit" name="kup" value="Kup teraz">
            </form>
            <?php
            break;
          }
        }
        ?>
          <?=anchor('wiadomosci/rozmowa/'.$aukcja['idUzytkownika'],'Napisz wiadomość',array('class'=>'btn btn-default write-message'))?>
        <?php
      }
      elseif($this->session->userdata('id')!=$uzytkownik['id']) {
        ?>
          <p><b>Cena:</b> <?=number_format($aukcja['cena'],2).' zł'?></p>
        <p><b>Zaloguj się, aby brać udział w aukcjach.</b></p>
        <?php
      }
      else {
        ?>
        <p><b>Cena:</b> <?=number_format($aukcja['cena'],2).' zł'?></p>
        <?php
      }
    }
    else {
      ?>
      <p><b>Cena:</b> <?=number_format($aukcja['cena'],2).' zł'?></p>
      <p><b>Aukcja zakończona.</b></p>
      <?php
    }
    ?>
    <p><b>Koniec:</b> <?=$aukcja['koniec']?></p>
  </div>
</div>
