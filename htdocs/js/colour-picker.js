/* TODO: Work out why the JS doesn't work in Safari */

// load required libraries
var oLoader = new YAHOO.util.YUILoader();

oLoader.require("colorpicker");
oLoader.skin = {
	defaultSkin: 'sam'
}

// callback function to run once loader has retrieved libraries
oLoader.insert(function() {
   // colour picker initalisation
   YAHOO.util.Event.onContentReady('bckground-container', function() {
      var oBckground = document.getElementById('bckground');
      
      // create show / hide button
      var oShowHide = document.createElement('input');
      oShowHide.setAttribute('type', 'button');
      oShowHide.setAttribute('id', 'show-hide');
      oShowHide.value = CSSSPRITEGEN.locale.showPicker;
      YAHOO.util.Dom.insertAfter(oShowHide, oBckground);

      YAHOO.util.Event.addListener(oShowHide, 'click', function() {
         var oBckgroundContainer = document.getElementById('bckground-container');
         
         // retieve base CSS styles for colour picker
         oLoader.insertCss('http://assets.website-performance.org/c/colour-picker.css');
   
         var oColourPicker = document.getElementById('colour-picker');
         var oShowHide = document.getElementById('show-hide');
   
         // have we already loaded the colour picker - this happens when the show / hide button is first clicked
         if (oColourPicker) {
            if (YAHOO.util.Dom.hasClass(oColourPicker, 'show')) {
               YAHOO.util.Dom.replaceClass(oColourPicker, 'show', 'hide');
               oShowHide.value = CSSSPRITEGEN.locale.showPicker;
            } else {
               YAHOO.util.Dom.replaceClass(oColourPicker, 'hide', 'show');
               oShowHide.value = CSSSPRITEGEN.locale.hidePicker;
            }
         } else {
            // first time the button is clicked - load colour picker
            var oColourPicker = document.createElement('div');
            oColourPicker.setAttribute('id', 'colour-picker');
            YAHOO.util.Dom.addClass(oColourPicker, 'show');
            oBckgroundContainer.appendChild(oColourPicker);
            oShowHide.value = CSSSPRITEGEN.locale.hidePicker;

            // create colour picker
         	var oColourPicker = new YAHOO.widget.ColorPicker("colour-picker", {
            	images: {
            		PICKER_THUMB: "http://assets.website-performance.org/i/picker_thumb.png",
            		HUE_THUMB: "http://assets.website-performance.org/i/hue_thumb.png"
            	}
            });
      
            // changes to the colour picker are reflected in the text box
            oColourPicker.on("rgbChange", function(o) {
            	oBckground.value = YAHOO.util.Color.rgb2hex(o.newValue[0], o.newValue[1], o.newValue[2]);
            });
            
            // changes to the text box are reflected in the colour picker
            YAHOO.util.Event.addListener('bckground', 'keyup', function(e) {
               var oBckground = YAHOO.util.Event.getTarget(e);
               if (oBckground.value.length == 6) {
                  oColourPicker.setValue(YAHOO.util.Color.hex2rgb(oBckground.value));
               }
            });
         }
         
         // set the colour picker default value to the value in the text box when opening
         if (typeof oColourPicker.setValue !== 'undefined' && oBckground.value.length == 6) {
            oColourPicker.setValue(YAHOO.util.Color.hex2rgb(oBckground.value));
         }
      });
   });
   
   // maintain aspect ratio initalisation
   YAHOO.util.Event.onAvailable('aspect-ratio', function() {
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
});