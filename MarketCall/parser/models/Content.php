<?php
namespace parser\models;

use parser\interfaces\ContentInterface;

class Content implements ContentInterface
{
    private $content;

    private function __construct(string $content)
    {
        $this->content = $content;
    }

    public static function loadByUrl(string $url): self
    {
        if (! filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \Exception('Url not valid.');
        }

        if (! $content = file_get_contents($url)) {
            throw new \Exception("Can't load page.");
        }

        return new self($content);
    }

    public function getContent(): string
    {
        return $this->content;
    }
}