# 出退情報管理システム

## 概要
オフィスの入退室記録を行う社内用システム。


## 構成

[Framework]CakePHP

[Database]MySQL

[Web Server]Apache

[CSS Framework]Bootstrap(Honoka)

[PDF Webkit]WkHtmlToPdf

[cakePHP-Plugin]Boostcake,cakePDF


## 事前準備

以下のインストールと各種設定が必要。

PHP

Apache

MySQL

WkHtmlToPdf（+日本語フォント）


##設定ファイル変更

「entrance\app\Config」内にある以下の設定ファイルの変更が必要。

bootstrap.php ⇒ WkHtmlToPdfバイナリファイルのパス

const.php ⇒ サーバー等のIP設定

database.php ⇒ DB接続設定


##DB作成

以下のSQLを実行し、テーブルを作成する。

entrance\database\createtable.sql


##管理者作成

WebブラウザでXXXX/entrance/Users/addにアクセスし、管理用ユーザーを作成する。

パスワード変更はXXXX/entrance/Users/passwordから実施可能。

