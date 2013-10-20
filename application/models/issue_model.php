<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Issue_model extends CI_Model {

    public function list_all($userid)
    {
        $query = $this->db->query("SELECT `issue`.`id`, `issue`.`name`, `ivsm`.`vote`, `ivsm`.`scale`,`ivsm`.`vote` * `ivsm`.`scale` as `cont` FROM  `issue` LEFT JOIN  `ivsm` ON `issue`.`id` = `ivsm`.`isid` AND `ivsm`.`mid` = '$userid' order by `cont` desc");
        return $query->result();
    }    

    public function put($issue_name)
    {
        $this->db->query("INSERT INTO `issue` (`name`) VALUES ('$issue_name')");
    }

    public function put_ivsm($id, $isid, $vote, $scale)
    {
        $query = $this->db->query("INSERT INTO `ivsm` (`mid` ,`isid` ,`vote` ,`scale`) VALUES ('$id','$isid','$vote','$scale')");
    }

    public function set_ivam($id, $isid, $vote, $scale)
    {
        $query = $this->db->query("UPDATE `ivsm` SET  `vote` = '$vote' , `scale` = '$scale' WHERE `mid` = '$id' AND `isid` = '$isid'");
    }

    
    
}

/* End of file issue_model.php */
/* Location: ./application/models/issue_model.php */