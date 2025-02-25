<?php

namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\ColorScheme\Model;

class ColorScheme
{
    public int $id;
    public string $name;
    public array $colors;
    public bool $isActive;

    public function __construct(int $id = 0, string $name, array $colors, bool $isActive = false)
    {
        $this->id = $id;
        $this->name = $name;
        $this->colors = $colors;
        $this->isActive = $isActive;
    }

    public function getId(): int 
    { 
        return $this->id; 
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColors(): array
    {
        return $this->colors;
    }
    
    public function isActive(): bool 
    { 
        return $this->isActive; 
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'colors' => $this->colors
        ];
    }
}
