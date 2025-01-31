<?php
namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Tool\ModernMinimalist;

use Ababilitworld\{
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Base\ColorScheme
};
class ModernMinimalist extends ColorScheme 
{
    protected array $defaultData = [
        'name' => 'Modern Minimalist',
        'scheme' => [
            'primary' => '#333333', // Deep Gray
            'secondary' => '#4CAF50', // Emerald Green
            'accent' => '#E91E63', // Vivid Pink
            'background' => '#F4F4F4', // Light Gray
        ]
    ];
}
