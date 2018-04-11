<?php
class Kyc extends CI_Controller
{
	function __construct(){
		parent::__construct();
		 $this->load->helper(array('form', 'url'));
	}

	function index(){
		$user_id = $_SESSION['etp_user_id'];
         
        $return = $this->_custom_query("select * from kyc where user_id = $user_id");
        if(count($return->result()) == 1)
        {
	        if($return->result()[0]->status == 0)
	        {
	            $msg = "verification in progress....thank you for your patience";
	            $value = '<div class="alert alert-success">' . $msg . '</div>';
	            $this->session->set_flashdata('item', $value);
	            redirect(base_url('user/dashboard'));  
	        } 
	        if($return->result()[0]->status == 2)
	        {
	            $msg = "successfully verified by admin";
	            $value = '<div class="alert alert-success">' . $msg . '</div>';
	            $this->session->set_flashdata('item', $value);
	            redirect(base_url('user/dashboard'));  
	        }
        } 
		if($this->input->post('submit')){
			$this->load->library('form_validation');

			$this->form_validation->set_rules('f_name','First Name','trim|required');
            $this->form_validation->set_rules('l_name','Last Name','trim|required');

            /*On wrong submission keep data in input field (Used session bcoz set_values() was not working AND LACK OF TIME*/
            $this->session->set_userdata('f_name',$this->input->post('f_name'));
            $this->session->set_userdata('l_name',$this->input->post('l_name'));

            if($this->form_validation->run()){
            	$first_name = $this->input->post('f_name');
            	$last_name = $this->input->post('l_name');
                $flag=$this->input->post('checkbox');
            	$document = $_FILES['document'];
            	if($document == ''){
            		$this->session->set_flashdata('err','Please Upload document');
            		redirect(base_url('kyc'));
            	}
            	$file1 = $this->do_upload('document');

            	$selfie = $_FILES['selfie'];
            	if($document == ''){
            		$this->session->set_flashdata('err','Please Upload document');
            		redirect(base_url('kyc'));
            	}
            	$file2 = $this->do_upload('selfie');
            	if($return->result()[0]->status == 1)
            	{
            		$this->_custom_query("delete from kyc where user_id = $user_id");
            	}
            	$query = $this->_custom_query("INSERT INTO kyc(first_name,last_name,identity_card,photo_id,user_id,flag) VALUES('$first_name','$last_name','$file2','$file1','$user_id','$flag')");
            	$msg = "Kyc form inserted successfully!";
                $value = '<div class="alert alert-success">' . $msg . '</div>';

                /* Unset session if session created after wrong submission */
                unset($_SESSION['f_name']);
                unset($_SESSION['l_name']);
                /* Unset session if session created after wrong submission */

                $this->session->set_flashdata('item', $value);
                redirect(base_url('kyc'));
            }

		}
		$data['return'] = $return->result()[0];
		$data['flash'] = $this->session->flashdata('item');
		$data['error'] = $this->session->flashdata('err');
		$this->load->view('user/Header',$data);
		$this->load->view('user/Kyc_from');
		$this->load->view('user/Footer');
	}

	 public function do_upload($file)
        {
        		$config['encrypt_name']			= true;
                $config['upload_path']          = './public/uploads/kyc';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1500;
                $config['max_width']            = 3000;
                $config['max_height']           = 1800;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload($file))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('err',$error);
                        redirect(base_url('kyc'));
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        return $data['upload_data']['file_name'];
                        
                }
        }

    function _custom_query($query)
    {
        $this->load->model('User_model');
        return $this->User_model->_custom_query($query);
    }   

}
?>
