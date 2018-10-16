<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_image')){
	function get_image($file_path){
		return base_url('assets/images/') . $file_path;
	}
}

if ( ! function_exists('get_css')){
	function get_css($file_path){
		return base_url('assets/css/') . $file_path;
	}
}

if ( ! function_exists('get_js')){
	function get_js($file_path){
		return base_url('assets/js/') . $file_path;
	}
}