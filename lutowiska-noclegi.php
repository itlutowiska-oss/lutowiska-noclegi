<?php
/**
 * Plugin Name: Lutowiska Noclegi
 * Plugin URI: https://github.com/itlutowiska-oss/lutowiska-noclegi
 * Description: Professional accommodation listings for Lutowiska.
 * Version: 0.1.0
 * Requires at least: 6.0
 * Requires PHP: 8.1
 * Author: IT Lutowiska OSS
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: lutowiska-noclegi
 * Domain Path: /languages
 *
 * @package LutowiskaNoclegi
 */

declare(strict_types=1);

use LutowiskaNoclegi\Plugin;

defined('ABSPATH') || exit;

define('LUTOWISKA_NOCLEGI_VERSION', '0.1.0');
define('LUTOWISKA_NOCLEGI_FILE', __FILE__);
define('LUTOWISKA_NOCLEGI_PATH', plugin_dir_path(__FILE__));
define('LUTOWISKA_NOCLEGI_URL', plugin_dir_url(__FILE__));

$lutowiska_noclegi_autoload = __DIR__ . '/vendor/autoload.php';

if (file_exists($lutowiska_noclegi_autoload)) {
    require_once $lutowiska_noclegi_autoload;
} else {
    require_once __DIR__ . '/src/Contracts/Hookable.php';
    require_once __DIR__ . '/src/Contracts/ServiceProvider.php';
    require_once __DIR__ . '/src/Support/ServiceContainer.php';
    require_once __DIR__ . '/src/Support/ProviderRepository.php';
    require_once __DIR__ . '/src/PostTypes/AccommodationPostType.php';
    require_once __DIR__ . '/src/Taxonomies/AccommodationTaxonomies.php';
    require_once __DIR__ . '/src/Providers/CoreServiceProvider.php';
    require_once __DIR__ . '/src/Plugin.php';
}

add_action(
    'plugins_loaded',
    static function (): void {
        Plugin::instance()->register();
    }
);

register_activation_hook(
    __FILE__,
    static function (): void {
        Plugin::instance()->register();
        flush_rewrite_rules();
    }
);

register_deactivation_hook(
    __FILE__,
    static function (): void {
        flush_rewrite_rules();
    }
);
