import datetime
import requests
import logging
import configparser
import os

logger = logging.getLogger('LoggingTest')
logger.setLevel(10)
fh = logging.FileHandler('LOG/batch.log')
logger.addHandler(fh)

dt_now = datetime.datetime.now()
now = dt_now.strftime('%Y-%m-%d')

config = configparser.ConfigParser()
config.read('./config/APIKey.ini')

API_KEY = config.get('API', 'key')
base_url = config.get('URL', 'base')
stat_url = base_url + '/videos?key=%s&id=%s&part=%s'

"""
処理：videoデータ取得ロジック
概要：YouTubeからデータを取得して配列に格納する
引数：分析動画ID
戻り値：APIから取得した動画データの配列
"""


def get_video_data(analysis_video_ids):
    video_data = []
    daily_flg = '1'
    for video_id in analysis_video_ids:
        ins_data = []
        # APIから動画ID・動画タイトルを取得
        part = 'snippet'
        print(video_id)
        response = requests.get(stat_url % (API_KEY, video_id, part))
        if response.status_code != 200:
            logger.error('YouTubeとの接続に失敗しました。処理を停止します。')
            os.sysexit()

        result = response.json()
        print(result)
        if not result['items']:
            logger.warning('対象の動画が存在しませんでした。　動画ID：' + video_id)
            continue

        video_id = result['items'][0]['id']
        video_title = result['items'][0]['snippet']['title']

        # APIから再生回数・評価数を取得
        part = 'statistics'
        response = requests.get(stat_url % (API_KEY, video_id, part))
        if response.status_code != 200:
            logger.error('YouTubeとの接続に失敗しました。処理を停止します。')
            continue

        result = response.json()
        view_cnt = '0'
        good_cnt = '0'
        bad_cnt = '0'
        if result['items'][0]['statistics']['viewCount']:
            view_cnt = result['items'][0]['statistics']['viewCount']
        if result['items'][0]['statistics']['likeCount']:
            good_cnt = result['items'][0]['statistics']['likeCount']
        if result['items'][0]['statistics']['dislikeCount']:
            bad_cnt = result['items'][0]['statistics']['dislikeCount']

        # 配列にAPIの取得結果を格納する
        ins_data.append(video_id)
        ins_data.append(video_title)
        ins_data.append(view_cnt)
        ins_data.append(good_cnt)
        ins_data.append(bad_cnt)
        ins_data.append(daily_flg)
        ins_data.append(now)
        video_data.append(ins_data)

    return video_data
