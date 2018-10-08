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
	wp db create
	wp core multisite-install --url=vip.test --title="WordPress.com VIP" --admin_user=wordpress --admin_password=wordpress --admin_email=wordpress@wordpress.com
fi

# Install the plugin pile
wp plugin install --activate-network mrss user-switching debug-bar debug-bar-remote-requests debug-bar-extender debug-bar-console debug-bar-slow-actions debug-bar-query-count-alert wordpress-importer rewrite-rules-inspector

# Jetpack!
if [ ! -d "$DIR/wp-content/plugins/jetpack" ]; then
	git clone git@github.com:Automattic/jetpack.git "$DIR/wp-content/plugins/jetpack"
	wp plugin activate jetpack --network
else
	cd "$DIR/wp-content/plugins/jetpack"; git pull origin master
fi

# Configure a dedicated Nginx record
sudo cp "$DIR/config/vip-nginx-conf" "/etc/nginx/sites-enabled/0-vip"
sudo service nginx restart
