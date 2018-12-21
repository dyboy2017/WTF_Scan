import requests
import re

url='http://www.dyboy.cn/admin'
headers={
    'User-Agent':'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:59.0) Gecko/20100101 Firefox/59.0'
}
r=requests.get(url, headers=headers, timeout=1)
print r.status_code
print r.text
if re.search('404',r.text,re.I):
    print "404"
else:
    print re.search('404', r.text, re.I)