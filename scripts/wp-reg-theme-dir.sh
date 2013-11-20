#!/bin/bash
# Adds an mu-plugin file that registers themes from WordPress core when using a custom content directory.

DIR="$1"

if [ -z "$DIR" ]
	then DIR="."
fi

echo "<?php register_theme_directory( ABSPATH . 'wp-content/themes/' );" > $DIR/register-theme-directory.php