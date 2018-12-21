from flask import jsonify

def success(data):
    return jsonify({'data':data,'status':True})