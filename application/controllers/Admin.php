<?php 

	class Admin extends CI_Controller{

		public function index(){

			// Check if the user is not logged in.
			if (!$this->user_model->isLoggedIn()) {

				redirect('admin/login');

			} else if($this->user_model->isAdmin()) {

				$data = [

						'objects_unchecked' => $this->object_model->get_unchecked_objects(),
						'objects' => $this->object_model->get_all_objects()
						
					];
			
				$this->load->view('admin/templates/header');
				$this->load->view('templates/ajax_call_create_window');
				$this->load->view('admin/dashboard', $data);
				$this->load->view('admin/templates/footer');

			} else {

				redirect('users/dashboard','refresh');

			}


		}

	public function login(){

			if ($this->user_model->isLoggedIn()) {

				redirect('admin/index');

			} else {

				$this->form_validation->set_rules('username', 'Username', 'required');

				$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() === FALSE) {

				$this->load->view('templates/header');
				$this->load->view('admin/login');
				$this->load->view('admin/templates/footer');
				$this->load->view('templates/additional-footer-standart');

			} else {
				// Get and Sanitize input 
					$password = $this->security->xss_clean($this->input->post('password'));
					$username = $this->security->xss_clean($this->input->post('username'));

				// Find a user_id if the hashedPassword and username matches
					$hashed_password = $this->user_model->hashPassword($password);

				$user_data = [

					'username' => $username,
					'hashed_password' => $hashed_password

				];

				$user = $this->user_model->checkForCredentials($user_data);

				if ($user) {

					$user_data = array(

						'user_id' => $user->id,
						'username' => $user->username

					);

					$this->user_model->loginUser($user_data);

					redirect('admin/index');

				} else {

					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('admin/login');
				}

			}
		 }
	}

	public function logout() {

		$this->user_model->logoutUser();

		redirect('admin/login','refresh');
	}

}		

	