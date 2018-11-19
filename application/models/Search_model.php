<?php  

	class Search_model extends CI_Model {

		public function get_cities($country_id) {

			$this->db->where('country_id', $country_id);
			
			$results = $this->db->get('cities');

			return $results->result_array();

		}

		public function get_institutions($city_id) {

			$this->db->where('city_id', $city_id);
			
			$results = $this->db->get('institutions');

			return $results->result_array();

		}

		public function search_for_objects($city_id, $inst_id, $offset = null, $limit = null) {

			$results = $this->db->get_where('objects', array('obj_city_id' => $city_id, 'obj_inst_id ' => $inst_id, 'status' => 1), $limit, $offset);

			return $results->result_array();

		}

		public function get_country_name_by_id($id) {

			$result = $this->db->get_where('countries', array('id' => $id));

			return $result->row()->name;
		}

		public function get_city_name_by_id($id) {

			$result = $this->db->get_where('cities', array('id' => $id));

			return $result->row()->name;
		}

		public function get_inst_name_by_id($id) {

			$result = $this->db->get_where('institutions', array('id' => $id));

			return $result->row()->name;
		}


	}