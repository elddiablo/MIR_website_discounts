<?php 

	class Search extends CI_Controller {

		
			public function get_cities(){

				$country_id = $this->input->get('country_id');

				$results = $this->search_model->get_cities($country_id);

				$data = [
					'cities' => $results
				];

				$this->load->view('templates/cities_list', $data);

			}

			public function get_institutions(){

				$city_id = $this->input->get('city_id');

				$results = $this->search_model->get_institutions($city_id);

				$data = [
					'insts' => $results
				];

				$this->load->view('templates/inst_list', $data);

			}

			public function do_search() {

				$city_id = $this->input->get('city_id');

				$inst_id = $this->input->get('inst_id');

				$results = $this->search_model->search_for_objects($city_id, $inst_id, 3);

				$data = [
					'objects' => $results
				];

				$this->load->view('templates/results_list', $data);

			}

			public function showAllResults() {

				if (empty($this->input->get('page'))) {

					$page = 1;

				} else {

					$page = $this->input->get('page');

				}

				$city_id = $this->security->xss_clean($this->input->get('city_id'));

				$inst_id = $this->security->xss_clean($this->input->get('inst_id'));

				$num_of_rows = count($this->search_model->search_for_objects($city_id, $inst_id));

				$limit = 3;


					if ($page == 1) {

						$offset = 0;

					} else {

						$offset = ($page - 1) * $limit;

					}

				$pages = $num_of_rows / $limit;

				if(is_float($pages)) {

					$pages = floor($pages) + 1; 

				}

				$results = $this->search_model->search_for_objects($city_id, $inst_id, $offset, $limit);

				$data = [
					'objects' => $results,
					'num_of_pages' => $pages,
					'city_id' => $city_id,
					'inst_id' => $inst_id,
					'page' => $this->input->get('page')
				];

				$this->load->view('templates/header');

				$this->load->view('templates/all_results_list', $data);

				$this->load->view('templates/footer');

				$this->load->view('templates/additional-footer-standart');

			}

		}


