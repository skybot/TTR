<?php
session_start();

$lang = $_COOKIE['lang'];

// register the session and set the cookie
$_SESSION['lang'] = $lang;


//$_SESSION["lang"] = $lang;

$folder = "locale";
$domain = "messages";
$encoding = "UTF-8";
$locale = $lang.".".$encoding;

setlocale(LC_MESSAGES, $locale);
bindtextdomain($domain, $folder);
textdomain($domain);
bind_textdomain_codeset($domain, $encoding);
//var_dump($_SESSION["lang"]);
//echo $_COOKIE["lang"];
//echo $locale;
//echo $bind_textdomain_codeset;

?>
