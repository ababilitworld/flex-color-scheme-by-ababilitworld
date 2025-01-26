<?php

namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Abstract;

(defined('ABSPATH') && defined('WPINC')) || die();

use Ababilitworld\{
    FlexTraitByAbabilitworld\Standard\Standard,
    FlexTraitByAbabilitworld\Security\Sanitization\Sanitization,
    FlexColorSchemeByAbabilitworld\Package\Interface\ColorScheme as ColorSchemeInterface
};

/**
 * Abstract class ColorScheme
 * Provides a base structure for managing custom post types with configurable labels and textdomain.
 */
if (!class_exists(__NAMESPACE__ . '\ColorScheme')) 
{
    abstract class ColorScheme implements ColorSchemeInterface
    {
        use Standard, Sanitization;

        /**
         * @var array Configuration data for the post type.
         */
        protected array $config;

        /**
         * Default labels for the post type.
         *
         * @param string $singular Singular form of the post type name.
         * @param string $plural Plural form of the post type name.
         * @param string $textdomain Textdomain for translations.
         * @return array
         */
        protected function defaultLabels(string $singular, string $plural, string $textdomain): array
        {
            return [
                'name' => __($plural, $textdomain),
                'singular_name' => __($singular, $textdomain),
                'add_new' => __('Add New', $textdomain),
                'add_new_item' => sprintf(__('Add New %s', $textdomain), $singular),
                'edit_item' => sprintf(__('Edit %s', $textdomain), $singular),
                'new_item' => sprintf(__('New %s', $textdomain), $singular),
                'view_item' => sprintf(__('View %s', $textdomain), $singular),
                'search_items' => sprintf(__('Search %s', $textdomain), $plural),
                'not_found' => sprintf(__('No %s found', $textdomain), strtolower($plural)),
                'not_found_in_trash' => sprintf(__('No %s found in Trash', $textdomain), strtolower($plural)),
                'all_items' => sprintf(__('All %s', $textdomain), $plural),
                'archives' => sprintf(__('%s Archives', $textdomain), $singular),
                'attributes' => sprintf(__('%s Attributes', $textdomain), $singular),
                'insert_into_item' => sprintf(__('Insert into %s', $textdomain), strtolower($singular)),
                'uploaded_to_this_item' => sprintf(__('Uploaded to this %s', $textdomain), strtolower($singular)),
            ];
        }

        /**
         * Default arguments for the post type.
         *
         * @return array
         */
        protected function defaultArgs(): array
        {
            return [
                'public' => true,
                'has_archive' => true,
                'supports' => ['title', 'editor', 'thumbnail'],
                'show_in_rest' => true,
            ];
        }

        /**
         * ColorScheme constructor.
         *
         * @param array $config Configuration data for the post type.
         */
        public function __construct(array $config)
        {
            $singular = $config['singular'] ?? 'Item';
            $plural = $config['plural'] ?? 'Items';
            $textdomain = $config['textdomain'] ?? 'textdomain';

            $defaults = [
                'post_type' => 'custom_post', // Default post type slug
                'labels' => $this->defaultLabels($singular, $plural, $textdomain),
                'args' => $this->defaultArgs(),
            ];

            $mergedConfig = array_replace_recursive($defaults, $config);
            $this->config = $this->sanitizeConfig($mergedConfig);
        }

        /**
         * Initialize the post type.
         *
         * @return void
         */
        abstract public function init(): void;

        /**
         * Register the post type with WordPress.
         *
         * @return void
         */
        protected function registerPostType(): void
        {
            if (isset($this->config['post_type']) && isset($this->config['args'])) 
            {
                register_post_type($this->config['post_type'], $this->config['args']);
            }
            else
            {
                throw new \InvalidArgumentException('Invalid post type configuration.');
            }
        }

        /**
         * Sanitize configuration data.
         *
         * @param array $config Raw configuration data.
         * @return array Sanitized configuration data.
         */
        protected function sanitizeConfig(array $config): array
        {
            // Use Sanitization trait to sanitize config data.
            return $this->sanitizeArray($config);
        }
    }
}
