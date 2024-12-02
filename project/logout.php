<?php
session_start();
session_unset();
header('Location: sign-in.php');
