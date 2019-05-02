<?php

require_once('parser' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoloader.php');

use parser\models\TagParser;
use parser\models\Content;

$input = 'https://habr.com/ru/';
echo "Enter page url($input): ";
$input = trim((string) fgets(STDIN)) ?: $input;
$parser = new TagParser(Content::loadByUrl($input));
$collection = $parser->parse();

echo "\r\n";
echo "Count tags on page: ";
print_r($collection->getCountTags());