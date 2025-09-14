<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Models\Season;

class MogitateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function 商品を登録すると_products_と_product_season_に保存される()
    {
        // 1. ストレージをfake化（実際には保存しない）
        Storage::fake('public');

        // 2. テスト用のシーズンを複数作成
        $seasons = Season::factory()->count(2)->create();

        // 3. フォームから送信するデータ
        $formData = [
            'name'        => 'テスト商品',
            'price'       => 500,
            'description' => 'テスト説明文',
            'seasons'     => $seasons->pluck('id')->toArray(), // 複数選択
            'image'       => UploadedFile::fake()->image('test.jpg'),
        ];

        // 4. POSTリクエストで登録処理を実行
        $response = $this->post('/products/register', $formData);

        // 5. 正常終了後のリダイレクト確認
        $response->assertRedirect('/products');

        // 6. DBに商品データが保存されているか確認
        $this->assertDatabaseHas('products', [
            'name'  => 'テスト商品',
            'price' => 500,
        ]);

        // 7. 保存されたProductを取得
        $product = Product::where('name', 'テスト商品')->first();

        // 8. 中間テーブルにシーズンが紐づけられているか確認
        foreach ($seasons as $season) {
            $this->assertDatabaseHas('product_season', [
                'product_id' => $product->id,
                'season_id'  => $season->id,
            ]);
        }

        // 9. 画像ファイルが保存されたか確認
        Storage::disk('public')->assertExists($product->image);
    }
}
