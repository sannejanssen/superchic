<?php
class Service extends CI_Controller{
  private $email_address = "service@superchic.be";

	function index()
	{
		$data['navigation'] = "service/nav";
		$data['main_content'] = "service/form";

    $this->output->cache(10);

		$this->load->view('_includes/template', $data);
	}

  function service_submit()
  {
    $captcha = $this->input->post('emailaddr');
    if($captcha == '') {
      $this->sendmail();
      redirect('service/confirm');
    } else {
      redirect('service/confirm');
    }
  }

  function confirm() {
    $data['navigation'] = "service/nav";
    $data['main_content'] = "service/confirm";
    $this->load->view('_includes/template', $data);
  }

  function sendmail()
  {
    date_default_timezone_set('Europe/Brussels');


    $naam = $this->input->post('naam');
    $telefoon = $this->input->post('telefoon');
    $aankoopdatum = $this->input->post('aankoop');
    $email = $this->input->post('email');
    $adres = $this->input->post('adres');
    $postcode = $this->input->post('postcode');
    $woonplaats = $this->input->post('woonplaats');
    
    $meubelprobleem_show = FALSE;
    $meubelprobleem_text = '';
    if($this->input->post('keukenmeubel-probleem-check') ==  1) {
      $meubelprobleem_show = TRUE;
      $meubelprobleem_text = $this->input->post('keukenmeubel');
    }

    $toestelprobleem_show = FALSE;
    $toestelprobleem_toestel = '';
    $toestelprobleem_merk = '';
    $toestelprobleem_type = '';
    $toestelprobleem_text = '';

    $options = array(
      '1'  => '(stoom)oven',
      '2'  => '(combi-)microgolf',
      '3'  => 'kookplaat',
      '4'  => '(wijn)koelkast',
      '5'  => 'tepan yaki',
      '6'  => 'friteuse',
      '7'  => 'fornuis',
      '8'  => 'vaatwasser',
      '9'  => 'dampkap',
      '10' => 'spoeltafel',
      '11' => 'kraan',
      '12' => 'andere',
    );

    if($this->input->post('toestel-probleem-check') == 1) {
    //if($this->input->post('toestel-probleem-check') == 'accept') {
      $toestelprobleem_show = TRUE;
      $toestelprobleem_toestel = $options[$this->input->post('keukentoestel')];
      $toestelprobleem_merk = $this->input->post('merk');
      $toestelprobleem_type = $this->input->post('type');
      $toestelprobleem_text = $this->input->post('toestel');
    }

    $contact_datum = date('d/n/Y');
    $contact_tijd = date('G:i');




        $email_message = <<<TEST
Op $contact_datum om $contact_tijd werd het serviceformulier ingevuld:

Naam:         $naam
Adres:        $adres, $postcode $woonplaats
Telefoon:     $telefoon
E-mailadres:  $email
Aankoopdatum: $aankoopdatum


TEST
;

if($meubelprobleem_show) {
  $email_message .= <<<TEST
Ik heb een probleem met mijn SuperChic keukenmeubel
$meubelprobleem_text


TEST
;
}

if($toestelprobleem_show) {
  $email_message .= <<<TEST
Ik heb een probleem met mijn SuperChic keukentoestel
Toestel: $toestelprobleem_toestel
Merk: $toestelprobleem_merk
Type: $toestelprobleem_type
Probleem: $toestelprobleem_text
TEST
;
}


$config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'mail.priorweb.be',
  'smtp_user' => 'dummy@sannejanssen.be',
  'smtp_pass' => 'ked8Ga75dSJ',
  'smtp_port' => 25,
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);
/*
$config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_user' => 'mail.dummytester@gmail.com',
  'smtp_pass' => 'dummytester44',
  'smtp_port' => 465,
  'charset' => 'utf-8',
  'wordwrap' => TRUE
);
*/

$this->email->initialize($config);
$this->email->set_newline("\r\n");
$this->email->from($email, $naam);
$this->email->to($this->email_address);
$this->email->subject("Service SuperChic");
$this->email->message($email_message);
$this->email->send();
  }
}


