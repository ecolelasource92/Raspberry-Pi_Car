# import des bibliothèques
import RPi.GPIO as GPIO
import time
from time import sleep
# Configuration des Ports
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

DistMinAvant = 30
DistMinGauche = 15
DistMinDroite = 15
launch = 0



# Fonction pour le contrôle d'un moteur
def MotorControl(Motor1A, Motor1B, Value) :
    # Configuration des Ports
    GPIO.setmode(GPIO.BCM)
    GPIO.setup(Motor1A,GPIO.OUT)
    GPIO.setup(Motor1B,GPIO.OUT)
            
    if Value == "avant" :
        # sortie du courant vers le moteur, pour une rotation dans le sens des aiguilles d'une montre        
        GPIO.output(Motor1A,GPIO.HIGH)
        GPIO.output(Motor1B,GPIO.LOW)
        
        
    elif Value == "arrière" :
        # sortie du courant vers le moteur, pour une rotation dans le sens inverse des aiguilles d'une montre        
        GPIO.output(Motor1A,GPIO.LOW)
        GPIO.output(Motor1B,GPIO.HIGH)

    elif Value == "stop" :
                              
        GPIO.cleanup()
	# 	
    else :
        print ("erreur commande")



# Fonction de calcul de disatance pour un capteur   
def DistanceMesurement(TRIG, ECHO) :
    
    
    GPIO.setmode(GPIO.BCM)
    # Configuration des Ports
    GPIO.setup(TRIG, GPIO.OUT)
    GPIO.setup(ECHO, GPIO.IN)
        
    # Initialisation broche Trig
    GPIO.output(TRIG, False)
    #print ("Waiting For Sensor 1 To Settle")
    time.sleep(0.1)

    time.sleep(0.1)
    # Impulsion de 10 micro secondes
    GPIO.output(TRIG, True)
    time.sleep(0.00001)
    GPIO.output(TRIG, False)


    # Envoi impulsion et memorisation heure
    while GPIO.input(ECHO) == 0:
        pulse_start = time.time()
        
    
    # Attente reponse
    # memorisation heure
    while GPIO.input(ECHO) == 1:
        pulse_end = time.time()

        
    # Calcul de distance
    pulse_duration = pulse_end - pulse_start
    distance = pulse_duration * 17150
    distance = round(distance, 2)
    return (distance)

# Fonction pour le code autonome 
def autonomy():
    GPIO.setmode(GPIO.BCM)
    while True :
        # Configuration des Ports
        avant = DistanceMesurement(16, 21)
        gauche = DistanceMesurement( 17, 22)
        droite = DistanceMesurement( 5, 6)
		# Test conditionnels en fonction de la distance reçue par les capteurs
        			
        elif (avant > DistMinAvant) and (gauche > DistMinGauche) and (droite > DistMinDroite) :
            MotorControl(23, 24, "avant")
		    MotorControl(19, 26, "avant")
			print ("marche avant")
			
        elif (avant < DistMinAvant) and (gauche > droite) and (gauche > DistMinGauche) :
            MotorControl(23, 24, "arrière")
			print("virage à gauche")
            
        elif (avant < DistMinAvant) and (droite > gauche) and (droite > DistMinDroite) :
            MotorControl(19, 26, "arrière")
			print("virage à droite")
            
        elif (avant < DistMinAvant) and (gauche < DistMinGauche) and (droite < DistMinDroite) :
            MotorControl(23, 24, "stop")
            MotorControl(19, 26, "stop")
			print ("arrêt des moteurs")
			print ("opération manuelle requise")

# fonction main() qui permet de faire le lien entre toutes les fonctions
def main(gpioButton) :
    import RPi.GPIO as GPIO
    import time
    GPIO.setmode(GPIO.BCM)
    
    GPIO.setup(gpioButton, GPIO.IN, pull_up_down=GPIO.PUD_UP)
    
    while True:
        input_state = GPIO.input(gpioButton)
        if input_state == False:
            print ("button pressed")
            time.sleep(0.2)
            GPIO.cleanup()
            try :
                autonomy()
            except KeyboardInterrupt:
                GPIO.cleanup()
# Execution du code 
main(13)
