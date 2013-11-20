#!/bin/bash
# Recurisvely sets file and directory permissions

DIR="$1"

if [ -z "$DIR" ]
	then DIR="."
fi

printf "Setting directory permissions to 755...\n"
find $DIR -type d -exec chmod 755 {} \;

printf "Setting file permissions to 644...\n"
find $DIR -type f -exec chmod 644 {} \;