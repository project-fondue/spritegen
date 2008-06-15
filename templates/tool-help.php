<p>This tool allows you to automate the process of generating CSS sprites. Simply give it a ZIP file containing 2 or more images (GIF, PNG or JPG) and it will generate a sprite image and the corresponding CSS rules to target and display each component image.</p>
<h2>Options</h2>
<p>The tool has a number of options you can configure to modify characteristics of the generated sprite image and CSS to better match the specifics of your site set up. These options are detailed below:</p>
<h3>Resize Source Images</h3>
<dl>
   <dt>Width &amp; Height</dt>
   <dd>If either width or height are set to less than 100% source images will be reduced in size before being copied into the output image. The tool won't let you specify a value greater than 100% as increasing images in size results in a reduction of image quality. The default for both width and height is 100% (no resizing).</dd>
</dl>
<h3>Image Duplicates</h3>
<dl>
   <dt>Ignore duplicate images</dt>
   <dd>Duplicate images are copied into the output image and separate CSS rules are created for each duplicate.</dd>
   <dt>Remove duplicate images but merge classes</dt>
   <dd>The tool compares an MD5 of the contents of each image to accurately determine those which are exact duplicates of others contained within the ZIP. These duplicates are discarded and CSS rules for these duplicates are combined into one rule.</dd>
</dl>
<h3>Sprite Output Options</h3>
<dl>
   <dt>Horizontal Offset</dt>
   <dd>This determines the horizontal spacing between rows of images in the output. This value needs to be large enough to take account of the <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">Safari background repeat bug</a>. We suggest sticking with the default.</dd>
   <dt>Vertical Offset</dt>
   <dd>This determines the vertical spacing between each consecutive image. This should be large enough to take account of user font size increases. Generally we'd recommend that you design your site so that visitors can increase their font size twice before the next background image in the sequence becomes visible.</dd>
   <dt>Background Colour</dt>
   <dd>Sets a background colour for the output image. This field takes a 6 digit hex colour value. If left blank and the output format is set to either GIF or PNG then background will be transparent.</dd>
   <dt>Output Format</dt>
   <dd>Supports GIF, PNG and JPG. GIF and PNG can have transparent backgrounds. The default is PNG.</dd>
   <dt>Number of Colours</dt>
   <dd>Restrict the number of colours used in the output file to reduce overall file size. This setting applies to PNGs and GIFs.</dd>
   <dt>Image Quality</dt>
   <dd>Specify the output image quality as a percentage. This setting only applies to JPEGs.</dd>
   <dt>Compress Image with OptiPNG</dt>
   <dd>When checked the output file is processed with <a href="http://optipng.sourceforge.net/">OptiPNG</a> to further reduce its size. Often this will half the size of the file. This setting only applies to PNGs.</dd>
</dl>
<h3>CSS Output Options</h3>
<dl>
   <dt>CSS Prefix</dt>
   <dd>Each CSS position rule generated is prefixed with the text entered. Prepending of basic id and class selectors is supportted. The following characters are allowed - <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> and <em>.</em></dd>
   <dt>Filename Pattern Match</dt>
   <dd>Any valid regular expression can be used. Wrap rounded brackets around the section of the match you'd like to be extracted from the filename of each image. These will be used as the basis of the positioning class names.</dd>
   <dt>Class Prefix</dt>
   <dd>The text entered will be prepended before each generated class name. It is particularly important to specify this where the generated class names may otherwise start with a number as this would result in an invalid selector (as defined by W3C recommendations). The following characters are allowed - <em>a-z</em>, <em>0-9</em>, <em>_</em> and <em>-</em>. The prefix entered cannot start with a number.</dd>
   <dt>CSS Suffix</dt>
   <dd>The text entered will be added to the end of each CSS rule. &quot;CSS Suffix&quot; allows the same characters as  &quot;Class Prefix&quot;.</dd>
</dl>