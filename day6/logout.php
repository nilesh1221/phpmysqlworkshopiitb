<?php
  session_start();
  session_destroy();
  echo "You're logged out. <a href='resultportal.html'> Go back to portal </a>"
?>