<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use SchemaHelper;

class PrivilegeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->factory();

        SchemaHelper::insertMultiple('privilege_roles', $data['roles']);
        SchemaHelper::insertMultiple('privilege_permissions', $data['permissions']);

        $col = [];
        for ($i = 1; $i <= 37; $i++) {
            if (!in_array($i, [25, 26, 31, 32])) {
                array_push($col, ["privilege_role_id" => 2, "privilege_gate_id" => $i]);
            }
        }
        SchemaHelper::insertMultiple('privilege_permissions', $col);

        $id = 1;
        foreach ($data['menu'] as $menu => $item) {
            if (count($item['items']) < 1) {
                SchemaHelper::insert('privilege_gates', [
                    'privilege_policy_id' => null,
                    'gate' => $menu,
                    'route' => $item['route'],
                    'icon' => $item['icon'],
                    'badge' => $item['badge'] ?? null,
                ]);
            } else {
                SchemaHelper::insert('privilege_policies', [
                    'policy' => $menu,
                    'icon' => $item['icon'],
                ]);
                foreach ($item['items'] as $menu => $item) {
                    SchemaHelper::insert('privilege_gates', [
                        'privilege_policy_id' => $id,
                        'gate' => $menu,
                        'route' => $item['route'],
                        'icon' => $item['icon'],
                        'badge' => $item['badge'] ?? null,
                    ]);
                }
                $id += 1;
            }
        }
    }

    public function factory(): array
    {
        $data['permissions'] = [
            ["privilege_role_id" => 6, "privilege_gate_id" => 25],
            ["privilege_role_id" => 6, "privilege_gate_id" => 26],
            ["privilege_role_id" => 6, "privilege_gate_id" => 31],
            ["privilege_role_id" => 6, "privilege_gate_id" => 32],
        ];

        $data['roles'] = [
            ["role" => "Webmaster"],
            ["role" => "Super Admin"],
            ["role" => "Administrator"],
            ["role" => "Academic Planning"],
            ["role" => "Admission Officer"],
            ["role" => "Applicant"],

            // ["role" => "Student"],
            // ["role" => "Admission Admin"],
            // ["role" => "Student Affairs"],
            // ["role" => "Bursary Admin"],
            // ["role" => "Bursary"],
            // ["role" => "Bursary Report"],
            // ["role" => "Campus Life Admin"],
            // ["role" => "Hostel Admin"],
            // ["role" => "Excuses Administrator"],
            // ["role" => "Excuses Officer"],
            // ["role" => "Pre-Medicals Administrator"],
            // ["role" => "Reports"],
            // ["role" => "Security"],
            // ["role" => "Campus Life director"],
            // ["role" => "Coordinator for Sports"],
            // ["role" => "Coordinator for Student Welfare"],
            // ["role" => "Coordinator for Student Leadership"],
            // ["role" => "Coordinator for Spiritual Life (Chaplain)"],
            // ["role" => "Executive Officer/Facility Manager"],
            // ["role" => "Candidate"],
            // ["role" => "Director of Academic Planning (D.A.P)"],
            // ["role" => "Dean of Faculty"],
            // ["role" => "Head of Department (H.O.D)"],
            // ["role" => "Unit Head"],
            // ["role" => "Course Advisor"],
            // ["role" => "Lecturer"],
            // ["role" => "Employee"],
            // ["role" => "Intern"],
        ];

        $data['menu'] = [
            'Dashboard' => [
                'route' => 'admin/dashboard',
                'icon' => 'fi fi-rs-dashboard',
                'items' => [],
            ],
            'Webmaster' => [
                'route' => null,
                'icon' => 'fi fi-rs-head-side-thinking',
                'items' => [
                    'Activity Logs' => [
                        'route' => 'admin/user-logs',
                        'icon' => 'fi fi-rs-incognito',
                    ],
                    'App Settings' => [
                        'route' => 'admin/settings',
                        'icon' => 'fi fi-rs-settings',
                    ],
                    'Payment Console' => [
                        'route' => config('context.payment'),
                        'icon' => 'fi fi-rs-gamepad',
                    ],
                    'Open Webmail' => [
                        'route' => config('context.webmail'),
                        'icon' => 'fi fi-rs-envelope-plus',
                    ],
                    'Access cPanel' => [
                        'route' => config('context.cpanel'),
                        'icon' => 'fi fi-rs-database',
                    ],
                ],
            ],
            'Accounts' => [
                'route' => null,
                'icon' => 'fi fi-rs-address-book',
                'items' => [
                    'Create Account' => [
                        'route' => 'admin/users/create',
                        'icon' => 'fi fi-rs-user-add',
                    ],
                    'Manage Accounts' => [
                        'route' => 'admin/users',
                        'icon' => 'fi fi-rs-list-check',
                        'badge' => '#users',
                    ],
                    'Assign User Roles' => [
                        'route' => 'admin/user-roles',
                        'icon' => 'fi fi-rs-venus-mars',
                    ],
                    'Wi-Fi Settings' => [
                        'route' => 'admin/wifi',
                        'icon' => 'fi fi-rs-wifi-alt',
                    ],
                ],
            ],
            'Privileges' => [
                'route' => null,
                'icon' => 'fi fi-rs-lock',
                'items' => [
                    'View Policies' => [
                        'route' => 'admin/privilege-policies',
                        'icon' => 'fi fi-rs-shield-check',
                    ],
                    'View Gates' => [
                        'route' => 'admin/privilege-gates',
                        'icon' => 'fi fi-rs-key',
                    ],
                    'View Roles' => [
                        'route' => 'admin/privilege-roles',
                        'icon' => 'fi fi-rs-chart-tree',
                        'badge' => '#privilege_roles',
                    ],
                    'Assign Permissions' => [
                        'route' => 'admin/privilege-permissions',
                        'icon' => 'fi fi-rs-wheelchair',
                    ],
                ],
            ],
            'Systems' => [
                'route' => null,
                'icon' => 'fi fi-rs-settings-sliders',
                'items' => [
                    'View Sessions' => [
                        'route' => 'admin/list-sessions',
                        'icon' => 'fi fi-rs-hourglass-end',
                    ],
                    'View Programmes' => [
                        'route' => 'admin/list-programmes',
                        'icon' => 'fi fi-rs-diploma',
                    ],
                    'View Faculties' => [
                        'route' => 'admin/list-faculties',
                        'icon' => 'fi fi-rs-building',
                        'badge' => '#list_faculties',

                    ],
                    'View Departments' => [
                        'route' => 'admin/list-departments',
                        'icon' => 'fi fi-rs-school',
                        'badge' => '#list_departments',

                    ],
                    'View Units' => [
                        'route' => 'admin/list-units',
                        'icon' => 'fi fi-rs-physics',
                        'badge' => '#list_units',

                    ],
                    'View Levels' => [
                        'route' => 'admin/list-levels',
                        'icon' => 'fi fi-rs-layers',
                    ],
                ],
            ],
            'System Maps' => [
                'route' => null,
                'icon' => 'fi fi-rs-chart-network',
                'items' => [
                    'Sessions &ne; Programmes' => [
                        'route' => 'admin/map-sessions-to-programmes',
                        'icon' => 'fi fi-rs-chart-connected',
                    ],
                    'Departments &ne; Faculties' => [
                        'route' => 'admin/map-departments-to-faculties',
                        'icon' => 'fi fi-rs-chart-connected',
                    ],
                    'Units &ne; Departments' => [
                        'route' => 'admin/map-units-to-departments',
                        'icon' => 'fi fi-rs-chart-connected',

                    ],
                    'Units &ne; Programmes' => [
                        'route' => 'admin/map-units-to-programmes',
                        'icon' => 'fi fi-rs-chart-connected',
                    ],
                ],
            ],
            'Dashboard ' => [
                'route' => 'user/applicant/dashboard',
                'icon' => 'fi fi-rs-dashboard',
                'items' => [],
            ],
            'Admission Form' => [
                'route' => 'user/applicant/apply',
                'icon' => 'fi fi-rs-interactive',
                'items' => [],
            ],
            'My Invoice' => [
                'route' => 'user/applicant/payment-invoice',
                'icon' => 'fi fi-rs-credit-card',
                'items' => [],
            ],
            'Payment History' => [
                'route' => 'user/applicant/payment-transactions',
                'icon' => 'fi fi-rs-chart-histogram',
                'items' => [],
            ],
            'Admissions' => [
                'route' => null,
                'icon' => 'fi fi-rs-graduation-cap',
                'items' => [
                    'View Applicants' => [
                        'route' => 'admin/entity-applicants',
                        'icon' => 'fi fi-rs-comment-user',
                        'badge' => '#entity_applicants',
                    ],
                ],
            ],
            'Payments' => [
                'route' => null,
                'icon' => 'fi fi-rs-bank',
                'items' => [
                    'View Gateways' => [
                        'route' => 'admin/payment-gateways',
                        'icon' => 'fi fi-rs-navigation',
                    ],
                    'View Invoices' => [
                        'route' => 'admin/payment-invoices',
                        'icon' => 'fi fi-rs-receipt',
                    ],
                    'View Transactions' => [
                        'route' => 'admin/payment-transactions',
                        'icon' => 'fi fi-rs-document',
                        'badge' => '#payment_transactions',

                    ],
                ],
            ],
            'Courses' => [
                'route' => null,
                'icon' => 'fi fi-rs-book',
                'items' => [
                    'Create Course' => [
                        'route' => 'admin/courses/create',
                        'icon' => 'fi fi-rs-add',
                    ],
                    'Manage Courses' => [
                        'route' => 'admin/courses',
                        'icon' => 'fi fi-rs-list',
                        'badge' => '#courses',
                    ],
                ],
            ],
            'Noticeboard' => [
                'route' => null,
                'icon' => 'fi fi-rs-bell-school',
                'items' => [
                    'Send Notification' => [
                        'route' => 'admin/noticeboard/create',
                        'icon' => 'fi fi-rs-add',
                    ],
                    'View Notifications' => [
                        'route' => 'admin/noticeboard',
                        'icon' => 'fi fi-rs-list',
                        'badge' => '#noticeboard',
                    ],
                ],
            ],
        ];

        return $data;
    }
}
