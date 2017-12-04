<?php
$this->session->set_userdata('aktualna',"http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
 ?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="<?=base_url('css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
  <title><?=$tytul?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
