$(document).on("click",".tl_popup_ares",function(e)
{
  e.preventDefault();
  $(".box_kosik_ares, .box_obal").show();
});
$(document).on("click",".box_obal, .box_kosik_ares .box_close, .tl_ares_zavrit",function(e)
{
  e.preventDefault();
  $(".box_obsah, .box_obal").fadeOut( 1000 );
});

$(document).on("click",".button_send",function(e)
{
  var vyplneno_dobre = false;
  e.preventDefault();

  vyraz = /^\d{8}$/; //ico
  var hodnota_polozky = $('.prvek_fakturacni_ico').val();
  if( hodnota_polozky == "" )
    {
      alert("Po zjištění firemních údajů z ARES je nutné vyplnit IČO");
      vyplneno_dobre = false;
    }
  else
    {
      if(!vyraz.test(hodnota_polozky))
        {
          alert("Špatný formát IČO - právě 8 číslic");
          vyplneno_dobre = false;
        }else{ //ok
          vyplneno_dobre = true;
        }
    }

  if( vyplneno_dobre == true ){ //pokud je naplnene (a dobre) ICO ve fakturacnich udajich

    ico_ajax = parseInt($("#fakturacni_ico").val());

    $(".ajax_loader_ares").show();
    $.ajax
    ({
        url: "assets/ares.php",
        type: "POST",
        data: {
           ico_ajax_send: ico_ajax,
        },
        success: function(data)
          {

            $("#ares_okno").html(data);
            //$(".tl_popup_ares").trigger( "click" );
            $(".ajax_loader_ares").hide();
          }
    });

  }
});

$(document).on("click",".tl_ares_vlozit",function(e)
{ //vloz nactene hodnoty z ARES do formulare
  var hodnota_firma = $("#div_fakturacni_firma").text();
  var hodnota_adr = $("#div_fakturacni_adresa").text();
  var hodnota_mesto = $("#div_fakturacni_mesto").text();
  var hodnota_psc = $("#div_fakturacni_psc").text();
  var hodnota_dic = $("#div_fakturacni_dic").text();

  $(".fakt_firma").val(hodnota_firma);
  $(".fakt_adresa").val(hodnota_adr);
  $(".fakt_mesto").val(hodnota_mesto);
  $(".fakt_psc").val(hodnota_psc);
  $(".fakt_dic").val(hodnota_dic);

  $(".box_obsah, .box_obal").fadeOut( 1000 ); //zavri popup okno
});

