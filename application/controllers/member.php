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
        $data['list'] = '';

        foreach ($this->member_model->list_all() as $row) {
            $data['list'] .= "{$row->NO} - 名字(帳號)：{$row->username}, ";

            if ($this->session->userdata('username') == $row->username) {
                $data['list'] .= "電話：{$row->telephone}, 地址：{$row->address}, ";
            }
            $data['list'] .= "備註：{$row->other}, ";
            $data['list'] .= '<br/>';

        }

        $data['username'] = $this->session->userdata('username');
          
        $this->load->view('member/main', $data);
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

        $this->load->view('member/update', $data);
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

}

/* End of file member.php */
/* Location: ./application/controllers/member.php */