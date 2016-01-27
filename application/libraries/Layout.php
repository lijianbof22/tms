<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Layout
{
    var $obj;
    var $layout;

    function Layout($layout = "layout_main")
    {
        $this->obj =& get_instance();
        $this->layout = $layout;
        $this->obj->load->library(array('ion_auth'));
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }

    function view($view, $data=null, $return=false)
    {
        $isAdmin = $this->obj->ion_auth->is_admin();
        $userId = $this->obj->session->userdata('user_id');
        $userData = $this->obj->ion_auth_model->user($userId)->row(1);

        $data['isAdmin'] = $isAdmin;
        $data['userdata'] = array('username' => $userData->first_name, 'userId' => $userId);
        $data['content_for_layout'] = $this->obj->load->view($view,$data,true);
        if($return)
        {
            $output = $this->obj->load->view($this->layout,$data, true);

            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout,$data, false);
        }
    }
}
?>
