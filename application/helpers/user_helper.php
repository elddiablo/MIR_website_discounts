<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function LoginCheck() {
		if ($this->user_model->isLoggedIn()) {
			redirect('users/dashboard','refresh');
		}
	}