<?php
	class Users extends CI_Controller{
		
		// Log in user
		public function login(){

			if ($this->user_model->isLoggedIn()) {
				
				redirect('users/dashboard','refresh');

			}

			$data['title'] = 'Вход';

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE){

				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
				$this->load->view('templates/additional-footer-standart');

			} else {
				
				// Get username
					$username = $this->security->xss_clean($this->input->post('username'));

				// Get password
					$password = $this->security->xss_clean($this->input->post('password'));

				// hash the pass
					$hashed_password = $this->user_model->hashPassword($password);

				// form userdata
					$userdata = [
						'username' => $username,
						'hashed_password' => $hashed_password
					];

				// Check for valid credentials
					$user = $this->user_model->checkForCredentials($userdata);

				if ($user) {
					// Set a session and redirect
						$user_data = array(

							'user_id' => $user->id,
							'username' => $user->username

						);

					$this->user_model->loginUser($user_data);

					redirect('users/dashboard');

				} else {
					// Set message
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('users/login');
				}		
			}
		}

		public function logout(){
			// log user out
			$this->user_model->logoutUser();

			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('users/login');
		}

		// Check if username exists
		public function check_username_exists($username){
			$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'That email is taken. Please choose a different one');
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {
				return false;
			}
		}

		public function dashboard() {

			if (!$this->user_model->isLoggedIn()) {

				redirect('admin/login');

			} else {

				if ($this->user_model->isAdmin()) {
					redirect('admin/index','refresh');					
				}

				$user_id = $this->session->user_id;

				$data = [
					'objects' => $this->object_model->get_user_objects($user_id),
					'username' => $this->session->username,
					'user_id' => $user_id
				];

				$this->load->view('users/templates/header', $data);
				$this->load->view('templates/ajax_call_create_window', $data);
				$this->load->view('users/user_dashboard', $data);
				$this->load->view('users/templates/footer');
				$this->load->view('templates/additional-footer-standart');
			}

		}




		





	}