<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Adam Kokoszka - Wyrażenia regularne</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="prism/prism.css" rel="stylesheet">
    <script>
      function WyslijKod(){
        var kod = document.getElementById('code').value;
        $("#wynik").load('kod.php', {
          wartosc: kod
        });
      }

    </script>
  </head>
  <body>
    <script src="prism/prism.js"></script>
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1>Wyrażenia regularne w JavaScript</h1>
          <section>
            <h2>Do czego służą wyrażenia regularne.</h2>
            <p>Dzięki wyrażeniom regularnym możemy w łatwy sposób badać i modyfikować tekst. Dobrym przykładem jest sposób zapisu kodu pocztowego (np. 01-234). Kod taki możemy opisać w następujący sposób: na początku są 2 dowolne cyfry, potem znak myślnika, po czym występują trzy dowolne cyfry. Powyższy opis kodu pocztowego to właśnie wzorzec. Gdy chcemy sprawdzić czy hasło podane przy rejestracji składa się np. z dużych liter, znaków specjalnych i ma odpowiednią długość znaków, to wyrażenia regularne sprawdzą się tu idealnie!
              Przykładowy wzorzec może mieć np postać:</p>
            <pre><code class="language-js">/^[0-9]{2}-[0-9]{3}$/</code></pre>
          </section>
          <section>
            <h2>Zastosowanie metody test()</h2>
            <p>Metoda test() służy do sprawdzania, czy dane wyrażenie znajduje się w tekście:</p>
            <pre><code class="language-js">var text = "12-456";
var wzor = /^[0-9]{2}-[0-9]{3}$/; 
wzor.test(text); //true - bo kod pocztowy zgadza się ze wzorem
var text2 = "23456"; 
wzor.test(tekst2); //false - bo kod pocztowy nie zawiera myślnika
var text3 = "23-s56"; 
wzor.test(tekst3); //false - bo kod pocztowy zawiera literę</code></pre>
          </section>
          <section>
            <h2>Omówienie przykładu kodu pocztowego</h2>
            <p>Wzor zapisujemy w odpowiednich znacznikach. Otwierający oraz zamykający jest taki sam: /. W środku podajemy kryterie (metaznaki), są to między innymi: </p>
            <pre><code class="language-" style="color: #ff6767;">^ - początek wzorca
$ - koniec wzorca
[0-9] - liczba od 0 do 9
{2} - dokładnie 2 poprzedzające znaki lub elementy</code></pre>
            <p>Na podstawie tych informacji możemy się dowiedzieć, że wzorzec kodu pocztowego musi zaczynać się (^) od cyfry z zakresu od 0 do 9 ([0-9]) i musi ich być dokładnie 2 ({2}), następnie musi znaleźć się myślnik (-). Później dokładnie 3 cyfry ({3}) z zakresu od 0 do 9 ([0-9]), które kończą wzorzec ($), oznacza to, że po 3 liczbach nie może znaleźć się już żaden znak.</p>
          </section>
          <section>
            <h2>Metaznaki</h2>
            <p>$, ^, [0-9] to tylko niektóre metaznaki. Poniżej znajdziesz wszystkie metaznaki wraz z opisem do czego służą. Na początku mogą się one wydawać trudne jednak po czasie są one bardzo intuicyjne.</p>

            <table class="tab">
              <tbody><tr><th>Metaznak</th><th>Znaczenie</th><th>Przykład wyrażenia</th><th>Zgodne ciągi z wyrażeniem</th><th>Niezgodne ciągi z wyrażeniem</th></tr>
                <tr><td>^</td><td>początek wzorca</td><td>^za</td><td>zapałka, zadra, zapłon, zarazek</td><td>kazanie, poza, bazar</td></tr>
                <tr><td>$</td><td>koniec wzorca</td><td>az$<br>^.arka$</td><td>uraz, pokaz<br>barka, warka</td><td>azymut, pokazy<br>parkan</td></tr>
                <tr><td>.</td><td>dowolny pojedynczy znak</td><td>.an.a</td><td>panda, Wanda, panna, kania</td><td>rana, konia</td></tr>
                <tr><td>[...]</td><td>dowolny z wymienionych znaków; możemy podawać kolejne znaki lub wpisywać zakres - na przykład [a-z] oznacza wszystkie małe litery. Wymieniając specjale znaki z końca tej tabeli nie musimy
                  poprzedzać znakiem \</td><td>[a-z]an[nd]a<br>[a-z][a-zA-Z0-9.-][pus]</td><td>pana, panda, wanna<br>pas, mAs, p2p, m3u, b-s, z.u</td><td>Wanda, kania<br>Bas, bal, balu, mp3</td></tr>
                <tr><td>[^...]</td><td>dowolny z niewymienionych znaków</td><td>kre[^st]</td><td>krew, krem</td><td>kres, kret</td></tr>
                <tr><td>|</td><td>dowolny z rozdzielonych znakiem ciągów</td><td>[nz]a|pod|przed<br>trzynasty|13-ty|13</td><td>na, za, pod, przed<br>trzynasty, 13-ty, 13</td><td>&nbsp;</td></tr>
                <tr><td>(...)</td><td>zawężenie zasięgu</td><td>g(ż|rz)eg(ż|rz)(u|ó)łka<br>(ósmy|8-my|8)(maj|maja)</td><td>gżegżółka, gżegrzółka, gżegrzułka, grzegrzułka<br>ósmy maja, 8-my maj, 8 maja</td><td>&nbsp;</td></tr>
                <tr><td>?</td><td>zero lub jeden poprzedzający znak lub element; elementem może być na przykład wyrażenie umieszczone wewnątrz nawiasów (...)</td><td>ro?uter<br>(ósmy|8(-my)?)maja?</td><td>router, ruter<br>ósmy maja, ósmy maj, 8-mymaja, 8-my maj, 8 maja, 8 maj</td><td>&nbsp;</td></tr>
                <tr><td>+</td><td>jeden lub więcej poprzedzających znaków lub elementów; elementem może być na przykład wyrażenie umieszczone wewnątrz nawiasów (...)</td><td>[0-9]+[abc]<br>pan+a<br>(tam)+</td><td>10a, 1b, 003c, 42334b<br>pana, panna, pannnna<br>tam, tamtam, tamtamtam</td><td>a, b, c, z, 14, 03, 12d, 1231z<br>paa, panda, ta, tamta, mat</td></tr>
                <tr><td>*</td><td>zero lub więcej poprzedzających znaków lub elementów; elementem może być na przykład wyrażenie umieszczone wewnątrz nawiasów (...)</td><td>[0-9]*[abc]<br>pora*n*a*</td><td>10a, 1b, 003c, 42334b, a, b, c<br>por, poa, poranna, poraannnaa, pornnna</td><td>k, 2335, porada, panna</td></tr>
                <tr><td>{4}</td><td>dokładnie 4 poprzedzające znaki lub elementy</td><td>[0-9]{4}</td><td>8765, 8273, 2635</td><td>12345, 234, 2123456</td></tr>
                <tr><td>{4,}</td><td>4 lub więcej poprzedzających znaków lub elementów</td><td>[ah]{4,}</td><td>haha, haaaaahaha, ahaaa</td><td>haa, ha, hehe, aha</td></tr>
                <tr><td>{2,4}</td><td>od 2 do 4 poprzedzających znaków lub elementów</td><td>p.{2,4}a</td><td>piana, pola, polana</td><td>psa, poranna</td></tr>
                <tr><td>\.</td><td>znak kropki</td><td>[0-9]{,3}\.[0-9]{,3}\.[0-9]{,3}</td><td>128.0.0.2</td><td>128-0-0-2</td></tr>
                <tr><td>\*</td><td>znak *</td><td>\*.+</td><td>*nic</td><td>nic*, nic</td></tr>
                <tr><td>\/</td><td>znak /</td><td>^\/\/$</td><td>//</td><td>&nbsp;</td></tr>
                <tr><td>\?</td><td>znak ?</td><td>^.+\?$</td><td>Czy to jest kot?</td><td>Czy to jest kot</td></tr>
                <tr><td>\:</td><td>znak :</td><td>^.+\:$</td><td>Oto one:</td><td>:nic</td></tr>
                <tr><td>\.</td><td>znak .</td><td>\.+</td><td>......</td><td>&nbsp;</td></tr>
                <tr><td>\^</td><td>znak ^</td><td>.*\^</td><td>To jest ^</td><td>To jest &amp;</td></tr>
                <tr><td>\+</td><td>znak +</td><td>[0-9]+\+[0-9]+</td><td>928374+29832</td><td>23873-32787<br>238738278</td></tr>
                <tr><td>\\</td><td>znak \</td><td>c\:\\</td><td>c:\</td><td>&nbsp;</td></tr>
                <tr><td>\=</td><td>znak =</td><td>[0-9]+\+[0-9]+\=[0-9]+</td><td>11+12=23</td><td>11+12+23</td></tr>
                <tr><td>\|</td><td>znak |</td><td>x \|\| y</td><td>x || y</td><td>&nbsp;</td></tr>
              </tbody>
            </table>
            <p style="text-align:right;">Tabelka pochodzi ze strony: <a href="http://kursjs.pl/kurs/regular.php">kursjs.pl</a></p>
          </section>
          <section>
            <h2>Flagi</h2>
            <p>Poza wymienionymi meta znakami istnieją specjalne parametry (flagi), które oddziałują na wyszukiwanie wzorców.:</p>
            <pre><code class="language-js">/[A-Z]/ig</code></pre>
            <table class="tab">
              <tbody><tr><th>znak Flagi</th><th>znaczenie</th></tr>
                <tr><td>i</td><td>powoduje niebranie pod uwagę wielkości liter</td></tr>
                <tr><td>g</td><td>powoduje zwracanie wszystkich psujących fragmentów, a nie tylko pierwszego</td></tr>
                <tr><td>m</td><td>powoduje wyszukiwanie w tekście kilku liniowym. W trybie tym znak początku i końca wzorca (^$) jest
                  wstawiany przed i po znaku nowej linii (\n).</td></tr>
              </tbody>
            </table>
            <p style="text-align:right;">Tabelka pochodzi ze strony: <a href="http://kursjs.pl/kurs/regular.php">kursjs.pl</a></p>
          </section>
          <section>
            <h2>Klasy znaków</h2>
            <p>Dodatkowo Javascript udostępnia specjalne klasy znaków. Zamiast wyszukiwać wszystkie litery za pomocą [a-zA-Z_] możemy skorzystać z klasy znaków \w.</p>
            <table class="tab">
              <tbody><tr><th>Klasa znaków</th><th>znaczenie</th></tr>
                <tr><td>\s</td><td>znak spacji, tabulacji lub nowego wiersza</td></tr>
                <tr><td>\S</td><td>znak nie będący spacją, tabulacją lub znakiem nowego wiersza</td></tr>
                <tr><td>\w</td><td>każdy znak będący literą, cyfrą i znakiem _</td></tr>
                <tr><td>\W</td><td>każdy znak nie będący literą, cyfrą i znakiem _</td></tr>
                <tr><td>\d</td><td>każdy znak będący cyfrą</td></tr>
                <tr><td>\D</td><td>każdy znak nie będący cyfrą</td></tr>
              </tbody>
            </table>
            <p style="text-align:right;">Tabelka pochodzi ze strony: <a href="http://kursjs.pl/kurs/regular.php">kursjs.pl</a></p>
          </section>

          <h1>Pozostałe metody</h1>
          <section>
            <p style="text-align: center;">Oprócz najpopularniejszej metody test() istnieją również metody takie jak: exec(), match(), search() oraz replace().</p>
          </section>
          <section>
            <h2>Zastosowanie metody  exec()</h2>
            <p>Zwraca szukany ciąg zanków oraz pierwszy index pasującego fragmentu. Jeżeli metoda nic nie znajdzie, zwróci null.</p>
            <pre><code class="language-js">var text = "abacadac";
var wzor = /ac/ig;
var wynik = wzor.exec(text);// ac, 2 - ponieważ najbliższe "ac" znajduje się na 2 pozycji licząc od 0</code></pre>
          </section>
          <section>
            <h2>Zastosowanie metody  Match()</h2>
            <p>Zwraca od razu wszystkie pasujące fragmenty. Jeżeli metoda nic nie znajdzie, zwróci null.</p>
            <pre><code class="language-js">var text = "Numer1, Numer2, Numer3, NumerA, NumerB, NumerC";
var wzor = /Numer[1-2A-B]/g;
var wynik = text.match(wzor);// Numer1, Numer2, NumerA, NumerB</code></pre>
          </section>
          <section>
            <h2>Zastosowanie metody search()</h2>
            <p>Metoda search() zwraca indeks pierwszego wystąpienia podciągu w ciągu:</p>
            <pre><code class="language-js">var text = "Adam poszedł do sklepu po gruszki";
var wzor = /po/g;
var wynik = text.search(wzor);// 5 - ponieważ najbliższe "po" znajduje się na 5 pozycji licząc od 0</code></pre>
          </section>
          <section>
            <h2>Zastosowanie metody replace()</h2>
            <p>Obiekt string posiada metodę replace(), która służy do zamiany jednego ciągu na drugi. Przy jej stosowaniu możemy używać wyrażeń regularnych:</p>
            <pre><code class="language-js">var text = "Adam poszedł do sklepu po gruszki";
var wzor = /gruszki/;
var wynik = text.replace(wzor,"śliwki");// Adam poszedł do sklepu po śliwki</code></pre>
          </section>
          <h1>Przetestuj swoje umiejętności!</h1>
          <section>
            <p style="text-align:center;">Przygotowałem dla Ciebie specjalny panel w którym możesz sprawdzić swoje umiejętności pisząc kod samemu. <br>Aby zobaczyć rezultat używaj funkcji alert() lub console.log() <br>Udanej zabawy! :)</p>
          </section>
          <section>
            <div class="diy">
              <textarea id="code" cols="30" rows="10">var text = "Numer1, Numer2, Numer3, NumerA, NumerB, NumerC";
var wzor = /Numer[1-2A-B]/g;
var wynik = text.match(wzor);

alert(wynik);</textarea>
              <input type="button" value="Sprawdź!" id="button-code" onclick="WyslijKod()">
              <div id="wynik"></div>
              <script>
              /*  var text = "Adam poszedł do sklepu po gruszki";
                var wzor = /po/g;
                var wynik = text.search(wzor);


                alert(wynik);*/
              </script>
            </div>
          </section>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <section>
            <h3 style="text-align: center;">Informacje o autorze oraz źródłach</h3>
            <p>Autor strony: Adam Kokoszka</p>
            <p>Informacje dotyczące strony zostały użyte ze stron: <br>
              <a href="http://kursjs.pl/kurs/regular.php">kursjs.pl/kurs</a> <br>
              <a href="https://www.w3schools.com/jsref/jsref_obj_regexp.asp">www.w3schools.com</a></p>
          </section>
        </div>
      </div>
    </div>


  </body>
</html>