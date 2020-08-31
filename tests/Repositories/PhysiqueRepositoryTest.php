<?php namespace Tests\Repositories;

use App\Models\Physique;
use App\Repositories\PhysiqueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PhysiqueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PhysiqueRepository
     */
    protected $physiqueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->physiqueRepo = \App::make(PhysiqueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_physique()
    {
        $physique = factory(Physique::class)->make()->toArray();

        $createdPhysique = $this->physiqueRepo->create($physique);

        $createdPhysique = $createdPhysique->toArray();
        $this->assertArrayHasKey('id', $createdPhysique);
        $this->assertNotNull($createdPhysique['id'], 'Created Physique must have id specified');
        $this->assertNotNull(Physique::find($createdPhysique['id']), 'Physique with given id must be in DB');
        $this->assertModelData($physique, $createdPhysique);
    }

    /**
     * @test read
     */
    public function test_read_physique()
    {
        $physique = factory(Physique::class)->create();

        $dbPhysique = $this->physiqueRepo->find($physique->id);

        $dbPhysique = $dbPhysique->toArray();
        $this->assertModelData($physique->toArray(), $dbPhysique);
    }

    /**
     * @test update
     */
    public function test_update_physique()
    {
        $physique = factory(Physique::class)->create();
        $fakePhysique = factory(Physique::class)->make()->toArray();

        $updatedPhysique = $this->physiqueRepo->update($fakePhysique, $physique->id);

        $this->assertModelData($fakePhysique, $updatedPhysique->toArray());
        $dbPhysique = $this->physiqueRepo->find($physique->id);
        $this->assertModelData($fakePhysique, $dbPhysique->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_physique()
    {
        $physique = factory(Physique::class)->create();

        $resp = $this->physiqueRepo->delete($physique->id);

        $this->assertTrue($resp);
        $this->assertNull(Physique::find($physique->id), 'Physique should not exist in DB');
    }
}
