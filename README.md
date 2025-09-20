## アプリケーション名

もぎたて

## 環境構築

リポジトリからダウンロード

```
git clone https://github.com/sazenshinji/shigeno-kadai2b.git
```

「.env.example」をコピーして「.env」を作成し DB の設定を変更

```
cp .env.example .env
```

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

docker コンテナを構築

```
docker-compose up -d --build
```

php コンテナにログインして Laravel をインストール

```
docker-compose exec php bash
composer install
```

アプリケーションキーを作成

```
php artisan key:generate
```

DB のテーブルを作成

```
php artisan migrate
```

DB のテーブルにダミーデータを投入

```
php artisan db:seed
```

"The stream or file could not be opened"エラーが発生した場合
src ディレクトリにある storage ディレクトリに権限を設定

```
chmod -R 777 storage
```

シンボリックリンクを作成

```
php artisan storage:link
```

## 使用技術(実行環境)

PHP 7.4.9 (cli) (built: Sep 1 2020 02:33:08) ( NTS )

Laravel Framework 8.83.8

mysql Ver 8.0.26 for Linux on x86_64 (MySQL Community Server - GPL)

nginx version: nginx/1.21.1

## URL

商品一覧：http://localhost/products/

商品詳細：http://localhost/products/{productId}

商品登録：http://localhost/products/register

特別商品一覧：http://localhost/products/sp/

特別商品詳細：http://localhost/products/sp/{product}/

ログイン：http://localhost/login

## ER 図

![ER図](ER.drawio.png)

## 2025 年 9 月 20 日 修正点

・コメント一覧表示で、秒まで表示しないケースが多いと思われる。
　表示順は、時分秒まで考慮するが、表示は年月日までに修正
・ログイン画面、会員登録画面の Email のバリデーションで、
　 Email 形式でないとき、ブラウザーのエラーが出て、FormRequest の
　エラーメッセージが抑制される件の修正
・PHPUnit のテストメソッド名を、「test\_テスト内容」に変更
・「tests/Feature」内の古いテストファイルの削除
・Web.php(ルーティング)で認証を掛けるページを一つの middleware に集約
・/products アクセスしログイン後の遷移先が「/products/sp」になっていたのを
　「/products」に修正
・ER 図の修正
