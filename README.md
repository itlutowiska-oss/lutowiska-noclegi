# Lutowiska Noclegi

Professional WordPress plugin for accommodation listings in Lutowiska.

## Requirements

- WordPress 6.x
- PHP 8.1+
- Gutenberg-ready editor support
- Blocksy-compatible frontend output

## Development principles

- Custom post types and taxonomies only.
- No ACF, CPT UI, or Filter Everything dependency.
- PSR-12 structure with WordPress Coding Standards.
- Small services registered through a single plugin kernel.

## Current scope

The first core commit introduces:

- plugin bootstrap,
- PSR-4 autoload configuration,
- service registration contract,
- custom accommodation post type,
- accommodation-related taxonomies.
