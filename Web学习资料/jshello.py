#! /usr/bin/env python
# -*- coding: utf-8 -*-

import tornado.ioloop
import tornado.web

class MainHandler(tornado.web.RequestHandler):
    def get(self):
        self.write("Hello, world")

class HelloHandler(tornado.web.RequestHandler):
    def get(self):
        self.render('js.html')
		
application = tornado.web.Application([
    (r"/", MainHandler),
	(r"/hello", HelloHandler),
],debug=True)

if __name__ == "__main__":
    application.listen(8888)
    tornado.ioloop.IOLoop.instance().start()
    
