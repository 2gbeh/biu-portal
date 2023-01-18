<?php

namespace App\Traits;

use App\Models\User;
use App\Models\PrivilegeRole;
use App\Traits\RouteTrait;
use EnumHelper as k;
use ContextHelper as ctx;
use Illuminate\Http\Request;

trait AdminUserControllerTrait
{
    public function userIndex(Request $request)
    {
        $paginator = User::paginate_();

        $pager = self::pager($request, $paginator);

        return (object) [
            'button' => ['href' => RouteTrait::create(), 'color' => 'success', 'icon' => 'fas fa-plus-circle', 'text' => 'Add New'],
            'input' => ['action' => 'users.show', 'name' => 'slug', 'disabled' => 'disabled'],
            'thead' => [
                '#',
                'Date',
                'Account',
                'Email',
                '<abbr title="Password Changed">P/C</abbr>',
                'Auth <i class="fas fa-lock text-warning" title="Authentication"></i>',
                'UUID <i class="fas fa-info-circle" role="button"></i>',
                'Action',
            ],
            'pager' => $pager,
        ];
    }

    public function userCreate()
    {
        $ddl_auth = ctx::ddlNoKey('tenants');
        $ddl_roles = PrivilegeRole::ddl('role');

        return [
            'toolbar' => (object) [
                'button' => ['href' => RouteTrait::index(), 'color' => 'success', 'icon' => 'fas fa-arrow-circle-left', 'text' => 'View All'],
            ],
            'form' => [[
                [
                    'col' => 2,
                    'type' => 'select',
                    'label' => 'Title',
                    'name' => 'title',
                    'placeholder' => 'Mr./Mrs.',
                    'options' => k::ddlNoKey('TITLE'),
                ], [
                    'col' => 3,
                    'type' => 'file',
                    'label' => 'Passport',
                    'name' => 'photo',
                    'accept' => 'image/*',
                ],
            ], [
                [
                    'col' => 4,
                    'label' => '*Surname',
                    'name' => 'surname',
                    'placeholder' => 'Family name',
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'label' => '*First Name',
                    'name' => 'first_name',
                    'placeholder' => 'Given name',
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'label' => 'Middle Name',
                    'name' => 'middle_name',
                ],
            ], [
                [
                    'col' => 4,
                    'type' => 'select',
                    'label' => '*Gender',
                    'name' => 'sex',
                    'options' => k::ddl('SEX_MAP'),
                    'constraint' => 'required',
                ],[
                    'col' => 4,
                    'type' => 'email',
                    'label' => '*Email Address',
                    'name' => 'email',
                    'placeholder' => 'Ex. example@domain.com',
                    'constraint' => 'required',
                ], [
                    'col' => 4,
                    'type' => 'tel',
                    'label' => 'Phone Number',                    
                    'name' => 'phone_no',
                    'placeholder' => 'Ex. +1(234)567-890',
                ],
            ], [
                [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Auth Type',
                    'name' => 'auth',
                    'options' => $ddl_auth,
                    'constraint' => 'required',
                ], [
                    'col' => 6,
                    'type' => 'select',
                    'label' => '*Primary Role',
                    'name' => 'privilege_role_id',
                    'options' => $ddl_roles,
                    'constraint' => 'required',
                ],
            ],
        ]];
    }
}
