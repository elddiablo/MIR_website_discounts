<?php
	class User_model extends CI_Model{
		public function register($new_user){
			// User data array
			$data = array(
				'name' => $new_user['name'],
				'email' => $new_user['email'],
                'username' => $new_user['username'],
                'password' => $new_user['password']
			);

			// Insert user
			return $this->db->insert('users', $data);
		}


		// Checks if username exists
		public function check_username_exists($username){
			// get the user by username
			$query = $this->db->get_where('users', array('username' => $username));

			// check if its empty
			if(empty($query->row_array())){
				return true;
			} else {
				return false;
			}
		}

		// Check if email exists
		public function check_email_exists($email){

			$query = $this->db->get_where('users', array('email' => $email));

			if(empty($query->row_array())){
				return true;
			} else {
				 return false;
			}
		}

		public function isLoggedIn(){
			
			if ($this->session->has_userdata('username')) {
				return true;
			} else {
				return false;
			}
		}

		public function isAdminOfAnObject($id, $user_id) {

			$result = $this->db->get_where('objects', array('obj_user_id' => $user_id, 'obj_id' => $id));

			if (!empty($result) && $result->num_rows() > 0) {

				return true;

			} else {

				return false;

			}

		}

		public function loginUser($userdata) {

			$user_data = array(
				'username' => $userdata['username'],
				'user_id' => $userdata['user_id']
			);

			$this->session->set_userdata($user_data);

		}

		public function logoutUser($extra_args = null) {

			$arg = array('username', 'user_id');

			if ($extra_args) {
					
				foreach ($extra_args as $extra_arg) {
					
					array_push($arg, $extra_arg);

				}

			}

			$this->session->unset_userdata($arg);

			$this->session->set_flashdata('logout_successful', 'Successful logout...');

		}


		public function isAdmin() {

			$result = $this->db->get_where('users', array('id' => $this->session->user_id));

			if ($result->row()->is_admin == 1) {

				return true;

			} else {

				return false;

			}


		}


		public function checkForCredentials($user_data) {

			$result = $this->db->get_where('users', array('username' => $user_data['username'], 'password' => $user_data['hashed_password']));

			if (!empty($result)) {
				return $result->row();
			} else {
				return false;
			}

		}

		public function get_user_email_by_user_id($user_id){

			$result = $this->db->get_where('users', array('id' => $user_id));

			return $result->row()->email;

		}


		public function hashPassword($password){

			if ($password == null) {
				return null;
			} else {
				// HAsh format
				$hash_format = "$2y$10$";

				// could be anything you want
				$salt = "peakyBlindersAreawesom";

				// Combining
				$hash_and_salt = $hash_format. $salt;

				// Putting new hashed password instead of the old one
				$password = crypt($password, $hash_and_salt);

				return $password;
			}
		}

	}