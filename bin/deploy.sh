#!/bin/bash

# remove spritegen-deploy and spritegen.tar.gz if they already exist
rm -fr ../../spritegen-deploy
rm -fr ../../spritegen.tar.gz

# copy spritegen directory to new location
cp -R ../../spritegen ../../spritegen-deploy

# remove branding images
rm ../../spritegen-deploy/htdocs/images/header.png
rm ../../spritegen-deploy/htdocs/favicon.ico

# remove text ads
rm ../../spritegen-deploy/includes/text-ads.inc.php
rm -fr ../../spritegen-deploy/cache/text-link-ads

# clear cache directories
rm ../../spritegen-deploy/cache/source-images/*
rm ../../spritgen-deploy/cache/sprites/*
rm ../../spritegen-deploy/cache/translations/*

# remove your language page
rm ../../spritegen-deploy/actions/your-language.php
rm ../../spritegen-deploy/templates/your-language.php

# remove advertising page
rm ../../spritegen-deploy/actions/advertising.php
rm ../../spritegen-deploy/templates/advertising.php

# remove analytics
rm ../../spritegen-deploy/templates/analytics.php

# remove sidebar
rm ../../spritegen-deploy/templates/sidebar.php

# delete live.inc.conf
rm ../../spritegen-deploy/includes/conf/live.inc.php

# remove language pack
rm -fr ../../spritegen-deploy/htdocs/downloads

# remove future features
rm -fr ../../spritegen-deploy/future-features

# remove bzr directory
rm -fr ../../spritegen-deploy/.bzr

# remove deploy script
rm ../../spritegen-deploy/bin/deploy.sh

# create spritegen.tar.gz
tar cvf - ../../spritegen-deploy/ | gzip > ../../spritegen.tar.gz