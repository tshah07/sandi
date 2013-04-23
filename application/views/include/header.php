<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="">

		<title>CodeIgniter Bootstrap</title>

		<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>"
		rel="stylesheet">
		<link
		href="<?php echo base_url('assets/css/bootstrap-responsive.min.css') ?>"
		rel="stylesheet">
		<link href="<?php echo base_url('assets/css/font-awesome.css') ?>"
		rel="stylesheet">
		<link href="<?php echo base_url('assets/css/custom.css') ?>"
		rel="stylesheet">

		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />

		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
		<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>
		<style type="text/css">
			body {
				padding-top: 20px;
				padding-bottom: 60px;
			}

			/* Custom container */
			.container {
				margin: 0 auto;
				max-width: 1000px;
			}

			.container > hr {
				margin: 60px 0;
			}

			/* Main marketing message and sign up button */
			.jumbotron {
				margin: 80px 0;
				text-align: center;
			}

			.jumbotron h1 {
				font-size: 100px;
				line-height: 1;
			}

			.jumbotron .lead {
				font-size: 24px;
				line-height: 1.25;
			}

			.jumbotron .btn {
				font-size: 21px;
				padding: 14px 24px;
			}

			/* Supporting marketing content */
			.marketing {
				margin: 60px 0;
			}

			.marketing p+ h4 {
				margin-top: 28px;
			}

			/* Customize the navbar links to be fill the entire space of the .navbar */
			.navbar .navbar-inner {
				padding: 0;
			}

			.navbar .nav {
				margin: 0;
				display: table;
				width: 100%;
			}

			.navbar .nav li {
				display: table-cell;
				width: 1%;
				float: none;
			}

			.navbar .nav li a {
				font-weight: bold;
				text-align: center;
				border-left: 1px solid rgba(255, 255, 255, .75);
				border-right: 1px solid rgba(0, 0, 0, .1);
			}

			.navbar .nav li:first-child a {
				border-left: 0;
				border-radius: 3px 0 0 3px;
			}

			.navbar .nav li:last-child a {
				border-right: 0;
				border-radius: 0 3px 3px 0;
			}
		</style>

		<style type='text/css'>
			#inlineTextHighlight {
				background: none repeat scroll 0 50% transparent;
				text-decoration: underline;
				display: inline;
				visibility: none;
				color: blue !important;
				font-family: Arial;
				cursor: pointer;
				line-height: 1.5em
			}
			#slider_header {
				height: 26px;
				width: 510px;
				background-image: url(http://cdn.sendori.com/images/bg_header.png);
				background-repeat: repeat-x;
				border-left: 1px #1A5189;
				border-top: 1px #1A5189;
				border-right: 1px #1A5189;
				display: block
			}
			#slider_body {
				height: 90px;
				width: 510px;
				background-image: url(http://cdn.sendori.com/images/bg_body.png);
				background-repeat: repeat-x;
				border-top: 1px #438ECE;
				border-bottom: 1px #438ECE;
				border-left: 1px #1A5189;
				border-right: 1px #1A5189;
				display: block;
				cursor: pointer
			}
			#slider_footer {
				height: 30px;
				width: 510px;
				background-image: url(http://cdn.sendori.com/images/bg_footer.png);
				background-repeat: repeat-x;
				border-left: 1px #1A5189;
				border-right: 1px #1A5189;
				border-bottom: 1px #1A5189;
				display: block;
				cursor: auto
			}
			#bt_learn {
				background-image: url(http://cdn.sendori.com/images/btn_learn.png);
				background-repeat: no-repeat;
				height: 90px;
				margin-right: 5px;
				width: 112px;
				margin-top: 60px;
				left: auto;
				right: 0;
				top: 0;
				position: absolute;
			}
			#icon_alert {
				height: 16px;
				width: 16px;
				background-image: url(http://cdn.sendori.com/images/icon_alert.png);
				padding: 5px
			}
			#icon_close {
				background-image: url(http://cdn.sendori.com/images/icon_close.png);
				background-repeat: no-repeat;
				display: block;
				float: left;
				height: 16px;
				width: 16px;
			}
			#favicon {
				background-position: center top;
				background-repeat: no-repeat;
				height: 90px;
				margin-left: 5px;
				margin-top: 5px;
				width: 16px;
				float: left;
				position: relative;
			}
			#ad_title {
				font-family: Helvetica;
				font-size: 13pt;
				font-weight: 700;
				color: #000;
				text-decoration: underline;
				margin-right: 122px;
				text-align: left
			}
			#ad_body {
				font-family: Helvetica;
				font-size: 11pt;
				color: #333;
				padding-top: 5px;
				margin-right: 125px;
				text-align: left;
			}
			#ad_url {
				color: #FFF;
				float: left;
				font-family: Helvetica;
				font-size: 10pt;
				margin-right: 10px;
				margin-left: 10px;
				padding-top: 6px;
				cursor: auto
			}
			#snd_logo {
				background-image: url(http://cdn.sendori.com/images/logo.png);
				background-repeat: no-repeat;
				height: 17px;
				width: 65px;
				cursor: auto;
				float: left;
				margin-right: 10px;
				margin-top: 1px;
			}
			#notification_message {
				color: #FFF;
				float: left;
				font-family: Helvetica;
				font-size: 8pt;
				font-weight: 700;
				padding-left: 0;
				margin-top: 5px;
				text-decoration: none;
			}
			#notification_alert {
				background-image: url(http://cdn.sendori.com/images/icon_alert.png);
				background-position: center center;
				background-repeat: no-repeat;
				float: left;
				height: 16px;
				padding-left: 10px;
				padding-top: 5px;
				width: 16px
			}
			#slider_container {
				width: 510px;
				height: 146px;
				display: none;
				position: fixed;
				left: 50%;
				bottom: 0;
				margin-left: -255px;
				z-index: 9999999999;
				border-radius: 4px 4px 0 0;
				-webkit-border-radius: 4px 4px 0 0;
				-moz-border-radius: 4px 4px 0 0;
				box-shadow: 0 0 9px #515151;
				-webkit-box-shadow: 0 0 9px #515151;
				-moz-box-shadow: 0 0 9px #515151
			}
			#Nx_slider_container {
				width: 510px;
				height: 26px;
				display: none;
				position: fixed;
				left: 50%;
				bottom: 0;
				margin-left: -255px;
				border-radius: 4px 4px 0 0;
				-webkit-border-radius: 4px 4px 0 0;
				-moz-border-radius: 4px 4px 0 0;
				z-index: 9999999999;
				border-left: 1px #1A5189;
				border-top: 1px #1A5189;
				border-right: 1px #1A5189;
				box-shadow: 0 0 9px #515151;
				-webkit-box-shadow: 0 0 9px #515151;
				-moz-box-shadow: 0 0 9px #515151
			}
		</style>
	</head>

	<body data-spy="scroll" data-target=".bs-docs-sidebar" data-twttr-rendered="true">

	
	 <?php $this->load->view('templates/menubar'); ?>
	 

