<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class User_model extends CI_Model {
    
    protected $table_name;
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table_name = 'tbl_users';
    }
    
    public function getAll() {
        return $this->db->from($this->table_name)->get()->result_array();
    }
 
}
 
/* End of file user_model.php */
/* Location: ./application/controllers/user_model.php */