<?php
/**
 * created by ward
 * since 2.1.4
*/

namespace twentyfourhoursmedia\viewswork\helper;

use Craft;

class VersionHelper
{
    /**
     * @return array
     */
    public static function getAllSectionsHelper(): array
    {
        return Craft::$app->entries->getAllSections();
    }
}
