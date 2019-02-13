<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="keywords" content="">
  <meta name="description" content="">

  <title><?php bloginfo('name'); ?></title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap-theme.css">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- WordPress必須 -->
  <?php
    wp_enqueue_script('jquery');
    wp_head();
  ?>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <link rel="stylesheet" type="text/css" href="/common/css/common.css">
  <script type="text/javascript" src="/common/js/common.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="container">

<!--================= Header start ==================-->
<header id="header">
  <div class="inner clearfix">

    <!--====== Site Logo start ======-->
    <h1 id="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
    </h1>
    <!--====== //Site Logo end ======-->

    <!--====== Site Menu start ======-->
    <div id="sitemenu">

      <!--==== Menu Button start ====-->
      <a id="menu-btn" href="#menu">
        <span class="menu-txt">MENU</span>
        <span class="menu-icn menu-icn1"></span>
        <span class="menu-icn menu-icn2"></span>
        <span class="menu-icn menu-icn3"></span>
      </a>
      <!--==== //Menu Button end ====-->

      <!--==== Menu Content start ====-->
      <div id="menu">
        <div class="menu-inner">

          <!--== Global Navi start ==-->
          <?php
          $args = array(
            'menu_class'      => 'clearfix',
            'container'       => false,
            'echo'            => true,
          );
          ?>

          <nav id="gnav">
            <div class="menu-list inner">
              <?php wp_nav_menu($args); ?>
            </div>
          </nav>
          <!--== //Global Navi end ==-->

        </div>
      </div>
      <!--==== //Menu Content end ====-->
    </div>
    <!--====== //Site Menu end ======-->

  </div>
</header>
