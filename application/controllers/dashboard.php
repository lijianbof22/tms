<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library(array('ion_auth','form_validation'));
        
        if (!$this->ion_auth->logged_in()) {
            redirect("auth/login", 'refresh');
        }
        $this->load->helper(array('url','language'));

        $this->load->model(array('task_model'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function index()
    {
        $userId = $this->ion_auth->get_user_id();
        $tasks = $this->task_model->get_all_my_tasks($userId);

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

        $this->layout->view('dashboard',array('tasks' => $_tasks));
    }
}