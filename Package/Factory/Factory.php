<?php
namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Factory\Factory;

use Ababilitworld\{
    FlexTraitByAbabilitworld\Standard\Standard,
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Contract\ColorScheme as Tool,
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Tool\BoldVibrant\BoldVibrant as BoldVibrant,
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Tool\DarkGlam\DarkGlam as DarkGlam,
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Tool\ModernMinimalist\ModernMinimalist as ModernMinimalist,
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Tool\WormPastle\WormPastle as WormPastle,
};

class Factory
{
    use Standard;
    private static array $tools = [];

    /**
     * Register a custom tool.
     *
     * @param string $rule
     * @param Tool $tool
     */
    public static function add_tool(string $rule, Tool $tool): void 
    {
        self::$tools[$rule] = $tool;
    }

    /**
     * Get a tool instance.
     *
     * @param string $rule
     * @return Tool
     */
    public static function get_tool(string $rule): Tool 
    {
        // Check if the rule exists in custom tools
        if (array_key_exists($rule, self::$tools) && isset(self::$tools[$rule])) 
        {
            return self::$tools[$rule];
        }

        // Default tools
        return match ($rule) 
        {
            'bold_vibrant' => new BoldVibrant(),
            'dark_glam' => new DarkGlam(),
            'modern_minimalist' => new ModernMinimalist(),
            'worm_pastle' => new WormPastle(),
            default => throw new \InvalidArgumentException("Unsupported factory rule: $rule"),
        };
    }
}