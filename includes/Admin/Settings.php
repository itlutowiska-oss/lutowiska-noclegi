<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Admin;

defined('ABSPATH') || exit;

final class Settings
{
    public function boot(): void
    {
        add_action(
            'admin_menu',
            [$this, 'menu']
        );
    }

    public function menu(): void
    {
        add_menu_page(

            __('Lutowiska Noclegi', 'lutowiska-noclegi'),

            __('Noclegi', 'lutowiska-noclegi'),

            'manage_options',

            'lutowiska-noclegi',

            [$this, 'page'],

            'dashicons-admin-home',

            26
        );
    }

    public function page(): void
    {
        ?>

        <div class="wrap">

            <h1>Lutowiska Noclegi</h1>

            <p>Panel konfiguracji pojawi się w wersji 3.0.</p>

        </div>

        <?php
    }
}
