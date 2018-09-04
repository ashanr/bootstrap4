<?php
//Ashan Rajapaksha 2018 PHP Version 7.0
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title> B4 Admin</title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="icon.png">
<link rel="apple-touch-icon" href="home.ico">
<!-- Place favicon.ico in the root directory -->

<link rel="stylesheet" href="css/vendor.css">
<!-- Theme initialization -->
<script>
    var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
    var themeName = themeSettings.themeName || '';
    if (themeName)
    {
        document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
    } else
    {
        document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
    }
</script>

<style type="text/css">
    .stylecss {
        text-decoration: none;

        opacity: 1;
        -webkit-transform: scale(1,1);
        -webkit-transition-timing-function: ease-out;
        -webkit-transition-duration: 250ms;
        -moz-transform: scale(1,1);
        -moz-transition-timing-function: ease-out;
        -moz-transition-duration: 250ms;
    }
    style:hover {
        opacity: .7;
        -webkit-transform: scale(1.05,1.07);
        -webkit-transition-timing-function: ease-out;
        -webkit-transition-duration: 250ms;
        -moz-transform: scale(1.05,1.07);
        -moz-transition-timing-function: ease-out;
        -moz-transition-duration: 250ms;
        position: relative;
        z-index: 99;
    }

    @font-face {
        font-family: myFirstFont;
        src: url(../fonts/IMPRISHA.TTF);
    }

    .fontChang {
        font-family: myFirstFont;
    }

    #imaginary_container{
        margin-top:20%; /* Don't copy this */
    }
    .stylish-input-group .input-group-addon{
        background: white !important; 
    }
    .stylish-input-group .form-control{
        border-right:0; 
        box-shadow:0 0 0; 
        border-color:#ccc;
    }
    .stylish-input-group button{
        border:0;
        background:transparent;
    }
    .item.thumbnail {
        width:  171px;
        float: left;
        border: 2px solid #333;
    }
</style>
