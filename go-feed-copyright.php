<?php
/**
 * Plugin Name: Gigaom feed copyright & content truncation
 * Version: 0.1
 * Plugin URI: http://gigaom.com
 * Description: Adds copyright lines & UTM codes to feed articles
 * Author: Gigaom Network
 * Author URI: http://gigaom.com
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

require_once __DIR__ . '/components/class-go-feed-copyright.php';
go_feed_copyright();
