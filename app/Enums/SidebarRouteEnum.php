<?php

/**
 * Register all needles for Url comparison for evaluate the initial index for Sidebar to start
 */

namespace App\Enums
{
    abstract class SidebarRouteEnum
    {
        /**
         * @param array $needles
         */
        protected static $needles = [
            "DASHBOARD",
            "PROFILE",
            "ADD/PATIENT"
        ];

        public static function get_needles(){
            return self::$needles;
        }
    }
}
