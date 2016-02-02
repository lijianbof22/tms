<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Systype extends CI_Controller
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

        $this->load->model(array('systype_model', 'tasktypestep_model'));
    }

    public function create($type)
    {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

            $systypeName = $this->input->post('systype_name');
            $code = $this->input->post('code');
            $description = $this->input->post('description');

            $systypeId = $this->systype_model->create_systype(
                array(
                    'name' => $systypeName,
                    'code' => $code,
                    'description' => $description,
                    'type' => $type
                )
            );

            if ($systypeId) {
                redirect('systype/all/' . $type);
            }
        } else {
            $this->layout->view('systype/form',array());
        }
    }

    public function edit($type, $id)
    {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

            $systypeName = $this->input->post('systype_name');
            $code = $this->input->post('code');
            $description = $this->input->post('description');

            $this->systype_model->update_systype(
                array(
                    'id' => $id,
                    'name' => $systypeName,
                    'code' => $code,
                    'description' => $description,
                    'type' => $type
                )
            );

            redirect('systype/all/' . $type);
        } else {
            $systype = $this->systype_model->get($id, $type);
            $this->layout->view('systype/edit',array('systype' => $systype));
        }
    }

    public function all($type, $page = 1) {
        $pageNum = 20;
        $offset = ($page - 1) * $pageNum;
        $systypeNum = $this->systype_model->get_count($type);
        $systypes = $this->systype_model->get_all($offset, $pageNum, $type);

        $this->layout->view('systype/list',array('counts' => $systypeNum, 'systypes' => $systypes, 'pageNum' => $pageNum, 'currentPage' => $page));
    }
}