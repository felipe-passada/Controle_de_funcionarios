<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_controller {

  public function index(){
    $this->load->view('commons/header');
    $this->load->view('commons/navbar');
    $this->load->view('login');
  }

  public function logar() {
    $email = $this->input->post("email");
    $senha = $this->input->post("senha");

    $this->load->model('FuncionarioModel', 'model');
    $dados['dados_login'] = $this->model->getLogin($email, $senha);

    if($email && $senha) {
      $this->session->set_userdata("logado", 1);
      redirect(base_url());
    } else {
      $dados['erro'] = "Usuario ou senha incorretos!";
      $this->load->view("v_login", $dados);
    }

  }
  public function logout() {
    $this->session->unset_userdata("logado");
    redirect(base_url());
  }

}
