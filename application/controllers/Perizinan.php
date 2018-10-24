<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perizinan extends MY_Controller {
	public function index() {
		$this->getHomeView('perizinan/index');
	}
}