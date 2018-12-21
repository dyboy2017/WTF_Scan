from flask import jsonify

def error(data):
    return jsonify({'data':data,'status':False})