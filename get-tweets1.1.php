<?php
session_start();
require_once("twitteroauth.php"); //Path to twitteroauth library

//CREATED BY SHASHANK SAXENA
//www.TECHHANSERVICES.COM
 
 
$twitteruser = "shashanksaxena_";
$notweets = 5;
$consumerkey = "YOUR CONSUMER KEY";
$consumersecret = "YOUR CONSUMER SECRET";
$accesstoken = "YOUR ACCESS TOKEN";
$accesstokensecret = "YOUR ACCESS TOKEN SECRET";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 

 
//$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

//THE ABOVE WILL FETCH TWEETS WILL GET THE CONTENTS WITH A CERTAIN USERNAME

 $tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=shrmi14");
//THIS WILL GET THE TWEETS FROM CERTAIN HASHTAG

 $json_res= json_encode($tweets);
 
$res=json_decode($json_res, true);

echo("<pre>");

print_r($res);



?><marquee>
<?php
for ($i = 0; $i <= $notweets; $i++)
{
  
  print_r($res[$i]['text']);
  echo("---------------------------------------");
  
}
?></marquee>
<?php
	

?>
