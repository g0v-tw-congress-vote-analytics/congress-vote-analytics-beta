<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Issue_model extends CI_Model {

    public function list_all($userid)
    {
        $query = $this->db->query("SELECT `issue`.`id`, `issue`.`name`, `ivsm`.`vote`, `ivsm`.`scale`,`ivsm`.`vote` * `ivsm`.`scale` as `cont` FROM  `issue` LEFT JOIN  `ivsm` ON `issue`.`id` = `ivsm`.`isid` AND `ivsm`.`mid` = '$userid' order by `cont` desc");
        return $query->result();
        
    }    

}

/* End of file issue_model.php */
/* Location: ./application/models/issue_model.php */