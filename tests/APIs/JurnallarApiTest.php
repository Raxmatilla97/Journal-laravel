<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\V1\Jurnallar\Jurnallar;

class JurnallarApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_jurnallar()
    {
        $jurnallar = Jurnallar::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/v1/jurnallar/jurnallar', $jurnallar
        );

        $this->assertApiResponse($jurnallar);
    }

    /**
     * @test
     */
    public function test_read_jurnallar()
    {
        $jurnallar = Jurnallar::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/v1/jurnallar/jurnallar/'.$jurnallar->jurnal_id
        );

        $this->assertApiResponse($jurnallar->toArray());
    }

    /**
     * @test
     */
    public function test_update_jurnallar()
    {
        $jurnallar = Jurnallar::factory()->create();
        $editedJurnallar = Jurnallar::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/v1/jurnallar/jurnallar/'.$jurnallar->jurnal_id,
            $editedJurnallar
        );

        $this->assertApiResponse($editedJurnallar);
    }

    /**
     * @test
     */
    public function test_delete_jurnallar()
    {
        $jurnallar = Jurnallar::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/v1/jurnallar/jurnallar/'.$jurnallar->jurnal_id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/v1/jurnallar/jurnallar/'.$jurnallar->jurnal_id
        );

        $this->response->assertStatus(404);
    }
}
