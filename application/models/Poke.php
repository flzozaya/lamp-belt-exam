<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Poke extends CI_Model {
   public function get_all_users($user_id)
     {
         return $this->db->query("SELECT id, name, alias, email, poke_received FROM users
          WHERE id != ?", $user_id)->result_array();
     }

    public function get_user_poked($id) 
    {
    	return $this->db->query("SELECT alias, poke_received FROM users
          WHERE id = ?", $id)->row_array();
    }

    public function update_user_poked($num, $id) {
    	

    	$query1 = "UPDATE users SET 
    	poke_received = ? 
    	WHERE id = ?";
    	
    	return $this->db->query($query1, array($num, $id));
    }


    public function get_all_pokes($user_poked_alias, $logged_userID)
    {
    	return $this->db->query("SELECT poked_user, pokes_made, user_id FROM pokes
          WHERE poked_user = ? AND user_id = ?", array($user_poked_alias, $logged_userID))->row_array();
    }

   	public function get_poke_record($userName)
   	{
   		
   		$query = "SELECT alias, pokes_made FROM users
LEFT JOIN pokes ON user_id = users.id WHERE poked_user = ?";

   		return $this->db->query($query, $userName)->result_array();
   	}


    public function poke_insert($user_poked_alias, $logged_userID)
    {
    	
    	$query = "INSERT INTO pokes (
    		pokes_made, 
    		poked_user, 
    		user_id, 
    		created_at,
    		updated_at) 
			
			VALUES (1, ?, ?, NOW(), NOW())";
		
		$values = array($user_poked_alias, $logged_userID);
    	
    	$this->db->query($query, $values);

    }

    public function poke_add($poke_increment, $user_poked_alias, $logged_userID) 
    {
    	$query = "UPDATE pokes SET
    	pokes_made = ?
    	WHERE poked_user = ?
    	AND user_id = ?";

    	return $this->db->query($query, array($poke_increment, $user_poked_alias, $logged_userID));
    }
}
?>