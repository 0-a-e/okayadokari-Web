import datetime
import json
import serial
import time
import schedule

def main():
    ser = serial.Serial('/dev/ttyACM0', 9600)
    time.sleep(2)
    t0 = time.time()
    ser.write(str.encode('y'))
    print("fan on by python.")
main()
