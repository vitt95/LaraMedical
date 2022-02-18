<?php



/**
 * Interface for MedicalStaffService
 */

namespace App\Service
{
    use Illuminate\Database\Eloquent\Collection;

    interface IMedicalStaffService
    {
        /**
         * Returns all visits for the current doctor
         * @method visitByDoctor
         * @param int $id
         * @return \Illuminate\Database\Eloquent\Collection
         */
        public function visitsByDoctor(int $id) : Collection;

        /**
         * Returns all exams for the current doctor
         * @method examsByDoctor
         * @param int $id
         * @return \Illuminate\Database\Eloquent\Collection
         */
        public function examsByDoctor(int $id) : Collection;

        /**
         * Returns count of all visits for the current doctor
         * @method visitCountByDoctor
         * @param int $id
         * @return int
         */
        public function visitCountByDoctor(int $id) : int;

        /**
         * Returns count of all exams for the current doctor
         * @method examCountByDoctor
         * @param int $id
         * @return int
         */
        public function examCountByDoctor(int $id) : int;
    }
}

