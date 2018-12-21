# coding=utf-8
def get_maindomain(target):
    '''
    获取主域名
    '''
    if target.startswith('http://') or target.startswith('https://'):
        domain=target.split('/')[2]
    else:
        domain = target.split('/')[0]
    if domain.startswith('www'):
        return domain[4:]
    else:
        return domain