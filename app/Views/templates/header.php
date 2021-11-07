<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> <?= $title ?> </title>
    <link rel="stylesheet" href="<?= base_url('style.css')?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	
<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
</head>
<body class="bg-light">

<!-- HEADER: MENU + HEROE SECTION -->
<header class="header mb-4 p-2 bg-light border-bottom shadow-4">

	<nav class="navbar navbar-light container">
		<div class="row justify-space-between w-100">

        <a href="#" class="navbar-brand col nav-link">CI-Instagram</a>
    
        <form class="d-flex col-3">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        </form>

        <ul class="col-4 flex-row align-items-center navbar-nav justify-content-end" >
			<?php if(session()->get('loggedUser') !== null) : ?>
				<li class="nav-item mx-2" ><a class="" href="<?= '/'.session()->get('loggedUser').'/post/create' ?>"><img src="<?= base_url('/icons/shutter.png')?>" alt="" class="icon"></a></li>
				<li class="nav-item mx-2" ><a class="nav-link" href="<?= '/'.session()->get('loggedUser') ?>"><?= session()->get('loggedUser') ?></a></li>
				<li class="nav-item mx-2"><a class="nav-link" href="<?= site_url('auth/signout')?>">Sign Out</a></li>
			<?php endif ?> 
			<?php if(session()->get('loggedUser') == null) : ?>
				<li class="nav-item mx-2" ></li>
				<li class="nav-item mx-2"><a class="nav-link" href="<?= site_url('/auth')?>">Sign in</a></li>
			<?php endif ?> 
			</ul>
        </div>
	</nav>

</header>