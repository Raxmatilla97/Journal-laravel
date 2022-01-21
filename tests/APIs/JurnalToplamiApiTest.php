<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\V1\Jurnallar\JurnalToplami;

class JurnalToplamiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_jurnal_toplami()
    {
        $jurnalToplami = JurnalToplami::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/v1/jurnallar/jurnal_toplamlari', $jurnalToplami
        );

        $this->assertApiResponse($jurnalToplami);
    }

    /**
     * @test
     */
    public function test_read_jurnal_toplami()
    {
        $jurnalToplami = JurnalToplami::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/v1/jurnallar/jurnal_toplamlari/'.$jurnalToplami->jurnal_toplami_id
        );

        $this->assertApiResponse($jurnalToplami->toArray());
    }

    /**
     * @test
     */
    public function test_update_jurnal_toplami()
    {
        $jurnalToplami = JurnalToplami::factory()->create();
        $editedJurnalToplami = JurnalToplami::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/v1/jurnallar/jurnal_toplamlari/'.$jurnalToplami->jurnal_toplami_id,
            $editedJurnalToplami
        );

        $this->assertApiResponse($editedJurnalToplami);
    }

    /**
     * @test
     */
    public function test_delete_jurnal_toplami()
    {
        $jurnalToplami = JurnalToplami::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/v1/jurnallar/jurnal_toplamlari/'.$jurnalToplami->jurnal_toplami_id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/v1/jurnallar/jurnal_toplamlari/'.$jurnalToplami->jurnal_toplami_id
        );

        $this->response->assertStatus(404);
    }
}
