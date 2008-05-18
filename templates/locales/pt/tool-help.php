<p>Esta ferramenta permite automatizar o processo de criação de Sprites CSS. Basta fornecer um arquivo ZIP contendo 2 ou mais imagens (GIF, PNG ou JPG) e ela irá gerar uma imagem sprite e as regras CSS correspondentes para segmentar e exibir cada componente da imagem.</p>
<h2>Opções</h2>
<p>A ferramenta tem uma série de opções que você pode configurar para  modificar características da imagem gerada e CSS, e melhor adaptar  às especificidades do seu site. Essas opções são  descritas a seguir:</p>
<h3>Redimensionar Imagens Fonte</h3>
<dl>
  <dt>Largura & Altura</dt>
  <dd>Se a largura ou altura são definidos para menos de 100%, as imagens fonte serão reduzidas em tamanho, antes de serem copiadas para a  imagem de saída. A ferramenta não permite que você especifique um valor  superior a 100%, porque aumentar imagens em tamanho resulta em uma  redução da qualidade de imagem. O padrão para a largura e a altura é  de 100% (sem redimensionamento).</dd>
</dl>
<h3>Imagens Duplicadas</h3>
<dl>
  <dt>Ignorar imagens duplicadas</dt>
  <dd>Imagens duplicadas são copiadas para a imagem de saída e são criadas regras CSS para cada duplicado.</dd>
  <dt>Remover imagens duplicadas mas fundir as classes</dt>
  <dd>Esta ferramenta compara a MD5 dos conteúdos de cada imagem para determinar com precisão quais são as duplicadas de outras imagens contidas no ficheiro ZIP. Estas duplicadas são ignoradas e as regras CSS para as imagens duplicadas são combinadas em apenas uma regra.</dd>
</dl>
<h3>Opções de Saída da Sprite</h3>
<dl>
  <dt>Offset Horizontal</dt>
  <dd>Determina o espaçamento horizontal entre linhas nas imagens de saída. Este valor tem que ser suficientemente grande para contornar o <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">bug de repetição de fundos no Safari</a>. Sugerimos que deixe o valor padrão.</dd>
  <dt>Offset Vertical</dt>
  <dd>Esta determina o espaçamento vertical entre cada imagem consecutiva.  Esta deve suficientemente grande para considerar o aumento de fonte pelo utilizador. Geralmente nós recomendamos que você desenhe o  seu site para que os visitantes possam aumentar seu tamanho da fonte  duas vezes antes da próxima imagem de fundo na sequência tornar-se  visível.</dd>
  <dt>Cor do fundo</dt>
  <dd>Define uma cor de fundo para a imagem de saída. Este campo tem um valor  de 6 dígitos da cor hexadecimal. Se ficar em branco e o formato de saída é  definido para GIF ou PNG, então o Fundo será transparente.</dd>
  <dt>Formato de saída da Sprite</dt>
  <dd>Suporta GIF, PNG e JPG. O GIF e o PNG podem conter fundos transparentes. O padrão é PNG.</dd>
</dl>
<h3>Opções de saída CSS</h3>
<dl>
  <dt>Prefixo CSS</dt>
  <dd>Cada regra de posição CSS gerada é prefixada com o texto introduzido. A prefixação de id básicas e classes de selectores é suportada. O seguintes caracteres são permitidos: - <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> e <em>.</em></dd>
  <dt>Padrão do nome do ficheiro</dt>
  <dd>Qualquer expressão regular pode ser utilizada. Introduza entre parêntesis em torno da secção de que gostaria de ser extraído o nome de cada imagem. Este será utilizado como a base do posicionamento dos nomes das classes.</dd>
  <dt>Prefixo da classe</dt>
  <dd>O texto introduzido será adicionado antes do nome de cada classe gerada. É  particularmente importante para especificar nos nomes das classes geradas, senão começar o nome com um número  iria resultar em selectores inválidos (conforme definido pelo recomendações W3C). Os  seguintes caracteres são permitidos - <em>a-z</em>, <em>0-9</em>, <em>_</em>e <em>-</em>. O prefixo introduzido não pode começar com um número.</dd>
  <dt>Sufixo CSS</dt>
  <dd>O texto introduzido será adicionado ao fim de cada regra CSS. O "Sufixo CSS" permite os mesmo caracteres que o "Prefixo da classe".</dd>
</dl>
