<?php
class Schedule_model extends CI_Model {
	public function __construct() {
		$this->load->database();
	}

	public function get_games($slug = FALSE) {
		# if no slug specified, get all games
		if ($slug === FALSE) {
			$this->db->order_by("date","asc");
			$query = $this->db->get('ku_games');

			#process game results
			foreach ($query->result() as $game) {
				$game->result = $this->get_result($game->score, $game->opponent_score);
				$game->time = $this->convert_time_to_display($game->time);
				$game->formatted_date = $this->convert_date_to_display($game->date);
			}

			return $query->result();
		}

		# else get individual game
		$query = $this->db->get_where('ku_games', array('slug' => $slug));

		#process game result
		$query->row()->result = $this->get_result($query->row()->score, $query->row()->opponent_score);

		# convert time & date to display formats
		$query->row()->time = $this->convert_time_to_display($query->row()->time);	
		$query->row()->formatted_date = $this->convert_date_to_display($query->row()->date);

		return $query->row();
	}

	public function edit_game($id) {
		$this->load->helper('url');

		$slug = url_title($this->input->post('opponent').' '.date('M j', strtotime($this->input->post('date'))), 'dash', TRUE);

		$data = array(
			'opponent' => $this->input->post('opponent'),
			'mascot' => $this->input->post('mascot'),
			'slug' => $slug,
			'date' => $this->input->post('date'),
			'time' => $this->convert_time_to_db($this->input->post('time')),
			'location' => $this->input->post('location'),
			'television' => $this->input->post('television'),
			'type' => $this->input->post('type')
		);

		if ($this->input->post('score') != "") $data['score'] = $this->input->post('score');
		if ($this->input->post('opponent_score') != "") $data['opponent_score'] = $this->input->post('opponent_score');

		$this->db->where('id', $id);

		#if user submitted, delete entry
		if ($this->input->post('delete') === "Delete Game") return $this->db->delete('ku_games', $data);

		return $this->db->update('ku_games', $data);
	}

	public function create_game() {
		$this->load->helper('url');

		$slug = url_title($this->input->post('opponent').' '.date('M j', strtotime($this->input->post('date'))), 'dash', TRUE);

		$data = array(
			'opponent' => $this->input->post('opponent'),
			'mascot' => $this->input->post('mascot'),
			'slug' => $slug,
			'location' => $this->input->post('location'),
			'television' => $this->input->post('television'),
			'date' => $this->input->post('date'),
			'time' => $this->convert_time_to_db($this->input->post('time')),
			'type' => $this->input->post('type')
		);

		return $this->db->insert('ku_games', $data);
	}

	private function get_result($ku_score, $opponent_score) {
		if ($ku_score > $opponent_score) return 'win';
		elseif ($ku_score < $opponent_score) return 'loss';
		else return NULL;
	}

	private function convert_time_to_db($form_time) {
		return date("H:i:s", strtotime($form_time));
	}

	private function convert_time_to_display($db_time) {
		return date("g:i A", strtotime($db_time));
	}

	private function convert_date_to_display($db_date) {
		//return date("D, M jS", strtotime($db_date));
		return date("l, F jS Y",strtotime($db_date));
	}

}