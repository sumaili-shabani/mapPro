<?php 


defined('BASEPATH') OR exit('No direct script access allowed');  
class home extends CI_Controller
{
		private $token;
		private $connected;
		public function __construct()
		{
		  parent::__construct();
		  if($this->session->userdata('id')) {
			  redirect("user");
		  }
		  if($this->session->userdata('admin_login')) {
		 	 redirect("admin");
		  }
		  if($this->session->userdata('instuctor_login')) {
		  	redirect("entreprise");
		  }
		  $this->load->library('form_validation');
		  $this->load->library('encrypt');
	      $this->load->library('pdf');
		  $this->load->model('crud_model'); 

		  $this->load->helper('url');

		  $this->token = "sk_test_51GzffmHcKfZ3B3C9DATC3YXIdad2ummtHcNgVK4E5ksCLbFWWLYAyXHRtVzjt8RGeejvUb6Z2yUk740hBAviBSyP00mwxmNmP1";
		  $this->connected = $this->session->userdata('id');

		}

		function index(){
			$data['title']="Bienvenue chez nous pour permetre la geolocalisation";
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);
			$this->load->view('frontend/accueil', $data);
		}

		function map_utineraire(){
			$data['title']="Chercher utinairaire pour la localisation";
			$this->load->view('frontend/map_utineraire', $data);
		}

		function map_plus(){
			$data['title']="Paramètrage de map et localisation par utinéraire";
			$this->load->view('frontend/map_plus', $data);
		}

		function accueil(){
			$data['title']="Bienvenue chez nous pour permetre la geolocalisation";
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);
			$this->load->view('frontend/accueil', $data);
		}



		function contact(){
			$data['title']="Contact pour Information";
			$this->load->view('frontend/contact', $data);
		}

		function blog(){
			$data['title']="Blog d'Information au système";
			$this->load->view('frontend/blog', $data);
		}

		function condition(){
			$data['title']="condition et utilisation au système";
			$this->load->view('frontend/condition', $data);
		}

		function contrat(){
			$data['title']="Contrat et terme d'utilisation au système";
			$this->load->view('frontend/contrat', $data);
		}


		function dashbord(){
			$data['title']="mon profile user";
			$this->load->view('frontend/templete', $data);
		}

		function show_formation(){

			$data['title']="Listes des formations";
			$data['categories'] = $this->crud_model->fetch_categores();
			// $data['publicites'] = $this->crud_model->publicite_alleatoire();
			$this->load->view('frontend/show_formation', $data);
		}

		function detail_hopital_profile($param1=''){
			$data['title']="Détail de profile de l'hôpital";
			$data['info'] = $this->crud_model->fetch_info_by_hopopital($param1);
		    $this->load->view('frontend/detail_hopital_profile', $data);
		}

		function publication(){

			$data['title']="Listes des formations";
			$data['categories'] = $this->crud_model->fetch_categores_info();
			$this->load->view('frontend/publication', $data);
		}

		function notification($param1=''){

			$data['info'] = $this->crud_model->fetch_info_by_notification($param1);
			$data['title']		="Listes des formations";
			$data['categories'] = $this->crud_model->fetch_categores_info();
			$this->load->view('frontend/notification', $data);
		}


		function liste_simple(){

			$output = array();
			$query = $this->db->get("ci_providers");
			if ($query->num_rows() > 0) {
				foreach ($query->result_array() as $key) {
					$output [] = $key;
					
				}

				echo(json_encode($output));
			}

		}


		function operation_contact(){

		  	if ($_FILES['user_image']['size'] > 0) {
		 		
		 		$logo = $this->upload_image_fichier_contact_radio();
		 		$insert_data = array(  

			           'nom'           =>     $this->input->post('name'),  
			           'sujet'         =>     $this->input->post("subject"),
			           'email'         =>     $this->input->post("email"),  
			           'message'       =>     $this->input->post("message"),
			           'fichier'       =>     $logo  
			           
				 ); 

		      	$requete=$this->crud_model->insert_contact($insert_data);
		      	echo("Nous vous répondrons dans un instant");	
		 	}
		 	else{
		 		$insert_data = array(  

			           'nom'           =>     $this->input->post('name'),  
			           'sujet'         =>     $this->input->post("subject"),
			           'email'         =>     $this->input->post("email"),  
			           'message'       =>     $this->input->post("message")		           
				 ); 

		      	$requete=$this->crud_model->insert_contact($insert_data);
		      	echo("Nous vous répondrons dans un instant");
		 	}
  
      }

       function upload_image_fichier_contact_radio()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/contact/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  } 



	  // this function receive ajax request and return closest providers
    function closest_locations(){

        $location =json_decode( preg_replace('/\\\"/',"\"",$_POST['data']));
        $lan=$location->longitude;
        $lat=$location->latitude;
        $ServiceId=$location->ServiceId;
        $base = base_url().'home/detail_hopital_profile/';

        // echo("lat:".$lat." log:".$lan." ServiceId:".$ServiceId);

        $providers= $this->crud_model->get_closest_locations($lan,$lat,$ServiceId);
        $indexed_providers = array_map('array_values', $providers);
        // this loop will change retrieved results to add links in the info window for the provider
        $x = 0;
        foreach($indexed_providers as $arrays => &$array){
            foreach($array as $key => &$value){
                if($key === 1){
                    $pieces = explode(",", $value);
                    $value = "$pieces[1]<a href='$base$pieces[0]'>Plus d'informations..</a>";
                }

                $x++;
            }
        }
        echo json_encode($indexed_providers,JSON_UNESCAPED_UNICODE);

    }

    function order_service_two()
    {
        $this->form_validation->set_rules('lat', 'lat', 'trim|required');
        $this->form_validation->set_rules('lng', 'lng', 'trim|required');
        $this->form_validation->set_rules('RequestAddress', 'RequestAddress', 'trim|required');

        if ($this->form_validation->run($this) == FALSE) {
            $data['error'] = validation_errors('
        <div class="alert alert-danger notices errorimg alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert">
         <span aria-hidden="true">×</span><span class="sr-only">Close</span></button>', '</div> ');
            $this->view('content/order_service_two', $data);
        } else {
            print_r($this->input->post());

        }
    }
	 // fin des maps



    	// pagination de formations
	 function pagination_access_formation_to_learn()
	 {

	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->crud_model->fetch_pagination_formation();
	  $config["per_page"] = 4;
	  $config["uri_segment"] = 3;
	  $config["use_page_numbers"] = TRUE;
	  $config["full_tag_open"] = '<ul class="pagination mb-0">';
	  $config["full_tag_close"] = '</ul>';
	  $config["first_tag_open"] = '<li class="page-item">';
	  $config["first_tag_close"] = '</li>';
	  $config["last_tag_open"] = '<li class="page-item">';
	  $config["last_tag_close"] = '</li>';
	  $config['next_link'] = '<li class="page-item active"><i class="btn btn-info">&gt;&gt;</i>';
	  $config["next_tag_open"] = '<li class="page-item">';
	  $config["next_tag_close"] = '</li>';
	  $config["prev_link"] = '<li class="page-item active"><i class="btn btn-info">&lt;&lt;</i>';
	  $config["prev_tag_open"] = "<li class='page-item'>";
	  $config["prev_tag_close"] = "</li>";
	  $config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
	  $config["cur_tag_close"] = "</a></li>";
	  $config["num_tag_open"] = "<li class='page-item'>";
	  $config["num_tag_close"] = "</li>";
	  $config["num_links"] = 1;
	  $this->pagination->initialize($config);
	  $page = $this->uri->segment(3);
	  $start = ($page - 1) * $config["per_page"];

	  $output = array(
	   'pagination_link' => $this->pagination->create_links(),
	   'country_table'   => $this->crud_model->fetch_details_pagination_to_formation_home($config["per_page"], $start)
	  );
	  echo json_encode($output);
	 }


	 // recherche de formations
	 function fetch_search_formation_to_learn()
	 {
		  $output = '';
		  $query = '';
		  if($this->input->post('query'))
		  {
		   $query = $this->input->post('query');
		  }
		  $data = $this->crud_model->fetch_data_search_formation_to_lean($query);
		  
		  if($data->num_rows() > 0)
		  {

		  	  
			   foreach($data->result() as $key)
			   {



			    $output .= '
			       <div class="media text-muted pt-3">

			          	<img data-src="'.base_url().'upload/tbl_info/'.$key->icone.'" alt="32x32" class="mr-2 rounded" style="width: 70px; height: 80px;" src="'.base_url().'upload/tbl_info/'.$key->icone.'" data-holder-rendered="true"> 
			          	
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">'.$key->nomf.'</strong>
				            <i class="fa fa-clock-o"></i>
				           '.substr($key->description, 0,300).'...  '.substr(date(DATE_RFC822, strtotime($key->created_at)), 0, 23).'
				        </p>
				        <div class="pull-right">
				           	<a href="'.base_url().'home/notification/'.$key->code.'" class="btn btn-default btn-sm"><i class="fa fa-slack"></i>voir le détail</a>

			                
			           </div>
				    </div>
			    ';
			   }
		  }
		  else
		  {
		   		$output .= '
		            <div class="media text-muted pt-3">
		                <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 100%; height: auto;" src="data:'.base_url().'upload/annumation/b.gif" srcset="'.base_url().'upload/annumation/b.gif" data-holder-rendered="true">
		                
		              </div>
		        ';
		  }

	  	echo $output;
	 }

	 function view_all_product_by_cat(){
	 	
	 	  $output = '';
		  $query = '';
		  if($this->input->post('brand'))
		  {
		   $query = $this->input->post('brand');
		  }
		  $data = $this->crud_model->fultrage_fetch_data_search_product_to_lean_formation($query);
		  
		  if($data->num_rows() > 0)
		  {


			   foreach($data->result() as $key)
			   {

			   	  



			    $output .= '
			      <div class="media text-muted pt-3">

			          	<img data-src="'.base_url().'upload/tbl_info/'.$key->icone.'" alt="32x32" class="mr-2 rounded" style="width: 70px; height: 80px;" src="'.base_url().'upload/tbl_info/'.$key->icone.'" data-holder-rendered="true"> 
			          	
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">'.$key->nomf.'</strong>
				            <i class="fa fa-clock-o"></i>
				           '.substr($key->description, 0,300).'...  '.substr(date(DATE_RFC822, strtotime($key->created_at)), 0, 23).'
				        </p>
				        <div class="pull-right">
				           	<a href="'.base_url().'home/notification/'.$key->code.'" class="btn btn-default btn-sm"><i class="fa fa-slack"></i>voir le détail</a>

			                
			           </div>
				    </div>

			    ';
			   }
		  }
		  else
		  {
		  		$output .= '
			      <div class="media text-muted pt-3">
			          <img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded" style="width: 100%; height: auto;" src="data:'.base_url().'upload/annumation/a.gif" srcset="'.base_url().'upload/annumation/a.gif" data-holder-rendered="true">
			          
			        </div>
			    ';
		   		// $this->db->pagination_information();
		  }

	  	echo $output;

	 }






















	}




 ?>