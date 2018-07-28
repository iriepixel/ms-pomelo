<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MS_Pomelo
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="p:domain_verify" content="f60e42a829ed391ff4e9afe461db8c0c"/>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="alternate" href="https://mspomelo.com" hreflang="en-gb" />

<link rel="apple-touch-icon" sizes="57x57" href="https://mspomelo.com/favicon/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="https://mspomelo.com/favicon/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="https://mspomelo.com/favicon/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="https://mspomelo.com/favicon/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="https://mspomelo.com/favicon/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="https://mspomelo.com/favicon/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="https://mspomelo.com/favicon/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="https://mspomelo.com/favicon/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="https://mspomelo.com/favicon/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="https://mspomelo.com/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="https://mspomelo.com/favicon/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="https://mspomelo.com/favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="https://mspomelo.com/favicon/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="https://mspomelo.com/favicon/manifest.json">
<link rel="mask-icon" href="https://mspomelo.com/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="shortcut icon" href="https://mspomelo.com/favicon/favicon.ico">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="https://mspomelo.com/favicon/mstile-144x144.png">
<meta name="msapplication-config" content="https://mspomelo.com/favicon/browserconfig.xml">
<meta name="theme-color" content="#ffffff">

<!-- Google Code for online purchase Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
        var google_conversion_id = 932066264;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "ev7gCI3O0mUQ2Oe4vAM";
        var google_remarketing_only = false;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/932066264/?label=ev7gCI3O0mUQ2Oe4vAM&guid=ON&script=0"/>
    </div>
</noscript>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '1735459633363407');
fbq('track', "PageView");
fbq('track', 'ViewContent');
fbq('track', 'Search');
fbq('track', 'AddToCart');
fbq('track', 'AddToWishlist');
fbq('track', 'InitiateCheckout');
fbq('track', 'AddPaymentInfo');
fbq('track', 'Purchase', {value: '1.00', currency: 'GBP'});
fbq('track', 'Lead');
fbq('track', 'CompleteRegistration');</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1735459633363407&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mspomelo' ); ?></a>

	<header id="masthead" class="site-header ee" role="banner">
		<div class="cell-1920">
			
			<div class="site-branding desktop asdasd">
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/pomelo-logo-header.svg" alt="MS Pomelo logo">
				</a>
				
			</div><!-- .site-branding -->

			<div class="site-branding mobile">
				<a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/pomelo-logo-header.svg" alt="MS Pomelo logo">
				</a>
				<img class="mobile-menu-button" src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/mobile-menu-button.svg" alt="MS Pomelo logo">
				
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation desktop gfg" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				
           
     				
				
				<div class="search-form-slider-activator">
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>wp-content/themes/mspomelo/images/search.svg" alt="MS Pomelo search">
				</div>
				<div class="search-form-slider">
					<?php get_search_form(); ?>
				</div>
			</nav><!-- #site-navigation -->

			<nav id="site-navigation" class="main-navigation mobile" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
