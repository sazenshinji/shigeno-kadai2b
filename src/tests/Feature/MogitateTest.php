<?php

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use Database\Seeders\SeasonsTableSeeder;

class MogitateTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true; // ← これで毎回シーディングされる

    public function test_01()
    {
        $response = $this->get('/products'); //「products」ページが表示されるか？
        $response->assertStatus(200);

        $response = $this->get('/products/1');  //1枚目の「詳細ページ」を開く
        $response->assertSee('キウイ');         //その中に'キウイ'の文字があるか？
    }

    public function test_02()
    {
        // 1. Storageをfake化
        Storage::fake('public');

        // 2. Seederでシーズンを登録
        $this->seed(SeasonsTableSeeder::class);
        $seasons = \App\Models\Season::all();

        // 3. 既存ファイルを UploadedFile として扱う
        $filePath = storage_path('app/public/images/test.jpg'); // 絶対パス
        $file = new UploadedFile(
            $filePath,
            'test.jpg',           // ファイル名
            'image/jpeg',         // MIMEタイプ
            null,                 // サイズ（自動取得されるのでnullでOK）
            true                  // testモードを有効にする
        );

        // 4. フォームデータ
        $formData = [
            'name' => 'テスト商品',
            'price' => 1000,
            'description' => '説明文',
            'seasons' => $seasons->pluck('id')->toArray(),
            'image' => $file,
        ];

        // 5. POSTリクエスト
        $response = $this->post('/products/register', $formData);

        $response->assertRedirect('/products');

        // 6. DB確認
        $this->assertDatabaseHas('products', [
            'name' => 'テスト商品',
            'price' => 1000,
            'description' => '説明文',
        ]);

        $product = Product::where('name', 'テスト商品')->first();

        // 多対多リレーションの確認
        foreach ($seasons as $season) {
            $this->assertDatabaseHas('product_season', [
                'product_id' => $product->id,
                'season_id'  => $season->id,
            ]);
        }

        // 7. 画像保存確認
        Storage::disk('public')->assertExists($product->image);
    }

    public function test_03()
    {
        // Storageのfake化（画像関連のバリデーション用）
        Storage::fake('public');

        // 入力データを空にして送信
        $formData = [];

        // POSTリクエスト
        $response = $this->post('/products/register', $formData);

        // まずは、バリデーションエラーが発生していることを確認
        $response->assertSessionHasErrors([
            'name',
            'price',
            'seasons',
            'description',
            'image',
        ]);

        // セッションのエラー取得
        $errors = session('errors')->getMessages();

        // 各フィールドのエラーメッセージを確認
        $this->assertEquals('商品名を入力してください', $errors['name'][0]);
        $this->assertEquals('値段を入力してください', $errors['price'][0]);
        $this->assertEquals('季節を選択してください', $errors['seasons'][0]);
        $this->assertEquals('商品説明を入力してください', $errors['description'][0]);
        $this->assertEquals('商品画像を登録してください', $errors['image'][0]);
    }
}
