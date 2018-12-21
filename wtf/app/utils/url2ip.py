import socket


def url2ip(target):
    if target.startswith('http://') or target.startswith('https://'):
        domain=target.split('/')[2]
    else:
        domain = target.split('/')[0]
    ip=socket.getaddrinfo(domain, 80)[0][4][0]
    return ip