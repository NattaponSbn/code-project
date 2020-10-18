
from flask import Flask, render_template, json, request
from flask import Flask, request, abort, jsonify
import pymysql
from pythainlp import word_tokenize
import sys
import json
import requests
import http.server




def autokeyword():
    
    #database connection
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

    # print(rows)
    # data = requests.get('http://localhost:8000/api/getdes_p')
    # text = data.text
    # print(data.text)
    # print(temp_des[0])
    # x=text.encode("utf-8")
    # y = x.decode('utf-8')
    # x=text.decode('utf-8')
    # print(x)
    # array = []
    
    for temp_p in temp_des:
        proc = word_tokenize(temp_p[0], engine='newmm')
        print(proc)
        for procs in proc:
            for row in rows:
                # print(proc[0])
                # print(row[2])
                if procs == row[2]:
                    print(row[2])
                    mycursor = connection.cursor()
                    # return {procs}
                    add_key = "INSERT INTO temp_keyword (name_key) VALUES (%s)"
                    val = (row[2])
                    mycursor.execute(add_key, val)
                    
                    # load = row[2]
                    # loads = json.dumps(load)
                    # array.append(load)
    truncate = "TRUNCATE TABLE temp_des_p;"
    cursor.execute(truncate)
    #database connection
    connection.commit()
    connection.close()
    # print(array)

    #send keyword to json
    # return array
            


if __name__ == '__main__':
     
    while True:    
        autokeyword()
        
                

    


    
















