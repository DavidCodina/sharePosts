<?php
////////////////////////////////////////////////////////////////////////////////
//
//
//  Set the values according to your use case.
//  For example:
//
//      define('APPROOT', dirname(dirname(__FILE__)));
//      define('URLROOT', 'http://localhost/shareposts');
//      define('SITENAME', 'SharePosts');
//      define('APPVERSION', '1.0.0');
//
//      //Database Parameters:
//      define('DB_HOST', 'localhost');
//      define('DB_USER', 'root');
//      define('DB_PASS', '');
//      define('DB_NAME', 'shareposts');
//
//
////////////////////////////////////////////////////////////////////////////////


define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', _YOUR_URL_);        //e.g., 'http://localhost/shareposts'
define('SITENAME', _YOUR_SITENAME_);  //e.g., 'SharePosts'
define('APPVERSION', '1.0.0');
define('DB_HOST', 'localhost');
define('DB_USER', _YOUR_USER_);       //Will be 'root' by default if using XAMPP
define('DB_PASS', _YOUR_PASSWORD_);   //Will be '' by default in XAMPP
define('DB_NAME', _YOUR_DB_NAME_);    //Set up a database, in phpmyadmin, on computer, or remotely.
?>
