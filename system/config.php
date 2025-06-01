<?php
$goal = explode('?',$_SERVER['REQUEST_URI']);
$current_url = str_replace('/mvc/','',$goal[0]);
$site_url = "http://localhost/mvc/";
//echo  $current_url;

