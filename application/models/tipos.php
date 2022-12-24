<?php
    defined('BASEPATH') or exit('No direct script accesss allowed');
    class tipos extends CI_Model{
        private $table = "tipos";

        public function __construct(){
            $this->load->database();
        }

        public function get_all(){
            return $this->db->query("select * from tipos where activo = 1")->result();
        }

        public function find($id){
            return $this->db->query("select * from tipos where id = '" . $id . "' and activo = 1 ")->result()[0];
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