<?php
class Language extends CI_Controller{

	function index()
	{
		// $this->lang->load('about', 'french');
		// $this->load->view('_includes/template', $data);
	}
	function fr()
	{
		$language_array = array('language' => "fr");
		$this->session->set_userdata($language_array);
		
		$this->lang->load('superchic_fr', 'french');
		$redirect_url = '';
		for($s = 3; $s < 11; $s++)
		{
			if($this->uri->segment($s))
			{
				$redirect_url .= $this->uri->segment($s) . "/";
			}
		}
		redirect($redirect_url);
	}
	function nl()
	{
		$language_array = array('language' => "nl");
		$this->session->set_userdata($language_array);
		
		$this->lang->load('superchic_nl', 'dutch');
		$redirect_url = '';
		for($s = 3; $s < 11; $s++)
		{
			if($this->uri->segment($s))
			{
				$redirect_url .= $this->uri->segment($s) . "/";
			}
		}
		redirect($redirect_url);
	}
	
}

