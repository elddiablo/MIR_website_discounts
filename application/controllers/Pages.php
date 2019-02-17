<?php

	class Pages extends CI_Controller{
		public function view($page = 'home_users'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			} else {

				$data = $page === 'home_users' 
					? ['most_popular_countires' => $this->object_model->get_most_popular_countries()]
					: null;

				$this->load->view('templates/header');
				$this->load->view('pages/'.$page, $data);
				$this->load->view('templates/footer');

				switch ($page) {
					case 'home_users':
						$this->load->view('templates/additional-footer-users');
						break;
					
					case 'home_partners':
						$this->load->view('templates/additional-footer-partners');
						break;

					default: 
						$this->load->view('templates/additional-footer-standart');
						break;
				}
			}
		}
	}

	
