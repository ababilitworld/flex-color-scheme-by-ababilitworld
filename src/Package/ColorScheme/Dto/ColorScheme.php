<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Dto;

class ColorScheme
{
    public string $name;
    public array $colors;
    public bool $isActive;

    public function __construct(string $name, array $colors, bool $isActive = false)
    {
        $this->name = $name;
        $this->colors = $colors;
        $this->isActive = $isActive;
    }
}
