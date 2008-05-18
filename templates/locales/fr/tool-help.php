<p>Cet outil vous permet d'automatiser le processus de g&#233;n&#233;ration des Sprites CSS. Fournissez seulement un fichier ZIP contenant au moins 2 images (GIF, PNG ou JPG) et il g&#233;n&#232;re l'image Sprite ainsi que les r&#232;gles CSS associ&#233;es pour afficher unitairement chaque image composant le Sprite.</p>
<h2>Options</h2>
<p>L'outil poss&#232;de des options que vous pouvez configurer pour modifier les caract&#233;ristiques de l'image Sprite g&#233;n&#233;r&#233;e ainsi que les CSS associ&#233;s afin de mieux r&#233;pondre aux sp&#233;cificit&#233;s de votre site web. Ces options sont d&#233;taill&#233;es ci-dessous :</p>
<h3>Redimensionner les images sources</h3>
<dl>
   <dt>Largeur et Hauteur</dt>
   <dd>Si la largeur et/ou la hauteur sont inf&#233;rieur &#224; 100% les tailles des images sources seront r&#233;duites avant d'&#234;tre copi&#233;e dans l'image r&#233;sultat. L'outil ne permet pas d'indiquer une valeur sup&#233;rieure &#224; 100% car augmenter la taille des images implique une baisse de la qualit&#233; des images produites. La valeur par d&#233;faut pour la largeur et la hauteur est 100% (pas de redimensionnement).</dd>
</dl>
<h3>Images dupliqu&#233;es</h3>
<dl>
   <dt>Ignorer les images dupliqu&#233;es</dt>
   <dd>Les images dupliqu&#233;es sont toutes copi&#233;es dans l'image r&#233;sultat et une r&#232;gle CSS est cr&#233;&#233;e s&#233;par&#233;ment pour chaque duplicata.</dd>
   <dt>Supprimer les images dupliqu&#233;es mais combiner les classes en une seule</dt>
   <dd>L'outil compare le contenu des images en utilisant une fonction de hachage MD5 pour d&#233;terminer quelles sont les images dupliqu&#233;es dans le fichier ZIP. Ces duplicata sont interdits donc ignor&#233;s et les r&#232;gles CSS sont regroup&#233;es en une seule et unique r&#232;gle.</dd>
</dl>
<h3>Options du Sprite g&#233;n&#233;r&#233;</h3>
<dl>
   <dt>Espacement horizontal</dt>
   <dd>Il d&#233;termine l'espacement horizontal entre les lignes d'images du fichier image r&#233;sultat. Cette valeur doit &#234;tre assez large pour prendre en compte le <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">bug de r&#233;p&#233;tition de fond de Safari</a>. Nous vous sugg&#233;rons de laisser le param&#232;tre par d&#233;faut.</dd>
   <dt>Espacement vertical</dt>
   <dd>Il d&#233;termine l'espacement vertical entre les images cons&#233;cutives. Cette valeur doit &#234;tre assez large pour prendre en compte la possibilit&#233; d'augmenter les tailles de polices par les utilisateurs. En g&#233;n&#233;ral, nous vous recommandons que la conception de votre site supporte que les visiteurs puissent accro&#238;tre leur taille de police &#224; deux reprises avant que l'image de fond suivante soit atteinte et devienne visible dans la s&#233;quence des images.</dd>
   <dt>Couleur de fond</dt>
   <dd>Positionne la couleur de fond de l'image r&#233;sultat. Ce champ doit &#234;tre une valeur de couleur exprim&#233;e en hexad&#233;cimal sur 6 digits. S'il reste blanc et que le format de sortie est GIF ou PNG alors le fond sera transparent.</dd>
   <dt>Format du fichier Sprite</dt>
   <dd>Supporte les formats GIF, PNG et JPG. Les formats GIF et PNG peuvent avoir des fonds transparents. La valeur par d&#233;faut est PNG.</dd>
</dl>
<h3>Options des CSS g&#233;n&#233;r&#233;s</h3>
<dl>
   <dt>Pr&#233;fixe de CSS</dt>
   <dd>Chaque r&#232;gle CSS de position g&#233;n&#233;r&#233;e est pr&#233;fix&#233;e avec le texte saisi. Le pr&#233;fixage d'id et de s&#233;lecteur de classes est support&#233;. Les caract&#232;res suivants sont autoris&#233;s - <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> et <em>.</em></dd>
   <dt>Expression r&#233;guli&#232;re du nom de fichier Sprite</dt>
   <dd>N'importe quelle expression r&#233;guli&#232;re valide peut &#234;tre utilis&#233;e. Wrap rounded brackets around the section of the match you'd like to be extracted from the filename of each image. Ils seront utilis&#233;s comme base de positionnement des noms de classe.</dd>
   <dt>Pr&#233;fix de classe</dt>
   <dd>Le texte entr&#233; est pr&#233;fix&#233; devant chaque nom de classe. Il particuli&#232;rement important de renseigner ce champ lorsque les noms de classes g&#233;n&#233;r&#233;s doivent commencer par autre chose qu'un chiffre afin d'&#234;tre un s&#233;lecteur valide (comme cela est d&#233;fini par les recommandations du W3C). Les caract&#232;res suivants sont autoris&#233;s - <em>a-z</em>, <em>0-9</em>, <em>_</em> et <em>-</em>. Le pr&#233;fixe saisi ne peut pas commencer par un chiffre.</dd>
   <dt>Suffixe de CSS</dt>
   <dd>Le texte entr&#233; est suffix&#233; &#224; la fin de chaque r&#232;gle de CSS. Le &quot;Suffixe de CSS&quot; autorise les m&#234;mes caract&#232;res que le &quot;Pr&#233;fixe de CSS&quot;.</dd>
</dl>