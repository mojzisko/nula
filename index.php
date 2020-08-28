<!DOCTYPE html>
<html lang="cs">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
    <link rel="stylesheet" href="styles/index.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&family=Roboto:wght@300;500&display=swap" rel="stylesheet">
</head>  
<body>
  <script src="funkce/jquery-1.10.2.min.js" type="text/javascript"></script>
  <script src="assets/ares.js?v=1.0" type="text/javascript"></script>
  <link rel="stylesheet" href="styles/index.css" type="text/css">


    <span id="ares_okno"></span>
    



<div class="wrapper"> 

    <div class="company_form">
        <div class="fields">
            <input type ="text" class="input fakt_firma" placeholder="Firma" name="firma">
            <input type ="text" class="input fakt_adresa" placeholder="Adresa" name="adresa">
            <input type ="text" class="input fakt_mesto" placeholder="Město" name="mesto">
            <input type ="text" class="input fakt_psc" placeholder="PSČ" name="psc">
            <input type ="text" class="input fakt_dic" placeholder="DIČ" name="dic">
        </div>

        <div class="submit_form">
            <input class="prvek_fakturacni_ico" type="text" name="fakturacni_ico" id="fakturacni_ico" placeholder="Zadejte IČO">
            <input type="submit" name="submit_button" value="odeslat" class="button_send">
            
        </div>
    </div>
    
</div>

<div class="ajax_loader_ares"><div class="ajax_loader_ares_in"></div></div>



</body>

</html>


