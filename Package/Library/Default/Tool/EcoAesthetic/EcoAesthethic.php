<?php
namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Tool\EcoAesthethic;

use Ababilitworld\{
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Base\ColorScheme
};
class EcoAesthethic extends ColorScheme 
{
    protected array $defaultData = [
        'name' => 'Eco Aesthetic',
        'scheme' => [
            'primary' => '#6B705C', // Earthy Green
            'secondary' => '#B7B7A4', // Light Sage
            'accent' => '#CB997E', // Clay
            'background' => '#FFE8D6', // Cream
        ]
    ];
}
