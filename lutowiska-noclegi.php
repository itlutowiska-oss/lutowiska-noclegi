<?php
/**
 * Plugin Name:       Lutowiska Noclegi
 * Plugin URI:        https://gminalutowiska.pl
 * Description:       Profesjonalny katalog noclegów Gminy Lutowiska.
 * Version:           2.0.0
 * Requires at least: 6.7
 * Requires PHP:      8.1
 * Author:            Gmina Lutowiska
 * Text Domain:       lutowiska-noclegi
 * Domain Path:       /languages
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

define('LN_VERSION', '2.0.0');
define('LN_FILE', __FILE__);
define('LN_PATH', plugin_dir_path(__FILE__));
define('LN_URL', plugin_dir_url(__FILE__));

require_once LN_PATH . 'includes/Core/Autoloader.php';

Lutowiska\Noclegi\Core\Autoloader::register();

Lutowiska\Noclegi\Core\Plugin::instance()->boot();
