<?php

namespace Webup\CMS\Blade;

abstract class Cms
{
    public const DIRECTIVE = 'cms';

    public static function generate(string $expression): string {
        return "[BEGIN CMS]";
    }

}
