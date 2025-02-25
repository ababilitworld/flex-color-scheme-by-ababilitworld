<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Factory\Wordpress;

use AbabilItWorld\{
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Model\ColorScheme as ColorSchemeModel,
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Dto\ColorScheme as ColorSchemeDTO,
};
class ColorScheme
{
    public static function create(ColorSchemeDTO $dto): ColorSchemeModel
    {
        return new ColorSchemeModel(
            rand(1, 1000),
            $dto->name,
            $dto->colors,
            $dto->isActive
        );
    }
}
