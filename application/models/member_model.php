<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {

    public function list_all()
    {
        return $this->db->get('member_table')->result();
    }

}

/* End of file member_table_model.php */
/* Location: ./application/models/member_table_model.php */