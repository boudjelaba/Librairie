https://www.positronx.io/build-php-user-registration-signup-form-with-mysql/


# Librairie

```cpp
const byte led_pin = 8;
const byte interrupt_pin = 2;
volatile byte state = LOW;

void setup() {
  Serial.begin(9600);
  pinMode(led_pin,OUTPUT);
  attachInterrupt(digitalPinToInterrupt(interrupt_pin),interrupt_routine,RISING);
}

void loop() {
  if (state==HIGH){
    digitalWrite(led_pin,HIGH);
    delay(500);
    
  }
  if (state==HIGH) {
    Serial.println("low");
    state = LOW;
    digitalWrite(led_pin,LOW);
  }
}

void interrupt_routine(){
  state = HIGH;
  Serial.println("interrupt");
}
```

---
---

```cpp
#include <WiFi.h>
#include <HTTPClient.h>

#define CAPPIN 27
#define CAPTYPE LUM

const char* ssid     = "Wifi_Meteo";
const char* password = "CIEL12000#+";

const char* serverName = "http://ip_address/sensordata/post-esp-data.php";
 
String apiKeyValue = "tPmAT5Ab3j7F9";

String sensorName = "CLUMIERE";

void setup() {
  Serial.begin(115200);
  
  WiFi.begin(ssid, password);
  Serial.println("Connexion");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connecté au réseau WiFi avec adresse IP : ");
  Serial.println(WiFi.localIP());
}

void loop() {
  //Vérifier l'état de la connexion WiFi
  if(WiFi.status()== WL_CONNECTED){
    HTTPClient http;
    
    // Nom de domaine avec chemin URL ou adresse IP avec chemin
    http.begin(serverName);
    
    // Spécifier l'en-tête de type de contenu
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    int lumI = analogRead(CAPPIN);
    float lum = 5.0*lumI/4095.0;

    Serial.print("Lumière : ");
    Serial.print(lum);
    
    String httpRequestData = "api_key=" + apiKeyValue + "&sensor=" + sensorName
                              + "&value1=" + String(lum) + ""; 
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    
    int httpResponseCode = http.POST(httpRequestData);


  if (httpResponseCode>0) {
      Serial.print("Code de réponse HTTP : ");
      Serial.println(httpResponseCode);
    }
    else {
      Serial.print("Code erreur: ");
      Serial.println(httpResponseCode);
    }
    http.end();
  }
  else {
    Serial.println("Wi-Fi déconnecté");
  }
  delay(5000);  
}
```



---

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projetCIEL";

/*$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);*/

$api_key_value = "tPmAT5Ab3j7F9";

$api_key= $capteur = $lumiere = $date_heure = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $capteur = test_input($_POST["capteur"]);
        $lumiere = test_input($_POST["lumiere"]);
        
        // Connexion
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Echec de la Connexion : " . $conn->connect_error);
        } 
        
        $sql = "INSERT INTO mesures (capteur, lumiere)
        VALUES ('" . $capteur . "', '" . $lumiere . "')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Nouvel enregistrement créé avec succès";
        } 
        else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }
    else {
        echo "Mauvaise clé API fournie.";
    }

}
else {
    echo "Aucune donnée publiée avec HTTP POST.";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
```
