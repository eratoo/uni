############## THIS IS THE SENDER!!!! ##############

#imports
from sage.all import *
from sage.coding import *
import socket              
import cPickle
import time
from sage.rings.finite_rings.finite_field_constructor import FiniteField as GF
import SimpleHTTPServer
import SocketServer

#creating socket
s = socket.socket()
host = "localhost"   #setting local machine name and port       
port = 12345     
s.bind((host, port)) #binding to the port   



#user gives parameters (generator matrix dimensions, finite field value) 
print "Give generator matrix dimensions:"
i = int(input("Type the number of rows: "))
j = int(input("Type the number of columns: "))
invalid = True
while invalid: #check if prime number
    n = int(input("Type finite field value (must be a prime number):"))
    if n > 1:
        for k in range(2, n):
            if (n % k) == 0:
                print("this is not a prime number!")
                break
            else:
                invalid = False

#user gives generator matrix elements
Matrix = [[0 for y in range(j)] for x in range(i)] 
for x in range(i):
    for y in range(j):  
        invalid = True
        while invalid:
            print "Give the element [", x, ",", y, "]"
            element = int(input(""))
            if element < n:
                invalid = False
                Matrix[x][y] = element
            else:
                print "Oops!  That was no valid number. Try again"
print "You set finite field to GF(",n,")"
print "Matrix = ", Matrix

#creating linear code from matrix
M = matrix(GF(n),Matrix)
C = codes.LinearCode(M)
print "Linear Code generated is: ", C

#minimum distance / max errors
d = C.minimum_distance()
print "The minimum distance is ", d
print "Maximum number of errors:", C.decoder()

#dual code (Every linear code has a dual but we check it anyway..)
if C.dual_code() is not None:
    C = C.dual_code()
print "Now we will create 20 random words with a random Error Rate."

#user gives error rate
invalid = True
while invalid: 
    err = int(input("Give error rate: "))
	#chech if the error rate the user gives is possible
    if err > C.length():
        print "There might be more errors than the dimension of the input space"
    else:
        invalid = False

#generating 20 random words /storing in list
rndWords = []
for i in range(0, 20):    
    #generating random word
    msg = random_vector(C.base_field(),C.dimension())
    c = C.encode(msg)
    #adding error (transmit the words over a channel with the error rate given by the user..)
    Chan = channels.StaticErrorRateChannel(C.ambient_space(), err)
    line = Chan.transmit(c)
    #adding to list of random words
    rndWords.append(line)    
    
#modifying (serializing) parameters and words to send to the receiver 

gen_matrix = cPickle.dumps(Matrix)
twenty_words = cPickle.dumps(rndWords)   
gfn = cPickle.dumps(n) 

#waiting for client connection
s.listen(10)                 
while True:
    #establishing connection with receiver
    c, addr = s.accept()  #call accept twice
    
    print 'Got connection'
    
    #sending parameters and words to receiver
    c.send(gen_matrix)
    time.sleep(3)	#waiting for receiver to receive the generator matrix
    c.send(twenty_words)
    time.sleep(3)	#waiting for receiver to receive the random words
    c.send(gfn)

    c.close()