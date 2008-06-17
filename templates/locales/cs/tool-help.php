<p>Tento nástroj automatizuje proces vytváření CSS spritů. Stačí uploadovat ZIP archiv obsahující 2 nebo více obrázků (GIF, PNG or JPG) a bude vygenerován sprite i odpovídající CSS pravidla pro zobrazení jednotlivých obsažených obrázků.</p>
<h2>Nastavení</h2>
<p>Generátor CSS spritů obsahuje množství nastavitelných parametrů, kterými můžete ovlivnit vygenerovaný sprite a CSS stylů, aby lépe odpovídaly Vašim požadavkům. Tato nastavení jsou podrobně popsána níže:</p>
<h3>Změnit velikost zdrojových obrázků</h3>
<dl>
   <dt>Šířka &amp; Výška</dt>
   <dd>Pokud je šířka i výška nastavena na méně než 100&nbsp;%, výchozí obrázky budou před kopírováním do výsledného spritu zmenšeny. Generátor Vám nedovolí nastavit velikost větší než 100&nbsp;%, neboť by to vedlo ke snížení kvality výsledných obrázků. Výchozí hodnota pro výšku i šířku je 100&nbsp;%  (beze změny velikosti).</dd>
</dl>
<h3>Duplicitní obrázky</h3>
<dl>
   <dt>Ignorovat duplicitní obrázky</dt>
   <dd>Duplicitní obrázky jsou zkopírovány do vygenerovaného spritu a pro každý z duplicitních obrázků je vytvořeno samostatné CSS pravidlo.</dd>
   <dt>Odstranit duplicitní obrázky a sloučit CSS třídy</dt>
   <dd>Nástroj porovná MD5 hashe každého obrázku, čímž zjistí případné duplicity obsažené v ZIP archivu. Nadbytečné duplicitní soubory jsou smazány a jejich CSS pravidla se sloučí do jednoho.</dd>
</dl>
<h3>Nastavení spritů</h3>
<dl>
   <dt>Vodorovný rozestup</dt>
   <dd>Určuje vodorovný rozestup mezi obrázky ve výsledném spritu. Tato hodnota by měla být dostatečně velká s ohledem na <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">chybu v prohlížeči Safari</a>. Doporučujeme ponechat výchozí hodnoty.</dd>
   <dt>Svislý rozestup</dt>
   <dd>Určuje svislý rozestup mezi po sobě následujícími obrázky. Měl by být dostatečně velký s ohledem na to, že uživatel si může zvětšit velikost písma na stránce. Obecně doporučujeme zajistit, aby při dvojnásobném zvětšení písme stránky nedošlo k zobrazení následující ikonky v řadě. </dd>
   <dt>Barva pozadí</dt>
   <dd>Nastavuje barvu pozadí výsledného obrázku. Barvu zadávejte v šestimístném šestnáctkovém formátu. Pokud toto pole ponecháte nevyplněné, bude jako pozadí použita průhledná barava (v případě volby GIF nebo PNG formátu).</dd>
   <dt>Formát výsledného obrázku</dt>
   <dd>Generátor podporuje formáty GIF, PNG a JPG. V případě volby GIF nebo PNG lze použít průhledné pozadí. Výchozím formátem je PNG.</dd>
</dl>
<h3>Nastavení CSS</h3>
<dl>
   <dt>CSS selektory "před"</dt>
   <dd>Každe CSS pravidlo bude doplněno zadanými selektory (např. přidat id nebo class nadřazeného elementu). Můžete zadat následující znaky: <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> and <em>.</em></dd>
   <dt>Regulární výraz pro název souboru</dt>
   <dd>Lze použít libovolný platný regulární výraz. Tu část názvu souboru, kterou chcete použít pro název css tříd, uzavřete do oblých závorek.</dd>
   <dt>Předpona CSS tříd</dt>
   <dd>Text, který zadáte, se použije jako "předpona" před názvem každé CSS třídy. Tuto předponu je obzvlášť duležité specifikovat tam, kde by jinak CSS třída začínala číslicí (selektory začínající číslicí nejsou dle doporučení W3C platné). Povoleny jsou následující znaky <em>a-z</em>, <em>0-9</em>, <em>_</em> and <em>-</em>. Předpona nesmí začínat číslicí.</dd>
   <dt>CSS selektory "za"</dt>
   <dd>Text, který zadáte do tohoto pole, bude připojen na konec každého CSS pravidla. Povoleny jsou stejné znaky jako u pole <em>CSS selektory "před"</em></dd>
</dl>