<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Moral;

class MoralApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_moral()
    {
        $moral = factory(Moral::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/morals', $moral
        );

        $this->assertApiResponse($moral);
    }

    /**
     * @test
     */
    public function test_read_moral()
    {
        $moral = factory(Moral::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/morals/'.$moral->id
        );

        $this->assertApiResponse($moral->toArray());
    }

    /**
     * @test
     */
    public function test_update_moral()
    {
        $moral = factory(Moral::class)->create();
        $editedMoral = factory(Moral::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/morals/'.$moral->id,
            $editedMoral
        );

        $this->assertApiResponse($editedMoral);
    }

    /**
     * @test
     */
    public function test_delete_moral()
    {
        $moral = factory(Moral::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/morals/'.$moral->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/morals/'.$moral->id
        );

        $this->response->assertStatus(404);
    }
}
