from . import api
from ..utils import *
from flask import request
import requests
from flask import  current_app
import socket


@api.route('/baseinfo')
def base():
    target=str(request.args.get('target',''))
    if target.startswith('http://') or target.startswith('https://'):
        domain=target.split('/')[2]
        return get_info(target,domain)
    else:
        domain = target.split('/')[0]
        target='http://'+target
        return get_info(target,domain)


def get_info(target,domain):
    headers=current_app.config.get('HEADERS')
    r=requests.get(target,headers=headers)
    info={}
    info['server']=str(r.headers.get('server','nothing'))
    info['language']=str(r.headers.get('X-Powered-By','nothing'))
    try:
        info['ip'] = socket.getaddrinfo(domain, 80)[0][4][0]
    except Exception,e:
        info['ip']='nothing'
    if 'iis' in info['server'].lower():
        info['os']="windows"
    else:
        info['os']='Linux'

    return success(data=info)