<p>Esta ferramenta permite automatizar o processo de cria&ccedil;&atilde;o de Sprites CSS. Basta fornecer um arquivo ZIP contendo 2 ou mais imagens (GIF, PNG ou JPG) e ela ir&aacute; gerar uma imagem sprite e as regras CSS correspondentes para segmentar e exibir cada componente da imagem.</p>
<h2>Op&ccedil;&otilde;es</h2>
<p>A ferramenta tem uma s&eacute;rie de op&ccedil;&otilde;es que voc&ecirc; pode configurar para  modificar caracter&iacute;sticas da imagem gerada e CSS, e melhor adaptar  &agrave;s especificidades do seu site. Essas op&ccedil;&otilde;es s&atilde;o  descritas a seguir:</p>
<h3>Redimensionar Imagens Fonte</h3>
<dl>
  <dt>Largura &amp; Altura</dt>
  <dd>Se a largura ou altura s&atilde;o definidos para menos de 100%, as imagens fonte ser&atilde;o reduzidas em tamanho, antes de serem copiadas para a  imagem de sa&iacute;da. A ferramenta n&atilde;o permite que voc&ecirc; especifique um valor  superior a 100%, porque aumentar imagens em tamanho resulta em uma  redu&ccedil;&atilde;o da qualidade de imagem. O padr&atilde;o para a largura e a altura &eacute;  de 100% (sem redimensionamento).</dd>
</dl>
<h3>Imagens Duplicadas</h3>
<dl>
  <dt>Ignorar imagens duplicadas</dt>
  <dd>Imagens duplicadas s&atilde;o copiadas para a imagem de sa&iacute;da e s&atilde;o criadas regras CSS para cada duplicado.</dd>
  <dt>Remover imagens duplicadas mas fundir as classes</dt>
  <dd>Esta ferramenta compara a MD5 dos conte&uacute;dos de cada imagem para determinar com precis&atilde;o quais s&atilde;o as duplicadas de outras imagens contidas no ficheiro ZIP. Estas duplicadas s&atilde;o ignoradas e as regras CSS para as imagens duplicadas s&atilde;o combinadas em apenas uma regra.</dd>
</dl>
<h3>Opções de Sa&iacute;da da Sprite</h3>
<dl>
  <dt>Afastamento Horizontal</dt>
  <dd>Determina o espa&ccedil;amento horizontal entre linhas nas imagens de sa&iacute;da. Este valor tem que ser suficientemente grande para contornar o <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">bug de repeti&ccedil;&atilde;o de fundos no Safari</a>. Sugerimos que deixe o valor padr&atilde;o.</dd>
  <dt>Afastamento Vertical</dt>
  <dd>Esta determina o espa&ccedil;amento vertical entre cada imagem consecutiva.  Esta deve suficientemente grande para considerar o aumento de fonte pelo utilizador. Geralmente n&oacute;s recomendamos que desenhe o  seu site para que os visitantes possam aumentar seu tamanho da fonte  duas vezes antes da pr&oacute;xima imagem de fundo na sequ&ecirc;ncia tornar-se  vis&iacute;vel.</dd>
  <dt>Cor do fundo</dt>
  <dd>Define uma cor de fundo para a imagem de sa&iacute;da. Este campo tem um valor  de 6 d&iacute;gitos da cor hexadecimal. Se ficar em branco e o formato de sa&iacute;da &eacute;  definido para GIF ou PNG, ent&atilde;o o Fundo ser&aacute; transparente.</dd>
  <dt>Formato de sa&iacute;da da Sprite</dt>
  <dd>Suporta GIF, PNG e JPG. O GIF e o PNG podem conter fundos transparentes. O padr&atilde;o &eacute; PNG.</dd>
  <dt>N&uacute;mero de Cores</dt>
  <dd>Restringe o n&uacute;mero de cores utilizadas no ficheiro de sa&iacute;da, para reduzir o tamanho do ficheiro. Esta op&ccedil;&atilde;o aplica-se aos PNGs e GIFs.</dd>
  <dt>Qualidade da Imagem</dt>
  <dd>Especifica a qualidade da imagem de sa&iacute;da como percentagem. Esta op&ccedil;&atilde;o aplica-se apenas aos JPEGs.</dd>
  <dt>Comprimir Imagem com o OptiPNG</dt>
  <dd>Quando seleccionada, o ficheiro de sa&iacute;da &eacute; processado com o <a href="http://optipng.sourceforge.net/">OptiPNG</a> para reduzir o tamanho. Muitas vezes esta op&ccedil;&atilde;o reduz para metade do tamanho do ficheiro. Esta op&ccedil;&atilde;o aplica-se apenas aos PNGs.</dd>
</dl>
<h3>Op&ccedil;&otilde;es de sa&iacute;da CSS</h3>
<dl>
  <dt>Prefixo CSS</dt>
  <dd>Cada regra de posi&ccedil;&atilde;o CSS gerada &eacute; prefixada com o texto introduzido. A prefixa&ccedil;&atilde;o de id b&aacute;sicas e classes de selectores &eacute; suportada. O seguintes caracteres s&atilde;o permitidos: - <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> e <em>.</em></dd>
  <dt>Padr&atilde;o do nome do ficheiro</dt>
  <dd>Qualquer express&atilde;o regular pode ser utilizada. Introduza entre par&ecirc;ntesis em torno da sec&ccedil;&atilde;o de que gostaria de ser extra&iacute;do o nome de cada imagem. Este ser&aacute; utilizado como a base do posicionamento dos nomes das classes.</dd>
  <dt>Prefixo da classe</dt>
  <dd>O texto introduzido ser&aacute; adicionado antes do nome de cada classe gerada. &Eacute;  particularmente importante para especificar nos nomes das classes geradas, sen&atilde;o come&ccedil;ar o nome com um n&uacute;mero  iria resultar em selectores inv&aacute;lidos (conforme definido pelo recomenda&ccedil;&otilde;es W3C). Os  seguintes caracteres s&atilde;o permitidos - <em>a-z</em>, <em>0-9</em>, <em>_</em>e <em>-</em>. O prefixo introduzido n&atilde;o pode come&ccedil;ar com um n&uacute;mero.</dd>
  <dt>Sufixo CSS</dt>
  <dd>O texto introduzido ser&aacute; adicionado ao fim de cada regra CSS. O &quot;Sufixo CSS&quot; permite os mesmo caracteres que o &quot;Prefixo da classe&quot;.</dd>
</dl>