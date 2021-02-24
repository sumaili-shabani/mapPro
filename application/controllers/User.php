<?php 


defined('BASEPATH') OR exit('No direct script access allowed');  
class user extends CI_Controller
{
		private $token;
		private $connected;
		public function __construct()
		{
		  parent::__construct();
		  if(!$this->session->userdata('id'))
		  {
		      	redirect(base_url().'login');
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
			$data['title']="Mon profile utilisateur";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/user/profile', $data);
		}

		

		function contact(){
			$data['title']="Contact pour Information";
			$this->load->view('backend/user/contact', $data);
		}


		function blog(){
			$data['title']="Blog d'Information au système";
			$this->load->view('backend/user/blog', $data);
		}

		function condition(){
			$data['title']="condition et utilisation au système";
			$this->load->view('backend/user/condition', $data);
		}

		function contrat(){
			$data['title']="Contrat et terme d'utilisation au système";
			$this->load->view('backend/user/contrat', $data);
		}


		function map_plus(){
			$data['title']="Paramètrage de map et localisation par utinéraire";
			$this->load->view('backend/user/map_plus', $data);
		}


		function dashbord(){
			$data['title']="mon profile user";
			// $this->load->view('backend/user/templete', $data);
			redirect('user/profile','refresh');
		}


		function detail_users_profile($param1=''){

		    $data['title']="Détail de profile utilisateur";
		    $data['user_search'] =$param1;
		    $data['users'] = $this->crud_model->fetch_connected($param1);
		    // $data['publicites'] = $this->crud_model->publicite_alleatoire();
		    $this->load->view('backend/user/detail_users_profile', $data);

		}

		function message($param1=''){
		    $data['id_user']= $param1;
		    $data['title']="Mes messages";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/user/message', $data);
		}


		function notification_all(){
		    $data['title']="Mes notifications";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/user/notification_all', $data);
		}

		function notification($param1=''){

			$data['info'] = $this->crud_model->fetch_info_by_notification($param1);
			$data['title']		="Listes des formations";
			$data['categories'] = $this->crud_model->fetch_categores_info();
			$data['users'] 		= $this->crud_model->fetch_connected($this->connected);
			$this->load->view('backend/user/notification', $data);
		}

		function calendrier(){
			$data['title']="Calendrier des activités d'informations";
			$this->load->view('backend/user/calendrier', $data);
		}

		function publication(){

			$data['title']="Listes des formations";
			$data['categories'] = $this->crud_model->fetch_categores_info();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);
			$this->load->view('backend/user/publication', $data);
		}

		function accueil(){
			$data['title']="mon profile admin";
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);
			$this->load->view('backend/user/accueil', $data);

		}

		function detail_hopital_profile($param1=''){
			$data['title']="Détail de profile de l'hôpital";
			$data['info'] = $this->crud_model->fetch_info_by_hopopital($param1);

		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/user/detail_hopital_profile', $data);
		}

		function seting(){
			$data['title']="Paramètrage du site";
			$this->load->view('backend/user/seting', $data);
		}
		function role(){
			$data['title']="Paramètrage de roles";
			$this->load->view('backend/user/role', $data);
		}

		function category(){

			$data['title']="Paramètrage cétegorie produit";
			$this->load->view('backend/user/category', $data);
		}

		function formation(){
			$data['title']="Paramètrage des formations";
			$data['categories'] = $this->crud_model->fetch_categores();
			$this->load->view('backend/user/formation', $data);
		}

		function profile(){

		    $data['title']="Mon profile utilisateur";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/user/profile', $data);
		}

		function basic(){
		    $data['title']="Information basique";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/user/basic', $data);
		  }


		function basic_image(){
		    $data['title']="Information basique de ma photo";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/user/basic_image', $data);
		}


		function basic_secure(){
		    $data['title']="Paramètrage de sécurité de mon compte";
		    $data['users'] = $this->crud_model->fetch_connected($this->connected);
		    $this->load->view('backend/user/basic_secure', $data);
		}

		
		function show_formation(){

			$data['title']="Listes des formations";
			$data['categories'] = $this->crud_model->fetch_categores();
			$data['users'] = $this->crud_model->fetch_connected($this->connected);

			// $data['publicites'] = $this->crud_model->publicite_alleatoire();
			$this->load->view('backend/user/show_formation', $data);
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





	function view_1($param1='', $param2='', $param3=''){
	    
	    if($param1=='display_delete') {

	      $this->db->where('id', $param2);
	      $this->db->delete('notification');
	      redirect('user/notification_all');
	    }

	    if($param1=='display_delete_message') {

	      $this->db->query("DELETE FROM messagerie WHERE  idmessage='".$param3."'  ");
	      redirect('user/message/'.$param2);
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
	   'country_table'   => $this->crud_model->fetch_details_pagination_to_formation_user($config["per_page"], $start)
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
				           	<a href="'.base_url().'user/notification/'.$key->code.'" class="btn btn-default btn-sm"><i class="fa fa-slack"></i>voir le détail</a>

			                
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
				           	<a href="'.base_url().'user/notification/'.$key->code.'" class="btn btn-default btn-sm"><i class="fa fa-slack"></i>voir le détail</a>

			                
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
	       redirect('user/basic', 'refresh');
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
           redirect('user/basic_image', 'refresh');
     }
     else{

        $this->session->set_flashdata('message2', 'Veillez selectionner la photo');
        redirect('user/basic_image', 'refresh');

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
                   redirect('user/basic_secure', 'refresh');

               }
               else{
   
                $this->session->set_flashdata('message2', 'les deux mot de passe doivent être identiques');
                redirect('user/basic_secure', 'refresh');
               }
         
          }

       }
       else{

          $this->session->set_flashdata('message2', 'information incorecte');
          redirect('user/basic_secure', 'refresh');
       }
     
  } 


  // this function receive ajax request and return closest providers
    function closest_locations(){

        $location =json_decode( preg_replace('/\\\"/',"\"",$_POST['data']));
        $lan=$location->longitude;
        $lat=$location->latitude;
        $ServiceId=$location->ServiceId;
        $base = base_url().'user/detail_hopital_profile/';

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
	      
	      redirect('user/chat_admin/'.$param1.'/'.$param2);
	    }
	    else{
	      redirect('user/chat_admin/'.$param1.'/'.$param2);
	    }
	    
	    
	}

	function chat_admin($param1, $param2){
	    $data['title']="Discution instantané";
	    $data['id_user']= $param1;
	    $data['id_recever']= $param2;
	    $data['id_recever2']= $param2;
	    $data['users'] = $this->crud_model->fetch_connected($this->connected);
	    $this->load->view('backend/user/messagerie', $data);
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
     'country_table'   => $this->crud_model->fetch_details_pagination_online_connected_user($config["per_page"], $start)
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
                <a href="'.base_url().'user/chat_admin/'.$id.'/'.$row->id.'">
              &nbsp;&nbsp;<i class="fa fa-comments-o"></i> message
                  </a> 
                </span>';
            }
            else{

              $etat = '

              <span class="message">
                <a href="'.base_url().'user/detail_users_profile/'.$row->id.'" class="text-warning">
              &nbsp;&nbsp;<i class="fa fa-user"></i> profile
                  </a> 
                </span>

              ';

              
            }



          $output .= '

           <li class="online">
                <a href="'.base_url().'user/detail_users_profile/'.$row->id.'">
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