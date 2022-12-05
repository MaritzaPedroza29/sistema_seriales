<?php
include_once "../view/head.php";
?>
<h3 class="text-center" style="margin-top: 20px; margin-bottom: 20px;">Lista de serialización</h3>
<body onload="myfunction();">
<div class="contenedor">
    <center>
    <input type="text" id="serial" placeholder="lea el serial">
    </center>
    <div class="card-body">
      <div class="table-responsive">
        <div class="container">
            <div class="row align-items-start">
                <h6><strong>Cantidad:</strong><br>
            </div>
        </div>
    </div>
</div>
</body>
<script>
  window.onload = function() {
  document.getElementById("serial").focus();
}
</script>