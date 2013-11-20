#!/bin/bash
# Fixup a WordPress install

DIR="$1"

if [ -z "$DIR" ]
	then DIR="."
fi

if [ -f "$DIR/readme.html" ]
	then printf "Removing the WordPress readme.html file...\n"
	rm $DIR/readme.html
fi

if [ -f "$DIR/license.txt" ]
	then printf "Removing the WordPress license.txt file...\n"
	rm $DIR/license.txt
fi

if [ -f "$DIR/wp-content/plugins/hello.php" ]
	then printf "Removing the WordPress 'Hello Dolly' plugin...\n"
	rm $DIR/wp-content/plugins/hello.php
fi

if [ -d "$DIR/wp-content/plugins/akismet" ]
	then printf "Removing the WordPress 'Akismet' plugin...\n"
	rm -r $DIR/wp-content/plugins/akismet
fi