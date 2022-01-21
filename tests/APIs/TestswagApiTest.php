<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Testswag;

class TestswagApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_testswag()
    {
        $testswag = Testswag::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/testswags', $testswag
        );

        $this->assertApiResponse($testswag);
    }

    /**
     * @test
     */
    public function test_read_testswag()
    {
        $testswag = Testswag::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/testswags/'.$testswag->id
        );

        $this->assertApiResponse($testswag->toArray());
    }

    /**
     * @test
     */
    public function test_update_testswag()
    {
        $testswag = Testswag::factory()->create();
        $editedTestswag = Testswag::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/testswags/'.$testswag->id,
            $editedTestswag
        );

        $this->assertApiResponse($editedTestswag);
    }

    /**
     * @test
     */
    public function test_delete_testswag()
    {
        $testswag = Testswag::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/testswags/'.$testswag->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/testswags/'.$testswag->id
        );

        $this->response->assertStatus(404);
    }
}
