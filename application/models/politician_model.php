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

    public function list_all($userid)
    {
        $query = $this->db->query("SELECT `ip`.`pid`, `po`.`name`, SUM( `ip`.`vote` * `im`.`vote` * `im`.`scale` ) AS `cont` FROM  `ivsp` AS `ip`,  `ivsm` AS `im`,  `politician` AS `po` WHERE `ip`.`pid` = `po`.`id` AND `ip`.`isid` = `im`.`isid` AND `im`.`mid` = '$userid' GROUP BY `ip`.`pid` ORDER BY `cont` DESC");
        return $query->result();
    }

}

/* End of file politician_model.php */
/* Location: ./application/models/politician_model.php */