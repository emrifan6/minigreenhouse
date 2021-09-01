/*
  Mini_Greenhouse_02
  -penambahan buffer pembacaan nilai power (dibuat rata2 selama menunggu upload ke server)
  Mini_Greenhouse_04
  - memberi setting nilai max buff_id.
  - menambah blink.
  Mini_Greenhouse_05
  - Menghilangkan NTP
  - Menambah RTC

*/


#include <ESP8266WiFi.h>
#include <WiFiClientSecure.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>
#include <ArduinoJson.h>
#include "DHT.h"
#include "Wire.h"
#include "Adafruit_INA219.h"
#include <blinkSeq.h>
#include "RTClib.h"
#define LED_PIN D8
#define LED_ON_LOW 0

RTC_DS1307 rtc;

char namaHari[7][12] = {"Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"};



BlinkerSeq ledMonitor(LED_PIN, LED_ON_LOW); // blinking pin LED_PIN, shinking current (active low).

#define DHTTYPE DHT11   // DHT 11
#define DHTPIN D3  //in
#define DHTPIN01 D4 //out



int pump =  D5;


const int PIN_A = D6;
const int PIN_B = D7;

int data_fan = 0; // "0"
int data_mist = 0; // "0"
int data_pump = 0; // "0"
int data_code = 0; // "0"


float volt_batt, volt_solar, curr_solar, power_solar = 0.0;
float buff_volt_batt, buff_volt_solar, buff_curr_solar, buff_power_solar = 0.0;
unsigned int Fpower = 0;

/* Set these to your desired credentials. */
const char *ssid = "ElisaCom_Kos";  //ENTER YOUR WIFI SETTINGS
const char *password = "kosElisa12345";


//Web/Server address to read/write from
const char* host = "emrifan.xyz"; //Do not use http or https in front of host ink
const int httpsPort = 443;  //HTTPS= 443 and HTTP = 80
//SHA1 finger print of certificate use web browser to view and copy
const char fingerprint[] PROGMEM = "bddbfc02268f281a72d571a63673835a258cf47d";
String Link ;
String apiKeyValue = "muchamadrifan";

DHT dht(DHTPIN, DHTTYPE);
DHT dht01(DHTPIN01, DHTTYPE);
int temperature = 0;
int humidity = 0;
int temperatureout = 0;
int humidityout = 0;



String Link_get_control = "/greenhouse05/cek_last_control.php";

int pump_status = LOW;
int fan_status = LOW;
int mist_status = LOW;

bool siram_pagi = false;
bool siram_siang = false;


int limit_pump = 0;

unsigned long previousMillis = 0;
const long interval = 120000; //600000

int buzzer = D0;

Adafruit_INA219 ina219;

float shuntvoltage = 0;
float busvoltage = 0;
float current_mA = 0;
float loadvoltage = 0;
float power_mW = 0;


unsigned int buff_id = 0;

int buff_dht_temp;
int buff_dht_hum;
int buff_dht01_temp;
int buff_dht01_hum;
unsigned int buff_dhtid = 0;
unsigned int buff_dht01id = 0;

void setup() {
  Serial.begin(9600);
  Serial.println();
  Serial.println("I'm Wake Up");
  delay(1000);
  dht.begin();
  delay(1000);
  dht01.begin();
  delay(1000);
  while (!Serial) {
    Serial.print ( "." );
    delay(500);
  }
  connectwifi();
  delay(100);

  pinMode(pump, OUTPUT);
  pinMode(PIN_A, OUTPUT);
  pinMode(PIN_B, OUTPUT);

  digitalWrite(pump, LOW);
  digitalWrite(PIN_A, HIGH);
  digitalWrite(PIN_B, LOW);

  pinMode(buzzer, OUTPUT);

  if (! ina219.begin()) {
    Serial.println("Failed to find INA219 chip");
    while (1) {
      delay(10);
    }
  }

  if (! rtc.begin()) {
    Serial.println("RTC TIDAK TERBACA");
    while (1);
  }

  if (! rtc.isrunning()) {
    Serial.println("RTC is NOT running!");
    //    rtc.adjust(DateTime(F(__DATE__), F(__TIME__)));//update rtc dari waktu komputer
  }

  Serial.println("Run void loop()");

  ledMonitor.set(100, 200, 2, 2000); // on 100ms, off 200ms, 2 blink, delay 2000ms between 2 blink
  yield;
}


void loop() {
  DateTime now = rtc.now();
  unsigned long currentMillis = millis();
  print_time();
  read_power();
  cek_dht();
  delay(100);
  cek_dht01();
  delay(100);
  if (currentMillis - previousMillis >= interval) {
    previousMillis = currentMillis;
    Serial.println();
    Serial.println();
    Serial.println("***** SEND DATA !! *****");
    float v_batt = buff_volt_batt / buff_id;
    float v_solar = buff_volt_solar / buff_id;
    float c_solar = buff_curr_solar / buff_id;
    int dhttemp = buff_dht_temp / buff_dhtid;
    int dht01temp = buff_dht01_temp / buff_dht01id;
    int dhthum = buff_dht_hum / buff_dhtid;
    int dht01hum = buff_dht01_hum / buff_dht01id;
    senddata(0, dhttemp, dhthum, dht01temp, dht01hum, v_batt, v_solar, c_solar);
    buff_id = 0;
    buff_volt_batt = 0;
    buff_volt_solar = 0;
    buff_curr_solar = 0;
    buff_dhtid = 0;
    buff_dht01id = 0;
    buff_dht_temp = 0;
    buff_dht01_temp = 0;
    buff_dht_hum = 0;
    buff_dht01_hum = 0;
  }

  get_control_data();
  print_time();
  siram_pagi = (now.hour() == 7) && (now.minute() == 30);
  siram_siang = (now.hour() == 12) && (now.minute() < 1);
  update_control_status();
}


void cek_dht() {
  delay(100);
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  float f = dht.readTemperature(true);
  int x = 0;
  if (isnan(h) || isnan(t) || isnan(f)) {
    h = 0;
    t = 0;
    f = 0;
  }
  float hif = dht.computeHeatIndex(f, h);
  float hic = dht.computeHeatIndex(t, h, false);
  temperature = t;
  humidity = h;
  Serial.print("DHT IN-DOOR");
  Serial.print(F("Humidity: "));
  Serial.print(humidity);
  Serial.print(F("%  Temperature: "));
  Serial.print(temperature);
  Serial.print(F("°C "));
  Serial.print(f);
  Serial.print(F("°F  Heat index: "));
  Serial.print(hic);
  Serial.print(F("°C "));
  Serial.print(hif);
  Serial.println(F("°F"));
  buff_dht_temp = temperature + buff_dht_temp;
  buff_dht_hum = humidity + buff_dht_hum;
  buff_dhtid++;
}

  

void cek_dht01() {
  delay(100);
  float h = dht01.readHumidity();
  float t = dht01.readTemperature();
  float f = dht01.readTemperature(true);
  int x = 0;
  if (isnan(h) || isnan(t) || isnan(f)) {
    h = 0;
    t = 0;
    f = 0;
  }
  float hif = dht01.computeHeatIndex(f, h);
  float hic = dht01.computeHeatIndex(t, h, false);
  temperatureout = t;
  humidityout = h;
  Serial.print("DHT OUTDOOR");
  Serial.print(F("Humidity: "));
  Serial.print(humidityout);
  Serial.print(F("%  Temperature: "));
  Serial.print(temperatureout);
  Serial.print(F("°C "));
  Serial.print(f);
  Serial.print(F("°F  Heat index: "));
  Serial.print(hic);
  Serial.print(F("°C "));
  Serial.print(hif);
  Serial.println(F("°F"));
  buff_dht01_temp = temperatureout + buff_dht01_temp;
  buff_dht01_hum = humidityout + buff_dht01_hum;
  buff_dht01id++;
}

void print_time() {
  DateTime now = rtc.now();
  Serial.print(namaHari[now.dayOfTheWeek()]);
  Serial.print(',');
  Serial.print(now.day(), DEC);
  Serial.print('/');
  Serial.print(now.month(), DEC);
  Serial.print('/');
  Serial.print(now.year(), DEC);
  Serial.print(" ");
  Serial.print(now.hour(), DEC);
  Serial.print(':');
  Serial.print(now.minute(), DEC);
  Serial.print(':');
  Serial.print(now.second(), DEC);
  Serial.println();
}


void send_konfirmasi() {
  String text = "";
  if (siram_pagi) {
    text = "JAM-7";
  } else if (siram_siang) {
    text = "JAM-12";
  } else {
    text = "FROM-WEB";
  }
  Serial.println();
  Serial.println("**SEND KONFIRMASI**");
  WiFiClientSecure httpsClient;
  httpsClient.setFingerprint(fingerprint);
  httpsClient.setTimeout(1000); // 15 Seconds
  delay(1000);
  int r = 0; //retry counter
  while ((!httpsClient.connect(host, httpsPort)) && (r < 30)) {
    delay(100);
    Serial.print(".");
    r++;
  }
  if (r == 30) {
    Serial.println("Connection konfirmasi failed");
  }
  else {
    Serial.println("Connected to konfirmasi web");
  }
  Serial.print("KONFIRMASI URL =  ");
  Serial.print(host);
  String link_konfirmasi = "/greenhouse05/konfirmasi.php?api_key=" + apiKeyValue + "&code=" + data_code + "&text=" + text;
  Serial.println(link_konfirmasi);
  httpsClient.print(String("GET ") + link_konfirmasi + " HTTP/1.1\r\n" +
                    "Host: " + host + "\r\n" +
                    "Connection: close\r\n\r\n");
  Serial.println("Konfirmasi sent");
}


void update_control_status() {
  if (data_pump == 1 || siram_pagi || siram_siang) {
    send_konfirmasi();
    Serial.println();
    Serial.println("********WATERING TIME !!!********");
    Serial.print("data_pump = ");
    Serial.println(data_pump);
    Serial.print("siram_pagi = ");
    Serial.println(siram_pagi);
    Serial.print("siram_siang = ");
    Serial.println(siram_siang);
    buzz();
    pump_status = HIGH;
    digitalWrite(pump, pump_status);
    delay(30000);
    pump_status = LOW;
    digitalWrite(pump, pump_status);
  } else {
    Serial.println("STATUS PUMP ==== OFF");
    pump_status = LOW;
  }
  if (data_fan == 1) {
    fan_status = HIGH;
  } else {
    fan_status = LOW;
  }
  if (data_mist == 1) {
    mist_status = HIGH;
  } else {
    mist_status = LOW;
  }
}



void get_control_data() {
  //function kirim data
  Serial.println();
  Serial.println("****GET DATA****");
  WiFiClientSecure httpsClient;    //Declare object of class WiFiClient
  //  Serial.println(host);
  //  Serial.printf("Using fingerprint '%s'\n", fingerprint);
  httpsClient.setFingerprint(fingerprint);
  httpsClient.setTimeout(1000); // 15 Seconds
  delay(500);
  //  Serial.print("HTTPS Connecting");
  int r = 0; //retry counter
  while ((!httpsClient.connect(host, httpsPort)) && (r < 30)) {
    delay(100);
    Serial.print(".");
    r++;
  }
  if (r == 30) {
    Serial.println("Connection failed");
  }
  else {
    Serial.println("Connected to web");
  }
  Serial.print("requesting URL: ");
  Serial.print(host);
  Serial.println(Link_get_control);
  httpsClient.print(String("GET ") + Link_get_control + " HTTP/1.1\r\n" +
                    "Host: " + host + "\r\n" +
                    "Connection: close\r\n\r\n");
  while (httpsClient.connected()) {
    String line = httpsClient.readStringUntil('\n');
    if (line == "\r") {
      // Serial.println("headers received");
      break;
    }
  }
  Serial.println("CONTROL DATA WAS:");
  //Serial.println("==========");
  String line;
  while (httpsClient.available()) {
    line = httpsClient.readStringUntil('\n');  //Read Line by Line
    Serial.println(line); //Print response
    const size_t capacity = JSON_OBJECT_SIZE(3) + 40;
    DynamicJsonDocument doc(capacity);
    const char* json = "{\"fan\":\"0\",\"mist\":\"0\",\"pump\":\"0\",\"code\":\"0\"}";

    deserializeJson(doc, line);
    data_fan = doc["fan"]; // "0"
    data_mist = doc["mist"]; // "0"
    data_pump = doc["pump"]; // "0"
    data_code = doc["code"];
    Serial.print(" Fan = ");
    Serial.println(data_fan);
    Serial.print(" Mist = ");
    Serial.println(data_mist);
    Serial.print(" Pump = ");
    Serial.println(data_pump);
    Serial.print(" Code = ");
    Serial.println(data_code);
  }
  Serial.println("==========");
  Serial.println("closing connection");
}



void senddata(int x, int data_temperature, int data_humidity, int data_temperatureout, int data_humidityout, float vbatt, float vsolar, float csolar) { //

  String httpRequestData = "api_key=" + apiKeyValue + "&soil=" + 0 + "&temperature=" + data_temperature + "&humidity=" + data_humidity  + "&temperatureout=" + data_temperatureout
                           + "&humidityout=" + data_humidityout + "&volt_batt=" + vbatt + "&volt_solar=" + vsolar + "&curr_solar=" + csolar;
  Serial.print("httpRequestData: ");

  Link = "/greenhouse05/post-esp-data.php?" + httpRequestData; //
  Serial.print("Link = ");
  Serial.print(host);
  Serial.print(Link);
  postdata();
}

void postdata() { //function kirim data
  WiFiClientSecure httpsClient;    //Declare object of class WiFiClient
  //Serial.println(host);
  Serial.printf("Using fingerprint '%s'\n", fingerprint);
  httpsClient.setFingerprint(fingerprint);
  httpsClient.setTimeout(15000); // 15 Seconds
  delay(1000);
  Serial.print("HTTPS Connecting");
  int r = 0; //retry counter
  while ((!httpsClient.connect(host, httpsPort)) && (r < 30)) {
    delay(100);
    Serial.print(".");
    r++;
  }
  if (r == 30) {
    Serial.println("Connection failed");
  }
  else {
    Serial.println("Connected to web");
  }


  Serial.print("requesting URL: ");
  Serial.print(host);
  Serial.println(Link);

  httpsClient.print(String("GET ") + Link + " HTTP/1.1\r\n" +
                    "Host: " + host + "\r\n" +
                    "Connection: close\r\n\r\n");

  Serial.println("request sent");

  while (httpsClient.connected()) {
    String line = httpsClient.readStringUntil('\n');
    if (line == "\r") {
      Serial.println("headers received");
      break;
    }
  }

  Serial.println("reply was:");
  Serial.println("==========");
  String line;
  while (httpsClient.available()) {
    line = httpsClient.readStringUntil('\n');  //Read Line by Line
    Serial.println(line); //Print response
  }
  Serial.println("==========");
  Serial.println("closing connection");
}


void connectwifi(){ 
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //Only Station No AP, This line hides the viewing of ESP as wifi hotspot
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");
  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP
}


void gate (int pin) {
  if (pin == 0) {
    digitalWrite(PIN_A, LOW);
    digitalWrite(PIN_B, LOW);
  } else if (pin == 1) {
    digitalWrite(PIN_A, HIGH);
    digitalWrite(PIN_B, LOW);
  } else if (pin == 2) {
    digitalWrite(PIN_A, LOW);
    digitalWrite(PIN_B, HIGH);
  } else if (pin == 3) {
    digitalWrite(PIN_A, HIGH);
    digitalWrite(PIN_B, HIGH);
  } else if (pin == 4) {
    digitalWrite(PIN_A, LOW);
    digitalWrite(PIN_B, LOW);
  } else if (pin == 5) {
    digitalWrite(PIN_A, HIGH);
    digitalWrite(PIN_B, LOW);
  } else if (pin == 6) {
    digitalWrite(PIN_A, LOW);
    digitalWrite(PIN_B, HIGH);
  } else if (pin == 7) {
    digitalWrite(PIN_A, HIGH);
    digitalWrite(PIN_B, HIGH);
  } else {
  }
}



void read_power() {
  busvoltage = ina219.getBusVoltage_V();
  current_mA = ina219.getCurrent_mA() / 1000;
  volt_batt = read_adc(0) * 1.04;
  delay(100);
  buff_volt_batt = buff_volt_batt + volt_batt;
  buff_volt_solar = buff_volt_solar + busvoltage;
  buff_curr_solar = buff_curr_solar + current_mA;
  if (buff_id == 1000) {
    buff_volt_batt = buff_volt_batt / buff_id;
    buff_volt_solar = buff_volt_solar / buff_id;
    buff_curr_solar = buff_curr_solar / buff_id;
    buff_id = 1;
  }
  buff_id++;
  Serial.print("Busvoltage = ");
  Serial.println(busvoltage);
  Serial.print("Current = ");
  Serial.println(current_mA / 1000);
  Serial.print("Volt batt = ");
  Serial.println(volt_batt);
}

void buzz() {
  digitalWrite(buzzer, HIGH);
  delay(50);
  digitalWrite(buzzer, LOW);
  delay(50);
  digitalWrite(buzzer, HIGH);
  delay(50);
  digitalWrite(buzzer, LOW);
  digitalWrite(buzzer, HIGH);
  delay(200);
  digitalWrite(buzzer, LOW);
  delay(50);
  digitalWrite(buzzer, HIGH);
  delay(200);
  digitalWrite(buzzer, LOW);
}


float read_adc(int pin_gate) {
  gate(pin_gate);
  delay(100);
  int raw = 0;
  for (int i = 0; i < 10; i++) {
    int x = analogRead(A0);
    raw = raw + x;
  }
  raw = raw / 10;

  float voltage = 0.0;
  if ( pin_gate == 0) {
    voltage = (raw * (3.3 / 1023)) * 1.55;
  }
  return voltage;
}
