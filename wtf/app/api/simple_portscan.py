from . import api
from flask import request
from app.utils import *
import socket


@api.route('/simple_portscan')
def simple_portscan():
    target = str(request.args.get('target', ''))
    ip=url2ip(target)
    ports=[21,22,23,135,445,443,80,1433,3306,3389,6379,8080,8088]
    data=[]
    socket.setdefaulttimeout(0.5)
    for i in ports:
        cli_sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        try:
            indicator = cli_sock.connect_ex((ip, i))
            if indicator == 0:
                data.append(i)
        except Exception,e:
            pass
        cli_sock.close()
    return success(data)