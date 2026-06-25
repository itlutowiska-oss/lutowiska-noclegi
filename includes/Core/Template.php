<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Core;

defined('ABSPATH') || exit;

final class Template
{
    public static function render(
        string $template,
        array $data = []
    ): void {

        $theme = locate_template(
            'lutowiska-noclegi/' . $template . '.php'
        );

        if ($theme) {

            extract($data, EXTR_SKIP);

            include $theme;

            return;
        }

        $plugin = LN_PATH .
            'templates/' .
            $template .
            '.php';

        if (is_readable($plugin)) {

            extract($data, EXTR_SKIP);

            include $plugin;
        }
    }
}
