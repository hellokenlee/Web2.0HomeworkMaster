# -*- coding: utf-8 -*-
import tornado.httpserver
import tornado.ioloop
import tornado.options
import tornado.web

import pymongo                       #导入库

from tornado.options import define, options
define("port", default=8000, help="run on the given port", type=int)

class Application(tornado.web.Application):
    def __init__(self):
        handlers = [(r"/(\w+)", WordHandler)]
        conn = pymongo.Connection("localhost", 27017)         #实例化一个pymongo连接对象
        self.db = conn["example"]			                  #在Application对象中创建一个db属性，指向example数据库
        tornado.web.Application.__init__(self, handlers, debug=True)

class WordHandler(tornado.web.RequestHandler):
    def get(self, word):
        coll = self.application.db.words			         #通过self.application.db访问db属性，取出words集合对象
        word_doc = coll.find_one({"word": word})
        if word_doc:
            del word_doc["_id"]				#删除_id键
            self.write(word_doc)
        else:
            self.set_status(404)
            self.write({"error": "word not found"})

if __name__ == "__main__":
    tornado.options.parse_command_line()
    http_server = tornado.httpserver.HTTPServer(Application())
    http_server.listen(options.port)
    tornado.ioloop.IOLoop.instance().start()