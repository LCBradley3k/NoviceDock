<?php
/**
 * The header for Lighthouse theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
* Please browse readme.txt for credits and forking information
 * @package Lighthouse
 */

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <meta http-equiv="content-language" content="<?php echo $lang=get_bloginfo("language"); ?>" />
  <meta name="language" content="<?php echo $lang=get_bloginfo("language"); ?>" />
  <meta name="google-site-verification" content="amJivJxsw8Y6HGC5BoGvswLNiE_54H2d_QkrejTqtSo" />
  <meta name="msvalidate.01" content="67054D71047D0E79B45801C3BF7CBDD7" />
  <!--<link href="https://fonts.googleapis.com/css?family=Rubik:400,500" rel="stylesheet">-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,400i,600,700,700i,800,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,700" rel="stylesheet">
  <?php wp_head(); ?>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-99631828-1', 'auto');
  ga('send', 'pageview');

  /**
  * Function that tracks a click on an outbound link in Analytics.
  * This function takes a valid URL string as an argument, and uses that URL string
  * as the event label. Setting the transport method to 'beacon' lets the hit be sent
  * using 'navigator.sendBeacon' in browser that support it.
  */
  var trackOutboundLink = function(url) {
     ga('send', 'event', 'outbound', 'click', url, {
       'transport': 'beacon',
       'hitCallback': function(){document.location = url;}
     });
  }

  </script>
</head>

<body <?php body_class(); ?>>
    <header id="masthead"  role="banner">
      <!--<nav class="navbar lh-nav-bg-transform navbar-default navbar-fixed-top navbar-left" role="navigation">-->
      <div class="site-header">
        <div class="site-header-inner">
          <div class="container header-container">
            <div class="row">
              <div class="col-md-12">
            <div class="site-branding">
              <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
               <img class="site-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-white.svg" alt="NoviceDock">
              </a>
              <a class="topics-btn">Topics <i class="fa fa-chevron-down" aria-hidden="true"></i></a>
           </div><!--.site-branding-->
           <?php /* if ( has_nav_menu( 'primary' ) ) {
                 lighthouse_header_menu(); // main navigation
               }
              */ ?>
            </div>
            </div>
         </div> <!-- .header-container -->
       </div> <!-- inner header -->
     </div><!--.site-header-->

</header>

<!-- Categories Menu -->
<div class="container menu-container">
<div class="category-menu-wrap">
  <div class="item-wrap">
    <?php if(have_rows('category_blocks', 'option')) : ?>

     <?php while(have_rows('category_blocks', 'option')) : the_row(); ?>
     <div class="top-widgets">
       <?php $main_cat_name = get_cat_name(get_sub_field('category_title')); ?>
       <h2 id="<?php echo get_cat_id($main_cat_name); ?>"><span><?php echo $main_cat_name ?></span>
         <a class="expand">&#43;</a>
       </h2>
       <ul class="menu">
         <?php while(have_rows('courses', 'option')) : the_row(); ?>

           <?php if (get_sub_field('coming_soon')){ ?>
             <div class="topic-card coming-soon">
               <?php echo get_cat_name(get_sub_field('title')); ?>
             </div>
           <?php } else { ?>
             <div class="topic-card">
               <a href="<?php echo get_category_link(get_sub_field('title')); ?>"><?php echo get_cat_name(get_sub_field('title')); ?></a>
             </div>
           <?php } ?>
         <?php endwhile; ?>
       </ul>
     </div> <!-- end top-widgets -->
   <?php endwhile; ?>
   <?php endif; ?>
 </div>
</div>
</div>

  <div class="darken"></div>
  <div id="page" class="hfeed site">

  <?php if ( is_front_page() ) : ?>
    <?php get_template_part( 'template-parts/content-home') ?>
  <?php endif; ?>
