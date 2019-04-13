# gateway v0.0.2
# 本次更新将第一代的红绿灯模块更新为了RGB模块
# 使用GPIO的PWM输出功能，同时控制三种颜色的输出

import time
import urllib2,json
import RPi.GPIO as GPIO

R,G,B = 8,12,10

GPIO.setmode(GPIO.BOARD)

GPIO.setup(R, GPIO.OUT)
GPIO.setup(B, GPIO.OUT)
GPIO.setup(G, GPIO.OUT)

pwmR = GPIO.PWM(R, 100)
pwmG = GPIO.PWM(G, 100)
pwmB = GPIO.PWM(B, 100)

pwmR.start(0)
pwmG.start(0)
pwmB.start(0)


while 1:
    results = urllib2.urlopen('http://47.104.28.167/api.json').read()
    valueR = json.loads(results)['R']
	valueG = json.loads(results)['G']
	valueB = json.loads(results)['B']
	pwmR.ChangeDutyCycle(valueR)
    pwmG.ChangeDutyCycle(valueG)
    pwmB.ChangeDutyCycle(valueB)