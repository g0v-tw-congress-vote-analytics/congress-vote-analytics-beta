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

}

/* End of file member.php */
/* Location: ./application/controllers/member.php */