<?php

use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class PostRepositoryTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    /** @test */
    public function 顯示尚未刪除的文章()
    {
        /** arrange */
        factory(Post::class, 10)->create(['status' => 0]);
        factory(Post::class, 10)->create(['status' => 1]);
        factory(Post::class, 10)->create(['status' => 2]);

        $target = App::make(PostRepository::class);
        $expected = 20;

        /** act */
        $actual = $target->getUndeletedPosts();

        /** assert */
        $this->assertCount($expected, $actual);
    }
}
