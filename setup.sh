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

# Install WordPress
if ! wp core is-installed; then
	wp core config --dbname=vip --dbuser=root
	wp db create
	wp core multisite-install --url=vip.dev --title="WordPress.com VIP" --admin_user=wordpress --admin_password=wordpress --admin_email=wordpress@wordpress.com
fi
