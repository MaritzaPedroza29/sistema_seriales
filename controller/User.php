<?php
class User extends App
{
  private $Sesion, $User_model, $StandardizeData;

  public function __CONSTRUCT()
  {
    $this->Sesion = $this->library('sesion');
    $this->User_model = $this->model('User_model');
    $this->StandardizeData = $this->library('StandardizeData');
  }

  public function index()
  {
    if (!$this->Sesion->isConnected()) {
      $this->view('head', "Login");
      $this->view('login');
      $this->view('foter');
    } else
      $this->redirectTo('Inicio');
  }

  public function userLogIn()
  {
    if (!$this->Sesion->isConnected()) {
      $_POST['usuario'] = $this->StandardizeData->removeBlankSpaces($_POST['usuario']);
      $_POST['clave'] = $this->StandardizeData->removeBlankSpaces($_POST['clave']);
      $_POST['clave'] = MD5($_POST['clave']);

      $user = $this->User_model->getUser($_POST['usuario'], $_POST['clave']);

      if (!$user) {
        echo json_encode("Usuario incorrecto");
        $this->index();
        return;
      }

      if (!$this->Sesion->new($user["id_usuario"])) {
        echo json_encode("Error al crear la session");
        $this->index();
        return;
      }

      $this->redirectTo('inicio');

    } else
      echo json_encode("Ya existe una session");
  }

  public function logout()
  {
    if ($this->Sesion->isConnected()) {
      $this->Sesion->logout();
      return;
    }
    $this->redirectTo('user', null, true);
  }
}
?>