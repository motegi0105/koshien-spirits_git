# 開発環境構築
## はじめに
git、Dockerに導入手順に関しては別資料に作成予定

## 手順
1. プロジェクトを置くディレクトリに移動  
※例 `cd hogehoge`

2. 「wp-git-docker-testリポジトリ」をClone  
`git clone https://github.com/RikuOsawaRMD/wp-git-docker-test.git`

3. 「wp-git-docker-testディレクトリ」に移動  
`cd wp-git-docker-test`

4. プロジェクトを立ち上げる  
`docker-compose up -d`

5. プロジェクトにアクセス  
http://localhost:8000/wp-admin/

6. WordPressの初期設定を適当にする  
※後々、「All in ONE WP Migrationプラグイン」を使用し、  
　dev環境と同じ状態にするため、ここでの設定は適当で問題無し。

7. 「All in ONE WP Migrationプラグイン」をインストールし有効化

8. 「All in One WP Migration File Extensionプラグイン」をインストールし有効化  
[こちら](https://import.wp-migration.com/ja)のBasicからDL

9. dev環境をエクスポート  
※このプロジェクトは「WP × Git × Dockerのテスト用プロジェクト」でdev環境が無いため、  
　既に開発環境構築している人にエクスポートしてもらったデータを貰ってください。

10. エクスポートしたデータをlocal環境にインポート

11. 管理者画面、サイト画面諸々を確認しdev環境と同じ状態になっていれば完了