#!/bin/bash
if [ -e "/home/pi/webfan.txt" ]; then
echo "uuparupa" | sudo -S python3 /home/pi/FAN.py
else
echo "uuparupa" | sudo -S python3 /home/pi/FANOFF.py
fi
