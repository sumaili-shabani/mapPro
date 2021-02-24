<?php 

defined('BASEPATH') OR exit('No direct script access allowed');  
class admin extends CI_Controller
{
		private $token;
		private $connected;
		public function __construct()
		{
		  parent::__construct();
		  if(!$this->session->userdata('admin_login'))
		  {
		      	redirect(base_url().'login');
		  }
		  $this->load->library('form_validation');
		  $this->load->library('encrypt');
	      $this->load->library('pdf');
		  $this->load->model('crud_model'); 

		  $this->load->helper('url');

		  $this->token = "sk_test_51GzffmHcKfZ3B3C9DATC3YXIdad2ummtHcNgVK4E5ksCLbFWWLYAyXHRtVzjt8RGeejvUb6Z2yUk740hBAviBSyP00mwxmNmP1";
		  $this->connected = $this->session->userdata('admin_login');

		}



		function index(){
			$data['title']="mon profile admin";
			// $this->load->view('backend/admin/dashbord', $data);

			redirect('admin/statistiques','refresh');
		}


		function map_plus(){
			$data['title']="Paramètrage de map et localisation par utinéraire";
			$this->load->view('backend/admin/map_plus', $data);
		}

		function accueil(){
			$data['title']="mon profile admin";
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);
			$this->load->view('backend/admin/accueil', $data);

		}


		function dashbord(){
			redirect('admin/statistiques','refresh');
		}

		function seting(){
			$data['title']="Paramètrage du site";
			$this->load->view('backend/admin/seting', $data);
		}

		function enfants(){
			$data['title']="Paramètrage des enfants et leurs statuts";
			$this->load->view('backend/admin/enfants', $data);
		}
		function role(){
			$data['title']="Paramètrage de roles";
			$this->load->view('backend/admin/role', $data);
		}

		function category(){

			$data['title']="Paramètrage cétegorie produit";
			$this->load->view('backend/admin/category', $data);
		}

		function category_vaccin(){
			$data['title']="Paramètrage cétegorie de vaccination";
			$this->load->view('backend/admin/category_vaccin', $data);
		}

		function commune(){
			$data['title']="Paramètrage et opérations sur les communes";
			$this->load->view('backend/admin/commune', $data);
		}

		function information(){
			$data['title']="Paramètrage des formations";
			$data['categories'] = $this->crud_model->fetch_categores_info();
			$this->load->view('backend/admin/formation', $data);
		}

		function message($param1=''){
		    $data['id_user']= $param1;
		    $data['title']="Mes messages";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/admin/message', $data);
		}

		function chat_admin($param1, $param2){
		    $data['title']="Discution instantané";
		    $data['id_user']= $param1;
		    $data['id_recever']= $param2;
		    $data['id_recever2']= $param2;
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/admin/messagerie', $data);
		}

		function hopitaux(){
			$data['title']="Paramètrage des hôpitaux";
			$data['categories'] = $this->crud_model->fetch_categores();
			$this->load->view('backend/admin/hopitaux', $data);
		}

		function profile(){

		    $data['title']="Mon profile utilisateur";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/admin/profile', $data);
		}

		function basic(){
		    $data['title']="Information basique";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/admin/basic', $data);
		}

		function contact_info(){
			$data['title']="Les Informations de contact";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/admin/contact_info', $data);
		}


		function basic_image(){
		    $data['title']="Information basique de ma photo";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/admin/basic_image', $data);
		}


		function statistiques(){
		    $data['title']="Information basique de statique sur le système en générale";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/admin/statistiques', $data);
		}

		function basic_secure(){
		    $data['title']="Paramètrage de sécurité de mon compte";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/admin/basic_secure', $data);
		}

		function groupe_user(){
		    $data['title']="Paramètrage de roles";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    // $data['publicites'] = $this->crud_model->publicite_alleatoire();
		    $this->load->view('backend/admin/groupe_user', $data);
		}

		function detail_users_profile($param1=''){

		    $data['title']="Détail de profile utilisateur";
		    $data['user_search'] =$param1;
		    $data['users'] = $this->crud_model->fetch_connected($param1);
		    // $data['publicites'] = $this->crud_model->publicite_alleatoire();
		    $this->load->view('backend/admin/detail_users_profile', $data);

		}

		function apprenant($param1=''){

		    $data['title']="Listes des apprenants  utilisateurs du systèmes";
		    $data['roles'] = $this->crud_model->fetch_roles();
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    // $data['publicites'] = $this->crud_model->publicite_alleatoire();
		    $this->load->view('backend/admin/apprenant', $data);

		}


		function show_formation(){

			$data['title']="Listes des formations";
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);

			// $data['publicites'] = $this->crud_model->publicite_alleatoire();
			$this->load->view('backend/admin/show_formation', $data);
		}

		function publication(){

			$data['title']="Listes des formations";
			$data['categories'] = $this->crud_model->fetch_categores_info();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);

			// $data['publicites'] = $this->crud_model->publicite_alleatoire();
			$this->load->view('backend/admin/publication', $data);
		}

		function vaccination(){
			$data['title']="Listes des formations";
			$data['vaccins'] = $this->crud_model->fetch_vaccin_info();
			$data['enfants'] = $this->crud_model->fetch_enfant_info();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);

			// $data['publicites'] = $this->crud_model->publicite_alleatoire();
			$this->load->view('backend/admin/vaccination', $data);
		}


		function notification($param1=''){

			$data['info'] = $this->crud_model->fetch_info_by_notification($param1);
			$data['title']		="Listes des formations";
			$data['categories'] = $this->crud_model->fetch_categores_info();
			$data['users'] 		= $this->crud_model->fetch_connected($this->connected);
			$this->load->view('backend/admin/notification', $data);
		}

		function detail_hopital_profile($param1=''){
			$data['title']="Détail de profile de l'hôpital";
			$data['info'] = $this->crud_model->fetch_info_by_hopopital($param1);

		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    // $data['publicites'] = $this->crud_model->publicite_alleatoire();
		    $this->load->view('backend/admin/detail_hopital_profile', $data);
		}

		function notification_all(){
		    $data['title']="Mes notifications";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/admin/notification_all', $data);
		}

		function liste_incription(){

			$data['title']="Listes des apprenants inscrits pour les formations";
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);
			// $data['publicites'] = $this->crud_model->publicite_alleatoire();
			$this->load->view('backend/admin/liste_incription', $data);
		}

		function evenement(){
			$data['title']="Ajout des évenements dans le calendrier";
			$this->load->view('backend/admin/evenement', $data);
		}

		function calendrier(){
			$data['title']="Calendrier des activités d'informations";
			$this->load->view('backend/admin/calendrier', $data);
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

		function recherche_liste_simple(){
		  	$query = '';
		  	$output = array();
		  	
			if($this->input->post('query'))
			 {
			   $query = $this->input->post('query');
			 }
			$data = $this->crud_model->fetch_data_search_hospital($query);
		  	if($data->num_rows() > 0) {
				foreach ($data->result_array() as $key) {
					$output [] = $key;
					
				}

				echo(json_encode($output));
			}
		  
		}

		









    // this function receive ajax request and return closest providers
    function closest_locations(){

        $location =json_decode( preg_replace('/\\\"/',"\"",$_POST['data']));
        $lan=$location->longitude;
        $lat=$location->latitude;
        $ServiceId=$location->ServiceId;
        $base = base_url().'admin/detail_hopital_profile/';

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


	// evenement
	function fetch_evenement(){  

           $fetch_data = $this->crud_model->make_datatables_evenement();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                  
                $sub_array[] = nl2br(substr($row->message, 0,50)).'...'; 
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->debit_event)), 0, 23));

				$sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->fin_event)), 0, 23));

				$sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23));
 
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';

                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_evenement(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_evenement(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_evenement()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_evenement($this->input->post('id'));  
           foreach($data as $row)  
           {  
                $output['debit_event'] = $row->debit_event; 
                $output['fin_event']   = $row->fin_event;  
                $output['message'] = $row->message; 
                
           }  
           echo json_encode($output);  
      } 

      function operation_evenement(){

	      $insert_data = array(  
	           'debit_event'    =>     $this->input->post('debit_event'),
	           'fin_event'      =>     $this->input->post('fin_event'),  
	           'message'        =>     $this->input->post("message")
		  );  
	       
	      $requete=$this->crud_model->insert_evenement($insert_data);
	      echo("Ajout publication avec succès avec succès");
	      
      }


      function modification_evenement()
      {
  
          $updated_data = array(  
               'debit_event'    =>     $this->input->post('debit_event'),
               'fin_event'      =>     $this->input->post('fin_event'),   
	           'message'        =>     $this->input->post("message") 
          );  

          $this->crud_model->update_evenement($this->input->post("id"), $updated_data);

          echo("modification avec succès");
      }

      

      function supression_evenement()
      {
 
          $this->crud_model->delete_evenement($this->input->post("id"));

          echo("suppression avec succès");
        
      }

	// fin evenement

	function view_1($param1='', $param2='', $param3=''){
	    
	    if($param1=='display_delete') {

	      $this->db->where('id', $param2);
	      $this->db->delete('notification');
	      redirect('admin/notification_all');
	    }

	    if($param1=='display_delete_message') {

	      $this->db->query("DELETE FROM messagerie WHERE  idmessage='".$param3."'  ");
	      redirect('admin/message/'.$param2);
	      # code...
	    }
	    else{

	    }
	    
	}	


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
	   'country_table'   => $this->crud_model->fetch_details_pagination_to_formation($config["per_page"], $start)
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
				           	<a href="'.base_url().'admin/notification/'.$key->code.'" class="btn btn-default btn-sm"><i class="fa fa-slack"></i>voir le détail</a>

			                
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
				           	<a href="'.base_url().'admin/notification/'.$key->code.'" class="btn btn-default btn-sm"><i class="fa fa-slack"></i>voir le détail</a>

			                
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













	// script des utilisateurs 
    function fetch_users(){  

           $fetch_data = $this->crud_model->make_datatables_users();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->first_name, 0,50)).'...';  
                $sub_array[] = nl2br(substr($row->last_name, 0,50)).'...'; 

                $sub_array[] = nl2br(substr($row->email, 0,50));
 
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  

                 $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';
                
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_users(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_users(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }


      function fetch_users_entreprise(){  

           $fetch_data = $this->crud_model->make_datatables_users_entreprise();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->first_name, 0,50)).'...';  
                $sub_array[] = nl2br(substr($row->last_name, 0,50)).'...'; 

                $sub_array[] = nl2br(substr($row->email, 0,50));
 
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  

                 $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';
                
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_users(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_users(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
    }


    function fetch_single_users()  
    {  
           $output = array();  
           $data = $this->crud_model->fetch_single_users($this->input->post('id'));  
           foreach($data as $row)  
           {  
                $output['first_name'] = $row->first_name;  
                $output['last_name'] = $row->last_name; 

                $output['email'] = $row->email;
                $output['telephone'] = $row->telephone;
                $output['full_adresse'] = $row->full_adresse;
                $output['biographie'] = $row->biographie;
                $output['date_nais'] = $row->date_nais;
                $output['idrole'] = $row->idrole;

                if($row->image != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/photo/'.$row->image.'" class="img-thumbnail" width="200" height="100" /><input type="hidden" name="hidden_user_image" value="'.$row->image.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
    }

    function modification_panel_users(){

      $data = array(
          'first_name'      => $this->input->post('first_name'),
          'last_name'       => $this->input->post('last_name'),
          'telephone'       => $this->input->post('telephone'),
          'full_adresse'    => $this->input->post('full_adresse'),
          'biographie'      => $this->input->post('biographie'),
          'date_nais'       => $this->input->post('date_nais'),
          'email'           => $this->input->post('mail_ok')
      );

      $id_user= $this->connected;
      $query = $this->crud_model->update_crud($this->input->post('id'), $data);
      echo("mise à jour d'information avec succès");
	} 

    function supression_compte_utilisateur(){
    	$this->crud_model->delete_compte_utilisateur($this->input->post("id"));
      	echo("suppression avec succès");
  	}





	// pour les follower
   function pagination_users_on_to()
   {

    $this->load->library("pagination");
    $config = array();
    $config["base_url"] = "#";
    $config["total_rows"] = $this->crud_model->fetch_pagination_ti_followe_count();
    $config["per_page"] = 4;
    $config["uri_segment"] = 3;
    $config["use_page_numbers"] = TRUE;
    $config["full_tag_open"] = '<ul class="pagination">';
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
     'country_table'   => $this->crud_model->fetch_details_pagination_to_users_count($config["per_page"], $start)
    );
    echo json_encode($output);
   }



   // recherche de formations des produits
   function fetch_search_user_follow_pagination()
   {
      $output = '';
      $query = '';
      if($this->input->post('query'))
      {
       $query = $this->input->post('query');
      }
      $data = $this->crud_model->fetch_data_search_online_user_follow($query);
      
      if($data->num_rows() > 0)
      {

        $id = $this->connected;
        $etat = '';
        $etat2 = '';

          foreach($data->result() as $row)
          {

            

           $output .= '
	           
	            <div class="media text-muted pt-3">
					              	
			        <img src="'.base_url().'upload/photo/'.$row->image.'" class="img img-responsive img-circle" style="width: 50px; height: 40px; border-radius: 70%;">

			        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
			            <strong class="d-block text-gray-dark"> <a href="'.base_url().'admin/detail_users_profile/'.$row->id.'" >'.$row->first_name.' '.substr($row->last_name, 0,25).'</a></strong>
			          <san class="text-info">'.$row->email.'</span>

			          <div class="pull-right">
				           	 &nbsp; &nbsp;'.substr($row->biographie, 0,30).' ...
			           </div>
			        </p>
			        
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

    
	function modification_panel($param1='', $param2='', $param3=''){

	    if ($param1="option1") {
	       $data = array(
	          'first_name'        => $this->input->post('first_name'),
	          'last_name'       => $this->input->post('last_name'),
	          'telephone'       => $this->input->post('telephone'),
	          'full_adresse'      => $this->input->post('full_adresse'),
	          'biographie'        => $this->input->post('biographie'),
	          'date_nais'       => $this->input->post('date_nais'),
	          'sexe'          => $this->input->post('sexe'),
	          'email'         => $this->input->post('mail_ok'), 

	          'facebook'        => $this->input->post('facebook'),
	          'linkedin'        => $this->input->post('linkedin'),
	          'twitter'         => $this->input->post('twitter')
	      );

	      $id_user= $this->connected;
	      $query = $this->crud_model->update_crud($id_user, $data);
	      $this->session->set_flashdata('message', 'votre profile a été mis à jour avec succès!!!🆗');
	       redirect('admin/basic', 'refresh');
	    }

	}

	function modification_photo(){

     $id_user= $this->connected;
     if ($_FILES['user_image']['size'] > 0) {
       # code...
        $data = array(
          'image'     => $this->upload_image()
        );
       $query = $this->crud_model->update_crud($id_user, $data);
       $this->session->set_flashdata('message', 'modification avec succès');
           redirect('admin/basic_image', 'refresh');
     }
     else{

        $this->session->set_flashdata('message2', 'Veillez selectionner la photo');
        redirect('admin/basic_image', 'refresh');

     }
     
  }


  function upload_image()  
  {  
       if(isset($_FILES["user_image"]))  
       {  
            $extension = explode('.', $_FILES['user_image']['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/photo/' . $new_name;  
            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
            return $new_name;  
       }  
  }

  function modification_account($param1=''){
       $id_user= $this->connected;
       $first_name;

       $passwords = md5($this->input->post('user_password_ancien'));
       
       $users = $this->db->query("SELECT * FROM users WHERE passwords='".$passwords."' AND id='".$id_user."' ");

       if ($users->num_rows() > 0) {
          
          foreach ($users->result_array() as $row) {
            $first_name = $row['first_name'];
            // echo($first_name);
             $nouveau   =  $this->input->post('user_password_nouveau');
             $confirmer =  $this->input->post('user_password_confirmer');
             if ($nouveau == $confirmer) {
              $new_pass= md5($nouveau);

              $data = array(
                  'passwords'  => $new_pass
                );

                 $query = $this->crud_model->update_crud($id_user, $data);
                 $this->session->set_flashdata('message', 'votre clée de sécurité a été changer avec succès '.$first_name);
                   redirect('admin/basic_secure', 'refresh');

               }
               else{
   
                $this->session->set_flashdata('message2', 'les deux mot de passe doivent être identiques');
                redirect('admin/basic_secure', 'refresh');
               }
         
          }

       }
       else{

          $this->session->set_flashdata('message2', 'information incorecte');
          redirect('admin/basic_secure', 'refresh');
       }
     
  } 




	// script de role
    function fetch_role(){  

           $fetch_data = $this->crud_model->make_datatables_role();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
               
                $sub_array[] = nl2br(substr($row->nom, 0,50)); 
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
               
 
                $sub_array[] = '<button type="button" name="update" idrole="'.$row->idrole.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idrole="'.$row->idrole.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_role(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_role(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_role()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_role($_POST["idrole"]);  
           foreach($data as $row)  
           {  
                $output['nom'] 		= $row->nom;  
                
               
           }  
           echo json_encode($output);  
      }  


      function operation_role(){

          $insert_data = array(  
	           'nom'           	=>     $this->input->post('nom')
		  );  

	      $requete=$this->crud_model->insert_role($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_role(){
  
          $updated_data = array(  
	           'nom'           	=>     $this->input->post('nom')
		  );
  
          $this->crud_model->update_role($this->input->post("idrole"), $updated_data);

          echo("modification avec succès");
      }

      function supression_role(){
 
          $this->crud_model->delete_role($this->input->post("idrole"));
          echo("suppression avec succès");
        
      }

      // script de tbl_info
    function fetch_tbl_info(){  

           $fetch_data = $this->crud_model->make_datatables_tbl_info();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->nom_site, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->email, 0,10)).'...';  
                $sub_array[] = nl2br(substr($row->tel1, 0,10)).'...'; 
                // $sub_array[] = nl2br(substr($row->tel2, 0,5)).'...'; 
                $sub_array[] = nl2br(substr($row->adresse, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->facebook, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->twitter, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->linkedin, 0,10)).'...'; 
                // $sub_array[] = nl2br(substr($row->termes, 0,10)).'...'; 
                // $sub_array[] = nl2br(substr($row->confidentialite, 0,10)).'...'; 
                
 
                $sub_array[] = '<button type="button" name="update" idinfo="'.$row->idinfo.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idinfo="'.$row->idinfo.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_tbl_info(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_tbl_info(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_tbl_info()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_tbl_info($_POST["idinfo"]);  
           foreach($data as $row)  
           {  
                $output['nom_site'] 		= $row->nom_site;  
                $output['adresse'] 			= $row->adresse; 
                $output['tel1'] 			= $row->tel1; 
                $output['tel2'] 			= $row->tel2; 
                $output['email'] 			= $row->email; 
                $output['facebook'] 		= $row->facebook; 
                $output['twitter'] 			= $row->twitter; 
                $output['linkedin'] 		= $row->linkedin;

                $output['termes'] 			= $row->termes;
                $output['confidentialite']  = $row->confidentialite;

                if($row->icone != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->icone.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  


      function operation_tbl_info(){


      	  if($_FILES["user_image"]["size"] > 0)  
          {  
               $insert_data = array(  
		           'nom_site'           	=>     $this->input->post('nom_site'),  
		           'tel1'           		=>     $this->input->post("tel1"), 
		           'tel2'         		    =>     $this->input->post('tel2'), 
		           'adresse'           		=>     $this->input->post("adresse"), 
		           'facebook'           	=>     $this->input->post("facebook"), 
		           'twitter'           		=>     $this->input->post("twitter"),
		           'linkedin'           	=>     $this->input->post("linkedin"), 
		           'email'           		=>     $this->input->post("email"),
		           'termes'           		=>     $this->input->post("termes"),
		           'confidentialite'        =>     $this->input->post("confidentialite"), 
		           'icone'                  =>     $this->upload_image_tbl_info()
			  	);    
          }  
          else  
          {  
               $user_image = "icone-user.png";  
               $insert_data = array(  
		           'nom_site'           	=>     $this->input->post('nom_site'),  
		           'tel1'           		=>     $this->input->post("tel1"), 
		           'tel2'         		    =>     $this->input->post('tel2'), 
		           'adresse'           		=>     $this->input->post("adresse"), 
		           'facebook'           	=>     $this->input->post("facebook"), 
		           'twitter'           		=>     $this->input->post("twitter"),
		           'linkedin'           	=>     $this->input->post("linkedin"), 
		           'email'           		=>     $this->input->post("email"),
		           'termes'           		=>     $this->input->post("termes"),
		           'confidentialite'        =>     $this->input->post("confidentialite"), 
		           'icone'                  =>     $user_image
			  	);   
          }

	      
	       
	      $requete=$this->crud_model->insert_tbl_info($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_tbl_info(){
  
          if($_FILES["user_image"]["size"] > 0)  
          {  
               $updated_data = array(  
		           'nom_site'           	=>     $this->input->post('nom_site'),  
		           'tel1'           		=>     $this->input->post("tel1"), 
		           'tel2'         		    =>     $this->input->post('tel2'), 
		           'adresse'           		=>     $this->input->post("adresse"), 
		           'facebook'           	=>     $this->input->post("facebook"), 
		           'twitter'           		=>     $this->input->post("twitter"),
		           'linkedin'           	=>     $this->input->post("linkedin"), 
		           'email'           		=>     $this->input->post("email"),
		           'termes'           		=>     $this->input->post("termes"),
		           'confidentialite'        =>     $this->input->post("confidentialite"), 
		           'icone'                  =>     $this->upload_image_tbl_info()
			  	);    
          }  
          else  
          {  
               $updated_data = array(  
		           'nom_site'           	=>     $this->input->post('nom_site'),  
		           'tel1'           		=>     $this->input->post("tel1"), 
		           'tel2'         		    =>     $this->input->post('tel2'), 
		           'adresse'           		=>     $this->input->post("adresse"), 
		           'facebook'           	=>     $this->input->post("facebook"), 
		           'twitter'           		=>     $this->input->post("twitter"),
		           'linkedin'           	=>     $this->input->post("linkedin"), 
		           'email'           		=>     $this->input->post("email"),
		           'termes'           		=>     $this->input->post("termes"),
		           'confidentialite'        =>     $this->input->post("confidentialite")
			  	);    
          }
  
          $this->crud_model->update_tbl_info($this->input->post("idinfo"), $updated_data);

          echo("modification avec succès");
      }

      


      function supression_tbl_info(){
 
          $this->crud_model->delete_tbl_info($this->input->post("idinfo"));

          echo("suppression avec succès");
        
      }


     // script pour les hopitaux 
    function fetch_hopitaux(){  

           $fetch_data = $this->crud_model->make_datatables_hopitaux();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->fullname, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->nom, 0,10)).'...';  
                $sub_array[] = nl2br(substr($row->email, 0,10)).'...';  
                $sub_array[] = nl2br(substr($row->adresse, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->lat, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->lng, 0,10)).'...'; 
                $sub_array[] = nl2br(substr($row->telephone, 0,10)).'...'; 
                
 
                $sub_array[] = '<button type="button" name="update" user_id="'.$row->user_id.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" user_id="'.$row->user_id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_hopitaux(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_hopitaux(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_hopitaux()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_hopitaux($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                $output['fullname'] 		= $row->fullname;  
                $output['adresse'] 			= $row->adresse; 
                $output['telephone'] 		= $row->telephone; 
                $output['site_web'] 		= $row->site_web; 
                $output['lat'] 				= $row->lat; 
                $output['lng'] 				= $row->lng; 
                $output['email'] 			= $row->email; 
                $output['description'] 		= $row->description;
                $output['site_web'] 		= $row->site_web;

                $output['service_id'] 			= $row->service_id;

                if($row->icone != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->icone.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  


      function operation_hopitaux(){


      	  if($_FILES["user_image"]["size"] > 0)  
          {  
               $insert_data = array(  
		           'fullname'           		=>     $this->input->post('fullname'),  
		           'telephone'           		=>     $this->input->post("telephone"), 
		           'adresse'         		    =>     $this->input->post('adresse'), 
		           'description'           		=>     $this->input->post("description"), 
		           'lat'           				=>     $this->input->post("lat"), 
		           'lng'           				=>     $this->input->post("lng"),
		           'email'           			=>     $this->input->post("email"),
		           'service_id'           		=>     $this->input->post("service_id"),
		           'site_web'        			=>     $this->input->post("site_web"), 
		           'icone'                  	=>     $this->upload_image_tbl_info()
			  	);    
          }  
          else  
          {  
               $user_image = "logo.jpg";  
               $insert_data = array(  
		           'fullname'           		=>     $this->input->post('fullname'),  
		           'telephone'           		=>     $this->input->post("telephone"), 
		           'adresse'         		    =>     $this->input->post('adresse'), 
		           'description'           		=>     $this->input->post("description"), 
		           'lat'           				=>     $this->input->post("lat"), 
		           'lng'           				=>     $this->input->post("lng"),
		           'email'           			=>     $this->input->post("email"),
		           'service_id'           		=>     $this->input->post("service_id"),
		           'site_web'        			=>     $this->input->post("site_web"), 
		           'icone'                  	=>     $user_image
			  	);   
          }

	      
	       
	      $requete=$this->crud_model->insert_hopitaux($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_hopitaux(){
  
          if($_FILES["user_image"]["size"] > 0)  
          {  
               $updated_data = array(  
		           'fullname'           		=>     $this->input->post('fullname'),  
		           'telephone'           		=>     $this->input->post("telephone"), 
		           'adresse'         		    =>     $this->input->post('adresse'), 
		           'description'           		=>     $this->input->post("description"), 
		           'lat'           				=>     $this->input->post("lat"), 
		           'lng'           				=>     $this->input->post("lng"),
		           'email'           			=>     $this->input->post("email"),
		           'service_id'           		=>     $this->input->post("service_id"),
		           'site_web'        			=>     $this->input->post("site_web"), 
		           'icone'                  	=>     $this->upload_image_tbl_info()
			  	);    
          }  
          else  
          {  
               $updated_data = array(  
		           'fullname'           		=>     $this->input->post('fullname'),  
		           'telephone'           		=>     $this->input->post("telephone"), 
		           'adresse'         		    =>     $this->input->post('adresse'), 
		           'description'           		=>     $this->input->post("description"), 
		           'lat'           				=>     $this->input->post("lat"), 
		           'lng'           				=>     $this->input->post("lng"),
		           'email'           			=>     $this->input->post("email"),
		           'service_id'           		=>     $this->input->post("service_id"),
		           'site_web'        			=>     $this->input->post("site_web"), 
			  	);    
          }
  
          $this->crud_model->update_hopitaux($this->input->post("user_id"), $updated_data);

          echo("modification avec succès");
      }

      


      function supression_hopitaux(){
 
          $this->crud_model->delete_hopitaux($this->input->post("user_id"));

          echo("suppression avec succès");
        
      }

      // fin de  scripts hopitaux



      // script de category
    function fetch_category(){  

           $fetch_data = $this->crud_model->make_datatables_category();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
               
                $sub_array[] = nl2br(substr($row->nom, 0,50)); 
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
               
 
                $sub_array[] = '<button type="button" name="update" idcat="'.$row->idcat.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idcat="'.$row->idcat.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_category(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_category(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_category()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_category($_POST["idcat"]);  
           foreach($data as $row)  
           {  
                $output['nom'] 		= $row->nom;  
                
               
           }  
           echo json_encode($output);  
      }  


      function operation_category(){

          $insert_data = array(  
	           'nom'           	=>     $this->input->post('nom')
		  );  

	      $requete=$this->crud_model->insert_category($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_category(){
  
          $updated_data = array(  
	           'nom'           	=>     $this->input->post('nom')
		  );
  
          $this->crud_model->update_category($this->input->post("idcat"), $updated_data);

          echo("modification avec succès");
      }

      function supression_category(){
 
          $this->crud_model->delete_category($this->input->post("idcat"));
          echo("suppression avec succès");
        
      }


       // script de category
    function fetch_category_info(){  

           $fetch_data = $this->crud_model->make_datatables_category_info();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
               
                $sub_array[] = nl2br(substr($row->nom, 0,50)); 
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
               
 
                $sub_array[] = '<button type="button" name="update" idcat="'.$row->idcat.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idcat="'.$row->idcat.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_category_info(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_category_info(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_category_info()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_category_info($_POST["idcat"]);  
           foreach($data as $row)  
           {  
                $output['nom'] 		= $row->nom;  
                
               
           }  
           echo json_encode($output);  
      }  


      function operation_category_info(){

          $insert_data = array(  
	           'nom'           	=>     $this->input->post('nom')
		  );  

	      $requete=$this->crud_model->insert_category_info($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_category_info(){
  
          $updated_data = array(  
	           'nom'           	=>     $this->input->post('nom')
		  );
  
          $this->crud_model->update_category_info($this->input->post("idcat"), $updated_data);

          echo("modification avec succès");
      }

      function supression_category_info(){
 
          $this->crud_model->delete_category_info($this->input->post("idcat"));
          echo("suppression avec succès");
        
      }

	  // fin de sript parametrage 


	 // script de categorie des vaccins
    function fetch_category_vaccin(){  

           $fetch_data = $this->crud_model->make_datatables_category_vaccin();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
               
                $sub_array[] = nl2br(substr($row->designation, 0,30)); 
                $sub_array[] = nl2br(substr($row->categorie, 0,30));
                $sub_array[] = nl2br(substr($row->periode, 0,30));
                
 
                $sub_array[] = '<button type="button" name="update" idv="'.$row->idv.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idv="'.$row->idv.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_category_vaccin(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_category_vaccin(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_category_vaccin()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_category_vaccin($_POST["idv"]);  
           foreach($data as $row)  
           {  
                $output['designation'] 		= $row->designation;
                $output['categorie'] 		= $row->categorie; 
                $output['periode'] 			= $row->periode;   
               
           }  
           echo json_encode($output);  
      }  


      function operation_category_vaccin(){

          $insert_data = array(  
	           'designation'           	=>     $this->input->post('designation'),
	           'categorie'           	=>     $this->input->post('categorie'),
	           'periode'           		=>     $this->input->post('periode')
		  );  

	      $requete=$this->crud_model->insert_category_vaccin($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_category_vaccin(){
  
          $updated_data = array(  
	           'designation'           	=>     $this->input->post('designation'),
	           'categorie'           	=>     $this->input->post('categorie'),
	           'periode'           		=>     $this->input->post('periode')
		  );
  
          $this->crud_model->update_category_vaccin($this->input->post("idv"), $updated_data);

          echo("modification avec succès");
      }

      function supression_category_vaccin(){
 
          $this->crud_model->delete_category_vaccin($this->input->post("idv"));
          echo("suppression avec succès");
        
      }

	  // fin de sript parametrage categorie des vaccins



	  // script de categorie des vaccination
    function fetch_category_vaccination(){  

           $fetch_data = $this->crud_model->make_datatables_category_vaccination();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array(); 

                $sub_array[] = nl2br(substr($row->categorie, 0,30));
                $sub_array[] = nl2br(substr($row->nom, 0,30));
                $sub_array[] = nl2br(substr($row->sexe, 0,30));
                $sub_array[] = nl2br(substr($row->designation, 0,30)); 
                
                $sub_array[] = nl2br(substr($row->periode, 0,30));

                $sub_array[] = nl2br(substr($row->annee, 0,30));

                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23));
                
 
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_category_vaccination(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_category_vaccination(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_category_vaccination()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_category_vaccination($_POST["id"]);  
           foreach($data as $row)  
           {  
                $output['designation'] 		= $row->designation;
                $output['categorie'] 		= $row->categorie; 
                $output['periode'] 			= $row->periode;

                $output['nom'] 			= $row->nom;
                $output['idv'] 			= $row->idv;
                $output['ide'] 			= $row->ide;   
               
           }  
           echo json_encode($output);  
      }  


      function operation_category_vaccination(){

      	  $annee = date('Y');
          $insert_data = array(  
	           'ide'           	=>     $this->input->post('ide'),
	           'idv'           	=>     $this->input->post('idv'),
	           'annee'          =>     $annee
		  );  

	      $requete=$this->crud_model->insert_category_vaccination($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_category_vaccination(){
  		  
  		  $annee = date('Y');
          $updated_data = array(  
	           'ide'           	=>     $this->input->post('ide'),
	           'idv'           	=>     $this->input->post('idv'),
	           'annee'          =>     $annee
		  );
  
          $this->crud_model->update_category_vaccination($this->input->post("id"), $updated_data);

          echo("modification avec succès");
      }

      function supression_category_vaccination(){
 
          $this->crud_model->delete_category_vaccination($this->input->post("id"));
          echo("suppression avec succès");
        
      }

	  // fin de sript parametrage categorie des vaccination


	// script de categorie des enfants
    function fetch_category_enfant(){  

           $fetch_data = $this->crud_model->make_datatables_category_enfant();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
               
                $sub_array[] = nl2br(substr($row->nom, 0,30)); 
                $sub_array[] = nl2br(substr($row->nomdupere, 0,30));
                $sub_array[] = nl2br(substr($row->nomdelamere, 0,30));
                $sub_array[] = nl2br(substr($row->date_nais, 0,30));
                $sub_array[] = nl2br(substr($row->sexe, 0,30));
                $sub_array[] = nl2br(substr($row->telephone, 0,30));
                $sub_array[] = nl2br(substr($row->adresse, 0,30));
                $sub_array[] = nl2br(substr($row->nationnalite, 0,30));
                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23));
                
 
                $sub_array[] = '<button type="button" name="update" ide="'.$row->ide.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" ide="'.$row->ide.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_category_enfant(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_category_enfant(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_category_enfant()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_category_enfant($_POST["ide"]);  
           foreach($data as $row)  
           {  
                $output['nom'] 					= $row->nom;
                $output['nomdupere'] 			= $row->nomdupere; 
                $output['nomdelamere'] 			= $row->nomdelamere;
                $output['date_nais'] 			= $row->date_nais;
                $output['adresse'] 				= $row->adresse;
                $output['telephone'] 			= $row->telephone;
                $output['nationnalite'] 		= $row->nationnalite;  
               
           }  
           echo json_encode($output);  
      }  


      function operation_category_enfant(){

          $insert_data = array(  
	           'nom'           			=>     $this->input->post('nom'),
	           'nomdupere'           	=>     $this->input->post('nomdupere'),
	           'nomdelamere'           	=>     $this->input->post('nomdelamere'),
	           'date_nais'           	=>     $this->input->post('date_nais'),
	           'adresse'           		=>     $this->input->post('adresse'),
	           'telephone'           	=>     $this->input->post('telephone'),
	           'nationnalite'          	=>     $this->input->post('nationnalite'),
	           'sexe'          			=>     $this->input->post('sexe')
		  );  

	      $requete=$this->crud_model->insert_category_enfant($insert_data);
	      echo("Ajout information avec succès");
	      
      }

      function modification_category_enfant(){
  
          $updated_data = array(  
	           'nom'           			=>     $this->input->post('nom'),
	           'nomdupere'           	=>     $this->input->post('nomdupere'),
	           'nomdelamere'           	=>     $this->input->post('nomdelamere'),
	           'date_nais'           	=>     $this->input->post('date_nais'),
	           'adresse'           		=>     $this->input->post('adresse'),
	           'telephone'           	=>     $this->input->post('telephone'),
	           'nationnalite'          	=>     $this->input->post('nationnalite'),
	           'sexe'          			=>     $this->input->post('sexe')
		  );
  
          $this->crud_model->update_category_enfant($this->input->post("ide"), $updated_data);

          echo("modification avec succès");
      }

      function supression_category_enfant(){
 
          $this->crud_model->delete_category_enfant($this->input->post("ide"));
          echo("suppression avec succès");
        
      }

	  // fin de sript parametrage categorie des enfants




	   // script de formation
    function fetch_formation(){  

           $fetch_data = $this->crud_model->make_datatables_formation();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = nl2br(substr($row->nomf, 0,15)).'...'; 
                $sub_array[] = nl2br(substr($row->description, 0,25)).'...';  
                $sub_array[] = nl2br(substr($row->nom, 0,10)).'...';

                $sub_array[] = nl2br(substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23)); 
                

                $sub_array[] = '<button type="button" name="update" idformation="'.$row->idformation.'" class="btn btn-warning btn-xs update"><i class="fa fa-edit"></i></button>';  
                $sub_array[] = '<button type="button" name="delete" idformation="'.$row->idformation.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_formation(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_formation(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_formation()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_formation($_POST["idformation"]);  
           foreach($data as $row)  
           {  
                $output['nomf'] 		= $row->nomf;  
                $output['nom'] 			= $row->nom; 
                $output['idcat'] 			= $row->idcat; 
                $output['description'] 			= $row->description; 
                
                if($row->icone != '')  
                {  
                     $output['user_image'] = '<img src="'.base_url().'upload/tbl_info/'.$row->icone.'" class="img-thumbnail" width="70" height="70" /><input type="hidden" name="hidden_user_image" value="'.$row->icone.'" />';  
                }  
                else  
                {  
                     $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  


      function operation_formation(){

      	  $code = substr(md5(rand(100000000, 200000000)), 0, 15);

      	  if($_FILES["user_image"]["size"] > 0)  
          {  
               $insert_data = array(  
		           'nomf'           		=>     $this->input->post('nomf'),  
		           'idcat'           		=>     $this->input->post("idcat"), 
		           'description'         	=>     $this->input->post('description'), 
		           'icone'                  =>     $this->upload_image_tbl_info(),
		           'code'                   =>     $code
			  	);    
          }  
          else  
          {  
               $user_image = "icone-user.png";  
               $insert_data = array(  
		           'nomf'           		=>     $this->input->post('nomf'),  
		           'idcat'           		=>     $this->input->post("idcat"), 
		           'description'         	=>     $this->input->post('description'),  
		           'icone'                  =>     $user_image,
		           'code'                   =>     $code
			  	);   
          }

           $requete=$this->crud_model->insert_formation($insert_data);
	      echo("Ajout information avec succès");


	        $users_cool = $this->crud_model->get_info_user();
	        foreach ($users_cool as $key) {

	      		if ($key['idrole'] == 1) {
	              $url ="admin/notification/".$code;
	            }
	            elseif ($key['idrole'] == 2) {
	              $url ="user/notification/".$code;
	            }
	            elseif($key['idrole'] == 3){
	              $url ="entreprise/notification/".$code;
	            }
	            else{
	              $url ="user/notification/".$code;
	            }

	            $id_user_recever = $key['id'];

	            $nom   = $this->crud_model->get_name_user($key['id']);
	    		$message ="salut ".$nom." vous a avez peut être raté une publication";

	    		$notification = array(
	              'titre'   	=>    "nouvelle information",
	              'icone'   	=>    "fa fa-bell",
	              'message' 	=>     $message,
	              'url'     	=>     $url,
	              'id_user' 	=>     $id_user_recever
	            );
	            $not = $this->crud_model->insert_notification($notification);
	      		# code...
	      	}

	     
	      
      }

      function modification_formation(){
  
          if($_FILES["user_image"]["size"] > 0)  
          {  
               $updated_data = array(  
		           'nomf'           		=>     $this->input->post('nomf'),  
		           'idcat'           		=>     $this->input->post("idcat"), 
		           'description'         	=>     $this->input->post('description'),
		           'icone'                  =>     $this->upload_image_tbl_info()
			  	);    
          }  
          else  
          {  
               $updated_data = array(  
		           'nomf'           		=>     $this->input->post('nomf'),  
		           'idcat'           		=>     $this->input->post("idcat"), 
		           'description'         	=>     $this->input->post('description')
			  	);    
          }
  
          $this->crud_model->update_formation($this->input->post("idformation"), $updated_data);

          echo("modification avec succès");
      }

      


      function supression_formation(){
 
          $this->crud_model->delete_formation($this->input->post("idformation"));
          echo("suppression avec succès");
        
      }


    function inscription_aux_formations(){
		
		    $annee = date('Y');
			$iduser = $this->input->post('iduser');
			$idformation = $this->input->post('idformation');

			$veryfication = $this->crud_model->verification_formation($annee,$iduser,$idformation);
			if ($veryfication->num_rows()) {
				# cod.e..
				echo("Désolé!!!!!! vous êtes déjà inscrit pour cette formation");
			}
			else{

				$data= array(
					'iduser'		=>	$this->input->post('iduser'),
					'idformation'	=>	$this->input->post('idformation'),
					'annee'			=>	$annee
				);

				$this->crud_model->inscription_formation($data);
				echo("votre inscription a reussie avec succès");

			}

		
	}


	function operation_formateur($param1='', $param2=''){
		  
  		  if ($param1=="suppression_apprenant_alaformation") {
  		  	$query = $this->crud_model->delete_apprenant_to_formation($param2);
  		  	$this->session->set_flashdata('message', 'suppression avec succès');
  		  	redirect('admin/liste_incription');
  		  }

	}

	function imprimer_liste($idformation='',$annee=''){

		if($this->uri->segment(3))
	    {
	     $customer_id = $this->uri->segment(3);
	     $html_content = '<h3 align="center">Liste des apprenants inscrits à la formtion</h3>';
	     $html_content .= $this->crud_model->fetch_single_details_inscription_apprenants($idformation, $annee);
	     $this->pdf->loadHtml($html_content);
	     $this->pdf->render();
	     $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));
	    }

	}

	function filter_liste_incription(){
		$data['title']			="liste des projets";
		$data['annee']			= $this->input->post('annee');
		$data['nomformation']	= $this->input->post('nomformation');
		$this->load->view('backend/admin/filter_liste_incription', $data);
	}



	// ajout des contacts
	  function fetch_contact(){  

           $fetch_data = $this->crud_model->make_datatables_contact();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  

	           	if ($row->fichier != '') {
	           		$etat = '<a href="'.base_url().'upload/contact/'.$row->fichier.'" class="badge badge-white"><i class="fa fa-file"></i></a>';
	           	}
	           	else{
	           		$etat = '';
	           	}

                $sub_array = array();

                $sub_array[] = '
                <input type="checkbox" class="delete_checkbox" value="'.$row->email.'" />
                ';  
                  
                $sub_array[] = nl2br(substr($row->nom, 0,20)).'...';  
                $sub_array[] = nl2br(substr($row->sujet, 0,20)).'...'; 
                $sub_array[] = $row->email; 
                $sub_array[] = nl2br(substr($row->message, 0,50)).'...';
                $sub_array[] = substr(date(DATE_RFC822, strtotime($row->created_at)), 0, 23);

                $sub_array[] = $etat; 

                $sub_array[] = '<button type="button" name="delete" idcontact="'.$row->id.'" class="btn btn-warning btn-xs update"><i class="fa fa-comment-o"></i></button>'; 
  
                $sub_array[] = '<button type="button" name="delete" idcontact="'.$row->id.'" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"></i></button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                =>     intval($_POST["draw"]),  
                "recordsTotal"        =>     $this->crud_model->get_all_data_contact(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data_contact(),  
                "data"                =>     $data  
           );  
           echo json_encode($output);  
      }

      function fetch_single_contact()  
      {  
           $output = array();  
           $data = $this->crud_model->fetch_single_contact($this->input->post('idcontact'));  
           foreach($data as $row)  
           {  
                $output['nom'] = $row->nom;  
                $output['message'] = $row->message;
                $output['email'] = $row->email;
                $output['sujet'] = $row->sujet; 
 
           }  
           echo json_encode($output);  
      } 

      function operation_contact(){

	      $insert_data = array(  
	           'nom'          =>     $this->input->post('name'),  
	           'sujet'       =>     $this->input->post("subject"),
	           'email'         =>     $this->input->post("email"),  
	           'message'       =>     $this->input->post("message")  
	           
		  );  
	       
	      $requete=$this->crud_model->insert_contact($insert_data);
	      echo("Ajout message  avec succès");
	      
      }

      
      function supression_contact()
      {
 
          $this->crud_model->delete_contact($this->input->post("idcontact"));

          echo("suppression avec succès");
        
      }

	  // fin projets

	  function infomation_par_mail()
     {
        if($this->input->post('checkbox_value'))
        {
           $id = $this->input->post('checkbox_value');
           for($count = 0; $count < count($id); $count++)
           {
               
                $mail    = $id[$count];
                $website = "whitefondation@gmail.com";

                $to =$id[$count];
                $subject = $this->input->post('sujet');
                $message2 = $this->input->post('message');
                 

                $headers= "MIME Version 1.0\r\n";
                $headers .= "Content-type: text/html; charset=UTF-8\r\n";
                $headers .= "From: no-reply@whitefondation.com" . "\r\n" ."Reply-to: sumailiroger681@gmail.com"."\r\n"."X-Mailer: PHP/".phpversion();

                mail($to,$subject,$message2,$headers);

           }

           if(mail($to,$subject,$message2,$headers) > 0){
                echo("message envoyé avec succès");
           } 
           else {
                echo("échec lors de l'envoie de message!!!!!!!!!!!!");
           }


        }
     }

     function impression_pdf_vaccin(){

     	 $customer_id = "liste de vaccins";
	     $html_content = '<h3 align="center">Liste des  vaccins</h3>';
	     $html_content .= $this->crud_model->fetch_single_details_inscription_apprenants_ok();
	     $this->pdf->loadHtml($html_content);
	     $this->pdf->render();
	     $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));

     }

     function impression_pdf_enfant_vaccin(){

     	 $customer_id = "liste des enfants admis à la vaccination";
	     $html_content = '<h3 align="center">liste des enfants admis à la vaccination</h3>';
	     $html_content .= $this->crud_model->fetch_single_details_inscription_enfant();
	     $this->pdf->loadHtml($html_content);
	     $this->pdf->render();
	     $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));

     }


     function impression_pdf_vaccination_suivu(){

     	 $customer_id = "liste de calendrier vacinal suivu par les enfants";
	     $html_content = '<h3 align="center">liste de calendrier vacinal suivu par les enfants</h3>';
	     $html_content .= $this->crud_model->fetch_single_details_inscription_enfant_calendrier();
	     $this->pdf->loadHtml($html_content);
	     $this->pdf->render();
	     $this->pdf->stream("".$customer_id.".pdf", array("Attachment"=>0));

     }




















      function upload_image_tbl_info()  
	  {  
	       if(isset($_FILES["user_image"]))  
	       {  
	            $extension = explode('.', $_FILES['user_image']['name']);  
	            $new_name = rand() . '.' . $extension[1];  
	            $destination = './upload/tbl_info/' . $new_name;  
	            move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);  
	            return $new_name;  
	       }  
	  }


	  function chat_local_view($param1, $param2){
	    $data['title']="Discution instantané";
	    $data['id_user']= $param1;
	    $data['id_recever']= $param2;

	    $code = substr(md5(rand(100000000, 200000000)), 0, 10);

	    if ($this->input->post('Message_text') !='') {

	      $chat['id_user'] = $param1;
	      $chat['id_recever'] = $param2;
	      $chat['message'] = $this->input->post('Message_text');
	      $chat['code'] = $code;

	      $md5 = md5(date('d-m-y H:i:s'));


	      
	      if($_FILES['user_image']['size'] > 0){

	        $chat['fichier'] =  $md5.str_replace(' ', '', $_FILES['user_image']['name']);

	              // $chat['fichier'] = $this->upload_image_chat_envoie();
	              move_uploaded_file($_FILES['user_image']['tmp_name'], 'upload/groupe/fichier/' . $md5.str_replace(' ', '', $_FILES['user_image']['name']));
	      }

	      $this->crud_model->insert_message($chat);
	      
	      redirect('admin/chat_admin/'.$param1.'/'.$param2);
	    }
	    else{
	      redirect('admin/chat_admin/'.$param1.'/'.$param2);
	    }
	    
	    
	  }


	  // pagination information sur les produits
     function pagination_users_on_line()
   {

    $this->load->library("pagination");
    $config = array();
    $config["base_url"] = "#";
    $config["total_rows"] = $this->crud_model->fetch_pagination_online();
    $config["per_page"] = 6;
    $config["uri_segment"] = 3;
    $config["use_page_numbers"] = TRUE;
    $config["full_tag_open"] = '<ul class="pagination">';
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
     'country_table'   => $this->crud_model->fetch_details_pagination_online_connected($config["per_page"], $start)
    );
    echo json_encode($output);
   }



   // recherche de formations des produits
   function fetch_search_user_online_pagination2()
   {
      $output = '';
      $query = '';
      if($this->input->post('query'))
      {
       $query = $this->input->post('query');
      }
      $data = $this->crud_model->fetch_data_search_online_user($query);
      
      if($data->num_rows() > 0)
      {

        $id = $this->connected;
        $etat = '';

         foreach($data->result() as $row)
         {

          if ($row->id != $id) {
              $etat = '<span class="message">
                <a href="'.base_url().'admin/chat_admin/'.$id.'/'.$row->id.'">
              &nbsp;&nbsp;<i class="fa fa-comments-o"></i> message
                  </a> 
                </span>';
            }
            else{

              $etat = '

              <span class="message">
                <a href="'.base_url().'admin/detail_users_profile/'.$row->id.'" class="text-warning">
              &nbsp;&nbsp;<i class="fa fa-user"></i> profile
                  </a> 
                </span>

              ';

              
            }



          $output .= '

           <li class="online">
                <a href="'.base_url().'admin/detail_users_profile/'.$row->id.'">
                    <div class="media">
                        <div class="avtar-pic w35 bg-red">
                          <span>
                          <img src="'.base_url().'upload/photo/'.$row->image.'" class="img img-responsive img-circle" style="width: 50px; height: 40px; border-radius: 70%;">
                            </span>
                        </div>

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                              <span class="name text-info">&nbsp;&nbsp;@'.$row->first_name.' '.substr($row->last_name, 0,25).' </span><br>
                            '.$etat.'
                              
                            </span>
                            
                        </div>

                        
                    </div>
                </a>
            </li>
            <hr>
           

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
          // $this->db->pagination_information();
      }

      echo $output;
   }


















}



 ?>