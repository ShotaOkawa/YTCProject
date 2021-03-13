# YTCProject
## BATCH
【configフォルダ配下に下記をセット】</br>
  1.「APIKey.ini」を配置し、下記を記載する </br>
    [API]</br>
    key:APIKEY</br>
    [URL]</br>
    base:https://www.googleapis.com/youtube/v3 </br>
  2.「DBConnection.ini」を配置し、下記を記載する </br>
    [connection]</br>
    user:DB_USER</br>
    password:DB_PASSWORD</br>
    host:DB_HOST</br>
    database:DB_NAME</br>
【注意事項】</br>
DBは、MySQLを使用した想定。</br>
SQLはテーブルに合わせて変更する。

## 画面
【概要】
2021/3/13現在</br>
ある程度の機能は動くがエラーハンドリングや共通化等ができていないため未完成。</br>
※ログイン画面はFW標準のものは使用していないかつ登録画面が未完成。</br>
PHPとLaravelを使用してWebアプリケーションを作成。</br>
APIKeyはバッチ同様、自身で取得する必要がある。</br>
</br>
【開発環境】</br>
PHP Ver：7.2.34</br>
Laravel Ver：5.7.29</br>
Xampp</br>
Windows 10 Pro x64</br>

【構築手順】</br>
1.下記からXAMPPをインストール</br>
　https://www.apachefriends.org/download.html</br>
2.composerをインストール</br>
　https://getcomposer.org/download/</br>
3.YouTube Data API v3のAPIKEYを取得</br>
　参考：http://piyohiko.webcrow.jp/kids_tube/help/index.html</br>
4.xampp/htdocs/直下に当プロジェクトを配置</br>
　※composerからprojectをcreateして、上書きするでも大丈夫です。</br>
5.VideolistupController.phpにAPIKEYをセット</br>
6.MySQLにYTCDBをインポートする。</br>
　.envにMYSQLへのアクセス定義があるが、自身で変えてしまってもOK</br>
7.サーバ起動コマンドを入力する。</br>
　php artisan serve</br>
8.https://ドメイン名/login/にアクセスする</br>
