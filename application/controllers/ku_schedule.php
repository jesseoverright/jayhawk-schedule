<?php
class KU_Schedule extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ku_schedule_model');
		#$this->output->enable_profiler(TRUE);
	}

	public function index() {
		$data['ku_games'] = $this->ku_schedule_model->get_games();
		$data['title'] = 'Kansas Jayhawk 2013-14 Schedule';

		$this->load->view('templates/ku-header', $data);
		$this->load->view('ku/index');
		$this->load->view('templates/ku-footer');
	}

	public function ical() {
		$data['ku_games'] = $this->ku_schedule_model->get_games();
		$data['title'] = 'Kansas Jayhawks 2013-14 Schedule';

		$this->load->view('templates/ical-header', $data);
		$this->load->view('ku/ical');
		$this->load->view('templates/ical-footer');
	}

	public function game($slug) {
		$data['game'] = $this->ku_schedule_model->get_games($slug);
		$data['title'] = "Kansas Jayhawks vs ".$data['game']->opponent;

		$this->load->view('templates/ku-header', $data);
		$this->load->view('ku/game', $data);
		$this->load->view('templates/ku-footer');
	}

	public function edit($slug) {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['game'] = $this->ku_schedule_model->get_games($slug);
		$data['title'] = "Edit game data for ".$data['game']->opponent;

		$this->form_validation->set_rules('opponent', 'Opponent', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('score', 'Score', 'is_natural_no_zero');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/ku-form-header', $data);
			$this->load->view('ku/edit', $data);
			$this->load->view('templates/ku-footer');
		}
		else {
			$this->ku_schedule_model->edit_game($data['game']->id);

			$this->load->view('templates/ku-header', $data);
			$this->load->view('ku/success');
			$this->load->view('templates/ku-footer', $data);
		}
	}

	public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a new KU Game';

		$this->form_validation->set_rules('opponent', 'Opponent', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('templates/ku-form-header', $data);
			$this->load->view('ku/create');
			$this->load->view('templates/ku-footer');
		}
		else {
			$this->ku_schedule_model->create_game();
			$this->load->view('templates/ku-header', $data);
			$this->load->view('ku/success');
			$this->load->view('templates/ku-footer');
		}
	}
}