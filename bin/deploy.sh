#!/bin/bash

# copy spritegen directory to new location
cp -R ../../spritegen ../../spritegen-deploy

# remove files specific to hosted copy
rm ../../spritegen-deploy/includes/text-link-ads.inc.php
rm ../../spritegen-deploy/htdocs/images/header.png
rm -fr ../../spritegen-deploy/cache/text-link-ads

# clear cache directories
rm ../../spritegen-deploy/cache/source-images/*
rm ../../spritgen-deploy/cache/sprites/*
rm ../../spritegen-deploy/cache/translations/*

# remove your language page
rm ../../spritegen-deploy/actions/your-language.php
rm ../../spritegen-deploy/templates/your-language.php

# overwrite live conf with example conf
mv ../../spritegen-deploy/includes/conf/example.inc.php ../includes/conf/live.inc.php

# remove deploy script
rm ../../spritegen-deploy/bin/deploy.sh

# create spritegen.tar.gz
tar cvf - ../../spritegen-deploy/ | gzip > spritegen.tar.gz