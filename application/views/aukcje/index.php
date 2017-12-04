<div class="container">
    <div class="row">
        <?php
        if($aukcje) {
            foreach($aukcje as $a) {
                $kategoria=$this->db->get_where('kategorie',array('id'=>$a['idKategorii']))->row_array();
                $uzytkownik=$this->db->get_where('uzytkownicy',array('id'=>$a['idUzytkownika']))->row_array();
                if($a['zdjecie']) $zdjecie=base_url($a['zdjecie']);
                else $zdjecie=base_url('zdjecia/brak.png');
                ?>
                <div class="col-12 col-md-6">
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object" src="<?=$zdjecie?>" alt="zdjecie">
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?=$a['tytul']?></h4>
                            <p><b>Kategoria:</b> <?=$kategoria['nazwa']?></p>
                            <p><b>Sprzedający:</b> <?=$uzytkownik['imie'].' '.$uzytkownik['nazwisko']?></p>
                            <p><b>Prowadzący:</b> <?php if($a['idProwadzacego']) {
                                    $prowadzacy=$this->db->get_where('uzytkownicy',array('id'=>$a['idProwadzacego']))->row_array();
                                    echo $prowadzacy['imie'].' '.$prowadzacy['nazwisko'];
                                } else echo 'brak'; ?></p>
                            <p><b>Obecna cena:</b> <?=number_format($a['cena'],2).' zł'?></p>
                            <p><b>Koniec:</b> <?=$a['koniec']?></p>
                            <p class="text-right"><?=anchor('aukcje/szczegoly/'.$a['id'],'Szczegóły',array('class'=>'btn btn-default'))?></p>
                        </div>
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
</div>
