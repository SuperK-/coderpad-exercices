#!/bin/bash

if [ -z "$1" ]; then
 echo "Usage: `basename $0` [URL]"
 exit
fi

output=`curl -s -G $1`
imageUrl=`echo "$output" | grep clubBadgeFallback | awk -F 'src="' ' { print $2 } ' | awk -F '"' ' { print $1 } '`

if [[ $imageUrl == //* ]]; then
 echo "https:"$imageUrl
else
 echo "No Image Found!"
fi
