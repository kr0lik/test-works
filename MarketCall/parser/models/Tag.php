<?php
namespace parser\models;

use parser\interfaces\TagInterface;

class Tag implements TagInterface
{
    private $tag;

    private $name;
    private $attributes = [];

    public function __construct(string $tag)
    {
        $this->tag = $tag;

        $this->parseTagName();
        $this->parseTagAttributes();
    }

    private function parseTagName(): void
    {
        preg_match('/(?<name>[a-zA-Z]*)/iu', $this->tag,$matches);

        $this->name = $matches['name'];
    }

    private function parseTagAttributes(): void
    {
        preg_match_all('/(?<attribute>\w+)=[\'"](?<value>[^\'"]*)/iu', $this->tag,$matches);

        $this->attributes = array_combine($matches['attribute'], $matches['value']);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getAttributeByName(string $name): ?string
    {
        return $this->attributes[$name] ?: null;
    }
}