<?php  
 class crud_model extends CI_Model  
 {  
      var $table = "users";  
      var $select_column = array("id", "first_name", "last_name", "image","email");  
      var $order_column = array(null, "first_name", "last_name", null, null);  
      // fin de users

      var $table2 = "formation";  
      var $select_column2 = array("idformation", "nomformation", "prix", "description", "image","iduser");  
      var $order_column2 = array(null, "nomformation", "description", null, null);
      // fin de la formation

      var $table3 = "profile_cours";  
      var $select_column3 = array("idcours", "nomcours", "niveau", "description", "nomformation", "image","created_at");  
      var $order_column3 = array(null, "nomcours", "nomformation", null, null);
      // fin cours

      var $table4 = "profile_section";  
      var $select_column4 = array("idsection", "titre","nomcours", "description", "created_at");  
      var $order_column4 = array(null, "nomcours", "nomformation", null, null);
      //section

      var $table5 = "profile_lesson2";  
      var $select_column5 = array("idlesson", "nomcours", "niveau", "description", "nomformation", "image","created_at","titre","fichier","type_fichier","idsection","chapitre","code");  
      var $order_column5 = array(null, "chapitre", "nomcours", null, null);
      // fin
      // information

      var $table6 = "information";  
      var $select_column6 = array("idinfo", "titre", "message", "image","created_at");  
      var $order_column6 = array(null, "titre", "message", null, null);
      // fin information

      // evenement
      var $table7 = "evenement";  
      var $select_column7 = array("id", "message", "debit_event", "fin_event", "created_at");  
      var $order_column7 = array(null, "message", "debit_event", null, null);



      var $table8 = "users";  
      var $select_column8 = array("id", "first_name", "last_name", "email","image","telephone","full_adresse","biographie","date_nais","temoignage1","temoignage2","temoignage3","temoignage4","temoignage5");  
      var $order_column8 = array(null, "first_name", "last_name", null, null);
      // fin information

      // service

      var $table9 = "service";  
      var $select_column9 = array("idservice", "titre", "icone", "message", "image","created_at");  
      var $order_column9 = array(null, "titre", "message", null, null,null);
      // fin service

      // projet

      var $table10 = "projet";  
      var $select_column10 = array("idprojet", "titre", "message", "image","created_at");  
      var $order_column10 = array(null, "titre", "message", null, null,null);
      // fin projet

      // contact

      var $table11 = "contact";  
      var $select_column11 = array("idcontact", "name", "subject","email", "message","created_at");  
      var $order_column11 = array(null, "name", "subject", null, null);
      // fin contact

      // script pour les provinces
      var $table12 = "province";  
      var $select_column12 = array("idp", "nomp", "created_at");  
      var $order_column12 = array("idp", "nomp",null);
      // fin de ces scripts


      // script pour les provinces
      var $table13 = "profile_ville";  
      var $select_column13 = array("idp", "nomp", "nomv","idv","created_at");  
      var $order_column13 = array("idv", "nomp","nomv",null);
      // fin de ces scripts

      // script pour les universités
      var $table14 = "profile_universite";  
      var $select_column14 = array("iduniv", "nomp", "nomv","idv", "nom", "description", "lien","created_at");  
      var $order_column14 = array(null,"nomp", "nomv","nom",null,null);
      // fin de ces scripts

      // script pour les Facultés
      var $table15 = "profile_faculte";  
      var $select_column15 = array("idfac","iduniv", "nomp", "nomv","idv", "nom","nomfac", "description", "lien","created_at");  
      var $order_column15 = array(null,"nomp", "nomv","nom","nomfac",null,null);
      // fin de ces scripts

       // script pour les Facultés
      var $table16 = "profile_departement";  
      var $select_column16 = array("idfac","iduniv", "iddep", "nomdep", "nomp", "nomv","idv", "nom","nomfac", "description", "lien","created_at");  
      var $order_column16 = array(null,"nomp", "nomv","nom","nomfac","nomdep",null,null);
      // fin de ces scripts

      // script pour les Facultés
      var $table17 = "profile_livre";  
      var $select_column17 = array("idl","idfac","iduniv", "iddep", "noml", "auteur", "descriptionl", "edition", "fichier", "image", "photo", "first_name", "last_name", "nomdep", "nomp", "nomv","idv", "nom","nomfac", "description", "lien","created_at");  
      var $order_column17 = array(null,"nomp", "nomv", "noml", "auteur", "edition", "nom","nomfac","nomdep",null,null);
      // fin de ces scripts

      // script pour les pending book
      var $table18 = "profile_pending_livre";  
      var $select_column18 = array("idl","idfac","iduniv", "iddep", "noml", "auteur", "descriptionl", "edition", "fichier", "image", "photo", "first_name", "last_name", "nomdep", "nomp", "nomv","idv", "nom","nomfac", "description", "lien","created_at");  
      var $order_column18 = array(null,"nomp", "nomv", "noml", "auteur", "edition", "nom","nomfac","nomdep",null,null);
      // fin de ces scripts



      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("first_name", $_POST["search"]["value"]);  
                $this->db->or_like("last_name", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('id', 'DESC');  
           }  
      }  
      function make_datatables(){  
           $this->make_query();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data(){  
           $this->make_query();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
      function insert_crud($data)  
      {  
           $this->db->insert('users', $data);  
      }


      function fetch_single_user($user_id)  
      {  
           $this->db->where("id", $user_id);  
           $query=$this->db->get('users');  
           return $query->result();  
      }  
      function update_crud($user_id, $data)  
      {  
           $this->db->where("id", $user_id);  
           $this->db->update("users", $data);  
      }

      function delete_crud($user_id)  
      {  
           $this->db->where("id", $user_id);  
           $this->db->delete("users");  
      }
     function insert($data)
     {
      $this->db->insert('users', $data);
      return $this->db->insert_id();
     } 

     // opertion formations




     function make_query_formation()  
      {  
            
           $this->db->select($this->select_column2);  
           $this->db->from($this->table2);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nomformation", $_POST["search"]["value"]);  
                $this->db->or_like("description", $_POST["search"]["value"]);
                $this->db->or_like("prix", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
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
           $this->db->from($this->table2);  
           return $this->db->count_all_results();  
      }

      function insert_formation($data)  
      {  
           $this->db->insert('formation', $data);  
      }

      function insert_groupe_chat($data)  
      {  
           $this->db->insert('groupe_chat', $data);  
      }

      function update_formation($idformation, $data)  
      {  
           $this->db->where("idformation", $idformation);  
           $this->db->update("formation", $data);  
      }


      function delete_formation($idformation)  
      {  
           $this->db->where("idformation", $idformation);  
           $this->db->delete("formation");  
      }

      function fetch_single_formation($idformation)  
      {  
           $this->db->where("idformation", $idformation);  
           $query=$this->db->get('formation');  
           return $query->result();  
      } 


     // fin operation formation

      // opération de cours 
      function insert_cours($data)  
      {  
           $this->db->insert('cours', $data);  
      }


      function make_query_cours()  
      {  
            
           $this->db->select($this->select_column3);  
           $this->db->from($this->table3);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nomcours", $_POST["search"]["value"]);  
                $this->db->or_like("nomformation", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idcours', 'DESC');  
           }  
      }

      function make_datatables_cours(){  
           $this->make_query_cours();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }



      function get_filtered_data_cours(){  
           $this->make_query_cours();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_cours()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table3);  
           return $this->db->count_all_results();  
      }

      function fetch_single_cours($idcours)  
      {  
           $this->db->where("idcours", $idcours);  
           $query=$this->db->get('cours');  
           return $query->result();  
      } 

      function delete_cours($idcours)  
      {  
           $this->db->where("idcours", $idcours);  
           $this->db->delete("cours");  
      }

      function update_cours($idcours, $data)  
      {  
           $this->db->where("idcours", $idcours);  
           $this->db->update("cours", $data);  
      }

      // fin opertion cours


      // operation sections
       function make_query_section()  
      {  
            
           $this->db->select($this->select_column4);  
           $this->db->from($this->table4);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("titre", $_POST["search"]["value"]);  
                $this->db->or_like("idsection", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idsection', 'DESC');  
           }  
      }

     function make_datatables_section(){  
           $this->make_query_section();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_section(){  
           $this->make_query_section();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_section()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table4);  
           return $this->db->count_all_results();  
      }

      function insert_section($data){
          $this->db->insert('section', $data);
      }

      function update_section($idsection, $data)  
      {  
           $this->db->where("idsection", $idsection);  
           $this->db->update("section", $data);  
      }

      function delete_section($idsection)  
      {  
           $this->db->where("idsection", $idsection);  
           $this->db->delete("section");  
      }

      function fetch_single_section($idsection)  
      {  
           $this->db->where("idsection", $idsection);  
           $query=$this->db->get('section');  
           return $query->result();  
      }

      // fin operation section



      // scripts pour la leçon
       function make_query_lesson()  
      {  
            
           $this->db->select($this->select_column5);  
           $this->db->from($this->table5);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("chapitre", $_POST["search"]["value"]);  
                $this->db->or_like("nomcours", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column5[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idlesson', 'DESC');  
           }  
      }

     function make_datatables_lesson(){  
           $this->make_query_lesson();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_lesson(){  
           $this->make_query_lesson();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_lesson()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table5);  
           return $this->db->count_all_results();  
      }
      function insert_lesson($data){
        $this->db->insert('lesson', $data);

      }

      function fetch_single_lesson_plus($idlesson)  
      {  
           $this->db->where("idlesson", $idlesson);  
           $query=$this->db->get('lesson');  
           return $query->result();  
      }

      function delete_lesson($idlesson)  
      {  
           $this->db->where("idlesson", $idlesson);  
           $this->db->delete("lesson");  
      }

      function update_lesson($idlesson, $data)  
      {  
           $this->db->where("idlesson", $idlesson);  
           $this->db->update("lesson", $data);  
      }

      // favories
      function add_favory($data){
        $this->db->insert("favories", $data);
      }
      // fin de scripts

      // publication
      function make_query_information()  
      {  
            
           $this->db->select($this->select_column6);  
           $this->db->from($this->table6);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("titre", $_POST["search"]["value"]);  
                $this->db->or_like("message", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column6[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idinfo', 'DESC');  
           }  
      }

       function make_datatables_information(){  
           $this->make_query_information();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_information(){  
           $this->make_query_information();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_information()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table6);  
           return $this->db->count_all_results();  
      }

      function insert_information($data)  
      {  
           $this->db->insert('information', $data);  
      }

      function update_information($idinfo, $data)  
      {  
           $this->db->where("idinfo", $idinfo);  
           $this->db->update("information", $data);  
      }


      function delete_information($idinfo)  
      {  
           $this->db->where("idinfo", $idinfo);  
           $this->db->delete("information");  
      }

      function fetch_single_information($idinfo)  
      {  
           $this->db->where("idinfo", $idinfo);  
           $query=$this->db->get('information');  
           return $query->result();  
      }
      // fin publication

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

      // online 
      function insert_online($data){
         $this->db->insert('online', $data);
      }

      function delete_online($id_user){
        $this->db->where('id_user', $id_user);
        $this->db->delete("online");
      }
      // fin online

      // messagerie
      function insert_message($data){
        $this->db->insert('messagerie', $data);
      }

      // messagerie groupe
      function insert_message_chat_groupe($data){
        $this->db->insert('groupe', $data);
      }


      // script users
       function make_query_users()  
      {  
            
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
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
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

      function fetch_single_membre($id)  
      {  
           $this->db->where("id", $id);  
           $query=$this->db->get('profile_membre');  
           return $query->result();  
      }

     // fin operation formation

      // service
      function make_query_service()  
      {  
            
           $this->db->select($this->select_column9);  
           $this->db->from($this->table9);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("titre", $_POST["search"]["value"]);  
                $this->db->or_like("message", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column9[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idservice', 'DESC');  
           }  
      }

       function make_datatables_service(){  
           $this->make_query_service();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_service(){  
           $this->make_query_service();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_service()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table9);  
           return $this->db->count_all_results();  
      }

      function insert_service($data)  
      {  
           $this->db->insert('service', $data);  
      }

      function update_service($idservice, $data)  
      {  
           $this->db->where("idservice", $idservice);  
           $this->db->update("service", $data);  
      }


      function delete_service($idservice)  
      {  
           $this->db->where("idservice", $idservice);  
           $this->db->delete("service");  
      }

      function fetch_single_service($idservice)  
      {  
           $this->db->where("idservice", $idservice);  
           $query=$this->db->get('service');  
           return $query->result();  
      }
      // fin service


       // projet
      function make_query_projet()  
      {  
            
           $this->db->select($this->select_column10);  
           $this->db->from($this->table10);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("titre", $_POST["search"]["value"]);  
                $this->db->or_like("message", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column10[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idprojet', 'DESC');  
           }  
      }

       function make_datatables_projet(){  
           $this->make_query_projet();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_projet(){  
           $this->make_query_projet();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_projet()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table10);  
           return $this->db->count_all_results();  
      }

      function insert_projet($data)  
      {  
           $this->db->insert('projet', $data);  
      }

      function update_projet($idprojet, $data)  
      {  
           $this->db->where("idprojet", $idprojet);  
           $this->db->update("projet", $data);  
      }


      function delete_projet($idprojet)  
      {  
           $this->db->where("idprojet", $idprojet);  
           $this->db->delete("projet");  
      }

      function fetch_single_projet($idprojet)  
      {  
           $this->db->where("idprojet", $idprojet);  
           $query=$this->db->get('projet');  
           return $query->result();  
      }
      // fin projet

      // contact
      function make_query_contact()  
      {  
            
           $this->db->select($this->select_column11);  
           $this->db->from($this->table11);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("subject", $_POST["search"]["value"]);  
                $this->db->or_like("name", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column11[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idcontact', 'DESC');  
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

      function insert_contact($data)  
      {  
           $this->db->insert('contact', $data);  
      }

      function update_contact($idcontact, $data)  
      {  
           $this->db->where("idcontact", $idcontact);  
           $this->db->update("contact", $data);  
      }


      function delete_contact($idcontact)  
      {  
           $this->db->where("idcontact", $idcontact);  
           $this->db->delete("contact");  
      }

      function fetch_single_contact($idcontact)  
      {  
           $this->db->where("idcontact", $idcontact);  
           $query=$this->db->get('contact');  
           return $query->result();  
      }

      function delete_member($iduser)  
      {  
           $this->db->where("iduser", $iduser);  
           $this->db->delete("membre");  
      }

      function inscription_formation($data)  
      {  
           $this->db->insert('inscription_formation', $data);  
      }

      function delete_apprenant_to_formation($idinscription)  
      {  
           $this->db->where("idinscription", $idinscription);  
           $this->db->delete("inscription_formation");  
      }
      // fin contact

      function insert_my_projet($data)  
      {  
           $this->db->insert('t_projet', $data);  
      }

      function fetch_single_projet_apprenant($idprojet){
         $this->db->where("idprojet", $idprojet);  
           $query=$this->db->get('t_projet');  
           return $query->result();
      }

      function update_projet_apprenant_ok($idprojet, $data)  
      {  
           $this->db->where("idprojet", $idprojet);  
           $this->db->update("t_projet", $data);  
      }

      function delete_projet_apprenant($idprojet)  
      {  
           $this->db->where("idprojet", $idprojet);  
           $this->db->delete("t_projet");  
      }


      // operation province
       function make_query_province()  
      {  
            
           $this->db->select($this->select_column12);  
           $this->db->from($this->table12);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nomp", $_POST["search"]["value"]);  
                $this->db->or_like("idp", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column12[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idp', 'DESC');  
           }  
      }

     function make_datatables_province(){  
           $this->make_query_province();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_province(){  
           $this->make_query_province();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_province()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table12);  
           return $this->db->count_all_results();  
      }

      function insert_province($data){
          $this->db->insert('province', $data);
      }

      function update_province($idp, $data)  
      {  
           $this->db->where("idp", $idp);  
           $this->db->update("province", $data);  
      }

      function delete_province($idp)  
      {  
           $this->db->where("idp", $idp);  
           $this->db->delete("province");  
      }

      function fetch_single_province($idp)  
      {  
           $this->db->where("idp", $idp);  
           $query=$this->db->get('province');  
           return $query->result();  
      }

      // fin operation section

      function fetch_province()
      {
        $this->db->order_by("idp", "ASC");
        $query = $this->db->get("province");
        return $query->result();
      }

       // operation ville
       function make_query_ville()  
      {  
            
           $this->db->select($this->select_column13);  
           $this->db->from($this->table13);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nomp", $_POST["search"]["value"]);  
                $this->db->or_like("nomv", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column13[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idv', 'DESC');  
           }  
      }

     function make_datatables_ville(){  
           $this->make_query_ville();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_ville(){  
           $this->make_query_ville();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_ville()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table13);  
           return $this->db->count_all_results();  
      }

      function insert_ville($data){
          $this->db->insert('ville', $data);
      }

      function update_ville($idv, $data)  
      {  
           $this->db->where("idv", $idv);  
           $this->db->update("ville", $data);  
      }

      function delete_ville($idv)  
      {  
           $this->db->where("idv", $idv);  
           $this->db->delete("ville");  
      }

      function fetch_single_ville($idv)  
      {  
           $this->db->where("idv", $idv);  
           $query=$this->db->get('ville');  
           return $query->result();  
      }

      // fin operation province ville


      // le script pour les universités

      function fetch_ville_requete($idp)
       {
        $this->db->where('idp', $idp);
        $this->db->order_by('nomv', 'ASC');
        $query = $this->db->get('ville');
        $output = '<option value="">Selectionner la ville</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->idv.'">'.$row->nomv.'</option>';
        }
        return $output;
       }


       function fetch_university_requete($idv)
       {
        $this->db->where('idv', $idv);
        $this->db->order_by('nom', 'ASC');
        $query = $this->db->get('universite');
        $output = '<option value="">Selectionner une université</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->iduniv.'">'.$row->nom.'</option>';
        }
        return $output;
       }


       function fetch_university_faculte($iduniv)
       {
        $this->db->where('iduniv', $iduniv);
        $this->db->order_by('nomfac', 'ASC');
        $query = $this->db->get('faculte');
        $output = '<option value="">Selectionner une faculté</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->idfac.'">'.$row->nomfac.'</option>';
        }
        return $output;
       }


       function fetch_university_departement($idfac)
       {
        $this->db->where('idfac', $idfac);
        $this->db->order_by('nomdep', 'ASC');
        $query = $this->db->get('departement');
        $output = '<option value="">Selectionner un départements</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->iddep.'">'.$row->nomdep.'</option>';
        }
        return $output;
       }

       function fetch_operation_formation_departement($idformation)
       {
        $this->db->where('idformation', $idformation);
        $this->db->order_by('nomcours', 'ASC');
        $query = $this->db->get('cours');
        $output = '<option value="">Selectionner un cours</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->idcours.'">'.$row->nomcours.'</option>';
        }
        return $output;
       }

      function fetch_operation_cours_departement($idcours)
       {
        $this->db->where('idcours', $idcours);
        $this->db->order_by('titre', 'ASC');
        $query = $this->db->get('section');
        $output = '<option value="">Selectionner un chapitre</option>';
        foreach($query->result() as $row)
        {
         $output .= '<option value="'.$row->idsection.'">'.$row->titre.'</option>';
        }
        return $output;
       }


       function make_query_university()  
      {  
            
           $this->db->select($this->select_column14);  
           $this->db->from($this->table14);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nom", $_POST["search"]["value"]);  
                $this->db->or_like("nomv", $_POST["search"]["value"]); 
                $this->db->or_like("nomp", $_POST["search"]["value"]); 
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column14[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('iduniv', 'DESC');  
           }  
      }

     function make_datatables_university(){  
           $this->make_query_university();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_university(){  
           $this->make_query_university();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_university()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table14);  
           return $this->db->count_all_results();  
      }

      function insert_university($data){
          $this->db->insert('universite', $data);
      }

      function update_university($iduniv, $data)  
      {  
           $this->db->where("iduniv", $iduniv);  
           $this->db->update("universite", $data);  
      }

      function delete_university($iduniv)  
      {  
           $this->db->where("iduniv", $iduniv);  
           $this->db->delete("universite");  
      }

      function fetch_single_university($iduniv)  
      {  
           $this->db->where("iduniv", $iduniv);  
           $query=$this->db->get('universite');  
           return $query->result();  
      }


      // le script pour les facultés
      function make_query_faculty()  
      {  
            
           $this->db->select($this->select_column15);  
           $this->db->from($this->table15);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nom", $_POST["search"]["value"]);  
                $this->db->or_like("nomv", $_POST["search"]["value"]); 
                $this->db->or_like("nomp", $_POST["search"]["value"]); 
                $this->db->or_like("nomfac", $_POST["search"]["value"]); 
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column15[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idfac', 'DESC');  
           }  
      }

     function make_datatables_faculty(){  
           $this->make_query_faculty();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_faculty(){  
           $this->make_query_faculty();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_faculty()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table15);  
           return $this->db->count_all_results();  
      }

      function insert_faculty($data){
          $this->db->insert('faculte', $data);
      }

      function update_faculty($idfac, $data)  
      {  
           $this->db->where("idfac", $idfac);  
           $this->db->update("faculte", $data);  
      }

      function delete_faculty($idfac)  
      {  
           $this->db->where("idfac", $idfac);  
           $this->db->delete("faculte");  
      }

      function fetch_single_faculty($idfac)  
      {  
           $this->db->where("idfac", $idfac);  
           $query=$this->db->get('faculte');  
           return $query->result();  
      }


      // le script pour les départements
      function make_query_departement()  
      {  
            
           $this->db->select($this->select_column16);  
           $this->db->from($this->table16);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nom", $_POST["search"]["value"]);  
                $this->db->or_like("nomv", $_POST["search"]["value"]); 
                $this->db->or_like("nomp", $_POST["search"]["value"]); 
                $this->db->or_like("nomfac", $_POST["search"]["value"]); 
                $this->db->or_like("nomdep", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column16[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('iddep', 'DESC');  
           }  
      }

     function make_datatables_departement(){  
           $this->make_query_departement();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_departement(){  
           $this->make_query_departement();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_departement()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table16);  
           return $this->db->count_all_results();  
      }

      function insert_departement($data){
          $this->db->insert('departement', $data);
      }

      function update_departement($iddep, $data)  
      {  
           $this->db->where("iddep", $iddep);  
           $this->db->update("departement", $data);  
      }

      function delete_departement($iddep)  
      {  
           $this->db->where("iddep", $iddep);  
           $this->db->delete("departement");  
      }

      function fetch_single_departement($iddep)  
      {  
           $this->db->where("iddep", $iddep);  
           $query=$this->db->get('departement');  
           return $query->result();  
      }


       // le script pour les livres
      function make_query_book()  
      {  
            
           $this->db->select($this->select_column17);  
           $this->db->from($this->table17);  
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("nom", $_POST["search"]["value"]);  
                $this->db->or_like("nomv", $_POST["search"]["value"]); 
                $this->db->or_like("nomp", $_POST["search"]["value"]); 
                $this->db->or_like("nomfac", $_POST["search"]["value"]); 
                $this->db->or_like("nomdep", $_POST["search"]["value"]);

                $this->db->or_like("noml", $_POST["search"]["value"]);
                $this->db->or_like("auteur", $_POST["search"]["value"]);
                $this->db->or_like("edition", $_POST["search"]["value"]);
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column17[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {  
                $this->db->order_by('idl', 'DESC');  
           }  
      }

     function make_datatables_book(){  
           $this->make_query_book();  
           if($_POST["length"] != -1)  
           {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }

      function get_filtered_data_book(){  
           $this->make_query_book();  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data_book()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table17);  
           return $this->db->count_all_results();  
      }

      function insert_book($data){
          $this->db->insert('livre', $data);
      }

      function update_book($idl, $data)  
      {  
           $this->db->where("idl", $idl);  
           $this->db->update("livre", $data);  
      }

      function delete_book($idl)  
      {  
           $this->db->where("idl", $idl);  
           $this->db->delete("livre");  
      }

      function delete_groupe_discution($idgroupe)  
      {  
           $this->db->where("idgroupe", $idgroupe);  
           $this->db->delete("groupe_chat");  
      }

      function returer_suppression_au_groupe_discution($code_groupe, $id_user)  
      {  

        $this->db->query("DELETE FROM groupe WHERE code_groupe='".$code_groupe."' AND id_user='".$id_user."' "); 

      }

      function insert_integration_groupe($data){
          $this->db->insert('groupe', $data);
      }

      function fetch_single_book($idl)  
      {  
           $this->db->where("idl", $idl);  
           $query=$this->db->get('livre');  
           return $query->result();  
      }


       // le script pour les pending books livres
     
      function insert_pendingbook($data){
          $this->db->insert('pending_livre', $data);
      }

      function update_pendingbook($idl, $data)  
      {  
           $this->db->where("idl", $idl);  
           $this->db->update("pending_livre", $data);  
      }

      function delete_pendingbook($idl)  
      {  
           $this->db->where("idl", $idl);  
           $this->db->delete("pending_livre");  
      }

      function fetch_single_pendingbook($idl)  
      {  
           $this->db->where("idl", $idl);  
           $query=$this->db->get('pending_livre');  
           return $query->result();  
      }

      // pour la verification de livre
      function verification_livre_delete($idl)
      {
        $this->db->where('idl', $idl);
        $this->db->delete('pending_livre');
      }

      function fetch_pagination_users()
      {
        $query = $this->db->query("SELECT * FROM users WHERE idrole=1 OR idrole=3");
        return $query->num_rows();
      }

      function fetch_pagination_livre()
      {
        $query = $this->db->query("SELECT * FROM profile_livre");
        return $query->num_rows();
      }

      function fetch_pagination_formation()
      {
        $query = $this->db->query("SELECT * FROM formation");
        return $query->num_rows();
      }

     function fetch_details_pagination_users($limit, $start)
     {
      $output = '';
      $this->db->where("idrole", 3);
      $this->db->or_where("idrole", 1);
      $this->db->select("*");
      $this->db->from("users");
      $this->db->order_by("first_name", "ASC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      $connected = $this->session->userdata('admin_login');
      
      foreach($query->result() as $row)
      {

       $output .= '
       <div class="col-lg-4 col-md-6">
          <div class="card c_grid c_yellow">
              <div class="body text-center">
                 
                  <div class="img-responsive">
                    <img class="rounded-thumbnail" src="'.base_url().'upload/photo/'.$row->image.'" alt="" width="150" height="130">
                  </div>
                  <h6 class="mt-3 mb-0">'.$row->first_name.' '.$row->last_name.'</h6>
                  <span class="text-info">'.$row->email.'</span>
                  <ul class="mt-3 list-unstyled d-flex justify-content-center">
                      <li><a class="p-3" target="_blank" href="'.$row->facebook.'"><i class="fa fa-facebook"></i></a></li>
                      <li><a class="p-3" target="_blank" href="'.$row->twitter.'"><i class="fa fa-twitter"></i></a></li>
                      <li><a class="p-3" target="_blank" href="'.$row->linkedin.'"><i class="fa fa-linkedin"></i></a></li>
                  </ul>

                  <button class="btn btn-default btn-sm Follow_User" id_recever="'.$row->id.'">Follow</button>
                  <a class="btn btn-default btn-sm" href="'.base_url().'admin/chat_admin/'.$connected.'/'.$row->id.'">Message</a>
              </div>
          </div>
      </div>
       ';
      }
      
      return $output;
     }


     function fetch_nombre_likes_from_livre($idl){
        $nombre_like;
        $query = $this->db->query("SELECT count(idl) as nombre from likes_livre WHERE idl='".$idl."' ");
        if ($query->num_rows() > 0) {

          foreach ($query->result_array() as $key) {
            $nombre_like = $key["nombre"];
            return $nombre_like;
          }
          
        }
        else{
          $nombre_like = 0;
          return $nombre_like;
        }

     }

     
     


     function fetch_details_pagination_access_livre($limit, $start)
     {
      $output = '';
      $this->db->select("*");
      $this->db->from("profile_livre");
      $this->db->order_by("noml", "ASC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      $connected = $this->session->userdata('admin_login');
      
      foreach($query->result() as $row)
      {

        $nb = $this->fetch_nombre_likes_from_livre($row->idl);

       $output .= '

       <div class="col-md-4">
          <div class="card">
              <article class="media body mb-0">

                  <div class="col-md-12">
                    <div class="row">
                      <div class="col-md-4">

                        <div class="mr-12 img-responsive" align="center">
                            <img class="img-thumbnail" src="'.base_url().'upload/livre/'.$row->image.'" alt="" width="150" height="100">
                        </div>
                        
                      </div>
                      <div class="col-md-8">
                        <div class="media-body">
                            <div class="content">
                              <p class="h5 text-left">
                                <a href="#" class="text-primary">
                                  '.$row->noml.'
                                </a>
                            </p>

                              <p class="h6"><b>Auteur:</b>'.$row->auteur.' <small class="float-right text-muted"></small></p>

                              <p class="h6"><b>Année de publication:</b>'.$row->edition.' </p>
                              
                            </div>
                            
                        </div>
                      </div>

                      <div class="col-md-12">
                        <p>'.substr($row->descriptionl, 0,100).'...</p>

                        <nav class="d-flex text-muted">
                              <a href="'.base_url().'notification/cours_detail/'.$row->idl.'" class="icon mr-3"><i class="fa fa-repeat"></i> lire ce livre</a>
                              
                              <a href="javascript:void(0);" class="icon mr-3 favory_cours" idl="'.$row->idl.'"><i class="fa fa-heart"></i> favory</a>

                              <a href="javascript:void(0);" class="icon mr-3 pull-right like_cours" idl="'.$row->idl.'"><i class="fa fa-thumbs-o-up"></i><span id="like_'.$row->idl.'">'.$nb.'</span></a>

                              
                          </nav>
                      </div>



                    </div>
                  </div>

              </article>
          </div>
      </div>

       ';
      }
      
      return $output;
     }


     // detail de livres de formations
     function fetch_details_pagination_to_formation($limit, $start)
     {
      $output = '';
      $this->db->select("*");
      $this->db->from("formation");
      $this->db->order_by("nomformation", "ASC");
      $this->db->limit($limit, $start);
      $query = $this->db->get();

      if ($this->session->userdata('admin_login')) {
         $connected = $this->session->userdata('admin_login');

      }
      elseif ($this->session->userdata('id')) {
        $connected = $this->session->userdata('id');
      }
      elseif ($this->session->userdata('instuctor_login')) {
        $connected = $this->session->userdata('instuctor_login');
      }
      else{
        $connected = 0;
      }
      $message = "Explorez des milliers de formations en ligne au prix le plus bas jamais atteint !";

      foreach($query->result() as $key)
      {

       $output .= '
       <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
          <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0 text-center">
              <span class="text-info">'.$message.'</span>
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>'.$key->nomformation.'</b></h2>
                  <h1 class="lead"><b>'.$key->prix.'$</b></h1>
                  
                  
                </div>
                <div class="col-5 text-center" style="margin-top: 10px;">
                  <img src="'.base_url().'upload/formation/'.$key->image.'" alt="" class="img-thumbnail img-fluid" style="height: 100px;">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="text-center">
                
                    <a href="javascript:void(0)" iduser="'.$connected.'" idformation="'.$key->idformation.'" class="btn btn-sm bg-info inscription2">
                    <i class="fas fa-user"></i> je minscris</a>
                      
              </div>
            </div>
          </div>
        </div>  
       ';
      }
      
      return $output;
     }





     function insert_follow($data){
        $this->db->insert("follower",$data);
     }

     function insert_livre_favory($data){
        $this->db->insert("favory2",$data);
     }

     function insert_livre_likes($data){
        $this->db->insert("likes_livre",$data);
     }



     function insert_notification_new($data){
        $this->db->insert("notification", $data);
     }

     function get_name_user($id){
        $this->db->where("id", $id);
        $nom = $this->db->get("users")->result_array();
        foreach ($nom as $key) {
          return $key["first_name"];
        }

     }


   function fetch_data_search_livre_data($query)
   {
    $this->db->select("*");
    $this->db->from("profile_livre");
    $this->db->limit(9);
    if($query != '')
    {
     $this->db->like('idl', $query);
     $this->db->or_like('noml', $query);
     $this->db->or_like('nomdep', $query);
     $this->db->or_like('nom', $query);
     $this->db->or_like('nomfac', $query);
    }
    $this->db->order_by('noml', 'DESC');
    return $this->db->get();
   }

   // recherche de formations
   function fetch_data_search_formation_to_lean($query)
   {
    $this->db->select("*");
    $this->db->from("formation");
    $this->db->limit(9);
    if($query != '')
    {
     $this->db->like('idformation', $query);
     $this->db->or_like('nomformation', $query);
     $this->db->or_like('prix', $query);

    }
    $this->db->order_by('nomformation', 'ASC');
    return $this->db->get();
   }



   function recherche_utilisateur_requete($query){
    $this->db->select("*");
    $this->db->from("users");
    $this->db->limit(7);
    if($query != '')
    {
     $this->db->like('id', $query);
     $this->db->or_like('telephone', $query);
     $this->db->or_like('first_name', $query);
     $this->db->or_like('first_name', $query);
     $this->db->or_like('email', $query);
    }
    $this->db->order_by('first_name', 'ASC');
    return $this->db->get();
   }


   function recherche_utilisateur_requete_groupe($query,$code_groupe){
    $this->db->select("*");
    $this->db->from("profile_groupe");
    $this->db->limit(7);
    $this->db->where("code_groupe", $code_groupe);
    if($query != '')
    {
     $this->db->like('id', $query);
     $this->db->or_like('first_name', $query);
     $this->db->or_like('first_name', $query);
     $this->db->or_like('email', $query);
    }
    $this->db->order_by('first_name', 'ASC');
    $this->db->group_by('id');
    return $this->db->get();
   }



   function get_users_groupe_by_code($code){

   $resultat = $this->db->query("SELECT * FROM profile_groupe WHERE code='".$code."' LIMIT 100 ");
    return $resultat;
   }



   function detail_livre_book($idl){
    $this->db->where("idl", $idl);
    $query = $this->db->get("profile_livre");
    return $query;
   }

   function follower_number($id_sender){
      $nombre;
      $query = $this->db->query("SELECT count(id_sender) AS nombre FROM follower WHERE id_sender='".$id_sender."'");
      if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $key) {
          $nonbre = $key["nombre"];
        }
        return $nombre;
      }
      else{
        $nonbre = 0;
        return $nombre;
      }


   }

   function following_number($id_recever){
      $nombre;
      $query = $this->db->query("SELECT count(id_recever) AS nombre FROM follower WHERE id_recever='".$id_recever."'");
      if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $key) {
          $nonbre = $key["nombre"];
        }
        return $nombre;
      }
      else{
        $nonbre = 0;
        return $nombre;
      }


   }

   // script de map
   // get closest providers
    // around 30 kilo meters from your location
    // by using latitude , longtuide and service id //
    function get_closest_locations($lng,$lat,$ServiceId){
         $results= $this->db->query("SELECT fullname as first_name,CONCAT(ci_providers.user_id,',',ServiceDesc) AS dscr,CONCAT(lat,',', lng) as pos,'http://maps.google.com/mapfiles/ms/icons/green.png' AS icon, users.first_name as fullname,users.last_name,
    ( 6371 * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance
    FROM ci_providers INNER JOIN users ON ci_providers.user_id=users.id
    INNER JOIN ci_services  ON ci_services.user_id = ci_providers.user_id
    AND ci_services.ServiceId = $ServiceId
    HAVING distance <= 8000
    ORDER BY distance ASC
      ")->result_array();
        return $results;
    }











 }  