<p>CSS Sprites ist eine Technik, mir der man die Anzahl von HTTP Verbindungen der Seite herunterschrauben kann. Jede HTTP Verbindung die w&auml;hrend des Ladens der Seite erstellt wird verlangsamt die Seite. Die Idee von CSS Sprites ist das man anstatt von vielen Bildern ein einziges verwendet und nur Teile dieses Bildes mittels der background-position Regel von CSS anzeigt.</p>
<p>Diese Technik kann sehr effektiv sein, besonders dann wenn man viele kleine Bilder wie Icons auf einer Seite verwendet. Zum Beispiel sind alle Bilder im linken Menu auf der <a href="http://www.yahoo.com/">Yahoo!</a> Anfangsseite in einem einzigen File.</p> 
<h2>Probleme</h2>
<p>Es gibt ein paar sehr nervige Browserfehler die man umgehen mu&szlig; wenn man mit CSS Sprites arbeiten will.</p>
<h3>Opera</h3>
<p>Opera (bis zur Version 9.0) kann keine Hintergrundposition von &uuml;ber 2024 Pixel oder weniger als -2024 Pixel verarbeiten und rundet diese auf diesen Wert auf oder ab. Dieses Werkzeug umgeht das Problem indem es alle 2024 pixels eine neue Spalte erzeugt.</p>
<h3>Safari</h3>
<p>Safari hat ein Problem das Hintergrundbilder mehrfach angezeigt werden. Man kann das Problem umgehen indem man zwischen den Bildern ausreichend Freiraum beibeh&auml;t. Dies kann im Werkzeug definiert werden.</p>
<h2>Weitere Informationen</h2>
<p>Bei <a href="http://www.alistapart.com/">A List Apart</a> gibt es einen Artikel mit dem Titel &quot;<a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing's Kiss of Death</a>&quot; der das Konzept von CSS Sprites im Detail erkl&auml;rt. Falls dieser Trick was ganz Neues f&uuml;r Sie sein sollte, raten wir Ihnen den Artikel durchzulesen, damit Alles einfacher wird.</p>