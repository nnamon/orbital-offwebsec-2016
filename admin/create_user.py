#!/usr/bin/python

import subprocess
import pwd
import re
import random
import string
import socket
import md5

def genpass():
    syms = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"
    password = "".join(random.choice(syms) for i in range(10))
    return password

def main():
    print "---------------------------------------"
    print "| Welcome to Orbital 2016 Web Security|"
    print "|   User Account Creation Utility     |"
    print "---------------------------------------"
    print "\n"
    username = raw_input("Enter your desired username: ")

    try:
        user = pwd.getpwnam(username)
        exists = True
    except KeyError:
        exists = False

    if exists:
        print "Sorry that username is already taken."
        exit()

    pat = re.compile("^[a-z]+$")
    mat = pat.match(username)

    if not mat:
        print "Sorry the username is invalid (not matching ^[a-z]+$)"
        exit()

    password = genpass()
    cryptpass = subprocess.check_output(["/usr/bin/openssl",
                                         "passwd", "-1", password]).strip()

    parameters = ["useradd", "-s", "/bin/bash", "-m", "-g",
                  "orbital", "-p", cryptpass, username]
    subprocess.call(parameters)

    hashed = md5.md5(password).hexdigest()
    s = socket.socket()
    s.connect(("dvwa.spro.ink", 9999))
    s.sendall("%s:%s\n" % (username, hashed))
    s.close()

    print "Here are your credentials:"
    print "Username: %s" % username
    print "Password: %s\n" % password

    print "Please login with %s@ssh.spro.ink using the provided password" % username
    print "You may log in to http://dvwa.spro.ink with these credentials as well."

main()

