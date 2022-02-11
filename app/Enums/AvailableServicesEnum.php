<?php

/**
 * All available services provided by the medical structure
 */

namespace App\Enums {

    abstract class AvailableServicesEnum
    {
        /**
         * All available services returned into this array
         * @var array $availableServices
         */
        protected static $availableServices = [
            "PV" => "Prima visita",
            "DH" => "Day Hospital",
            "C" => "Visita di controllo"
        ];



        /**
         * Returns all available services keys into another array usable for
         * putting all keys into enum database field
         * @method TakeAllServices
         * @return array
         */
        public static function TakeAllServices()
        {
            $key_array = [];
            foreach(self::$availableServices as $key => $value)
            {
                $key_array[] = $key;
            }

            if(!empty($key_array))
            {
                return $key_array;
            }

            return -1;
        }
    }
}

