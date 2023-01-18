<?php
declare (strict_types = 1);

namespace App\Traits;

use App\Models\Course;
use App\Models\ListDepartment;
use App\Models\ListFaculty;
use App\Models\ListLevel;
use App\Models\ListProgramme;
use App\Models\ListSession;
use App\Models\ListUnit;
use App\Models\PaymentTransaction;
use App\Models\User;
use App\Models\UserLog;
use BladeHelper as h;
use Illuminate\Support\Str;

trait AdminDashboardControllerTrait
{
    public function totalEmployees()
    {
        $rows = User::mock();
        $en = count($rows);
        $en_f = h::cash($en);

        $n = 0;
        foreach ($rows as $row) {
            $e = strtoupper($row->entity);
            if ($e != 'APPLICANT' && $e != 'STUDENT') {
                $n++;
            }
            continue;
        }

        $x = round(($n * 100) / $en);

        return (object) [
            'value' => $n,
            'label' => "Total Employees",
            'icon' => "fi fi-rs-id-badge text-primary",
            'stats' => [
                [
                    'color' => h::stat($x)->color,
                    'arrow' => h::stat($x)->arrow,
                    'value' => $x . '%',
                    'label' => "of <b>{$en_f}</b> Records",
                ],
            ],
        ];
    }

    public function totalStudents()
    {
        $n = User::mock(['#entity' => 'student']);
        $en = User::mock('#');
        $en_f = h::cash($en);

        $x = round(($n * 100) / $en);

        return (object) [
            'value' => $n,
            'label' => "Total Students",
            'icon' => "fi fi-rs-graduation-cap text-primary",
            'stats' => [
                [
                    'color' => h::stat($x)->color,
                    'arrow' => h::stat($x)->arrow,
                    'value' => $x . '%',
                    'label' => "of <b>{$en_f}</b> Records",
                ],
            ],
        ];
    }

    public function totalApplicants()
    {
        $n = User::mock(['#entity' => 'applicant']);
        $en = User::mock('#');
        $en_f = h::cash($en);

        $x = round(($n * 100) / $en);

        return (object) [
            'value' => $n,
            'label' => "Total Applicants",
            'icon' => "fi fi-rs-diploma text-primary",
            'stats' => [
                [
                    'color' => h::stat($x)->color,
                    'arrow' => h::stat($x)->arrow,
                    'value' => $x . '%',
                    'label' => "of <b>{$en_f}</b> Records",
                ],
            ],
        ];
    }

    public function totalTransactions()
    {
        $gross = PaymentTransaction::sum('amount');

        $success = PaymentTransaction::where('response_code', '00')->sum('amount');

        $x = round(($success * 100) / $gross);
        $y = round((($gross - $success) * 100) / $gross);

        return (object) [
            'chart' => 3,
            'currency' => '&#8358;',
            'value' => $gross,
            'label' => 'Total Transactions',
            'stats' => [
                [
                    'color' => h::stat($x)->color,
                    'arrow' => h::stat($x)->arrow,
                    'value' => $x . '%',
                    'label' => 'Success',
                ],
                [
                    'color' => h::stat($y)->color,
                    'arrow' => h::stat($y)->arrow,
                    'value' => $y . '%',
                    'label' => 'Critical',
                ],
            ],
        ];
    }

    public function studentPopulation()
    {
        $list = [];

        $rows = User::mock();
        foreach ($rows as $row) {
            $e = strtoupper($row->entity);
            if ($e == 'STUDENT') {
                if (strpos($row->email, '/') !== false) {
                    $i = explode('/', $row->email)[0];
                    $j = trim(strtoupper($i));
                    if (!is_numeric($j)) {
                        if (array_key_exists($j, $list)) {
                            $list[$j] += 1;
                        } else {
                            $list[$j] = 1;
                        }
                    }
                    continue;
                }
                continue;
            }
            continue;
        }

        // dd($list);

        return (object) ['title' => 'Student Population', 'id' => 'student_population', 'data' => [
            'title' => 'Total Student Population Per Faculty',
            'x_label' => 'Faculty',
            'x_value' => array_keys($list),
            'y_label' => 'Students',
            'y_value' => array_values($list),
        ]];
    }

    public function systemsSummary()
    {
        return (object) ['title' => 'System Lists', 'list' => [
            [
                ['i' => 'fi fi-rs-hourglass-end', 'h5' => 'Sessions', 'p' => ListSession::count()],
                ['i' => 'fi fi-rs-diploma', 'h5' => 'Programme', 'p' => ListProgramme::count()],
                ['i' => 'fi fi-rs-building', 'h5' => 'Faculty', 'p' => ListFaculty::count()],
            ],
            [

                ['i' => 'fi fi-rs-school', 'h5' => 'Department', 'p' => ListDepartment::count()],
                ['i' => 'fi fi-rs-physics', 'h5' => 'Units', 'p' => ListUnit::count()],
                ['i' => 'fi fi-rs-layers', 'h5' => 'Levels', 'p' => ListLevel::count()],
            ], [

                ['i' => 'fi fi-rs-book', 'h5' => 'Courses', 'p' => Course::count()],
                ['i' => 'fi fi-rs-home', 'h5' => 'Hostels', 'p' => 0],
            ],
        ]];
    }

    public function paymentLogs()
    {
        $paymentTransactions = PaymentTransaction::limit__();

        return (object) [
            'title' => 'Payment Logs',
            'menu' => ['Top 10'],
            'list' => $paymentTransactions,
        ];
    }

    public function activityLogs()
    {
        $userLogs = UserLog::limit__();

        return (object) [
            'title' => 'Activity Logs',
            'menu' => ['Top 10'],
            'list' => $userLogs,
        ];
    }

}
