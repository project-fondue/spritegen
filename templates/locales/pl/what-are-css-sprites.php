<p>Sprajty CSS są sposobem na zredukowanie liczby żądań HTTP tworzonych dla obrazków, umieszczonych na Twojej stronie. Obrazki są łączone w jeden większy, pod zdefiniowanymi współrzędnymi X i Y. Podstawiając ten wygenerowany obrazek do elementów strony i używając własności CSS <code>background-position</code>, można wyświetlić potrzebny w danym miejscu fragment obrazka.</p>
<p>Technika ta może być bardzo efektywna w zwiększaniu wydajności strony, szczególnie w sytuacjach gdy na stronie znajduje się wiele małych obrazków, takich jak ikony. Dla przykładu <a href="http://www.yahoo.com/">Yahoo! home page</a> używa tej techniki do wyświetlania ikon.</p>
<h2>Niedogodności</h2>
<p>Istnieje kilka denerwujących błędów w przeglądarkach, na które trzeba uważać podczas tworzenia sprajtów CSS.</p>
<h3>Opera</h3>
<p>Opera (co najmniej do wersji 9.0) nie rozpoznaje wartości pozycji tła większych niż 2042px lub mniejszych niż -2042px używając tej wartości jako granicznej. Narzędzie nasze rozwiązuje ten problem poprzez tworzenie w obrazku nowych kolumn za każdym razem, gdy pionowy limit zostaje przekroczony.</p>
<h3>Safari</h3>
<p><a href="http://creativebits.org/webdev/safari_background_repeat_bug_fix">Safari ma problemy z powtarzaniem obrazków tła</a>. Na szczęście łatwo można to rozwiązać poprzez ustawienie odpowiednio dużych marginesów poziomych (konfigurowalne).</p>
<h2>Dalsze informacje</h2>
<p><a href="http://www.alistapart.com/">A List Apart</a> opublikował artykuł zatytułowany <a href="http://www.alistapart.com/articles/sprites">CSS Sprites: Image Slicing's Kiss of Death</a>, który wyjaśnia koncepcję CSS sprites. Jeśli jesteś początkujący w tej technice stanowczo zachęcamy udać się na <a href="http://www.alistapart.com/">A List Apart</a> i zaznajomić z tematem.</p>