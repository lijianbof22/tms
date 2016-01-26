<?php

class Task_model extends CI_Model {
    private $table = 'tasks';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_task($data)
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

    public function get_all_tasks()
    {
        $query = $this->db->get($this->table);

        return $query->result();
    }

    public function get($id, $type = 'object')
    {
        $query = $this->db->select($this->table . '.id as id, ' . 
                $this->table . '.name as taskName, ' .
                $this->table . '.description, ' .
                $this->table . '.end_date, ' .
                $this->table . '.latest_stage,' .
                $this->table . '.created_date,' .
                $this->table . '.assigned,' .
                'company.id as companyId,' .
                'company.name as companyName, ' .
                'task_types.id as tasktypeId, ' .
                'task_types.name as tasktypeName'
//                'users.first_name as userName'
                )
                ->where(array($this->table . '.id' => $id))
                ->join('company', 'company.id=' . $this->table . '.company_id', 'inner')
                ->join('task_types', 'task_types.id=' . $this->table . '.task_type_id', 'inner')
//                ->join('users', 'users.id=' . $this->table . '.assigned', 'left outter')
                ->get($this->table);

        return $query->row(1, $type);
    }
}
