<?php
namespace Tests\api;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Project;

class ProjectsShowApiTest extends ApiTestCase
{

   /** @test */

  public function it_fetch_a_project_structure_representation(){
    //Given
    $project = factory(\App\Project::class)->create();
    //When
    $response = $this->json('get',route('projects.show', $project->id));
    //Then
    $response->assertStatus(self::HTTP_OK);
    $response->assertExactJson([
      'data' => [
        'id' => $project->id,
        'name' => $project->name,
        'description' => $project->description
      ]
    ]);
  }



}
