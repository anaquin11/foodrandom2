<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class user_model extends CI_Model {

	var $id;
	var $fullname;
	var $username;
	var $password;

	function __construct()
    {
        parent::__construct();
    }
    
    function get_user_by_id($user_id, $is_active=TRUE)
    {
    	$this->db->where('id', $user_id);
    	$query = $this->db->get('user');
        return $query->row();
    }

    function get_user_by_username($username, $is_active=TRUE)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        return $query->row();
    }

    function validate_user($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('user');
        return $query->row();
    }

}

/* End of file user_model.php */
/* Location: ./application/model/user_model.php */