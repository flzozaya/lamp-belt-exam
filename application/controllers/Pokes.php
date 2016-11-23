<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pokes extends MY_Controller {
 public function __construct()
        {
                parent::__construct();
        }

  public function index() 
  {

  	if(!$this->user_authentication())
      {
        redirect('/');
      } 

      	$id = $this->session->userdata('user_id');
      	$userName = $this->session->userdata('user');
      	$all_users = $this->Poke->get_all_users($id);
      	$all_pokes = $this->Poke->get_poke_record($userName);
      	
      	/*var_dump($all_pokes);
      	die();*/
        //$data = array('alias' =>);
        $this->load->view('pokes', array('session_user' => $this->session->userdata('user'),
        								  'users' => $all_users, 
        								  'poke_record' => $all_pokes
        	));    
  }

// $poke_record['poked_user']
  public function poke($id) 
  {
  	$user_poked = $this->Poke->get_user_poked($id);
  	
  	$num = $user_poked['poke_received'] + 1;
  	$logged_userID = $this->session->userdata('user_id');
  	
  	$this->Poke->update_user_poked($num, $id);


  	
  	$user_poked_alias = $user_poked['alias'];

  	$poke_relationship = $this->Poke->get_all_pokes($user_poked_alias, $logged_userID);

  	if($poke_relationship)
  	{
		$poke_increment = $poke_relationship['pokes_made'] + 1;
		$this->Poke->poke_add($poke_increment, $user_poked_alias, $logged_userID);

  	} else 
  	{

  		if(!$poke_relationship)
  		{
  			$this->Poke->poke_insert($user_poked_alias, $logged_userID);

  		}
  	}

  	redirect('/Pokes');
  }





}
?>