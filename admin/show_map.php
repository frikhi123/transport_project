    <?php 
	include '../includes/header.php';
	include '../includes/Menu.php';
	include '../includes/Navigation.php';

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
 <script src="http://maps.googleapis.com/maps/api/js">
</script>
 <script>
  function initialize() {
    var mapProp = {
      center:new google.maps.LatLng(34.03128,-6.77056),
      zoom:5,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };
    var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
  }
  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php 	include '../includes/footer.php';	?>  