<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    require_once BASEPATH . '/helpers/url_helper.php';

    class maquinasController extends CI_Controller{

        public function __construct()
        {
            parent::__construct();               
            $this->load->model('maquinas');
            $this->load->model('tipos');
        }

        public function index(){
            $maquinas = $this->maquinas->get_all();
            $data = $this->load->view('maquinas/_partials/data', compact('maquinas'), TRUE);            
            $content = $this->load->view('maquinas/index', compact('maquinas', 'data'), TRUE);
            
            return $this->template($content, 'MAQUINAS');
        }

        public function filtro(){
            $maquinas = $this->maquinas->get_all();
            $tipos = $this->tipos->get_all();
            $data = $this->load->view('maquinas/_partials/data', compact('maquinas'), TRUE);            
            $content = $this->load->view('maquinas/filtro', compact('maquinas', 'data', 'tipos'), TRUE);

            return $this->template($content, 'FILTRO DE MAQUINAS');
        }

        public function ajax_all(){            
            $maquinas = $this->maquinas->get_all();             
            echo $this->load->view('maquinas/_partials/data', compact('maquinas'), TRUE);                        
        }

        public function getByType(){
            $id = $this->input->get('id');
            $maquinas = $this->maquinas->getByType($id); 
            
            echo $this->load->view('maquinas/_partials/data', compact('maquinas'), TRUE);            
            //echo json_encode(['hola'=>'hola', 'id' => $maquinas]);
        }

        public function modal(){
            $id = $this->input->post('id');
            $insert = $id == -1 ? true : false;
            $info = array();
            $tipos = $this->tipos->get_all();

            if(!$insert)
                $info = $this->maquinas->find($id);

            $this->load->view('maquinas/_partials/modal', compact('insert', 'info', 'tipos'));
        }

        //store || update id = -1? store, then update
        public function store(){
            $req = $this->input;
            $id = $req->post("id");
            $data = array(
                'nombre' => $req->post('nombre'),
                'codigo' => $req->post('codigo'),
                'tipo_id' => $req->post('tipo_id'),
                'descripcion' => $req->post('descripcion')                
            );
            
            if($id == -1)
                $this->maquinas->insert($data);
            else
                $this->maquinas->update($data, $id);
                            
        }

        public function delete(){                    
            $this->maquinas->delete($this->input->post("id"));            
        }

        public function template($content, $title){		
            $this->load->view('layouts/template',compact('content','title'));
        }

        public function api(){
            $headers = array('Content-Type: application/json',);
            $url = 'https://api.trello.com/1/boards/615e121e55742a5a6ba346bc/cards?key=8b326737f43e5a629e80b9c95b0a6016&token=fcd44ca66295583ff083eb88f93ef882c4836355b6edce681b2b9fc631c15517' ; 
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $result = curl_exec($ch);
            curl_close($ch);

            return json_decode($result, true)[0]["name"];           
        }
    }       
?>