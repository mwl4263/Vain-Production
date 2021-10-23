#!/bin/bash


type -P python3 >/dev/null 2>&1 && echo "Python 3 is installed"

pip3 install -r requirements.txt
echo ""
echo "Please run the following command in this directory:"
echo ""

echo "python3 dataTransfer.py vainstart.tsv"
echo ""
echo "(NOTE) vain.tsv is the complete data set that still needs to be sanitized"
echo "(NOTE) vainstart.tsv is missing data!"
