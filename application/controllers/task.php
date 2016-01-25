<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library(array('ion_auth','form_validation'));
        
        if (!$this->ion_auth->logged_in()) {
            redirect("auth/login", 'refresh');
        }
        $this->load->helper(array('url','language'));

        $this->load->model(array('task_model','tasktype_model', 'ion_auth_model', 'company_model'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function create()
    {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

            $taskName = $this->input->post('task_name');
            $description = $this->input->post('description');
            $endDate = $this->input->post('end_date');
            $priority = $this->input->post('priority');
            $companyId = $this->input->post('company_id');
            $tasktypeId = $this->input->post('task_type_id');
            $assigned = $this->input->post('assigned');

            $taskId = $this->task_model->create_task(
                array(
                    'name' => $taskName,
                    'description' => $description,
                    'end_date' => $endDate,
                    'priority' => $priority,
                    'company_id' => $companyId,
                    'task_type_id' => $tasktypeId,
                    'assigned' => $assigned,
                    'created_date' => date('Y-m-d H:i:s')
                )
            );

            if ($taskId) {
                redirect('task/view/' . $taskId);
            }
        } else {
            $companies = $this->company_model->get_all_for_select();
            $tasktypes = $this->tasktype_model->get_all_for_select();
            $users = $this->ion_auth_model->users()->result();
            $this->layout->view('task/form',array('companies' => $companies, 'tasktypes' => $tasktypes, 'users' => $users));
        }
    }

    public function view($id) {
        $task = $this->task_model->get($id);

        $this->layout->view('task/view', array('task' => $task));
    }

    public function all() {
        $tasks = $this->task_model->get_all_tasks();

        $this->layout->view('task/list',array('tasks' => $tasks));
    }
}

