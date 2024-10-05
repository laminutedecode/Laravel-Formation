<?php

namespace Tests\Feature;

use App\Models\Article;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $articles = Article::factory()->count(5)->create();

        $this->assertCount(5, $articles);
    }
}
