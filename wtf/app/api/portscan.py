# coding=utf-8
'''
全端口扫描
'''

import threading
import socket
from . import api
from app.utils import *
from flask import  request

@api.route('/all_portscan')
def all_portscan():
    target = str(request.args.get('target', ''))
    ip=url2ip(target)
    portscan=PortSacn(ip)
    portscan.run()
    return success(portscan.get_data())


class PortSacn:
    def __init__(self,ip,thread_num=20):
        self.data=[]
        self.ip=ip
        self.threads = []
        self.lock = threading.Lock()
        self.thread_num = thread_num

    def test_port(self,ports_range=()):
        for i in range(ports_range[0],ports_range[1]):
            cli_sock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
            try:
                indicator = cli_sock.connect_ex((self.ip, i))
                if indicator == 0:
                    self.lock.acquire()
                    self.data.append(i)
                    self.lock.release()
                cli_sock.close()
            except Exception:
                pass

    def start_threads(self):
        step=65535/self.thread_num
        for i in range(self.thread_num):
            t = threading.Thread(target=self.test_port,args=((step*i+1,step*(i+1)),))
            self.threads.append(t)

        for t in self.threads:
            t.start()

        for t in self.threads:
            t.join()

    def run(self):
        self.start_threads()

    def get_data(self):
        while True:
            for item in self.threads:
                if item.isAlive():
                    continue
            return self.data

if __name__ == "__main__":
    portscan=PortSacn('222.186.24.54')
    portscan.run()
    print portscan.data