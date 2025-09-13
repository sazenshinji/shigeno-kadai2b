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
        $response = $this->get('/products'); //「products」ページが表示されるか？
        $response->assertStatus(200);

        $response = $this->get('/products/1');  //1枚目の「詳細ページ」を開く
        $response->assertSee('キウイ');         //その中に'キウイ'の文字があるか？

        $product=[
            'name' => 'アップル',
            'price' => '800',
            'image' => 'img/apple.jpg',
            'description' => '群馬 渋川 岸リンゴ園'
        ];
        $product2 = [
            'name' => 'アップル',
            'price' => '800',
            'description' => '群馬 渋川 岸リンゴ園'
        ];
        $response = $this->post('/products/register', $product);
        $this->assertDatabaseHas('products', $product2);
    }
}
