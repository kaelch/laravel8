<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    //user
    //product
    //system

    public function masterDataProvider() {
        return array(
            array("personal_master","/user"),
            array("marketing_master","/product"),
            array("affairs_master","/system"),
        );
    }

    public function memberDataProvider() {
        return array(
            array("personal_member","/user"),
            array("marketing_member","/product"),
            array("affairs_member","/system"),
        );
    }

    public function internDataProvider() {
        return array(
            array("personal_intern","/user"),
            array("marketing_intern","/product"),
            array("affairs_intern","/system"),
        );
    }

    private function getUser($role)
    {
        $user = User::whereHas('roles', function($query) use($role){
            return $query->where('name', $role);
        })->with('roles')->first();
        $this->actingAs($user);
    }


    /**
     * @dataProvider masterDataProvider
     */
    public function test_role_master($role, $route)
    {
        $this->getUser($role);

        $this->get($route)->assertOk();
        $this->post($route)->assertOk();
        $this->patch($route.'/1')->assertOk();
        $this->delete($route.'/1')->assertOk();
    }

    /**
     * @dataProvider memberDataProvider
     */
    public function test_role_member($role, $route)
    {
        $this->getUser($role);

        $this->get($route)->assertOk();
        $this->post($route)->assertOk();
        $this->patch($route.'/1')->assertStatus(403);
        $this->delete($route.'/1')->assertStatus(403);
    }

    /**
     * @dataProvider internDataProvider
     */
    public function test_role_intern($role, $route)
    {
        $this->getUser($role);

        $this->get($route)->assertOk();
        $this->post($route)->assertStatus(403);
        $this->patch($route.'/1')->assertStatus(403);
        $this->delete($route.'/1')->assertStatus(403);
    }

}
