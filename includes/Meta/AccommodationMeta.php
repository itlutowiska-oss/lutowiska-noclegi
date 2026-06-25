<?php

declare(strict_types=1);

namespace Lutowiska\Noclegi\Meta;

use Lutowiska\Noclegi\Core\Contracts\BootableInterface;
use Lutowiska\Noclegi\PostTypes\AccommodationPostType;

defined('ABSPATH') || exit;

final class AccommodationMeta implements BootableInterface
{
    public function boot(): void
    {
        add_action('add_meta_boxes', [$this, 'register']);
        add_action('save_post', [$this, 'save']);
    }

    public function register(): void
    {
        add_meta_box(
            'ln_accommodation',
            __('Dane obiektu', 'lutowiska-noclegi'),
            [$this, 'render'],
            AccommodationPostType::POST_TYPE,
            'normal',
            'high'
        );
    }

    public function render(\WP_Post $post): void
    {
        wp_nonce_field('ln_meta_box', 'ln_meta_nonce');

        $fields = [
            'liczba_miejsc' => '',
            'adres'         => '',
            'telefon'       => '',
            'email'         => '',
            'strona_www'    => '',
            'link_mapy'     => '',
        ];

        foreach ($fields as $key => $default) {
            $fields[$key] = get_post_meta($post->ID, $key, true) ?: $default;
        }

        include LN_PATH . 'templates/admin/meta-accommodation.php';
    }

    public function save(int $postId): void
    {
        if (! isset($_POST['ln_meta_nonce'])) {
            return;
        }

        if (! wp_verify_nonce($_POST['ln_meta_nonce'], 'ln_meta_box')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (! current_user_can('edit_post', $postId)) {
            return;
        }

        $meta = [
            'liczba_miejsc',
            'adres',
            'telefon',
            'email',
            'strona_www',
            'link_mapy',
        ];

        foreach ($meta as $key) {
            if (isset($_POST[$key])) {
                update_post_meta(
                    $postId,
                    $key,
                    sanitize_text_field(wp_unslash($_POST[$key]))
                );
            }
        }
    }
}
