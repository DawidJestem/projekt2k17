<div class="container user-panel">

    <div class="col-xs-12">
        <div>
            <strong>Imię:</strong> <?=$this->session->userdata('imie')?>
        </div>
        <div>
            <strong>Nazwisko:</strong> <?=$this->session->userdata('nazwisko')?>
        </div>
    </div>

  <div class="btn-group-vertical col-xs-12">
    <?=anchor('profil/dodaj','Dodaj aukcję',array('class'=>'btn btn-default'))?>
    <?=anchor('profil/aukcje','Moje aukcje',array('class'=>'btn btn-default'))?>
    <?=anchor('profil/historia','Moje zakupy',array('class'=>'btn btn-default'))?>
    <?=anchor('wiadomosci','Wiadomości',array('class'=>'btn btn-default'))?>
    <?=anchor('profil/wyloguj','Wyloguj',array('class'=>'btn btn-default'))?>
  </div>
</div>
