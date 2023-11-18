## ABOUT
日記の投稿・編集・削除を行える簡易的なWEBアプリケーションです。

## DEMO

## 画面・機能一覧
- 日記一覧（/diary）
    - ページネーション機能（1ページあたり5件）
- 日記新規投稿（/diary/create）
    - 日記投稿機能（画像1枚まで投稿可）
- 日記編集（/diary/{id}/edit）
    - 日記編集機能
    - 日記削除機能

## 備考
- 日記一覧での1ページあたりの表示件数は.envのPAGE_MAX_LIMITの値によって可変です
- 日記のテキストは40文字までを許容します
- 日記の画像は1MBまで、jpg,jpeg拡張子を許容します

## ローカル環境構築手順
### 前提：
- Docker Desktopがインストールされていること
### 手順

1. 本リポジトリをcloneまたはpullし、リポジトリのルートディレクトリに移動
```
git clone https://github.com/chiri212/sklck_202311.git
cd sklck_202311
```

2. .envファイルを生成
```
cp .env.example .env
```
3. Sailを起動
```
./vendor/bin/sail up -d
```
4. DBのマイグレーションを実行
```
sail artisan migrate
```
※Seederを同時に実行する場合は以下を実行（100件の日記が生成されます）
```
sail artisan migrate --seed
```
5. http://localhost にアクセス
