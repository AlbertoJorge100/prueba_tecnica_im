<?php
    defined('BASEPATH') or exit('No direct script accesss allowed');
    class maquinas extends CI_Model{
        private $table = "maquinas";

        public function __construct(){
            $this->load->database();
        }

        public function get_all(){
            return $this->db->query("select m.*, t.nombre 'tipo' from maquinas m inner join tipos t on m.tipo_id = t.id where m.activo = 1")->result();
        }

        public function getByType($id){
            return $this->db->query("select m.*, t.nombre 'tipo' from maquinas m inner join tipos t on m.tipo_id = t.id where m.tipo_id = '".$id."' and m.activo = 1")->result();
        }

        public function find($id){
            return $this->db->query("select * from maquinas where id = '" . $id . "' and activo = 1 ")->result()[0];
        }

        public function insert($data){
            $this->db->insert($this->table, $data);
        }

        public function update($data, $id){
            $this->db->where('id', $id)->update($this->table, $data);
        }

        public function delete($id){
            $this->db->where('id', $id)->update($this->table, ['activo' => 0]);
        }
    }
?>