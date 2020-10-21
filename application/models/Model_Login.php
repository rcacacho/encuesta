<?php
class Model_Login extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function existeUsuario($usuario, $password)
	{
		$query = $this->db->query("SELECT * FROM usuario INNER JOIN perfil ON usuario.idperfil = perfil.idperfil
		WHERE usuario.usuario = '$usuario' AND usuario.password = '$password'");
		return $query->row();
	}

	public function isLoggedIn()
	{
		header("cache-Control: no-store, no-cache, must-revalidate");
		header("cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

		$is_logged_in = $this->session->userdata('logged_in');
		if (!isset($is_logged_in) || $is_logged_in !== TRUE) {
			redirect('/');
			exit;
		} else {
			if (!$this->uri->slash_segment(1)) {
				redirect('inicio/access_denied');
				exit;
			}
		}
	}
}
