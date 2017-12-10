<div class="container messages">
  <div class="col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Wszystkie rozmowy</h4>
      </div>
      <div class="panel-body">
        <ul class="list-group">
          <?php
          if($rozmowy) {
            foreach($rozmowy as $a) {
              if($a['idUzytkownika']==$this->session->userdata('id')) $id=$a['idUzytkownika1'];
              else $id=$a['idUzytkownika'];
              $uzytkownik=$this->db->get_where('uzytkownicy',array('id'=>$id))->row_array();
              ?>
              <li class="list-group-item"><div><?=$uzytkownik['imie'].' '.$uzytkownik['nazwisko']?></div> <?=anchor('wiadomosci/rozmowa/'.$id,'Otwórz rozmowę',array('class'=>'btn btn-default'))?></li>
              <?php
            }
          }
          else {
            ?>
            <li class="list-group-item">Brak rozmów</li>
            <?php
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
</div>
