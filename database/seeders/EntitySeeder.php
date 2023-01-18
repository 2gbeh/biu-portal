<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use SchemaHelper;

class EntitySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->factory();

        foreach ($data as $t => $rows) {
            $table = 'entity_' . strtolower($t);
            SchemaHelper::insertMultiple($table, $rows);
        }
    }

    public function factory(): array
    {
        $data['APPLICANTS'] = [
            [
                'user_id' => 6,
                'jamb_year' => 2000,
                'jamb_regno' => 'JA123456',
                'jamb_score' => 200,
                'map_sessions_to_programme_id' => 1,
                'map_units_to_programme_id' => 1,
            ],
        ];

        $data['APPLICANT_EXAMS'] = [
            [
                'entity_applicant_id' => 1,
                'list_exam_id' => 1,
                'exam_no' => 'WA123456',
                'exam_center' => 'Ahoada East',
                'exam_month' => 'May',
                'exam_year' => 2000,
                'list_subject_id' => 1,
                'list_grade_id' => 1,
            ],
        ];

        return $data;
    }
}
