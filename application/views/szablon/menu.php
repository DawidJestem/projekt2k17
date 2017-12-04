<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=site_url()?>">Strona główna</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Aukcje<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><?=anchor('aukcje','Wszystkie')?></li>
            <?php
            $kategorie=$this->db->get('kategorie')->result_array();
            foreach($kategorie as $a) {
              ?>
              <li><?=anchor('aukcje/index/'.$a['id'],ucfirst($a['nazwa']))?></li>
              <?php
            }
            ?>
          </ul>
        </li>
        <?php
        if($this->session->userdata('zalogowany')) {
          $powiadomienia=$this->db->get_where('powiadomienia',array('idUzytkownika'=>$this->session->userdata('id')))->result_array();
          ?>
          <li><?=anchor('profil','<i class="glyphicon glyphicon-user"></i> '.$this->session->userdata('imie'))?></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Powiadomienia
              <sup><span class="label label-default"><?=count($powiadomienia)?></span></sup>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <?php foreach($powiadomienia as $a) {
                ?>
                <li>
                  <?=anchor('profil/powiadomienie/'.$a['id'],'Zmiana statusu aukcji - zobacz')?>
                </li>
                <?php
              } ?>
            </ul>
          </li>
          <?php
        }
        else {
          ?>
          <li><?=anchor('rejestracja','Rejestracja')?></li>
          <li><?=anchor('logowanie','Logowanie')?></li>
          <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>
