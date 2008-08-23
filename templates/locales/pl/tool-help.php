<p>To narzędzie pozwala zautomatyzować proces generowania sprajtów CSS. Wystarczy podać mu plik ZIP zawierający 2 lub więcej obrazków (GIF, PNG lub JPG), a wygeneruje jeden duży obrazek i odpowiadające mu reguły CSS, pozwalające na wyświetlenie każdego sprajta z osobna.</p>
<h2>Opcje</h2>
<p>Narzędzie posiada opcje, które możesz konfigurować aby dostosować charakterystykę generowanego obrazka i arkusza styli CSS do specyfiki Twojej strony. Opcje te przedstawiają się następująco:</p>
<h3>Zmiana rozmiaru obrazków źródłowych</h3>
<dl>
   <dt>Szerokość &amp; Wysokość</dt>
   <dd>Jeśli wysokość lub szerokość zostanie ustawiona na mniej niż 100%, obrazki źródłowe będą zmniejszone zanim zostaną sklejone w sprajta wyjściowego. Narzędzie nie pozwala ustalić wartości większej niż 100%, ponieważ powiększanie obrazków powoduje utratę jakości. Domyślną wartością dla szerokości i wysokości jest 100% (nie zmienia rozmiarów).</dd>
</dl>
<h3>Duplikaty obrazków</h3>
<dl>
   <dt>Nie szukaj duplikatów</dt>
   <dd>Jeśli znajdą się identyczne obrazki, i tak zostaną dla nich utworzone osobne reguły CSS.</dd>
   <dt>Nie dołączaj duplikatów obrazków tylko połącz ich reguły CSS</dt>
   <dd>Narzędzie porównuje sumy MD5 każdego obrazka żeby sprawdzić, które z nich się powtarzają w archiwum ZIP. Te powtarzające się nie są przetwarzane, a jedynie tworzona jest dla nich jedna zbiorcza reguła CSS.</dd>
</dl>
<h3>Opcje Sprajta</h3>
<dl>
   <dt>Przesunięcie poziome</dt>
   <dd>Determinuje poziome odstępy pomiędzy kolumnami obrazków w sprajcie wyjściowym. Wartość ta powinna być na tyle duża, aby uwzględnić <a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">błąd powtarzania tła przeglądarki Safari</a>. Sugerujemy zostać przy wartości domyślnej.</dd>
   <dt>Przesunięcie poziome</dt>
   <dd>Determinuje pionowe odstępy między sąsiednimi obrazkami. Wartość powinna być na tyle duża, aby uwzględniała większe wielkości czcionek użytkownika. Generalnie zalecamy projektować stronę tak, aby odwiedzający mogli zwiększyć rozmiar czcionki dwukrotnie, zanim zacznie pojawiać się następny obrazek w sekwencji sprajta.</dd>
   <dt>Kolor tła</dt>
   <dd>Ustawia kolor tła obrazka wyjściowego. Pole powinno zawierać 6 cyfrową wartość heksadecymalną. Jeśli pozostanie puste i format wyjściowy pliku zostanie ustawiony jako GIF lub PNG, to tło będzie przezroczyste.</dd>
   <dt>Format wyjściowy</dt>
   <dd>Obsługuje GIF, PNG i JPG. GIF i PNG mogą mieć przezroczyste tła. Wartość domyślna to PNG.</dd>
   <dt>Liczba kolorów</dt>
   <dd>Określa liczbę kolorów użytych w wyjściowym pliku, aby zredukować wielkość pliku. Ma zastosowanie do formatów PNG oraz GIF.</dd>
   <dt>Jakość obrazka</dt>
   <dd>Określa jakość obrazka wyjściowego (stopień kompresji) w procentach. Dotyczy tylko formatu JPEG.</dd>
   <dt>Kompresuj obrazek programem OptiPNG</dt>
   <dd>Kiedy zaznaczone, plik wyjściowy obrazka jest przetwarzany narzędziem <a href="http://optipng.sourceforge.net/">OptiPNG</a>, aby zredukować jego rozmiar. Często zmniejsza to rozmiar pliku o połowę. Ma zastosowanie tylko do obrazków PNG.</dd>
</dl>
<h3>Opcje CSS</h3>
<dl>
   <dt>Przyrostek CSS</dt>
   <dd>Każda reguła w CSS jest poprzedzana wpisanym tekstem. Można tutaj wpisać podstawowe selektory id i klas. Dozwolone są następujące znaki - <em>a-z</em>, <em>0-9</em>, <em>_</em>, <em>-</em>, <em>#</em> i <em>.</em></dd>
   <dt>Wzorzec nazwy pliku</dt>
   <dd>Może być tutaj użyte każde poprawne wyrażenie regularne. Obejmij zwykłymi nawiasami sekcję dopasowaną przez wyrażenie regularne, która będzie użyta jako nazwa podstawowa przy generowaniu nazw klas CSS.</dd>
   <dt>Przedrostek Klasy</dt>
   <dd>Wpisany tekst będzie doklejony z przodu każdej wygenerowanej nazwy klasy. Jest to ważne w przypadku gdy istnieje prawdopodobieństwo, że generowane nazwy klas mogą rozpoczynać się od cyfr. Prowadziłoby to powstawania nieprawidłowych (wg rekomendacji W3C) selektorów. Dozwolone są następujące znaki - <em>a-z</em>, <em>0-9</em>, <em>_</em> i <em>-</em>. Przedrostek nie może rozpoczynać się od cyfry.</dd>
   <dt>Przyrostek CSS</dt>
   <dd>Wpisany tekst zostanie dodany na koniec każdej reguły CSS. &quot;Przyrostek CSS&quot; dopuszcza stosowanie takich samych znaków jak &quot;Przedrostek Klasy&quot;.</dd>
</dl>