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

"""
処理：videoデータ取得ロジック
概要：YouTubeからデータを取得して配列に格納する
引数：分析動画ID
戻り値：APIから取得した動画データの配列
"""


def get_video_comment_data(video_data, n=10):
    comment_data = []
    for input_data in video_data:
        params = {
            'key': API_KEY,
            'part': 'snippet',
            'videoId': input_data,
            'order': 'relevance',
            'textFormat': 'plaintext',
            'maxResults': n,
        }
        response = requests.get(base_url + '/commentThreads', params=params)

        if response.status_code != 200:
            logger.error('YouTubeとの接続に失敗しました。処理を停止します。')
            continue

        result = response.json()
        if not result['items']:
            logger.warning('対象の動画のコメントが存在しませんでした。　動画ID：' + video_data[0])
            continue

        for comment_info in result['items']:
            ins_data = []
            text = ''
            like_cnt = ''
            reply_cnt = ''
            # コメント
            if comment_info['snippet']['topLevelComment']['snippet']['textDisplay']:
                text = comment_info['snippet']['topLevelComment']['snippet']['textDisplay']
            # グッド数
            if comment_info['snippet']['topLevelComment']['snippet']['likeCount']:
                like_cnt = comment_info['snippet']['topLevelComment']['snippet']['likeCount']
            # 返信数
            if comment_info['snippet']['totalReplyCount']:
                reply_cnt = comment_info['snippet']['totalReplyCount']

            ins_data.append(input_data)
            ins_data.append(text)
            ins_data.append(like_cnt)
            ins_data.append(reply_cnt)
            ins_data.append(now)
            comment_data.append(ins_data)

    return comment_data
