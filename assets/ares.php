<?php
$ares_ico_fin = "";
$ares_dic_fin = "";
$ares_firma_fin = "";
$ares_ulice_fin	= "";
$ares_cp1_fin	= "";
$ares_cp2_fin	= "";
$ares_mesto_fin	= "";
$ares_psc_fin	= "";
$ares_stav_fin = "";

$file = @file_get_contents("http://wwwinfo.mfcr.cz/cgi-bin/ares/darv_bas.cgi?ico=".$_POST["ico_ajax_send"]);

if($file)
  {
    $xml = @simplexml_load_string($file);
  }

if($xml) 
  {
    $ns = $xml->getDocNamespaces();
    $data = $xml->children($ns['are']);
    $el = $data->children($ns['D'])->VBAS;
    
    if (strval($el->ICO) == $_POST["ico_ajax_send"]) 
      {
        $ares_ico_fin = strval($el->ICO);
        $ares_dic_fin = strval($el->DIC);
        $ares_firma_fin = strval($el->OF);
        $ares_ulice_fin	= strval($el->AA->NU);
        $ares_cp1_fin	= strval($el->AA->CD);
        $ares_cp2_fin	= strval($el->AA->CO);
        if($ares_cp2_fin != ""){ $ares_cp_fin = $ares_cp1_fin."/".$ares_cp2_fin; }else{ $ares_cp_fin = $ares_cp1_fin; }
        $ares_mesto_fin	= strval($el->AA->N);
        $ares_psc_fin	= strval($el->AA->PSC);
        $ares_stav_fin = 1;
      } 
    else
      {
        $ares_stav_fin 	= 'IČO firmy nebylo nalezeno';
      } 
  }
else
  {
    $ares_stav_fin 	= 'Databáze ARES není dostupná';
  }
?>

<script>
  $(".tl_popup_ares").trigger( "click" );
</script>


<div class="box_obsah box_kosik_ares" style="display: none;">
  <span class="box_close"></span>

  <h3 class="nadpis_ares">Získané údaje z ARES</h3>

  <?php
  if($ares_stav_fin == 1)
    {
  ?>
      <div class="obal_radku_ares">
        <div class="radek_udaju_z_ares">
          <div class="nazev_udaje_z_ares">Firma:</div>
          <div id="div_fakturacni_firma" class="polozka_udaje_z_ares"><?php echo $ares_firma_fin; ?></div>
          <div class="spacer"></div>
        </div>
        <div class="radek_udaju_z_ares">
          <div class="nazev_udaje_z_ares">Adresa:</div>
          <div id="div_fakturacni_adresa" class="polozka_udaje_z_ares"><?php echo $ares_ulice_fin." ".$ares_cp_fin; ?></div>
          <div class="spacer"></div>
        </div>
        <div class="radek_udaju_z_ares">
          <div class="nazev_udaje_z_ares">Město:</div>
          <div id="div_fakturacni_mesto" class="polozka_udaje_z_ares"><?php echo $ares_mesto_fin; ?></div>
          <div class="spacer"></div>
        </div>
        <div class="radek_udaju_z_ares">
          <div class="nazev_udaje_z_ares">PSČ:</div>
          <div id="div_fakturacni_psc" class="polozka_udaje_z_ares"><?php echo $ares_psc_fin; ?></div>
          <div class="spacer"></div>
        </div>
        <div class="radek_udaju_z_ares">
          <div class="nazev_udaje_z_ares">DIČ</div>
          <div id="div_fakturacni_dic" class="polozka_udaje_z_ares"><?php echo $ares_dic_fin; ?></div>
          <div class="spacer"></div>
        </div>
      </div>
  <?php
    }
  else
    {
      echo "<div class='ares_chybova_hlaska'>".$ares_stav_fin."</div>";
    }
  ?>

  <div class="blok_tlacitek_popup_ares">
    <?php
    if($ares_stav_fin == 1)
      {
        echo "<input type='submit' class='tl_popup_ares_in tl_ares_vlozit'>";
      }
    ?>
    <input type="submit" class="tl_popup_ares_in tl_ares_zavrit" value="Zavřít">
  </div>
  <div class="spacer"></div>
</div>

<span class="tl_popup_ares" style="display: none;"></span>

