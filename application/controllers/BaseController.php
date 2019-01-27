<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class BaseController extends CI_Controller {

	public function __construct() {
        parent::__construct();     

        if($this->session->userdata('logged_in') != "login"){
            redirect(base_url('login'));
        }
    }

    public function getView($view, $data = array()){
        $data_header['is_admin'] = $this->is_admin();
        $data['is_admin'] = $this->is_admin();
        $this->load->view('layouts/header', $data_header);
        $this->load->view($view,$data);
        $this->load->view('layouts/footer');
    }

    public function is_admin(){
    	$user = $this->session->userdata();
    	if ($user != NULL) {
    		if ($user['is_admin']) {
    			$res = true;
    		}else{
    			$res = false;
    		}
    	}else{
    		$res = false;
    	}
    	return $res;
    }

    public function userdata(){
    	$user = $this->session->userdata();
    	return $user;
    }
}