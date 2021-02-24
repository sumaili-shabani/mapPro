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
        

      <div class="col-md-12" style="margin-top: 10px;">
        <div class="row">
          <div class="col-md-12">

            <!-- les scripts commencent -->
            <div class="row">
              <div class="col-md-3">

                <div class="list-group">
                  <div class="list-group-item">

                    <div class="input-group mb-3">
                
                      <input type="search" name="recherche" id="search_text" class="form-control search_text" placeholder="Rechercher...">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                      </div>
                    </div>

                    </div>
                    <?php 
                    if ($categories->num_rows() > 0) {
                      
                      foreach ($categories->result_array() as $key) {
                        ?>
                        
                        <div class="list-group-item checkbox">
                          <label>
                            <input type="checkbox" name="common_selector brand" class="common_selector brand" value="<?php echo($key['idcat']) ?>"> 
                            <?php echo($key['nom']) ?>
                          </label>
                        </div>


                        <?php
                      }
                    }
                    else{

                      ?>
                      <div class="alert alert-danger" style="background: white;">Aucune catégorie n'est diponible</div>
                      <?php
                    }
                    ?>

                           
                </div>

                
              </div>
              
              <div class="col-md-9">

                <!-- debut -->

                  <div class="col-md-12">
                    
                    <div class="row col-md-12 col-lg-12 col-sm-12" class="resultat_pagination" id="country_table">

                    	<div class="col-md-12">

                    	  <?php 

                    	  $output ='';

                    	  foreach($info as $key)
					      {

					       $output .= '
					       
					        <div class="media text-muted pt-3">

					          	<img data-src="'.base_url().'upload/tbl_info/'.$key->icone.'" alt="32x32" class="mr-2 rounded" style="width: 150px; height: 150px;" src="'.base_url().'upload/tbl_info/'.$key->icone.'" data-holder-rendered="true"> 
					          	
						        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
						            <strong class="d-block text-gray-dark">'.$key->nomf.'</strong>
						            <i class="fa fa-clock-o"></i>
						           <span>
						           '.$key->description.'...
						           </span>  

						           '.substr(date(DATE_RFC822, strtotime($key->created_at)), 0, 23).'
						        </p>
						        
						    </div>
						             
					       ';
					      }

					      echo($output);

                          ?>
                    		
                    	</div>
                  
                    </div>
                    <!-- pagination resultat -->
                    <div class="col-lg-12 col-sm-12 col-md-12" style="margin-top: 10px;">
                      <div class="row">
                        <div class="col-md-2">
                         
                        </div>
                        <div class="col-md-8">
                          <div align="center" class="pagination" id="pagination_link">
                            
                          </div>
                        </div>
                        <div class="col-md-2"></div>
                      </div>
                    </div>
                    <!-- fin pagination -->


                  </div>
                  <!-- fin  -->
                
              </div>
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

      <script>
$(document).ready(function(){

 function load_country_data(page)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>home/pagination_access_formation_to_learn/"+page,
   method:"GET",
   dataType:"json",
   success:function(data)
   {
    $('#country_table').html(data.country_table);
    $('#pagination_link').html(data.pagination_link);
   }
  });
 }
 
 // load_country_data(1);

 $(document).on("click", ".pagination li a", function(event){
  event.preventDefault();
  var page = $(this).data("ci-pagination-page");
  load_country_data(page);
 });


 function load_data(query)
 {
    $.ajax({
     url:"<?php echo base_url(); ?>home/fetch_search_formation_to_learn",
     method:"POST",
     data:{query:query},
     success:function(data){
      $('#country_table').html(data);
     }
    });
  }

 $(document).on('keyup','.search_text',function(){
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


 $(document).on('click','.voir_plus', function(e){
  e.preventDefault();
  var idformation = $(this).attr('idformation');
  $.ajax({
    url: "<?php echo base_url(); ?>home/view_fetch_search_auditor_one",
    method:"POST",
    data:{
      idformation: idformation
    },
    success: function(data){
      $('#resultat_2').html(data);
    }
  });
  // alert(id_info);
 });


$(document).on('click','.brand', function(){
  
  var brand= $(this).val();
  // alert("band "+brand);

  $.ajax({
    url:"<?php echo base_url(); ?>home/view_all_product_by_cat",
    method: "POST",
    data:{
      brand: brand
    },
    success: function(data){
      $('#country_table').html(data);
    }
  });
  
});

});

</script>


  </body>
</html>