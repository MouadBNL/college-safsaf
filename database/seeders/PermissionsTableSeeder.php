<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'level_create',
            ],
            [
                'id'    => 18,
                'title' => 'level_edit',
            ],
            [
                'id'    => 19,
                'title' => 'level_show',
            ],
            [
                'id'    => 20,
                'title' => 'level_delete',
            ],
            [
                'id'    => 21,
                'title' => 'level_access',
            ],
            [
                'id'    => 22,
                'title' => 'subject_create',
            ],
            [
                'id'    => 23,
                'title' => 'subject_edit',
            ],
            [
                'id'    => 24,
                'title' => 'subject_show',
            ],
            [
                'id'    => 25,
                'title' => 'subject_delete',
            ],
            [
                'id'    => 26,
                'title' => 'subject_access',
            ],
            [
                'id'    => 27,
                'title' => 'lesson_create',
            ],
            [
                'id'    => 28,
                'title' => 'lesson_edit',
            ],
            [
                'id'    => 29,
                'title' => 'lesson_show',
            ],
            [
                'id'    => 30,
                'title' => 'lesson_delete',
            ],
            [
                'id'    => 31,
                'title' => 'lesson_access',
            ],
            [
                'id'    => 32,
                'title' => 'resource_create',
            ],
            [
                'id'    => 33,
                'title' => 'resource_edit',
            ],
            [
                'id'    => 34,
                'title' => 'resource_show',
            ],
            [
                'id'    => 35,
                'title' => 'resource_delete',
            ],
            [
                'id'    => 36,
                'title' => 'resource_access',
            ],
            [
                'id'    => 37,
                'title' => 'dynamic_content_access',
            ],
            [
                'id'    => 38,
                'title' => 'text_create',
            ],
            [
                'id'    => 39,
                'title' => 'text_edit',
            ],
            [
                'id'    => 40,
                'title' => 'text_show',
            ],
            [
                'id'    => 41,
                'title' => 'text_delete',
            ],
            [
                'id'    => 42,
                'title' => 'text_access',
            ],
            [
                'id'    => 43,
                'title' => 'image_create',
            ],
            [
                'id'    => 44,
                'title' => 'image_edit',
            ],
            [
                'id'    => 45,
                'title' => 'image_show',
            ],
            [
                'id'    => 46,
                'title' => 'image_delete',
            ],
            [
                'id'    => 47,
                'title' => 'image_access',
            ],
            [
                'id'    => 48,
                'title' => 'school_access',
            ],
            [
                'id'    => 49,
                'title' => 'activity_create',
            ],
            [
                'id'    => 50,
                'title' => 'activity_edit',
            ],
            [
                'id'    => 51,
                'title' => 'activity_show',
            ],
            [
                'id'    => 52,
                'title' => 'activity_delete',
            ],
            [
                'id'    => 53,
                'title' => 'activity_access',
            ],
            [
                'id'    => 54,
                'title' => 'image_slider_create',
            ],
            [
                'id'    => 55,
                'title' => 'image_slider_edit',
            ],
            [
                'id'    => 56,
                'title' => 'image_slider_show',
            ],
            [
                'id'    => 57,
                'title' => 'image_slider_delete',
            ],
            [
                'id'    => 58,
                'title' => 'image_slider_access',
            ],
            [
                'id'    => 59,
                'title' => 'page_create',
            ],
            [
                'id'    => 60,
                'title' => 'page_edit',
            ],
            [
                'id'    => 61,
                'title' => 'page_show',
            ],
            [
                'id'    => 62,
                'title' => 'page_delete',
            ],
            [
                'id'    => 63,
                'title' => 'page_access',
            ],
            [
                'id'    => 64,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
