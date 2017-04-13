<?php
/*
Plugin Name: Demo shortcodes
Plugin URI: 
Description: This plugin adds [demo] shortcode to your articles.
Version: 0.0.0
Author: Krzysztof Antoniak
Author URI: http://antoniak.in/
License: GNU General Public License, version 3.0 (GPL-3.0)
 */

namespace kantoniak {

class Demos {

  const PLUGIN_SLUG = 'kantoniak-demos';

  public function __construct() {
    add_shortcode('demo', array($this, 'handleShortcode'));
    if (!is_admin()) {
        add_action('wp_enqueue_scripts', array($this, 'addStylesheet'));
    }
  }

  public function addStylesheet() {
    wp_enqueue_style(Demos::PLUGIN_SLUG, plugins_url(Demos::PLUGIN_SLUG . '/css/style.css')); 
  }

  public function handleShortcode() {
    return $this->loadTemplate('shortcode-demo', []);
  }

  private function loadTemplate($templateName, $data) {
    ob_start();
    include('template-'. $templateName .'.php');
    return ob_get_clean();
  }
}

$demos = new Demos();
}