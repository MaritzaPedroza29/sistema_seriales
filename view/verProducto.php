<h3 style="margin-top: 20px; margin-bottom: 20px; text-align:center;">Lista de productos</h3>
<?php if(is_array($data) || is_object($data)) foreach ($data as $Orden):?>
  <div class="row">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"></h6>   
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div class="container">
          <div class="row align-items-start">
            <h6><strong>Nombre:</strong>
                <?php echo $Orden['nombre'];?>
              </h6>
            <h6><strong>referencia:</strong><br>
              <?php echo $Orden['referencia'];?>
            </h6>
            <h6><strong>Cantidad:</strong><br>
              <?php echo $Orden['cantidad'];?>
            </h6>
            <div>
              <a href="<?php echo BASE_URL?>inicio/id?idpoc=<?php echo $Orden['id_prod_oc']?>" class="btn btn-primary">
              continuar </a>
            </div>
       
          </div>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>