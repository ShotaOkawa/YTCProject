import logging
import configparser
from model import ytc_batch_model
from apiget import video_api
from apiget import comment_api

logger = logging.getLogger('LoggingTest')
logger.setLevel(10)
fh = logging.FileHandler('LOG/batch.log')
logger.addHandler(fh)

"""
処理：メインバッチ
概要：YouTubeからデータを取得して各テーブルに登録する
"""
if __name__ == '__main__':
    logger.info('メイン処理開始')
    video_ids = ytc_batch_model.get_analysis_video_id()
    if len(video_ids) != 0:
        videos_data = video_api.get_video_data(video_ids)
        videos_comment_data = comment_api.get_video_comment_data(video_ids)
        ytc_batch_model.ins_video_data(videos_data)
        ytc_batch_model.ins_comment_data(videos_comment_data)
    else:
        print('no data')
