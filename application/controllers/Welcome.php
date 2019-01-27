<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('main_m');

		$this->smtp_user = "";
		$this->smtp_pass = "";
	}

	public function cronjob() {
		$date = date('Y-m-d');
		$tomorrow = date('Y-m-d',strtotime($date . "+1 days"));
		$antrian = $this->main_m->get_antrian(['tanggal_survey' => $tomorrow, 'status_terakhir' => 'diterima']);
		if( count($antrian) > 0 ) {
			$antrian_log = $this->main_m->get('antrian', ['id_permohonan_izin' => $antrian[0]->id], "id desc");
			$user = $this->user_model->get_user($antrian[0]->user_id);
			$pesan = $antrian_log[0]->pesan == "" ? "-":$antrian_log[0]->pesan;
			$username = $user->username;
			$message = <<<EMAIL
				<!DOCTYPE html>
				<html>
				  <body>
				    <table>
				      <tbody>
				        <tr style="height: 27px;">
				          <td style="height: 27px;">Hi, $username</td>
				        </tr>
				        <tr style="height: 97px;">
				          <td style="height: 97px;">Kantor kamu tanggal $tomorrow bakal disurvey tim kami loh, jadi mohon siapkan berkas-berkasnya yaa..</td>
				        </tr>
				        <tr>
				        	<td>
				        		Notes: $pesan;
				        	</td>
				        </tr>
				        <tr style="height: 75px;">
				          <td style="height: 75px;">
				            <p>Terimakasih,</p>
				            <p>Admin</p>
				          </td>
				        </tr>
				      </tbody>
				    </table>
				  </body>
				</html>
EMAIL;
			$this->send_email($user->email, "besok kantor kamu disurvey", $message);
			echo "email dikirim ke ".$user->email;
		}
	}

	public function send_email( $email, $subject, $body ){
        $this->load->library('email');
        // $url = $this->generate_url( $email );
        // $subject = 'Konfirmasi email';
        $this->load->library('email');

        $config['useragent'] = "JunaEdin";
        $config['mailpath'] = "/usr/bin/mail"; // or "/usr/sbin/sendmail"
        $config['protocol'] = "smtp";

        // setting windows
        // $config['mailpath'] = "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        // $config['smtp_host'] = "localhost";
        // $config['smtp_port'] = "25";

        $config['smtp_host'] = "ssl://smtp.googlemail.com";
        $config['smtp_port'] = 465;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $config['smtp_user'] = $this->smtp_user;
        $config['smtp_pass'] = $this->smtp_pass;

        $this->email->initialize($config);
        $this->email->from('no-reply@disnaker.xyz');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message( $body );
        $this->email->set_mailtype('html');  
        
        if($this->email->send()){
            echo 'Email terkirim ke '.$email;
        }
        else{
            show_error($this->email->print_debugger());
        }
    }
}
