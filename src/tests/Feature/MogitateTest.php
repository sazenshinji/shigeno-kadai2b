<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MogitateTest extends TestCase
{
    use RefreshDatabase;    // ← テストごとに DB がリフレッシュ

    protected $seed = true; // ← これで毎回シーディングされる

    public function test_01()
    {
        $response = $this->get('/products/1');
        $response->assertSee('キウイ');
    }
}
