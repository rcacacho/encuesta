<?php
class Login extends CI_Controller
{
	function __construct()
	{
	parent::__construct();
	$this->load->model('Model_Login');	
	}	

	public function Index()
	{
		$data['contenido'] ='login';
		$this->load->view('plantilla', $data);
	}

	public function validar(){
		$datos = $this->input->post();
		$usuario= $datos['txtUsuario'];
		$password = $datos['txtPassword'];

		$validar2=$this->Model_Login->existeUsuario($usuario,$password);

		if($validar2 && $validar2->activo==1){
			$datos =array(
   
			  'idusuario'=>$usuario->idusuario,
			  'usuario'=>$usuario->usuario,
			  'email'=>$usuario->email,
			  'nombre'=>$usuario->nombre,
			  'logged_in'=>TRUE
			);
		   $this->session->set_userdata($datos);
		}else{
		   $messageCorrecto=" <div id='success' class='alert alert-danger alert-dismissible' role='alert'>
			 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			   <span aria-hidden='true'>&times;</span>
			 </button>
			 <strong>Hola $usuario !</strong> Error en usuario y/o contraseña.
		   </div>";
	  echo $messageCorrecto;
		}
	}
}
