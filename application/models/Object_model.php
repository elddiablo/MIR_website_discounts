<?php 
	class Object_model extends CI_Model {

		public function create_object($new_object) {
			

			if ($new_object['is_ajax_request']) {

				$user_id = $this->session->user_id;
				$object_owner_email = $this->user_model->get_user_email_by_user_id($user_id); 
				$new_user = null;

			} else {

				$object_owner_email = $new_object['owner_email']; 

				$new_user = [
					'name' => $new_object['owner_name'],
					'username' => $new_object['owner_email'],
					'email' => $new_object['owner_email'],
	    			'password' => $new_object['owner_password']
    			];



    			$this->user_model->register($new_user);

    			$result = $this->db->get_where('users', array('email' => $new_user['email']));

				$user_id = $result->result_array()[0]['id'];

			}

    		$insert_array = [
				'obj_country_id' => $new_object['country_id'],
    			'obj_city_id' => $new_object['city_id'],
    			'obj_inst_id' => $new_object['inst_id'],
    			'obj_title' => $new_object['name'],
    			'obj_discount' => $new_object['discount'],
    			'obj_location' => $new_object['adress'],
    			'obj_short_describtion' => $new_object['short_describtion'],
    			'obj_describtion' => $new_object['full_describtion'],
    			'obj_website_url' => $new_object['website'],
    			'obj_user_id' => $user_id,
    			'obj_owner_email' => $object_owner_email

			];

			$this->db->insert('objects', $insert_array);

			$result = $this->db->get_where('objects', $insert_array);

			$new_obj_id = $result->row()->obj_id;

			$phone_number = $new_object['phone_number'];

			$phone_name = $new_object['owner_name'];

			$contact = [
				'phone_number' => $phone_number,
				'phone_name' => $phone_name,
				'obj_id' => $new_obj_id
			];

			$is_created = null;

			if ($this->db->insert('phones', $contact)) {
				$is_created = true;
			} else {
				$is_created = false;
			}

			$created_object = [
				'is_created' => $is_created,
				'obj_id' => $new_obj_id,
				'obj_user_id' => $new_obj_id = $result->row()->obj_user_id,
				
			];

			if ($new_user) {
				$created_object['username'] = $new_user['username'];
			}

			return $created_object;

		}

		public function get_most_popular_countries(){

			$query = $this->db->query(
			" 	SELECT obj_id
			    FROM objects
			    ORDER BY pop_counter DESC
			    LIMIT 3
			");

			$object_ids = $query->result_array();

			$countries = [];

			foreach ($object_ids as $object) {
				$query = $this->db->query("SELECT obj_country_id, obj_id, obj_title FROM objects WHERE obj_id =". $object["obj_id"]);

				$object = $query->result_array();

				// die(var_dump($object));

				$country = $this->get_object_country_by_country_id($object[0]['obj_country_id']);

				$pile = array('country' => $country, 'object' => $object);

				array_push($countries, $pile);

			}

			return $countries;

			


		}

		public function delete_object($id) {

			$images = $this->get_object_images($id);

			foreach ($images as $image) {
				unlink(FCPATH.'assets/uploaded_images/'.$image['image_name']);
				$this->db->where('id', $image['id']);
				$this->db->delete('images');
			}

			$this->db->where('obj_id', $id);

			$result = null;

			if ($this->db->delete('objects')) {
				$result = true;
			} else { 
				$result = false;
			}

			// add deleting contactds functionality

			return $result;


		}

		public function get_all_objects() {
			$result = $this->db->get_where('objects', array('status' => 1));
			return $result->result_array();
		}

		public function get_user_objects($user_id) {

			$user = $this->db->get_where('users', array('id' => $user_id));

			$user_id = $user->row()->id;

			$user_objects = $this->db->get_where('objects', array('obj_user_id' => $user_id));

			if (!empty($user_objects)) {

				$result = $user_objects->result_array();

			} else {

				$result = null;

			}

			return $result;

		}

		public function get_unchecked_objects() {
			$result = $this->db->get_where('objects', array('status' => 0));
			return $result->result_array();
		}

		public function get_object_by_id($id) {

			$result = $this->db->get_where('objects', array('obj_id' => $id));

			if (!empty($result)) {

				return $result->row();

			} else {

				return false;

			}

			

		}

		public function get_object_name_by_id($id) {

			$result = $this->db->get_where('objects', array('obj_id' => $id));

			return $result->row()->obj_title;

		}

		public function get_object_type_by_inst_id($id) {

			$result = $this->db->get_where('institutions', array('id' => $id));

			return $result->row();

		}

		public function get_object_city_by_city_id($id) {

			$result = $this->db->get_where('cities', array('id' => $id));

			return $result->row();

		}

		public function get_object_country_by_country_id($id) {

			$result = $this->db->get_where('countries', array('id' => $id));

			return $result->row();

		}

		public function get_object_phones_by_obj_id($id) {
			$result = $this->db->get_where('phones', array("obj_id" => $id));
			return $result->result_array();
		}

		public function add_images_to_object($id, $image) {
			$this->db->insert('images', array('obj_id' => $id, 'image_name' => $image));
			return true;
		}

		public function get_object_images($id) {

			$result = $this->db->get_where('images', array('obj_id' => $id));
			return $result->result_array();

		}

		public function get_object_num_of_images($id) {

			$result = $this->db->get_where('images', array('obj_id' => $id));
			return $result->num_rows();

		}

		public function submit_object($id) {
			$this->db->where('obj_id', $id);
			if ($this->db->update('objects', array('status' => 1))) {
				return 1;
			} else {
				return 0;
			}
			
		}

		public function update_popularity_counter($object_id){

			$result = $this->db->get_where('objects', array('obj_id' => $object_id));

			$old_counter = $result->row()->pop_counter;

			$raised_counter = ($result->row()->pop_counter) + 1; // raise popularity counter by 1.

			$data = [
				'pop_counter' => $raised_counter
			];

			$this->db->where('obj_id', $object_id);

			$this->db->update('objects', $data);

			$old_counter !== $raised_counter ? $hasChanged = true :  $hasChanged = false;

			if($hasChanged){

				return true;

			} else {

				return false;

			}


		}







	}