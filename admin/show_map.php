<?php 
	include '../includes/header.php';
	include '../includes/Menu.php';
	include '../includes/Navigation.php';

  $db = new PDO('mysql:host=localhost;dbname=transport', 'root', '');
  $query = $db->prepare('SELECT * FROM students LIMIT 0, 20');
  $query->execute();

  $nbr = $query->rowCount();
  echo '<input type = "hidden" value = "'.$nbr.'" id = "nbr">';
  $i = 1;
  while($row=$query->fetch()){
    echo '<input type = "hidden" value = "'.$row['lat'].','.$row['lng'].'" id = "marker'.$i.'">';
    $i++;
  }
?>    

<div class="row">
<div class="col-sm-1"></div>
<div class="col-sm-10">
  <div class="panel panel-primary" id="charts_env">
     <div class="panel-heading">
        <div class="panel-title">Map</div>
     </div>
     <div class="panel-body">
        <div class="tab-content">
            <div id="googleMap" style="height:450px;"></div>
        </div>
     </div>
     
  </div>
</div>
<div id="googleMap"></div>
</div>

<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
  function initialize() {
    var mapProp = {
      center:new google.maps.LatLng(34.03128,-6.77056),
      zoom:5,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var carte = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    var nbr = document.getElementById('nbr');
    for(var i = 1; i <= nbr.value; i++){
      position = document.getElementById('marker'+i).value;
      tPosition = position.split(',');
      var loc = new google.maps.LatLng(tPosition[0], tPosition[1]);
      var marker = new google.maps.Marker({
        position : loc,
        map : carte

      });
    }
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php 	include '../includes/footer.php';	?>  