<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Field extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       //$this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function index_get($email = 0, $password = 0)
	{
        if(!empty($email && $password)){
            $data = $this->db->get_where("field", ['email' => $email ,'password' => $password])->row_array();
        }else{
            $data = $this->db->get("field")->result();
        }
     
        $this->response($data, REST_Controller::HTTP_OK);
	}
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_post()
    {
        $input = $this->input->post();
        $result = $this->db->insert('field',$input);
        if($result) {
            $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);
        }
        else {
            $this->response(['Item not created successfully.'], REST_Controller::HTTP_OK);
        }
    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('field', $input, array('id'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('field', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}
