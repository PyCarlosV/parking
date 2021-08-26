from flask import Flask, render_template, request, redirect, url_for, flash,jsonify, request
from flask_mysqldb import MySQL
from email.mime.base import MIMEBase
import smtplib, ssl
#from flask import Flask,jsonify,request
#from flask_cors import CORS

class Mail:

    def __init__(self):
        self.port = 465
        self.smtp_server_domain_name = "smtp.gmail.com"
        self.sender_mail = "seigenssama@gmail.com"
        self.password = 'Totto7887'
        self.adjunto=MIMEBase("application","octect-stream")

    def send(self, emails, subject, content):
        content2 = content.split('/')
        f = open (content2[-1],'w')
        f.write('hola usuario \n saludos \n %s'%content2[0])
        f.close()
        self.adjunto.set_payload(open("%s"%content2[-1],"rb").read())
        self.adjunto.add_header("content-Disposition",'attachment; filename="mensaje.txt"')
        ssl_context = ssl.create_default_context()
        service = smtplib.SMTP_SSL(self.smtp_server_domain_name, self.port, context=ssl_context)
        service.login(self.sender_mail, self.password)
        coc=self.adjunto
        for email in emails:
            result = service.sendmail(self.sender_mail, email, f"Subject: {subject}\n{coc}")

        service.quit()

    def send2(self, emails, subject, content):
        ssl_context = ssl.create_default_context()
        service = smtplib.SMTP_SSL(self.smtp_server_domain_name, self.port, context=ssl_context)
        service.login(self.sender_mail, self.password)
        coc=content
        for email in emails:
            result = service.sendmail(self.sender_mail, email, f"Subject: {subject}\n{coc}")    

        service.quit()

# initializations
app=Flask(__name__)
#cors = CORS(app, resources={r"/*": {"origins": "*"}})
#from parkings import parkings,clientes,empleado,factura,tarifa
#from parkingsñ import api
# Mysql Connection
app.config['MYSQL_HOST'] = 'localhost' 
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'parqueb'
mysql = MySQL(app)

# settings
app.secret_key = "mysecretkey"

# routes
@app.route('/ping')
def ping():
   return jsonify({'response': 'pong!'})
# emails
@app.route('/correo',methods=['POST'])
def copin():
    mails2= request.json['mails2']
    subject= request.json['subject']
    content = request.json['content']
    content2 = content.split('/')
    mails = mails2.split()

    mail = Mail()
    if 'contenido.txt' not in content2:
        mail.send2(mails, subject, content)
    else:
        mail.send(mails, subject, content)
    return jsonify({"message": "Registro exitoso"})

#selects
@app.route('/ini/<id>',methods=['GET'])
def pingi(id):
    print(id)
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM %s' % id)
    data = cur.fetchall()
    cur.close()
    return jsonify({'data': data})

#selects
@app.route('/ini2/<id>/<id2>/<id3>',methods=['GET'])
def pingi2v(id,id2,id3):
    print(id)
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM %s WHERE %s='%s'" %(id,id2,id3))
    data = cur.fetchall()
    cur.close()
    return jsonify({'data': data})
#usuario activo
@app.route('/emp',methods=['GET'])
def idel():
    cur = mysql.connection.cursor()
    cur.execute('SELECT ide  FROM empleado WHERE log = 1')
    data = cur.fetchall()
    cur.close()
    return jsonify({'data': data})
#id por di
@app.route('/cli/<id>',methods=['GET'])
def idca(id):
    cur = mysql.connection.cursor()
    cur.execute('SELECT idc FROM clientes WHERE di= %s' %id)
    data = cur.fetchall()
    cur.close()
    return jsonify({'data': data})
#id por placa
@app.route('/veh/<id>',methods=['GET'])
def idva(id):
    cur = mysql.connection.cursor()
    cur.execute("SELECT idp FROM vehiculos WHERE placa = '%s' "%id)
    data = cur.fetchall()
    cur.close()
    return jsonify({'data': data})
#id por placa2
@app.route('/pu/veh',methods=['get'])
def idvb():
     ids= request.json['id']
     cur = mysql.connection.cursor()
     cur.execute("""SELECT v.idp, concat(c.nombres,' ', c.apellidos), v.placa FROM
vehiculos as v INNER JOIN clientes as c ON v.ide=c.idc WHERE v.placa = '%s'
and v.borr=0"""%ids)
     data = cur.fetchall()
     cur.close()
     return jsonify({'data': data})
#busca es
@app.route('/pu/veh2',methods=['get'])
def idbes():
     ids= request.json['id']
     cur = mysql.connection.cursor()
     cur.execute("""SELECT v.placa, p.espacio FROM estacionar e INNER JOIN
vehiculos as v ON v.idp=e.vehicu INNER JOIN planta as p ON p.id=e.espacio
WHERE vehicu = %s and e.borr=0"""%ids)
     data = cur.fetchall()
     cur.close()
     return jsonify({'data': data})
#id por ct
@app.route('/empi/<id>',methods=['GET'])
def idea(id):
    cur = mysql.connection.cursor()
    cur.execute("SELECT ide FROM empleado WHERE contra= '%s' "%id)
    data = cur.fetchall()
    cur.close()
    return jsonify({'data': data})
#id espacios por code
@app.route('/estac',methods=['post'])
def estac():
    idd= request.json['id']
    cur = mysql.connection.cursor()
    cur.execute("SELECT id FROM planta WHERE espacio='%s'"%(idd))
    data = cur.fetchall()
    cur.close()
    return jsonify({'data': data})
#spaces
@app.route('/space',methods=['GET'])
def space():
    cur = mysql.connection.cursor()
    cur.execute("""SELECT p.espacio FROM planta as p WHERE NOT EXISTS (SELECT NULL
FROM estacionar as e WHERE e.espacio = p.id and e.borr=0) LIMIT 42""")
    data = cur.fetchall()
    cur.close()
    return jsonify({'data': data})
#ocupar
@app.route('/ocupar',methods=['POST'])
def ocupa():
    if request.method == 'POST':
       placa= request.json['placa']
       espacio= request.json['espacio']
       cur = mysql.connection.cursor()
       cur.execute("""INSERT INTO estacionar (vehicu, espacio,borr)
VALUES ('%s', '%s','0')"""%(placa,espacio))
       mysql.connection.commit()
    return jsonify({"informacion":"Registro actualizado"})

#Log
@app.route('/empleados/<id>',methods=['POST'])
def getParking(id):
    if request.method == 'POST':
       cargos= request.json['cargos']
       contra= request.json['contra']
       correo = request.json['correo']
       di= request.json['di']
       idf = request.json['idf']
       cur = mysql.connection.cursor()
       cur.execute("""UPDATE empleado SET ide='%s',cargos='%s',di='%s',idf='%s'
,log='%s',correo='%s',contra='%s' WHERE ide = %s
""" %(id,cargos,di,idf,1,correo,contra,id))
       mysql.connection.commit()
    return jsonify({"informacion":"Registro actualizado"})
#Log
@app.route('/empleadosa/<id>',methods=['POST'])
def getParkingam(id):
    if request.method == 'POST':
       cargos= request.json['cargos']
       contra= request.json['contra']
       correo = request.json['correo']
       di= request.json['di']
       idf = request.json['idf']
       cur = mysql.connection.cursor()
       cur.execute("""UPDATE empleado SET ide='%s',cargos='%s',di='%s',idf='%s'
,log='%s',correo='%s',contra='%s' WHERE ide = %s
""" %(id,cargos,di,idf,0,correo,contra,id))
       mysql.connection.commit()
    return jsonify({"informacion":"Registro actualizado"})
#REGISP
@app.route('/resisp',methods=['GET'])
def getfacking():
    cur = mysql.connection.cursor()
    cur.execute('SELECT vehiculos.modelo, clientes.di, vehiculos.fecent, factura.tieent, vehiculos.fecsal, factura.tiesal, vehiculos.placa,  tarifa.ttar, factura.tot FROM vehiculos INNER JOIN clientes ON vehiculos.ide=clientes.idc INNER JOIN factura ON vehiculos.idp = factura.idr INNER JOIN tarifa ON tarifa.vid = vehiculos.idp WHERE 1;')
    data = cur.fetchall()
    cur.close()
    return jsonify({'data': data})
#INSERTAR
@app.route('/add/<string:id>', methods=['POST'])
def addParking(id):
    if request.method == 'POST':
      if id=='empleado':
        cargos= request.json['cargo']
        di= request.json['ndi']
        idf = request.json['idf']
        correo= request.json['email']
        contra= request.json['password']
        cur=mysql.connection.cursor()
        cur.execute("""INSERT INTO empleado (cargos, di, idf,
correo, contra) VALUES (%s,%s,%s,%s,%s)
""", (cargos, di,idf, correo, contra))
        mysql.connection.commit()
      elif id=='vehiculos':
        color= request.json['color']
        fecent= request.json['fecent']
        fecsal = request.json['fecsal']
        ide= request.json['ide']
        idem= request.json['idem']
        modelo= request.json['modelo']
        placa= request.json['placa']
        cur=mysql.connection.cursor()
        cur.execute("""INSERT INTO vehiculos (placa, modelo, color, fecent, fecsal, ide, idem)
VALUES (%s,%s,%s,%s,%s,%s,%s)""", (placa, modelo,color, fecent, fecsal,ide, idem))
        mysql.connection.commit()
      elif id=='clientes':
        apellidos= request.json['apellidos']
        fecha= request.json['fecha']
        hora= request.json['hora']
        dire= request.json['dire']
        nombres= request.json['nombres']
        di= request.json['di']
        tel= request.json['tel']
        cur=mysql.connection.cursor()
        cur.execute("""INSERT INTO clientes (nombres,apellidos,tel,dire,di,fecha,hora)
VALUES (%s,%s,%s,%s,%s,%s,%s)""", (nombres, apellidos,tel, dire, di,fecha, hora))
        mysql.connection.commit()
      elif id=='factura':
        caja=request.json['caja']
        idr=request.json['idr']
        tieent=request.json['tieent']
        tiesal=request.json['tiesal']
        tot=request.json['tot']
        cur=mysql.connection.cursor()
        cur.execute("""INSERT INTO factura
(tieent, tiesal, tot, caja, idr) VALUES
(%s, %s, %s, %s, %s)""",(tieent,tiesal,tot,caja,idr))
        mysql.connection.commit()
      elif id=='tarifa':
        vid=request.json['idr']
        ttar=request.json['metodo']
        tveh=request.json['tipo']
        cur=mysql.connection.cursor()
        cur.execute("""INSERT INTO tarifa(ttar, tveh, vid) VALUES (%s, %s, %s)
""",(ttar,tveh,vid))
        mysql.connection.commit()
      return jsonify({"message": "Registro exitoso"})

#ACTUALIZAR v
@app.route('/updatev/<id>', methods=['POST'])
def update_v(id):
    if request.method == 'POST':
        idp = request.json['idp']
        color= request.json['color']
        fecent= request.json['fecent']
        fecsal = request.json['fecsal']
        ide= request.json['ide']
        idem= request.json['idem']
        modelo= request.json['modelo']
        placa= request.json['placa']
        borr=request.json['borr']
        cur = mysql.connection.cursor()
        cur.execute(""" UPDATE %s SET idp ='%s', placa='%s',modelo='%s',color='%s',
fecent='%s',fecsal='%s',borr='%s',ide='%s',idem='%s' WHERE idp = %s
""" %(id,idp,placa,modelo,color,fecent,fecsal,borr,ide,idem,idp))
        mysql.connection.commit()
        return jsonify({"informacion":"Registro actualizado"})

#ACTUALIZAR c
@app.route('/updatec/<id>', methods=['POST'])
def update_c(id):
    if request.method == 'POST':
        hora = request.json['hora']
        nombres= request.json['nombres']
        apellidos= request.json['apellidos']
        tel = request.json['tel']
        idc = request.json['idc']
        dire= request.json['dire']
        di= request.json['di']
        fecha= request.json['fecha']
        borr=request.json['borr']
        cur = mysql.connection.cursor()
        cur.execute(""" UPDATE clientes SET idc='%s',nombres='%s',
apellidos='%s',tel='%s',dire='%s',di='%s',borr='%s',fecha='%s',hora='%s' 
WHERE idc='%s'""" %(idc,nombres,apellidos,tel,dire,di,borr,fecha,hora,idc))
        mysql.connection.commit()
        return jsonify({"informacion":"Registro actualizado"})

if __name__ == '__main__':
    app.run(debug=True, port=4000)
