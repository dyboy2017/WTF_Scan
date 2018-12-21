# coding=utf-8

from ip2Region import Ip2Region
from app.api import api
from flask import request
import socket
from config import basedir
import os
from app.utils import *
import re


@api.route('/ip2region')
def get_iparea():
    target = str(request.args.get('target', ''))
    if not re.match('^(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})$',target):
        if target.startswith('http://') or target.startswith('https://'):
            domain = target.split('/')[2]
        else:
            domain = target.split('/')[0]
        ip = socket.getaddrinfo(domain, 80)[0][4][0]
    else:
        ip=target
    searcher = Ip2Region(os.path.join(basedir, 'app/api/ip2area/ip2region.db'))
    data = searcher.btreeSearch(ip)
    searcher.close()
    return success(data=data)