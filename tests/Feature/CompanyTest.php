<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function test_access_grant_company_when_authenticated()
    {
        $this->actingActiveUser();
        $response = $this->get('/company');

        $response->assertStatus(200);
    }



    private function actingActiveUser(){
        $this->actingAs(factory(User::class)->create(['email'=>'admin@admin.com']));
    }

    private function returnFileds(){
        return [
            'name' => 'Someone',
            'email' => 'someone@gmail.com',
            'logo' =>UploadedFile::fake()->image('image.jpg', 1020,1024),
            'webiste' =>'somethin.com'
        ];
    }
}
