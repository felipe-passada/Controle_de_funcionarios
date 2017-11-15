<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Controler Principal
class Welcome extends MY_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function presidente(){
		//pagina do presidente
		$this->load->view('commons/header');
		$this->load->view('commons/navbar');
		$this->load->view('funcionarios/presidente');

		//carrega uma model com a consulta de todos os funcionarios
		$this->load->model('FuncionarioModel', 'model');
		$data['lista'] = $this->model->getListaFuncionario();
		$this->load->view('funcionarios/lista', $data);

		$this->load->view('commons/footer_script');

	}
	public function supervisor(){
		$this->load->view('commons/header');
		$this->load->view('commons/navbar');
		$this->load->view('funcionarios/supervisor');

		//Carrega uma model com a consulta de funcionarios
		//para supervisores
		$this->load->model('FuncionarioModel', 'model');
		$data['lista'] = $this->model->getListaSupervisor();
		$this->load->view('funcionarios/lista', $data);

		$this->load->view('commons/footer_script');

	}
	public function gerente(){
		$this->load->view('commons/header');
		$this->load->view('commons/navbar');
		$this->load->view('funcionarios/gerente');

		//Carrega uma model com a consulta de funcionarios
		//para gerentes
		$this->load->model('FuncionarioModel', 'model');
		$data['lista'] = $this->model->getListaGerente();
		$this->load->view('funcionarios/lista', $data);

		$this->load->view('commons/footer_script');

	}

	public function colaborador(){
		$this->load->helper('url');
		$this->load->view('commons/header');
		$this->load->view('commons/navbar');
		$this->load->view('funcionarios/colaborador');
		$sessao = $this->session->userdata;

		//Carrega uma model com a consulta de tarefas
		//do colaborador
		$this->load->model('FuncionarioModel', 'model');
		$data['lista'] = $this->model->getListaTarefa($sessao);
		$this->load->view('funcionarios/tarefa', $data);

		$this->load->view('commons/footer_script');

	}

}
