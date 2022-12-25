<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

        public function index()
		{
				$data['news'] = $this->news_model->get_news();
				$data['title'] = 'MVC "Новости"';
				
			

				$this->load->view('templates/header', $data);
				$this->load->view('news/index', $data);
				$this->load->view('templates/footer');
		}

        public function view($slug = NULL)
		{
			$data['news_item'] = $this->news_model->get_news($slug);

			if (empty($data['news_item']))
			{
					echo 5555; //show_404();
			}

			$data['title'] = $data['news_item']['title'];

			$this->load->view('templates/header', $data);
			$this->load->view('news/view', $data);
			$this->load->view('templates/footer');
		}
public function del($data)
		{
			$this->news_model->del_news($_GET);
				$this->load->view('news/success');
		}
		public function create()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Create a news item';

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('text', 'Text', 'required');

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('news/create');
				$this->load->view('templates/footer');

			}
			else
			{
				$this->news_model->set_news();
				$this->load->view('news/success');
			}
		}
		
		public function find()
		{
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Найти новость';

			$this->form_validation->set_rules('title', 'Title', 'required');
			

			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header', $data);
				$this->load->view('news/find');
				$this->load->view('templates/footer');

			}
			else
			{
				
				$data['news_item'] = $this->news_model->find_news();
				$data['title'] = $data['news_item']['title'];

			$this->load->view('templates/header', $data);
			$this->load->view('news/view', $data);
			$this->load->view('templates/footer');
				
			}
			
		}

}
