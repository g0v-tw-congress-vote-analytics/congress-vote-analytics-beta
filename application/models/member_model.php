<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member_model extends CI_Model {

    public function list_all()
    {
        return $this->db->get('member_table')->result();
    }

    public function get_user_data($username)
    {
        $this->db->where('username = ', $username);
        return $this->db->get('member_table')->row();
    }

    public function set_user_data($username, $array)
    {
        $this->db->where('username = ', $username);
        $this->db->update('member_table', $array);
    }

    public function del_user($username)
    {
        $this->db->where('username = ', $username);
        $this->db->delete('member_table');
    }
}

/* End of file member_table_model.php */
/* Location: ./application/models/member_table_model.php */