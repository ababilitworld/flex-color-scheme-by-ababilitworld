<?php
namespace AbabilItWorld\FlexDataManagementByAbabilitWorld\Data\Factory\Generator\Library\Abagen\Tool\Text;

use AbabilItWorld\FlexDataManagementByAbabilitWorld\Data\Factory\Generator\Interface\Generator\Generator as Generator;

class Text implements Generator 
{
    private int $number_Of_sentences;
    private array $wordPool = [
        'Lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit',
        'sed', 'do', 'eiusmod', 'tempor', 'incididunt', 'ut', 'labore', 'et', 'dolore',
        'magna', 'aliqua', 'ut', 'enim', 'ad', 'minim', 'veniam', 'quis', 'nostrud',
        'exercitation', 'ullamco', 'laboris', 'nisi', 'ut', 'aliquip', 'ex', 'ea', 'commodo', 'consequat'
    ];

    public function __construct(array $data = [])
    {
        $this->number_Of_sentences = $data["number_Of_sentences"] ?? rand(1,9);
    }

    /**
     * Generate random natural text.
     *
     * @return string
     */
    public function generate(): mixed 
    {
        $sentenceCount = $this->number_Of_sentences;
        $text = [];

        for ($i = 0; $i < $sentenceCount; $i++) 
        {
            $text[] = $this->generateSentence();
        }

        return implode(' ', $text);        
    }

    /**
     * Generate a random sentence.
     *
     * @return string
     */
    private function generateSentence(): string
    {
        $wordCount = rand(3, 18); // Number of words in a sentence
        $words = [];

        for ($i = 0; $i < $wordCount; $i++) 
        {
            $words[] = $this->wordPool[array_rand($this->wordPool)];
        }

        $sentence = implode(' ', $words);

        // Capitalize first letter and end with a period.
        return ucfirst($sentence) . '.';
    }
}



