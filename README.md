# 出退情報管理システム

## 概要
オフィスの入退室記録を行う社内用システム。


## 構成

[Programming Language]PHP 5.3.20 (or later)

[Framework]CakePHP 2.7.6

[Database]MySQL 5.3 (or later)
　　※5.6以降の場合は、MySQLのディレクトリ内にあるmy.cnfのsql_modeの「STRICT＿TRANS＿TABLES」設定を削除してください。

[Web Server]Apache 2.2.3 (or later)

[CSS Framework]Bootstrap(Honoka)

[PDF Webkit]WkHtmlToPdf 0.12.3 (or later)

[cakePHP-Plugin]Boostcake,cakePDF


## 事前準備

以下のインストールと各種設定が必要。

PHP

Apache

MySQL

WkHtmlToPdf（+IPA日本語フォント）


## 設定ファイル変更

「entrance\app\Config」内にある以下の設定ファイルの変更が必要。

bootstrap.php ⇒ WkHtmlToPdfバイナリファイルのパス

core.php ⇒ セッション設定（cookie名変更、ビルトインをcakeに変更）

const.php ⇒ サーバー等のIP設定

database.php ⇒ DB接続設定


## DB作成

以下のSQLを実行し、テーブルを作成する。

entrance\database\createtable.sql


## オフィス単位での利用注意

オフィス単位で利用する場合、アプリケーションディレクトリ、DBを分けて構築する。

keysテーブルのval値に「4F」、「7F」等の値を設定する（TOP画面に表示する文字を設定）。

同一サーバー、同一PHP環境を利用する場合セッションのクッキー名が重複する為、セッション削除時には別オフィスのセッションも削除されてしまうので、厳密には環境毎に別けた方が良い。


## 管理者作成

管理者を作成する場合、WebブラウザでXXXX/entrance/Users/addにアクセスし、ユーザーを作成する。

上記の画面はログイン後のみ利用可能となっており、管理者が一人もいない場合にはUsersController.phpのbeforeFilterに'add'を追加し、ログインなしでも使用できるようにする。

パスワード変更はXXXX/entrance/Users/passwordから実施可能。


## 設計書類

要件定義書、基本設計書、DB定義書は以下に格納。

\entrance\docs
