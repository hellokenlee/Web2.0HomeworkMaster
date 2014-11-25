import tornado.ioloop
import tornado.web
import os.path
import time
import sys
reload(sys)
sys.setdefaultencoding('GBK')
class BaseHandler(tornado.web.RequestHandler):
    def get_current_user(self):
        return self.get_secure_cookie("user")

class MainHandler(BaseHandler):
    def get(self):
        self.render("buyagrade.html")
    def post(self):
    	name=self.get_argument("name")
    	section=self.get_argument("section")
    	cardnumber=self.get_argument("cardnumber")
    	cardtype=self.get_argument("cardtype")
    	print name,section,cardnumber,cardtype

application = tornado.web.Application([
    (r"/", MainHandler)
	],
 	cookie_secret="61oETzKXQAGaYdkL5gEmGeJJFuYh7EQnp2XdTP1o/Vo=" ,
 	static_path=os.path.join(os.path.dirname(__file__), "static"),
	template_path=os.path.join(os.path.dirname(__file__), "template"),
	debug=True
	)

if __name__ == "__main__":
    application.listen(8888)
    tornado.ioloop.IOLoop.instance().start()