<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Operationtype;

class OperationtypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_operationtype()
    {
        $operationtype = factory(Operationtype::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/operationtypes', $operationtype
        );

        $this->assertApiResponse($operationtype);
    }

    /**
     * @test
     */
    public function test_read_operationtype()
    {
        $operationtype = factory(Operationtype::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/operationtypes/'.$operationtype->id
        );

        $this->assertApiResponse($operationtype->toArray());
    }

    /**
     * @test
     */
    public function test_update_operationtype()
    {
        $operationtype = factory(Operationtype::class)->create();
        $editedOperationtype = factory(Operationtype::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/operationtypes/'.$operationtype->id,
            $editedOperationtype
        );

        $this->assertApiResponse($editedOperationtype);
    }

    /**
     * @test
     */
    public function test_delete_operationtype()
    {
        $operationtype = factory(Operationtype::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/operationtypes/'.$operationtype->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/operationtypes/'.$operationtype->id
        );

        $this->response->assertStatus(404);
    }
}
