#!/bin/bash

SCRIPTDIR=`dirname $0`

# remove spritegen-deploy and spritegen.tar.gz if they already exist
rm -fr ${SCRIPTDIR}/../../spritegen-deploy
rm -fr ${SCRIPTDIR}/../../spritegen.tar.gz

# copy spritegen directory to new location
cp -R ${SCRIPTDIR}/../../spritegen ../../spritegen-deploy

# remove branding images
rm ${SCRIPTDIR}/../../spritegen-deploy/htdocs/images/header.png
rm ${SCRIPTDIR}/../../spritegen-deploy/htdocs/favicon.ico

# remove text ads
rm ${SCRIPTDIR}/../../spritegen-deploy/includes/text-ads.inc.php
rm -fr ${SCRIPTDIR}/../../spritegen-deploy/cache/text-link-ads

# clear cache directories
rm ${SCRIPTDIR}/../../spritegen-deploy/cache/source-images/*
rm ${SCRIPTDIR}/../../spritgen-deploy/cache/sprites/*
rm ${SCRIPTDIR}/../../spritegen-deploy/cache/translations/*

# remove your language page
rm ${SCRIPTDIR}/../../spritegen-deploy/views/your-language.php
rm ${SCRIPTDIR}/../../spritegen-deploy/templates/your-language.php

# remove advertising page
rm ${SCRIPTDIR}/../../spritegen-deploy/views/advertising.php
rm ${SCRIPTDIR}/../../spritegen-deploy/templates/advertising.php

# remove analytics
rm ${SCRIPTDIR}/../../spritegen-deploy/templates/analytics.php

# remove sidebar
rm ${SCRIPTDIR}/../../spritegen-deploy/templates/sidebar.php

# delete live.inc.conf
rm ${SCRIPTDIR}/../../spritegen-deploy/includes/conf/live.inc.php

# remove language pack
rm -fr ${SCRIPTDIR}/../../spritegen-deploy/htdocs/downloads

# remove future features
rm -fr ${SCRIPTDIR}/../../spritegen-deploy/future-features

# remove bzr directory
rm -fr ${SCRIPTDIR}/../../spritegen-deploy/.bzr

# remove language pack script
rm ${SCRIPTDIR}/../../spritegen-deploy/bin/create-language-pack.sh

# remove deploy script
rm ${SCRIPTDIR}/../../spritegen-deploy/bin/deploy.sh

# create spritegen.tar.gz
tar cvf - ${SCRIPTDIR}/../../spritegen-deploy/ | gzip > ${SCRIPTDIR}/../../spritegen.tar.gz