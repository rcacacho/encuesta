<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('post');
		$this->load->helper('common');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array();

		//get the posts data
		$data['posts'] = $this->post->getRows(array('limit' => 10));

		//load the view
		$this->load->view('posts/index', $data);
	}

	public function details($url_slug)
	{
		$data = array();

		//get the post data
		$data['post'] = $this->post->getRows(array('url_slug' => $url_slug));

		//load the view
		$this->load->view('posts/details', $data);
	}

	public function add()
	{
		$data = array();
		$postData = array();
		if ($this->input->post('submitBtn')) {
			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('content', 'Content', 'required');

			$postData = array(
				'title' => strip_tags($this->input->post('title')),
				'content' => strip_tags($this->input->post('content'))
			);

			if ($this->form_validation->run() == true) {
				/*
                 * Generate SEO friendly URL
                 */
				$title = strip_tags($this->input->post('title'));
				$titleURL = strtolower(url_title($title));
				if (isUrlExists('posts', $titleURL)) {
					$titleURL = $titleURL . '-' . time();
				}
				$postData['url_slug'] = $titleURL;

				//Insert post data to database
				$insert = $this->post->insert($postData);
				if ($insert) {
					$postData = array();
					$data['success_msg'] = 'Post data inserted successfully.';
				} else {
					$data['error_msg'] = 'Some problems occured, please try again.';
				}
			}
		}

		$data['post'] = $postData;

		//load the view
		$this->load->view('posts/add', $data, false);
	}
}
