<?php 
//session_start();
require_once "src/facebook.php"; 
 
$config = array(
    "appId" => '204429843068542',
    'secret' => 'abacef2b05727bfd1e76e96c9cc0393a');
 
 
$facebook = new Facebook($config);


//access_token will change every time ,u log out or after one hour(as its temporary)

// $access_token = $facebook->getAccessToken();
 
$new_access_token="CAAC57Ygtdn4BAPlSFqe5mLUXv7YHZCSOPbASUhIbuwEJvZCB1C6wIbteVWA6tuqupyQn5JVqth9BAPcL5XJTRfixekVtS94WfcSGMpCE2cxglRaGGFec2DIZB7JLIHPnQfdMzhe8BAZC6iNMIC5DarNTlVYZCQtuEORn6S116VPAhtyzqw9rmYUGW97SEUvAZD";
$facebook->setAccessToken($new_access_token);
 //echo $access_token;
$access_token=$new_access_token;
 $user = $facebook->getUser(); //return user id 
 echo $user;


 
 
if ($user) {
    try {
        $user_profile = $facebook->api('/me');
    } catch (FacebookApiException $e) {
        $user = null;
    }
}
 
if (!$user) {
    $args['scope'] = 'friends_online_presence';
    $loginUrl = $facebook->getLoginUrl($args);
 
 //echo $loginUrl;
    // display login link
}



//dowloading all pics from friends album



$user1="100000112506107";
if ($user) {
    $fql = "SELECT src FROM photo WHERE owner = $user1";
 
    $result = $facebook->api(array(
        'method' => 'fql.query',
        'query' => $fql,
    ));
	$a=1;
foreach($result as $inner_arr)
foreach($inner_arr as $value)
{

//echo $value."<br/>";
$replace=str_replace("https","http",$value);
set_time_limit(10000) ;
$lnk=$replace;
file_put_contents('upload/image'.$a++.'.jpg',
    file_get_contents($lnk));    
	
}
	
}



//getting details of friends

/*
$user1="100002199390409";
if ($user) {
    $fql = "SELECT attachment FROM message WHERE author_id=$user1";
 
    $result = $facebook->api(array(
        'method' => 'fql.query',
        'query' => $fql,
    ));
	}
print "<pre>"; 
 print_r($result)."</br>";
print "</pre>";
*/
 
 
	 
	//getting details of friends who are online/idele/offline
	
	
/*	 

if ($user) {
    $fql = "SELECT uid, name, online_presence,birthday,friend_count,movies,education
            FROM user
            WHERE online_presence IN ('active', 'idle')
            AND uid IN (
                SELECT uid2 FROM friend WHERE uid1 = $user
            )";
 
    $result = $facebook->api(array(
        'method' => 'fql.query',
        'query' => $fql,
    ));
foreach($result as $inner_arr)
foreach($inner_arr as $value)
echo $value."<br/>";
*/
 
 
 
 

 
 
 /*
 // status update code
$status=$_POST['msg'];

if($status!=NULL)
{
 $attachment =  array(
       // 'access_token' => $access_token,
        'message' =>$status
    );
	
	 $response = $facebook->api("/100003799644743/feed/", 'POST', $attachment);
	 
}
	
	//pic upload and pic description code
	
if (!$user) { 
    $params = array(
        "scope" => "read_stream,publish_stream,user_photos",
        "http://localhost/facebook/" => REDIRECT_URI);
    $facebook->getLoginUrl($params);
}
else {  
  
                $data = array(
                    "name" => $_POST["message"],
                    "image" => "@" . realpath($_FILES["image"]["tmp_name"]));
                $facebook->setFileUploadSupport(true); 
                $status = $facebook->api("/100003799644743/photos", "POST", $data);    
            
  }

  */
?>   
	