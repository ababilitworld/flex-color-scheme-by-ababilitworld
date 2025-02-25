<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Service;

use AbabilItWorld\{
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Dto\ColorScheme as ColorSchemeDTO,
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Factory\ColorScheme as ColorSchemeFactory,
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository\ColorScheme as ColorSchemeRepository,
};

class ColorScheme
{
    private ColorSchemeRepository $repository;

    public function __construct(ColorSchemeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function createScheme(ColorSchemeDTO $dto): void
    {
        $colorScheme = ColorSchemeFactory::create($dto);
        $this->repository->save($colorScheme);
    }

    public function setActiveScheme(int $id): void
    {
        $this->repository->setActive($id);
    }

    public function getAllSchemes(): array
    {
        return $this->repository->getAll();
    }
}
