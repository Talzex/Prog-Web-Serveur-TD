import socket
import socketserver
import datetime


class WebServer(socketserver.BaseRequestHandler):
    def handle(self):
        client = self.request
        io = client.makefile()
        page = ''
        # Receiving client commands line per line
        print('> Request: ')
        receivingHeaders = True
        line = io.readline().strip()
        print(line)
        parts = line.split(' ')
        page = parts[1]

        dico = {}
        if '?' in page:
            page, args = page.split('?', 1)
            args = args.split('&')
            for arg in args:
                t = arg.split('=')
                if len(t) > 1:
                    k, v = arg.split('=')
                    dico[k] = v

        while receivingHeaders:
            line = io.readline().strip()
            print(line)
            if line == '':
                receivingHeaders = False

        # Creating a response for the client
        body =''
        mimeType ='text/html'

        if page == '/test':
            print('> Response: ')
            body += """<form method="get">
                        Nombre 1: <input type="text" name="n1" /><br />
                        Nombre 2: <input type="text" name="n2" /><br />
                        <input type="submit" value="Additioner!" />
                        </form>"""
            if 'n1' in dico and 'n2' in dico:
                try:
                    if(len(dico) == 2):
                        n1 = int(dico.get("n1"))
                        n2 = int(dico.get("n2"))
                        valeur = n1 + n2
                        body += "<p>Le résultat de " + \
                        str(n1) + " + " + str(n2) + " est : " + str(valeur)+"</p>"
                except ValueError:
                    body += "Valeurs Incorecttes"
            body += "<img src='telechargement.jpg' alt='img' />"
        elif page == "/telechargement.jpg":
            mimeType = 'image/jpg\r\n'


        response = "HTTP/1.1 200 OK\r\n"
        response += "Content-type:" + mimeType + "\r\n"
        response += "\r\n"

        response += body

        elif page == '/':
            print('> Response: ')
            response += datetime.datetime.now().strftime('%H:%M:%S')
        if page != "/favicon.ico":
            print(response)
        client.sendall(response.encode('utf-8'))
        if page == "/telechargement.jpg":
            img = open('telechargement.jpg','rb')
            data = img.read()
            client.sendall(data)
            img.close()


HOST, PORT = "127.0.0.1", 8080
socketserver.TCPServer.allow_reuse_address = True
with socketserver.TCPServer((HOST, PORT), WebServer) as server:
    server.serve_forever()
