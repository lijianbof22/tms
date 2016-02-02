<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tasktype extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library(array('ion_auth','form_validation'));
        
        if (!$this->ion_auth->logged_in()) {
            redirect("auth/login", 'refresh');
        }

        if (!$this->ion_auth->is_admin()) {
            redirect('dashboard');
        }

        $this->load->helper(array('url','language'));

        $this->load->model(array('tasktype_model', 'tasktypestep_model'));

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function create()
    {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

            $tasktypeName = $this->input->post('tasktype_name');
            $steps = $this->input->post('steps');

            $tasktypeId = $this->tasktype_model->create_tasktype(
                array(
                    'name' => $tasktypeName,
                )
            );

            foreach ($steps as $order => $step) {
                $this->tasktypestep_model->create_tasktypestep(array('name' => $step['name'], 'description' => $step['description'], 'task_type_id' => $tasktypeId, 'order' => ($order + 1)));
            }
            if ($tasktypeId) {
                redirect('tasktype/view/' . $tasktypeId);
            }
        } else {
            $this->layout->view('tasktype/form',array());
        }
    }

    public function edit($id)
    {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

            $tasktypeName = $this->input->post('tasktype_name');
            $steps = $this->input->post('steps');

            $tasktypeId = $this->tasktype_model->update_tasktype(
                array(
                    'id' => $id,
                    'name' => $tasktypeName,
                )
            );

            $this->tasktypestep_model->delete_tasktypesteps_by_type($id);
            foreach ($steps as $order => $step) {
                $this->tasktypestep_model->create_tasktypestep(array('name' => $step['name'], 'description' => $step['description'], 'task_type_id' => $id, 'order' => ($order + 1)));
            }
            redirect('tasktype/view/' . $id);
        } else {
            $tasktype = $this->tasktype_model->get($id);
            $steps = $this->tasktypestep_model->get_by_type($id);
            $this->layout->view('tasktype/edit',array('tasktype' => $tasktype, 'tasktypesteps' => $steps));
        }
    }

    public function view($id) {
        $tasktype = $this->tasktype_model->get($id);
        $tasktypesteps = $this->tasktypestep_model->get_by_type($id);

        $this->layout->view('tasktype/view', array('tasktype' => $tasktype, 'steps' => $tasktypesteps));
    }

    public function all($page = 1) {
        $pageNum = 20;
        $offset = ($page - 1) * $pageNum;
        $tasktypeNum = $this->tasktype_model->get_count();
        $tasktypes = $this->tasktype_model->get_all($offset, $pageNum);

        $this->layout->view('tasktype/list',array('counts' => $tasktypeNum, 'tasktypes' => $tasktypes, 'pageNum' => $pageNum, 'currentPage' => $page));
    }
}