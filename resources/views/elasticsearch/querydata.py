
from flask import Flask, render_template, json, request
from flask import Flask, request, abort, jsonify
import pymysql
from pythainlp import word_tokenize
import sys
import json
import requests
import http.server




def autokeyword():
    

    connection = pymysql.connect(host="localhost", user="root", passwd="", database="projectdb")
    cursor = connection.cursor()

    # queries all rows
    keyword = "Select * from keyword_p ;"
    des_p = "Select des_p from temp_des_p ;"

    #executing the quires
    cursor.execute(keyword)
    rows = cursor.fetchall()

    cursor.execute(des_p)
    temp_des = cursor.fetchall()
    
    for temp_p in temp_des:
        proc = word_tokenize(temp_p[0], engine='newmm')
        print(proc)
        for procs in proc:
            for row in rows:

                if procs == row[2]:
                    print(row[2])
                    mycursor = connection.cursor()
                    add_key = "INSERT INTO temp_keyword (name_key) VALUES (%s)"
                    val = (row[2])
                    mycursor.execute(add_key, val)
    truncate = "TRUNCATE TABLE temp_des_p;"
    cursor.execute(truncate)
    #database connection
    connection.commit()
    connection.close()

            


if __name__ == '__main__':
     
    while True:    
        autokeyword()
        
                

    


    
















