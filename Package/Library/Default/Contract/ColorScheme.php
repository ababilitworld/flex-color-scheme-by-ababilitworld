<?php
namespace AbabilItWorld\FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Contract;

interface ColorScheme
{
    public function operate(): array;
    public function applyToCSS(): string;
}
