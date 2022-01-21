<?php namespace Tests\Repositories;

use App\Models\Testswag;
use App\Repositories\TestswagRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TestswagRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TestswagRepository
     */
    protected $testswagRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->testswagRepo = \App::make(TestswagRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_testswag()
    {
        $testswag = Testswag::factory()->make()->toArray();

        $createdTestswag = $this->testswagRepo->create($testswag);

        $createdTestswag = $createdTestswag->toArray();
        $this->assertArrayHasKey('id', $createdTestswag);
        $this->assertNotNull($createdTestswag['id'], 'Created Testswag must have id specified');
        $this->assertNotNull(Testswag::find($createdTestswag['id']), 'Testswag with given id must be in DB');
        $this->assertModelData($testswag, $createdTestswag);
    }

    /**
     * @test read
     */
    public function test_read_testswag()
    {
        $testswag = Testswag::factory()->create();

        $dbTestswag = $this->testswagRepo->find($testswag->id);

        $dbTestswag = $dbTestswag->toArray();
        $this->assertModelData($testswag->toArray(), $dbTestswag);
    }

    /**
     * @test update
     */
    public function test_update_testswag()
    {
        $testswag = Testswag::factory()->create();
        $fakeTestswag = Testswag::factory()->make()->toArray();

        $updatedTestswag = $this->testswagRepo->update($fakeTestswag, $testswag->id);

        $this->assertModelData($fakeTestswag, $updatedTestswag->toArray());
        $dbTestswag = $this->testswagRepo->find($testswag->id);
        $this->assertModelData($fakeTestswag, $dbTestswag->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_testswag()
    {
        $testswag = Testswag::factory()->create();

        $resp = $this->testswagRepo->delete($testswag->id);

        $this->assertTrue($resp);
        $this->assertNull(Testswag::find($testswag->id), 'Testswag should not exist in DB');
    }
}
