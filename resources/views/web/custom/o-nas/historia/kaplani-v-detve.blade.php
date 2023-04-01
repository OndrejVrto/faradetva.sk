<x-web.layout.master :pageData="$pageData">

    {{-- Kapláni v Detve --}}

    <x-web.page.section name="PAGE: ({{ $pageData->title }})" class="static-page pad_b_50">

        <div class="container text-center">
            <ul class="list-unstyled card-columns">
                <x-partials.columns-list years="1898 - 1899" name="Karol František Majthán"/>
                <x-partials.columns-list years="1898 - 1902" name="František Selecký"/>
                <x-partials.columns-list years="1898 - 1899" name="Ján Uhrin"/>
                <x-partials.columns-list years="1899 - 1900" name="Ján Murgaš"/>
                <x-partials.columns-list years="1899 - 1901" name="Karol Anton Medvecký"/>
                <x-partials.columns-list years="1901 - 1902" name="Ignác Lucký" description="druhýkrát"/>
                <x-partials.columns-list years="1902 - 1904" name="Jozef Formánek"/>
                <x-partials.columns-list years="1902 - 1903" name="Karol Burka"/>
                <x-partials.columns-list years="1903"        name="Silvester Jung"/>
                <x-partials.columns-list years="1904 - 1905" name="Ján Uhrin" description="druhýkrát"/>
                <x-partials.columns-list years="1904"        name="Silvester Jung" description="druhýkrát"/>
                <x-partials.columns-list years="1904 - 1906" name="Eduard Majerský"/>
                <x-partials.columns-list years="1905 - 1906" name="Gejza Kossányi"/>
                <x-partials.columns-list years="1906 - 1907" name="Ignác Ficzel"/>
                <x-partials.columns-list years="1906 - 1907" name="Ján Záhora"/>
                <x-partials.columns-list years="1907 - 1909" name="Ján Kuchárik"/>
                <x-partials.columns-list years="1907 - 1908" name="Ján Kalina"/>
                <x-partials.columns-list years="1909 - 1910" name="František Šimoni"/>
                <x-partials.columns-list years="1910 - 1911" name="Augustín Szkalák"/>
                <x-partials.columns-list years="1910 - 1911" name="Jozef Jekkel"/>
                <x-partials.columns-list years="???? - 1911" name="Ján Szirmai"/>
                <x-partials.columns-list years="1911"        name="Štefan Čerei"/>
                <x-partials.columns-list years="1911 - 1913" name="Jozef Svehlik"/>
                <x-partials.columns-list years="1911 - 1912" name="Vincent Zvarik"/>
                <x-partials.columns-list years="1911 - 1913" name="František Horáček"/>
                <x-partials.columns-list years="1912 - 1914" name="Karol Burka"/>
                <x-partials.columns-list years="1912 - 1913" name="Ján Baránik"/>
                <x-partials.columns-list years="1913 - 1914" name="Rudolf Málik"/>
                <x-partials.columns-list years="1913 - 1915" name="Koloman Senček"/>
                <x-partials.columns-list years="1913"        name="Vincent Puskailer"/>
                <x-partials.columns-list years="1913 - 1914" name="Július Felix"/>
                <x-partials.columns-list years="1914 - 1915" name="Vincent Puskailer" description="druhýkrát"/>
                <x-partials.columns-list years="1914 - 1915" name="Jozef Janči"/>
                <x-partials.columns-list years="1915 - 1916" name="Vavrinec Černy"/>
                <x-partials.columns-list years="1915 - 1916" name="Štefan Ďurkovič"/>
                <x-partials.columns-list years="1915 - 1918" name="Emil Dlhý"/>
                <x-partials.columns-list years="1916 - 1918" name="Anton Šalát"/>
                <x-partials.columns-list years="1918"        name="Peter Briška"/>
                <x-partials.columns-list years="1918 - 1921" name="Lukáš Petráš"/>
                <x-partials.columns-list years="1918"        name="Štefan Večerek"/>
                <x-partials.columns-list years="1918 - 1919" name="Alexander Vajcík"/>
                <x-partials.columns-list years="1919"        name="František Horáček" description="druhýkrát"/>
                <x-partials.columns-list years="1919 - 1920" name="Emil Dlhý" description="druhýkrát"/>
                <x-partials.columns-list years="1919 - 1920" name="Ján Ferjanec"/>
                <x-partials.columns-list years="1920 - 1922" name="Alexander Vajcík" description="druhýkrát"/>
                <x-partials.columns-list years="1921 - 1923" name="Vincent Tomeček"/>
                <x-partials.columns-list years="1922 - 1924" name="Jozef Petruch"/>
                <x-partials.columns-list years="1923"        name="Jozef Búda" description="<br><br>"/>    {{--  Zmaž BR v tomto riadku ak budeš potrebovať zmeniť zalomenie --}}
                <x-partials.columns-list years="1924 - 1926" name="Jozef Bundzel"/>
                <x-partials.columns-list years="1925 - 1926" name="Peter Petic"/>
                <x-partials.columns-list years="1926 - 1927" name="Jozef Búda" description="druhýkrát"/>
                <x-partials.columns-list years="1926 - 1928" name="Jakub Šefčík"/>
                <x-partials.columns-list years="1929"        name="Anton Veselovský"/>
                <x-partials.columns-list years="1929 - 1930" name="Anton Kmeť"/>
                <x-partials.columns-list years="1930"        name="Pavel Majerčák"/>
                <x-partials.columns-list years="1930 - 1932" name="Anzelm Kapitán"/>
                <x-partials.columns-list years="1933 - 1935" name="Rudolf Lehotský"/>
                <x-partials.columns-list years="1935"        name="Matej Zaťko"/>
                <x-partials.columns-list years="1935 - 1936" name="Michal Minárik"/>
                <x-partials.columns-list years="1936 - 1937" name="Emil Ondrík"/>
                <x-partials.columns-list years="1937"        name="Ľudovít Bobrovský"/>
                <x-partials.columns-list years="1937"        name="Michal Hukel"/>
                <x-partials.columns-list years="1937 - 1938" name="Jozef Kliman"/>
                <x-partials.columns-list years="1937 - 1939" name="Jozef Noga"/>
                <x-partials.columns-list years="1938 - 1940" name="Pavol Lihotský"/>
                <x-partials.columns-list years="1939 - 1944" name="Jozef Ďurkovič"/>
                <x-partials.columns-list years="1940 - 1941" name="Emil Ondrík" description="druhýkrát"/>
                <x-partials.columns-list years="1941"        name="Jozef Hrmo"/>
                <x-partials.columns-list years="1941 - 1943" name="Emil Šišan"/>
                <x-partials.columns-list years="1943 - 1945" name="Anton Vačko"/>
                <x-partials.columns-list years="1944 - 1945" name="Vojtech Zjara"/>
                <x-partials.columns-list years="1945 - 1947" name="Jozef Pekár"/>
                <x-partials.columns-list years="1945"        name="Jozafát Imrich Mokroš CCG"/>
                <x-partials.columns-list years="1946 - 1948" name="Vincent Wahlandt"/>
                <x-partials.columns-list years="1948"        name="Jozef Čeman"/>
                <x-partials.columns-list years="1948 - 1949" name="Ladislav Hromádka"/>
                <x-partials.columns-list years="1948 - 1951" name="Miroslav Marek"/>
                <x-partials.columns-list years="1949 - 1953" name="Stanislav Majer"/>
                <x-partials.columns-list years="1951 - 1953" name="Stanislav Galbavý SDB"/>
                <x-partials.columns-list years="1953 - 1956" name="Jozef Čeman" description="druhýkrát"/>
                <x-partials.columns-list years="1953 - 1954" name="Ľudovít Šimončík"/>
                <x-partials.columns-list years="1954 - 1955" name="František Očenáš"/>
                <x-partials.columns-list years="1955 - 1957" name="Štefan Dobrovodský"/>
                <x-partials.columns-list years="1956 - 1957" name="Jozef Chmelo"/>
                <x-partials.columns-list years="1957 - 1958" name="Alfonz František Broniš OFM"/>
                <x-partials.columns-list years="1957 - 1958" name="Štefan Sámel"/>
                <x-partials.columns-list years="1958"        name="Maurus Pavel Pataky OSB"/>
                <x-partials.columns-list years="1958 - 1960" name="Jozef Krajči"/>
                <x-partials.columns-list years="1959 - 1960" name="Ignác Lenhardt" description="výp. duchovný"/>
                <x-partials.columns-list years="1960 - 1962" name="Martin Čabák"/>
                <x-partials.columns-list years="1960 - 1962" name="Juraj Sloboda"/>
                <x-partials.columns-list years="1962 - 1963" name="Vincent Wahlandt" description="druhýkrát"/>
                <x-partials.columns-list years="1962 - 1964" name="Jozef Macko"/>
                <x-partials.columns-list years="1963"        name="Jaroslav Pecha"/>
                <x-partials.columns-list years="1964 - 1966" name="Rudolf Hudec"/>
                <x-partials.columns-list years="1965 - 1966" name="Pavol Kandera"/>
                <x-partials.columns-list years="1966 - 1967" name="Ambróz Kubiš"/>
                <x-partials.columns-list years="1966 - 1967" name="Jozef Laca"/>
                <x-partials.columns-list years="1967 - 1969" name="Vladimír Macinka"/>
                <x-partials.columns-list years="1967 - 1973" name="Viktor Koštialik"/>
                <x-partials.columns-list years="1969 - 1970" name="Imrich Vážan"/>
                <x-partials.columns-list years="1970 - 1972" name="Ján Špiriak"/>
                <x-partials.columns-list years="1972 - 1976" name="Anton Sojka"/>
                <x-partials.columns-list years="1973 - 1978" name="Martin Mojžiš"/>
                <x-partials.columns-list years="1976 - 1977" name="Pavol Kollár"/>
                <x-partials.columns-list years="1977 - 1982" name="Jozef Hrtús"/>
                <x-partials.columns-list years="1978 - 1980" name="Róbert Andrášik"/>
                <x-partials.columns-list years="1981 - 1987" name="Ján Klimo"/>
                <x-partials.columns-list years="1982 - 1983" name="Štefan Topor"/>
                <x-partials.columns-list years="1984 - 1985" name="Pavol Párničan"/>
                <x-partials.columns-list years="1985 - 1988" name="Vladimír Farkaš"/>
                <x-partials.columns-list years="1988"        name="Róbert Bezák"/>
                <x-partials.columns-list years="1988 - 1989" name="Anton Pavlásek"/>
                <x-partials.columns-list years="1988 - 1990" name="Ľuboš Sabol"/>
                <x-partials.columns-list years="1989 - 1990" name="Ladislav Jurčík"/>
                <x-partials.columns-list years="1990"        name="Ján Kováč"/>
                <x-partials.columns-list years="1990 - 1991" name="Ján Krajčík"/>
                <x-partials.columns-list years="1990 - 1992" name="Marián Bublinec"/>
                <x-partials.columns-list years="1991 - 1992" name="Ján Gál"/>
                <x-partials.columns-list years="1992 - 1993" name="Jozef Kožuch"/>
                <x-partials.columns-list years="1992 - 1993" name="Pavol Párničan" description="výp. duchovný"/>
                <x-partials.columns-list years="1993 - 1994" name="Dušan Horváth"/>
                <x-partials.columns-list years="1994 - 1996" name="Dominik Markoš"/>
                <x-partials.columns-list years="1996 - 1997" name="Dušan Mesík"/>
                <x-partials.columns-list years="1997 - 1998" name="Peter Marcinko"/>
                <x-partials.columns-list years="1998"        name="Martin Mojžiš" description="dočasne druhýkrát"/>
                <x-partials.columns-list years="1998 - 1999" name="Branislav Dado"/>
                <x-partials.columns-list years="1999 - 2001" name="Ondrej Spišiak"/>
                <x-partials.columns-list years="1999 - 2000" name="Ján Viglaš"/>
                <x-partials.columns-list years="2000 - 2002" name="Jozef Petrík"/>
                <x-partials.columns-list years="2001 - 2004" name="Peter Staroštík"/>
                <x-partials.columns-list years="2002 - 2003" name="Marián Krajč"/>
                <x-partials.columns-list years="2004 - 2005" name="Pavol Pečko"/>
                <x-partials.columns-list years="2004 - 2008" name="Roman Stieranka"/>
                <x-partials.columns-list years="2007 - 2010" name="Marek Hraňo"/>
                <x-partials.columns-list years="2008 - 2009" name="Oliver Černák"/>
                <x-partials.columns-list years="2009 - 2010" name="Michal Lajcha"/>
                <x-partials.columns-list years="2010 - 2011" name="Peter Ondrík"/>
                <x-partials.columns-list years="2010 - 2012" name="Zdeněk Zoltánfi"/>
                <x-partials.columns-list years="2011 - 2014" name="Peter Baláž"/>
                <x-partials.columns-list years="2012 - 2015" name="Vladimír Václavík"/>
                <x-partials.columns-list years="2014 - 2017" name="František Veverka"/>
                <x-partials.columns-list years="2015 - 2017" name="Dominik Jáger"/>
                <x-partials.columns-list years="2017 - 2018" name="Pavol Lojan"/>
                <x-partials.columns-list years="2017 - 2020" name="Juraj Ondruš"/>
                <x-partials.columns-list years="2019 -"      name="Pavol Prieboj" description="výp. duchovný"/>
                <x-partials.columns-list years="2020 -"      name="Marián Juhaniak"/>
            </ul>
        </div>

    </x-web.page.section>
</x-web.layout.master>
