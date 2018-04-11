<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kyc_m extends CI_Model{
	public function submit($user_id){
		$field1=array(
			'first_name'=>$this->input->post('f_name'),
			'last_name'=>$this->input->post('l_name'),
			'identity_card'=>$this->input->post('document'),
			'photo_id'=>$this->input->post('selfie'),
			'user_id'=>$user_id,
			
		);
		
		$this->db->insert('kyc',$field1);
		if($this->db->affected_rows() > 0){

			return true;

		}
		else
		{
			return false;
		}
	}
	 
	
}
?>
