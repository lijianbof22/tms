<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library(array('ion_auth','form_validation'));

        $this->load->helper(array('url','language'));
        
        if (!$this->ion_auth->logged_in()) {
            redirect("auth/login", 'refresh');
        }
        
        $uri_string = explode('/', uri_string());
        if (!$this->ion_auth->is_admin() && $uri_string[1] !== 'view') {
            redirect('dashboard');
        }

        $this->load->model(array('task_model','tasktype_model', 'tasktypestep_model', 'ion_auth_model', 'company_model'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function create()
    {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

            $taskName = $this->input->post('task_name');
            $description = $this->input->post('description');
//            $endDate = $this->input->post('end_date');
//            $priority = $this->input->post('priority');
            $companyId = $this->input->post('company_id');
            $tasktypeId = $this->input->post('task_type_id');
            $assigned = $this->input->post('assigned');

            $taskId = $this->task_model->create_task(
                array(
                    'name' => $taskName,
                    'description' => $description,
                    'end_date' => date('Y-m-d'),
                    'priority' => 1,
                    'company_id' => $companyId,
                    'task_type_id' => $tasktypeId,
                    'assigned' => $assigned,
                    'latest_stage' => 'pendding',
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

    public function edit($id)
    {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            
            if($id) {
                $task = $this->task_model->get($id, 'array');
            }
            $_task = array();
            $_task['id'] = $task['id'];
            $_task['name'] = $this->input->post('task_name');
            $_task['description'] = $this->input->post('description');
            $_task['end_date'] = $task['end_date'];
            $_task['priority'] = $task['priority'];
            $_task['company_id'] = $this->input->post('company_id');
            $_task['task_type_id'] = $this->input->post('task_type_id');
            $_task['assigned'] = $this->input->post('assigned');
            $_task['latest_stage'] = $task['latest_stage'];
            $_task['created_date'] = $task['created_date'];

            $taskId = $this->task_model->update_task($_task);
            redirect('task/view/' . $task['id']);
        } else {
            if($id) {
                $companies = $this->company_model->get_all_for_select();
                $tasktypes = $this->tasktype_model->get_all_for_select();
                $users = $this->ion_auth_model->users()->result();
                $task = $this->task_model->get($id);
                $this->layout->view('task/edit',array('companies' => $companies, 'tasktypes' => $tasktypes, 'users' => $users, 'task' => $task));
            }
        }
        
    }

    public function view($id) {
        $task = $this->task_model->get($id);
        $assigned = null;
        if ($task->assigned) {
            $assigned = $this->ion_auth_model->user($task->assigned)->row(1);
        }
        $steps = $this->tasktypestep_model->get_by_type($task->tasktypeId);
        $stageSelect = array(
            'pendding' => '未开始',
            'processing' => '进行中',
            'checking' => '检查中',
            'finished' => '已完成'
        );
        $this->layout->view('task/view', array('task' => $task, 'assigned' => $assigned, 'steps' => $steps, 'stageSelect' => $stageSelect));
    }

    public function stage($id, $stage) {
        $this->task_model->update_stage($id, $stage);
        redirect('/task/view/' . $id);
    }

    public function all() {
        $tasks = $this->task_model->get_all_tasks();

        $_tasks = array();
        foreach($tasks as $task){
            if ($task->assigned) {
                switch($task->latest_stage) {
                    case 'pendding':
                        $_tasks['pendding'][] = $task;
                        break;
                    case 'checking':
                        $_tasks['checking'][] = $task;
                        break;
                    case 'finished':
                        $_tasks['finished'][] = $task;
                        break;
                    default:
                        $_tasks['processing'][] = $task;
                        break;
                }
            } else {
                $_tasks['unassigned'][] = $task;
            }
        }

        $this->layout->view('task/list',array('tasks' => $_tasks));
    }
}

