
 <?php

if($this->session->userdata('id')) {
  $id=$this->session->userdata('id');
}
elseif($this->session->userdata('admin_login')) {
  $id=$this->session->userdata('admin_login');
}
elseif($this->session->userdata('instuctor_login')) {
  $id=$this->session->userdata('instuctor_login');
}
else{
  $id=0;
}

 $first_name;
 $last_name;
 $email;
 $image;
 $telephone;
 $full_adresse;
 $biographie;
 $date_nais;
 $passwords;
 $idrole;

 $facebook;
 $linkedin;
 $twitter ;

 $university;
 $faculte;
 $option ;
 $sexe;

 $this->db->where("id", $id) ;
 $users_details = $this->db->get("users")->result_array();

 foreach ($users_details as $row) {
  $id_user      = $row["id"];
  $first_name   = $row["first_name"];
  $last_name    = $row["last_name"];
  $email        = $row["email"];
  $image        = $row["image"];
  $telephone    = $row["telephone"];
  $full_adresse = $row["full_adresse"];
  $biographie   = $row["biographie"];
  $date_nais    = $row["date_nais"];
  $passwords    = $row["passwords"];
  $idrole       = $row["idrole"];
  $sexe         = $row["sexe"];

  $facebook     = $row["facebook"];
  $linkedin     = $row["linkedin"];
  $twitter      = $row["twitter"];

  $university   = $row["university"];
  $faculte      = $row["faculte"];
  $option       = $row["option"];
  
 }


  $nombre_follower;
  $query1 = $this->db->query("SELECT count(id_sender) AS nombre FROM follower WHERE id_sender='".$id_user."'");
  if ($query1->num_rows() > 0) {
    foreach ($query1->result_array() as $key) {
      $nombre_follower = $key["nombre"];
    }
  }
  else{
    $nombre_follower = 0;
  }


  $nombre_following;
  $query = $this->db->query("SELECT count(id_recever) AS nombre FROM follower WHERE id_recever='".$id_user."'");
  if ($query->num_rows() > 0) {
    foreach ($query->result_array() as $key) {
      $nombre_following = $key["nombre"];
    }
  }
  else{
    $nombre_following = 0;
  }


 // les scripts commencent déjà
 $nombre_de_favory3;
 $nom_cours__favory;
 $created_at_favory;
 $idcours_favory;
 $this->db->where('id_user', $id);
 $this->db->order_by('created_at', 'desc');
 $this->db->limit(10);
 $favory= $this->db->get("profile_favories2");
 if ($favory->num_rows() > 0) {
  $nombre_de_favory3 = $favory->num_rows();

  foreach ($favory->result_array() as $not4) {
    $nom_cours__favory  = $not4['noml'];
    $idcours_favory     = $not4['idl'];
 
  }

 }
 else{
  $nombre_de_favory3=0;
 } 

 $nombre_de_notification;
    $message;
    $url_notification;
    $created_at_notification;
    $this->db->where('id_user', $id);
    $this->db->order_by('created_at', 'desc');
    $Notifications= $this->db->get("notification");
    if ($Notifications->num_rows() > 0) {
        $nombre_de_notification = $Notifications->num_rows();

        foreach ($Notifications->result_array() as $not) {
          $message  = $not['message'];
          $url_notification   =   $not['url'];
          $created_at_notification = $not['created_at'];
          
        }

    }
    else{
    $nombre_de_notification=0;
    } 



$nombre_de_message;
$messagerie = $this->db->query("SELECT idmessage,id_user,id_recever, messagerie.created_at, users.first_name,users.last_name, users.image, message FROM messagerie INNER JOIN users ON  users.id= messagerie.id_user WHERE messagerie.id_recever = '".$id."'  ORDER BY messagerie.created_at DESC LIMIT  20");
if ($messagerie->num_rows() > 0) {
  $nombre_de_message= $messagerie->num_rows();
}
else{
  $nombre_de_message= 0;
}




 





 ?>

 <?php 
 $nombre_du_groupe;
$groups = $this->db->query("SELECT groupe.idgroupe,code_groupe,id_user,groupe.message,groupe.fichier,groupe.created_at,
groupe_chat.nom,groupe_chat.image as logo,groupe_chat.code, users.first_name,users.last_name,users.image,
users.id,users.email  FROM groupe INNER JOIN groupe_chat 
ON groupe.code_groupe=groupe_chat.code INNER JOIN users ON groupe.id_user= users.id WHERE groupe.id_user='".$id."' group BY groupe.code_groupe");
if ($groups->num_rows() > 0) {
  $nombre_du_groupe =  $groups->num_rows() ;
}
else{
    $nombre_du_groupe = 0;
}


 ?>

<nav class="navbar top-navbar">
        <div class="container-fluid">

            <div class="navbar-left">
                <div class="navbar-btn">
                    <a href="index.html"><img src="<?= base_url('js/assets/images/icon.svg')?>" alt="Oculux Logo" class="img-fluid logo"></a>
                    <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
                </div>
                <ul class="nav navbar-nav">
                    <!-- message -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-envelope"></i>
                            <span class="notification-dot bg-green"><?php echo($nombre_de_message) ?></span>
                        </a>
                        <ul class="dropdown-menu right_chat email vivify fadeIn">
                            <li class="header green"><a href="<?php echo(base_url()) ?>admin/message/<?php echo($id) ?>" class="text-white">Vous avez <?php echo($nombre_de_message) ?> messages</a></li>

                             <?php



                             $nombre_de_message;
                             $message_description;
                             $created_at_message;
                             $idcours_favory;

                             $message = $this->db->query("SELECT idmessage,id_user,id_recever, messagerie.created_at, users.first_name,users.last_name, users.image, message FROM messagerie INNER JOIN users ON  users.id= messagerie.id_user WHERE messagerie.id_recever = '".$id."'  ORDER BY messagerie.created_at DESC LIMIT 6 ");

                             if ($message->num_rows() > 0) {
                              $nombre_de_favory = $message->num_rows();

                              foreach ($message->result_array() as $not5) {
                                
                                ?>

                                <li>
                                    <a href="<?php echo(base_url()) ?>admin/chat_admin/<?php echo($id) ?>/<?php echo($not5['id_user']) ?>">
                                        <div class="media">
                                            <div class="avtar-pic w35 bg-green">
                                                <span>
                                                    <img src="<?php echo(base_url()) ?>upload/photo/<?php echo($not5['image']) ?>" class="img  img-thumbnail">
                                                </span>
                                                
                                            </div>
                                            <div class="media-body">
                                                <span class="name"><?php echo($not5['first_name']); ?> <?php echo($not5['last_name']); ?> <small class="float-right text-muted"><?php echo(substr(date(DATE_RFC822, strtotime($not5['created_at'])), 0, 23)); ?></small></span>
                                                <span class="message"><?php echo(substr($not5['message'], 0,20)); ?>...</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <?php
                              }

                              

                             }
                             else{
                              $nombre_de_message=0;
                             } 


                             ?>
                            
                        </ul>
                    </li>
                    <!-- fin message -->

                    <!-- debit notification -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="icon-bell"></i>
                            <span class="notification-dot bg-azura"><?php echo($nombre_de_notification) ?></span>
                        </a>
                        <ul class="dropdown-menu feeds_widget vivify fadeIn">
                            <li class="header blue"><a href="<?php echo(base_url()) ?>admin/notification/<?php echo($id) ?>" class="text-white">Vous avez <?php echo($nombre_de_notification) ?> notifications</a></li>

                                <?php

                                   $this->db->where('id_user', $id);
                                   $this->db->order_by('created_at', 'desc');
                                   $this->db->limit(6);
                                   $Notifications= $this->db->get("notification");
                                   if ($Notifications->num_rows() > 0) {
                                    $nombre_de_notification = $Notifications->num_rows();

                                    foreach ($Notifications->result_array() as $not) {
                                     
                                      ?>
                                     

                                       <li>
                                            <a href="<?php echo(base_url()) ?><?php echo($not['url']) ?>">
                                                <div class="feeds-left bg-info"><i class="<?php echo($not['icone']) ?>"></i></div>
                                                <div class="feeds-body">
                                                    <h4 class="title text-info"><?php echo($not["titre"]) ?> <small class="float-right text-muted"><?php echo(substr(date(DATE_RFC822, strtotime($not['created_at'])), 0, 23)); ?></small></h4>
                                                    <small><?php echo($not["message"]) ?></small>
                                                </div>
                                            </a>
                                        </li>  


                                      <?php
                                    }

                                   }
                                   else{
                                    $nombre_de_notification=0;
                                   } 

                                 ?>


                        </ul>
                    </li>
                    <!-- fin notification -->


                     <!-- favory -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class=" icon-heart"></i>
                            <span class="notification-dot bg-warning"><?php echo($nombre_de_favory3) ?></span>
                        </a>
                        <ul class="dropdown-menu right_chat email vivify fadeIn">
                            <li class="header bg-warning"><a href="<?php echo(base_url()) ?>admin/favory/<?php echo($id) ?>" class="text-white">Vous avez <?php echo($nombre_de_favory3) ?> cours dans le favori</a></li>

                            <?php

                             $nombre_de_favory;
                             $nom_cours__favory;
                             $created_at_favory;
                             $idcours_favory;
                             $this->db->where('id_user', $id);
                             $this->db->order_by('created_at', 'desc');
                             $this->db->limit(10);
                             $favory= $this->db->get("profile_favories2");
                             if ($favory->num_rows() > 0) {
                              $nombre_de_favory = $favory->num_rows();

                              foreach ($favory->result_array() as $not4) {
                                $nom_cours__favory  = $not4['noml'];
                                $idcours_favory     = $not4['idl'];

                                ?>
                                <!-- <?php echo(base_url()) ?>upload/cours/<?php echo($not4['image']) ?> -->

                                <li>
                                    <a href="<?php echo(base_url()) ?><?php echo($not4['url']) ?>">
                                        <div class="media">
                                            <div class="avtar-pic w35 bg-warning">
                                                <span>
                                                    <img src="<?php echo(base_url()) ?>upload/livre/<?php echo($not4['image']) ?>" class="img  img-thumbnail">
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <span class="name"><?php echo($nom_cours__favory) ?> <small class="float-right text-muted"><?php echo(substr(date(DATE_RFC822, strtotime($not4['created_at'])), 0, 23)); ?></small></span>
                                                <span class="message">nom du livre</span>

                                            </div>
                                        </div>

                                    </a>

                                  
                                   <!-- lien -->
                                
                                </li>

                                <?php
                                
                              }

                             }
                             else{
                              $nombre_de_favory=0;
                             } 


                             ?>

                        </ul>
                    </li>
                    <!-- fin favory -->


                    <li class="dropdown language-menu">
                        <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                            <i class="fa fa-language"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="<?= base_url('js/assets/images/flag/us.svg')?> " class="w20 mr-2 rounded-circle"> US English</a>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="<?= base_url('js/assets/images/flag/gb.svg')?> " class="w20 mr-2 rounded-circle"> UK English</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="<?= base_url('js/assets/images/flag/russia.svg')?> " class="w20 mr-2 rounded-circle"> Russian</a>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="<?= base_url('js/assets/images/flag/arabia.svg')?> " class="w20 mr-2 rounded-circle"> Arabic</a>
                            <a class="dropdown-item pt-2 pb-2" href="#"><img src="<?= base_url('js/assets/images/flag/france.svg')?> " class="w20 mr-2 rounded-circle"> French</a>
                        </div>
                    </li>

                    
                   
                    <li class="p_social"><a href="<?php echo(base_url()) ?>admin/news_app" class="social icon-menu" title="News">Information</a></li>
                    <li class="p_news"><a href="<?php echo(base_url()) ?>admin/view_formation" class="news icon-menu" title="News">Les formations</a></li>
                    <!-- <li class="p_blog"><a href="page-blog.html" class="blog icon-menu" title="Blog">Blog</a></li> -->
                </ul>
            </div>
            
            <div class="navbar-right">
                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                        <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i class="icon-magnifier"></i></a></li>                        
                        <li><a href="javascript:void(0);" class="right_toggle icon-menu" title="Right Menu"><i class="icon-bubbles"></i><span class="notification-dot bg-pink"><?php echo($nombre_du_groupe) ?></span></a></li>
                        <li><a href="<?php echo(base_url()) ?>login/logout" class="icon-menu"><i class="icon-power"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
    </nav>
    
    <!-- zone de recherche -->
    <div class="search_div">
        <div class="card">
            <div class="body">
                <form id="navbar-search" class="navbar-form search-form">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control rechercher_un_utilisateur" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="icon-magnifier"></i></span>
                            <a href="javascript:void(0);" class="search_toggle btn btn-danger"><i class="icon-close"></i></a>
                        </div>
                    </div>
                </form>
            </div>            
        </div>
       
        <div class="table-responsive resutat_de_recherce_users">
            <table class="table table-hover table-custom spacing5">
                <tbody>
                    <?php 
                    $this->db->limit(7);
                    $users = $this->db->get("users")->result_array();
                    foreach ($users as $key ) {
                        ?>
                        <tr>
                            <td>
                                <span><i class="fa fa-camera"></i></span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?= base_url()?>upload/photo/<?php echo($key['image']) ?>" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Avatar Name">
                                    <div class="ml-3">
                                        <a href="<?php echo(base_url()) ?>admin/detail_users_profile/<?php echo($key['id']) ?>" title=""><?php echo($key['first_name']) ?></a>
                                        <p class="mb-0"><?php echo($key['email']) ?></p>
                                    </div>
                                </div>                                        
                            </td>
                        </tr>
                        <?php
                    }


                     ?>
                    
                   
                </tbody>
            </table>
        </div>
    </div>

    <!-- fin de la wone de recherche -->


    <!-- zone de chat et messagerie -->
    <div id="rightbar" class="rightbar">
        <div class="body">
            <ul class="nav nav-tabs2">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Chat-one">Chat</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-list">List</a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat-groups">Groups</a></li>
            </ul>
            <hr>
            <div class="tab-content">
                <div class="tab-pane vivify fadeIn delay-100 active" id="Chat-one">
                    <div class="slim_scroll">
                        <div class="chat_detail">
                            <ul class="chat-widget clearfix">
                                <?php 
                                $users_chat = $this->db->query("SELECT * FROM messagerie 
                                    WHERE id_user='".$id."' ORDER BY created_at DESC LIMIT 1 ");
                                if ($users_chat->num_rows() > 0) {
                                    foreach ($users_chat->result_array() as $key) {
                                        $id_recever = $key['id_recever'];
                                        // echo($id_recever);



                                        $connected= $id;
                                        $CodeEntrep= $id_recever;

                                        $chat= $this->db->query("SELECT id_user,id_recever, messagerie.created_at, messagerie.fichier, users.first_name,users.last_name, users.image, message FROM messagerie 
                                        inner join 
                                        users on users.id=messagerie.id_user WHERE (id_user='".$CodeEntrep."' AND id_recever='".$id_user."')
                                        OR (id_recever='".$CodeEntrep."' AND id_user='".$id_user."')
                                         ORDER BY created_at ASC");
                                        if ($chat->num_rows() < 0) {
                                            # code...
                                        }
                                        else{

                                            foreach ($chat->result_array() as $data) {
                                                ?>

                                                <li class="<?= ($data['id_user'] == $connected) ? 'right' : 'left float-left' ?> ">
                                                    <div class="avtar-pic w35 bg-pink">
                                                        <span>
                                                        <img class="user_pix" src="<?php echo(base_url()) ?>upload/photo/<?php echo($data['image']) ?>" alt="avatar">
                                                        </span>
                                                    </div>
                                                    <div class="chat-info">
                                                        <?php 

                                                        if ($data['message'] !='') {
                                                          ?>
                                                          <span class="message">
                                                            <?php 
                                                                echo(nl2br($data['message']));
                                                            ?>
                                                          </span>
                                                          <?php
                                                        }

                                                        ?>
                                                        

                                                        <?php 

                                                        if ($data['fichier'] !='') {
                                                          ?>
                                                          <span class="message"><a href="<?php echo(base_url()) ?>upload/groupe/fichier/<?php echo($data['fichier']) ?>" download="<?php echo(base_url()) ?>upload/groupe/fichier/<?php echo($data['fichier']) ?>" class="text-muted"><i class="fa fa-download"></i> télécharger ce fichier</a></span>
                                                          <?php
                                                        }

                                                       ?>

                                                       <span class="data_time">
                                                        <?php echo substr(date(DATE_RFC822, strtotime($data['created_at'])), 0, 23); ?>
                                                            
                                                        </span>

                                                        
                                                    </div>
                                                    
                                                </li>

                                                

                                                <?php
                                            }
                                        }


                                     


                                    }

                                    ?>
                                    <!-- formulaire d'envoie -->
                                    <div class="input-group p-t-15">

                                        <form action="<?php echo(base_url()) ?>admin/chat_local_view/<?php echo($id) ?>/<?php echo($id_recever) ?>" method="post" enctype="multipart/form-data">
                                                
                                            <div class="input-group mb-0">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <button type="submit" class="btn btn-info">
                                                            <i class="fa fa-send"></i>
                                                        </button>

                                                      <label class="btn btn-link" for="user_image" data-toggle="tooltip" data-placement="top" title="Attachez un fichier"><i class="icon-paper-clip text-muted"></i></label>

                        
                                                      <input type="file" name="user_image" id="user_image" style="display: none;"/>


                                                    </span>
                                                </div>
                                                <textarea type="text" name="Message_text" row="" class="form-control" minlength="2" placeholder="Quoi de news?" required=""></textarea>
                                            </div>

                                        </form>


                                        
                                    </div>
                                    <!-- fin -->
                                    <?php
                                }
                                else{

                                    // si ce vide
                                    ?>
                                    <ul class="right_chat list-unstyled mb-0">
                                        <?php
                                            $this->db->limit(10);
                                            $this->db->order_by('created_at', 'Desc');
                                        $online= $this->db->get('profile_online');
                                        if ($online->num_rows() > 0) {
                                          ?>
                                         
                                            <?php 
                                            foreach ($online->result_array() as $key) {



                                               ?>

                                               <li class="online">
                                                    <a href="<?php echo(base_url()) ?>admin/detail_users_profile/<?php echo($key['id_user']) ?>">
                                                        <div class="media">
                                                            <div class="avtar-pic w35 bg-red">
                                                                <span>
                                                                <img src="<?= base_url()?>upload/photo/<?php echo($key['image']) ?>" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Discuter avec <?php echo($key['first_name']) ?>">
                                                                </span>
                                                            </div>
                                                            <div class="media-body" style="padding-right: 10px;">
                                                                <span class="name">&nbsp;&nbsp;@<?php echo(substr($key['first_name'].' '.$key['last_name'], 0,25)) ?>... </span>
                                                                <?php 

                                                                if ($key['id_user'] != $id) {
                                                                    ?>
                                                                    <span class="message">
                                                                        <a href="<?php echo(base_url()) ?>admin/chat_admin/<?php echo($id) ?>/<?php echo($key['id_user']) ?>">
                                                                    &nbsp;&nbsp;<i class="fa fa-comments-o"></i> message
                                                                        </a> 
                                                                    </span>
                                                                    <?php
                                                                }
                                                                else{

                                                                    ?>
                                                                    <span class="message">
                                                                        <a href="<?php echo(base_url()) ?>admin/detail_users_profile/<?php echo($key['id_user']) ?>" class="text-warning">
                                                                    &nbsp;&nbsp;<i class="fa fa-user"></i> profile
                                                                        </a> 
                                                                    </span>
                                                                    <?php

                                                                }

                                                                 ?>

                                                                <span class="badge badge-outline status"></span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>

                                                 
                                               <?php
                                             }

                                             ?>
                                         
                                          <?php
                                        }
                                        else{

                                        }

                                        ?>
                                    </ul>
   
                                    <?php
                                    // fin de scripts

                                }

                                 ?>

                                
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane vvivify fadeIn delay-100" id="Chat-list">
                    <ul class="right_chat list-unstyled mb-0">

                        <?php 

                        $status ="";
                        $msg_status= "";
                        

                        $users = $this->db->query("SELECT users.id, users.first_name,users.biographie ,users.last_name,users.image,users.telephone,users.email FROM users INNER JOIN follower ON follower.id_recever= users.id WHERE follower.id_sender='".$id."' GROUP BY follower.id_recever ORDER BY follower.created_at DESC")->result_array();
                        foreach ($users as $key ) {

                            $test = $this->db->query("SELECT * FROM profile_online");
                            if ($test->num_rows() > 0) {

                                foreach ($test->result_array() as $row) {
                                    
                                    if ($key['id'] == $row['id_user']) {
                                        $status ="inline";
                                        $msg_status= "en ligne";
                                    }
                                    else{

                                        $status ="offline";
                                        $msg_status= "n'est pas en ligne";
                                    }
                                }
                                
                            }
                            else{
                                $status ="offline";
                                $msg_status= "n'est pas en ligne";
                            }

                            $url = '';
                            if ($key['id'] == $id) {
                                $url = "javascript:void(0)";
                            }
                            else{
                                $url = base_url().'admin/chat_admin/'.$id.'/'.$key['id'];
                            }

                            ?>

                            <li class="<?php echo($status) ?>">
                                <a href="<?php echo($url) ?>">
                                    <div class="media">
                                        <div class="avtar-pic w35 bg-danger"><span>
                                            <img src="<?= base_url()?>upload/photo/<?php echo($key['image']) ?>" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Discuter avec <?php echo($key['first_name']) ?>">
                                        </span></div>
                                        <div class="media-body">
                                            <span class="name"><?php echo($key['first_name']) ?></span>
                                            <span class="message"><?php echo($msg_status) ?></span>
                                            <span class="badge badge-inline status"></span>
                                        </div>
                                    </div>
                                </a>                            
                            </li>

                            <?php
                        }


                         ?>

                    </ul>
                </div>
                <div class="tab-pane vivify fadeIn delay-100" id="Chat-groups">
                    <ul class="right_chat list-unstyled mb-0">

                        <!-- les scripts de groupe -->

                        <?php 
                        $groups = $this->db->query("SELECT groupe.idgroupe,code_groupe,id_user,groupe.message,groupe.fichier,groupe.created_at,
                        groupe_chat.nom,groupe_chat.image as logo,groupe_chat.code, users.first_name,users.last_name,users.image,
                        users.id,users.email  FROM groupe INNER JOIN groupe_chat 
                        ON groupe.code_groupe=groupe_chat.code INNER JOIN users ON groupe.id_user= users.id WHERE groupe.id_user='".$id."' group BY groupe.code_groupe");
                        if ($groups->num_rows() > 0) {
                            foreach ($groups->result_array() as $key) {
                               ?>
                               <li class="offline">
                                    <a href="<?php echo(base_url()) ?>admin/chat_admin2/<?php echo($id) ?>/<?php echo($key['code']) ?>">
                                        <div class="media">
                                            <div class="avtar-pic w35 bg-cyan">
                                                <span>
                                                    <img src="<?= base_url()?>upload/groupe/<?php echo($key['logo']) ?>" data-toggle="tooltip" data-placement="top" title="" alt="Avatar" class="w35 h35 rounded" data-original-title="Discuter avec les membres du groupe <?php echo($key['nom']) ?>">
                                                </span>
                                            </div>
                                            <div class="media-body">
                                                <span class="name"><?php echo($key['nom']) ?></span>
                                                
                                                <span class="badge badge-outline status"></span>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                               <?php
                            }
                        }
                        else{

                        }


                         ?>


                        
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- fin zone de messagerie -->




