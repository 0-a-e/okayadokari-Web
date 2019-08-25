#include <Servo.h>
#include "DHT.h"
const int PIN_DHT = 8;
int angle;
int melo = 300;
int pin = 6;
int dqata;
Servo myServo;
DHT dht( PIN_DHT, DHT11 );
// pin definition for the Uno
#define P_a 6
#define P_b 7
#define P_c 13
#define P_d 10
#define P_e 11
#define P_f 9
#define P_g 8
#define P_dp 12

char charA_out[80];

void setup() {
  //
  Serial.begin(9600);
  //pinMode(BUZZER,OUTPUT);
  //  pinMode(P_a,OUTPUT);
  //  pinMode(P_b,OUTPUT);
  //  pinMode(P_c,OUTPUT);
  //  pinMode(P_d,OUTPUT);
  //  pinMode(P_e,OUTPUT);
  // pinMode(P_f,OUTPUT);
  // pinMode(P_g,OUTPUT);
  // pinMode(P_dp,OUTPUT);
  pinMode(13, OUTPUT);
  pinMode(12, OUTPUT);
  pinMode(11, OUTPUT);
  pinMode(5, OUTPUT);
  pinMode(6, OUTPUT);
  pinMode(5, OUTPUT);
  pinMode(7, OUTPUT);
  pinMode(8, OUTPUT);
  pinMode(2, OUTPUT);
  pinMode(3, OUTPUT);
  pinMode(4, OUTPUT);


  // Serial.println("DHT11");
  dht.begin();
  myServo.attach(5);
  myServo.write(100);
}
//void loop() {
// int sensorValue;
//  sensorValue = analogRead(A0);
//  Serial.print("sensor = ");
//  Serial.println(sensorValue);
//  delay(10);
//}
void loop() {

  dqata = Serial.read();
  if (dqata != -1 ) {
    //debug ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Serial.write(dqata);
    //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    if (dqata == 'y' ) {
      myServo.write(10);
      Serial.println("ON");
    } else if (dqata == 'n' ) {
      myServo.write(100);
      Serial.println("OFF");
    } else {
      }
  } else {
    Serial.print("{");
    bool isFahrenheit = true;
    float percentHumidity = dht.readHumidity();
    float temperature = dht.readTemperature();

    int temp = 800;
    if (temperature > 1000) {
      temp = 0;
      //    Serial.println(sensorValue);
    } else if (temperature > 27) {
      temp = 4;
      //heatOK
      //    digitalWrite(2, HIGH);
      //   delay(1000);
      //   digitalWrite(2, LOW);
    } else if (temperature > 25) {
      temp = 3;
      // warning
      //    digitalWrite(3, HIGH);
      //    delay(1000);
      //    digitalWrite(3, LOW);
    } else if (temperature > 22) {
      tone(pin, 330, melo) ;
      delay(melo) ;
      tone(pin, 262, melo) ;
      delay(melo) ;
      temp = 2;
      //OUT
      //   digitalWrite(4, HIGH);
      //    delay(1000);
      //   digitalWrite(4, LOW);
    } else {
      tone(pin, 330, melo) ;
      delay(melo) ;
      tone(pin, 262, melo) ;
      delay(melo) ;
      temp = 0;
      // digitalWrite(4, HIGH);
      //  delay(1000);
      // digitalWrite(4, LOW);
    }
    Serial.print("*temp*: *");
    Serial.print(temp);
    Serial.print("*, ");
    //}
    int Hu = 800;
    if (percentHumidity > 1000) {
      Hu = 0;
      //    Serial.println(sensorValue);
    } else if (percentHumidity > 80) {
      Hu = 4;
      //heatOK
      digitalWrite(2, HIGH);
      delay(1000);
      digitalWrite(2, LOW);
    } else if (percentHumidity > 60) {
      Hu = 3;
      // warning
      digitalWrite(3, HIGH);
      delay(1000);
      digitalWrite(3, LOW);
    } else if (percentHumidity > 40) {
      Hu = 2;
      //OUT
      tone(pin, 330, melo) ;
      delay(melo) ;
      tone(pin, 262, melo) ;
      delay(melo) ;
      digitalWrite(4, HIGH);
      delay(1000);
      digitalWrite(4, LOW);
    } else {
      Hu = 0;
      tone(pin, 330, melo) ;
      delay(melo) ;
      tone(pin, 262, melo) ;
      delay(melo) ;
      digitalWrite(4, HIGH);
      delay(1000);
      digitalWrite(4, LOW);
    }

    Serial.print("*situdo*: *");
    Serial.print(Hu);
    Serial.print("*, ");

    if (isnan(percentHumidity) || isnan(temperature)) {
      Serial.println("ERROR");
      return;
    }

    //  float heatIndex = dht.computeHeatIndex(
    //                    temperature,
    //                  percentHumidity,
    //                isFahrenheit);

    Serial.print ("*Temprature*: *");
    Serial.print (temperature);
    Serial.print("*, ");
    Serial.print("*Humidity*: *");
    Serial.print(percentHumidity);
    Serial.print("*, ");
    // s += "HI: ";
    //  s += String(heatIndex, 1);
    int sedr;
    sedr = analogRead(A0);
    int sensorValue;
    sensorValue = analogRead(A0);
    Serial.print("*watersensor*: *");
    Serial.print(sensorValue);
    Serial.print("*, ");
    delay(10);

    if (sensorValue > 1000) {
      sedr = 10;
      Serial.println(sensorValue);
    } else if (sensorValue > 500) {
      sedr = 4;
      digitalWrite(13, HIGH);
      delay(1000);
      digitalWrite(13, LOW);
    } else if (sensorValue > 300) {
      sedr = 3;
      digitalWrite(12, HIGH);
      delay(1000);
      digitalWrite(12, LOW);
    } else if (sensorValue > 50) {
      sedr = 2;
      tone(pin, 330, melo) ;
      delay(melo) ;
      tone(pin, 262, melo) ;
      delay(melo) ;
      digitalWrite(11, HIGH);
      delay(1000);
      digitalWrite(11, LOW);
    } else {
      sedr = 0;
      tone(pin, 330, melo) ;
      delay(melo) ;
      tone(pin, 262, melo) ;
      delay(melo) ;
      digitalWrite(11, HIGH);
      delay(1000);
      digitalWrite(11, LOW);
    }
    Serial.print("*water*: *");
    Serial.print(sedr);
    Serial.print("*");
    Serial.println(" }");
  }
}
