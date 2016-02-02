<?php

class Systype_model extends CI_Model {
    private $table = 'sys_types';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_systype($data)
    {
        $this->db->insert($this->table, $data);
        $systype_id = $this->db->insert_id();

        return $systype_id;
    }

    public function get_count($type)
    {
        $query = $this->db->where(array('type' => $type))->get($this->table);

        return $query->num_rows();
    }

    public function get_all($start, $limit, $type)
    {
        $query = $this->db->where(array('type' => $type))->limit($limit, $start)->get($this->table);

        return $query->result();
    }

    public function get_all_for_select($type)
    {
        $query = $this->db->where(array('type' => $type))->select('id, name, code')->get($this->table);

        return $query->result();
    }

    public function update_systype($data)
    {
        $this->db->update($this->table, $data, array('id' => $data['id']));
    }

    public function get($id, $type, $return = 'object')
    {
        $query = $this->db->where(array('id' => $id, 'type' => $type))->get($this->table);

        return $query->row(1, $return);
    }
}
