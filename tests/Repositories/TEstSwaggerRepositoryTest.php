<?php namespace Tests\Repositories;

use App\Models\Testswag\TEstSwagger;
use App\Repositories\Testswag\TEstSwaggerRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TEstSwaggerRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TEstSwaggerRepository
     */
    protected $tEstSwaggerRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->tEstSwaggerRepo = \App::make(TEstSwaggerRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_t_est_swagger()
    {
        $tEstSwagger = TEstSwagger::factory()->make()->toArray();

        $createdTEstSwagger = $this->tEstSwaggerRepo->create($tEstSwagger);

        $createdTEstSwagger = $createdTEstSwagger->toArray();
        $this->assertArrayHasKey('id', $createdTEstSwagger);
        $this->assertNotNull($createdTEstSwagger['id'], 'Created TEstSwagger must have id specified');
        $this->assertNotNull(TEstSwagger::find($createdTEstSwagger['id']), 'TEstSwagger with given id must be in DB');
        $this->assertModelData($tEstSwagger, $createdTEstSwagger);
    }

    /**
     * @test read
     */
    public function test_read_t_est_swagger()
    {
        $tEstSwagger = TEstSwagger::factory()->create();

        $dbTEstSwagger = $this->tEstSwaggerRepo->find($tEstSwagger->id);

        $dbTEstSwagger = $dbTEstSwagger->toArray();
        $this->assertModelData($tEstSwagger->toArray(), $dbTEstSwagger);
    }

    /**
     * @test update
     */
    public function test_update_t_est_swagger()
    {
        $tEstSwagger = TEstSwagger::factory()->create();
        $fakeTEstSwagger = TEstSwagger::factory()->make()->toArray();

        $updatedTEstSwagger = $this->tEstSwaggerRepo->update($fakeTEstSwagger, $tEstSwagger->id);

        $this->assertModelData($fakeTEstSwagger, $updatedTEstSwagger->toArray());
        $dbTEstSwagger = $this->tEstSwaggerRepo->find($tEstSwagger->id);
        $this->assertModelData($fakeTEstSwagger, $dbTEstSwagger->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_t_est_swagger()
    {
        $tEstSwagger = TEstSwagger::factory()->create();

        $resp = $this->tEstSwaggerRepo->delete($tEstSwagger->id);

        $this->assertTrue($resp);
        $this->assertNull(TEstSwagger::find($tEstSwagger->id), 'TEstSwagger should not exist in DB');
    }
}
