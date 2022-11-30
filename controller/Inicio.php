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
    if ($this->Sesion->isConnected()) {
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
      $cuantos = count($vector);
      $suma = array_merge($suma, $vector);
      if ($cuantos == 30)
        $i += 30;
      else
        break;
    }
    $archivo = BASE_URL.'productos.csv';
    $fh = fopen($archivo, 'w') or die("No se puede abrir el archivo: $archivo");
    $info = array("nombre_provedor", "fecha", "numero_orden");
    fputcsv($fh, $info, ",");
    foreach ($suma as $fila) {
      if ($fila['deletable'] == "true") {
        $lista = array($fila['provider']['name'], $fila['date'], $fila['id']);
        fputcsv($fh, $lista, ",");
      }
    }
    fclose($fh) or die("No se puede cerrar el archivo: $archivo");
  }
}
?>