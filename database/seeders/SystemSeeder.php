<?php

namespace Database\Seeders;

use BladeHelper;
use Illuminate\Database\Seeder;
use SchemaHelper;

class SystemSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $prefix = 'list_';
        foreach (SchemaHelper::tables($prefix) as $table) {
            $k = str_replace($prefix, '', $table);
            $data = $this->factory($k);
            #! $res[$table] = $k;
            if (count($data) > 0) {
                SchemaHelper::insertMultiple($table, $data);
            }
        }

        $prefix = 'map_';
        foreach (SchemaHelper::tables($prefix) as $table) {
            $k = str_replace($prefix, '', $table);
            $data = $this->factory($k);
            #! $res[$table] = $k;
            if (count($data) > 0) {
                SchemaHelper::insertMultiple($table, $data);
            }
        }
    }

    public function factory(string $index): array
    {
        // LIST OF SESSIONS
        $data_tmp = $arr = [];
        for ($i = 2002; $i < date('Y'); $i++) {
            $arr['value'] = $i . '/' . ($i + 1);
            array_push($data_tmp, $arr);
        }
        $data['SESSIONS'] = $data_tmp;

        // LIST OF LEVELS
        $data_level = $arr = [];
        for ($i = 1; $i <= 7; $i++) {
            $arr['name'] = $i . '00';
            $arr['value'] = BladeHelper::nth($i, false);
            array_push($data_level, $arr);
        }
        $data['LEVELS'] = $data_level;

        // LIST OF PROGRAMMES
        $data['PROGRAMMES'] = [
            ["name" => "DIP", "value" => "Diploma"],
            ["name" => "IJMBE", "value" => "The Interim Joint Matriculation Board Examination"],
            ["name" => "JUPEB", "value" => "Joint Universities Preliminary Examinations Board"],
            ["name" => "PG FT", "value" => "Postgraduate Full-time"],
            ["name" => "PG PT", "value" => "Postgraduate Part-time"],
            ["name" => "PRE", "value" => "Pre-degree"],
            ["name" => "UG FT", "value" => "Undergraduate Full-time"],
            ["name" => "UG PT", "value" => "Undergraduate Part-time"],
        ];

        // LIST OF FACULTIES
        $data['FACULTIES'] = [
            ["value" => "Faculty of Arts & Education", "name" => "FAE"],
            ["value" => "Faculty of Agriculture", "name" => "AAT"],
            ["value" => "Faculty of Law", "name" => "LAW"],
            ["value" => "Faculty of Science", "name" => "BAS"],
            ["value" => "Faculty of Social & Management Sciences", "name" => "SMS"],
            ["value" => "School of Postgraduate Studies", "name" => "PGD"],
            ["value" => "Faculty of Engineering", "name" => "ENG"],

            ["value" => "College of Medicine", "name" => "COLMED"],
            ["value" => "Faculty of Basic & Health Sciences", "name" => "BHS"],
            ["value" => "Faculty of Medicine", "name" => "MED"],
        ];

        // LIST OF DEPARTMENTS
        $data['DEPARTMENTS'] = [
            ["value" => "Department of Arts"],
            ["value" => "Department of Education"],
            ["value" => "Department of English"],
            ["value" => "Department of International Studies & Diplomacy"],

            ["value" => "Department of Agricultural Economics & Extension Services"],
            ["value" => "Department of Agronomy & Environmental Management"],
            ["value" => "Department of Animal Science & Animal Technology"],

            ["value" => "Department of Public Law"],
            ["value" => "Department of Private Law"],

            ["value" => "Department of Biological Sciences"],
            ["value" => "Department of Physical Sciences"],

            ["value" => "Department of Accounting"],
            ["value" => "Department of Business Administration"],
            ["value" => "Department of Economics, Banking & Finance"],
            ["value" => "Department of Mass Communication"],
            ["value" => "Department of Political Science & Public Administration"],
            ["value" => "Department of Sociology & Anthropology"],

            ["value" => "Department of Electrical & Electronics Engineering"],
            ["value" => "Department of Civil Engineering"],
            ["value" => "Department of Mechanical Engineering"],

            ["value" => "Department of Medical Laboratory Science"],
            ["value" => "Department of Nursing Science"],
            ["value" => "Department of Anatomy"],
            ["value" => "Department of Physiology"],
            ["value" => "Department of Medical Microbiology"],
            ["value" => "Department of Chemical Pathology"],
            ["value" => "Department of Haematology & Blood Transfusion Science"],
            ["value" => "Department of Morbid Anatomy, Histology, & Forensic Medicine"],
            ["value" => "Department of Pharmacology & Therapeutics"],
            ["value" => "Department of Internal Medicine"],
            ["value" => "Department of Psychiatry"],
            ["value" => "Department of Surgery"],
            ["value" => "Department of Radiology"],
            ["value" => "Department of Paediatrics"],
            ["value" => "Department of Anaesthesia"],
            ["value" => "Department of Obstetrics & Gyaenacology"],
            ["value" => "Department of Community Medicine & Primary Health Care"],
        ];

        // LIST OF UNITS
        $data['UNITS'] = [
            ["value" => "Accounting & Finance"],
            ["value" => "Agricultural Economics"],
            ["value" => "Agricultural Economics & Extension Services"],
            ["value" => "Agronomy"],
            ["value" => "Animal Breeding & Genetics"],
            ["value" => "Animal Science"],
            ["value" => "Animal Science/Livestock Production"],
            ["value" => "Banking & Finance"],
            ["value" => "Biochemistry"],
            ["value" => "Business Administration"],
            ["value" => "Chemistry"],
            ["value" => "Computer Science"],
            ["value" => "Economics"],
            ["value" => "Education"],
            ["value" => "Educational Administration & Planning"],
            ["value" => "English Language"],
            ["value" => "Guidance & Counselling"],
            ["value" => "International Studies & Diplomacy"],
            ["value" => "Mathematics"],
            ["value" => "Microbiology"],
            ["value" => "Physics"],
            ["value" => "Physics/Geophysics"],
            ["value" => "Public Administration"],
            ["value" => "Political Science & Public Administration"],
            ["value" => "Soil & Environmental Management"],
        ];

        // LIST OF EXAMS
        $data['EXAMS'] = [
            ["value" => "W.A.S.S.C.E."],
            ["value" => "S.S.C.E."],
            ["value" => "G.C.E. O-LEVEL"],
            ["value" => "N.E.C.O."],
            ["value" => "N.A.B.T.E.B."],
        ];

        // LIST OF SUBJECTS
        $data['SUBJECTS'] = [
            ["value" => "ACCOUNTING"],
            ["value" => "AGRICULTURE"],
            ["value" => "APPLIED ELECTRICITY"],
            ["value" => "ARABIC"],
            ["value" => "AUTO MECHANICS"],
            ["value" => "BIOLOGY"],
            ["value" => "CHEMISTRY"],
            ["value" => "CHRISTIAN RELIGIOUS KNOWLEDGE"],
            ["value" => "CLOTHING AND TEXTILE"],
            ["value" => "COMMERCE"],
            ["value" => "COMPUTER SCIENCE/TYPING"],
            ["value" => "ECONOMICS"],
            ["value" => "ENGLISH LANGUAGE"],
            ["value" => "FOOD AND NUTRITION"],
            ["value" => "FRENCH"],
            ["value" => "GEOGRAPHY"],
            ["value" => "GOVERNMENT"],
            ["value" => "HISTORY"],
            ["value" => "HOME MANAGEMENT"],
            ["value" => "ISLAMIC RELIGIOUS KNOWLEDGE"],
            ["value" => "LITERATURE-IN ENGLISH"],
            ["value" => "MATHEMATICS"],
            ["value" => "METAL WORK"],
            ["value" => "MUSIC"],
            ["value" => "NIGERIAN LANGUAGE (IGBO)"],
            ["value" => "PHYSICAL EDUCATION"],
            ["value" => "PHYSICS"],
            ["value" => "TECHNICAL DRAWING"],
            ["value" => "VISUAL"],
            ["value" => "WOOD WORK"],
            ["value" => "NIGERIAN LANGUAGE (HAUSA)"],
            ["value" => "NIGERIAN LANGUAGE (YORUBA)"],
            ["value" => "FURTHER MATHEMATICS"],
            ["value" => "COMPUTER STUDIES"],
            ["value" => "DATA PROCESSING"],
            ["value" => "CIVIC EDUCATION"],
            ["value" => "TOURISM"],
            ["value" => "MARKETING"],
            ["value" => "FISHERY"],
            ["value" => "VISUAL ART"],
            ["value" => "INFORMATION AND COMMUNICATION TECHNOLOGY"],
            ["value" => "CATERING CRAFT"],
            ["value" => "GARMENT MAKING"],
            ["value" => "DYEING AND BLEACHING"],
        ];

        // LIST OF GRADES
        $data['GRADES'] = [
            ['value' => 'A1'],
            ['value' => 'A2'],
            ['value' => 'A3'],
            ['value' => 'B2'],
            ['value' => 'B3'],
            ['value' => 'B4'],
            ['value' => 'B5'],
            ['value' => 'B6'],
            ['value' => 'C4'],
            ['value' => 'C5'],
            ['value' => 'C6'],
            ['value' => 'P7'],
            ['value' => 'P8'],
            ['value' => 'D7'],
            ['value' => 'D8'],
            ['value' => 'E'],
            ['value' => 'F9'],
            ['value' => 'A/R'],
        ];

        $data['SESSIONS_TO_PROGRAMMES'] = [
            'list_session_id' => 1,
            'list_programme_id' => 1,
        ];

        $data['DEPARTMENTS_TO_FACULTIES'] = [
            'list_department_id' => 1,
            'list_faculty_id' => 1,
        ];

        $data['UNITS_TO_DEPARTMENTS'] = [
            'list_unit_id' => 1,
            'list_department_id' => 1,
        ];

        $data['UNITS_TO_PROGRAMMES'] = [
            'degree' => 'B.Sc.',
            'list_unit_id' => 1,
            'list_programme_id' => 1,
        ];

        $i = strtoupper($index);
        return isset($data[$i]) ? $data[$i] : [];
    }
}
