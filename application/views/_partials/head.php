<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="<?= base_url() ?>assets/images/favicon.ico">

	<title>SG CELULLAR - <?= $title ?></title>

	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/vendors_css.css">

	<!-- Style-->
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/css/skin_color.css">

</head>

<body class="hold-transition light-skin sidebar-mini theme-primary">

	<div class="wrapper">
		<!-- <div id="loader"></div> -->
		<?php $this->load->view('_partials/navbar'); ?>
		<?php $this->load->view('_partials/sidebar'); ?>