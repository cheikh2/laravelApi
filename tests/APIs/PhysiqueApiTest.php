<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Physique;

class PhysiqueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_physique()
    {
        $physique = factory(Physique::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/physiques', $physique
        );

        $this->assertApiResponse($physique);
    }

    /**
     * @test
     */
    public function test_read_physique()
    {
        $physique = factory(Physique::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/physiques/'.$physique->id
        );

        $this->assertApiResponse($physique->toArray());
    }

    /**
     * @test
     */
    public function test_update_physique()
    {
        $physique = factory(Physique::class)->create();
        $editedPhysique = factory(Physique::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/physiques/'.$physique->id,
            $editedPhysique
        );

        $this->assertApiResponse($editedPhysique);
    }

    /**
     * @test
     */
    public function test_delete_physique()
    {
        $physique = factory(Physique::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/physiques/'.$physique->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/physiques/'.$physique->id
        );

        $this->response->assertStatus(404);
    }
}
