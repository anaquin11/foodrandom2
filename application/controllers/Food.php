<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Food extends CI_Controller {
    
    protected $table_name;
    
    public function __construct() {
        parent::__construct();
        $this->load->model("food_model");
        $this->load->helper(array('url'));
    }
    
    public function index()
	{
		$this->load->view('food_view');
	}
 
	public function get_list() {
        $data = $this->food_model->get_food();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function post_random() {
    	log_message('info','99999999999999999999999999');
    	$data = $this->input->post('fff');
    	log_message('info',$data);
		log_message('info',$this->input->post(null));
		log_message('info',$this->input->get('fff'));
		$data2 = array('foo' => 'bar', 'property' => 'value');
    	$this->output->set_content_type('application/json')->set_output(json_encode($data2));
    }

}
 
/* End of file Food.php */
/* Location: ./application/controllers/Food.php */