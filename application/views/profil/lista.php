<div class="container">
  <?php
  if($aukcje) {
    foreach($aukcje as $a) {
      if($a['zdjecie']) $zdjecie=base_url($a['zdjecie']);
      else $zdjecie=base_url('zdjecia/brak.png');
      ?>
      <div class="media">
        <div class="media-left">
          <img class="media-object" style="width: 100px" src="<?=$zdjecie?>" alt="zdjecie">
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?=$a['tytul']?></h4>
          <p>Opis: <?=$a['opis']?></p>
          <p>Cena: <?=number_format($a['cena'],2).' zł'?></p>
          <p>Prowadzący: <?php if($a['idProwadzacego']) {
            $prowadzacy=$this->db->get_where('uzytkownicy',array('id'=>$a['idProwadzacego']))->row_array();
            echo $prowadzacy['imie'].' '.$prowadzacy['nazwisko'];
          } else echo 'brak'; ?></p>
          <?php
          if($usuwanie) {
            echo anchor('profil/usun/'.$a['id'],'Usuń aukcję',array('class'=>'btn btn-default'));
          }
          echo anchor('aukcje/szczegoly/'.$a['id'],'Podgląd aukcji',array('class'=>'btn btn-default'));
           ?>
        </div>
      </div>
      <?php
    }
  }
  else {
    ?>
    <p>Brak danych do wyświetlenia.</p>
    <?php
  }
  ?>
</div>
