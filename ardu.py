import datetime
import json
import serial
import time
import schedule

def FAN():
    time.sleep(2)
    print("FANON")
    ser.write(str.encode('y'))
    time.sleep(600)
    print("FANOFF")
    ser.write(str.encode('n'))

def main():
    ser = serial.Serial('/dev/ttyACM0', 9600)

    time.sleep(2)
    t0 = time.time()
    ser.write(str.encode('y'))
    strs = ser.readline()
        # 読み込んだデータの表示
    val = (strs.decode())
          #          print(val)
    val3 = val.replace('*', '"')
    print(val3)

    strs = ser.readline()
        # 読み込んだデータの表示
    val = (strs.decode())
          #          print(val)
    val3 = val.replace('*', '"')
    print(val3)

    strs = ser.readline()
        # 読み込んだデータの表示
    val = (strs.decode())
          #          print(val)
    val3 = val.replace('*', '"')
    print(val3)
    ser.write(str.encode('n'))
#        data = open('/var/www/html/totalog.txt')
    while True: 
            time.sleep(5)
            dates = datetime.datetime.now()
            dateq = dates.strftime("%Y/%m/%d %H:%M:%S")
            if len(strs) == 0:
                dict = {
                    "arduino": "Empty",
                    "date": dateq
                }
            else:
                dict = {
                    "arduino": "OK",
                    "date": dateq
                }
            f = open("/var/www/html/chk.json", "w")
            emp = ''
            f.write(emp)
            json.dump(dict, f, ensure_ascii=False)
            f.close()

       #        with open('/var/www/html/totalog.txt' , 'r') as filer:
             # シリアル通信でデータを受信
            strs = ser.readline()
        # 読み込んだデータの表示
            val = (strs.decode())
          #          print(val)
            val3 = val.replace('*', '"')
            print(val3)
            #    val2 = ([line.replace('*', '"') for line in val])
            val3 = (val3.rstrip('}'))
            val3 = (val3.lstrip('{'))
        #    print([line.strip('\n') for line in filer])
            print("----writing----")
            with open('/var/www/html/totalog.json' , 'r+') as file:
                file.writelines("{" + val3)
            file.close()
if __name__ == '__main__':
    main()
    schedule.every().hour.do(FAN)
    while True:
        schedule.run_pending()
        time.sleep(1)
