<p>Mit diesem Werkzeug k&ouml;nnen Sie CSS Sprites automatisch erstellen. Alles, was Sie machen m&uuml;ssen ist eine Zip Datei mit zwei oder mehr Bildern im GIF, JPG oder PNG Format hochzuladen. Das Werkzeug erstellt f&uuml;r Sie das zusammengef&uuml;gte Bild und die dazugeh&ouml;rige CSS Regeln um jedes einzelne Teilbild anzuzeigen.</p>
<h2>Optionen</h2> 
<p>Sie k&ouml;nnen die Art und Weise wie das Werkzeug das Bild und die CSS Informationen erstellt mit mehreren Optionen Ihren Bed&uuml;rfnissen anpassen. Diese Optionen sind die folgenden:</p>
<h3>Ursprungsbilder vergr&ouml;&szlig;ern oder verkleinern</h3>
<dl>
   <dt>Breite und H&ouml;he</dt>
   <dd>Wenn Sie entweder die Breite oder die H&ouml;he als weniger von 100% angeben werden die Bilder dementsprechend vergr&ouml;&szlig;ert oder verkleinert. Werte &uuml;ber 100% sind nicht erlaubt da die Bildqualit&auml;t leiden w&uuml;rde. Die Voreinstellung ist 100% was bedeutet da&szlig; die Bilder nicht ver&auml;ndert werden.</dd>
</dl>   
<h3>Doppelte Bilder</h3>
<dl> 
   <dt>Doppelte Bilder ignorieren</dt>
   <dd>Doppelte Bilder werden in das Endbild eingef&uuml;gt und f&uuml;r jedes eine eigene CSS Regel erstellt.</dd>
   <dt>Doppelte Bilder entfernen und CSS Klassen zusammenf&uuml;gen</dt>
   <dd>Das Werkzeug vergleicht die Bilder mittels MD5 um sicherzustellen das es sich wirklich um Duplikate handelt. Diese werden entfernt und die CSS Regeln in einen Selektor zusammengef&uuml;gt.</dd>
</dl> 
<h3>Sprite Ausgabeoptionen</h3>
<dl> 
   <dt>Horizontaler Abstand</dt>
   <dd>Definiert den Abstand zwischen den einzelnen Bilderreihen. Dieser Wert mu&szlig; gro&szlig; genug sein um einer fehlerhaften Darstellung in Safari vorzubeugen. Wir empfehlen den Originalwert beizubehalten.</dd>
   <dt>Vertikaler Abstand</dt>
   <dd>Definiert den Abstand zwischen den einzelnen Bildern. Dieser Wert mu&szlig; gro&szlig; genug sein um es Besuchern zu erlauben Ihre Schriftgr&ouml;&szlig;e zu ver&auml;ndern ohne ungewollt Teile von anderen Bildern anzuzeigen.</dd>
   <dt>Hintergrundfarbe</dt>
   <dd>Definiert die Hintergrundfarbe des Ausgabebildes. Das Feld erwartet einen sechs Zeichen langen hexadezimalen Farbwert. Falls keine Farbe angegeben wird erstellt das Werkzeug transparente PNG oder GIF Bilder.</dd>
   <dt>Sprite Ausgabeformat</dt>
   <dd>Unterst&uuml;tzte Formate sind GIF, PNG und JPG. GIF und PNG k&ouml;nnen transparente Hintergr&uuml;nde haben. Voreinstellung ist PNG.</dd>
</dl>
<h3>CSS Ausgabeoptionen</h3>
<dl> 
   <dt>CSS Pr&auml;fix</dt>
   <dd>Jede CSS Positionsangabe wird an diesen Text angeh&auml;ngt was Ihnen erlaubt weitere ID und CSS Klassen zu definieren. Erlaubte Zeiceh sind a-z, 0-9, _, -, # und .</dd>
Regul&auml;rer Ausdruck zur Fileauswahl
   <dt>Erlaubt sind regul&auml;re Ausdr&uuml;cke.</dt>
   <dd>Die Teile des Ausdruckes in runden Klammern werden Teil des Klassennamens f&uuml;r die Positionierung.</dd>
   <dt>CSS Pr&auml;fix</dt>
   <dd>Der eingegebene Text wird vor jedem erstellten Klassennamen eingef&uuml;gt. Dies ist wichtig, da Klassennamen nicht mit einer Nummer beginnen d&uuml;rfen. Erlaubte Zeichen sind - a-z, 0-9, _ und -. Der eingegebene Text darf nicht mit einer Nummer beginnen.</dd>
   <dt>CSS Suffix</dt>
   <dd>Der eingebene Text wird am Ende von jeder CSS Regel eingef&uuml;gt. Die Regeln sind die gleichen wie bei "CSS Pr&auml;fix".</dd>
</dl>