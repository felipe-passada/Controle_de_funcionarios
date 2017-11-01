<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function index()
	{
		$this->load->view('commons/header');
		$this->load->view('commons/navbar');
		$this->load->view('funcionarios/welcome');

		$this->load->model('FuncionarioModel', 'model');
		$data['lista'] = $this->model->getListaFuncionario();
		$this->load->view('funcionarios/lista', $data);

		$this->load->view('commons/footer_script');
	}
}
