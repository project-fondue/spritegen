<p>CSS sprites 可有效降低圖片文件的 HTTP 連接請求數。將多個圖片以一定間距合併為一個圖片文件。頁面中使用這些圖片的元素將利用 <code>background-position</code> 這一 CSS 屬性來顯示合併圖片中的指定位置。</p>
<p>這項技術可以提升網站效能，尤其當網頁上有很多小圖片時，例如許多的選單圖示。 <a href="http://www.yahoo.com/">Yahoo!  首頁</a>便是使用此技術的一例。</p>
<h2>優勢</h2>
<p>建立 CSS sprites 時，必須考慮多重瀏覽器相容性問題，這個工具可以幫您避免這些問題。</p>
<h3>劇本</h3>
<p>劇本 (9.0 以前版本) 無法顯示偏移大於 2042px 或小於 -2042px 的背景圖。這個工具會自動合併為多列圖片以適應垂直高度超過此數值的情況。</p>
<h3>原生</h3>
<p><a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">原來在顯示重複背景是有一個 bug</a>。幸運的是可設定一個較大的水平偏移植來解決這個問題(配置) 。</p>
<h2>延伸閱讀</h2>
<p><a href="http://www.alistapart.com/">A List Apart</a> 　發表了一篇名為　<a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing's Kiss of Death</a>  的文章以介紹 CSS sprites。如果您上不了解此技術請到　<a href="http://www.alistapart.com/">A List Apart</a>　查閱。</p>