<?php defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}

	public function index()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('user_m');
			$query = $this->user_m->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$query= $this->user_m->pantau($post);
				$params = array(
					'username' => $row->username,
					'id_jabatan'	=> $row->id_jabatan
				);
				$this->session->set_userdata($params);
				echo "<script>
					window.location='" . site_url('home') . "';
				</script>";
			} else {
				echo "<script>
					alert('Login gagal, username / password salah');
					window.location='" . site_url('login') . "';
				</script>";
			}
		}
	}
	public function logout()
	{
		$query= $this->user_m->Out($post);
		$params = array('username', 'id_jabatan');
		$this->session->unset_userdata($params);
		redirect('login');
	}
}
