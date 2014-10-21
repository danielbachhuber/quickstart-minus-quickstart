#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# WordPress core
if [ ! -d "$DIR/wp" ]; then
	svn co https://core.svn.wordpress.org/trunk wp
else
	cd "$DIR/wp"; svn up
fi

# VIP plugins
if [ ! -d "$DIR/wp-content/themes/vip/plugins" ]; then
	mkdir -p "$DIR/wp-content/themes/vip"
	svn co https://vip-svn.wordpress.com/plugins wp-content/themes/vip/plugins
else
	cd "$DIR/wp-content/themes/vip/plugins"; svn up
fi
