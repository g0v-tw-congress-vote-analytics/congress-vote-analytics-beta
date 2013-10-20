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

    public function list_all()
    {

        $ctr = 0;
        $data['tbody'] = '';
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


        $this->load->view('issue/main', $data);        
                
    }

}

/* End of file issue.php */
/* Location: ./application/controllers/issue.php */