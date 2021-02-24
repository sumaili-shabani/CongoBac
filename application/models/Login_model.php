<?php
class login_model extends CI_Model
{
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




}

?>