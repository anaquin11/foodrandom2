<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class food_model extends CI_Model {

	var $food_id;
	var $food_name;
	var $food_seq;

	function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    function get_food()
    {
        $this->db->order_by("food_seq","asc");
        $query = $this->db->get('food');
        return $query->result();
    }

    function get_food_by_id($food_id)
    {
    	$this->db->where('food_id', $food_id);
    	$query = $this->db->get('food');
        return $query->row();
    }
}

/* End of file user_model.php */
/* Location: ./application/model/food_model.php */