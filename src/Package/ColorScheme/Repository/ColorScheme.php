<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository;

use Ababilitworld\{
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository\Contract\ColorScheme as ColorSchemeContract,
    FlexColorSchemeByAbabilitworld\Package\ColorScheme\Model\ColorScheme as ColorSchemeModel,
};

class ColorScheme implements ColorSchemeContract
{
    private array $colorSchemes = []; // This would be replaced with a database

    public function getAll(): array { return $this->colorSchemes; }

    public function findById(int $id): ?ColorSchemeModel
    {
        return $this->colorSchemes[$id] ?? null;
    }

    public function save(ColorSchemeModel $colorScheme): int
    {
        $this->colorSchemes[$colorScheme->getId()] = $colorScheme;
        return $colorScheme->getId();
    }

    public function delete(int $id): void
    {
        unset($this->colorSchemes[$id]);
    }

    public function setActive(int $id): void
    {
        foreach ($this->colorSchemes as $scheme) 
        {
            $scheme->isActive = false;
        }

        $this->colorSchemes[$id]->isActive = true;
    }
}
