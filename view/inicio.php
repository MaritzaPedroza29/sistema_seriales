<h3 class="text-center" style="margin-top: 20px; margin-bottom: 20px;">Lista de ordenes</h3>
<?php if(is_array($data) || is_object($data)) foreach ($data as $Orden):?>
  <div class="row">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary"></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <div class="container">
          <div class="row align-items-start">
            <h6><strong>Nombre:</strong><br><a href="<?php echo BASE_URL?>inicio/orden?id=<?php echo $Orden['id_orden']?>" style="color:#000000">
                <?php echo $Orden['nombre_provedor'];?>
              </a></h6>
            <h6><strong>Fecha:</strong><br>
              <?php echo $Orden['fecha'];?>
            </h6>
            <h6><strong>Número de orden:</strong><br>
              <?php echo $Orden['id_orden'];?>
            </h6>
          </div>
          <button type="submit" class="btn btn-primary">Sincronizar</button>
        </div>
      </div>
    </div>
  </div>

<?php endforeach; ?>