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
            redirect('issue');
        }
        else
        {
            echo "login failed!";
            redirect('portal');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('portal');
    }

    public function register() 
    {
        $data['action'] = base_url('portal/register_validate');
        $this->load->view('portal/register', $data);
    }

    public function register_validate()
    {
        if( $this->input->post('pw') != $this->input->post('pw2')) {
            exit('password and password checking is diiferent!');
        }

        #TODO: Form validate

        $input_data = array(    'username'  => $this->input->post('id'),
                                'password'  => $this->input->post('pw'),
                                'telephone' => $this->input->post('telephone'),
                                'address'   => $this->input->post('address'),
                                'other'     => $this->input->post('other'),    );

        $this->portal_model->put_user_data($input_data);
        redirect('portal');

    }
}

/* End of file portal.php */
/* Location: ./application/controllers/portal.php */