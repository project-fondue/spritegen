<p>Detta verktyg tillåter dig att automatisera processen av generering av <a href="http://www.w3.org/Style/CSS/">CSS</a> sprites. Ladda upp en <a href="http://en.wikipedia.org/wiki/ZIP_%28file_format%29">ZIP fil</a> innehållande två eller flera bilder (<a href="http://en.wikipedia.org/wiki/GIF">GIF</a>, <a href="http://en.wikipedia.org/wiki/PNG">PNG</a> eller <a href="http://en.wikipedia.org/wiki/JPG">JPG</a>) och verktyget kommer generera en spritebild och de motsvarande CSS reglerna för att visa varje del.</p>

<h2>Valmöjligheter</h2>

<p>Verktyget har flera valmöjligheter du kan konfigurera så att slutresultatet bättre matchar din sites specifika behov och kännetecken genom ändring av 'Spriten' och CSSen. Dessa valmöjligheter gås igenom nedan:</p>

<h3>Ändra storlek på ursprungsbilder</h3>

<dl>
	<dt>Bredd &amp; höjd</dt>
	<dd>Om antingen bredd eller höjd är satta till under 100% kommer ursprungsbilderna bli reducerade i storlek före de kopieras in i den genererade bilden. Du kan inte specificera ett värde över 100% iom. att en ökning resulterar i en försämring av bildkvaliten. Standard för båda bredd och höjd är 100% (ingen storleksändring).</dd>
</dl>

<h3>Bilddubletter</h3>

<dl>
	<dt>Ignorera bilddubletter</dt>
	<dd>Dubletter kopieras till den genererade bilden och separata CSS regler skapas för varje dublett.</dd>
	<dt>Ta bort bilddubletter men förena CSS klasser</dt>
	<dd>Verktyget jämför genom <a href="http://en.wikipedia.org/wiki/MD5">MD5</a> innehållet av varje bild för att kunna göra en precis bedömning vad som är exakta dubletter av andra bilder inuti ZIP filen. Dessa dubletter kasseras och CSS regler för dessa dubletter är sammanslagna till en regel.</dd>
</dl>

<h3>Sprite utdatamöjligheter</h3>

<dl>
	<dt>Horisontell kompensation</dt>
	<dd>Detta bestämmer den horisontella kompensationen mellan rader av bilder i utdatan. Värdet behöver vara tillräckligt stor för att ta <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">Safaris problem med repeterande bakgrunder</a> i beaktning. Vi föreslår att du bibehåller standardvärdet.</dd>
	<dt>Vertikal kompensation</dt>
	<dd>Detta bestämmer den vertikala kompensationen mellan varje följande bild. Värdet bör vara tillräckligt stort för att ta i beaktning användarens typsnittsstorlek. Generellt rekommenderar vi att du designar din sida så att besökare kan öka typsnittsstorleken två gånger innan nästa bakgrundsbilden i sekvensen blir synlig.</dd>
	<dt>Bakgrundsfärg</dt>
	<dd>Sätter en bakgrundsfärg för den genererade bilden. Detta fält tar ett värde av sexsiffrigt hexadecimalt värde. Om den lämnas tom och utdataformatet är GIF eller PNG kommer bakgrunden bli transparant.</dd>
	<dt>Sprite utdataformat</dt>
	<dd>Stödjer GIF, PNG och JPG. GIF och PNG kan ha transparanta bakgrunder. Standard är PNG.</dd>
</dl>

<h3>CSS utdatamöjligheter</h3>

<dl>
	<dt>CSS prefix</dt>
	<dd>Varje CSS positionsregel som genereras får följande prefix tillagt. Tillägg av basid och klassval stöds. Följande tecken är tillåtna - <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> och <em>.</em></dd>
	<dt>Filnamns mönsterjämförelse</dt>
	<dd>En giltig <a href="http://en.wikipedia.org/wiki/Regular_expressions">regular expression</a> kan användas. Linda en parantes runt den delen av mönstret som du vill använda för bas till de positionerade klassnamnen. Detta hämtas från filnamnet av bilden i ZIP filen.</dd>
	<dt id="classPrefix">Klassprefix</dt>
	<dd>Texten kommer läggas till i början av varje genererat klassnamn. Detta är viktigt i de fall där den genererade klassnamnet kommer börja  med en siffra pga. att detta resulterar i ett ogiltigt namn (enligt rekommendation av <a href="http://www.w3c.org">W3C</a>). Följande tecken är tillåtna - <em>a-z</em>, <em>0-9</em>, <em>_</em> och <em>-</em>. Prefixet kan inte börja med en siffra.</dd>
	<dt>CSS suffix</dt>
	<dd>Texten kommer att läggas till i slutet av varje CSS regel. &quot;CSS suffix&quot; tillåter samma tecken som &quot;<a href="#classPrefix">Klassprefix</a>&quot;.</dd>
</dl>