<?php

namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Presentation;

(defined('ABSPATH') && defined('WPINC')) || die();

use Ababilitworld\{
    FlexTraitByAbabilitworld\Standard\Standard,
    FlexPluginInfoByAbabilitworld\Package\Service\Service as Service,
    FlexColorSchemeByAbabilitworld\Package\Package as Package,
};

if (!class_exists(__NAMESPACE__.'\Presentation')) 
{
    class Presentation 
    {
        use Standard;

        private $package;

        public function __construct() 
        {
            $this->package = Package::instance();
        }
    }
}

?>