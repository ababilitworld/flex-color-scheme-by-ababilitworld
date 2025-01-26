<?php

namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Service;

(defined( 'ABSPATH' ) && defined( 'WPINC' )) || die();

use Ababilitworld\{
    FlexTraitByAbabilitworld\Standard\Standard,
    FlexColorSchemeByAbabilitworld\Package\Abstract\ColorScheme,
    FlexColorSchemeByAbabilitworld\Package\Presentation\Template\Template as PaginationTemplate,
};

if (!class_exists(__NAMESPACE__.'\Service')) 
{
    class Service extends ColorScheme
    {
        use Standard;
        /**
         * Constructor.
         */
        public function __construct()
        {
            
        }

        public function init(): void
        {
            add_action('init', [$this, 'registerPostType']);
        }
    }		
}