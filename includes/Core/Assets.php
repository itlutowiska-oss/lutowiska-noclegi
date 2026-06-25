<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Core;

defined('ABSPATH') || exit;

final class Assets
{
    public function boot(): void
    {
        add_action(
            'wp_enqueue_scripts',
            [$this, 'frontend']
        );

        add_action(
            'admin_enqueue_scripts',
            [$this, 'admin']
        );
    }

    public function frontend(): void
    {
        wp_enqueue_style(
            'ln-front',
            LN_URL . 'assets/css/frontend.css',
            [],
            LN_VERSION
        );

        wp_enqueue_script(
            'ln-front',
            LN_URL . 'assets/js/frontend.js',
            [],
            LN_VERSION,
            true
        );
    }

    public function admin(): void
    {
        wp_enqueue_style(
            'ln-admin',
            LN_URL . 'assets/css/admin.css',
            [],
            LN_VERSION
        );
    }
}
