<?php  $args = \App\Models\Site::get(); ?>

<!--
#########################################################
These code protected by world/WRH copyright law
#########################################################
so you can not use the source code of  this page if you don't have 
#########################################################
written permission from WRH.
#########################################################
read our terms <?=site_base_url()?>site/terms
#########################################################
if you try copy our code we will take legal action against you 
#########################################################
Your use of this site shall be governed by international law and shall be subject to the exclusive jurisdiction of the international Courts.
#########################################################
-->

<?php
$user = new \Zest\Auth\User;
 if (!$user->isLogin()) {
     if (is_cookie('user')) {
          \Zest\Session\Session::setValue('user',get_cookie('user')); 
     }
   } else {
     if (\Zest\Session\Session::getValue('user') !== get_cookie('user')) {
      redirect(site_base_url()."account/logout");
     }
   }   
?>      
<!DOCTYPE html>
<html>
<head>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link rel="stylesheet" href="<?= site_base_url() ?>css/materialize.min.css">
      <link rel="stylesheet" href="<?= site_base_url() ?>css/css-master.css">
      <link rel="stylesheet" type="text/css" href="<?= site_base_url() ?>css/fonts.css">
      <link rel="stylesheet" href="<?= site_base_url() ?>css/main.css">
      <link rel="stylesheet" href="<?= site_base_url() ?>css/material-override.css">
      <link rel="shortcut icon" type="image/png" href="<?= site_base_url(); ?>/image/icon.png"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="manifest" href="<?= site_base_url(); ?>manifest.json">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="theme-color" content="#e89696" />
      <meta name="google-site-verification" content="<?= $args[5]['value'] ?>" />
      <neta name="description" content="<?= $args[3]['value'] ?>"/>
      <neta name="keyword" content="<?= $args[4]['value'] ?>"/>
</head>
<body>
<div id="overlay"></div>
<div id="spinner"></div>  
<div id='none'>  
<nav class="hide-on-med-and-down desktop-mav">
	   <div class="nav-wrapper container">
      <a href="<?= site_base_url(); ?>" class="brand-logo" style="font-size: 18px!important"><img src="<?= site_base_url(); ?>/image/icon.png" style='width: 25px;height:25px;margin-bottom:-6px'> <b> ZestFramework</b></a>
      <ul class="right hide-on-med-and-down">
        <li><a class="waves-effect" href="<?=site_base_url()?>">Home</a></li>
        <li><a class="waves-effect" href="<?=site_base_url()?>blogs/1">Blog</a></li>
        <li><a class="waves-effect" href="https://zest.readthedocs.io/en/latest/">Documentation</a></li> 
        <li><a class="waves-effect" href="<?=site_base_url()?>community/1">Community</a></li>
        <li><a class='dropdown-button' href='#' data-target='dropdown01' >Download &#x25BE</a></li>
        <ul id='dropdown01' class='dropdown-content'>
          <li><a class="waves-effect" href="<?=site_base_url()?>Components/1">Components</a></li>     
        </ul>            
      <?php if ($user->isLogin()){ ?>
        <li><a class='dropdown-button' href='#' data-target='dropdown1' ><i class="material-icons" style="color:#fff!important">account_circle</i></a></li>
        <ul id='dropdown1' class='dropdown-content'>
           <?php if ((new \App\Models\Account())->isAdmin()) { ?>
                <li><a class="waves-effect" href="<?= site_base_url(); ?>admin/home">Admin</a></li>          
           <?php } ?> 
            <li><a class="waves-effect" href="<?= site_base_url(); ?>components/add">Add Component</a></li>
            <li><a class="waves-effect" href="<?= site_base_url(); ?>community/add">Add Topic</a></li>
            <li><a class="waves-effect" href="<?= site_base_url(); ?>@<?= $user->loginUser()[0]['username'] ?>">Profile</a></li>
            <li><a class="waves-effect" href="<?= site_base_url(); ?>account/profile/edit">Edit</a></li>            
            <li><a class="waves-effect" href="<?= site_base_url(); ?>account/logout">Logout</a></li>
        </ul>      
      <?php } else { ?>
      <li><a class="waves-effect" href="<?= site_base_url(); ?>account/login">Login</a></li>
      <li><a class="waves-effect" href="<?= site_base_url(); ?>account/signup">Signup</a></li>
      <?php } ?> 
      </ul>
    </div>
</nav>
  <div class="hide-on-large-only"> 
   <div class="topnav container" id="myTopnav">
      <a href="<?=site_base_url()?>" class="active wrh-logo"><img src="<?= site_base_url(); ?>/image/icon.png" style='width: 25px;height:25px;margin-bottom:-6px'>  Zest</a>
      <a href="<?=site_base_url()?>" class="">Home</a>
        <a class="waves-effect" href="<?=site_base_url()?>blogs/1">Blog</a>
        <a class="waves-effect" href="https://zest.readthedocs.io/en/latest/">Documentation</a>
        <a class="waves-effect" href="<?=site_base_url()?>community/1">Community</a>
        <a class='dropdown-button' href='#' data-target='dropdown01-mob' >Downloads &#x25BE</a>
        <ul id='dropdown01-mob' class='dropdown-content'>
          <li><a class="waves-effect" href="<?=site_base_url()?>Components/1">Components</a></li>     
        </ul>   
      <?php if ($user->isLogin()){ ?>
        <a class='dropdown-button' href='#' data-target='dropdown1-mob'>My account &#x25BE</a>
        <ul id='dropdown1-mob' class='dropdown-content'>
            <?php if ((new \App\Models\Account())->isAdmin()) { ?>
                <li><a class="waves-effect" href="<?= site_base_url(); ?>admin/home">Admin</a></li>          
           <?php } ?>          
            <li><a class="waves-effect" href="<?= site_base_url(); ?>community/add">Add Topic</a></li>
            <li><a class="waves-effect" href="<?= site_base_url(); ?>components/add">Add Component</a></li>
            <li><a class="waves-effect" href="<?= site_base_url(); ?>@<?= $user->loginUser()[0]['username'] ?>">Profile</a></li>
            <li><a class="waves-effect" href="<?= site_base_url(); ?>account/profile/edit">Edit</a></li>            
            <li><a class="waves-effect" href="<?= site_base_url(); ?>account/logout">Logout</a></li>
            <br><br><br>
        </ul>      
      <?php } else { ?>        
        <a class="waves-effect" href="<?= site_base_url(); ?>account/login">Login</a>
      <a class="waves-effect" href="<?= site_base_url(); ?>account/signup">Signup</a>
      <?php } ?> 
    <a href="javascript:void(0);" style="font-size:20px;color:#fff!important" class="icon" onclick="mobilenavbar()">&#9776;</a>
</div>
  </div>
<script type="text/javascript">
    url = "<?= site_base_url(); ?>";
</script>  
  <!-- 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-122570069-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-122570069-1');
</script>
-->
<div id='desktop-bottom' class="hide-on-med-and-down"></div>