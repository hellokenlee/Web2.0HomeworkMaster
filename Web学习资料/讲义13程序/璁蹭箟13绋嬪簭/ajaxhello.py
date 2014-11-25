#! /usr/bin/env python
# -*- coding: utf-8 -*-

import tornado.ioloop
import tornado.web

class MainHandler(tornado.web.RequestHandler):
    def get(self):
        self.write("Hello, world")

class HelloHandler(tornado.web.RequestHandler):
    def get(self):
        self.render('ajax.html')
        
class AjaxService(tornado.web.RequestHandler):
    def get(self):
        self.write("This is JSON text!")
		
application = tornado.web.Application([
    (r"/", MainHandler),
    (r"/hello", HelloHandler),
    (r"/some_url", AjaxService),
],debug=True)

if __name__ == "__main__":
    application.listen(8888)
    tornado.ioloop.IOLoop.instance().start()
    
