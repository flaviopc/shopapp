<?php

namespace Tests\Unit;

use App\Models\Product;
use App\Models\Tag;
use App\Repositories\ProductRepository;
use App\Repositories\TagRepository;
use App\Services\ProductService;
use App\Services\TagService;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function getServiceProduct()
    {
        return new ProductService(new ProductRepository(new Product()));
    }

    public function getServiceTag()
    {
        return new TagService(new TagRepository(new Tag()));
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_product()
    {
        $productService = $this->getServiceProduct();
        $prod = $productService->create(['name' => 'jose']);
        $this->assertDatabaseCount('products', 1);
        $this->assertModelExists($prod);
    }

    public function test_not_create_product()
    {
        $this->expectException(QueryException::class);
        $productService = $this->getServiceProduct();
        $prod = $productService->create(['nam' => 'jose']);
        $this->assertDatabaseCount('products', 0);
        $this->assertModelMissing($prod);
    }

    public function test_create_product_with_tag()
    {
        $tagService = $this->getServiceTag();
        $tag = $tagService->create(['name' => 'livros']);
        $this->assertDatabaseCount('tags', 1);
        $productService = $this->getServiceProduct();
        $prod = $productService->create(['name' => 'produto livro', 'tags' => $tag]);
        $this->assertDatabaseCount('products', 1);
        $this->assertDatabaseCount('product_tag', 1);
    }

    public function test_alter_product()
    {
        $productService = $this->getServiceProduct();
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
        $productService = $this->getServiceProduct();
        $prod = $productService->create(['name' => 'jose']);
        $this->assertDatabaseCount('products', 1);
        $prodFind = $productService->findById($prod->id);
        $this->assertEquals($prod->id, $prodFind->id);
    }

    public function test_delete_product()
    {
        $productService = $this->getServiceProduct();
        $prod = $productService->create(['name' => 'jose']);
        $this->assertModelExists($prod);
        $productService->delete($prod->id);
        $this->assertModelMissing($prod);
    }
}
