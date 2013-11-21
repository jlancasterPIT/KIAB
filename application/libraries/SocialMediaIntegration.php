<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
  require_once('../third_party/twitterapi.php');

  class SocialMediaIntegration {
    private $oauth_access_token        = "1583259110-y6PURfrgLOuE0qFYUDov6ioMUowJ2OKTtYkBzWi";
    private $oauth_access_token_secret = "oznkpg7iUrVicOW7gCB9rNVzaIDdvWd4D93zUmEMtI4Ri";
    private $consumer_key              = "8pJ3Bo2MDLfLQbzFOfszpQ";
    private $consumer_secret           = "WDLvqswOU1Vxq36BwFo9T8iezFYWPvvjOWSpenatDHo";

    public function twitterPost($status) {
      $twitterapi = new TwitterAPIExchange;
      $settings = array(
        'oauth_access_token' => $this->oauth_access_token,
        'oauth_access_token_secret' => $this->oauth_access_token_secret,
        'consumer_key' => $this->consumer_key,
        'consumer_secret' => $this->consumer_secret
      );

      $url = 'https://api.twitter.com/1.1/statuses/update.json';
      $requestMethod = 'POST';
      $postfields = array(
          'status' => $status
      );

      return $twitterapi->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();
    }

    public function facebookPost() {
      require_once("facebook.php");

      $config = array(
          'appId' => '215738045264998',
          'secret' => '3cab3612f79e85415126bc8274c008db',
          'fileUpload' => false, // optional
          'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
      );

      $facebook = new Facebook($config);

      $session = $facebook->getSession();

      if($session)
          return $facebook->api('/me/feed', 'post', array('message'=>$_POST['user_status']));
      }

      return false;
    }

    public function massPost($status) {
      $returnArray = array();

      $returnArray['twitterReturn'] = $this->twitterPost($status);
      $returnArray['facebookReturn'] = $this->facebookPost($status);

      return $returnArray;
    }

  }