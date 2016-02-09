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

管理者を作成する場合、WebブラウザでXXXX/entrance/Users/addにアクセスし、ユーザーを作成する。

上記の画面はログイン後のみ利用可能となっており、管理者が一人もいない場合にはUsersController.phpのbeforeFilterに'add'を追加し、ログインなしでも使用できるようにする。

パスワード変更はXXXX/entrance/Users/passwordから実施可能。


##設計書類

要件定義書、基本設計書、DB定義書は以下に格納。

\entrance\docs
