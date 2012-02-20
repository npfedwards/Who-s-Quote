<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Who's Quote?</title>
        <link href='http://fonts.googleapis.com/css?family=Gentium+Book+Basic:400,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="blueprint/screen.css" type="text/css" media="all">
        <link rel="stylesheet" href="blueprint/print.css" type="text/css" media="print">
        <!--[if lt IE 8]><link rel="stylesheet" href="blueprint/ie.css" type="text/css"><![endif]-->
        <link rel="stylesheet" href="style.css" type="text/css" media="all">
        <script type="text/javascript" src="js/functions.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
			$(document).ready(function($) {
				$('.navli').hover(function(){
					$('.subnav', this).stop().fadeIn(1000);
				}, function () {
					$('.subnav', this).stop().fadeOut(1000);
				});
			});   
		</script>
    </head>
    <body>
    	<div class="container showgrid">
        	<div class='headcontainer span-8'>
                <h1>Who's Quote</h1>
                <h2>What did you say? <span class='author'>- Gollum</span></h2>
            </div>
            <div class='prepend-4 span-12 last'>
                <ul class='nav'>
                    <li  class='span-4 navli'>
                    	<a href='index.php'>Home</a>
                        <p class='subnav'>Oh to be in England…</p>
                    </li>
                    <li class='span-4 navli' >
                    	<a href='addquote.php'>Add Quote</a>
                        <p class='subnav'>Words, words, mere words</p>
                    </li>
                    <li class='span-4 navli last'>
                    	<a href='what.php'>What?</a>
                        <p class='subnav'>That&apos;s just silly</p>
                    </li>
                </ul>
            </div>
            <div class='clear'></div>