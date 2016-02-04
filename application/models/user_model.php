<?php

class User_model extends CI_Model {
    private $table = 'users';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function get_all_for_select($userId)
    {
        $this->db->select($this->table . '.id as id, ' .
                $this->table . '.first_name as first_name');
        if ($userId) {
            $this->db->join('users_groups', 'users_groups.user_id=' . $this->table . '.id', 'inner');
            $this->db->join('groups', 'groups.id=users_groups.group_id', 'inner');
            $this->db->where(array('groups.name' => 'admin'));
            $this->db->or_where(array($this->table . '.id' => $userId));
        }

        $query = $this->db->get($this->table);

        return $query->result();
    }
}
