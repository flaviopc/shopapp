<?php

namespace Tests\Unit;

use App\Models\Tag;
use App\Repositories\TagRepository;
use App\Services\TagService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    public function getService()
    {
        return new TagService(new TagRepository(new Tag()));
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_create_tag()
    {
        $tagService = $this->getService();
        $prod = $tagService->create(['name' => 'tag1']);
        $this->assertDatabaseCount('tags', 1);
        $this->assertModelExists($prod);
    }

    public function test_alter_tag()
    {
        $tagService = $this->getService();
        $prod = $tagService->create(['name' => 'tag1']);
        $this->assertDatabaseCount('tags', 1);
        $newName = "tag2";
        $updated = $tagService->update($prod->id, ['name' => $newName]);
        $this->assertTrue($updated);
        $this->assertDatabaseCount('tags', 1);
        $prodUpdated = $tagService->findById($prod->id);
        $this->assertEquals($newName, $prodUpdated->name);
    }

    public function test_get_tag_by_id()
    {
        $tagService = $this->getService();
        $prod = $tagService->create(['name' => 'tag1']);
        $this->assertDatabaseCount('tags', 1);
        $prodFind = $tagService->findById($prod->id);
        $this->assertEquals($prod->id, $prodFind->id);
    }

    public function test_delete_tag()
    {
        $tagService = $this->getService();
        $prod = $tagService->create(['name' => 'tag1']);
        $this->assertModelExists($prod);
        $tagService->delete($prod->id);
        $this->assertModelMissing($prod);
    }
}
