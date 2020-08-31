<?php namespace Tests\Repositories;

use App\Models\Moral;
use App\Repositories\MoralRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MoralRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MoralRepository
     */
    protected $moralRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->moralRepo = \App::make(MoralRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_moral()
    {
        $moral = factory(Moral::class)->make()->toArray();

        $createdMoral = $this->moralRepo->create($moral);

        $createdMoral = $createdMoral->toArray();
        $this->assertArrayHasKey('id', $createdMoral);
        $this->assertNotNull($createdMoral['id'], 'Created Moral must have id specified');
        $this->assertNotNull(Moral::find($createdMoral['id']), 'Moral with given id must be in DB');
        $this->assertModelData($moral, $createdMoral);
    }

    /**
     * @test read
     */
    public function test_read_moral()
    {
        $moral = factory(Moral::class)->create();

        $dbMoral = $this->moralRepo->find($moral->id);

        $dbMoral = $dbMoral->toArray();
        $this->assertModelData($moral->toArray(), $dbMoral);
    }

    /**
     * @test update
     */
    public function test_update_moral()
    {
        $moral = factory(Moral::class)->create();
        $fakeMoral = factory(Moral::class)->make()->toArray();

        $updatedMoral = $this->moralRepo->update($fakeMoral, $moral->id);

        $this->assertModelData($fakeMoral, $updatedMoral->toArray());
        $dbMoral = $this->moralRepo->find($moral->id);
        $this->assertModelData($fakeMoral, $dbMoral->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_moral()
    {
        $moral = factory(Moral::class)->create();

        $resp = $this->moralRepo->delete($moral->id);

        $this->assertTrue($resp);
        $this->assertNull(Moral::find($moral->id), 'Moral should not exist in DB');
    }
}
