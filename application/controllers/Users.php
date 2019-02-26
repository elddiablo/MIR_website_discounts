<?php
	class Users extends CI_Controller{
		
		// Log in user
		public function login(){

			if ($this->user_model->isLoggedIn()) {
				redirect('users/dashboard','refresh');
			} else {

				$data['title'] = 'Login';
				$this->form_validation->set_rules('username', 'Username', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');

				if($this->form_validation->run() === FALSE){

					$this->load->view('templates/header');
					$this->load->view('users/login', $data);
					$this->load->view('templates/footer');
					$this->load->view('templates/additional-footer-standart');

				} else {
					
					// Get username and password
						$username = $this->security->xss_clean($this->input->post('username'));
						$password = $this->security->xss_clean($this->input->post('password'));
					// Authorize
						$user = $this->check_username_exists($username) ? $this->authorize($username, $password) : null;

					if ($user) {
						// Set a session and redirect
							$user_data = array(
									'user_id' => $user->id,
									'username' => $user->username
								);

							$this->user_model->loginUser($user_data);

							redirect('users/dashboard');
					} else {
						// if error -> Set message
							$this->session->set_flashdata('login_failed', 'Login is invalid');
							redirect('users/login');
					}		
				}

			}
		}
		public function dashboard() {

			if (!$this->user_model->isLoggedIn()) {

				redirect('users/login');

			} else {

					$objects = $this->user_model->isAdmin() 
								? $this->object_model->get_all_objects(4) 
								: $this->object_model->get_user_objects($this->session->user_id);

				$data = [
					'objects' => $objects,
					'username' => $this->session->username,
					'user_id' => $this->session->user_id,
					'isAdmin' => $this->user_model->isAdmin()
				];

				$data['objects_unchecked'] = $this->user_model->isAdmin() ? $this->object_model->get_unchecked_objects() : null;

				foreach ($data['objects'] as &$object) {
					foreach ($object as $key => $value) {
						$object['obj_country_name'] = $this->object_model->get_object_prop("country", $object['obj_country_id'])->name;
						$object['obj_city_name'] = $this->object_model->get_object_prop("city", $object['obj_city_id'])->name;
						$object['obj_inst_name'] = $this->object_model->get_object_prop("inst", $object['obj_inst_id'])->name_single;
						$object['image_number'] = $this->object_model->get_object_num_of_images($object['obj_id']);
					}
				}
					$this->load->view('users/templates/header', $data);
					$this->load->view('templates/ajax_call_create_window', $data);
					$this->load->view('users/user_dashboard', $data);
					$this->load->view('users/templates/footer');
					$this->load->view('templates/additional-footer-standart');
			}

		}

		public function authorize($username, $password) {
			$hashed_password = $this->user_model->hashPassword($password);
			$userdata = [
				'username' => $username,
				'hashed_password' => $hashed_password
			];
			return $this->user_model->checkForCredentials($userdata);
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
			if($this->user_model->check_username_exists($username)){
				return true;
			} else {
				$this->form_validation->set_message('check_username_exists', 'That username is taken. Please choose a different one');
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){
			if($this->user_model->check_email_exists($email)){
				return true;
			} else {

				return false;
			}
		}

	}