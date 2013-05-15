<?php
class Instagram_data extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    
    function store($userid) {
    // 1. load the library
    // 2. check if user has a token stored in his session, if not, library will use the default app-token.
    if(isset($this->session->userdata['access_token'])) {
         $this->instagram->setAccessToken($this->session->userdata['access_token']);
    }
    // 3. call the API using the library.
    $result = $this->instagram->getUserMedia($userid, $this->limit);
    // 4. check if we got any data (should display errors too, but you get the point)
    if($result == false || !isset($result->data)) {
         $return false;
    }
    // 5. return data to other function in model, controller or view. (in 'I Think I Might' I would format the data before and also update any cache info before I send it to the controller or view) 
    return $result; 
	}
	   
    
}