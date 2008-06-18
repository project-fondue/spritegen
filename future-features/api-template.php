<p>The CSS Sprite Generator has a REST API which provides the facility to script the generation of sprite images and CSS. It has a number of configuration options but simply posting a file to <code><?php echo $toolUrl; ?>api/v1</code> as shown in the CURL example below is enough to generate a sprite image and CSS with default settings:</p>
<pre><code>curl -F "path=@icons.zip" 
-F <?php echo $toolUrl; ?>api/v1
</code></pre>
<p>Additional parameters can be added to set options:</p>
<pre><code>curl -F "path=@icons.zip" -F "ignore-duplicates=ignore" 
<?php echo $toolUrl; ?>api/v1 
</code></pre>
<p>Obviously any library (such as PHP's CURL wrapper) that supports HTTP POSTs can be used to query the API.</p>
<h2>Output Format</h2>
<p>The API can return results as either a JSON object or serialised PHP. Simply set the type parameter to either &quot;json&quot; or &quot;php&quot;. The default is &quot;json&quot;.</p>
<pre><code>curl -F "path=@icons.zip" -F "type=php" 
<?php echo $toolUrl; ?>api/v1 
</code></pre>
<p>The returned array contains 3 elements - the filename of the generated sprite image, a checksum hash for the image and the corresponding CSS rules.</p>
<pre><code>
{
   &quot;filename&quot;:&quot;csg-481939c84d5f3.png&quot;,
   &quot;hash&quot;:&quot;413b2f392c20495f0eadf459195452d0&quot;,
   &quot;css&quot;:&quot;.sprite-links-05 { background-position: 0 -30px; } \n&hellip;&quot;
}
</code></pre>
<p>Once retrieved a separate request can be made to fetch the image:</p>
<pre><code><?php echo $toolUrl; ?> 
download.php?filename=&lt;filename&gt;&amp;hash=&lt;hash&gt;   
</code></pre>
<h2>Configuration Options</h2>
<p>Available configuration options mirror those in the tool's web based form which are described in the help section. The basic values are outlined below but refer to the help for details of exactly what option means:</p>
<h3>Ignore Duplicates</h3>
<pre><code>
ignore-duplicates=ignore
ignore-duplicates=merge
</code></pre>
<h3>Resize Source Images</h3>
<h4>Width</h4>
<pre><code>
width-resize=&lt;integer&gt;   
</code></pre>
<p>Value specified as percentage.</p>
<h4>Height</h4>
<pre><code>
height-resize=&lt;integer&gt;   
</code></pre>
<p>Value specified as percentage.</p>
<h3>Sprite Output Options</h3>
<h4>Horizontal Offset</h4>
<pre><code>
horizontal-offset=&lt;integer&gt;   
</code></pre>
<p>Value specified in pixels.</p>
<h4>Vertical Offset</h4>
<pre><code>
vertical-offset=&lt;integer&gt;   
</code></pre>
<p>Value specified in pixels.</p>
<h4>Background Colour / Transparency Colour</h4>
<pre><code>
background=ccc   
</code></pre>
<p>Value specified as 3 or 6 digit hex value (including or excluding #).</p>
<h4>Use Transparency</h4>
<pre><code>
use-transparency=on   
</code></pre>
<h4>Sprite Output Format</h4>
<pre><code>
image-output=&lt;PNG|GIF|JPG&gt;   
</code></pre>
<h3>CSS Output Options</h3>
<h4>CSS Prefix</h4>
<pre><code>
css-prefix=&lt;string&gt;   
</code></pre>
<h4>Filename Pattern Match</h4>
<pre><code>
file-regex=&lt;string&gt;   
</code></pre>
<h4>Class Prefix</h4>
<pre><code>
class-prefix=&lt;string&gt;   
</code></pre>
<h4>CSS Suffix</h4>
<pre><code>
css-suffix=&lt;string&gt;   
</code></pre>