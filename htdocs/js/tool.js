// maintain aspect ratio initalisation
YAHOO.util.Event.onContentReady('resize', function() {
   var oResize = document.getElementById('resize');
   var oAspectRatioLabel = document.createElement('label');
   var oAspectRatioCheckbox = document.createElement('input');
   
   oAspectRatioLabel.setAttribute('for', 'aspect-ratio');
   oAspectRatioLabel.appendChild(document.createTextNode(SPRITEGEN.locale.aspectRatio));
   oResize.appendChild(oAspectRatioLabel);
   
   oAspectRatioCheckbox.setAttribute('type', 'checkbox');
   oAspectRatioCheckbox.setAttribute('id', 'aspect-ratio');
   oAspectRatioCheckbox.setAttribute('name', 'aspect-ratio');
   oAspectRatioCheckbox.setAttribute('checked', SPRITEGEN.formFields.aspectRatio);
   oResize.appendChild(oAspectRatioCheckbox);
   
   function MaintainAspectRatio(e) {
      var oTarget = YAHOO.util.Event.getTarget(e);
      
      if (document.getElementById('aspect-ratio').checked) {
         if (oTarget.id == 'widthResize') {
            document.getElementById('heightResize').value = oTarget.value;
         } else {
            document.getElementById('widthResize').value = oTarget.value;
         }
      }
   }
   
   YAHOO.util.Event.addListener(['widthResize', 'heightResize'], 'keyup', MaintainAspectRatio);
});