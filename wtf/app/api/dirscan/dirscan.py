#  coding=utf-8
import threading
from config import basedir
import requests
import os
from .. import api
from flask import request
from app.utils.success import success
import re
import random


@api.route('/dir')
def dir_scan():
    target = str(request.args.get('target', ''))
    if target.startswith('http://') or target.startswith('https://'):
        pass
    else:
        target='http://'+target
    if target.endswith('/'):
        target=target[:-1]
    types=str(request.args.get('type', '')).split(',')
    dirscan=DirScan(target,types=types)
    dirscan.run()
    return success(dirscan.get_data())


class DirScan:
    def __init__(self,target,types,thread_num=20):
        self.headers={
                'User-Agent':'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:59.0) Gecko/20100101 Firefox/59.0'
        }
        self.threads = []
        self.target=target
        self.lock = threading.Lock()
        self.thread_num = thread_num
        self.data=[]
        self.dirs=[] #存储所有路径
        self.files=[]
        self.scan_files=['ASP.txt','ASPX.txt','DIR.txt','JSP.txt','MDB.txt','PHP.txt']
        print 'types:{}\n'.format(types)
        for i in types:
            self.files.append(self.scan_files[int(i)])

    def dir_scan(self,dirs):
        for c_dir in dirs:
            if len(c_dir.strip()) == 0:
                continue
            url = self.target + c_dir
            try:
                r = requests.get(url, headers=self.headers, timeout=1)
                if r.status_code == 200 or r.status_code==403:
                    if re.search('404',r.text,re.I):
                        pass
                    else:
                        self.lock.acquire()
                        self.data.append((r.status_code, c_dir[:-1]))
                        self.lock.release()
            except Exception:
                continue

    def start_threads(self):
        step=len(self.dirs)/self.thread_num
        for i in range(self.thread_num):
            if i==self.thread_num-1:
                arg = (self.dirs[i * step:],)
            else:
                arg = (self.dirs[i * step:(i + 1) * step],)
            t = threading.Thread(target=self.dir_scan,args=arg)
            self.threads.append(t)

        for t in self.threads:
            t.start()

        for t in self.threads:
            t.join()

    def run(self):
        for i in self.files:
            with open(os.path.join(basedir,'app/api/dirscan/'+i),'r') as f:
                for item in f.readlines():
                    self.dirs.append(item)
        self.start_threads()

    def get_data(self):
        while True:
            is_finish=True
            for i in self.threads:
                if i.isAlive():
                    is_finish=False
                    break
            if is_finish:
                return self.data
