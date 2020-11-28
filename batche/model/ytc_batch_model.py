import os
import configparser
import mysql.connector
import logging

config = configparser.ConfigParser()
config.read('./config/DBConnection.ini')
db_host = config.get('connection', 'host')
db_name = config.get('connection', 'database')
db_user = config.get('connection', 'user')
db_pass = config.get('connection', 'password')

logger = logging.getLogger('LoggingTest')
logger.setLevel(10)
fh = logging.FileHandler('LOG/batch.log')
logger.addHandler(fh)


def get_analysis_video_id():
    try:
        conn = mysql.connector.connect(
            password=db_pass,
            user=db_user,
            host=db_host,
            database=db_name)
        cur = conn.cursor()
        sql = "SELECT video_id FROM analysis_video"
        cur.execute(sql)
        result = []
        for video_id in cur.fetchall():
            result.append(video_id[0])
    except Exception as e:
        logger.error(e)
        os.sysexit()
    finally:
        cur.close()
        conn.close()
    return result


def ins_video_data(video_data):
    try:
        conn = mysql.connector.connect(
            user=db_user,
            password=db_pass,
            host=db_host,
            database=db_name)
        cur = conn.cursor()
        insert_sql = "INSERT INTO video values (%s,%s,%s,%s,%s,%s,%s)"
        for ins_data in video_data:
            cur.execute(insert_sql, ins_data)
    except Exception as e:
        logger.error(e)
        conn.rollback()
        os.sysexit()
    finally:
        cur.close()
        conn.commit()
        conn.close()


def ins_comment_data(comment_data):
    try:
        conn = mysql.connector.connect(
            user=db_user,
            password=db_pass,
            host=db_host,
            database=db_name)
        cur = conn.cursor()
        insert_sql = "INSERT INTO comment values (%s,%s,%s,%s,%s)"
        for ins_data in comment_data:
            cur.execute(insert_sql, ins_data)
    except Exception as e:
        logger.error(e)
        conn.rollback()
        os.sysexit()
    finally:
        cur.close()
        conn.commit()
        conn.close()
