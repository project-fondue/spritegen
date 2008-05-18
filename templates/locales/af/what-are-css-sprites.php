<p>CSS sprites is `n manier om die hoveelheid HTTP aanvrae te verminder, vir beeld bronne aangevra deur jou webblad.  Beelde is gekombineer in een groot beeld by spesifieke X en Y koordinate.  Die CSS <code>background-position</code> (agtergrond posisie) element kan gebruik word om die beeld so te positioneer sodat die regte gedeelte sigbaar is.</p>
<p>Hierdie tegniek kan baie effektief gebruik word om webblad spoed te verbeter, veral in gevalle waar baie klein beelde, soos menu ikone, gebruik word. Die <a href="http://www.yahoo.com/">Yahoo! tuisblad</a>, as voorbeed, gebruik hierdie tegniek juis vir hierdie resultaat.</p>
<h2>Goggas</h2>
<p>Daar is `n paar goggas wat `n mens regtig kan afsit waarvoor `n mens moet oppas as mens CSS sprites skep.</p>
<h3>Opera</h3>
<p>Opera (ten minste tot by weergawe 9.0) herken nie agtergrond posisies groter as 2042px of kleiner as -2042px nie, en gebruik eerder daardie limiet indien `n groter waarde verskaf word. Die instrument tref voorsorg hiervoor deur nuwe kolomme te skep binne die beeld uitset elke keer wat die vertikale limiet bereik word.</p>
<h3>Safari</h3>
<p><a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">Safari het `n probleem met herhalende agtergrond beelde</a>.  Gelukkig kan dit maklik opgelos word deur `n groot genoeg horisontale afset waarde (konfigureerbaar).</p>
<h2>Verdere Leesstof</h2>
<p><a href="http://www.alistapart.com/">A List Apart</a> het `n artikel gepubliseer met die titel <a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Beeld opsnyding se doodskus</a> wat die konsepte agter CSS sprites verduidelik.  As jy nuut is tot hierdie tegniek beveel ons aan dat jy `n draai maak by <a href="http://www.alistapart.com/">A List Apart</a> en `n bietjie daar gaan rondkyk.</p>
