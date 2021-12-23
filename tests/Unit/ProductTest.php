<?php

namespace Tests\Unit;

use App\Models\Product;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_product()
    {
        $prod = Product::factory()->create();

        $this->assertNotNull($prod);
    }
}
