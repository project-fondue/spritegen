#!/bin/bash

# remove files specific to hosted copy
rm -fr ../master
rm ../htdocs/images/header.png
rm -fr ../cache/text-link-ads

# clear cache directories
rm ../cache/source-images/*
rm ../cache/sprites/*
rm ../cache/translations/*

# remove your language page
rm ../actions/your-language.php
rm ../templates/your-language.php

# overwrite live conf with example conf
mv ../includes/conf/example.inc.php ../includes/conf/live.inc.php

# remove deploy script
rm -fr ../deploy

# create spritegen.tar.gz
tar cvf - ../../spritegen/ | gzip > spritegen.tar.gz