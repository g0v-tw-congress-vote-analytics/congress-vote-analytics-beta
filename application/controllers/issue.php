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
        $this->list_all();
    }

    public function page($issue_id)
    {
        $ivsm = $this->issue_model->get_ivsm($issue_id, $this->session->userdata('userid'));

        if ( empty($ivsm) ) {
            $ivsm = (object) $ivsm;
            $ivsm->vote = 0;
            $ivsm->scale = null;
        }


        $data['ivsm']   = $ivsm;
        $data['issue']  = $this->issue_model->get($issue_id);
        $data['action'] = (isset($data['ivsm']->vote)) ? base_url('issue/insert_validate/ins_ivsm') : base_url('insert_validate/upd_ivsm');

        $data['is_vote_true']   = ($data['ivsm']->vote == 1) ? 'checked="checked"' : '' ;
        $data['is_vote_false']  = ($data['ivsm']->vote == -1) ? 'checked="checked"' : '' ;

        $data['tbody'] = '';
        $data['username'] = $this->session->userdata('username');
        $data['issueid']  = $issue_id;


        $ctr = 0;

        foreach ($this->issue_model->get_position($issue_id) as $row) {

            $ctr++;
            if ($row == null) {
               $data['tbody'] .= "<tr><td>$ctr</td><td>本議題尚未有立場資料</td><td></td><td></td></tr>";
            }

            else{
                $url = base_url("politician/page/{$row->id}");
                $data['tbody'] .= "<tr><td>$ctr</td><td><a href='$url'>{$row->name}</a></td>";
                $ctr++;

                switch ($row->vote) {
                    case '1':
                        $data['tbody'] .= "<td>支持</td><td>{$row->cont}</td></tr>";
                        break;
                    
                    case '-1':
                        $data['tbody'] .= "<td>反對</td><td>{$row->cont}</td></tr>";
                        break;

                    default:
                        $data['tbody'] .= "<td>尚未表態</td><td>0</td></tr>";
                        break;
                }

            }           
        }
        $this->load->view('tmpt_header', $data);
        $this->load->view('issue/page', $data);
        $this->load->view('tmpt_footer');
    }

    public function insert_validate($action)
    {
        if ( $action == 'insert' ) {
            $this->issue_model->put($this->input->post('memo')); 
        }
        else {
            $userid = $this->session->userdata('userid');
            $isid   = $this->input->post('issueid'); 
            $vote   = $this->input->post('vote');
            $scale  = $this->input->post('scale');

            if ($action == 'ins_ivsm') {
                $this->issue_model->put_ivsm($userid , $isid, $vote, $scale);
            }
            else if ($action == 'upd_ivsm') {
                $this->issue_model->set_ivsm($userid , $isid, $vote, $scale);
            }
        }

        redirect(base_url('issue'));
    }

    public function list_all()
    {

        $ctr = 0;
        $data['tbody'] = '';
        $data['action'] = base_url('issue/insert_validate/insert');
        $data['username'] = $this->session->userdata('username');

        $this->load->library('table');

        $tmpl = array('table_open' => '<table class="table">');
        $this->table->set_template($tmpl);

        $this->table->set_heading('序號', '議題名稱(點選連結進入議題內頁)', '你的立場', '重要性');

        foreach ($this->issue_model->list_all($this->session->userdata('userid')) as $row) {
            $ctr++;
            $a_ref = base_url("issue/page/{$row->id}");

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
        $this->load->view('issue/list_all', $data);        
        $this->load->view('tmpt_footer');
    }

}

/* End of file issue.php */
/* Location: ./application/controllers/issue.php */