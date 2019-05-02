<?php
namespace parser\interfaces;

interface TagParserInterface
{
    public function parse(): TagCollectionInterface;
}