<?php
declare (strict_types = 1);

namespace App\Traits;

use App\Models\PrivilegeRole;
use App\Models\User;
use App\Models\UserProfile;
use App\Traits\RouteTrait;
use App\Models\Wifi;
// use App\Traits\Literate;
use BladeHelper as h;
use EnumHelper as k;
use Illuminate\Routing\Route;

trait ProfileControllerTrait
{
    // use Literate;

    public function cardProfile($user_id)
    {
        $user = User::findOrFail($user_id);
        $email_status = $user->email_verified_at ? h::badgeI('Verified') : h::badgeD('Unverified');
        $email_status .= '&nbsp;&nbsp;';
        $email_status .= $user->email_subscribed_at ? h::badgeI('Subscribed') : h::badgeD('Unsubscribed');
        $password_status = $user->password_changed_at ? h::badgeI('Changed') : h::badgeD('Unchanged');

        $userRoles = User::findOrFail($user_id)->userRoles->toArray();
        // dd($userRoles);
        if (count($userRoles) > 0) {
            $roles_f = '';
            foreach ($userRoles as $userRole) {
                $privilegeRole = PrivilegeRole::findOrFail($userRole['privilege_role_id']);
                $roles_f .= h::badgeS($privilegeRole->role) . '&nbsp;&nbsp;';
            }
        } else {
            $roles_f = 'None';
        }

        $wifi = Wifi::where('username', $user->email)->first();
        if ($wifi) {
            $wifi_f = "{$wifi->toArray()['username']} ({$wifi->toArray()['password']})";
        } else {
            $wifi_f = 'N/A (N/A)';
        }

        $lock = '<i class="fas fa-lock text-warning" title="Authentication"></i>';
        $info = '<i class="fas fa-info-circle" role="button"></i>';

        return (object) [
            'menu' => [
                'Deactivate Account' => '#!',
            ],
            'avatar' => $user->photo,
            'title' => $user->name,
            'subtitle' => h::link($user->email),
            'action' => [
                [
                    'href' => 'profile-change-photo/create',
                    'class' => 'bg-success text-white',
                    'icon' => 'fas fa-camera',
                    'text' => 'Upload Passport',
                ],
                [
                    'href' => 'profile-change-password/create',
                    'class' => 'bg-info text-white',
                    'icon' => 'fas fa-user-lock',
                    'text' => 'Change Password',
                ],
            ],
            'list' => [
                'Email Status' => $email_status,
                'Default Password' => $password_status,
                'Authentication ' . $lock => $user->auth,
                'Assigned Roles' => $roles_f,
                'Wi-Fi Access' => $wifi_f,
                'UUID ' . $info => $user->uuid,
                'Joined' => $user->created_at,
            ],
        ];
    }

    public function navTabs()
    {
        return [
            [
                'id' => 'profile',
                'icon' => 'fas fa-user-circle',
                'text' => 'Profile',
            ],
            [
                'id' => 'contacts',
                'icon' => 'fas fa-address-book',
                'text' => 'Contacts',
            ],
            [
                'id' => 'files',
                'icon' => 'fas fa-file-alt',
                'text' => 'Files',
            ],
            [
                'id' => 'links',
                'icon' => 'fas fa-link',
                'text' => 'Links',
            ],
            [
                'id' => 'activity',
                'icon' => 'fas fa-history',
                'text' => 'Activity',
            ],
        ];
    }

    public function tabPaneProfile($user_id)
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
                    'label' => 'Date of Birth',
                    'name' => 'dob',
                    'value' => $userProfile->dob,
                ], [
                    'col' => 3,
                    'type' => 'select',
                    'label' => 'Religion',
                    'name' => 'religion',
                    'value' => $userProfile->religion,
                    'options' => k::ddlNoKey('RELIGION'),
                ], [
                    'col' => 3,
                    'type' => 'select',
                    'label' => 'Marital Status',
                    'name' => 'marital_status',
                    'value' => $userProfile->marital_status,
                    'options' => k::ddlNoKey('MARITAL_STATUS'),
                ],
            ], [
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => 'Nationality',
                    'name' => ' nationality',
                    'value' => $userProfile->nationality,
                    'options' => k::ddl('COUNTRY'),
                ], [
                    'col' => 3,
                    'type' => 'select',
                    'label' => 'State of Origin',
                    'name' => 'state_of_origin',
                    'value' => $userProfile->state_of_origin,
                    'options' => k::ddlNoKey('STATES_NG'),
                ], [
                    'col' => 3,
                    'label' => 'Local Govt. of Origin',
                    'name' => 'lga_of_origin',
                    'value' => $userProfile->lga_of_origin,
                    'datalist' => $dl_lga,
                ],
            ],
            [
                [
                    'col' => 6,
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
                    'col' => 3,
                    'type' => 'tel',
                    'label' => 'WhatsApp Number',
                    'name' => 'mobile_no',
                    'value' => $userProfile->mobile_no,
                ],
            ],
            [
                [
                    'type' => 'textarea',
                    'label' => 'Home Address',
                    'name' => 'address',
                    'value' => $userProfile->address,
                ],
            ],
        ];
    }

    public function tabPaneContacts($request, $user_id)
    {
        $paginator = User::findOrFail($user_id)->userContacts()->orderBy('names')->paginate(10);

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => '#/create', 'color' => 'success', 'icon' => 'fas fa-plus-circle', 'text' => 'Add New'],
            'input' => ['action' => 'users.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                'Contact Name',
                'Contact Info',
                'Address',
                'Relationship',
                'Date',
                'Action',
            ],
            'pager' => $pager,
        ];
    }

    public function tabPaneFiles($request, $user_id)
    {
        $paginator = User::findOrFail($user_id)->userFiles()->orderBy('created_at', 'desc')->paginate(10);

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => '#/create', 'color' => 'success', 'icon' => 'fas fa-plus-circle', 'text' => 'Add New'],
            'input' => ['action' => 'users.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                'File',
                'Size (kb)',
                'Type',
                'Date',
                'Action',
            ],
            'pager' => $pager,
        ];
    }

    public function tabPaneLinks($request, $user_id)
    {
        $paginator = User::findOrFail($user_id)->userLinks()->orderBy('created_at', 'desc')->paginate(10);

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => '#/create', 'color' => 'success', 'icon' => 'fas fa-plus-circle', 'text' => 'Add New'],
            'input' => ['action' => 'users.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                'URL',
                'Type',
                'Date',
                'Action',
            ],
            'pager' => $pager,
        ];
    }

    public function tabPaneLogs($request, $user_id)
    {
        $paginator = User::findOrFail($user_id)->userLogs()->orderBy('created_at', 'desc')->paginate(10);

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => RouteTrait::h(), 'color' => 'primary', 'icon' => 'fas fa-sync-alt', 'text' => 'Refresh'],
            'input' => ['action' => 'users.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => ['Date', 'IP Address', 'Request', 'Route', 'Platform / OS'],
            'pager' => $pager,
        ];
    }
}
