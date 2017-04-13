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
  const SHORTCODE_NAME = 'demo';
  const SHORTCODE_OPTION_URL = 'url';
  const SHORTCODE_OPTION_LIST_URL = 'list_url';

  public function __construct() {
    add_shortcode(Demos::SHORTCODE_NAME, array($this, 'handleShortcode'));
    if (is_admin()) {
      add_action('admin_head', array($this, 'addAdminStylesheet'));
      add_action('media_buttons', array($this, 'addMediaButton'));
    } else {
      add_action('wp_enqueue_scripts', array($this, 'addStylesheet'));
    }
  }

  public function addAdminStylesheet() {
    wp_enqueue_style(Demos::PLUGIN_SLUG, plugins_url(Demos::PLUGIN_SLUG . '/css/admin.css'));
  }

  public function addMediaButton() {
    echo '<a href="#" id="kantoniak-demos-insert" class="button"><span></span>Add demo</a>';
  }

  public function addStylesheet() {
    wp_enqueue_style(Demos::PLUGIN_SLUG, plugins_url(Demos::PLUGIN_SLUG . '/css/style.css'));
  }

  public function handleShortcode($attributes, $content = '') {
    return $this->loadTemplate(
      'shortcode-demo',
      array(
        'url' => $attributes[Demos::SHORTCODE_OPTION_URL],
        'list_url' => $attributes[Demos::SHORTCODE_OPTION_LIST_URL],
        'content' => $content
      )
    );
  }

  private function loadTemplate($templateName, $data) {
    ob_start();
    include('template-'. $templateName .'.php');
    return ob_get_clean();
  }
}

$demos = new Demos();
}