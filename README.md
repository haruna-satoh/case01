# プロジェクト名

フリマアプリ

# 概要

商品の出品・購入ができるアプリです。
利用には会員登録が必要です。

## 環境

- php バージョン: 8.1
- Laravel バージョン: 8.83
- データベース: MySQL(Docker使用)

## セットアップ手順

1. このリポジトリをクローン
```bash
git clone git@github.com:haruna-satoh/case01.git
cd case01
```

2. Dockerを起動
```bash
docker compose up -d --build
```

3. .envファイルを作成
```bash
cp src/.env.example src/.env
```

4. Laravelアプリケーションのセットアップ
php コンテナ内で実行
```bash
docker compose exec php bash
composer install
php artisan key:generate
php artisan migrate
```