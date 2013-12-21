<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Politician extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('username') == null) {
            exit( $this->load->view('no_permission' ,'' ,true));
        }

        $this->load->model('politician_model');
    }

    public function index()
    {
        $this->list_all();
    }

    public function list_all()
    {
        $data['username']   = $this->session->userdata('username');
        $data['tbody']      = '';
        

        $this->load->library('table');

        $tmpl = array('table_open' => '<table class="table">');
        $this->table->set_template($tmpl);

        $this->table->set_heading('序號', '立委名稱', '加權排序');

        foreach ($this->politician_model->list_all($this->session->userdata('userid')) as $row) {
            $a_ref = base_url("politician/page/{$row->pid}");

            $array = array();
            $array[] = $row->pid;
            $array[] = "<a href=\"{$a_ref}\">{$row->name}</a>";
            $array[] = $row->cont;
            $this->table->add_row($array);
        }
        $data['tbody'] = $this->table->generate();

        $this->load->view('tmpt_header', $data);
        $this->load->view('politician/list_all', $data);
        $this->load->view('tmpt_footer');
    }

    public function page($pid, $pname='')
    {
        $data['tbody']  = '';
        $data['pid']    = $pid;
        $data['pname']  = $this->politician_model->get_name($data['pid']);
        $data['username']  = $this->session->userdata('username');
		/* new */
		$ctr = 0;
		$this->load->library('table');

        $tmpl = array('table_open' => '<table class="table">');
        $this->table->set_template($tmpl);

        $this->table->set_heading('序號', '議題名稱(點選連結進入議題內頁)', '立委立場','重視程度');

        foreach ($this->politician_model->get_info($data['pid']) as $row) {
            $ctr++;
			$a_ref = base_url("/issue/page/{$row->id}");

            $array = array();
            $array[] = $ctr;
            $array[] = "<a href=\"{$a_ref}\">{$row->name}</a>";            
			switch ($row->vote) {
                case '1':     
					$array[] = '支持';
                    break;
                case '-1':                    
					$array[] = '反對';
                    break;
                default:             
					$array[] = '尚未表態';
                    break;           
            }
			$array[] =isset($row->scale) ? $row->scale : '-';
            $this->table->add_row($array);
        }

		$data['tbody'] = $this->table->generate();
		
        $this->load->view('tmpt_header', $data);
        $this->load->view('politician/page', $data);
        $this->load->view('tmpt_footer');
    }

}

/* End of file lawmaker.php */
/* Location: ./application/controllers/lawmaker.php */