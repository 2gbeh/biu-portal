<?php
declare (strict_types = 1);

namespace App\Helpers;

use App\Helpers\SchemaHelper;

class AppHelper
{
    const
    APPLICATION_STATUS = ['Registered', 'Started', 'Incomplete', 'Submitted', 'Admitted', 'Declined', 'Critical', 'Paid'],
    STATUS_HOSTEL = ['Enabled', 'Disabled'],
    STAFF_CATEGORY = ['Academic', 'Non-academic'],
    COURSES_CATEGORY = ['Core', 'Mandatory', 'Compulsory', 'Elective'],
    SCHOOL_CATEGORY = ['University', 'Polytechnic', 'College Of Education'];

    public static function whois(int $id)
    {
        return SchemaHelper::fetchById(SchemaHelper::USER_IDENTITY, $id);
    }

    // SET/GET AUTH CREDENTIALS
    public static function authFormat(array $request, string $entity): array
    {
        $req = $request;
        $name = 'N/A';

        switch ($entity) {
            case 'ADMIN':
                if (isset($req['name'])) {
                    $name = $req['name'];
                }

                $email = $req['email'];
                $password = $req['password'];
                break;
            case 'APPLICANT':
                if (isset($req['middle_name'])) {
                    $name = $req['surname'] . ', ' . $req['first_name'] . ' ' . $req['middle_name'];
                } else {
                    $name = $req['surname'] . ', ' . $req['first_name'];
                }

                $email = $req['dob'] . '@' . $req['first_name'] . '.' . $req['surname'];
                $password = $req['dob'];
                break;
            case 'CANDIDATE':
                break;
            default:
        }

        $output = [
            'register' => [
                'entity' => strtoupper($entity),
                'name' => ucwords(strtolower($name)),
                'email' => strtolower(str_replace(' ', '', $email)),
                'password' => self::password($password),
            ],
            'login' => [
                'email' => strtolower(str_replace(' ', '', $email)),
                'password' => self::password($password),
            ],
        ];
        return $output;
    }

}
