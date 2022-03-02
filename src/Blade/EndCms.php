<?php

namespace Webup\CMS\Blade;

abstract class EndCms
{
    public const DIRECTIVE = 'endcms';

    public static function generate(string $expression): string {
        return "[END CMS]";
    }

}
