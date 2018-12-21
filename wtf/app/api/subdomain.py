from . import api
from flask import request
import requests
from pyquery import PyQuery as pq
from app.utils import *


@api.route('/subdomain')
def get_subdomain():
    target = str(request.args.get('target', ''))
    main_domain=get_maindomain(target)
    data=search(main_domain)
    return success(data)


def search(domain):
    url="http://i.links.cn/subdomain/"
    subdomain=[]
    headers={'User-Agent':'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:55.0) Gecko/20100101 Firefox/55.0'}
    payload={
        'domain':domain,
        'b2':1,
        'b3':1,
        'b4':1
    }
    r=requests.post(url,headers=headers,data=payload)
    doc=pq(r.text)
    for item in doc('.domain').items():
       subdomain.append(item.text()[9:])
    return subdomain



