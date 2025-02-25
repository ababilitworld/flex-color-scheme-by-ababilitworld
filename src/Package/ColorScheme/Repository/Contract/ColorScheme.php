<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Repository\Contract;

use AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Model\ColorScheme as ColorSchemeModel;

interface ColorScheme
{
    public function getAll(): array;
    public function findById(int $id): ?ColorSchemeModel;
    public function save(ColorSchemeModel $colorScheme): int;
    public function delete(int $id): void;
    public function setActive(int $id): void;
}
