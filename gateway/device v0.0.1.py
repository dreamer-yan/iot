import urllib2,json		#导入urllib2和json的包
import RPi.GPIO as GPIO	#导入GPIO的包

GPIO.setmode(GPIO.BOARD)	#设置GPIO的模式
GPIO.setup(36, GPIO.OUT)	#接LED红色引脚
GPIO.setup(38, GPIO.OUT)	#接LED黄色引脚
GPIO.setup(40, GPIO.OUT)	#接LED绿色引脚

while 1:
    results = urllib2.urlopen('http://47.104.28.167/api.json').read()		#读取网页内容
    status = json.loads(results)['led']		#
    if status == "red":
        GPIO.output(36, GPIO.HIGH)
        GPIO.output(38, GPIO.LOW)
        GPIO.output(40, GPIO.LOW)
    elif status == "yellow":
        GPIO.output(36, GPIO.LOW)
        GPIO.output(38, GPIO.HIGH)
        GPIO.output(40, GPIO.LOW)
    elif status == "green":
        GPIO.output(36, GPIO.LOW)
        GPIO.output(38, GPIO.LOW)
        GPIO.output(40, GPIO.HIGH)
    else:
        GPIO.output(36, GPIO.LOW)
        GPIO.output(38, GPIO.LOW)
        GPIO.output(40, GPIO.LOW)
