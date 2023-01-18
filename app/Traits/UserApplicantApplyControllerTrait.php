<?php
declare (strict_types = 1);

namespace App\Traits;

use App\Models\EntityApplicant;
use App\Models\EntityApplicantExam;
use App\Models\MapSessionsToProgramme;
use App\Models\MapUnitsToProgramme;
use App\Models\UserContact;
use App\Models\UserProfile;
use App\Traits\RouteTrait;
// use App\Traits\Literate;
use EnumHelper as k;
use Illuminate\Routing\Route;

trait UserApplicantApplyControllerTrait
{
    // use Literate;

    public function navTabs()
    {
        return [
            [
                'id' => 'bio',
                'icon' => 'fas fa-user-circle',
                'text' => 'Biodata',
            ],
            [
                'id' => 'nok',
                'icon' => 'fas fa-user-friends',
                'text' => 'Next of Kin',
            ],
            [
                'id' => 'sponsor',
                'icon' => 'fas fa-heart',
                'text' => 'Guardian / Sponsor',
            ],
            [
                'id' => 'jamb',
                'icon' => 'fas fa-atom',
                'text' => 'Jamb / UTME',
            ],
            [
                'id' => 'exams',
                'icon' => 'fas fa-microscope',
                'text' => 'O-Level Exams',
            ],
            [
                'id' => 'course',
                'icon' => 'fas fa-user-graduate',
                'text' => 'Course of Study',
            ],
        ];
    }

    public function tabPaneBio($user_id)
    {
        $userProfile = UserProfile::findOrFail_($user_id);
        $dl_lga = UserProfile::dl('lga_of_origin');

        return [
            [
                [
                    'col' => 2,
                    'type' => 'select',
                    'label' => 'Title',
                    'name' => 'title',
                    'value' => $userProfile->title,
                    'placeholder' => 'Mr./Mrs.',
                    'options' => k::ddlNoKey('TITLE'),
                ],
            ], [
                [
                    'col' => 4,
                    'label' => '*Surname',
                    'name' => 'surname',
                    'value' => $userProfile->surname,
                    'placeholder' => 'Family name',
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'label' => '*First Name',
                    'name' => 'first_name',
                    'value' => $userProfile->first_name,
                    'placeholder' => 'Given name',
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'label' => 'Middle Name',
                    'name' => 'middle_name',
                    'value' => $userProfile->middle_name,
                ],
            ], [
                [
                    'col' => 3,
                    'type' => 'select',
                    'label' => '*Gender',
                    'name' => 'sex',
                    'value' => $userProfile->sex,
                    'options' => k::ddl('SEX_MAP'),
                    'constraint' => 'required',
                ], [
                    'col' => 3,
                    'type' => 'date',
                    'label' => '*Date of Birth',
                    'name' => 'dob',
                    'value' => $userProfile->dob,
                    'constraint' => 'required',
                ], [
                    'col' => 3,
                    'type' => 'select',
                    'label' => '*Religion',
                    'name' => 'religion',
                    'value' => $userProfile->religion,
                    'options' => k::ddlNoKey('RELIGION'),
                    'constraint' => 'required',
                ], [
                    'col' => 3,
                    'type' => 'select',
                    'label' => '*Marital Status',
                    'name' => 'marital_status',
                    'value' => $userProfile->marital_status,
                    'options' => k::ddlNoKey('MARITAL_STATUS'),
                    'constraint' => 'required',
                ],
            ], [
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Nationality',
                    'name' => ' nationality',
                    'value' => $userProfile->nationality,
                    'options' => k::ddl('COUNTRY'),
                    'constraint' => 'required',
                ], [
                    'col' => 3,
                    'type' => 'select',
                    'label' => '*State of Origin',
                    'name' => 'state_of_origin',
                    'value' => $userProfile->state_of_origin,
                    'options' => k::ddlNoKey('STATES_NG'),
                    'constraint' => 'required',
                ], [
                    'col' => 3,
                    'label' => '*Local Govt. of Origin',
                    'name' => 'lga_of_origin',
                    'value' => $userProfile->lga_of_origin,
                    'datalist' => $dl_lga,
                    'constraint' => 'required',
                ],
            ],
            [
                [
                    'col' => 3,
                    'type' => 'email',
                    'label' => '*Email Address',
                    'name' => 'email',
                    'value' => $userProfile->email,
                    'placeholder' => 'Ex. example@domain.com',
                    'constraint' => 'required readonly',
                ], [
                    'col' => 3,
                    'type' => 'tel',
                    'label' => '*Phone Number',
                    'name' => 'phone_no',
                    'value' => $userProfile->phone_no,
                    'placeholder' => 'Ex. +1(234)567-890',
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'search',
                    'label' => '*Home Address',
                    'name' => 'address',
                    'value' => $userProfile->address,
                    'constraint' => 'required',
                ],
            ],
        ];
    }

    public function tabPaneNok($user_id)
    {
        $userContact = UserContact::findOrFail_($user_id);
        $dl_rel = UserContact::dl('rel');

        return [
            [
                [
                    'col' => 6,
                    'type' => 'search',
                    'label' => '*Full Name',
                    'name' => 'names',
                    'value' => $userContact->names ?? null,
                    'placeholder' => 'N/b/: Surname first',
                    'constraint' => 'required',
                ], [
                    'col' => 3,
                    'type' => 'select',
                    'label' => '*Gender',
                    'name' => 'sex',
                    'value' => $userContact->sex ?? null,
                    'options' => k::ddl('SEX_MAP'),
                    'constraint' => 'required',
                ], [
                    'col' => 3,
                    'type' => 'search',
                    'label' => '*Relationship',
                    'name' => 'rel',
                    'value' => $userContact->rel ?? null,
                    'datalist' => $dl_rel,
                    'constraint' => 'required',
                ],
            ],
            [
                [
                    'col' => 6,
                    'type' => 'email',
                    'label' => 'Email Address',
                    'name' => 'email',
                    'value' => $userContact->email ?? null,
                    'placeholder' => 'Ex. example@domain.com',
                ], [
                    'col' => 6,
                    'type' => 'tel',
                    'label' => '*Phone Number',
                    'name' => 'phone_no',
                    'value' => $userContact->phone_no ?? null,
                    'placeholder' => 'Ex. +1(234)567-890',
                    'constraint' => 'required',
                ],
            ],
            [
                [
                    'type' => 'textarea',
                    'label' => 'Home Address',
                    'name' => 'address',
                    'value' => $userContact->address ?? null,
                ],
            ],
        ];
    }

    public function tabPaneSponsor($user_id)
    {
        $userContact = UserContact::findOrFail_($user_id);

        return [
            [
                [
                    'col' => 8,
                    'type' => 'search',
                    'label' => '*Full Name',
                    'name' => 'names',
                    'value' => $userContact->names ?? null,
                    'placeholder' => 'N/b/: Surname first',
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'type' => 'select',
                    'label' => '*Gender',
                    'name' => 'sex',
                    'value' => $userContact->sex ?? null,
                    'options' => k::ddl('SEX_MAP'),
                    'constraint' => 'required',
                ],
            ],
            [
                [
                    'col' => 6,
                    'type' => 'email',
                    'label' => 'Email Address',
                    'name' => 'email',
                    'value' => $userContact->email ?? null,
                    'placeholder' => 'Ex. example@domain.com',
                ], [
                    'col' => 6,
                    'type' => 'tel',
                    'label' => '*Phone Number',
                    'name' => 'phone_no',
                    'value' => $userContact->phone_no ?? null,
                    'placeholder' => 'Ex. +1(234)567-890',
                    'constraint' => 'required',
                ],
            ],
            [
                [
                    'type' => 'textarea',
                    'label' => 'Home Address',
                    'name' => 'address',
                    'value' => $userContact->address ?? null,
                ],
            ],
        ];
    }

    public function tabPaneJamb($user_id)
    {
        $entityApplicant = EntityApplicant::findOrFail_($user_id);

        return [
            [
                [
                    'col' => 4,
                    'type' => 'number',
                    'label' => '*Jamb / UTME Year',
                    'name' => 'jamb_year',
                    'value' => $entityApplicant->names ?? 1970,
                    'min' => 1970,
                    'max' => date('Y'),
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'label' => '*Jamb / UTME Reg. Number',
                    'name' => 'jamb_regno',
                    'value' => $entityApplicant->sex ?? null,
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'label' => '*Jamb / UTME Score',
                    'name' => 'jamb_score',
                    'value' => $entityApplicant->sex ?? null,
                    'constraint' => 'required',
                ],
            ],
        ];
    }

    public function tabPaneExams($request, $user_id)
    {
        $entityApplicant = EntityApplicant::findOrFail_($user_id);
        $paginator = EntityApplicantExam::findOrFail($entityApplicant->id)->orderBy('id', 'desc')->paginate(10);

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => RouteTrait::add('-exam/create'), 'color' => 'success', 'icon' => 'fas fa-plus-circle', 'text' => 'Add New'],
            'input' => ['action' => 'users.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                'Exam Title',
                'Exam Date',
                'Exam No.',
                'Subject',
                'Grade',
                'Date Created',
                'Action',
            ],
            'pager' => $pager,
        ];
    }

    public function tabPaneCourse($user_id)
    {
        $entityApplicant = EntityApplicant::findOrFail_($user_id);
        $ddl_msp = MapSessionsToProgramme::sessionProgrammeView();
        $ddl_mup = MapUnitsToProgramme::degreeUnitView();

        return [
            [
                [
                    'col' => 3,
                    'type' => 'select',
                    'label' => '*Available Programme',
                    'name' => 'map_sessions_to_programme_id',
                    'value' => $entityApplicant->map_sessions_to_programme_id ?? null,
                    'options' => $ddl_msp,
                    'constraint' => 'required',
                ], [
                    'col' => 3,
                    'type' => 'select',
                    'label' => '*Course of Study',
                    'name' => 'map_units_to_programme_id',
                    'value' => $entityApplicant->map_units_to_programme_id ?? null,
                    'options' => $ddl_mup,
                    'constraint' => 'required',
                ],
            ],
        ];
    }

    public function appendix($user_id)
    {
        $entityApplicant = EntityApplicant::findOrFail_($user_id);

        return [
            'declare' => (object) [
                'title' => strtoupper('Declaration'),
                'subtitle' => null,
                'article' => '<p>
                    I hereby declare that I wish to be admitted into Benson Idahosa University, Benin City, Nigeria,
                    and that the particulars given in this form are to the best of my knowledge and belief are correct,
                    and that if admitted to the University, I shall regard myself bound by the ordinance, statutes and
                    regulations of the University as a Student.
                </p>
                <p>
                    I understand that withholding any information requested, or giving false information may make me
                    ineligible for admission, registration, or matriculation and may compel my expulsion form the Institution.
                </p>',
            ],
            'sign' => [
                'col' => 2,
                'label' => '*Signature',
                'name' => 'notes',
                'value' => $entityApplicant->notes ?? null,
                'placeholder' => 'Enter name and initials',
                'constraint' => 'required',
            ],
        ];
    }
}
