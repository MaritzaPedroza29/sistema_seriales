
<h3 style="margin-top: 20px; margin-bottom: 20px; text-align:center;">Lista de ordenes de compra</h3>
<body style="margin-bottom: 20px;">
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
        </div>
      </div>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-md-2 g-4">
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body" style="border: 1px;">
        <h5 class="card-title">Nombre:</h5>
        <p class="card-text"><?php echo $Orden['nombre_provedor'];?></p>
        <h5>Fecha:</h5>
        <p class="card-text"><?php echo $Orden['fecha'];?></p>
        <h5>Número de orden:</h5>
        <p class="card-text"><?php echo $Orden['id_orden'];?></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
      <h5 class="card-title">Nombre:</h5>
        <p class="card-text"><?php echo $Orden['nombre_provedor'];?></p>
        <h5>Fecha:</h5>
        <p class="card-text"><?php echo $Orden['fecha'];?></p>
        <h5>Número de orden:</h5>
        <p class="card-text"><?php echo $Orden['id_orden'];?></p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<a href="<?php echo BASE_URL?>inicio/actualizar" class="btn btn-primary" style="margin: 1em 2em 3em 4em;">Sincronizar</a>