from retry import retry
import json
import csv


@retry()

def main():
    with open('/var/www/html/totalog.json') as f:
        jsn = json.load(f)
        print(jsn["watersensor"])
        ondo = jsn["watersensor"];
        csv_obj = csv.reader(open("/var/www/html/waterlist.csv", "r"))
        data = [ v for v in csv_obj]
        print(data)
        print("====")
        print(ondo)
        with open("/var/www/html/waterlist.csv","a") as s:
            s.write((ondo) + "\n")
        s.close()
#    writer = csv.writer(open("/var/www/html/ondolist.csv", "a"), lineterminator='\n')
#    writer.writerow("ondo")
    f.close()

main()
