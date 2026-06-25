<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Admin;

defined('ABSPATH') || exit;

final class Diagnostics
{
    public function boot(): void
    {
        add_action(
            'admin_submenu_page',
            '__return_false'
        );
    }

    public function render(): void
    {
        ?>

        <table class="widefat striped">

            <tr>

                <th>WordPress</th>

                <td><?php echo esc_html(get_bloginfo('version')); ?></td>

            </tr>

            <tr>

                <th>PHP</th>

                <td><?php echo esc_html(PHP_VERSION); ?></td>

            </tr>

            <tr>

                <th>Wersja wtyczki</th>

                <td><?php echo esc_html(LN_VERSION); ?></td>

            </tr>

        </table>

        <?php
    }
}
