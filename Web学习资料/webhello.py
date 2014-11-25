import tornado.ioloop
import tornado.web

class MainHandler(tornado.web.RequestHandler):
    def get(self):
        self.write('<html><body><form action="/" method="post">'
                   '<input type="text" name="message">'
                   '<input type="submit" value="Submit">'
                   '</form></body></html>')

    def post(self):
		self.set_header("Content-Type", "text/html")
		self.write("Header:" "<br>")
		for key, val in self.request.headers.iteritems():
			self.write(key + "=" + repr(val) + "<br>")
		self.write("<br>message: " "<br>")
		for key, val in self.request.arguments.iteritems():
			self.write(key + "=" + repr(val) + "<br>")

class StoryHandler(tornado.web.RequestHandler):
    def get(self, u_id):
        self.write("You requested the user " + u_id)

application = tornado.web.Application([
    (r"/", MainHandler),
    (r"/u/([0-9]+)", StoryHandler),
],debug=True)

if __name__ == "__main__":
    application.listen(8888)
    tornado.ioloop.IOLoop.instance().start()