<?php
class Keukens extends CI_Controller{

	function index()
	{
		redirect("keukens/modern");
	}
	function modern()
	{
		$data['gallery'] = $this->gallery_model->load_gallery('modern');
		$this->load_page($data);
	}
	function design()
	{
		$data['gallery'] = $this->gallery_model->load_gallery('design');
		$this->load_page($data);
	}
	function landelijk()
	{
		$data['gallery'] = $this->gallery_model->load_gallery('landelijk');
		$this->load_page($data);
	}
	function inrichting()
	{
		$data['gallery'] = $this->gallery_model->load_gallery('inrichting');
		$this->load_page($data);
	}
	
	function load_page($data)
	{
		$data['navigation'] = "keukens/nav";
		$data['main_content'] = "keukens/gallery";
		
		$this->load->view('_includes/template', $data);
	}
}


