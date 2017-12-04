<?php
if($this->session->flashdata('komunikat')) {
  ?>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">
        Komunikat
      </div>
      <div class="panel-body">
        <?=$this->session->flashdata('komunikat')?>
      </div>
    </div>
  </div>
  <?php
}
 ?>
