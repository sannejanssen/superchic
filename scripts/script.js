function controle_contact(form)
{
  var allesOk = true;
  document.getElementById("error_message").style.visibility = "hidden";
  document.getElementById("bericht").style.background = "#ffffff";
  document.getElementById("bericht").style.color = "#222222";
  document.getElementById("onderwerp").style.background = "#ffffff";
  document.getElementById("onderwerp").style.color = "#222222";
  document.getElementById("email").style.background = "#ffffff";
  document.getElementById("email").style.color = "#222222";
  document.getElementById("telefoon").style.background = "#ffffff";
  document.getElementById("telefoon").style.color = "#222222";
  document.getElementById("naam").style.background = "#ffffff";
  document.getElementById("naam").style.color = "#222222";
  document.getElementById("voornaam").style.background = "#ffffff";
  document.getElementById("voornaam").style.color = "#222222";

  if(form.bericht.value == "")
  {
    document.getElementById("error_message").style.visibility = "visible";
    document.getElementById("bericht").style.background = "#222222";
    document.getElementById("bericht").style.color = "#ffffff";
    allesOk = false;
  }
  if(form.onderwerp.value == "")
  {
    document.getElementById("error_message").style.visibility = "visible";
    document.getElementById("onderwerp").style.background = "#222222";
    document.getElementById("onderwerp").style.color = "#ffffff";
    allesOk = false;
  }
  if(form.email.value == "" || ((form.email.value.indexOf('@', 0) == -1) || (form.email.value.indexOf('.', 0)== -1)))
  {
    document.getElementById("error_message").style.visibility = "visible";
    document.getElementById("email").style.background = "#222222";
    document.getElementById("email").style.color = "#ffffff";
    allesOk = false;
  }
  if(form.telefoon.value == "")
  {
    document.getElementById("error_message").style.visibility = "visible";
    document.getElementById("telefoon").style.background = "#222222";
    document.getElementById("telefoon").style.color = "#ffffff";
    allesOk = false;
  }
  if(form.naam.value == "")
  {
    document.getElementById("error_message").style.visibility = "visible";
    document.getElementById("naam").style.background = "#222222";
    document.getElementById("naam").style.color = "#ffffff";
    allesOk = false;
  }
  if(form.voornaam.value == "")
  {
    document.getElementById("error_message").style.visibility = "visible";
    document.getElementById("voornaam").style.background = "#222222";
    document.getElementById("voornaam").style.color = "#ffffff";
    allesOk = false;
  }
  if(allesOk)
  {
    document.contactformulier.submit();
  }
}

function controle_service(form)
{
  var allesOk = true;
  var white = "#ffffff";
  var error = "#7bcb34";
  var correct = "#222";

  $('#error_message').css("visibility", "hidden");

  /* Woonplaats */
  $('#woonplaats').css("background-color", white);
  $('#woonplaats').css("color", correct);

  /* Woonplaats */
  $('#postcode').css("background-color", white);
  $('#postcode').css("color", correct);

  /* Adres */
  $('#adres').css("background-color", white);
  $('#adres').css("color", correct);

  /* E-mail */
  $('#email').css("background-color", white);
  $('#email').css("color", correct);

  /* Aankoopdatum */
  $('#aankoop').css("background-color", white);
  $('#aankoop').css("color", correct);

  /* Telefoon */
  $('#telefoon').css("background-color", white);
  $('#telefoon').css("color", correct);

  /* Naam */
  $('#naam').css("background-color", white);
  $('#naam').css("color", correct);

  /* Keukenmeubel */
  $('#keukenmeubel').css("background-color", white);
  $('#keukenmeubel').css("color", correct);

  /* Keukentoestel */
  $('#toestel').css("background-color", white);
  $('#toestel').css("color", correct);

  /* Type */
  $('#type').css("background-color", white);
  $('#type').css("color", correct);

  /* Merk */
  $('#merk').css("background-color", white);
  $('#merk').css("color", correct);

  /* Probleem met het meubel aangevinkt */
  if($('#keukenmeubel-probleem-check').prop('checked')) {

    if(form.keukenmeubel.value == "")
    {
      $('#error_message').css("visibility", "visible");
      $('#keukenmeubel').css("background-color", error);
      $('#keukenmeubel').css("color", white);
      allesOk = false;
    }
  }

  if($('#toestel-probleem-check').prop('checked')) {

    if(form.toestel.value == "")
    {
      $('#error_message').css("visibility", "visible");
      $('#toestel').css("background-color", error);
      $('#toestel').css("color", white);
      allesOk = false;
    }

    if(form.type.value == "")
    {
      $('#error_message').css("visibility", "visible");
      $('#type').css("background-color", error);
      $('#type').css("color", white);
      allesOk = false;
    }

    if(form.merk.value == "")
    {
      $('#error_message').css("visibility", "visible");
      $('#merk').css("background-color", error);
      $('#merk').css("color", white);
      allesOk = false;
    }
  }

  /* Controle woonplaats */
  if(form.woonplaats.value == "")
  {
    $('#error_message').css("visibility", "visible");
    $('#woonplaats').css("background-color", error);
    $('#woonplaats').css("color", white);
    allesOk = false;
  }

  /* Controle postcode */
  if(form.postcode.value == "")
  {
    $('#error_message').css("visibility", "visible");
    $('#postcode').css("background-color", error);
    $('#postcode').css("color", white);
    allesOk = false;
  }

  /* Controle adres */
  if(form.adres.value == "")
  {
    $('#error_message').css("visibility", "visible");
    $('#adres').css("background-color", error);
    $('#adres').css("color", white);
    allesOk = false;
  }

  /* Controle emailadres */
  if(form.email.value == "" || ((form.email.value.indexOf('@', 0) == -1) || (form.email.value.indexOf('.', 0)== -1)))
  {
    $('#error_message').css("visibility", "visible");
    $('#email').css("background-color", error);
    $('#email').css("color", white);
    allesOk = false;
  }

  /* Controle aankoopdatum */
  if(form.aankoop.value == "")
  {
    $('#error_message').css("visibility", "visible");
    $('#aankoop').css("background-color", error);
    $('#aankoop').css("color", white);
    allesOk = false;
  }

  /* Controle telefoon */
  if(form.telefoon.value == "")
  {
    $('#error_message').css("visibility", "visible");
    $('#telefoon').css("background-color", error);
    $('#telefoon').css("color", white);
    allesOk = false;
  }

  /* Controle naam */
  if(form.naam.value == "")
  {
    $('#error_message').css("visibility", "visible");
    $('#naam').css("background-color", error);
    $('#naam').css("color", white);
    allesOk = false;
  }
  if(allesOk)
  {
    document.contactformulier.submit();
  }
}

$(document).ready(function() {
  $("div#main_content.contact div#form_button").click(function () {
    $(this).addClass('open').removeClass('closed');
    $("div#main_content.contact div#contact_form").show(500);
  });

  $("#contact_form #keukenmeubel-probleem-check").click(function() {
    // console.log('hier');

    var $this = $(this);
    if($this.hasClass('closed')) {
      $(this).addClass('open').removeClass('closed');
      $("div#main_content .keukenmeubel").slideDown(500);
    } else {
      $(this).addClass('closed').removeClass('open');
      $("div#main_content .keukenmeubel").slideUp(500);
    }
  });

  $("#contact_form #toestel-probleem-check").click(function() {
    var $this = $(this);
    if($this.hasClass('closed')) {
      $(this).addClass('open').removeClass('closed');
      $("div#main_content .keukentoestel").slideDown(500);
    } else {
      $(this).addClass('closed').removeClass('open');
      $("div#main_content .keukentoestel").slideUp(500);
    }
  });
});

