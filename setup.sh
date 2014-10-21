#!/bin/bash

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

if [ ! -d "$DIR/wp" ]; then
	svn co https://core.svn.wordpress.org/trunk wp
else
	cd "$DIR/wp"; svn up
fi
