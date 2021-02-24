
<!doctype html>
<html lang="en">
  <head>
   <?php include('_meta.php') ?>
    <link rel="stylesheet" type="text/css" href="<?php echo(base_url()) ?>js/assets/css/chat.css">

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

            <!-- debut -->
            <div class="col-md-12">
              <div class="row">

                <div class="col-md-3">

                  <div class="col-md-12">
                    <?php include("menu_user.php") ?>
                  </div>
                  
                </div>

                <!-- chargement information -->
                <div class="col-md-9">
                  <!-- objet -->
                  <?php include("objet_basic_messagerie.php") ?>
                <!-- fin des objets -->
                </div>

                <!-- fin chargement -->

                
              </div>
            </div>
            <!-- fin  -->
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


    <script>
		$(document).ready(function(){

		 function load_country_data(page)
		 {
		  $.ajax({
		   url:"<?php echo base_url(); ?>admin/pagination_users_on_line/"+page,
		   method:"GET",
		   dataType:"json",
		   success:function(data)
		   {
		    $('#country_table').html(data.country_table);
		    $('#pagination_link').html(data.pagination_link);
		   }
		  });
		 }
		 
		 load_country_data(1);

		 $(document).on("click", ".pagination li a", function(event){
		  event.preventDefault();
		  var page = $(this).data("ci-pagination-page");
		  load_country_data(page);
		 });


		 function load_data(query)
		 {
			  $.ajax({
			   url:"<?php echo base_url(); ?>admin/fetch_search_user_online_pagination2",
			   method:"POST",
			   data:{query:query},
			   success:function(data){
			    $('#country_table').html(data);
			   }
			  });
		  }

		 $(document).on('keyup','#search_text',function(){
			var search = $(this).val();
			if(search != '')
			{
			   load_data(search);
			   // $('#pagination_link').html('');
			}
			else
			{
			   load_country_data(1);
			}
		});

		 




		});

</script>

<script type="text/javascript">
  $(document).ready(function(){

      $(".reponse").hide();
      $(document).on('click', '.affichier', function(event){
        event.preventDefault();
        $(this).parent().next().slideToggle();

      });

  });
</script>






  </body>
</html>