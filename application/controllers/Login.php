<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		// create the data object
		$res = new stdClass();
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			redirect('/');
		}
		
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// set validation rules
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run() == false) {
			
			// validation not ok, send validation errors to the view
			$this->load->view('login/login');
			
		} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->check_login($email, $password)) {
				
				$user_id = $this->user_model->get_user_id_from(['email'=>$email]);
				$user    = $this->user_model->get_user($user_id);
				
				// set session user datas
				$_SESSION['user_id']      = (int)$user->id;
				$_SESSION['email']     = (string)$user->email;
				$_SESSION['nik']     = (string)$user->nik;
				$_SESSION['logged_in']    = (bool)true;
				$_SESSION['is_admin']     = (bool)$this->user_model->check_access($user->akses);
				
				// user login ok
				$this->load->view('login/login', $res);
				print_r($_SESSION);die();
				
			} else {

				// login failed
				$res->error = 'Username atau password salah.';
				
				// send error to the view
				$this->load->view('login/login', $res);
				
			}
			
		}
	}

	public function register() {
		$res = new stdClass();

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->database();

		// set validation rules
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|min_length[10]|is_unique[users.nik]', array('is_unique' => 'NIK sudah terdaftar', 'min_length'=> 'NIK harus lebih dari 10 karakter'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique' => 'Email sudah terdaftar'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', array('min_length'=> 'Password harus lebih dari 6 karakter'));

		$data = [];
		$data['nik'] = $this->input->post('nik');
		$data['nama_lengkap'] = $this->input->post('nama_lengkap');
		$data['email'] = $this->input->post('email');
		$data['no_tlp'] = $this->input->post('no_tlp');
		$data['alamat'] = $this->input->post('alamat');
		$data['kewarganegaraan'] = $this->input->post('kewarganegaraan');
		$data['pekerjaan'] = $this->input->post('pekerjaan');
		$data['jabatan'] = $this->input->post('jabatan');
		$data['password'] = $this->input->post('password');
		$data['akses'] = 'member';

		if ($this->form_validation->run() === false) {	
			$this->load->view('login/register', $data);
		} else {
			if( $this->user_model->create_user($data) ) {
				$res->status = 'sukses';
				$res->message = "Berhasil membuat user, silahkan login";
			} else {
				$res->status = 'gagal';
				$res->message = 'Terjadi masalah ketika membuat akun, silahkan coba lagi';
			}
			// print_r($post_data);die();
			$this->load->view('login/register', $res);
		}
	}

	public function logout() {
		if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
			// remove session datas
			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}
			redirect('/');

		} else {
			redirect('/');
		}
	}


}
