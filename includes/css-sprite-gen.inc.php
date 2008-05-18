<?php
   /***************************************************************/
   /* Software License Agreement (BSD License)

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
   
   class CssSpriteGen {
      protected $oGD;
      protected $aImageTypes = array();
      protected $aFormValues = array();
      protected $aFormErrors = array();
      protected $sZipFolder = '';
      protected $bTransparent;
      protected $sCss;
      protected $sTempSpriteName;
      protected $bValidImages;
      
      public function __construct() {
         $this->oGD = gd_info();
         
         if ($this->oGD['PNG Support']) {
            $this->aImageTypes[] = 'PNG';
         }
         if ($this->oGD['GIF Create Support']) {
            $this->aImageTypes[] = 'GIF';
         }
         if ($this->oGD['JPG Support']) {
            $this->aImageTypes[] = 'JPG';
         }
         
         if (!extension_loaded('gd')) {
            die('GD extension not loaded. This tool requires GD support.');
         }
      }
      
      public function GetImageTypes() {
         return $this->aImageTypes;
      }
      
      public function ProcessForm() {
         require('validation.inc.php');
         
         $aFieldsToIgnore = array(
            'path',
            'sub'
         );

         $aOptionalFields = array(
            'bckground',
            'tagspre',
            'classpre',
            'tagspost',
            'fileregex',
            'use-transparency'
         );

         $aRules = array(
            'voffset' => array('IsNumber'),
            'hoffset' => array('IsNumber'),
            'bckground' => array('IsHex'),
            'imageoutput' => array('IsImageType'),
            'widthResize' => array('IsNumber', 'IsPercent'),
            'heightResize' => array('IsNumber', 'IsPercent'),
            'ignore' => array('IsIgnoreOption'),
            'classpre' => array('IsClassPrefix'),
            'tagspre' => array('IsCss'),
            'tagspost' => array('IsCss')
         );
         
         $oValidation = new Validation($_POST, $aFieldsToIgnore, $aOptionalFields, $aRules);
         $this->aFormValues = $oValidation->GetFormValues();
         $this->aFormErrors = $oValidation->GetAllErrors();
         
         return $oValidation->FormOk();
      }
      
      public function ProcessFile() {
         if (
            isset($_FILES['path']['name']) && 
            substr($_FILES['path']['name'], strtolower(strlen($_FILES['path']['name']) - 4)) == '.zip'
         ) {
            if (!is_dir(UPLOAD_DIR)) {
               mkdir(UPLOAD_DIR);
            }
            
            $sFileMD5 = md5($_FILES['path']['name'].time());
            $sFolderMD5 = UPLOAD_DIR."$sFileMD5/";
            
            if (!is_dir($sFolderMD5)) {
               mkdir($sFolderMD5);
            }

            $sTempName = "{$sFolderMD5}tmp.zip";

            if (move_uploaded_file($_FILES['path']['tmp_name'], $sTempName)) {
               $this->UnZipFile($sTempName, $sFolderMD5);
               $this->sZipFolder = $sFileMD5;
               return $sFolderMD5;
            }
            return false;
         } elseif (
            !empty($_POST['zip-folder']) &&
            !empty($_POST['zip-folder-hash']) && 
            md5($_POST['zip-folder'].CHECKSUM) == $_POST['zip-folder-hash']
         ) {
            $this->sZipFolder = $_POST['zip-folder'];
            return UPLOAD_DIR."$this->sZipFolder/";
         }
         return false;
      }
      
      protected function UnZipFile($sFile, $sFolderMD5) {
         shell_exec(UNZIP_BINARY." -j $sFile -d $sFolderMD5");
         unlink($sFile);
      }
      
      public function CreateSprite($sFolderMD5) {
         $aFilesInfo = array();
         $aFilesMD5 = array();
         $bResize = false;
         $iColumnCount = 1;
         $iTotalHeight = $this->aFormValues['voffset'];
         $iMaxWidth = 0;
         $iMaxHeight = 0;
         $iMaxHOffset = 0;
         $aMaxColumnWidth = array();
         $i = 0;
         $bValidImages = false;
         
         $oDir = dir($sFolderMD5);
         
         while (false !== ($sFile = $oDir->read())) {
            $bResize = ($this->aFormValues['widthResize'] != 100 && $this->aFormValues['heightResize'] != 100);
            
            $sFilePath = $sFolderMD5.$sFile;
            $aPathParts = pathinfo($sFilePath);
            
            if (!empty($this->aFormValues['fileregex'])) {
               if (preg_match('/^'.$this->aFormValues['fileregex'].'$/i', $sFile, $aMatches)) {
                  $sFileClass = $aMatches[1];
               } else {
                  $sFileClass = '';
               }
            } else {
               $sFileClass = $aPathParts['basename'];
            }
            
            $sFileClass = $this->FormatClassName($sFileClass);
            
            if (
               !empty($sFileClass) && 
               isset($aPathParts['extension']) && 
               in_array(strtoupper($aPathParts['extension']), $this->aImageTypes) && 
               substr($sFile, 0, 1) != '.'
            ) {
               $sExtension = $aPathParts['extension'];
            
               $sFileMD5 = md5(file_get_contents($sFilePath));
               $sKey = array_search($sFileMD5, $aFilesMD5);
            
               if ($sKey !== false) {
                  if ($this->aFormValues['ignore'] == 'merge') {
                     if (isset($aFilesInfo[$sKey]['class'])) {
                        $aFilesInfo[$sKey]['class'] = $aFilesInfo[$sKey]['class'].$this->aFormValues['tagspost'].', '.$this->aFormValues['tagspre'].'.'.$this->aFormValues['classpre'].$sFileClass;
                        continue;
                     }
                  }
               }
            
               $aFilesMD5[$i] = $sFileMD5;
               $aFilesInfo[$i]['class'] = ".{$this->aFormValues['classpre']}$sFileClass";
            
               $aFilesInfo[$i]['path'] = $sFilePath;
               $aFilesInfo[$i]['ext'] = $sExtension;
               $aImageInfo = getimagesize($sFilePath);
               $iWidth = $aImageInfo[0];
               $iHeight = $aImageInfo[1];
               
               $iCurrentHeight = $iTotalHeight + $this->aFormValues['voffset'] + $iHeight;

               if ($iMaxHeight < $iCurrentHeight) {
                  $iMaxHeight = $iCurrentHeight;
               }
            
               $aFilesInfo[$i]['width'] = $bResize ? round(($iWidth / 100) * $this->aFormValues['widthResize']) : $iWidth;
               $aFilesInfo[$i]['height'] = $bResize ? round(($iHeight / 100) * $this->aFormValues['heightResize']) : $iHeight;
               
               if (($iTotalHeight + $this->aFormValues['voffset']) >= 2000) {
                  $iColumnCount++;
                  $iTotalHeight = $this->aFormValues['voffset'];
               }
            
               $aMaxColumnWidth[$iColumnCount] = $iMaxWidth;
               $iMaxHOffset = $this->aFormValues['hoffset'] * ($iColumnCount - 1);
            
               $aFilesInfo[$i]['y'] = $iTotalHeight;
               $iTotalHeight += ($aFilesInfo[$i]['height'] + $this->aFormValues['voffset']);
               $aFilesInfo[$i]['x'] = $iColumnCount == 1 ? 0 : ($this->aFormValues['hoffset'] * ($iColumnCount - 1) + (array_sum($aMaxColumnWidth) - $aMaxColumnWidth[$iColumnCount]));
               $aFilesInfo[$i]['currentCombinedHeight'] = $iTotalHeight;
               $aFilesInfo[$i]['columnNumber'] = $iColumnCount;
            
               if ($aFilesInfo[$i]['width'] > $iMaxWidth) {
                  $iMaxWidth = $aFilesInfo[$i]['width'];
               }
            
               $i++;
            }
         }
         
         $oDir->close();
         
         if ($i > 1) {
            $aHeight = array_keys($aFilesInfo, 'height');
            $iSpriteHeight = $iMaxHeight;
            $iSpriteWidth = array_sum($aMaxColumnWidth) + $iMaxHOffset;
         
            $sBgColour = str_replace('#', '', $this->aFormValues['bckground']);
            if (strlen($sBgColour) == 3) {
               $sBgColour = substr($sBgColour, 0, 1).substr($sBgColour, 0, 1).substr($sBgColour, 1, 1).substr($sBgColour, 1, 1).substr($sBgColour, 2, 1).substr($sBgColour, 2, 1);
            }
            $this->bTransparent = (!empty($this->aFormValues['use-transparency']) && in_array($this->aFormValues['imageoutput'], array('GIF', 'PNG')));
            
            if ($this->bTransparent && !empty($this->aFormValues['bckground'])) {
               $oSprite = imagecreate($iSpriteWidth, $iSpriteHeight);
            } else {
               $oSprite = imagecreatetruecolor($iSpriteWidth, $iSpriteHeight);
            }
            
            if ($this->bTransparent) {
               if (!empty($this->aFormValues['bckground'])) {
                  $iBgColour = hexdec($sBgColour);
                  $iBgColour = imagecolorallocate($oSprite, 0xFF & ($iBgColour >> 0x10), 0xFF & ($iBgColour >> 0x8), 0xFF & $iBgColour);
               } else {
                  $iBgColour = imagecolorallocate($oSprite, 0, 0, 0);
               }
               imagecolortransparent($oSprite, $iBgColour);
            } else {
               if (empty($sBgColour)) {
                  $sBgColour = 'ffffff';
               }
               $iBgColour = hexdec($sBgColour);
               $iBgColour = imagecolorallocate($oSprite, 0xFF & ($iBgColour >> 0x10), 0xFF & ($iBgColour >> 0x8), 0xFF & $iBgColour);
               imagefill($oSprite, 0, 0, $iBgColour);
            }
         
            $this->sCss = '';
         
            for ($i = 0; $i < count($aFilesInfo); $i++) {
               $oCurrentImage = $this->CreateImage($aFilesInfo[$i]['path'], $aFilesInfo[$i]['ext']);
            
               if ($bResize) {
                  $aImageInfo = getimagesize($sFilePath);
                  $iWidth = $aImageInfo[0];
                  $iHeight = $aImageInfo[1];
               
                  imagecopyresampled($oSprite, $oCurrentImage, $aFilesInfo[$i]['x'], $aFilesInfo[$i]['y'], 0, 0, $aFilesInfo[$i]['width'], $aFilesInfo[$i]['height'], $iWidth, $iHeight);
               } else {
                  imagecopy($oSprite, $oCurrentImage, $aFilesInfo[$i]['x'], $aFilesInfo[$i]['y'], 0, 0, $aFilesInfo[$i]['width'],  $aFilesInfo[$i]['height']);
               }
            
               $iX = $aFilesInfo[$i]['x'] != 0 ? '-'.$aFilesInfo[$i]['x'].'px' : '0';
               $iY = $aFilesInfo[$i]['y'] != 0 ? '-'.$aFilesInfo[$i]['y'].'px' : '0';
            
               $this->sCss .= "{$this->aFormValues['tagspre']}{$aFilesInfo[$i]['class']} {$this->aFormValues['tagspost']}{ background-position: $iX $iY; } \n";
            
               imagedestroy($oCurrentImage);
            }
         
            if (!is_dir(SPRITE_DIR)) {
               mkdir(SPRITE_DIR);
            }
         
            $sOutputFormat = strtolower($this->aFormValues['imageoutput']);
            $this->sTempSpriteName = SPRITE_DIR.uniqid('csg-').".$sOutputFormat";
            $this->WriteImage($oSprite, $sOutputFormat, $this->sTempSpriteName);
            imagedestroy($oSprite);
            
            $this->bValidImages = true;
         }
      }
      
      protected function FormatClassName($sClassName) {
         return str_ireplace($this->aImageTypes, '', preg_replace("/[^a-z0-9_-]+/i", '', $sClassName));
      }
      
      protected function CreateImage($sFile, $sExtension) {
         switch ($sExtension) {
            case 'jpg':
            case 'jpeg':
               return @imagecreatefromjpeg($sFile);
            case 'gif':
               return @imagecreatefromgif($sFile);
            case 'png':
               return @imagecreatefrompng($sFile);
         }
      }
      
      protected function WriteImage($oImage, $sExtension, $sFilename) {
         switch ($sExtension) {
            case 'jpg': 
            case 'jpeg':
               imagejpeg($oImage, $sFilename);
               break;
            case 'gif':
               if ($this->bTransparent) {
                  imagetruecolortopalette($oImage, true, 256);
               }
               imagegif($oImage, $sFilename);
               break;
            case 'png':
               imagepng($oImage, $sFilename);
               break;
            }
      }
      
      public function ValidImages() {
         return $this->bValidImages;
      }
      
      public function GetSpriteFilename() {
         $aFileParts = pathinfo($this->sTempSpriteName);
         return $aFileParts['basename'];
      }
      
      public function GetSpriteHash() {
         return md5($this->GetSpriteFilename().CHECKSUM);
      }
      
      public function GetCss() {
         return $this->sCss;
      }
      
      public function GetAllErrors() {
         return $this->aFormErrors;
      }
      
      public function GetZipFolder() {
         return $this->sZipFolder;
      }
      
      public function GetZipFolderHash() {
         return md5($this->sZipFolder.CHECKSUM);
      }
   }
?>