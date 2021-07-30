<?php
/**
 * The header for our theme
 *
 * This displays all of the <head> section and beginning of body.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="<?php bloginfo( 'charset'); ?>" >
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <title>Bar W Dog Training<?php wp_title(); ?></title>
    <meta name="author"  content="Morning Owls Web Development" >
<!-- ATTN -->
	  <meta name="description" content="DESCRIPTION of site including key words" >
    <link rel="shortcut icon" href="">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/Fav_logo_16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/Fav_logo_32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/Fav_logo_48.png" sizes="48x48">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/Fav_logo_192.png" sizes="192x192">
    <link rel="canonical" href="">
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>"  >
    <link rel="pingback" href="<?php bloginfo( 'pingback_url'); ?>" >
      
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">

<!-- ATTN -->
    <meta property="og:image" content="">
    <meta property="og:title" content="">
    <meta property="og:description" content="DESCRIPTION of site including key words">
    <meta property="og:url" content="">
      
    <meta name="twitter:card" content="summary_large_image">
      
<!-- ATTN -->
    <meta name="twitter:description" content="DESCRIPTION of site including key words">
    <meta name="twitter:title" content="">
    <!-- <meta name="twitter:site" content="@TWITTERHANDLE">  -->
    <meta name="twitter:image" content="">
      
    <?php wp_head(); ?>
  </head>

  <body>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <div class="container-fluid">
        <div class="row">
          <div class="col col-6">
            <a class="navbar-brand logo" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/BarWlogo.png" width="100" height="100" alt="" /></a>
          </div>
          <div class="d-flex col col-6 align-items-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end navmenu" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                <a class="nav-link" href="<?php echo site_url('/service_type/service/'); ?>">Services</a>
                <a class="nav-link" href="#">Pricing</a>
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
              </div>
            </div>
          </div>
        </div> 
      </div>
    </nav>
</header>

  
