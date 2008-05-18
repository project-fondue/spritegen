<p>As Sprites CSS são uma forma de reduzir o número de pedidos HTTP feitos para os recursos gráficos pelo seu site. As imagens são combinadas em uma imagem alargada nas coordenadas X e Y definidas. Após atribuir a imagem gerada aos elementos referentes da página, a propriedade CSS <code>background-position</code> pode ser utilizada para deslocar a área visível necessária para a componente gráfica.</p>
<p>Esta técnica pode ser muito eficaz para melhorar o desempenho do site, nomeadamente em situações em que muitas imagens pequenas, tais como os ícones de menu, são utilizadas. A <a href="http://www.yahoo.com/"> homepage do Yahoo!</a>, por exemplo, aplica esta técnica exactamente para isso.</p>
<h2>Gotchas</h2>
<p>Existem alguns bugs realmente irritantes que deve considerar quando criar Sprites CSS.</p>
<h3>Opera</h3>
<p>O Opera (pelo menos tanto quanto à versão 9.0) não vai reconhecer uma posição do fundo superior a 2042px ou inferior a -2042px, usando esse valor limite em vez. A ferramenta contorna este bug, criando novas colunas dentro da imagem de saída sempre que o limite vertical é alcançado.</p>
<h3>Safari</h3>
<p><a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">O Safari tem um problema com a repetição de imagens de fundo </a>. Felizmente, isso pode ser facilmente resolvido especificando um valor de offset horizontal suficientemente grande (configurável).</p>
<h2>Leitura</h2>
<p>A <a href="http://www.alistapart.com/">A List Apart</a> publicou um artigo intitulado <a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing's Kiss of Death</a> que explica o conceito por detrás das Sprites CSS. Se esta técnica é nova para si, sugerimos que vá à <a href="http://www.alistapart.com/">A List Apart</a> e dê uma olhadela.</p>
