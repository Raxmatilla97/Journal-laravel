<?php namespace Tests\Repositories;

use App\Models\V1\Jurnallar\Jurnallar;
use App\Repositories\V1\Jurnallar\JurnallarRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class JurnallarRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var JurnallarRepository
     */
    protected $jurnallarRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->jurnallarRepo = \App::make(JurnallarRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_jurnallar()
    {
        $jurnallar = Jurnallar::factory()->make()->toArray();

        $createdJurnallar = $this->jurnallarRepo->create($jurnallar);

        $createdJurnallar = $createdJurnallar->toArray();
        $this->assertArrayHasKey('id', $createdJurnallar);
        $this->assertNotNull($createdJurnallar['id'], 'Created Jurnallar must have id specified');
        $this->assertNotNull(Jurnallar::find($createdJurnallar['id']), 'Jurnallar with given id must be in DB');
        $this->assertModelData($jurnallar, $createdJurnallar);
    }

    /**
     * @test read
     */
    public function test_read_jurnallar()
    {
        $jurnallar = Jurnallar::factory()->create();

        $dbJurnallar = $this->jurnallarRepo->find($jurnallar->jurnal_id);

        $dbJurnallar = $dbJurnallar->toArray();
        $this->assertModelData($jurnallar->toArray(), $dbJurnallar);
    }

    /**
     * @test update
     */
    public function test_update_jurnallar()
    {
        $jurnallar = Jurnallar::factory()->create();
        $fakeJurnallar = Jurnallar::factory()->make()->toArray();

        $updatedJurnallar = $this->jurnallarRepo->update($fakeJurnallar, $jurnallar->jurnal_id);

        $this->assertModelData($fakeJurnallar, $updatedJurnallar->toArray());
        $dbJurnallar = $this->jurnallarRepo->find($jurnallar->jurnal_id);
        $this->assertModelData($fakeJurnallar, $dbJurnallar->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_jurnallar()
    {
        $jurnallar = Jurnallar::factory()->create();

        $resp = $this->jurnallarRepo->delete($jurnallar->jurnal_id);

        $this->assertTrue($resp);
        $this->assertNull(Jurnallar::find($jurnallar->jurnal_id), 'Jurnallar should not exist in DB');
    }
}
