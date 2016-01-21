<?php

class Tasktype_model extends CI_Model {
    private $table = 'task_types';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_tasktype($data)
    {
        $this->db->insert($this->table, $data);
        $tasktype_id = $this->db->insert_id();

        return $tasktype_id;
    }

    public function get_count()
    {
        $query = $this->db->get($this->table);

        return $query->num_rows();
    }

    public function get_all($start, $limit)
    {
        $query = $this->db->limit($limit, $start)->get($this->table);

        return $query->result();
    }

    public function get_all_for_select()
    {
        $query = $this->db->select('id, name')->get($this->table);

        return $query->result();
    }

    public function get($id, $type = 'object')
    {
        $query = $this->db->where(array('id' => $id))->get($this->table);

        return $query->row(1, $type);
    }

    public function update_tasktype($data)
    {
        $this->db->update($this->table, $data, array('id' => $data['id']));
    }
}
