from flask import Blueprint

api=Blueprint('api',__name__)

import baseinfo
from .cms import whatcms
import Whois
from .ip2area import ip
import subdomain
import c_section
import portscan
import simple_portscan
from .dirscan import dirscan
