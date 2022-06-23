<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LaravelPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        User::truncate();
        Role::truncate();
        Permission::truncate();
        DB::table('model_has_roles')->truncate();
        DB::table('model_has_permissions')->truncate();

        Schema::enableForeignKeyConstraints();

        $path = public_path('../database/seeders/sql/laravel-permission/users.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
        $path = public_path('../database/seeders/sql/laravel-permission/roles.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
        $path = public_path('../database/seeders/sql/laravel-permission/permissions.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
        $path = public_path('../database/seeders/sql/laravel-permission/role_has_permissions.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
        $path = public_path('../database/seeders/sql/laravel-permission/model_has_roles.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
