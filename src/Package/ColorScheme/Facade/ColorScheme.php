<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Facade;

use AbabilItWorld\{
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Service\ColorScheme as ColorSchemeService,
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Dto\ColorScheme as ColorSchemeDTO,
    
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository\ColorScheme as ColorSchemeRepository,
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Model\ColorScheme as ColorSchemeModel,
};

class ColorScheme
{
    private static ColorSchemeService $service;

    public static function setService(ColorSchemeService $service): void
    {
        self::$service = $service;
    }

    public static function createScheme(array $data): void
    {
        self::$service->createScheme(new ColorSchemeDTO($data['name'], $data['colors'], $data['isActive'] ?? false));
    }

    public static function getSchemes(): array
    {
        return self::$service->getAllSchemes();
    }
}
