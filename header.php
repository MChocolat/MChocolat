<?php
include "functions.php";

use google\appengine\api\users\User;
use google\appengine\api\users\UserService;

$user = UserService::getCurrentUser();

if (!isset($user)) {
  echo sprintf('<a href="%s">Sign in or register</a>',
               UserService::createLoginUrl('/'));
  $logoutURL = UserService::createLogoutUrl('/');
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=0.7" />
    <title>M Chocolat Inventory</title>
    <link rel="stylesheet" href="/css/foundation.css" />
	<link rel="stylesheet" href="/css/main.css" />
    <script src="/js/vendor/modernizr.js"></script>
    <script src="/js/vendor/jquery.js"></script>
    <script src="/js/vendor/fastclick.js"></script>
    <script src="/js/foundation.min.js"></script>

    <!-- Title Bar -->
    <nav class="top-bar foundation-bar" data-topbar>
      <ul class="title-area">
      </ul>
      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
            <!-- Add link to Sign-in page -->
            
            <?php 
              $user = UserService::getCurrentUser();
              if (isset($user)) {
                echo sprintf('<li><a  href="%s">Logout</a></li>',
                             UserService::createLogoutUrl(''));
              } ?>
        </ul> 
      </section>
    </nav>
  </head>

  <script>
    $(document).foundation();
  </script>
</html>
