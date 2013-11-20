#!/bin/bash
# Sets up a custom wp-content directory
# $1 = Working directory
# $2 = Custom directory name (default is wp-content)

DIR="$1"
DIRNAME="$2"

# Default working directory to current path
if [ -z "$DIR" ]
	then DIR="."
fi

# Default directory name to wp-content
if [ -z "$DIRNAME" ]
	then DIRNAME="wp-content"
fi

# Create content directory
if [ ! -d "$DIR/$DIRNAME" ]
	then printf "Creating custom WordPress content directory...\n"
	mkdir "$DIR/$DIRNAME"
fi

# Create themes directory
if [ ! -d "$DIR/$DIRNAME/themes" ]
	then printf "Creating themes directory...\n"
	mkdir "$DIR/$DIRNAME/themes"
fi

# Create plugins directory
if [ ! -d "$DIR/$DIRNAME/plugins" ]
	then printf "Creating plugins directory...\n"
	mkdir "$DIR/$DIRNAME/plugins"
fi

# Create mu-plugins directory
if [ ! -d "$DIR/$DIRNAME/mu-plugins" ]
	then printf "Creating mu-plugins directory...\n"
	mkdir "$DIR/$DIRNAME/mu-plugins"
fi

# Create uploads directory
if [ ! -d "$DIR/$DIRNAME/uploads" ]
	then printf "Creating uploads directory...\n"
	mkdir "$DIR/$DIRNAME/uploads"
fi


echo '<?php // Silence is golden' > $DIR/$DIRNAME/index.php
echo '<?php // Silence is golden' > $DIR/$DIRNAME/themes/index.php 
echo '<?php // Silence is golden' > $DIR/$DIRNAME/plugins/index.php 
echo '<?php // Silence is golden' > $DIR/$DIRNAME/mu-plugins/index.php
echo '<?php // Silence is golden' > $DIR/$DIRNAME/uploads/index.php 
