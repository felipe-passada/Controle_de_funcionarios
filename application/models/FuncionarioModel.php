<?php
  include APPPATH.'libraries/Funcionario.php';

  class FuncionarioModel extends CI_Model{

    public function Login($email, $senha) {
      $func = new funcionario();
      $sql = "SELECT * FROM FUNCIONARIO WHERE email = '$email' && senha = '$senha'";
      $query = $this->db->query($sql);
      $dados_login = $query->result_array();

      //print_r($dados_login);
      //return $dados_login;

      if(sizeof($dados_login) != 0){

        foreach ($dados_login as $row){
          $dados['id'] = $row['id_func'];
          $dados['email'] = $row['email'];
          $dados['senha'] = $row['senha'];
          $dados['cargo'] = $row['id_cargo'];

          //---------------------------------//
          return $dados;
        }

      }else{
        return 0;
      }

    }

    public function checaCargo($cargo){
      //Verifica qual valor do cargo e redireciona para a pagina
      // de cada tipo de funcionario
      switch ($cargo) {
        case '1':
          redirect(base_url('index.php/welcome/presidente'));
          break;
        case '2':
          redirect(base_url('index.php/welcome/supervisor'));
          break;
        case '3':
          redirect(base_url('index.php/welcome/gerente'));
        break;
        case '4':
          redirect(base_url('index.php/welcome/colaborador'));
        break;

        default:
          $mensagem = "Erro cargo não existe!";
          break;
      }
    }

    //Retorn a lista de funcionarios
    //completa para o presidente
    public function getListaFuncionario(){
      $func = new Funcionario();
      return $func->getListaFuncionario();
    }

    //Retorna a lista de funcionarios
    //apenas para o supervisor
    public function getListaSupervisor(){
      $func = new Funcionario();
      return $func->getListaSupervisor();
    }

    //Retorna a lista de funcionarios
    //apenas para o gerente
    public function getListaGerente(){
      $func = new Funcionario();
      return $func->getListaGerente();
    }

    //Retorna a lista de afazeres
    //apenas para o funcionarios
    // classificados como colaborador
    public function getListaTarefa($sessao){
      foreach ($sessao as $dados) {
        $id = $sessao['id'];
      }

      $func = new Funcionario();
      return $func->getListaTarefas($id);
    }

  }
 ?>
