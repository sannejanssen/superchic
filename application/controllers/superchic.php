<?php
class Superchic extends CI_Controller{

	function index()
	{
		redirect('superchic/geschiedenis');
	}
	function geschiedenis()
	{
		$data['navigation'] = "superchic/nav";
		$data['main_content'] = "superchic/geschiedenis";
		$this->load->view('_includes/template', $data);
	}
	function atelier()
	{
	    $data['gallery'] = $this->atelier_model->load_gallery('atelier');
		$data['navigation'] = "superchic/nav";
		$data['main_content'] = "superchic/atelier";
		$this->load->view('_includes/template', $data);
	}
	
}


