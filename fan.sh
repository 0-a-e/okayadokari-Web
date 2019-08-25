#!/bin/bash
if [ -e "/home/pi/webfan.txt" ]; then
echo "hoge" | sudo -S python3 /home/pi/FAN.py
else
echo "hoge" | sudo -S python3 /home/pi/FANOFF.py
fi
