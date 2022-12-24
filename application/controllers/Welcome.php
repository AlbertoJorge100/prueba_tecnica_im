<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once BASEPATH . '/helpers/url_helper.php';
// require_once(BASEPATH.'system/application/controllers/templateController.php');
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		// $this->load->helper('url');
	}
	
	public function index()
	{
		$mensaje="Bienvenidos";
		
		$content=$this->load->view('layouts/home', compact('mensaje'), TRUE);
		return $this->template($content,'INICIO');
	}

	public function template($content, $title){		
		$this->load->view('layouts/template',compact('content','title'));
	}
}
