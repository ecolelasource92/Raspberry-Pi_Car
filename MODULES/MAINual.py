# import des bibliothèques
import RPi.GPIO as GPIO
import time
from time import sleep
# Configuration des Ports
GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

DistMinAvant = 60
DistMinGauche = 20
DistMinDroite = 20
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
        # controle des moteurs (moteurs.txt)
        fichier = open("/var/www/RaspberryPI/moteur/moteurs.txt", "r")
        control=fichier.read()
        fichier.close()
        # Configuration des Ports
        Capteuravant = DistanceMesurement(16, 21)
        Capteurgauche = DistanceMesurement( 17, 22)
        Capteurdroite = DistanceMesurement( 5, 6)
        
		# Test conditionnels en fonction de la distance reçue par les capteurs
        			
        if (control=="UP"):
            MotorControl(23, 24, "avant")
            MotorControl(19, 26, "avant")
            distances(Capteuravant,Capteurgauche,Capteurdroite)
            print ("marche avant")

        elif (control=="RIGHT"):
            MotorControl(23, 24, "stop")
            MotorControl(19, 26, "avant")
            distances(Capteuravant,Capteurgauche,Capteurdroite)
            print("virage à droite")

        elif (control=="LEFT"):
            MotorControl(19, 26, "stop")
            MotorControl(23, 24, "avant")
            distances(Capteuravant,Capteurgauche,Capteurdroite)
            print("virage à gauche")

        elif (control=="DOWN"):
            MotorControl(19, 26, "arrière")
            MotorControl(23, 24, "arrière")
            distances(Capteuravant,Capteurgauche,Capteurdroite)
            print("marche arrière")
            
        elif (control=="0"):
            MotorControl(23, 24, "stop")
            MotorControl(19, 26, "stop")
            distances(Capteuravant,Capteurgauche,Capteurdroite)
            print ("arrêt des moteurs")

#fonction distances() écriture des fichiers de distance sur le serveur web
def distances(Capteuravant,Capteurgauche,Capteurdroite):

    Capteuravant=str(Capteuravant)
    Capteurgauche=str(Capteurgauche)
    Capteurdroite=str(Capteurdroite)
    fichier = open("/var/www/RaspberryPI/capteurs/avant.txt", "w")
    fichier.write(Capteuravant)
    fichier.close()
    fichier = open("/var/www/RaspberryPI/capteurs/gauche.txt", "w")
    fichier.write(Capteurgauche)
    fichier.close()
    fichier = open("/var/www/RaspberryPI/capteurs/droite.txt", "w")
    fichier.write(Capteurdroite)
    fichier.close()

# fonction main() qui permet de faire le lien entre toutes les fonctions

try :
    autonomy()
except KeyboardInterrupt:
    GPIO.cleanup()

