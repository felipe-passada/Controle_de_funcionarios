<?php
  include APPPATH.'libraries/Funcionario.php';

  class FuncionarioModel extends CI_Model{

    public function getLogin($email, $senha) {
      $func = new funcionario();
      $sql = "SELECT * FROM FUNCIONARIO WHERE email = '$email' && senha = '$senha'";
      $query = $this->db->query($sql);
      $dados_login = $query->result_array();

      if(sizeof($dados_login) != 0){
        foreach ($dados_login as $row) {
          $dados['cargo'] = $row['cargo_id'];
          $dados['id'] = $row['id_func'];

        }
        $dados['mensagem'] = 'ok';
        return $dados;
      } else {
        $dados['mensagem'] = 'erro';
      }
    }

    public function getListaFuncionario(){
      $func = new Funcionario();
      return $func->getListaFuncionario();
    }

  }
 ?>
