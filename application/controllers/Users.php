<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

 public function userCreate()
    {
      $this->load->view('user_create');
    }

    public function uploadUserData(){
          $userdata=($_POST);
          $user_roll_A=1;
          $user_roll_B=1;
          $user_roll_c=1;
          $user_roll_D=1;
          if(array_key_exists('user_roll_A',$userdata))
          		{
          			$user_roll_A=0;
          		}
          if(array_key_exists('user_roll_B',$userdata))
          		{
          			$user_roll_B=0;
          		}
          if(array_key_exists('user_roll_c',$userdata))
          		{
          			$user_roll_c=0;
          		}
          if(array_key_exists('user_roll_D',$userdata))
          		{
          			$user_roll_D=0;
          		}
              $this->db->trans_start();
               $sql="INSERT INTO mst_donor_board VALUES('', 0,'{$userdata['username']}','{$userdata['password']}','','{$userdata['email']}','{$userdata['mobile']}','','','{$user_roll_A}','{$user_roll_B}','{$user_roll_c}','{$user_roll_D}') ";
               // echo $sql;
               // die;
               	$query=$this->db->query($sql);
                if ($this->db->trans_status() === FALSE) {
                
                $this->db->trans_rollback();
                } 
                else {
                    $this->db->trans_commit();
                  }
                  redirect('users/userCreate');

        }

}