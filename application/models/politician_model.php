<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Politician_model extends CI_Model {

    public function get_info($pid)
    {
        $query = $this->db->query("SELECT `issue`.`id`, `issue`.`name`, `ivsp`.`vote`, `ivsp`.`scale`, `ivsp`.`vote` * `ivsp`.`scale` as `cont` FROM  `issue` LEFT JOIN  `ivsp` ON `issue`.`id` = `ivsp`.`isid` AND `ivsp`.`pid` = '$pid' order by `cont` desc");
        return $query->result();
    }    

    public function get_name($pid)
    {
        $this->db->where('id = ', $pid);
        return $this->db->get('politician')->row()->name;
    }

}

/* End of file politician_model.php */
/* Location: ./application/models/politician_model.php */