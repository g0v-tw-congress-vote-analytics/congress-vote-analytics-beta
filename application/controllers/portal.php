<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portal extends CI_Controller {

    public function __construct()
    {
        parent::__construct();  

        $this->load->model('portal_model');
    }

    public function index()
    {
        $this->login();
    }

    public function login()
    {
        $data['action'] = base_url('portal/login_validate');
        $this->load->view('portal/login', $data);
    }

    public function login_validate()
    {
        $id = $this->input->post('id');
        $pw = $this->input->post('pw');

        if ($this->portal_model->login_validate($id, $pw)) {
            $session_data = array(  'username' => $id,
                                    'userid'   => $this->portal_model->get_id($id)->NO );

            $this->session->set_userdata($session_data);

            echo "login sussess!";
            redirect('portal/member');
        }
        else
        {
            echo "login failed!";
            redirect('portal/login');
        }
    }

}

/* End of file portal.php */
/* Location: ./application/controllers/portal.php */