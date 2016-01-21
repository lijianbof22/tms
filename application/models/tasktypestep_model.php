<?php

class Tasktypestep_model extends CI_Model {
    private $table = 'task_type_steps';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_tasktypestep($data)
    {
        $this->db->insert($this->table, $data);
        $tasktype_id = $this->db->insert_id();

        return $tasktype_id;
    }

    public function delete_tasktypesteps_by_type($type)
    {
        return $this->db->delete($this->table, array('task_type_id' => $type));
    }

    public function get_by_type($type)
    {
        $query = $this->db->where(array('task_type_id' => $type))->get($this->table);

        return $query->result();
    }
}
