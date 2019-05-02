<?php
namespace parser\models;

use parser\interfaces\ContentInterface;
use parser\interfaces\TagCollectionInterface;
use parser\interfaces\TagParserInterface;

class TagParser implements TagParserInterface
{
    private $content;

    public function __construct(ContentInterface $content)
    {
        $this->content = $content;
    }

    public function parse(): TagCollectionInterface
    {
        preg_match_all('/<(\w+.*)\b(?=[^>]*>)/i', $this->content->getContent(), $matches);

        return new TagCollection($matches[1]);
    }
}