<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Issue extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == null) {
            exit( $this->load->view('no_permission' ,'' ,true));
        }

        $this->load->model('issue_model');
    }

    public function index()
    {
        
    }

}

/* End of file issue.php */
/* Location: ./application/controllers/issue.php */