<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portal_model extends CI_Model {


    public function login_validate ($username, $passwd)
    {
        $this->db->where('username = ', $username);
        $this->db->where('password = ', $passwd);
        return $this->db->get('member_table')->num_rows() == 1 ? true : false;
    }

    public function get_id ($username)
    {
        $this->db->where('username = ', $username);
        return $this->db->get('member_table')->row();
    }

}

/* End of file portal_model.php */
/* Location: ./application/models/portal_model.php */