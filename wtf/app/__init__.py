from flask import Flask
from config import config
from flask_sqlalchemy import SQLAlchemy
from .api import api

db=SQLAlchemy()

blueprints=[(api,'/api')]


def create_app():
    app=Flask(__name__)
    app.config.from_object(config['default'])

    db.init_app(app)

    init_blueprint(app, blueprints)

    return app


def init_blueprint(app,blueprint):
    for item in blueprint:
        app.register_blueprint(item[0],url_prefix=item[1])