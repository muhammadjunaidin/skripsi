<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('is_admin'))
{
    function is_admin()
    {
        $CI = get_instance();
        $CI->load->library('session');
        $user = $CI->session->userdata();
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
}