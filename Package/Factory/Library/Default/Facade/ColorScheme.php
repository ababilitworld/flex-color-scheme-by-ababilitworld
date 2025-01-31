<?Php
namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Facade;

use Ababilitworld\{
    FlexColorSchemeByAbabilitworld\Package\Factory\Factory as Factory,
    FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Contract\ColorScheme as ColorSchemeContract
};

class ColorScheme
{

    protected Factory $schemeFactory;

    // Cache for tools to avoid repeated instantiation
    private static array $cachedTools = [];

    public function __construct() 
    {
        $this->schemeFactory = new Factory();
    }

    /**
     * Get CSS from a color scheme tool.
     *
     * @param string $rule
     * @return string
     */
    public static function getCSS(string $rule): string
    {
        try {
            $tool = self::resolveTool($rule);
            return $tool->applyToCSS();
        } catch (\Exception $e) {
            return "/* Error: {$e->getMessage()} */";
        }
    }

    /**
     * Preview the details of a color scheme in a readable format.
     *
     * @param string $rule
     * @return string
     */
    public static function preview(string $rule): string
    {
        try {
            $tool = self::resolveTool($rule);

            // Generate a preview string
            return <<<EOT
                Color Scheme Name: {$tool->operate()['name']}
                Primary: {$tool->operate()['scheme']['primary']}
                Secondary: {$tool->operate()['scheme']['secondary']}
                Accent: {$tool->operate()['scheme']['accent']}
                Background: {$tool->operate()['scheme']['background']}
            EOT;
        } catch (\Exception $e) {
            return "Error: {$e->getMessage()}";
        }
    }

    /**
     * Add a custom tool to the factory.
     *
     * @param string $rule
     * @param ColorScheme $tool
     * @return void
     */
    public static function addCustomTool(string $rule, ColorScheme $tool): void
    {
        Factory::add_tool($rule, $tool);
        unset(self::$cachedTools[$rule]); // Clear cache for updated tools
    }

    /**
     * List all available tools (predefined + custom).
     *
     * @return array
     */
    public static function listTools(): array
    {
        // List of predefined tools (defined in the Factory)
        $predefinedTools = ['bold_vibrant', 'dark_glam', 'modern_minimalist', 'worm_pastle'];

        // Include custom tools
        $customTools = array_keys(self::$cachedTools);

        // Merge and remove duplicates
        return array_unique(array_merge($predefinedTools, $customTools));
    }

    /**
     * Resolve and retrieve a tool, using caching for better performance.
     *
     * @param string $rule
     * @return ColorScheme
     * @throws \InvalidArgumentException If the tool is not found
     */
    private static function resolveTool(string $rule): ColorScheme
    {
        // Return cached instance if available
        if (isset(self::$cachedTools[$rule])) {
            return self::$cachedTools[$rule];
        }

        // Retrieve the tool from the Factory
        $tool = Factory::get_tool($rule);

        // Cache the tool for subsequent use
        self::$cachedTools[$rule] = $tool;

        return $tool;
    }
}

