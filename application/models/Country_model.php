<?php 

	class Country_model extends CI_Model {

		// returns country as an object
		public function get_country_by_id($country_id) {
			if(isset($country_id)) {
				$result = $this->db->get_where('countries', array('id' => $country_id));
				return $result->row();
			} else {

			}
		}

	}