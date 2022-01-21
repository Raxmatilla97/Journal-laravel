<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Testswag\TEstSwagger;

class TEstSwaggerApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_t_est_swagger()
    {
        $tEstSwagger = TEstSwagger::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/testswag/t_est_swaggers', $tEstSwagger
        );

        $this->assertApiResponse($tEstSwagger);
    }

    /**
     * @test
     */
    public function test_read_t_est_swagger()
    {
        $tEstSwagger = TEstSwagger::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/testswag/t_est_swaggers/'.$tEstSwagger->id
        );

        $this->assertApiResponse($tEstSwagger->toArray());
    }

    /**
     * @test
     */
    public function test_update_t_est_swagger()
    {
        $tEstSwagger = TEstSwagger::factory()->create();
        $editedTEstSwagger = TEstSwagger::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/testswag/t_est_swaggers/'.$tEstSwagger->id,
            $editedTEstSwagger
        );

        $this->assertApiResponse($editedTEstSwagger);
    }

    /**
     * @test
     */
    public function test_delete_t_est_swagger()
    {
        $tEstSwagger = TEstSwagger::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/testswag/t_est_swaggers/'.$tEstSwagger->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/testswag/t_est_swaggers/'.$tEstSwagger->id
        );

        $this->response->assertStatus(404);
    }
}
