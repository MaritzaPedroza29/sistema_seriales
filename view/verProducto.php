<?php
 json_encode($data);
?>
<h3 class="text-center" style="margin-top: 20px; margin-bottom: 20px;">Lista de productos</h3>
  <div class="row">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div class="container">
          <div class="row align-items-start">
            <h6><strong>Nombre:</strong><br>
                <?php echo $data['Nombre'];?>
              </a></h6>
            <h6><strong>Fecha:</strong><br>
              <?php echo $data['referencia'];?>
            </h6>
            <h6><strong>Cantidad:</strong><br>
              <?php echo $data['cantidad'];?>
            </h6>
            <div>
              <a href="<?php echo BASE_URL?>inicio/nombre?nombre=<?php echo $data['Nombre']?>" class="btn btn-primary">
              continuar
            </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>