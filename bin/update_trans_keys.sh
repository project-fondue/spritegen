#!/usr/bin/env python
# -*- coding: utf-8 -*-

"""Script to update the trans file with new keys from the en translation."""
import os
import re
import sys
import glob
import codecs

TRANS_PATH = os.path.realpath(os.path.join(os.path.dirname(__file__), "../translations"))
EN_PATH = "%s/en.txt" % TRANS_PATH


def get_translations(path):
    """Get the keys/values in the en file"""
    trans = {}
    fh = open(path)
    for line in fh:
        match = re.search(r"""^\s*([0-9a-z._-]+)\s*=\s*((?:\\#|[^#])*).*$""", line, re.I)
        if match and match.group(1) and match.group(2):
            trans[match.group(1).strip()] = match.group(2).strip().replace("\#", "#")

    return trans

en_trans = get_translations(EN_PATH) 

#Loop through all non-en files and check for missing keys.
for filepath in glob.glob("%s/*" % TRANS_PATH):
    # Remove BOM
    os.system("sed -i 's/^\xEF\xBB\xBF//' %s"  % filepath)

    if filepath != EN_PATH:
        lang_trans = get_translations(filepath)
        missing =  set(en_trans.keys()) - set(lang_trans.keys())
        missing = list(missing)
        if missing:
            print "Processing %s" % os.path.basename(filepath)
            #Add missing keys
            lfh = open(filepath, "a")
            # Ensure file ends with \n
            lfh.write("\n")
            for missing_key in missing:
                missing_trans =  "%s = %s" % (missing_key, en_trans.get(missing_key))
                print "Adding missing trans: %s" % missing_trans
                lfh.write("%s\n" % missing_trans.strip())
            lfh.close()


    # Sort file alphabetically in place
    os.system("sort %s -o %s" % (filepath, filepath))

    # Delete all blank lines
    os.system('sed -i "/^$/d" %s' % filepath)

