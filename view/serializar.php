<h3 class="text-center" style="margin-top: 20px; margin-bottom: 20px;">Lista de serialización</h3>
<body onload="myfunction();">
<div>
  <center>
    <input type="text" id="serial" placeholder="lea el serial" name="serial" onkeypress="contar(event)">
    <audio id="xyz" src="../view/tono_error.mp3" preload="auto"></audio>
  </center>
    <div class="card-body">
      <div class="table-responsive">
        <div class="container">
            <div class="row align-items-start">
                <h6><strong>Cantidad:</strong><br>
                <span id="contador"><?php echo $data['serial']; ?></span>/ <?php echo $data['cantidad']; ?>
            </div>
        </div>
    </div>
</div>
</body>
<script></script>
<script>
  window.onload = function() {
  document.getElementById("serial").focus();
} 
function contar (e){
  if (e.keyCode === 13 && !e.shiftKey) {
        e.preventDefault();
  var queryString = window.location.search;
  var urlParams = new URLSearchParams(queryString);
  var Param = urlParams.get('cantidad');
  let inputValue = document.querySelector("#serial").value;
  if(inputValue.length!=Param){
    document.getElementById('xyz').play();
    alert("la cantidad de digitos del serial no es igual a la seleccionada");
  }else{
    alert ("Se inserto correctamente el dato");
  } 
  console.log(inputValue) 
}}
</script>