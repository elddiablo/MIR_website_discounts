<?php

	class Pages extends CI_Controller{
		public function view($page = 'home_users'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}
			
			$data = null;
			if ($page == "home_users") {
				// the number is 3
				$data = [
					'most_popular_countires' => $this->object_model->get_most_popular_countries()
				];
			}

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');

			if ($page == 'home_users') {
				$this->load->view('templates/additional-footer-users');
			} else if($page == 'home_partners'){
				$this->load->view('templates/additional-footer-partners');
			} else {
				$this->load->view('templates/additional-footer-standart');
			}
		}
	}

	
