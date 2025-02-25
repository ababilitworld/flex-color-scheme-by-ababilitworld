<?php
namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Package\Test;

use PHPUnit\Framework\TestCase;
use AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Service\ColorScheme as ColorSchemeService;
use AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository\ColorScheme as ColorSchemeRepository;
use AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Dto\ColorScheme as ColorSchemeDTO;

class ColorScheme extends TestCase
{
    public function testCreateColorScheme()
    {
        $repo = new ColorSchemeRepository();
        $service = new ColorSchemeService($repo);

        $dto = new ColorSchemeDTO("Dark Mode", ['primary' => '#000000', 'secondary' => '#ffffff'], true);
        $service->createScheme($dto);

        $schemes = $service->getAllSchemes();
        $this->assertCount(1, $schemes);
    }
}
