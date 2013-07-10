<?php
class Contact extends CI_Controller{
  private $email_address = "info@superchic.be";
  
	function index()
	{
		redirect('contact/deerlijk');	
	}
	function deerlijk()
	{
		$data['navigation'] = "contact/nav";
		$data['main_content'] = "contact/location";
		
		$this->load->view('_includes/template', $data);
	}
	function gent()
	{
		$data['navigation'] = "contact/nav";
		$data['main_content'] = "contact/location";
		
		$this->load->view('_includes/template', $data);
	}
	function gent_submit()
	{
		$this->sendmail();	
	    redirect('contact/gent/sent');
	}
	function deerlijk_submit()
	{
		$this->sendmail();	
		redirect('contact/deerlijk/sent');
	}	
	
	
	function sendmail()
	{
	  date_default_timezone_set('Europe/Brussels');
	  
	  $post_onderwerp = $this->input->post('onderwerp');
  	  $post_voornaam = $this->input->post('voornaam');
		$post_naam = $this->input->post('naam');
		$post_telefoon = $this->input->post('telefoon')?$this->input->post('telefoon'):'-';
		$post_email = $this->input->post('email');
		$post_bericht = $this->input->post('bericht');
		
		$contact_datum = date('d/n/Y');
		$contact_tijd = date('G:i');
		
		$email = <<<TEST
		$contact_datum - $contact_tijd
		$post_voornaam $post_naam nam contact op via het contactformulier 
		
		Naam: $post_voornaam $post_naam
  		Email: $post_email
  		Telefoon: $post_telefoon
  		Onderwerp: $post_onderwerp
  		
  		Bericht: $post_bericht
  		
TEST
;

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
    $from_name = $post_voornaam ." " .$post_naam;
    $this->email->from($post_email, $from_name); // change it to yours
    $this->email->to($this->email_address); // change it to yours
    $this->email->subject("Contact SuperChic");
    $this->email->message($email);
    $this->email->send();	
  }
}


