<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Success extends CI_Controller {

public function index()
	{

require 'application/libraries/instagram.php';
require 'application/config/instagram.config.php';

session_start();

$this->load->view('success_page');

if(isset($this->session->userdata['access_token'])) {
   $this->instagram->setAccessToken($this->session->userdata['access_token']);
}


// Receive OAuth code parameter
$code = $_GET['code'];

if($this->session->userdata('instagram') === false && isset($_GET['code'])) {
			$user = $this->instagram->getOAuthToken($_GET['code']);
			$this->session->set_userdata($user);
		}
		else {
			throw new Exception('Did not get any user token');
		}

// Check whether the user has granted access

  // Receive OAuth token object
  $data = $instagram->getOAuthToken($code);
  echo 'Your username is: '.$data->user->username;
  
  echo '<img src='.$data->user->profile_picture.' >';

  // Store user access token
  $instagram->setAccessToken($data);
  
  echo 'Access Token: '.$data->access_token;

  // Now you can call all authenticated user methods
  // Get all user likes
  $likes = $instagram->getUserLikes();
  
  $feeds = $instagram->getUserFeed();
  
  $user_follows = $instagram->getUserFollows();
  

  // Display all user likes
  foreach ($likes->data as $entry) {
    echo "<img src=\"{$entry->images->thumbnail->url}\">";
  }
  
    /* print_r($user_follows); */
    
    foreach ($feeds->data as $feed) {
    echo "<img src=\"{$feed->images->thumbnail->url}\">";
  	}
  	



}
}