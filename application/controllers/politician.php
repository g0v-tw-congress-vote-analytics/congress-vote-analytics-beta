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
        

        foreach ($this->politician_model->list_all($this->session->userdata('userid')) as $row) {
            $a_ref = base_url("politician/page/{$row->pid}");
            $data['tbody'] .= <<<_END
                <tr>
                  <td>{$row->pid}</td>
                  <td><a href="{$a_ref}">{$row->name}</a></td>
                  <td>{$row->cont}</td>
              </tr>
_END;
        }
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

        $ctr = 0;
        foreach ($this->politician_model->get_info($data['pid']) as $row) {
            $ctr++;
            $issue_url = base_url("/issue/page/{$row->id}");
            $data['tbody'] .= <<<_END
                <tr>
                  <td>{$ctr}</td>
                  <td><a href="$issue_url">{$row->name}</a></td>
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
        $this->load->view('tmpt_header', $data);
        $this->load->view('politician/page', $data);
        $this->load->view('tmpt_footer');
    }

}

/* End of file lawmaker.php */
/* Location: ./application/controllers/lawmaker.php */