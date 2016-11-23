<?php
require_once "./vendor/autoload.php";
// "willdurand/geocoder": "^3.2"


$geocoderAdapter  = new \Ivory\HttpAdapter\CurlHttpAdapter();
$geocoder = new \Geocoder\ProviderAggregator();
$geocoder->registerProvider(new \Geocoder\Provider\GoogleMaps($geocoderAdapter));
$busqueda = isset($_GET['latitud']) ? $_GET['latitud'] : '';
$busquedados = isset($_GET['longitud']) ? $_GET['longitud'] : '';
$obj = $geocoder->geocode($busqueda);


?>

<!DOCTYPE html>
<head>

  <!-- incluye el API de Google -->
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8cB_s4KjzknPaCPHZHVguWd729jjy4ko"> </script>

</head>
<body>

<div id = "formulario">
<form method = "GET">

   Latitud: <input type = "text" id = "latitud" name = "latitud"  size = 40>
   Longitud: <input type = "text" id = "longitud" name = "longitud"  size = 40>
<br/>
<button id = "buscar" name = "buscar">
Buscar</button>

</form></div>


  <!-- DIV donde se muestra el mapa -->
  <div id="map" style="width: 500px;height: 400px;"></div>



<script>
// inicializa el mapa
function initMap() {
  // define una coordenada (latitud, longitud)
  <?php
  foreach ($obj as $address) { ?>
  var myLatLng = {lat: <?= $address -> getLatitude() ?>,
                  lng: <?= $address -> getLongitude() ?>};
                  
  <?php
}
?>
  // crea un mapa
  var map = new google.maps.Map(
    document.getElementById('map'),   // DIV donde se muestra el mapa
    {
      center: myLatLng,     // coordenada en el centro del mapa
      scrollwheel: false,   // uso de la rueda del ratón para hacer scroll
      zoom: 18              // nivel de zoom
    }
  );
<?php
foreach ($obj as $address)
{
?>
  // crea un marcador sobre el mapa
  var marker = new google.maps.Marker({
    map: map,               // mapa
    position: { lat: <?= $address -> getLatitude() ?>,
                lng: <?= $address -> getLongitude() ?>},     // coordenada del marcador
    title: "Latitud: "+ <?= $address -> getLatitude() ?>+"\n"+"Longitud: "+ <?= $address -> getLongitude() ?>// texto del marcador
  });
  <?php
}
?>
}
// define un manejador de eventos
// al cargar la página, llama initMap()
google.maps.event.addDomListener(window, 'load', initMap);
</script>
</body>
</html>