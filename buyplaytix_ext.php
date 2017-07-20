<?php

require 'vendor/autoload.php';

function buyplaytix_scripts() {
  $oauth = new \BuyPlayTix\Wordpress\OAuth();
  $producer = $oauth->getProducer();

  wp_enqueue_style('bpt-ecss.css', $producer->css_path . '/ecss.css');
  wp_enqueue_script('bpt-common',plugins_url('/buyplaytix/js/common.js'),array( 'jquery' ));
  wp_enqueue_script('bpt-wordpress',plugins_url('/buyplaytix/js/wordpress.js'),array( 'jquery' ));
  wp_enqueue_script('bpt-transaction-common',plugins_url('/buyplaytix/js/transaction-common.js'),array( 'jquery' ));
  wp_enqueue_script('bpt-donate',plugins_url('/buyplaytix/js/donate.js'),array( 'jquery' ));
  wp_enqueue_script('fullcalendar',plugins_url('/buyplaytix/js/vendor/fullcalendar/fullcalendar.min.js'),array( 'jquery' ));
  wp_enqueue_script('fullcalendar.bpt',plugins_url('/buyplaytix/js/vendor/fullcalendar/bpt.js'),array( 'jquery' ));
  wp_enqueue_style('fullcalendar.css',plugins_url('/buyplaytix/css/vendor/fullcalendar/fullcalendar.css'));
}

add_action( 'wp_enqueue_scripts', 'buyplaytix_scripts' );
add_action( 'admin_enqueue_scripts', 'buyplaytix_scripts' );


function buyplaytix_widgets() {
  register_widget('BuyPlayTix\Wordpress\Widget\DonateWidget');
  register_widget('BuyPlayTix\Wordpress\Widget\CalendarWidget');
  register_widget('BuyPlayTix\Wordpress\Widget\ProductionWidget');
}
add_action( 'widgets_init', 'buyplaytix_widgets');
add_action('admin_init', array('BuyPlayTix\Wordpress\Plugin', 'admin_init'));
add_action('admin_menu', array('BuyPlayTix\Wordpress\Plugin', 'admin_menu'));
add_action('admin_notices', array('BuyPlayTix\Wordpress\Plugin', 'admin_notices'));
add_action( 'add_meta_boxes', array('BuyPlayTix\WordPress\Plugin', 'register_production_box'));
add_action( 'save_post', array('BuyPlayTix\WordPress\Plugin', 'production_box_save'));

add_filter('plugin_action_links', array('BuyPlayTix\WordPress\Plugin', 'settings_link'), 10, 2);

add_shortcode( 'bpt_calendar', array('BuyPlayTix\Wordpress\Plugin', 'calendar_shorttag'));
add_shortcode( 'bpt_tickets', array('BuyPlayTix\Wordpress\Plugin', 'tickets_shorttag'));
add_shortcode( 'bpt_donate', array('BuyPlayTix\Wordpress\Plugin', 'donate_shorttag'));
add_shortcode( 'bpt_minical', array('BuyPlayTix\Wordpress\Plugin', 'minical_shorttag'));
add_shortcode( 'bpt_when', array('BuyPlayTix\Wordpress\Plugin', 'when_shorttag'));
add_shortcode( 'bpt_logo', array('BuyPlayTix\Wordpress\Plugin', 'logo_shorttag'));
add_shortcode( 'bpt_additional_info', array('BuyPlayTix\Wordpress\Plugin', 'additional_info_shorttag'));
add_shortcode( 'bpt_location', array('BuyPlayTix\Wordpress\Plugin', 'location_shorttag'));
add_shortcode( 'bpt_history', array('BuyPlayTix\Wordpress\Plugin', 'history_shorttag'));






