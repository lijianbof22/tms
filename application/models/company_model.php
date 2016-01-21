<?php

class Company_model extends CI_Model {
    private $table = 'company';

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function check_company($name) {
        // bail if the company name already exists
        $existing_company = $this->db->get_where($this->table, array('name' => $name))->num_rows();
        if($existing_company !== 0)
        {
                return FALSE;
        }

        return TRUE;
    }
    
    public function create_company($data)
    {
        // insert the new group
        $this->db->insert($this->table, $data);
        $company_id = $this->db->insert_id();

        // return the brand new group id
        return $company_id;
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

    public function update_company($data)
    {
        $this->db->update($this->table, $data, array('id' => $data['id']));
    }
}
