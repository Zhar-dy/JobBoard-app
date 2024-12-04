<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\JobPost;

class JobPostControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_create_jobpost()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user);

        $response = $this->post(route('jobpost.store'), [
            'user_id' => $user->id,
            'name' => 'Job Title',
            'category' => 'Category Name',
            'description' => 'Job Description',
            'location' => 'Location Name',
            'salary' => '10000',
            'status' => 'Pending',
        ]);
        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('job_posts', [
            'user_id' => $user->id,
            'name' => 'Job Title',
            'category' => 'Category Name',
            'description' => 'Job Description',
            'location' => 'Location Name',
            'salary' => '10000',
            'status' => 'Pending',
        ]);
    }

    public function test_update_jobpost()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user);
        $jobpost = JobPost::create([
            'user_id' => $user->id,
            'name' => 'Job Title',
            'category' => 'Category Name',
            'description' => 'Job Description',
            'location' => 'Location Name',
            'salary' => '10000',
            'status' => 'Pending',
        ]);

        $response = $this->put(route('jobpost.update', $jobpost), [
            'user_id' => $user->id,
            'name' => 'Job Title',
            'category' => 'Category Name',
            'description' => 'Job Description',
            'location' => 'Location Name',
            'salary' => '10000',
            'status' => 'Pending',
        ]);
        $response->
        $this->assertDatabaseHas('job_posts', [
            'user_id' => $user->id,
            'name' => 'Job Title',
            'category' => 'Category Name',
            'description' => 'Job Description',
            'location' => 'Location Name',
            'salary' => '10000',
            'status' => 'Pending',
        ]);
    }

    public function test_delete_jobpost()
    {
        $user = \App\Models\User::factory()->create();
        $response = $this->actingAs($user);
        $jobpost = JobPost::create([
            'user_id' => $user->id,
            'name' => 'Job Title',
            'category' => 'Category Name',
            'description' => 'Job Description',
            'location' => 'Location Name',
            'salary' => '10000',
            'status' => 'Pending',
        ]);

        $response = $this->delete(route('jobpost.destroy', $jobpost));
        $response->assertRedirect(route('home'));
    }
}
