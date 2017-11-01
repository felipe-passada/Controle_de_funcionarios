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

    public function getRow($func){
      $html = '<table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Cargo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">'.$func['id_func'].'</th>
            <td>'.$func['nome'].'</td>
            <td>'.$func['email'].'</td>
            <td>'.$func['cargo_id'].'</td>
          </tr>
        </tbody>
      </table>';
      return $html;
    }

  }
