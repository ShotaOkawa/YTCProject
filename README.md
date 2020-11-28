# YTCProject
【configフォルダ配下に下記をセット】
  1.「APIKey.ini」を配置し、下記を記載する。
    [API]
    key:APIKEY
    [URL]
    base:https://www.googleapis.com/youtube/v3
  2.「DBConnection.ini」を配置し、下記を記載する。
    [connection]
    user:DB_USER
    password:DB_PASSWORD
    host:DB_HOST
    database:DB_NAME
【注意事項】
DBは、MySQLを使用した想定。
SQLはテーブルに合わせて変更する。
