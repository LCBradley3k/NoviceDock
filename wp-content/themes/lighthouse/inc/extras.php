<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Lighthouse
 *
 * Please browse readme.txt for credits and forking information
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lighthouse_body_classes( $classes ) {
  // Adds a class of group-blog to blogs with more than 1 published author.
  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  return $classes;
}
add_filter( 'body_class', 'lighthouse_body_classes' );

if ( ! function_exists( 'lighthouse_header_menu' ) ) :
    /**
     * Header menu (should you choose to use one)
     */
  function lighthouse_header_menu() {
      // display the WordPress Custom Menu if available
    wp_nav_menu(array(
      'theme_location'    => 'primary',
      'depth'             => 2,
      'container'         => 'div',
      'container_class'   => 'collapse navbar-collapse navbar-ex1-collapse',
      'menu_class'        => 'nav navbar-nav',
      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
      'walker'            => new wp_bootstrap_navwalker()
      ));
  } /* end header menu */
  endif;



/**
 * Adds the URL to the top level navigation menu item
 */
function  lighthouse_add_top_level_menu_url( $atts, $item, $args ){
  if ( isset($args->has_children) && $args->has_children  ) {
    $atts['href'] = ! empty( $item->url ) ? $item->url : '';
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'lighthouse_add_top_level_menu_url', 99, 3 );





/** BACKEND **/

add_action( 'admin_menu', 'lighthouse_register_backend' );
function lighthouse_register_backend() {
  add_theme_page( __('About Lighthouse', 'lighthouse'), __('Lighthouse', 'lighthouse'), 'edit_theme_options', 'about-lighthouse.php', 'lighthouse_backend');
}

function lighthouse_backend(){ ?>
<div class="text-centering">
  <div class="backend-css customize-lighthouse">
    <h2><?php echo __( 'Welcome to Lighthouse', 'lighthouse' ); ?></p></h2>
    <p><?php echo __( 'Get started and customize your awesome new blog theme', 'lighthouse' ); ?></p>
    <a href="<?php echo admin_url('/customize.php'); ?>" target="_blank" class="backend_btn"><?php echo __('Customize Theme','lighthouse'); ?></a>
  </div>
</div>

<h2 class="headline-second" style="margin-bottom:0"><?php echo __( 'Got Questions or Need Help?', 'lighthouse' ); ?></h2>
<div class="text-centering">
 <div class="backend-css customize-lighthouse">
  <p><a href="https://lighthouseseooptimization.github.io/wordpress/lighthouse/#contact" target="_blank"><?php echo __( 'Email us here', 'lighthouse' ); ?></a> or <?php echo __( 'write to us directly at: Beseenseo@gmail.com', 'lighthouse' ); ?></p>
</div>
</div>

<h2 class="headline-second"><?php echo __( 'F.A.Q & Documentation', 'lighthouse' ); ?></h2>
<section class="ac-container">
  <div>
    <input id="ac-40" name="accordion-40" type="radio">
    <label for="ac-40"><?php echo __( 'Making your website like the demo', 'lighthouse' ); ?></label>
    <article class="ac-large">
     <p><em><?php echo __( 'How to set up your website like on our demo', 'lighthouse' ); ?></em></p>
    <ol>
      <li><p><?php echo __( 'Go to "Appearance" > "Customize" in the WordPress admin menu.', 'lighthouse' ); ?></p></li>
      <li><p><?php echo __( 'Under "Site identity" pick a title and a tagline & choose "Display site title and tagline"', 'lighthouse' ); ?></p></li>
      <li><p><?php echo __( 'Under "Site Identity" Pick a logo', 'lighthouse' ); ?></p></li>
      <li><p><?php echo __( 'Go to Global Theme Color and choose default or pick a new one', 'lighthouse' ); ?></p></li>
      <li><p><?php echo __( 'Go to "Appearance" > "Widgets" in the WordPress admin menu.', 'lighthouse' ); ?></p></li>
      <li><p><?php echo __( 'Fill widgets into the different sections, such as "Top widgets" and "Footer Widgets"', 'lighthouse' ); ?></p></li>
    </ol>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-41" name="accordion-41" type="radio">
    <label for="ac-41"> <?php echo __( 'How to set up plugins', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p>- <a href="http://www.wpbeginner.com/plugins/how-to-install-and-setup-wordpress-seo-plugin-by-yoast/"> <?php echo __( 'How to set up Yoast', 'lighthouse' ); ?></a></p>
      <p>- <a href="http://nerdynerdnerdz.com/4119/how-to-setup-autoptimize-plugin-in-wordpress/"> <?php echo __( 'How to set up Autoptimize', 'lighthouse' ); ?></a></p>
      <p>- <a href="http://www.wpbeginner.com/beginners-guide/how-to-install-and-setup-wp-super-cache-for-beginners/"> <?php echo __( 'How to set up WP Super Cache', 'lighthouse' ); ?></a></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-1" name="accordion-1" type="radio">
     <label for="ac-1"><?php echo __( 'Adding a logo', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Site Identity > Select Logo', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-2" name="accordion-2" type="radio">
    <label for="ac-2"><?php echo __( 'Adding a title to the header image/color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Site Identity > Site Title', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-3" name="accordion-3" type="radio">
    <label for="ac-3"><?php echo __( 'Adding a tagline to the header image/color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Site Identity > Tagline', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-4" name="accordion-4" type="radio">
    <label for="ac-4"><?php echo __( 'Adding a Site Icon / Fav Icon', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Site Identity > Site Icon', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-5" name="accordion-5" type="radio">
     <label for="ac-5"><?php echo __( 'Changing header text color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Colors > Header Text Color', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-49" name="accordion-49" type="radio">
    <label for="ac-49"><?php echo __( 'Changing background color on footer widget area', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Footer', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-6" name="accordion-6" type="radio">
     <label for="ac-6"><?php echo __( 'Changing header background color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Colors > Header background Color', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-7" name="accordion-7" type="radio">
     <label for="ac-7"><?php echo __( 'Adding a header image', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Header Image > Upload or pick a suggested', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-8" name="accordion-8" type="radio">
     <label for="ac-8"><?php echo __( 'Changing background color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Colors > background color', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-9" name="accordion-9" type="radio">
    <label for="ac-9"><?php echo __( 'Adding a Background image', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Background Image > Select image', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-10" name="accordion-10" type="radio">
     <label for="ac-10"><?php echo __( 'Changing Theme Color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Accent Color > Select a color', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-11" name="accordion-11" type="radio">
    <label for="ac-11"><?php echo __( 'Adding a widget', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Widgets ', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-13" name="accordion-13" type="radio">
     <label for="ac-13"><?php echo __( 'Using full width theme', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'While editing a page, under Page Attributes, choose Full Width Template ', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-14" name="accordion-14" type="radio">
     <label for="ac-14"><?php echo __( 'Changing Footer Widget Title Color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Footer', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-15" name="accordion-15" type="radio">
     <label for="ac-15"><?php echo __( 'Changing footer copyright section background color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Footer', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-16" name="accordion-16" type="radio">
     <label for="ac-16"><?php echo __( 'Changing footer copyright section text color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Footer', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-17" name="accordion-17" type="radio">
     <label for="ac-17"><?php echo __( 'Changing Sidebar background color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Sidebar', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-45" name="accordion-45" type="radio">
    <label for="ac-45"><?php echo __( 'Changing sidebar headline color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Sidebar', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-18" name="accordion-18" type="radio">
     <label for="ac-18"><?php echo __( 'Changing sidebar link color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Sidebar', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-19" name="accordion-19" type="radio">
     <label for="ac-19"><?php echo __( 'Changing sidebar link border color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Sidebar', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-20" name="accordion-20" type="radio">
    <label for="ac-20"><?php echo __( 'Changing navigation background color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Navigation', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-22" name="accordion-22" type="radio">
    <label for="ac-22"><?php echo __( 'Changing navigation link color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Navigation', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-23" name="accordion-23" type="radio">
     <label for="ac-23"><?php echo __( 'Changing navigation logo color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Navigation', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-24" name="accordion-24" type="radio">
    <label for="ac-24"><?php echo __( 'Changing post & page headline color ', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Post & Page', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-25" name="accordion-25" type="radio">
     <label for="ac-25"><?php echo __( 'Changing post & page content color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Post & Page', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-26" name="accordion-26" type="radio">
     <label for="ac-26"><?php echo __( 'Changing post author byline color', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Post & Page', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-27" name="accordion-27" type="radio">
    <label for="ac-27"><?php echo __( 'Adding top widgets', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Widgets', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-28" name="accordion-28" type="radio">
     <label for="ac-28"><?php echo __( 'Adding bottom widgets', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Widgets', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-29" name="accordion-29" type="radio">
   <label for="ac-29"><?php echo __( 'Adding Footer widgets', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Widgets', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-30" name="accordion-30" type="radio">
    <label for="ac-30"><?php echo __( 'Adding Sidebar widgets', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Widgets', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-31" name="accordion-31" type="radio">
   <label for="ac-31"><?php echo __( 'Changing design on top widgets', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > top widgets design', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-32" name="accordion-32" type="radio">
    <label for="ac-32"><?php echo __( 'Changing design on bottom widgets', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > bottom widgets design', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<section class="ac-container">
  <div>
    <input id="ac-33" name="accordion-33" type="radio">
     <label for="ac-33"><?php echo __( 'Adding custom CSS', 'lighthouse' ); ?></label>
    <article class="ac-large">
      <p><?php echo __( 'In the WordPress admin menu click Appearance > Customize > Additional CSS', 'lighthouse' ); ?></p>
    </article>
  </div>
</section>

<?php }

