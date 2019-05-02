<?php
namespace parser\models;

use parser\interfaces\TagCollectionInterface;

class TagCollection implements TagCollectionInterface
{
    private $collection;

    public function __construct(array $elements)
    {
        foreach ($elements as $element) {
            $this->collection[] = new Tag($element);
        }
    }

    public function getTags(): array
    {
        return $this->collection;
    }

    public function getCountTags(): array
    {
        $tags = [];

        foreach ($this->collection as $tag) {
            $tags[$tag->getName()] += 1;
        }

        return $tags;
    }
}