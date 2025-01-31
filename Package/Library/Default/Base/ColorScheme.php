<?php
namespace Ababilitworld\FlexColorSchemeByAbabilitworld\Package\Factory\Library\Default\Base;

use AbabilItWorld\{
    FlexColorSchemeByAbabilitworld\Package\Factory\LIbrary\Default\Contract\ColorScheme as ColorSchemeInterface,
};

abstract class ColorScheme implements ColorSchemeInterface
{
    protected array $data;
    protected array $pattern = array(
        'name' => '',
        'scheme' => array(
            'primary' => '',
            'secondary' => '',
            'accent' => '',
            'background' => ''
        )
    );

    protected array $defaultData = [];

    public function __construct($data =[]) 
    {
        $mergedData = array_replace_recursive($this->defaultData, $data);

        if (self::validate($mergedData, $this->pattern)) 
        {
            $this->data = $mergedData;
        }
        else
        {
            throw new \InvalidArgumentException('Invalid data format.');
        }
    }

    public static function validate(array $data, array $pattern): bool 
    {
        // Loop through each key in the pattern
        foreach ($pattern as $key => $value) 
        {
            // Check if the key exists in $data
            if (!array_key_exists($key, $data)) 
            {
                return false;
            }

            // If the value in the pattern is an array, recursively validate
            if (is_array($value)) 
            {
                if (!is_array($data[$key]) || !self::validate($data[$key], $value)) 
                {
                    return false;
                }
            }
            else
            {
                // For non-array values, ensure the $data type matches the pattern type
                if (gettype($data[$key]) !== gettype($value)) 
                {
                    return false;
                }
            }
        }

        return true;
    }

    public function operate(): array 
    {
        return $this->data;
    }

    public function generateThemeCSS(): string 
    {
        return "
            body {
                background-color: {$this->data['scheme']['background']};
                color: {$this->data['scheme']['primary']};
            }
            
            a {
                color: {$this->data['scheme']['accent']};
            }

            a:hover {
                color: {$this->data['scheme']['secondary']};
            }
        ";
    }

    public function applyToCSS(): string 
    {
        return "
            :root {
                --primary: {$this->data['scheme']['primary']};
                --secondary: {$this->data['scheme']['secondary']};
                --accent: {$this->data['scheme']['accent']};
                --background: {$this->data['scheme']['background']};
            }
        ".$this->generateThemeCSS();
    }

    public function preview(): void 
    {
        echo "Color Scheme Name: " . $this->data['name'] . PHP_EOL;
        echo "Primary: " . $this->data['scheme']['primary'] . PHP_EOL;
        echo "Secondary: " . $this->data['scheme']['secondary'] . PHP_EOL;
        echo "Accent: " . $this->data['scheme']['accent'] . PHP_EOL;
        echo "Background: " . $this->data['scheme']['background'] . PHP_EOL;
    }

    
}