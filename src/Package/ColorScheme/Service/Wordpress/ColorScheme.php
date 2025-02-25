<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Service\Wordpress;

use AbabilItWorld\{
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Dto\ColorScheme as ColorSchemeDTO,
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Factory\Wordpress\ColorScheme as ColorSchemeFactory, 
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository\ColorScheme as ColorSchemeRepository,
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Model\ColorScheme as ColorSchemeModel,
};

class ColorScheme
{
    private ColorSchemeRepository $repo;

    public function __construct(ColorSchemeRepository $repo)
    {
        $this->repo = $repo;
    }

    public function createScheme(ColorSchemeDTO $dto): int
    {
        $colorScheme = ColorSchemeFactory::create($dto);
        return $this->repo->save($colorScheme);
    }

    public function getAllSchemes(): array
    {
        return $this->repo->getAll();
    }

    public function setActiveScheme(int $id): void
    {
        $this->repo->setActive($id);
    }
}

