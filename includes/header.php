<?php

echo "including header";
include "functions.php";
?>
<head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=0.7" />
      <title>M Chocolat Inventory Management System</title>
      <link rel="stylesheet" href="/css/foundation.css" />
      <script src="/js/vendor/modernizr.js"></script>
      <script src="/js/vendor/jquery.js"></script>
      <script src="/js/vendor/fastclick.js"></script>
      <script src="/js/foundation.min.js"></script>



      <!-- Title Bar -->
    <nav class="top-bar foundation-bar" data-topbar>
      <ul class="title-area">
        <li class="name">
         <span data-tooltip class="has-tip" title="You are currently logged in as the Administrator."><h1 class="show-for-small-only"><a href="#">Administrator</a></h1></span>
         <span data-tooltip class="has-tip" title="You are currently logged in as the Administrator."><h1 class="show-for-medium-only"><a href="#">Administrator</a></h1></span>
         <span data-tooltip class="has-tip" title="You are currently logged in as the Administrator."><h1 class="show-for-large-only"><a href="#">Administrator</a></h1></span>
        </li>
      </ul>
      <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
          <!-- Add link to Settings page -->
            <li><a  href=" ">Settings</a></li>
            <!-- Add link to Sign-in page -->
            <li><a  href="/login.php">Logout</a></li>
        </ul>
      </section>
    </nav>
    </head>
