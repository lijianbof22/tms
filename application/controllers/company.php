<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        
        $this->load->library(array('ion_auth','form_validation'));
        
        if (!$this->ion_auth->logged_in()) {
            redirect("auth/login", 'refresh');
        }
        $this->load->helper(array('url','language'));

        $this->load->model('company_model');

        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
    }

    public function create()
    {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            $companyName = $this->input->post('company_name');
            $district = $this->input->post('district');
            $address = $this->input->post('address');
            $contact = $this->input->post('contact');
            $phone = $this->input->post('phone');
            $fax = $this->input->post('fax');
            $mobile = $this->input->post('mobile');

            if ($this->company_model->check_company($companyName)) {
                
            }

            $companyId = $this->company_model->create_company(
                array(
                    'name' => $companyName,
                    'district' => $district,
                    'address' => $address,
                    'contact' => $contact,
                    'phone' => $phone,
                    'fax' => $fax,
                    'mobile' => $mobile
                )
            );
            if ($companyId) {
                redirect('company/view/' . $companyId);
            }
        } else {
            $this->layout->view('company/form',array());
        }
    }

    public function edit($id)
    {
        if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
            
            if($id) {
                $company = $this->company_model->get($id, 'array');
            }

            $company['name'] = $this->input->post('company_name');
            $company['district'] = $this->input->post('district');
            $company['address'] = $this->input->post('address');
            $company['contact'] = $this->input->post('contact');
            $company['phone'] = $this->input->post('phone');
            $company['fax'] = $this->input->post('fax');
            $company['mobile'] = $this->input->post('mobile');

            $companyId = $this->company_model->update_company($company);
            redirect('company/view/' . $company['id']);
        } else {
            if($id) {
                $company = $this->company_model->get($id);
                $this->layout->view('company/edit',array('company' => $company));
            }
        }
        
    }

    public function all($page = 1) {
        $pageNum = 2;
        $offset = ($page - 1) * $pageNum;
        $companyNum = $this->company_model->get_count();
        $companies = $this->company_model->get_all($offset, $pageNum);

        $this->layout->view('company/list',array('counts' => $companyNum, 'companies' => $companies, 'pageNum' => $pageNum, 'currentPage' => $page));
    }

    public function view($id) {
        if($id) {
            $company = $this->company_model->get($id);
            $this->layout->view('company/view', array('company' => $company));
        }
    }
}