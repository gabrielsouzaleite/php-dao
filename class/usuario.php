<?php
class usuario{
  private $idusuario;
  private $deslogin;
  private $dessenha;
  private $dtcadastro;

  public function getIdusuario(){
    return $this->idusuario;
  }
  public function setIdusuario($values){
    $this->idusuario = $values;
  }

  public function getDeslogin(){
    return $this->deslogin;
  }
  public function setDeslogin($values){
    $this->deslogin = $values;
  }

  public function getDessenha(){
    return $this->dessenha;
  }
  public function setDessenha($values){
    $this->dessenha = $values;
  }

  public function getDtcadastro(){
    return $this->dtcadastro;
  }
  public function setDtcadastro($values){
    $this->dtcadastro = $values;
  }

  public static function getList(){
    $sql = new sql();

    return $sql->select("SELECT * FROM tb_usuarios");
  }

  public static function search($login){
    $sql = new sql();

    return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
      ":SEARCH"=>"%".$login."%"

    ));

  }

  public function loadById($id){
    $sql = new sql();

    $results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
      ":ID"=>$id
    ));

    if(count($results) > 0){
      $row = $results[0];

      $this->setIdusuario($row['idusuario']);
      $this->setDeslogin($row['deslogin']);
      $this->setDessenha($row['dessenha']);
      $this->setDtcadastro(new DateTime($row['dtcadastro']));

    }
  }

  public function login($login, $password){
    $sql = new sql();

    $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
      ":LOGIN"=>$login,
      ":PASSWORD"=>$password
    ));

    if(count($results) > 0){
      $row = $results[0];
      $this->setData($results[0]);


    } else {
      echo "ta errado";
    }
  }

  public function setData($data){
    $this->setIdusuario($data['idusuario']);
    $this->setDeslogin($data['deslogin']);
    $this->setDessenha($data['dessenha']);
    $this->setDtcadastro(new DateTime($data['dtcadastro']));
  }

  public function insert(){
    $sql = new sql();

    $results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(
      ":LOGIN"=>$this->getDeslogin(),
      ":PASSWORD"=>$this->getDessenha()
    ));

    if(count($results) > 0){
      $row = $results[0];
      $this->setData($results[0]);


    } else {
      echo "ta errado";
    }

  }
  public function __toString(){
    return json_encode(array(
      "idusuario"=>$this->getIdusuario(),
      "deslogin"=>$this->getDeslogin(),
      "dessenha"=>$this->getDessenha(),
      "dtcadastro"=>$this->getDtcadastro()->format("d/m/Y H:i:s")
    ));
  }

}
?>