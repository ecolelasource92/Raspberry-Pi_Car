import RPi.GPIO as GPIO
from time import sleep

def MotorControl(Motor1A, Motor1B, Motor1E, Value) :

    GPIO.setmode(GPIO.BCM)
    GPIO.setup(Motor1A,GPIO.OUT)
    GPIO.setup(Motor1B,GPIO.OUT)
    GPIO.setup(Motor1E,GPIO.OUT)
    GPIO.setwarnings(False)
    pwm = GPIO.PWM(Motor1E,90)   
    pwm.start(10)
    
    if Value == "avant" :
        
        print ("marche avant")
        GPIO.output(Motor1A,GPIO.HIGH)
        GPIO.output(Motor1B,GPIO.LOW)
        GPIO.output(Motor1E,GPIO.HIGH)
        
    elif Value == "arrière" :
        
        print ("marche arrière)")
        GPIO.output(Moteur1A,GPIO.LOW)
        GPIO.output(Moteur1B,GPIO.HIGH)

    elif Value == "stop" :
        
        print ("arret")
        GPIO.output(Motor1E,GPIO.LOW)
        pwm.stop()    ## interruption du pwm
        GPIO.cleanup()

#Value = " "
#Value = input("avant ? arrière ? stop ?")
MotorControl(23, 24, 25, "stop")
sleep(10)
MotorControl(23, 24, 25, "avant")
sleep(10)
MotorControl(23, 24, 25, "stop")
sleep(10)
