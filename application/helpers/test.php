// Receive OAuth code parameter
$code = $_GET['code'];

// Check whether the user has granted access
if (true === isset($code)) {

  // Receive OAuth token object
  $data = $instagram->getOAuthToken($code);
  echo 'Your username is: '.$data->user->username;
  
  echo '<img src='.$data->user->profile_picture.' >';

  // Store user access token
  $instagram->setAccessToken($data);

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
  	

} else {


}