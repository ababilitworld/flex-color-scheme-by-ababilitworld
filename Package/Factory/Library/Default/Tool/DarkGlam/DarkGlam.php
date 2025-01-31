<?php
namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Tool\DarkGlam;

use Ababilitworld\{
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Base\ColorScheme
};

class DarkGlam extends ColorScheme 
{
    protected array $defaultData = [
        'name' => 'Dark Glam',
        'scheme' => [
            'primary' => '#1E1E2C', // Dark Navy
            'secondary' => '#D72638', // Crimson
            'accent' => '#3F88C5', // Bright Blue
            'background' => '#121212', // Pitch Black
        ]
    ];
}
