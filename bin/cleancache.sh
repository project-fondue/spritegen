#!/usr/bin/env bash
SCRIPTDIR=`dirname $0`      
find ${SCRIPTDIR}/../cache/{source-images,sprites}  -mindepth 1 -cmin +30 -print0 | xargs -0 rm -fr