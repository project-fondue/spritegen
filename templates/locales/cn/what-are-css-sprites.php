<p>CSS 图片拼合 (CSS sprites) 可有效降低图片文件的 HTTP 连接请求数. 多个图片将以一定间距合并为一个大图片文件. 页面中使用这些图片的元素将利用 <code>background-position</code> 这一 CSS 属性来显示拼合图片中的指定位置.</p>
<p>这一技术可有效提升网站性能, 尤其是网页上有众多小图片时, 如许多菜单栏图标. <a href="http://www.yahoo.com/">Yahoo! 首页</a>是使用此技术的一个实例.</p>
<h2>优势</h2>
<p>创建 CSS sprites 时, 必须考虑多重浏览器兼容性问题, 此工具可以帮您避免这些问题.</p>
<h3>Opera</h3>
<p>Opera (9.0版本之前) 无法显示偏移大于 2042px 或小于 -2042px 的背景图. 此工具会自动拼合图片为多列以适应垂直高度超过此限制的情况.</p>
<h3>Safari</h3>
<p><a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">Safari 在显示重复背景是有一个bug</a>. 幸运的是可设置一个较大的水平偏移值以解决此bug (可更改).</p>
<h2>延伸阅读</h2>
<p><a href="http://www.alistapart.com/">A List Apart</a> 发表了一篇名为 <a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing's Kiss of Death</a>(CSS Sprites: 图片限制之死) 的文章以介绍 CSS sprites. (<a href="http://realazy.org/blog/2007/10/08/css-sprites/">CSS sprites 中文介绍</a>) 如果您尚不了解此技术请到 <a href="http://www.alistapart.com/">A List Apart</a> 查阅.</p>