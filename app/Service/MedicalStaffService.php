<?php



namespace App\Service
{

    use Illuminate\Database\Eloquent\Collection;
    use Illuminate\Support\Facades\DB;
    use App\Service\IMedicalStaffService;

    class MedicalStaffService implements IMedicalStaffService
    {
        public function visitCountByDoctor(int $id): int
        {
            return DB::table('medical_examinations')->where('id_doctor', $id)->count();
        }

        public function visitsByDoctor(int $id): Collection
        {
            return new Collection();
        }

        public function examsByDoctor(int $id): Collection
        {
            return new Collection();
        }

        public function examCountByDoctor(int $id): int
        {
            return 0;
        }

    }
}
