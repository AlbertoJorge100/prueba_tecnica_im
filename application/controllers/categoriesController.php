<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    require_once BASEPATH . '/helpers/url_helper.php';

    class categoriesController extends CI_Controller {
        
        public function __construct(){
            parent::__construct();
            $this->load->model("categories");
        }

        public function index(){
            $categories = $this->categories->getAll();
            $content = $this->load->view('categories/index', compact('categories'), TRUE);
            
            $this->template($content, 'categories');
        }

        public function template($content, $title){
            $this->load->view('layouts/template', compact('content', 'title'));
        }
    }   
?>