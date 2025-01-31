<?php
namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Tool\BoldVibrant;

use Ababilitworld\{
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Base\ColorScheme
};

class BoldVibrant extends ColorScheme
{
    protected array $defaultData = [
        'name' => 'Bold Vibrant',
        'scheme' => [
            'primary' => '#FF5722',     // Bold orange
            'secondary' => '#4CAF50',   // Vibrant green
            'accent' => '#03A9F4',      // Bright blue
            'background' => '#212121'   // Dark gray
        ]
    ];
    
}
