<p>Hierdie instrument stel jou instaat om outomaties CSS sprites te genereer.  Gee dit net `n ZIP leêr wat 2 of meer beelde (GIF, PNG of JPG) bevat, en dit sal `n sprite beeld genereer met die ooreenstemmende CSS reëls om na elke komponent beeld te verwys en te wys.</p>
<h2>Opsies</h2>
<p>Die instrument het `n paar opsies wat jy kan konfigureer om sekere eienskappe van die gegenereerde sprite beeld en CSS te laat pas by die spesifikasies van jou webblad.  Die opsies is hier onder uitgelig:</p>
<h3>Verstel bron beeld groottes</h3>
<dl>
	<dt>Breedte &amp; Hoogte</dt>
    <dd>As die breedte of hoogte gestel word na minder as 100% sal die bron beelde verstel word in grootte voor dit gekopieer word na die uitset beeld. Die instrument sal jou nie toelaat om `n waarde meer as 100% te verskaf nie, omdat vergroting van beelde `n gehalte verlies tot gevolg sal he.  Die initieele waarde vir beide breedte en hoogte is 100% (geen verstelling).</dd>
</dl>
<h3>Beeld Duplikate</h3>
<dl>
	<dt>Ingoreer duplikaat beelde</dt>
    <dd>Duplikaat beelde is gekopieer na die uitset beeld en aparte CSS reëls is geskep vir elke duplikaat.</dd>
    <dt>Verwyder duplikaat beelde maar verenig klasse</dt>
    <dd>Die instrument vergelyk `n MD5 van die inhoud van elke beeld om op `n akkurate wyse te bepaal of beelde duplikate van mekaar is binne die ZIP.  Hierdie duplikate is verwyder en CSS reëls vir hierdie duplikate word saamgepers tot een reël.</dd>
</dl>
<h3>Sprite Uitset Opsies</h3>
<dl>
	<dt>Horisontale Afset</dt>
    <dd>Hierdie determineer die horisontalie spasiering tussen rye van beelde in die uitset.  Hierdie waarde moet groot genoeg wees om die <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">Safari agtergrond herhaling gogga oplossing</a> in ag te neem.  Ons beveel aan om by die initieele waarde te bly.</dd>
    <dt>Vertikale Afset</dt>
    <dd>Hierdie determineer die vertikale spasiering tussen elke opvolgende beeld.  Dit behoort groot genoeg te wees om gebruiker lettertipe grootte verstellings in ag te neem.  Oor die algemeen beveel ons aan dat jy jou webblad so ontwerp dat gebruikers hul lettertipe grootte ten minste kan verdubbel voor die volgende agtergrond beeld sigbaar word.</dd>
    <dt>Agtergrond Kleur</dt>
    <dd>Stel `n agtergrond kleur vir die uitset beeld.  Hierdie veld neem `n 6 letter heksadesimale waarde.  As te lank en as die uitset formaat op GIF of PNG gestel is, sal die agtergrond deursigtig wees</dd>
    <dt>Sprite Uitset Formaat</dt>
    <dd>Ondersteun GIF, PNG en JPG. GIF en PNG kan deursigtige agtergronde he.  Die initieele waarde is PNG.</dd>
</dl>
<h3>CSS Uitset Opsies</h3>
<dl>
	<dt>CSS Voorvoegsel</dt>
    <dd>Elke CSS posisie reël gegenereer is met hierdie teks voorgevoeg.  Voorvoeging van basiese id en klass selektors is geondersteun.  Die volgende karakters word toegelaat - <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> and <em>.</em></dd>
    <dt>Leêrnaam Patroon Toets</dt>
    <dd>Enige korrekte taal formule (regular expression) kan gebruik word.  Gebruik geronde hakkies rondom die seksie van die toets wat jy graag as uitreksel van die leêr naam van elke beeld wil he.  Dit sal gebruik word as die basis van die posisionerings klas name.</dd>
    <dt>Klas Voorvoegsel</dt>
    <dd>Die teks ingevoer sal voorgevoeg woord voor elke gegenereerde klas naam.  Dit is van kardinale belang om hierdie te spesifiseer waar die gegenereerde klas name andersins met `n nommer sou begin, aangesien nommers nie korrekte selektore is nie (soos gedefinieer deur W3C aanbevelings).  Die volgende karakters word toegelaat - <em>a-z</em>, <em>0-9</em>, <em>_</em> and <em>-</em>. Die voorvoegsel kan nie met `n nommer begin nie.</dd>
    <dt>CSS Agtervoegsel</dt>
    <dd>Die teks ingevoer sal aan die einde van elke CSS reël bygevoeg word. &quot;CSS Agtervoegsel&quot; laat die selfde karakters as &quot;Klas Voorvoegsel&quot; toe.</dd>
</dl>