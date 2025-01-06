<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    private $permissions = [

        'admin-list',
        'admin-create',
        'admin-edit',
        'admin-delete',

        'language-list',
        'language-create',
        'language-edit',
        'language-delete',

        'role-list',
        'role-create',
        'role-edit',
        'role-delete',

        'setting-list',
        'setting-create',
        'setting-edit',
        'setting-delete',


        'subject-list',
        'subject-create',
        'subject-edit',
        'subject-delete',

        'chapter-list',
        'chapter-create',
        'chapter-edit',
        'chapter-delete',

        'question-list',
        'question-create',
        'question-edit',
        'question-delete',

        'answer-list',
        'answer-create',
        'answer-edit',
        'answer-delete',

        'mood-list',
        'mood-create',
        'mood-edit',
        'mood-delete',

        'exam_session-list',
        'exam_session-create',
        'exam_session-edit',
        'exam_session-delete',

        'exam_history-list',
        'exam_history-create',
        'exam_history-edit',
        'exam_history-delete',

        'subscription-list',
        'subscription-create',
        'subscription-edit',
        'subscription-delete',

    ];
    public function run(): void
    {


        $permissionIds=[];

        foreach ($this->permissions as $index=>$permission) {
            // Check if the permission already exists before creating it
            if (!Permission::where('name', $permission)->exists()) {
                $permissionIds[]=($index+1);
                Permission::create(['id' => ($index+1),'name' => $permission,'guard_name' => 'admin']);
            }
        }

        $Admin1 =  Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => '2024-11-26 15:43:52',
            'password' => Hash::make("123456789")
        ]);

        $Admin2 =  Admin::create([
            'name' => 'admin',
            'email' => 'islamm1995@gmail.com',
            'email_verified_at' => '2024-11-26 15:43:52',
            'password' => Hash::make("123456789")
        ]);

        $permissionIds = array_map('intval', $permissionIds);
        $role = Role::create([
            'name' => 'admin',
            'guard_name' => 'admin'
        ]);
        $role->syncPermissions($permissionIds);
        $Admin1->assignRole($role);
        $Admin2->assignRole($role);


        \App\Models\User::factory(10)->create();

    }
}
