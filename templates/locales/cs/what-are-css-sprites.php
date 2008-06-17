<p>CSS spirty představují způsob, jak snížit počet HTTP požadavků, které klient vyšle k získání prvků obsažených na stránce. Obrázky se sloučí do jednoho většího a umístí se na určených X,Y souřadnicích. Pak pomocí CSS atributu <code>background-position</code> můžeme nastavit vzniklý obrázek na pozadí různým elementům stránky a pomocí dalších CSS vlastností umístíme pozadí tak, aby požadovaný jednotlivý obrázek padl do viditelné oblasti elementu na stránce.</p>
<p>Tato technika může být velice efektivní při zvyšování výkonu stránek, obzvláště v situacích, kdy je použito mnoho malých obrázků - ikonek. Například <a href="http://www.yahoo.com/">Yahoo! home page</a>, využívá techniku CSS spritů právě tímto způsobem.</p>
<h2>Možné problémy</h2>
<p>Webové prohlížeče obsahují několik nepříjemných chyb, které mohou způsobit problémy při používání CSS spritů. </p>
<h3>Opera</h3>
<p>Opera (minimálně do verze 9.0) nerozpozná pozici pozadí vyšší než 2042px nebo menší než -2024px. Generátor CSS spritů toto automaticky řeší uspořádáním ikonek do sloupců. Jakmile je dosaženo tohoto vertikálního limitu, založí se nový sloupec.</p>
<h3>Safari</h3>
<p><a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">V Safari existuje problém s opakujícím se pozadím</a>. Tento problém lze snadno řešit zadáním dostatečně velkého horizontálního posunu (lze nastavit).</p>
<h2>Další zdroje</h2>
<p>Na <em>A List Apart</em> byl publikován článek <a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing's Kiss of Death</a>, kde je přehledně vysvětlen celý koncept CSS spritů. Pokud ještě nejste příliš obeznámen(a) s touto technikou, doporučujeme přečíst si více právě na <a href="http://www.alistapart.com/">A List Apart</a>.</p>