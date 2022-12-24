<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    require_once BASEPATH . '/helpers/url_helper.php';

    class tiposController extends CI_Controller{

        public function __construct()
        {
            parent::__construct();                           
            $this->load->model('tipos');
        }

        public function index(){
            $tipos = $this->tipos->get_all();
            $content = $this->load->view('tipos/index', compact('tipos'), TRUE);

            return $this->template($content, 'TIPOS');
        }

        public function modal(){
            $id = $this->input->post('id');
            $insert = $id == -1 ? true : false;
            $info = array();            

            if(!$insert)
                $info = $this->tipos->find($id);

            $this->load->view('tipos/_partials/modal', compact('insert', 'info'));
        }

        public function store(){
            $req = $this->input;
            $id = $req->post('id');

            if($id == -1)
                $this->tipos->insert(['nombre' => $req->post('nombre')]);
            else 
                $this->tipos->update(['nombre' => $req->post('nombre')], $id);
        }

        public function delete(){
            $this->tipos->delete($this->input->post("id"));
        }

        public function template($content, $title){		
            $this->load->view('layouts/template',compact('content','title'));
        }
    }

?>