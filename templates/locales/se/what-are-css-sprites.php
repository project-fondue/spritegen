<p>CSS sprites är ett sätt att reducera antalet av HTTP förfrågningar av bildresurser som din sida genererar. Bilderna är kombinerade till en större bild vid definierade X och Y koordinater. Genom att ange den genererade bilden till relevanta sidelement kan du genom CSS egenskapen <code>background-position</code> skifta den synliga delen till den del av bilden som ska visas.</p>

<p>Denna teknik kan vara väldigt effektik för att förbättra sidans prestanda speciellt i situationer där många små bilder, som t ex. ikoner i menyer, används. Ett exempel är <a href="http://www.yahoo.com/">yahoo.com</a> där de använder tekniken i detta ändamålet.</p>

<h2>För kännedom</h2>
<p>Det finns en del väldigt irriterande webbläsarbuggar att vara medveten om vid skapandet av CSS sprites.</p>

<h3>Opera</h3>
<p>Opera (åtminstone upp till version 9.0) tillåter inte en bakgrundsposition över 2042px eller mindre än -2042px och återgår isåfall till detta max/min värde. Verktyget löser problemet genom att skapa nya kolumner inuti bilden varje gång gränsen uppnås.</p>

<h3>Safari</h3>
<p><a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">Safari har ett problem med repeterande bakgrundsbilder</a>. Lyckligtvis kan detta enkelt lösas genom att precisera en tillräckligt stor horisontell kompensation (konfigurerbart).</p>

<h2>Vidare läsning</h2>
<p><a href="http://www.alistapart.com/">A List Apart</a> publiserade en artikel, <a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing's Kiss of Death</a>, som förklarar konceptet bakom CSS sprites. Om du är ny till tekniken föreslår vi att du beger dig över till <a href="http://www.alistapart.com/">A List Apart</a> och läser på.</p>