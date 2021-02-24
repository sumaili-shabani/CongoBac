
<?php

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
 $id;
 $image_logo;
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

 
 $this->db->where("id", $id) ;

 $users_details = $this->db->get("users")->result_array();

 foreach ($users_details as $row) {

  $first_name = $row["first_name"];
  $last_name  = $row["last_name"];
  $email    = $row["email"];
  $image_logo    = $row["image"];
  $telephone  = $row["telephone"];
  $full_adresse   = $row["full_adresse"];
  $biographie   = $row["biographie"];
  $date_nais    = $row["date_nais"];
  $passwords    = $row["passwords"];
  $idrole     = $row["idrole"];
  
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


   $nombre_de_favory;
   $nom_cours__favory;
   $created_at_favory;
   $idcours_favory;
   $this->db->where('id_user', $id);
   $this->db->order_by('created_at', 'desc');
   $favory= $this->db->get("profile_favories");
   if ($favory->num_rows() > 0) {
    $nombre_de_favory = $favory->num_rows();

    foreach ($favory->result_array() as $not4) {
      $nom_cours__favory  = $not4['nomcours'];
      $idcours_favory     = $not4['idcours'];
      $created_at_favory  = $not4['created_at'];
      ?>
      
      <?php
    }

    ?>
   <!-- lien -->
    <?php

   }
   else{
    $nombre_de_favory=0;
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
<div id="left-sidebar" class="sidebar">
        <div class="navbar-brand">
            <a href="<?php echo(base_url()) ?>"><img src="<?= base_url('js/assets/images/icon.svg')?>" alt="Oculux Logo" class="img-fluid logo"><font color="red">C</font><font color="green">ongo</font><font color="red">B</font><font class="text-warning">ack</font></a>
            <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
        </div>
        <div class="sidebar-scroll">
            <div class="user-account">
                <div class="user_div">
                    <img src="<?= base_url()?>upload/photo/<?php echo($image_logo) ?>" class="user-photo" alt="User Profile Picture">
                </div>
                <div class="dropdown">
                    <span>Bienvenue,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?php echo($first_name) ?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                        <li><a href="<?php echo(base_url()) ?>instructor"><i class="icon-user"></i>Mon Profile</a></li>
                        <li><a href="<?php echo(base_url()) ?>instructor/message/<?php echo($id) ?>"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="<?php echo(base_url()) ?>instructor/detail_book_livre"><i class="icon-book-open"></i>Bibliothèque</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo(base_url()) ?>login/logout"><i class="icon-power"></i>Deconnexion</a></li>
                    </ul>
                </div>                
            </div>  
            <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu">
                    <li class="header">Main</li>
                    <!-- <li>
                        <a href="#myPage" class="has-arrow"><i class="icon-home"></i><span>My Page</span></a>
                        <ul>
                            <li><a href="index.html">My Dashboard</a></li>
                            <li><a href="index4.html">Web Analytics</a></li>
                            <li><a href="index5.html">Event Monitoring</a></li>
                            <li><a href="index6.html">Finance Performance</a></li>
                            <li><a href="index7.html">Sales Monitoring</a></li>
                            <li><a href="index8.html">Hospital Management</a></li>
                            <li><a href="index9.html">Campaign Monitoring</a></li>
                            <li><a href="index10.html">University Analytics</a></li>
                            <li><a href="index11.html">eCommerce Analytics</a></li>
                        </ul>
                    </li>
                    <li><a href="index2.html"><i class="icon-speedometer"></i><span>Dashboard</span></a></li>
                    <li><a href="index3.html"><i class="icon-diamond"></i><span>Crypto Coin</span></a></li>
                    <li><a href="../hrms/index.html"><i class="icon-rocket"></i><span>HRMS System</span></a></li>
                    <li><a href="../jobportal/index.html"><i class="icon-badge"></i><span>Job Portal</span></a></li>
                    <li><a href="../landing/index.html"><i class="icon-cursor"></i><span>Landing Page</span></a></li>
                    <li class="header">App</li>
                    <li>
                        <a href="#Contact" class="has-arrow"><i class="icon-book-open"></i><span>Contact</span></a>
                        <ul>
                            <li><a href="app-contact.html">List View</a></li>
                            <li><a href="app-contact2.html">Grid View</a></li>
                        </ul>
                    </li>
                    <li><a href="app-inbox.html"><i class="icon-envelope"></i><span>Email</span></a></li>
                    <li><a href="app-chat.html"><i class="icon-bubbles"></i><span>Messenger</span></a></li>
                    <li>
                        <a href="#Project" class="has-arrow"><i class="icon-bubbles"></i><span>Project</span></a>
                        <ul>
                            <li><a href="app-taskboard.html">Taskboard</a></li>
                            <li><a href="app-project-list.html">Project list</a></li>
                            <li><a href="app-ticket.html">Ticket List</a></li>
                            <li><a href="app-ticket-details.html">Ticket Details</a></li>
                            <li><a href="app-clients.html">Clients</a></li>
                            <li><a href="app-todo.html">Todo List</a></li>
                        </ul>
                    </li> -->
                    <li><a href="<?= base_url() ?>instructor/calendrier"><i class="icon-calendar"></i><span>Calendrier</span></a></li> 

                     <li><a href="<?= base_url() ?>instructor/map"><i class="icon-map"></i><span>Communauté Map</span></a></li>  


                    <li class="header">UI Elements</li>
                    
                     <li>
                        <a href="#uiComponents" class="has-arrow"><i class="icon-book-open"></i><span>Books</span></a>
                        <ul>
                            <li><a href="<?php echo(base_url()) ?>instructor/pending_livre_book">Pending Livres</a></li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="#uiComponents" class="has-arrow"><i class="icon-diamond"></i><span>Post du travail</span></a>
                        <ul>
                          
                          <li>
                            <a href="<?= base_url() ?>instructor/projet_plus">
                                Projet des apprenants
                            </a>
                          </li>

                          <li>
                            <a href="<?= base_url() ?>instructor/view_formation">
                                Liste formation
                            </a>
                          </li>

                          <li>
                            <a href="<?= base_url() ?>instructor/news_app">
                                Les nouvelles
                            </a>
                          </li>
                          
                            
                        </ul>
                    </li>


                    <li>
                        <a href="#uiComponents" class="has-arrow"><i class="icon-settings"></i><span>Parametrages</span></a>
                        <ul>
                           <li>
                            <a href="<?php echo(base_url()) ?>instructor/groupe">
                              Groupe de discution
                            </a>
                          </li>
                            
                        </ul>
                    </li>

                    <!-- autres scripts -->

                    <!-- fin de script -->









                   
                    

                   
                </ul>
            </nav>     
        </div>
    </div>