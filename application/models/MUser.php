<?php
class MUser extends CI_Model{
 
  function validate($user,$password){
    $this->db->where('Email',$user);
    $this->db->or_where('username',$user);
    $this->db->where('Password',$password);
    $result = $this->db->get('user',1);
    return $result;
  }
  
 
}