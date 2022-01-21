<?php namespace Tests\Repositories;

use App\Models\V1\Jurnallar\JurnalToplami;
use App\Repositories\V1\Jurnallar\JurnalToplamiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class JurnalToplamiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var JurnalToplamiRepository
     */
    protected $jurnalToplamiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jurnalToplamiRepo = \App::make(JurnalToplamiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_jurnal_toplami()
    {
        $jurnalToplami = JurnalToplami::factory()->make()->toArray();

        $createdJurnalToplami = $this->jurnalToplamiRepo->create($jurnalToplami);

        $createdJurnalToplami = $createdJurnalToplami->toArray();
        $this->assertArrayHasKey('id', $createdJurnalToplami);
        $this->assertNotNull($createdJurnalToplami['id'], 'Created JurnalToplami must have id specified');
        $this->assertNotNull(JurnalToplami::find($createdJurnalToplami['id']), 'JurnalToplami with given id must be in DB');
        $this->assertModelData($jurnalToplami, $createdJurnalToplami);
    }

    /**
     * @test read
     */
    public function test_read_jurnal_toplami()
    {
        $jurnalToplami = JurnalToplami::factory()->create();

        $dbJurnalToplami = $this->jurnalToplamiRepo->find($jurnalToplami->jurnal_toplami_id);

        $dbJurnalToplami = $dbJurnalToplami->toArray();
        $this->assertModelData($jurnalToplami->toArray(), $dbJurnalToplami);
    }

    /**
     * @test update
     */
    public function test_update_jurnal_toplami()
    {
        $jurnalToplami = JurnalToplami::factory()->create();
        $fakeJurnalToplami = JurnalToplami::factory()->make()->toArray();

        $updatedJurnalToplami = $this->jurnalToplamiRepo->update($fakeJurnalToplami, $jurnalToplami->jurnal_toplami_id);

        $this->assertModelData($fakeJurnalToplami, $updatedJurnalToplami->toArray());
        $dbJurnalToplami = $this->jurnalToplamiRepo->find($jurnalToplami->jurnal_toplami_id);
        $this->assertModelData($fakeJurnalToplami, $dbJurnalToplami->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_jurnal_toplami()
    {
        $jurnalToplami = JurnalToplami::factory()->create();

        $resp = $this->jurnalToplamiRepo->delete($jurnalToplami->jurnal_toplami_id);

        $this->assertTrue($resp);
        $this->assertNull(JurnalToplami::find($jurnalToplami->jurnal_toplami_id), 'JurnalToplami should not exist in DB');
    }
}
