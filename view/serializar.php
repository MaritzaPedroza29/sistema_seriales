<h3 class="text-center" style="margin-top: 20px; margin-bottom: 20px;">Lista de serialización</h3>
<body onload="myfunction();">
<div>

  <center>
    <input type="text" id="serial" placeholder="lea el serial" name="serial">
    <audio id="xyz" src="../view/tono_error.mp3" preload="auto"></audio>
  </center>
    <div class="card-body">
      <div class="table-responsive">
        <div class="container">
            <div class="row align-items-start">
                <h6><strong>Cantidad:</strong><br>
                <span id="contador"><?php echo $data['serial']; ?></span>/ <?php echo $data['cantidad']; ?>
            </div>
            <input type="button" class="btn btn-success" href="#" value="Enviar" id="boton">
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
  window.onload = function() {
  document.getElementById("serial").focus();
} 
  var btn = document.getElementById('boton');
  btn.addEventListener("click",function(){
    var queryString = window.location.search;
  var urlParams = new URLSearchParams(queryString);
  var cantidad = urlParams.get('cantidad');
  var idpoc = urlParams.get('idpoc');
  let inputValue = document.getElementById('serial').value;
  $.ajax({
                data: {serial: inputValue, idpoc: idpoc},//datos que se envian a traves de ajax
                url:   '../ajax.php', //archivo que recibe la peticion
                method:  'get', //método de envio
            }).done(function(res){
                var result = JSON.parse(res);
              console.log(result);
            });    
        });

</script>