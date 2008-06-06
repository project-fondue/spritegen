// maintain aspect ratio initalisation
YAHOO.util.Event.onDOMReady(function() {
   
   // Preserve Aspect Ratio 
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
         if (oTarget.id == 'width-resize') {
            document.getElementById('height-resize').value = oTarget.value;
         } else {
            document.getElementById('width-resize').value = oTarget.value;
         }
      }
   }
   
   YAHOO.util.Event.addListener(['width-resize', 'height-resize'], 'keyup', MaintainAspectRatio);
   
   // Disable the imagequality for jpeg
   var qual = document.getElementById('image-quality');
   YAHOO.util.Event.addListener('image-output', 'change', function(){
       console.log(this);
       if (this.value == 'JPG'){
           qual.disabled="disabled";
       }else{
           qual.disabled="";
       }
   }, this);


});