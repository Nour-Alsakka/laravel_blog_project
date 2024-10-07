<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // roles
        $owner = Role::create([
            'name' => 'owner',
            'display_name' => 'Project Owner', // optional
            'description' => 'User is the owner of a given project', // optional
        ]);

        $author = Role::create([
            'name' => 'author',
            'display_name' => 'Author User', // optional
            'description' => 'User is allowed to add and edit blogs', // optional
        ]);

        // permissions
        $manage_blogs = Permission::create([
            'name' => 'manage_blogs',
            'display_name' => 'Manage Blogs', // optional
            'description' => 'manage blogs for other users', // optional
        ]);

        $manage_users = Permission::create([
            'name' => 'manage_users',
            'display_name' => 'Manage Blogs', // optional
            'description' => 'manage blogs for other users', // optional
        ]);

        $have_blogs = Permission::create([
            'name' => 'have_blogs',
            'display_name' => 'have Blogs', // optional
            'description' => 'have blogs add,edit,delete', // optional
        ]);

        // add permissions to roles
        $owner->givePermissions([$manage_blogs, $manage_users]);
        $author->givePermission($have_blogs);

        /// add role to admin
        // DB::role_user->create()
        // $owner = Role::where('name', 'owner')->first();
        $user = User::where('email', 'admin@admin.com')->first();
        $user->addRole($owner);
    }
}
