############## THIS IS THE SECOND SOCKET!!!! ##############

#imports
import socket               
import cPickle
import time
from sage.all import *
from sage.coding import *

#creating socket 
s = socket.socket()         
host = "localhost"   #getting local machine name
port = 12345         # reserving a port

s.connect((host, port))   #connecting to the port

#getting data from first socket
v1 = s.recv(1024)
time.sleep(3)   #waiting for the random words
v2 = s.recv(4096)
time.sleep(3)	#waiting for the gfn
gfn_sent = s.recv(1024)

#deserializing, storing and printing received data to the user

Matrix = cPickle.loads(v1)
print Matrix

rndWords = cPickle.loads(v2)
print rndWords

gfn = cPickle.loads(gfn_sent)

#generating linear code from data and printing it
M = matrix(GF(gfn),Matrix)
C = codes.LinearCode(M)
print C

#generating dual code to use
C = C.dual_code()

#decoding messages
print "printing result words..."
for i in range(0, 20): 
    msg = rndWords[i]
    m_unenc = C.decode_to_message(msg)
	#printing decoded words to user
	print m_unenc
print "all done"

s.close()
