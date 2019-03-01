<?php 
	class Object_model extends CI_Model {

		public function create_object($new_object) {

			$new_user = null;

			if ($new_object['is_ajax_request']) {

				$object_owner_email = $this->user_model->get_user_email_by_user_id($this->session->user_id); 
				
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

		// inserting new obj
			$this->db->insert('objects', $insert_array);

		// Searching for that same object 
			$result = $this->db->get_where('objects', $insert_array);

		// Getting new object's id
			$new_obj_id = $result->row()->obj_id;

			$phone_number = $new_object['phone_number'];

			$phone_name = $new_object['owner_name'];

			$contact = [
				'phone_number' => $phone_number,
				'phone_name' => $phone_name,
				'obj_id' => $new_obj_id
			];

			$is_created = $this->db->insert('phones', $contact) ? true : false;

			$created_object = [
				'is_created' => $is_created,
				'obj_id' => $new_obj_id,
				'obj_user_id' => $new_obj_id = $result->row()->obj_user_id,
				'username' => !empty($new_user) ? $new_user['username'] : null
			];

			return $created_object;

		}

		public function get_most_popular_countries($limit = null){

			$query = $this->db->query(
			" 	SELECT obj_id
			    FROM objects
			    ORDER BY pop_counter DESC 
				LIMIT " . $limit);

			$object_ids = $query->result_array();

			$countries = [];

			foreach ($object_ids as $object_id) {
				$query = $this->db->query("SELECT obj_country_id, obj_id, obj_title FROM objects WHERE obj_id =". $object_id['obj_id']);

				$object = $query->row();

				$country = $this->get_country_by_id($object->obj_country_id);

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

			$this->db->delete('objects', array('obj_id' => $id));

			$has_deleted_contacts = $this->delete_object_phones($id);

			return $has_deleted_contacts;
		}

		public function delete_object_phones($object_id) {
			return $this->db->delete('phones', array("obj_id" => $object_id));
		}

		public function get_all_objects($limit = null) {
			$this->db->limit($limit ? $limit : null);
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

		public function get_object_prop($prop, $val) {
			$result = null;
			switch ($prop) {
				case "name":
					$query = $this->db->get_where('objects', array('obj_id' => $val));
					$result = $query->row()->obj_title;
					break;
				case "inst":
					$query = $this->db->get_where('institutions', array('id' => $val));
					$result = $query->row();
					break;
				case "city":
					$query = $this->db->get_where('cities', array('id' => $val));
					$result = $query->row();
					break;
				case "country":
					$query = $this->db->get_where('countries', array('id' => $val));
					$result = $query->row();
					break;
				case "phones":
					$query = $this->db->get_where('phones', array("obj_id" => $val));
					$result = $query->result_array();
					break;
			}
			return $result;
		}

			public function get_country_by_id($country_id) {
				$query = $this->db->get_where('countries', array('id' => $country_id));
				return $query->row();
			}


			public function submit_object($object_id) {
				$this->db->where('obj_id', $object_id);
				if ($this->db->update('objects', array('status' => 1))) {
					return 1;
				} else {
					return 0;
				}
				
			}
		// END

 	// IMAGES
		public function add_images_to_object($object_id, $image) {
			$this->db->insert('images', array('obj_id' => $object_id, 'image_name' => $image));
			return true;
		}

		public function get_object_images($object_id) {
			$result = $this->db->get_where('images', array('obj_id' => $object_id));
			return $result->result_array();
		}

		public function get_object_num_of_images($object_id) {
			$result = $this->db->get_where('images', array('obj_id' => $object_id));
			return $result->num_rows();
		}
	// END

		public function update_popularity_counter($object_id){
			$found_object = $this->db->get_where('objects', array('obj_id' => $object_id));
			$old_counter = $found_object->row()->pop_counter;
			$raised_counter = $old_counter + 1; // raise popularity counter by 1.

			$data = [
				'pop_counter' => $raised_counter
			];

			$this->db->where('obj_id', $object_id);
			$this->db->update('objects', $data);

			$hasChanged = $old_counter !== $raised_counter ? true : false;

			return $hasChanged;

		}

	}