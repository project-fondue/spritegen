<p>CSS sprites are a way to reduce the number of HTTP requests made for image resources referenced by your site. Images are combined into one larger image at defined X and Y coorindates. Having assigned this generated image to relevant page elements the <code>background-position</code> CSS property can then be used to shift the visible area to the required component image.</p>
<p>This technique can be very effective for improving site performance, particularly in situations where many small images, such as menu icons, are used. The <a href="http://www.yahoo.com/">Yahoo! home page</a>, for example, employs the technique for exactly this.</p>
<h2>Gotchas</h2>
<p>There are a couple of really annoying browser bugs to watch out for when creating CSS sprites.</p>
<h3>Opera</h3>
<p>Opera (at least as far as version 9.0) won't recognise a background position greater than 2042px or smaller than -2042px using that boundary value instead. The tool takes care of this by creating new columns within the image output each time the vertical limit is reached.</p>
<h3>Safari</h3>
<p><a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">Safari has a problem with repeating background images</a>. Fortuantely this can be easily solved by specifying a large enough horizontal offset value (configurable).</p>
<h2>Further Reading</h2>
<p><a href="http://www.alistapart.com/">A List Apart</a> published an article entitled <a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing's Kiss of Death</a> which explains the concepts behind CSS sprites. If you're new to this technique we'd strongly suggest heading over to <a href="http://www.alistapart.com/">A List Apart</a> and taking a look.</p>