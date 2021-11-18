<?php

session_start();
session_unset();
session_destroy();

// Going back to front page
header("location: ../Login.php?error=none");
