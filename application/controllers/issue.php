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
        $data['ivsm']       = $this->issue_model->get_ivsm($issue_id, $this->session->userdata('userid'));
        $data['issue']      = $this->issue_model->get($issue_id);
        $data['action']     = ($data['ivsm']->vote == null) ? base_url('insert_validate/ins_ivsm') : base_url('insert_validate/upd_ivsm');

        $data['is_vote_true']   = ($data['ivsm']->vote == 1) ? 'checked' : '' ;
        $data['is_vote_false']  = ($data['ivsm']->vote == -1) ? 'checked' : '' ;

        $data['tbody'] = '';
        $data['username'] = $this->session->userdata('username');

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

        $this->load->view('issue/page', $data);
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

        foreach ($this->issue_model->list_all($this->session->userdata('userid')) as $row) {
            $ctr++;
            $a_ref = base_url("issue/page/{$row->id}");
            $data['tbody'] .= <<<_END
                <tr>
                  <td>{$ctr}</td>
                  <td><a href="{$a_ref}">{$row->name}</a></td>
_END;
            switch ($row->vote) {
                case '1':
                    $data['tbody'] .= "<td>支持</td><td>{$row->scale}</td></tr>";
                    break;

                case '-1':
                    $data['tbody'] .= "<td>反對</td><td>{$row->scale}</td></tr>";
                    break;

                default:
                    $data['tbody'] .= "<td>尚未表態</td><td></td></tr>";
                    break;
            
            }
        }


        $this->load->view('issue/list_all', $data);        
                
    }

}

/* End of file issue.php */
/* Location: ./application/controllers/issue.php */