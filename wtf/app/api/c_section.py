#  coding=utf-8
'''
c段扫描
'''

from . import api
import requests
from flask import request
from app.utils import *
from flask import current_app
from collections import defaultdict
import json

@api.route('/c')
def get_c_section():
    headers=current_app.config.get('HEADERS')
    target = str(request.args.get('target', ''))
    c_ip=url2ip(target)
    items=c_ip.split('.')
    url = "http://www.webscan.cc"
    data=defaultdict(list)
    for i in range(1,255):
        ip=items[0]+'.'+items[1]+'.'+items[2]+'.'+str(i)
        print ip
        query={
            'action':'query',
            'ip':ip
        }
        try:
            r = requests.get(url=url, params=query, headers=headers)
        except Exception,e:
            pass
        res=r.text.encode('GBK','ignore')
        if  res != "null":
            res_datas=None
            print res
            try:
                res_datas = r.json()
            except Exception,e:
                pass
            if res_datas:
                for i in res_datas:
                    data[ip].append(i)
    return success(data)
