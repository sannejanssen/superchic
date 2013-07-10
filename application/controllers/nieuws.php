<?php
class Nieuws extends CI_Controller{

	function index()
	{
	  
	    $data['nieuwsberichten'] = $this->news_model->load_messages('nieuws');
	    
	    $data['navigation'] = "nieuws/nav";
		$data['main_content'] = "nieuws/nieuwspagina";
		
		$this->load->view('_includes/template', $data);
	
	}
}


