<p>Questo tool permette la generazione automatica di sprite CSS. Fornendo un semplice file ZIP, contenente 2 o pi&ugrave; immagini (GIF, PNG oppure JPG), questo tool generer&agrave; una immagine per lo sprite, e le corrispondenti regole CSS necessarie per visualizzare le singole immagini componenti.</p>
<h2>Opzioni</h2>
<p>Il tool ha un certo numero di opzioni che &egrave; possibile configurare per modificare le caratteristiche dell'immagine e del CSS generati, per meglio adattarsi alle specifiche del tuo sito Web. Queste opzioni sono dettagliate di seguito:</p>
<h3>Ridimensionamento Immagini Originali</h3>
<dl>
   <dt>Larghezza ed Altezza</dt>
   <dd>Se la larghezza o l'altezza vengono impostate a meno del 100%, le immagini originali verranno ridimensionate prima di essere copiate nell'immagine finale. Il tool non permette di specificare valori pi&ugrave; grandi del 100%, poiché aumentando le dimensioni dell'immagine si avrebbe una perdita di qualit&agrave;. Il valore di default per larghezza ed altezza è 100% (nessun ridimensionamento).</dd>
</dl>
<h3>Immagini Duplicate</h3>
<dl>
   <dt>Ignora le Immagini Duplicate</dt>
   <dd>Le Immagini duplicate vengono copiate nell'immagine finale, e regole CSS separate vengono specificate per ogni singolo duplicato.</dd>
   <dt>Rimuovi le immagini duplicate ma combina le classi CSS</dt>
   <dd>Il tool confronta l'MD5 ricavato dal contenuto di ogni immagine, per determinare in maniera accurata quali di queste sono ripetute pi&ugrave; volte nello ZIP. Questi duplicati vengono scartati, e le regole CSS relative vengono combinate tra loro in un'unica regola.</dd>
</dl>
<h3>Opzioni Sprite Generato</h3>
<dl>
   <dt>Spaziatura Orizzontale</dt>
   <dd>Questa propriet&agrave; rappresenta lo spazio orizzontale tra due due righe di immagini nell'immagine finale. Questo valore deve essere grande abbastanza da tenere in conto il <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">bug di Safari per i background ripetuti</a>. E' consigliato lasciare il valore di default.</dd>
   <dt>Spaziatura Verticale</dt>
   <dd>Questa propriet&agrave; rappresenta lo spazio verticale tra due immagini consecutive. Tale valore deve essere grande abbastanza da considerare gli aumenti di dimensioni del font. Generalmente, &egrave; raccomandato progettare un sito in maniera che gli utenti possano aumentare la dimensione del font almeno due volte prima che la successiva immagine nella sequenza dello sfondo diventi visibile.</dd>
   <dt>Colore dello Sfondo</dt>
   <dd>Imposta un colore di sfondo per l'immagine finale. Questo campo accetta valori di 6 caratteri esadecimali. Se viene lasciato vuoto, ed il formato dell'immagine finale &egrave; impostato a GIF o PNG, lo sfondo dell'immagine generata sar&agrave; trasparente.</dd>
   <dt>Formato Sprite Generato</dt>
   <dd>Supporta GIF, PNG and JPG. I formati GIF e PNG possono avere sfondi trasparenti. Il valore di default &egrave; PNG.</dd>
</dl>
<h3>Opzioni CSS Generato</h3>
<dl>
   <dt>Prefisso CSS</dt>
   <dd>Ad ogni regola CSS generata viene aggiunto il prefisso specificato. L'utilizzo dei selettori standard per id e classi &egrave; supportato. I seguenti caratteri sono ammessi - <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> e <em>.</em></dd>
   <dt>Espressione Regolare per i Nomi dei File</dt>
   <dd>Pu&ograve; essere utilizzata una qualunque espressione regolare valida. Utilizzando le parentesi tonde si possono catturare le parti del nome dei singoli file che si vuole utilizzare come base per i nomi delle classi generate.</dd>
   <dt>Prefisso Classi</dt>
   <dd>Il testo inserito verr&agrave; utilizzato come prefisso di ogni classe generata. E' particolarmente imporante specificare questo valore, poiché i nomi generati potrebbero iniziare con un numero, generando dei selettori non validi (come definito dalle raccomandazioni del W3C). I seguenti caratteri sono ammessi - <em>a-z</em>, <em>0-9</em>, <em>_</em> e <em>-</em>. Il prefisso inserito non pu&ograve; iniziare con un numero.</dd>
   <dt>Suffisso CSS</dt>
   <dd>Il testo inserito verr&agrave; aggiunto alla fine di ogni regola CSS. Il &quot;Suffisso CSS&quot; ammette gli stessi caratteri definiti per il &quot;Prefisso CSS&quot;.</dd>
</dl>