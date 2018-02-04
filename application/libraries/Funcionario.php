<?php
  class Funcionario {
    private $nome;
    private $email;
    private $senha;
    private $cargo;
    private $db;

    public function __construct(){

      $ci = & get_instance();
      $this->db = $ci->db;
    }

    //metodo que retorna todos os funcionarios
    public function getListaFuncionario(){
      //leitura no banco de dados
      $sql = 'SELECT * FROM funcionario';
      $query = $this->db->query($sql);
      $lista_funcionario = $query->result_array();

      $html = '';
      foreach ($lista_funcionario as $funcionario) {
        $html .= $this->getRow($funcionario);
      }
      return $html;
    }

    //metodo que retorna todos os funcionarios
    //abaixo do presidente
    public function getListaSupervisor(){
      $sql = 'SELECT * FROM funcionario where id_cargo > 1';
      $query = $this->db->query($sql);
      $lista_funcionario = $query->result_array();

      $html = '';
      foreach ($lista_funcionario as $funcionario) {
        $html .= $this->getRow($funcionario);
      }
      return $html;
    }

    //metodo que retorna todos os funcionarios
    //abaixo do supervisor
    public function getListaGerente(){
      $sql = 'SELECT * FROM funcionario where id_cargo > 2';
      $query = $this->db->query($sql);
      $lista_funcionario = $query->result_array();

      $html = '';
      foreach ($lista_funcionario as $funcionario) {
        $html .= $this->getRow($funcionario);
      }
      return $html;
    }

    //metodo que retorna tarefas do funcionario
    public function getListaTarefas($id){
      $sql = "SELECT * FROM tarefa where id_func = '$id'";
      $query = $this->db->query($sql);
      $lista_funcionario = $query->result_array();

      $html = '';
      foreach ($lista_funcionario as $funcionario) {
        $html .= $this->getRowTarefa($funcionario);
      }
      return $html;
    }

    public function getRowTarefa($func){
      $html = '
        <tbody>
          <tr>
            <th scope="row">'.$func['id_func'].'</th>
            <td>'.$func['id_tarefa'].'</td>
            <td>'.$func['descricao'].'</td>
          </tr>
        </tbody>
      ';
      return $html;
    }

    public function getRow($func){
      $html = '
        <tbody>
          <tr>
            <th scope="row">'.$func['id_func'].'</th>
            <td>'.$func['nome'].'</td>
            <td>'.$func['email'].'</td>
            <td>'.$func['id_cargo'].'</td>
          </tr>
        </tbody>
      ';
      return $html;
    }

  }
