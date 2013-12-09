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

    public function get($issueid)
    {
        $this->db->where('id = ', $issueid);
        return $this->db->get('issue')->row();
    }


    public function put_ivsm($id, $isid, $vote, $scale)
    {
        $query = $this->db->query("INSERT INTO `ivsm` (`mid` ,`isid` ,`vote` ,`scale`) VALUES ('$id','$isid','$vote','$scale')");
    }

    public function set_ivsm($id, $isid, $vote, $scale)
    {
        $query = $this->db->query("UPDATE `ivsm` SET  `vote` = '$vote' , `scale` = '$scale' WHERE `mid` = '$id' AND `isid` = '$isid'");
    }

    public function get_ivsm($issueid, $userid)
    {
        $this->db->where('isid = ', $issueid);
        $this->db->where('mid = ', $userid);
        return $this->db->get('ivsm')->row();
    }

    public function get_position($issueid)
    {
        $query = $this->db->query("SELECT `p`.`name` , `i`.`vote` , `vote` * `scale` As `cont`, `p`.`id` FROM  `politician` AS `p` LEFT JOIN `ivsp` AS `i` ON `p`.`id` = `i`.`pid` AND `i`.`isid` ='$issueid' ORDER BY `cont` DESC");
        return $query->result();
    }

    public function search($keyWord) {
        $query = $this->db->query("SELECT `id`, `name` FROM `issue` WHERE `name` LIKE '%$keyWord%' ORDER BY `id` ASC");
        return $query->result();        
    }    

}

/* End of file issue_model.php */
/* Location: ./application/models/issue_model.php */