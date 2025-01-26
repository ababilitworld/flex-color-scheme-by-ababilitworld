<?php
namespace AbabilItWorld\FlexDataManagementByAbabilitWorld\Generation\Factory;

use AbabilItWorld\{
    FlexDataManagementByAbabilitworld\Data\Factory\Generator\Interface\Generator\Generator as Tool,
    FlexDataManagementByAbabilitWorld\Data\Factory\Generator\Library\Abagen\Tool\Text\Text as TextTool,
    FlexDataManagementByAbabilitWorld\Data\Factory\Generator\Library\Abagen\Tool\Html\Html as HTMLTool,
    FlexDataManagementByAbabilitWorld\Data\Factory\Generator\Library\Abagen\Tool\Username\Username as UsernameTool,
};

class Factory 
{
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
            'bold_vibrant' => new TextTool(),
            'dark_glam' => new HTMLTool(),
            'modern_minimalist' => new UsernameTool(),
            'worm_pastle' => new UsernameTool(),
            default => throw new \InvalidArgumentException("Unsupported factory rule: $rule"),
        };
    }
}
