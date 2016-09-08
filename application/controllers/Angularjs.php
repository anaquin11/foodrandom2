<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Angularjs extends CI_Controller {
 
    public function index()
    {
        $this->load->helper(array('url'));
        $this->load->view('angularjs_view');
    }
    
    public function get_list() {
        $this->load->model(array('user_model'));
        $data = $this->user_model->getAll();
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
}
 
/* End of file Angularjs.php */
/* Location: ./application/controllers/Angularjs.php */