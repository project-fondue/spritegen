// maintain aspect ratio initalisation
YAHOO.util.Event.onDOMReady(function() {
   
   // preserve aspect ratio 
   var oResize = document.getElementById('resize');
   var oAspectRatioLabel = document.createElement('label');
   var oAspectRatioCheckbox = document.createElement('input');
   
   oAspectRatioLabel.setAttribute('for', 'aspect-ratio');
   oAspectRatioLabel.innerHTML = SPRITEGEN.locale.aspectRatio;
   oResize.appendChild(oAspectRatioLabel);
   
   oAspectRatioCheckbox.setAttribute('type', 'checkbox');
   oAspectRatioCheckbox.setAttribute('id', 'aspect-ratio');
   oAspectRatioCheckbox.setAttribute('name', 'aspect-ratio');
   oAspectRatioCheckbox.setAttribute('checked', SPRITEGEN.formFields.aspectRatio);
   oResize.appendChild(oAspectRatioCheckbox);
   
   function MaintainAspectRatio(e) {
      var oTarget = YAHOO.util.Event.getTarget(e);
      
      if (document.getElementById('aspect-ratio').checked) {
         if (oTarget.id == 'width-resize') {
            document.getElementById('height-resize').value = oTarget.value;
         } else {
            document.getElementById('width-resize').value = oTarget.value;
         }
      }
   }
   
   if (window.ActiveXObject){
       var bod = document.getElementsByTagName('body')[0];
       YAHOO.util.Dom.addClass(bod, 'ie_redraw_fix-name');
   }
   
   YAHOO.util.Event.addListener(['width-resize', 'height-resize'], 'keyup', MaintainAspectRatio);
   
   // disable the number of colours select for jpeg images
   // disable quality select for gifs and pngs
   var oOutput = document.getElementById('image-output');
   var oNumColours = document.getElementById('image-num-colours');
   var oQuality = document.getElementById('image-quality');
   var oOptiPng = document.getElementById('use-optipng');
   
   function DisableFields() {
      if (oOutput.value == 'JPG') {
           oNumColours.disabled = 'disabled';
           oQuality.disabled = '';
       } else {
           oNumColours.disabled = '';
           oQuality.disabled  = 'disabled';
       }
       
       if (oOutput.value == 'PNG') {
          oOptiPng.disabled = '';
       } else {
          oOptiPng.checked = '';
          oOptiPng.disabled = 'disabled';
       }
   }
   
   YAHOO.util.Event.addListener(oOutput, 'change', DisableFields);
   DisableFields();
});