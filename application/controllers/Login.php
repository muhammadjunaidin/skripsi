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
			$this->load->view('homepage/login/login');
			
		} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->check_login($email, $password)) {
				
				$user_id = $this->user_model->get_user_id_from(['email'=>$email]);
				$user    = $this->user_model->get_user($user_id);
				
				// set session user data
				$_SESSION['user_id']	= (int)$user->id;
				$_SESSION['email']     	= (string)$user->email;
				$_SESSION['nik']     	= (string)$user->nik;
				$_SESSION['logged_in']	= (bool)true;
				$_SESSION['is_admin']	= false;
				
				// user login ok
				redirect('admin/dashboard');
				$this->load->view('homepage/login/login', $res);
			} else {
				// login failed
				$res->error = 'Username atau password salah.';
				// send error to the view
				$this->load->view('homepage/login/login', $res);
				
			}
			
		}
	}

	public function admin() {
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
			$this->load->view('homepage/login/login');
			
		} else {
			
			// set variables from the form
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if ($this->user_model->check_login_admin($email, $password)) {
				
				$admin_id = $this->user_model->get_admin_id_from(['email'=>$email]);
				$admin    = $this->user_model->get_admin($admin_id);
				
				// set session user data
				$_SESSION['user_id']	= (int)$admin->id;
				$_SESSION['email']     	= (string)$admin->email;
				$_SESSION['logged_in']	= (bool)true;
				$_SESSION['is_admin']	= true;
				
				// user login ok
				// $this->load->view('homepage/login/login', $res);
				redirect('admin/dashboard');
			} else {
				// login failed
				$res->error = 'Username atau password salah.';
				// send error to the view
				$this->load->view('homepage/login/login', $res);
				
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

		if ($this->form_validation->run() === false) {	
			$this->load->view('homepage/login/register', $data);
		} else {
			if( $this->user_model->create_user($data) ) {
				$res->status = 'sukses';
				$res->message = 'Berhasil membuat user, silahkan login <a href="login"><b>disini</b></a>';
			} else {
				$res->status = 'gagal';
				$res->message = 'Terjadi masalah ketika membuat akun, silahkan coba lagi';
			}
			// print_r($post_data);die();
			$this->load->view('homepage/login/register', $res);
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
