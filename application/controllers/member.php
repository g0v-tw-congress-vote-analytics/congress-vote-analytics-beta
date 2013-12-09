<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == null) {
            exit( $this->load->view('no_permission' ,'' ,true));
        }

        $this->load->model('member_model');
    }

    public function index()
    {
        $this->main();
    }

    public function main()
    {
        $this->load->library('table');

        $tmpl = array('table_open' => '<table class="table">');
        $this->table->set_template($tmpl);

        $this->table->set_heading('NO', '使用者名稱', '電話', '地址', '備註');

        foreach ($this->member_model->list_all() as $row) {
            $array = array($row->NO, $row->username);
            $is_self = $this->session->userdata('username') == $row->username;
            $array[] = $is_self ? $row->telephone   : '-';
            $array[] = $is_self ? $row->address     : '-';
            $array[] = $row->other;
            $this->table->add_row($array);
        }
        $data['list'] = $this->table->generate();
        $data['username'] = $this->session->userdata('username');
        $this->load->view('tmpt_header', $data);
        $this->load->view('member/main', $data);
        $this->load->view('tmpt_footer');
    }

    public function update()
    {
        $row = $this->member_model->get_user_data($this->session->userdata('username'));
        $data['username']   = $row->username;
        $data['password']   = $row->password;
        $data['telephone']  = $row->telephone;
        $data['address']    = $row->address;
        $data['other']      = $row->other;
        $data['action']     = base_url('member/update_validate');

        $this->load->view('tmpt_header', $data);
        $this->load->view('member/update', $data);
        $this->load->view('tmpt_footer');
    }

    public function update_validate()
    {
        $input_data = array(    'username'  => $this->input->post('id'),
                                'password'  => $this->input->post('pw'),
                                'telephone' => $this->input->post('telephone'),
                                'address'   => $this->input->post('address'),
                                'other'     => $this->input->post('other'),    );
        $username = $this->input->post('id');

        $this->member_model->set_user_data($username, $input_data);

        redirect(base_url('member'));
    }

    public function delete()
    {
        $data['action'] = base_url('member/delete_validate');

        $this->load->view('tmpt_header', $data);        
        $this->load->view('member/delete', $data);
        $this->load->view('tmpt_footer');
    }

    public function delete_validate()
    {
        $this->member_model->del_user($this->input->post('id'));
        redirect(base_url('member'));   
    }

}

/* End of file member.php */
/* Location: ./application/controllers/member.php */