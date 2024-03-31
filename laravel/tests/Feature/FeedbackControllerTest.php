<?php
namespace Tests\Feature;
use App\Models\Feedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class FeedbackControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testFeedbackStoredSuccessfully()
    {
        $formData = [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'message' => $this->faker->sentence
        ];

        $response = $this->json('POST', '/api/feedback', $formData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Feedback saved successfully'
            ]);

        $this->assertDatabaseHas('feedbacks', $formData);
    }

    public function testInvalidFeedbackData()
    {
        $response = $this->json('POST', '/api/feedback', []);

        $response->assertStatus(422)
            ->assertJsonStructure([
                'errors' => [
                    'name',
                    'phone',
                    'message'
                ]
            ]);
    }
}
