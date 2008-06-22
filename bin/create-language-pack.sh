#!/bin/bash

SCRIPTDIR=`dirname $0`
LANG=$1

if [ $# -eq 0 ]; then
	zip ${SCRIPTDIR}/../htdocs/downloads/language-pack-en.zip \
		${SCRIPTDIR}/../translations/en.txt \
		${SCRIPTDIR}/../templates/what-are-css-sprites.php \
		${SCRIPTDIR}/../templates/tool-help.php \
		${SCRIPTDIR}/../templates/your-language.php
else
	zip ${SCRIPTDIR}/../htdocs/downloads/language-pack-${LANG}.zip \
		${SCRIPTDIR}/../translations/${LANG}.txt \
		${SCRIPTDIR}/../templates/locales/${LANG}/what-are-css-sprites.php \
		${SCRIPTDIR}/../templates/locales/${LANG}/tool-help.php \
		${SCRIPTDIR}/../templates/locales/${LANG}/your-language.php
fi