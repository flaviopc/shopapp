<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Tag;
use App\Repositories\ProductRepository;
use App\Services\ProductService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function getService()
    {
        return new ProductService(new ProductRepository(new Product()));
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_product()
    {
        $productService = $this->getService();
        $prod = $productService->create(['name' => 'jose']);
        $this->assertDatabaseCount('products', 1);
        $this->assertModelExists($prod);
    }

    public function test_create_product_with_tag()
    {
        $prod = Product::factory()
            ->has(Tag::factory())
            ->create();

        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseCount('tags', 1);
        $this->assertDatabaseCount('product_tag', 1);
    }

    public function test_alter_product()
    {
        $productService = $this->getService();
        $prod = $productService->create(['name' => 'jose']);
        $this->assertDatabaseCount('products', 1);
        $newName = "maria";
        $updated = $productService->update($prod->id, ['name' => $newName]);
        $this->assertTrue($updated);
        $this->assertDatabaseCount('products', 1);
        $prodUpdated = $productService->findById($prod->id);
        $this->assertEquals($newName, $prodUpdated->name);
    }

    public function test_get_product_by_id()
    {
        $productService = $this->getService();
        $prod = $productService->create(['name' => 'jose']);
        $this->assertDatabaseCount('products', 1);
        $prodFind = $productService->findById($prod->id);
        $this->assertEquals($prod->id, $prodFind->id);
    }

    public function test_delete_product()
    {
        $productService = $this->getService();
        $prod = $productService->create(['name' => 'jose']);
        $this->assertModelExists($prod);
        $productService->delete($prod->id);
        $this->assertModelMissing($prod);
    }
}
