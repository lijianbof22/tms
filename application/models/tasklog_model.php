<?php

class Tasklog_model extends CI_Model {
    private $table = 'task_logs';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function create_tasklog($data)
    {
        $this->db->insert($this->table, $data);
        $tasklog_id = $this->db->insert_id();

        return $tasklog_id;
    }

    public function get_all_by_task($taskId)
    {
        $query = $this->db->select($this->table . '.id as id, ' .
                $this->table . '.note, ' .
                $this->table . '.created_date, ' .
                'users.first_name as userName'
                )
                ->where(array('task_id' => $taskId))
                ->join('users', 'users.id=' . $this->table . '.author', 'left')
                ->order_by('created_date', 'desc')
                ->get($this->table);

        return $query->result();
    }
}
