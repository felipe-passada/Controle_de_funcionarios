<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_controller {

  public function index(){
    $this->load->view('commons/header');
    //$this->load->view('commons/navbar');
    $this->load->view('login');
  }

  //pagina de login
  public function logar() {
    //$this->load->base_url('url');
    $this->load->helper('url');
    $email = $this->input->post("email");
    $senha = $this->input->post("senha");

    //recupera dados do banco para fazer o Login
    // e atribuir valor na session
    $this->load->model('FuncionarioModel', 'model');
    $dados_login['dados_login'] = $this->model->Login($email, $senha);
      foreach ($dados_login as $data) {
        $dados['id'] = $data['id'];
        $dados['email'] = $data['email'];
        $dados['senha'] = $data['senha'];
        $dados['cargo'] = $data['cargo'];
      }

    if($email == $dados['email'] && $senha == $dados['senha']) {
      $this->session->set_userdata('logado', 1);
      $this->session->set_userdata($dados);

      $this->load->model('FuncionarioModel', 'model');
      $this->model->checaCargo($dados['cargo']);

    } else {
      $dados['erro'] = "Usuario ou senha incorretos!";
      $this->load->view("login", $dados);
    }

  }

  //metodo para fazer logoff
  public function logout() {
    $this->session->unset_userdata("logado");
    redirect(base_url());
  }

}
