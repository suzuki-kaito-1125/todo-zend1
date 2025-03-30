# Zendframework1系を使ったTODOアプリ
Zendframework1系の練習用

## 技術
- 言語：php 7.4
- FW：zendframework 1.12
- DB：Mysql 5.7.34
- フロント：zendframeworkのテンプレートエンジン

## 環境構築
```
// コンテナ作成
docker compose up

// phpコンテナに入る
docker compose exec php bash

// DBマイグレーション用のスクリプトファイル実行(Todoテーブル作成)
php src/application/scripts/migrations/001_create_todos.php

// ブラウザでアクセス
http://localhost:8080/
