<?php namespace Tests\Repositories;

use App\Models\Operationtype;
use App\Repositories\OperationtypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OperationtypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OperationtypeRepository
     */
    protected $operationtypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->operationtypeRepo = \App::make(OperationtypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_operationtype()
    {
        $operationtype = factory(Operationtype::class)->make()->toArray();

        $createdOperationtype = $this->operationtypeRepo->create($operationtype);

        $createdOperationtype = $createdOperationtype->toArray();
        $this->assertArrayHasKey('id', $createdOperationtype);
        $this->assertNotNull($createdOperationtype['id'], 'Created Operationtype must have id specified');
        $this->assertNotNull(Operationtype::find($createdOperationtype['id']), 'Operationtype with given id must be in DB');
        $this->assertModelData($operationtype, $createdOperationtype);
    }

    /**
     * @test read
     */
    public function test_read_operationtype()
    {
        $operationtype = factory(Operationtype::class)->create();

        $dbOperationtype = $this->operationtypeRepo->find($operationtype->id);

        $dbOperationtype = $dbOperationtype->toArray();
        $this->assertModelData($operationtype->toArray(), $dbOperationtype);
    }

    /**
     * @test update
     */
    public function test_update_operationtype()
    {
        $operationtype = factory(Operationtype::class)->create();
        $fakeOperationtype = factory(Operationtype::class)->make()->toArray();

        $updatedOperationtype = $this->operationtypeRepo->update($fakeOperationtype, $operationtype->id);

        $this->assertModelData($fakeOperationtype, $updatedOperationtype->toArray());
        $dbOperationtype = $this->operationtypeRepo->find($operationtype->id);
        $this->assertModelData($fakeOperationtype, $dbOperationtype->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_operationtype()
    {
        $operationtype = factory(Operationtype::class)->create();

        $resp = $this->operationtypeRepo->delete($operationtype->id);

        $this->assertTrue($resp);
        $this->assertNull(Operationtype::find($operationtype->id), 'Operationtype should not exist in DB');
    }
}
