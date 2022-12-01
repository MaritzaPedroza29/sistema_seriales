<?php
class Inicio extends App
{
  private $Sesion, $Inicio_model, $Alegra;

  public function __CONSTRUCT()
  {
    $this->Sesion = $this->library('sesion');
    $this->Alegra = $this->library('Alegra');
    $this->Inicio_model = $this->model('Inicio_model');
  }

  public function index()
  {
    if (!$this->Sesion->isConnected()) {
      $this->view('head', "Inicio");
      $data = $this->Inicio_model->getAllOrden();
      $this->view('inicio', $data);
      $this->view('foter');
    } else
      $this->redirectTo('user');
  }

  public function createCSV()
  {
    $suma = [];
    $i = 0;
    while ($i < 1000) {
      $url = "https://api.alegra.com/api/v1/purchase-orders?order_direction=DESC&order_field=id&status=open&fields=deletable&start=$i";
      $vector = $this->Alegra->getDataApiAlegra($url);
      if ((is_array($vector) || is_object($vector))) { // esta condición verifica que me haya llegado datos de la API
        $i = $i + 30; // Aumeta de treinta como usted tenía 
        foreach ($vector as $data) { // se mira el resultado de la consulta de la API 
          $orden = $this->Inicio_model->getOrdenID($data["id"]); // Se hace una consulta a la base de datos para optener una oreden por ID
          if (
            !(is_array($orden) || is_object($orden)) // Esta condicion verifica que la orden no exista
            && $data["deletable"] === TRUE // esta condicion verifica que "deletable" sea verdadero
          ) {
            $this->Inicio_model->setProductos($data["purchases"]["items"]); // este metodo envía los items al modelo /model/Inicio_model.php
          }
        }
      } else
        break;
    }
  }
}
?>