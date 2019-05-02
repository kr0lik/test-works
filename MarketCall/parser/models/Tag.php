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
        preg_match_all('/([a-zA-Z]*)/iu', $this->tag,$matches);
        $this->name = $matches[1][0];
    }

    private function parseTagAttributes(): void
    {
        preg_match_all('/(\w+)=[\'"]([^\'"]*)/iu', $this->tag,$matches);
        $this->attributes = array_combine($matches[1], $matches[2]);
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
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }

        return null;
    }
}