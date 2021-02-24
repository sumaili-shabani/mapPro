<?php

$message;
$debit_event;
$fin_event;
$evenement=$this->db->get('evenement');
if ($evenement->num_rows() > 0) {
  foreach ($evenement->result_array() as $row) {
    $message = $row['message'];
    $debit_event = $row['debit_event'];
    $fin_event = $row['fin_event'];
    $json[] = array(
      'title' => $message,
      'start' => $debit_event,
      'end' => $fin_event,
      'className' => 'bg-warning' 
  );

  // var_dump($json);

  }
}
else{

}


 ?>
<!doctype html>
<html lang="en">
  <head>
   <?php include('_meta.php') ?>
  </head>
  <body>
<?php include('_nav.php') ?>

  	<div class="container col-md-12">
  		<div class="row">


  			<div class="col-md-1">
  					
			</div>
			<div class="col-md-10">
				

			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12" style="margin-top: 10px;">

						<!-- les scripts commencent -->
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
								<div id="calendar"></div>
							</div>
							<div class="col-md-2"></div>
						</div>

						<!-- fin de mes scripts -->
						
					</div>
				</div>
			</div>


			</div>
			<div class="col-md-1">
				
			</div>
  			
  		</div>
  	</div>

  	
  	<?php include("_script.php") ?>

  	<script type="text/javascript">
  		$(document).ready(function(){
  			//alert("boom");
  		});
  	</script>

  	<script type="text/javascript">
	$(document).ready(function(){
	  "use strict";
	  $('#calendar').fullCalendar({
	      defaultView: 'month',

	      header: {
	          left: 'title', // you can add today btn
	          center: '',
	          right: 'month, agendaWeek, listWeek, prev, next', // you can add agendaDay btn
	      },
	      contentHeight: 'auto',
	      defaultDate: '<?= date('Y-m-d'); ?>',
	      editable: false,
	      droppable: false, // this allows things to be dropped onto the calendar
	      eventLimit: false, // allow "more" link when too many events
	          
	      events: <?= json_encode($json); ?>
	  });
	});
	</script>




  </body>
</html>