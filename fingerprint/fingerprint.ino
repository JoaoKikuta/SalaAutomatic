#include <Adafruit_Fingerprint.h>
#include <SoftwareSerial.h>
#include <UIPEthernet.h>


byte mac[] = { 0x00, 0xe0, 0x4c, 0x40, 0x01, 0x98 };                                      
EthernetClient client;
char server[] = "192.168.0.105"; 



int getFingerprintIDez();
int id = -1;
int estado = -1;
SoftwareSerial mySerial(6, 7);
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);



void setup()  {  
  
  Serial.begin(9600);
  Ethernet.begin(mac);
  finger.begin(57600);
    Serial.print("IP Address        : ");
    Serial.println(Ethernet.localIP());
    Serial.print("Subnet Mask       : ");
    Serial.println(Ethernet.subnetMask());
    Serial.print("Default Gateway IP: ");
    Serial.println(Ethernet.gatewayIP());
    Serial.print("DNS Server IP     : ");
    Serial.println(Ethernet.dnsServerIP());        
  
   
  
  
  
    
           
           
 
    
    

  pinMode(8, OUTPUT);
  digitalWrite(8, LOW);
}

void loop()                   
{

  id = getFingerprintIDez();
  delay(100);  
  if (estado < 0){
    
       
         if(id >= 0){
              estado = id;
              
              digitalWrite(8, HIGH);
              client.connect(server, 80);
              client.print( "GET /teste/testeinsere.php?");
              client.print("nome=");
              client.print( "android1" );
              client.print("&");
              client.print("id=");
              client.print( id);
              client.println( " HTTP/1.1");
              client.print( "Host: " );
              client.println(server);
              
              client.println( "Connection: close" );
              client.println();
              client.println();
              client.stop();
              delay(5000);
              
              
            
         }

  }else{
     
        if(id == estado){
              estado = -1;
              digitalWrite(8, LOW);
              client.connect(server, 80);
              client.print( "GET /teste/testeinsere.php?");
              client.print("nome=");
              client.print( "android1" );
              client.print("&");
              client.print("id=");
              client.print( id);
              client.println( " HTTP/1.1");
              client.print( "Host: " );
              client.println(server);
            
              client.println( "Connection: close" );
              client.println();
              client.println();
              client.stop();
              delay(5000); 
              
              
        }else if(id>=0){
              estado = id;
              client.connect(server, 80);
              client.print( "GET /teste/testeinsere.php?");
              client.print("nome=");
              client.print( "android1" );
              client.print("&");
              client.print("id=");
              client.print( id);
              client.println( " HTTP/1.1");
              client.print( "Host: " );
              client.println(server);
           
              client.println( "Connection: close" );
              client.println();
              client.println();
              client.stop();
              delay(5000);
        }
    
  }
          
}

uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Imagem Capturada");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("Dedo nao Localizado");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro ao se comunicar");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Erro ao Capturar");
      return p;
    default:
      Serial.println("Erro desconhecido");
      return p;
  }

  p = finger.image2Tz();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Imagem Convertida");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Imagem muito confusa");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Erro ao se comunicar");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Impossivel localizar Digital");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Impossivel Localizar Digital");
      return p;
    default:
      Serial.println("Erro Desconhecido");
      return p;
  }
  
  p = finger.fingerFastSearch();
  if (p == FINGERPRINT_OK) {
    Serial.println("Digital Encontrada");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Erro ao se comunicar");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println("Digital Desconhecida");
    return p;
  } else {
    Serial.println("Erro Desconhecido");
    return p;
  }   
  
  Serial.print("ID # Encontrado"); 
  Serial.print(finger.fingerID); 
  Serial.print(" com precisao de "); 
  Serial.println(finger.confidence); 
}

int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK)  return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK)  return -1;
  
  
 
  Serial.print("ID # Encontrado"); 
  Serial.print(finger.fingerID); 
  Serial.print(" com precisao de "); 
  Serial.println(finger.confidence);
  return finger.fingerID; 
}
