<p>Met deze tool kun je van het proces van het genereren van CSS sprites automatiseren. Je kunt volstaan met het geven van een ZIP-bestand met 2 of meer afbeeldingen (GIF, JPG of PNG), en het zal een sprite afbeelding genereren met de bijbehorende CSS regels voor weergeven elke component beeld. </p>
<h2> Opties </h2> 
<p>De tool heeft een aantal opties die je kunt configureren om de kenmerken van de gegenereerde sprite afbeelding en CSS  aan te passen, om beter overeen te komen met de specifieke kenmerken van jouw webpagina opzet. Deze opties worden hieronder nader gespecificeerd: </p>
<h3> Grootte Bron afbeeldingen </h3> 
<dl> 
    <dt> Breedte &amp; Hoogte </dt> 
    <dd> Als een breedte of hoogte zijn ingesteld op minder dan 100%, dan zullen de oorspronkelijke afbeeldingen worden verkleind voordat ze worden gekopieerd naar de output afbeelding. De tool staat geen waarde toe van meer dan 100%, omdat het vergroten van afbeeldingen resulteert in een vermindering van de beeldkwaliteit. De standaard instelling voor zowel breedte en hoogte is 100% (geen herschaling).</dd> 
</dl>
<h3>Dubbele afbeeldingen </h3> 
<dl> 
    <dt>Dubbele afbeeldingen negeren</dt> 
    <dd>Dubbele afbeeldingen worden gekopieerd naar de uitgang beeld en aparte CSS regels zijn gemaakt voor elke duplicaat. </dd> 
    <dt> Dubbele afbeeldingen verwijderen, maar class-en samenvoegen </dt> 
    <dd> De tool vergelijkt een MD5 van de inhoud van iedere afbeelding om nauwkeurig te bepalen welke afbeeldingen exacte kopieen zijn van andere afbeeldigen in hetzelfde ZIP bestand. Deze doublures worden verwijderd, en CSS regels voor deze doublures worden gecombineerd in &eacute;&eacute;n regel. </dd> 
</DL>
<h3> Sprite Uitvoer Opties </h3> 
<dl> 
    <dt> Horizontale Offset </dt> 
    <dd> Dit bepaalt de horizontale afstand tussen rijen van beelden in de uitvoer. Deze waarde moet groot genoeg zijn om rekening te houden met <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">Safari's background-repeat bug </a>. We raden aan de standaard instelling aan te houden. </Dd> 
    <dt> Verticale Offset </dt> 
    <dd> Dit bepaalt de verticale afstand tussen de opeenvolgende afbeeldingen. Dit moet groot genoeg zijn om rekening te houden met een grotere letterkeuze door de gebruiker. In het algemeen zouden we je aanraden de pagina zo te ontwerpen, zodat bezoekers de letter twee stappen kunnen vergroten vóór de volgende achtergrond afbeelding in de reeks zichtbaar wordt. </dd> 
    <dt> Achtergrondkleur </dt> 
    <dd> Stelt een achtergrondkleur voor de output afbeelding. Dit veld verwacht een 6-cijferig hexadecimale kleur waarde. Als het wordt leeg gelaten en de output formaat is ingesteld op GIF-of PNG dan zal achtergrond transparant zijn. </dd> 
    <dt> Sprite Uitvoer Formaat </dt> 
    <dd> Ondersteund GIF, PNG en JPG. GIF en PNG kunnen een transparante achtergrond hebben. De standaard instelling is PNG. </dd> 
</dl>
<h3>CSS Uitvoer Opties </h3> 
<dl> 
    <dt> CSS Voorvoegsel </dt> 
    <dd> Elke gegenereerde CSS positie regel wordt voorafgegaan door de opgegeven tekst. Het invoegen van elementaire id en class selectie operatoren wordt ondersteund. De volgende tekens zijn toegestaan - <em> a-z </em> <em> 0-9 </em> <em> _ </em> <em> - </em> <em> # </em> en <em>. </em> </dd> 
    <dt> Bestandsnaam Patroon Match </dt> 
    <dd> Elke geldige regular expression kan worden gebruikt. Zet ronde haakjes rond het gedeelte van de match dat je wil ëxtraheren uit de bestandsnaam van elke afbeelding. Deze zullen worden gebruikt als basis voor de namen van de positionering class-en. </dd> 
    <dt> Class Voorvoegsel </dt> 
    <dd> De opgegeven tekst zal worden ingevoegd v&oacute;&oacute;r elk van de gegenereerde class namen. Het is met name belangrijk om dit te specificeren, als de gegenereerde class namen anders zouden kunnen beginnen met een getal, aangezien dit zou resulteren in een ongeldige selector (zoals gedefinieerd door de W3C-aanbevelingen). De volgende tekens zijn toegestaan - <em> a-z </em> <em> 0-9 </em> <em> _ </em> en <em> - </em>. Het opgegeven voorvoegsel kan niet beginnen met een getal. </dd> 
    <dt> CSS Achtervoegsel </dt> 
    <dd> De ingevoerde tekst zal worden toegevoegd aan het einde van elke regel CSS. "CSS Achtervoegsel" laat dezelfde karakters als "Class Voorvoegsel". </Dd> 
</dl>