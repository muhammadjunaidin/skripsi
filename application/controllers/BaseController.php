<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Bangkok');

class BaseController extends CI_Controller {

	public function __construct() {
        parent::__construct();     
        $this->smtp_user = "djunkir@gmail.com";
        $this->smtp_pass = "djunkir@321";

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

    public function sendEmail($user, $id_antrian, $action = null, $tanggal) {
        $username = $user->username;
        $email = $user->email;
        $detail_message = "";
        if($action === 'diterima') {
            $subject = "Antrian disetujui";
            $detail_message = "antrian dengan ID ".$id_antrian." telah diterima dan akan disurvey pada tanggal ".$tanggal;
        } else if($action === 'tolak') {
            $subject = "Antrian ditolak";
            $detail_message = "antrian ".$id_antrian." ditolak, mohon cek kembali berkas dan silahkan ajukan kembali";
        }

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
                          <td style="height: 97px;">$detail_message</td>
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
        $result = $this->send_email($email, $subject, $message);
        return $result;
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
            return ['status' => 'sukses', 'message'=> ''];
        }
        else{
            show_error($this->email->print_debugger());
            return ['status' => 'gagal', 'message'=> 'error'];
        }
    }
}