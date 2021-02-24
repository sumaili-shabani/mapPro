<?php 
class crud_model extends CI_Model{


// opertion role
var $table1 = "role";  
var $select_column1 = array("idrole", "nom", "created_at");  
var $order_column1 = array(null, "nom", "created");
  // fin de la role
// opertion tbl_info
var $table2 = "tbl_info";  
var $select_column2 = array("idinfo", "nom_site", "icone", "adresse", "tel1","tel2","facebook","twitter", "linkedin", "email", "termes", "confidentialite");  
var $order_column2 = array(null, "nom_site", "adresse","tel1","tel2", null, null);
  // fin de la tbl_info

// opertion category
var $table3 = "commune";  
var $select_column3 = array("idcat", "nom", "created_at");  
var $order_column3 = array(null, "nom", "created");
// fin category


// evenement
var $table7 = "evenement";  
var $select_column7 = array("id", "message", "debit_event", "fin_event", "created_at");  
var $order_column7 = array(null, "message", "debit_event", null, null);

//users
var $table8 = "users";  
var $select_column8 = array("id", "first_name", "last_name", "email","image","telephone","full_adresse","biographie","date_nais");  
var $order_column8 = array(null, "first_name", "last_name", null, null);
  // fin information
var $table9 = "profile_information";  
var $select_column9 = array("idformation", "nomf", "description","icone","nom","created_at","code","idcat");  
var $order_column9 = array(null, "nomf", "description", "created_at","nom",null,null);
  // fin information


// contact
var $table11 = "contact";  
var $select_column11 = array("id", "nom", "sujet","email", "message","fichier","created_at");  
var $order_column11 = array(null, "nom", "sujet","email","fichier", null, null);
// fin contact

// opertion hopital
var $table12 = "profile_hopial";  
var $select_column12 = array("user_id", "service_id","fullname","lat","lng","email","adresse","description","telephone","icone", "site_web");  
var $order_column12 = array(null, null, "fullname","nom", "lat","lng",null,null);
// fin hopital


// opertion category information
var $table13 = "category";  
var $select_column13 = array("idcat", "nom", "created_at");  
var $order_column13 = array(null, "nom", "created");
// fin category

// vaccin
var $table14 = "vaccin";  
var $select_column14 = array("idv", "designation", "categorie","periode");  
var $order_column14 = array(null, "designation", null,null);
// fin vaccin

// enfant
var $table15 = "enfant";  
var $select_column15 = array("ide", "nom", "nomdupere","nomdelamere","date_nais","adresse","telephone","nationnalite","sexe","created_at");  
var $order_column15 = array(null, "nom","nomdupere","nomdelamere",
  "date_nais","adresse","telephone","sexe", null,null);
// fin enfant

// vaccinations
var $table16 = "profile_vaccination";  
var $select_column16 = array("id","idv","ide","nom","sexe", "designation", "categorie","periode","annee","created_at");  
var $order_column16 = array(null, "nom","designation","categorie",
  "periode", null,null);
// fin vaccinations


function insert_user($data)
{
  $this->db->insert('users', $data);
  return $this->db->insert_id();
} 

// messagerie
function insert_message($data){
    $this->db->insert('messagerie', $data);
}

 // online 
function insert_online($data){
    $this->db->insert('online', $data);
}

 // pagination des utilisateurs connectés
  function fetch_pagination_online(){
    $query = $this->db->get("profile_online");
    return $query->num_rows();
  }

function fetch_roles()
{
	$this->db->order_by('nom','ASC');
  	return $this->db->get('role');
}

function fetch_connected($id){
	$this->db->where('id',$id);
  	return $this->db->get('users')->result_array();
}

function fetch_info_by_notification($code){
	$this->db->where('code',$code);
  	return $this->db->get('information')->result();
}

function fetch_info_by_hopopital($user_id){
  $this->db->where('user_id',$user_id);
    return $this->db->get('profile_hopial')->result_array();
}

function update_crud($user_id, $data)  
{  
       $this->db->where("id", $user_id);  
       $this->db->update("users", $data);  
}

function delete_online($id_user){
    $this->db->where('id_user', $id_user);
    $this->db->delete("online");
}

function insert_recupere($data){
     $this->db->insert('recupere', $data);
}

function insert_contact($data)  
{  
       $this->db->insert('contact', $data);  
}

function update_user($email, $data)
{
  $this->db->where('email', $email);
  return $this->db->update('users', $data);
}

// pagination des utilisateurs connectés
function fetch_pagination_ti_followe_count(){
	$query = $this->db->get("users");
	return $query->num_rows();
}

function fetch_categores()
{
	$this->db->order_by('nom','ASC');
  	return $this->db->get('commune');
}

function fetch_categores_info()
{
	$this->db->order_by('nom','ASC');
  	return $this->db->get('category');
}

function fetch_vaccin_info()
{
  $this->db->order_by('designation','ASC');
    return $this->db->get('vaccin');
}

function fetch_enfant_info()
{
  $this->db->order_by('nom','ASC');
    return $this->db->get('enfant');
}

function get_name_user($id){
    $this->db->where("id", $id);
    $nom = $this->db->get("users")->result_array();
    foreach ($nom as $key) {
      return $key["first_name"];
    }

 }

 function get_role_user($id){
    $this->db->where("id", $id);
    $nom = $this->db->get("users")->result_array();
    foreach ($nom as $key) {
      return $key["idrole"];
    }

 }

 function get_info_user(){
    $nom = $this->db->get("users")->result_array();
    return $nom;
 }

function insert_notification($data)  
{  
   $this->db->insert('notification', $data);  
}



// script users
function make_query_users()  
{  
   $this->db->where('idrole', 2);
   $this->db->select($this->select_column8);  
   $this->db->from($this->table8);  
   if(isset($_POST["search"]["value"]))  
   {  
        $this->db->like("first_name", $_POST["search"]["value"]);  
        $this->db->or_like("last_name", $_POST["search"]["value"]); 
        $this->db->or_like("full_adresse", $_POST["search"]["value"]); 
        $this->db->or_like("biographie", $_POST["search"]["value"]);  
   }  
   if(isset($_POST["order"]))  
   {  
        $this->db->order_by($this->order_column8[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
   }  
   else  
   {  
        $this->db->order_by('id', 'DESC');  
   }  
}

function make_datatables_users(){  
   $this->make_query_users();  
   if($_POST["length"] != -1)  
   {  
        $this->db->limit($_POST['length'], $_POST['start']);  
   }  
   $query = $this->db->get();  
   return $query->result();  
}

function get_filtered_data_users(){  
   $this->make_query_users();  
   $query = $this->db->get();  
   return $query->num_rows();  
}       
function get_all_data_users()  
{  
   $this->db->select("*");  
   $this->db->from($this->table8);  
   return $this->db->count_all_results();  
}

function fetch_single_users($id)  
{  
   $this->db->where("id", $id);  
   $query=$this->db->get('users');  
   return $query->result();  
}


// script pour formations
function make_query_formation()  
{  
        
       $this->db->select($this->select_column9);  
       $this->db->from($this->table9);  
       if(isset($_POST["search"]["value"]))  
       {  
            $this->db->like("nomf", $_POST["search"]["value"]);  
            $this->db->or_like("nom", $_POST["search"]["value"]);
            $this->db->or_like("idcat", $_POST["search"]["value"]); 
            $this->db->or_like("created_at", $_POST["search"]["value"]);
            $this->db->or_like("description", $_POST["search"]["value"]);
           
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_column9[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('idformation', 'DESC');  
       }  
  }

 function make_datatables_formation(){  
       $this->make_query_formation();  
       if($_POST["length"] != -1)  
       {  
            $this->db->limit($_POST['length'], $_POST['start']);  
       }  
       $query = $this->db->get();  
       return $query->result();  
  }

  function get_filtered_data_formation(){  
       $this->make_query_formation();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data_formation()  
  {  
       $this->db->select("*");  
       $this->db->from($this->table9);  
       return $this->db->count_all_results();  
  }

  function insert_formation($data)  
  {  
       $this->db->insert('information', $data);  
  }

  
  function update_formation($idformation, $data)  
  {  
       $this->db->where("idformation", $idformation);  
       $this->db->update("information", $data);  
  }


  function delete_formation($idformation)  
  {  
       $this->db->where("idformation", $idformation);  
       $this->db->delete("information");  
  }

  function fetch_single_formation($idformation)  
  {  
       $this->db->where("idformation", $idformation);  
       $query=$this->db->get('profile_information');  
       return $query->result();  
  } 

  // fin de formations 

// evenement
function make_query_evenement()  
{  
    
   $this->db->select($this->select_column7);  
   $this->db->from($this->table7);  
   if(isset($_POST["search"]["value"]))  
   {  
        $this->db->like("message", $_POST["search"]["value"]);  
        $this->db->or_like("debit_event", $_POST["search"]["value"]);  
        $this->db->or_like("fin_event", $_POST["search"]["value"]);
   }  
   if(isset($_POST["order"]))  
   {  
        $this->db->order_by($this->order_column7[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
   }  
   else  
   {  
        $this->db->order_by('id', 'DESC');  
   }  
}

function make_datatables_evenement(){  
   $this->make_query_evenement();  
   if($_POST["length"] != -1)  
   {  
        $this->db->limit($_POST['length'], $_POST['start']);  
   }  
   $query = $this->db->get();  
   return $query->result();  
}

function get_filtered_data_evenement(){  
   $this->make_query_evenement();  
   $query = $this->db->get();  
   return $query->num_rows();  
}       
function get_all_data_evenement()  
{  
   $this->db->select("*");  
   $this->db->from($this->table7);  
   return $this->db->count_all_results();  
}

function insert_evenement($data)  
{  
   $this->db->insert('evenement', $data);  
}

function update_evenement($id, $data)  
{  
   $this->db->where("id", $id);  
   $this->db->update("evenement", $data);  
}

function update_membre($idmembre, $data)  
{  
   $this->db->where("idmembre", $idmembre);  
   $this->db->update("membre", $data);  
}


function delete_evenement($id)  
{  
   $this->db->where("id", $id);  
   $this->db->delete("evenement");  
}

function fetch_single_evenement($id)  
{  
   $this->db->where("id", $id);  
   $query=$this->db->get('evenement');  
   return $query->result();  
}


// fin script evenement

// script pour information du site
function make_query_tbl_info()  
  {  
        
       $this->db->select($this->select_column2);  
       $this->db->from($this->table2);  
       if(isset($_POST["search"]["value"]))  
       {  
            $this->db->like("adresse", $_POST["search"]["value"]);  
            $this->db->or_like("nom_site", $_POST["search"]["value"]);
            $this->db->or_like("tel1", $_POST["search"]["value"]); 
            $this->db->or_like("tel2", $_POST["search"]["value"]);
            $this->db->or_like("email", $_POST["search"]["value"]);
            $this->db->or_like("idinfo", $_POST["search"]["value"]);
            $this->db->or_like("termes", $_POST["search"]["value"]);
            $this->db->or_like("confidentialite", $_POST["search"]["value"]);  
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('idinfo', 'DESC');  
       }  
  }

 function make_datatables_tbl_info(){  
       $this->make_query_tbl_info();  
       if($_POST["length"] != -1)  
       {  
            $this->db->limit($_POST['length'], $_POST['start']);  
       }  
       $query = $this->db->get();  
       return $query->result();  
  }

  function get_filtered_data_tbl_info(){  
       $this->make_query_tbl_info();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data_tbl_info()  
  {  
       $this->db->select("*");  
       $this->db->from($this->table2);  
       return $this->db->count_all_results();  
  }

  function insert_tbl_info($data)  
  {  
       $this->db->insert('tbl_info', $data);  
  }

  
  function update_tbl_info($idinfo, $data)  
  {  
       $this->db->where("idinfo", $idinfo);  
       $this->db->update("tbl_info", $data);  
  }


  function delete_tbl_info($idinfo)  
  {  
       $this->db->where("idinfo", $idinfo);  
       $this->db->delete("tbl_info");  
  }

  function delete_compte_utilisateur($id)  
  {  
       $this->db->where("id", $id);  
       $this->db->delete("users");  
  }

  function fetch_single_tbl_info($idinfo)  
  {  
       $this->db->where("idinfo", $idinfo);  
       $query=$this->db->get('tbl_info');  
       return $query->result();  
  } 

  // fin de tbl_info 

// script pour ctegorie mrchandise du site
function make_query_category()  
{  
    
   $this->db->select($this->select_column3);  
   $this->db->from($this->table3);
   
   if(isset($_POST["search"]["value"]))  
   {  
        $this->db->like("idcat", $_POST["search"]["value"]);  
        $this->db->or_like("nom", $_POST["search"]["value"]);
   }  
   if(isset($_POST["order"]))  
   {  
        $this->db->order_by($this->order_column3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
   }  
   else  
   {  
        $this->db->order_by('idcat', 'DESC');  
   }  
}

 function make_datatables_category(){  
       $this->make_query_category();  
       if($_POST["length"] != -1)  
       {  
            $this->db->limit($_POST['length'], $_POST['start']);  
       }  
       $query = $this->db->get();  
       return $query->result();  
  }

  function get_filtered_data_category(){  
       $this->make_query_category();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data_category()  
  {  
       $this->db->select("*");  
       $this->db->from($this->table3);  
       return $this->db->count_all_results();  
  }

  function insert_category($data)  
  {  
       $this->db->insert('commune', $data);  
  }

  
  function update_category($idcat, $data)  
  {  
       $this->db->where("idcat", $idcat);  
       $this->db->update("commune", $data);  
  }


  function delete_category($idcat)  
  {  
       $this->db->where("idcat", $idcat);  
       $this->db->delete("commune");  
  }

  function fetch_single_category($idcat)  
  {  
       $this->db->where("idcat", $idcat);  
       $query=$this->db->get('commune');  
       return $query->result();  
  } 


  // script pour ctegorie mrchandise du site categorie information
function make_query_category_info()  
{  
    
   $this->db->select($this->select_column13);  
   $this->db->from($this->table13);
   
   if(isset($_POST["search"]["value"]))  
   {  
        $this->db->like("idcat", $_POST["search"]["value"]);  
        $this->db->or_like("nom", $_POST["search"]["value"]);
   }  
   if(isset($_POST["order"]))  
   {  
        $this->db->order_by($this->order_column13[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
   }  
   else  
   {  
        $this->db->order_by('idcat', 'DESC');  
   }  
}

 function make_datatables_category_info(){  
       $this->make_query_category_info();  
       if($_POST["length"] != -1)  
       {  
            $this->db->limit($_POST['length'], $_POST['start']);  
       }  
       $query = $this->db->get();  
       return $query->result();  
  }

  function get_filtered_data_category_info(){  
       $this->make_query_category_info();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data_category_info()  
  {  
       $this->db->select("*");  
       $this->db->from($this->table13);  
       return $this->db->count_all_results();  
  }

  function insert_category_info($data)  
  {  
       $this->db->insert('category', $data);  
  }

  
  function update_category_info($idcat, $data)  
  {  
       $this->db->where("idcat", $idcat);  
       $this->db->update("category", $data);  
  }


  function delete_category_info($idcat)  
  {  
       $this->db->where("idcat", $idcat);  
       $this->db->delete("category");  
  }

  function fetch_single_category_info($idcat)  
  {  
       $this->db->where("idcat", $idcat);  
       $query=$this->db->get('category');  
       return $query->result();  
  } 
///fin de la categorie information


// script pour role du site
 function make_query_role()  
 {  
        
       $this->db->select($this->select_column1);  
       $this->db->from($this->table1);  
       if(isset($_POST["search"]["value"]))  
       {  
            $this->db->like("idrole", $_POST["search"]["value"]);  
            $this->db->or_like("nom", $_POST["search"]["value"]);
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_column1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('idrole', 'DESC');  
       }  
  }

 function make_datatables_role(){  
       $this->make_query_role();  
       if($_POST["length"] != -1)  
       {  
            $this->db->limit($_POST['length'], $_POST['start']);  
       }  
       $query = $this->db->get();  
       return $query->result();  
  }

  function get_filtered_data_role(){  
       $this->make_query_role();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data_role()  
  {  
       $this->db->select("*");  
       $this->db->from($this->table1);  
       return $this->db->count_all_results();  
  }

  function insert_role($data)  
  {  
       $this->db->insert('role', $data);  
  }

  
  function update_role($idrole, $data)  
  {  
       $this->db->where("idrole", $idrole);  
       $this->db->update("role", $data);  
  }


  function delete_role($idrole)  
  {  
       $this->db->where("idrole", $idrole);  
       $this->db->delete("role");  
  }

  function fetch_single_role($idrole)  
  {  
       $this->db->where("idrole", $idrole);  
       $query=$this->db->get('role');  
       return $query->result();  
  } 
// fin de script role

// script de contact 
// contact
function make_query_contact()  
{  
    
   $this->db->select($this->select_column11);  
   $this->db->from($this->table11);  
   if(isset($_POST["search"]["value"]))  
   {  
        $this->db->like("sujet", $_POST["search"]["value"]);  
        $this->db->or_like("nom", $_POST["search"]["value"]);  
        $this->db->or_like("email", $_POST["search"]["value"]);  
   }  
   if(isset($_POST["order"]))  
   {  
        $this->db->order_by($this->order_column11[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
   }  
   else  
   {  
        $this->db->order_by('id', 'DESC');  
   }  
}

function make_datatables_contact(){  
   $this->make_query_contact();  
   if($_POST["length"] != -1)  
   {  
        $this->db->limit($_POST['length'], $_POST['start']);  
   }  
   $query = $this->db->get();  
   return $query->result();  
}

function get_filtered_data_contact(){  
   $this->make_query_contact();  
   $query = $this->db->get();  
   return $query->num_rows();  
}       
function get_all_data_contact()  
{  
   $this->db->select("*");  
   $this->db->from($this->table11);  
   return $this->db->count_all_results();  
}



function update_contact($id, $data)  
{  
   $this->db->where("id", $id);  
   $this->db->update("contact", $data);  
}


function delete_contact($id)  
{  
   $this->db->where("id", $id);  
   $this->db->delete("contact");  
}

function fetch_single_contact($id)  
{  
   $this->db->where("id", $id);  
   $query=$this->db->get('contact');  
   return $query->result();  
}
// fin de script 










// pagination des utilisateurs connecters
  function fetch_details_pagination_to_users_count($limit, $start){
  	  $output = '';
      $this->db->select("*");
      $this->db->from("users");
      $this->db->order_by("first_name", "ASC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      $id = $this->session->userdata('admin_login');
      $etat = '';
      
      foreach($query->result() as $row)
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
      
      return $output;
  }
  // fin pagination

// recherche des utilisateurs par fultres
function fetch_data_search_online_user_follow($query)
{
$this->db->select("*");
$this->db->from("users");
$this->db->limit(9);
if($query != '')
{
 $this->db->like('id', $query);
 $this->db->or_like('first_name', $query);
 $this->db->or_like('last_name', $query);
 $this->db->or_like('full_adresse', $query);
 $this->db->or_like('telephone', $query);

}
$this->db->order_by('first_name', 'ASC');
return $this->db->get();
}


// script pour hoptaux
function make_query_hopitaux()  
  {  
        
       $this->db->select($this->select_column12);  
       $this->db->from($this->table12);  
       if(isset($_POST["search"]["value"]))  
       {  
            $this->db->like("fullname", $_POST["search"]["value"]);  
            $this->db->or_like("telephone", $_POST["search"]["value"]);
            $this->db->or_like("adresse", $_POST["search"]["value"]); 
            $this->db->or_like("service_id", $_POST["search"]["value"]); 
            
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_column12[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('user_id', 'DESC');  
       }  
  }

 function make_datatables_hopitaux(){  
       $this->make_query_hopitaux();  
       if($_POST["length"] != -1)  
       {  
            $this->db->limit($_POST['length'], $_POST['start']);  
       }  
       $query = $this->db->get();  
       return $query->result();  
  }

  function get_filtered_data_hopitaux(){  
       $this->make_query_hopitaux();  
       $query = $this->db->get();  
       return $query->num_rows();  
  }       
  function get_all_data_hopitaux()  
  {  
       $this->db->select("*");  
       $this->db->from($this->table12);  
       return $this->db->count_all_results();  
  }

  function insert_hopitaux($data)  
  {  
       $this->db->insert('ci_providers', $data);  
  }

  
  function update_hopitaux($user_id, $data)  
  {  
       $this->db->where("user_id", $user_id);  
       $this->db->update("ci_providers", $data);  
  }


  function delete_hopitaux($user_id)  
  {  
       $this->db->where("user_id", $user_id);  
       $this->db->delete("ci_providers");  
  }

 

  function fetch_single_hopitaux($user_id)  
  {  
       $this->db->where("user_id", $user_id);  
       $query=$this->db->get('ci_providers');  
       return $query->result();  
  } 

  // fin de hoptaux 


  // detail de livres de formations


  function fetch_pagination_formation()
      {
        $query = $this->db->query("SELECT * FROM information");
        return $query->num_rows();
      }

      // detail de livres de formations
     function fetch_details_pagination_to_formation($limit, $start)
     {
      $output = '';
      $this->db->select("*");
      $this->db->from("information");
      $this->db->order_by("nomf", "ASC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      foreach($query->result() as $key)
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
      
      return $output;
     }


     // detail de livres de formations
     function fetch_details_pagination_to_formation_user($limit, $start)
     {
      $output = '';
      $this->db->select("*");
      $this->db->from("information");
      $this->db->order_by("nomf", "ASC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      foreach($query->result() as $key)
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
      
      return $output;
     }


     // detail de livres de formations
     function fetch_details_pagination_to_formation_home($limit, $start)
     {
      $output = '';
      $this->db->select("*");
      $this->db->from("information");
      $this->db->order_by("nomf", "ASC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      foreach($query->result() as $key)
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
      
      return $output;
     }


     // recherche de formations
	   function fetch_data_search_formation_to_lean($query)
	   {
	    $this->db->select("*");
	    $this->db->from("information");
	    $this->db->limit(16);
	    if($query != '')
	    {
	     $this->db->like('idformation', $query);
	     $this->db->or_like('nomf', $query);
	     // $this->db->or_like('description', $query);

	    }
	    $this->db->order_by('nomf', 'ASC');
	    return $this->db->get();
	   }


     // recherche des hôpitaux
     function fetch_data_search_hospital($query)
     {
      $this->db->select("*");
      $this->db->from("ci_providers");
      $this->db->limit(16);
      if($query != '')
      {
       $this->db->like('user_id', $query);
       $this->db->or_like('fullname', $query);
       // $this->db->or_like('description', $query);

      }
      $this->db->order_by('fullname', 'ASC');
      return $this->db->get();
     }



	    function view_fetch_data_search_auditor_tug($query)
	   {
		    $this->db->select("*");
		    $this->db->from("information");
		    $this->db->limit(1);
		    if($query != '')
		    {
		     $this->db->where('idformation', $query);
		    }
		    return $this->db->get();
	   }

   // fultre selon la categorie des formations
   function fultrage_fetch_data_search_product_to_lean_formation($query)
   {
    
    $this->db->limit(16);
    $this->db->order_by('nomf', 'ASC');
    $resultat = $this->db->get_where("information", array(
    	'idcat'	=>	$query
    ));

    return $resultat;
   
   
   }













function can_login($email, $password_ok)
	{
	  $this->db->where('email', $email);
	  $query = $this->db->get('users');
	  if($query->num_rows() > 0)
	  {
	   foreach($query->result() as $row)
	   {
	      if($row->idrole == '1')
	      {

	         $password = md5($password_ok);
	         $store_password = $row->passwords;
	         if($password == $store_password)
	         {
	          $this->session->set_userdata('admin_login', $row->id);
	         }
	         else
	         {
	          return 'mot de passe incorrect';
	         }

	      }
	      elseif($row->idrole == '2')
	      {
	         $password = md5($password_ok);
	         $store_password = $row->passwords;
	         if($password == $store_password)
	         {
	          $this->session->set_userdata('id', $row->id);
	         }
	         else
	         {
	          return 'mot de passe incorrect';
	         }

	      }
	      elseif($row->idrole == '3')
	      {
	         $password = md5($password_ok);
	         $store_password = $row->passwords;
	         if($password == $store_password)
	         {
	          $this->session->set_userdata('instuctor_login', $row->id);
	         }
	         else
	         {
	          return 'mot de passe incorrect';
	         }

	        }
	      else
	      {
	       return 'les informations incorrectes';
	      }
	      



	   }
	  }
	  else
	  {
	   return 'adresse email incorrecte';
	  }
	  
	 }


    function can_recuperation($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if($query->num_rows() > 0)
        {
            foreach($query->result() as $row)
            {
               
            }
        }
        else
        {
        return 'Adresse email non trouvée!!!!';
        }
    }




     // script pour parametrage des vaccins
    function make_query_category_vaccin()  
    {  
        
       $this->db->select($this->select_column14);  
       $this->db->from($this->table14);
       
       if(isset($_POST["search"]["value"]))  
       {  
            $this->db->like("idv", $_POST["search"]["value"]);  
            $this->db->or_like("designation", $_POST["search"]["value"]);
            $this->db->or_like("categorie", $_POST["search"]["value"]);
            $this->db->or_like("periode", $_POST["search"]["value"]);
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_column14[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('idv', 'DESC');  
       }  
    }

     function make_datatables_category_vaccin(){  
           $this->make_query_category_vaccin();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_category_vaccin(){  
           $this->make_query_category_vaccin();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_category_vaccin()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table14);  
           return $this->db->count_all_results();  
      }

      function insert_category_vaccin($data)  
      {  
           $this->db->insert('vaccin', $data);  
      }

      
      function update_category_vaccin($idv, $data)  
      {  
           $this->db->where("idv", $idv);  
           $this->db->update("vaccin", $data);  
      }


      function delete_category_vaccin($idv)  
      {  
           $this->db->where("idv", $idv);  
           $this->db->delete("vaccin");  
      }

      function fetch_single_category_vaccin($idv)  
      {  
           $this->db->where("idv", $idv);  
           $query=$this->db->get('vaccin');  
           return $query->result();  
      } 
    ///fin de la categorie vaccins


    // script pour parametrage des vaccination pour les enfants
    function make_query_category_vaccination()  
    {  
        
       $this->db->select($this->select_column16);  
       $this->db->from($this->table16);
       
       if(isset($_POST["search"]["value"]))  
       {  
            $this->db->like("idv", $_POST["search"]["value"]);
            $this->db->or_like("nom", $_POST["search"]["value"]);
            $this->db->or_like("annee", $_POST["search"]["value"]);  
            $this->db->or_like("designation", $_POST["search"]["value"]);
            $this->db->or_like("categorie", $_POST["search"]["value"]);
            $this->db->or_like("periode", $_POST["search"]["value"]);
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_column16[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('id', 'DESC');  
       }  
    }

     function make_datatables_category_vaccination(){  
           $this->make_query_category_vaccination();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_category_vaccination(){  
           $this->make_query_category_vaccination();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_category_vaccination()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table16);  
           return $this->db->count_all_results();  
      }

      function insert_category_vaccination($data)  
      {  
           $this->db->insert('vaccination', $data);  
      }

      
      function update_category_vaccination($id, $data)  
      {  
           $this->db->where("id", $id);  
           $this->db->update("vaccination", $data);  
      }


      function delete_category_vaccination($id)  
      {  
           $this->db->where("id", $id);  
           $this->db->delete("vaccination");  
      }

      function fetch_single_category_vaccination($id)  
      {  
           $this->db->where("id", $id);  
           $query=$this->db->get('profile_vaccination');  
           return $query->result();  
      } 
    ///fin de la categorie vaccins





       // script pour parametrage des enfants au système
    function make_query_category_enfant()  
    {  
        
       $this->db->select($this->select_column15);  
       $this->db->from($this->table15);
       
       if(isset($_POST["search"]["value"]))  
       {  
            $this->db->like("ide", $_POST["search"]["value"]);  
            $this->db->or_like("nom", $_POST["search"]["value"]);
            $this->db->or_like("nomdupere", $_POST["search"]["value"]);
            $this->db->or_like("nomdelamere", $_POST["search"]["value"]);
            $this->db->or_like("telephone", $_POST["search"]["value"]);
       }  
       if(isset($_POST["order"]))  
       {  
            $this->db->order_by($this->order_column15[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
       }  
       else  
       {  
            $this->db->order_by('ide', 'DESC');  
       }  
    }

     function make_datatables_category_enfant(){  
           $this->make_query_category_enfant();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_category_enfant(){  
           $this->make_query_category_enfant();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_category_enfant()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table15);  
           return $this->db->count_all_results();  
      }

      function insert_category_enfant($data)  
      {  
           $this->db->insert('enfant', $data);  
      }

      
      function update_category_enfant($ide, $data)  
      {  
           $this->db->where("ide", $ide);  
           $this->db->update("enfant", $data);  
      }


      function delete_category_enfant($ide)  
      {  
           $this->db->where("ide", $ide);  
           $this->db->delete("enfant");  
      }

      function fetch_single_category_enfant($ide)  
      {  
           $this->db->where("ide", $ide);  
           $query=$this->db->get('enfant');  
           return $query->result();  
      } 
    ///fin de la categorie enfants au système















    // script de map
   // get closest providers
    // around 30 kilo meters from your location
    // by using latitude , longtuide and service id //
    function get_closest_locations($lng,$lat,$ServiceId){
      $results= $this->db->query("

        SELECT fullname as hopital,CONCAT(ci_providers.user_id,',',commune.nom) AS dscr,
        CONCAT(lat,',', lng) as pos,'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon, 
        ci_providers.fullname as fullname, 
        ( 6371 * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` )
         - radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance 
        FROM ci_providers INNER JOIN commune ON ci_providers.service_id=commune.idcat
         
        AND ci_providers.service_id = $ServiceId  HAVING distance <= 8000 ORDER BY distance ASC

        -- SELECT fullname as hopital,CONCAT(ci_providers.user_id,',',commune.nom) AS dscr,
        -- CONCAT(lat,',', lng) as pos,'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon, 
        -- ci_providers.fullname as fullname, 
        -- ( 6371 * acos( cos( radians(-1.680145) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - radians(29.216589) ) + sin( radians(-1.680145) ) * sin( radians( `lat` ) ) ) ) AS distance 
        -- FROM ci_providers INNER JOIN commune ON ci_providers.service_id=commune.idcat
         
        -- AND ci_providers.service_id = 2 HAVING distance <= 8000 ORDER BY distance ASC


      ")->result_array();
        return $results;
    }


    function fetch_single_details_inscription_apprenants_ok()
     {

      $data = $this->db->get('vaccin');

      $output = '';
      $nomf;
      $created_at;
      $nom;
      $icone;

       foreach($data->result_array() as $items)
       {
        $designation     = $items['designation'];
        $categorie = $items['categorie'];
        $periode    = $items['periode'];
        $idv    = $items['idv'];
        
       }

       $message = "liste des de calendrier vaccinal et leurs détails";

       $output = '<div align="right">';
       $output .= '<table width="100%" cellspacing="5" cellpadding="5" id="user_data">';
       $output .= '
       <tr>
        <td width="25%"><img src="'.base_url().'upload/annumation/hopitallogo.png" width="150" height="100"/></td>
        <td width="50%" align="center">
         <p><b>Designation et libellé : </b>'.$message.'</p>
         <p><b>Date : </b>'.date('d/m/yy').'</p>
         
        </td>

        <td width="25%">
        <img src="'.base_url().'upload/annumation/hopitallogo.png" width="150" height="100" />
        </td>


       </tr>
       ';
      
      $output .= '</table>';

       $output .= '</div>';

       $output .= '
          <div class="table-responsive">
           <hr>
           <br />
           <table class="table table-bordered panier_table" width="100%" cellspacing="5" cellpadding="5" id="user_data" border="0">
            <tr>
             <th width="15%">Id</th>
             <th width="45%">Designation</th>
             <th width="25%">Catégorie</th>
             <th width="15%">Période</th>
            </tr>

        ';

          foreach($data->result_array() as $items)
        {
           $output .= '
           <tr> 
            <td>'.$items["idv"].'</td>
            <td>'.$items["designation"].'</td>
            <td>'.$items["categorie"].'</td>\
            <td>'.$items["periode"].'</td>
            
           </tr>
           ';
        }
        $output .= '
           
          </table>

          </div>

          <hr>

          <div align="center">

            <img src="'.base_url().'upload/annumation/hopitallogo.png" width="200" height="150" >
            
          </div>
        ';


      
        return $output;
      }


      function fetch_single_details_inscription_enfant()
     {

      $data = $this->db->get('enfant');

      $output = '';
      $nomf;
      $created_at;
      $nom;
      $icone;

       

       $message = "liste des enfants admis au calendrier vaccinal et leurs détails";

       $output = '<div align="right">';
       $output .= '<table width="100%" cellspacing="5" cellpadding="5" id="user_data">';
       $output .= '
       <tr>
        <td width="25%"><img src="'.base_url().'upload/annumation/hopitallogo.png" width="150" height="100"/></td>
        <td width="50%" align="center">
         <p><b>Designation et libellé : </b>'.$message.'</p>
         <p><b>Date : </b>'.date('d/m/yy').'</p>
         
        </td>

        <td width="25%">
        <img src="'.base_url().'upload/annumation/hopitallogo.png" width="150" height="100" />
        </td>


       </tr>
       ';
      
      $output .= '</table>';

       $output .= '</div>';

       $output .= '
          <div class="table-responsive">
           <hr>
           <br />
           <table class="table table-bordered panier_table" width="100%" cellspacing="5" cellpadding="5" id="user_data" border="0">
            <tr>
             <th width="15%">nom</th>
             <th width="15%">nom du père</th>

             <th width="15%">nom de la mère</th>
             <th width="5%">sexe</th>
             <th width="15%">date de naissance</th>
             <th width="10%">nationnalité</th>

             <th width="15%">adresse</th>
            </tr>

        ';

          foreach($data->result_array() as $items)
          {
             $output .= '
             <tr> 
              <td>'.$items["nom"].'</td>
              <td>'.$items["nomdupere"].'</td>
              <td>'.$items["nomdelamere"].'</td>

              <td>'.$items["sexe"].'</td>
              <td>'.$items["date_nais"].'</td>

              <td>'.$items["nationnalite"].'</td>
              <td>'.$items["adresse"].'</td>
             </tr>
             ';
          }
          $output .= '
             
            </table>

            </div>

            <hr>

            <div align="center">

              <img src="'.base_url().'upload/annumation/hopitallogo.png" width="200" height="150" >
              
            </div>
          ';


      
        return $output;
      }


      function fetch_single_details_inscription_enfant_calendrier()
     {

      $data = $this->db->get('profile_vaccination');

      $output = '';
      $nomf;
      $created_at;
      $nom;
      $icone;

       

       $message = "la liste entière de calendrier vacinal suivu par les enfants";

       $output = '<div align="right">';
       $output .= '<table width="100%" cellspacing="5" cellpadding="5" id="user_data">';
       $output .= '
       <tr>
        <td width="25%"><img src="'.base_url().'upload/annumation/hopitallogo.png" width="150" height="100"/></td>
        <td width="50%" align="center">
         <p><b>Designation et libellé : </b>'.$message.'</p>
         <p><b>Mise à jour : </b>'.date('d/m/yy').'</p>
         
        </td>

        <td width="25%">
        <img src="'.base_url().'upload/annumation/hopitallogo.png" width="150" height="100" />
        </td>


       </tr>
       ';
      
      $output .= '</table>';

       $output .= '</div>';

       $output .= '
          <div class="table-responsive">
           <hr>
           <br />
           <table class="table table-bordered panier_table" width="100%" cellspacing="5" cellpadding="5" id="user_data" border="0">
            <tr>
             <th width="5%">Catégorie</th>
             <th width="15%">Nom enfant</th>

             <th width="5%">Sexe</th>
             <th width="15%">Designation du vaccin</th>
             <th width="10%">Période</th>
             <th width="5%">Année</th>
             <th width="15%">Mise à jour</th>
            </tr>

        ';

          foreach($data->result_array() as $items)
          {
             $output .= '
             <tr> 
              <td>'.$items["categorie"].'</td>
              <td>'.$items["nom"].'</td>
              <td>'.$items["sexe"].'</td>

              <td>'.$items["designation"].'</td>
              <td>'.$items["periode"].'</td>

              <td>'.$items["annee"].'</td>

              <td>'.nl2br(substr(date(DATE_RFC822, strtotime($items["created_at"])), 0, 23)).'</td>
              
             </tr>
             ';
          }
          $output .= '
             
            </table>

            </div>

            <hr>

            <div align="center">

              <img src="'.base_url().'upload/annumation/hopitallogo.png" width="200" height="150" >
              
            </div>
          ';


      
        return $output;
      }


       // recherche des produits par fultres
     function fetch_data_search_online_user($query)
     {
      $this->db->select("*");
      $this->db->from("users");
      $this->db->limit(9);
      if($query != '')
      {
       $this->db->like('id', $query);
       $this->db->or_like('first_name', $query);
       $this->db->or_like('last_name', $query);
       $this->db->or_like('full_adresse', $query);
       $this->db->or_like('telephone', $query);

      }
      $this->db->order_by('first_name', 'ASC');
      return $this->db->get();
     }



       // pagination des utilisateurs connecters
      function fetch_details_pagination_online_connected($limit, $start){
          $output = '';
        $this->db->select("*");
        $this->db->from("profile_online");
        $this->db->order_by("first_name", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        $id = $this->session->userdata('admin_login');
        $etat = '';
        
        foreach($query->result() as $row)
        {

          if ($row->id_user != $id) {
              $etat = '<span class="message">
                <a href="'.base_url().'admin/chat_admin/'.$id.'/'.$row->id_user.'">
              &nbsp;&nbsp;<i class="fa fa-comments-o"></i> message
                  </a> 
                </span>';
            }
            else{

              $etat = '

              <span class="message">
                <a href="'.base_url().'admin/detail_users_profile/'.$row->id_user.'" class="text-warning">
              &nbsp;&nbsp;<i class="fa fa-user"></i> profile
                  </a> 
                </span>

              ';

              
            }

         $output .= '
         
        <li class="online">
                <a href="'.base_url().'admin/detail_users_profile/'.$row->id_user.'">
                    <div class="media">
                        <div class="avtar-pic w35 bg-red">
                          <span>
                          <img src="'.base_url().'upload/photo/'.$row->image.'" class="img img-responsive img-circle" style="width: 50px; height: 40px; border-radius: 70%;">
                          <span class="badge badge-success status badge-sm" >en ligne</span>
                            </span>
                        </div>
                        <div class="media-body" style="padding-right: 10px;">
                            <span class="name text-info">&nbsp;&nbsp;@'.$row->first_name.' '.substr($row->last_name, 0,25).' </span> <br>
                            '.$etat.'

                            
                        </div>
                    </div>
                </a>
            </li>
            <hr>

         ';
        }
        
        return $output;
      }


      // pagination des utilisateurs connecters
      function fetch_details_pagination_online_connected_user($limit, $start){
          $output = '';
        $this->db->select("*");
        $this->db->from("profile_online");
        $this->db->order_by("first_name", "ASC");
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        $id = $this->session->userdata('id');
        $etat = '';
        
        foreach($query->result() as $row)
        {

          if ($row->id_user != $id) {
              $etat = '<span class="message">
                <a href="'.base_url().'user/chat_admin/'.$id.'/'.$row->id_user.'">
              &nbsp;&nbsp;<i class="fa fa-comments-o"></i> message
                  </a> 
                </span>';
            }
            else{

              $etat = '

              <span class="message">
                <a href="'.base_url().'admin/detail_users_profile/'.$row->id_user.'" class="text-warning">
              &nbsp;&nbsp;<i class="fa fa-user"></i> profile
                  </a> 
                </span>

              ';

              
            }

         $output .= '
         
        <li class="online">
                <a href="'.base_url().'user/detail_users_profile/'.$row->id_user.'">
                    <div class="media">
                        <div class="avtar-pic w35 bg-red">
                          <span>
                          <img src="'.base_url().'upload/photo/'.$row->image.'" class="img img-responsive img-circle" style="width: 50px; height: 40px; border-radius: 70%;">
                          <span class="badge badge-success status badge-sm" >en ligne</span>
                            </span>
                        </div>
                        <div class="media-body" style="padding-right: 10px;">
                            <span class="name text-info">&nbsp;&nbsp;@'.$row->first_name.' '.substr($row->last_name, 0,25).' </span> <br>
                            '.$etat.'

                            
                        </div>
                    </div>
                </a>
            </li>
            <hr>

         ';
        }
        
        return $output;
      }















	

}


 ?>