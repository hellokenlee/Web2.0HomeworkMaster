# -*- coding: utf-8 -*-  

import tornado.ioloop
import tornado.web
import os
import os.path
import sys
reload(sys)
sys.setdefaultencoding('GBK')
path = os.path.abspath(os.path.dirname(sys.argv[0]))
rootdir=os.path.join(path,"static")
rootdir=os.path.join(rootdir,"songs")
settings = {
    "static_path": rootdir
}
class MainHandler(tornado.web.RequestHandler):
	def get(self):
		for parent,dirnames,filenames in os.walk(rootdir): 
				self.render("music.html",files=filenames)
				
application = tornado.web.Application(
    handlers=[(r'/', MainHandler)],
    debug = True,**settings
    )
if __name__ == "__main__":
    print rootdir
    application.listen(8887)
    tornado.ioloop.IOLoop.instance().start()
