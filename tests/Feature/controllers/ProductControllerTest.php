<?php

namespace Tests\Feature\controllers;

use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create()
    {
        $response = $this->get('/products/create');
        $response->assertStatus(200);
    }
}
