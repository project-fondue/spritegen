<?php
   /***************************************************************/
   /* Licensed under BSD License with the following exceptions:

      -----------------------------------------------------------------
      * Design elements (images, CSS) relating to the "Website Performance" 
        branding and web site remain copyright of Ed Eliot & 
        Stuart Colville and should not be used without written 
        permission.
      * If you host a copy of the tool publicly in a largely unaltered 
        form and with the same application name then you must add clear 
        notices to explain that it is a copy of the original and provide 
        a link back to our that original hosted version 
        at http://spritegen.website-performance.org/.
      ------------------------------------------------------------------

      Copyright (C) 2007-2008, Ed Eliot & Stuart Colville.
      All rights reserved.

      Redistribution and use in source and binary forms, with or without
      modification, are permitted provided that the following conditions are met:

         * Redistributions of source code must retain the above copyright
           notice, this list of conditions and the following disclaimer.
         * Redistributions in binary form must reproduce the above copyright
           notice, this list of conditions and the following disclaimer in the
           documentation and/or other materials provided with the distribution.
         * Neither the name of Ed Eliot & Stuart Colville nor the names of its contributors 
           may be used to endorse or promote products derived from this software 
           without specific prior written permission of Ed Eliot & Stuart Colville.

      THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDER AND CONTRIBUTORS "AS IS" AND ANY
      EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
      WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
      DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY
      DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
      (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
      LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
      ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
      (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
      SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
                                                                  */
   /***************************************************************/
   
   require('../includes/config.inc.php');
   
   // check parameters haven't been modified, checksum is used to prevent people guessing the URL to saved images
   if (
      isset($_GET['file']) && 
      preg_match("/^csg-[a-f0-9]+\.(gif|png|jpg)$/", $_GET['file']) && 
      isset($_GET['hash']) && md5($_GET['file'].CHECKSUM) == $_GET['hash']
   ) {
      $sFilename = SPRITE_DIR.$_GET['file'];
      
      // file may not exist as folder is cleaned up every 30 mins
      if (file_exists($sFilename)) {
         $aFileParts = pathinfo($sFilename);
      
         // set headers correctly so the user is prompted to download the generated image
         header("Content-type: image/{$aFileParts['extension']}");
         header("Content-Disposition: attachment; filename=\"{$aFileParts['basename']}\"");
         // output the generate image
         readfile($sFilename);
      } else {
         die('Sprite image no longer exists. Please re-upload your images through the tool.');
      }
   } else {
      die('Invalid parameters specified');
   }
?>