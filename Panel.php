<!DOCTYPE html>
<html lang="pl">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Panel zarządzania spotkaniami</title>
    <style>
    body {
    display: grid;
    grid-template-rows: 10% 7% 83%;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    background-color: #39a7ff;
    border: 5px solid #7C81AD; 
}

#main-panel {
    display: grid;
    grid-template-columns: 25% 75%;
    grid-template-rows: 100%;
}

h1 {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2em;
    background-color: #FFEED9;
    color: black;
    border: 5px solid #7C81AD;
}

p:not(#lista p) {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #FFEED9; 
    height: 100%;
    margin: 0;
    font-size: 1.2em;
    border: 3px solid #7C81AD; 
}

#lista {
    display: flex;
    height: 100%;
    flex-direction: column;
    border: 3px solid #7C81AD; 
    background-color: #E0F4FF; 
}

#zawartosc {
    height:100%;
    display: flex;
    flex-direction: column;
    background-color: #39a7ff; 
    padding: 30px;
    border: 5px solid #7C81AD;
}

#formularz {
    height: 100%;
    display: flex;
    flex-direction: column;
    padding: 30px;
    background-color: #e0f4ff; 
    border: 3px solid #7C81AD; 
}

#formularz > label {
    align-items: start;
    justify-content: start;
    width: 50%;
    font-size: 1.2em;
    margin-bottom: 10px;
}

#formularz > *:not(label) {
    align-items: end;
    justify-content: end;
    width: 50%;
    margin-bottom: 10px;
}

.imgChooser {
    display: flex;
    flex-direction: row;
    margin: 10px;
}

.imgChooser label {
    display: flex;
    flex-direction: column;
    margin-right: 10px;
}

.img-oferta {
    border-radius: 100%;
    height: 120px;
    width: 120px;
}

    </style>
</head>
<body>
    <h1>Panel zarządzania spotkaniami</h1>
    <p>zapis ok</p>
    <div id="main-panel">
        <div id="lista">
            <p>Uzupełnij dane spotkania</p>
            <form action="submit_form.php" method="POST">
            <section>
            <?php
            function getSavedFilesList($folderPath) {
                $fileList = glob($folderPath . '*.json');
                return $fileList;
            }
                echo '<ul id="meetingList">';
                $savedFiles = getSavedFilesList('D:\xampp\htdocs\korki');
                foreach ($savedFiles as $index => $file) {
                    $jsonData = file_get_contents($file);
                    $meetingData = json_decode($jsonData, true);
                
                    echo "<li><a href='#' data-json-path='$file' onclick='fillFormFromJSON(this)'>{$index}#{$meetingData['title']}</a></li>";
                }
                
                echo '</ul>';
            ?>
        </ul>
    </section>
          </div>
        <div id="zawartosc">
        <section class="imgChooser">
            <h3> Wybierz zdjecie:</h3>
              <label>
                  <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Stary_Rynek_w_Bydgoszczy.jpg/258px-Stary_Rynek_w_Bydgoszczy.jpg" alt="Bydgoszcz" class="img-oferta">
                  <input type="radio" name="image" value="Bydgoszcz" onchange="fillPlace(this.value)">
              </label>
              <label>
                  <img src="https://pojezierze24.pl/repo/img/galerie/m009-gniezno/gniezno_287_7.jpg" alt="Gniezno" class="img-oferta">
                  <input type="radio" name="image" value="Gniezno" onchange="fillPlace(this.value)">
              </label>
              <label>
                  <img src="https://media.discordapp.net/attachments/474300077964263424/1192068307197644801/IMG_20231202_095855_789.jpg?ex=65a7bb1f&is=6595461f&hm=adfcf65c3d24940441692f2dbd5ef6af050207d20c0282268f837c4fa9850084&=&format=webp&width=670&height=670" alt="Ryneczek Lidla" class="img-oferta">
                  <input type="radio" name="image" value="Ryneczek Lidla" onchange="fillPlace(this.value)">
              </label>
              <label>
                  <img src="https://media.discordapp.net/attachments/474300077964263424/1192068524345147482/IMG20231017161810.jpg?ex=65a7bb53&is=65954653&hm=c21712ae28ddf7fa784704e7cc5a253823c1b186a99b96c14170a4fe71ee7e5c&=&format=webp&width=502&height=670" alt="Kulka" class="img-oferta">
                  <input type="radio" name="image" value="Kulka" onchange="fillPlace(this.value)">
              </label>
                  <label>
                      <img src="https://cdn.galleries.smcloud.net/t/galleries/gf-Ko5c-TarW-wr2f_tramwaj-nr-4-994x828.jpg" alt="Gorzow" class="img-oferta">
                      <input type="radio" name="image" value="Gorzow" onchange="fillPlace(this.value)">
                  </label>
                  <label>
                      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Museumsinsel_Berlin_Juli_2021_1_%28cropped%29.jpg/1200px-Museumsinsel_Berlin_Juli_2021_1_%28cropped%29.jpg" alt="Berlin" class="img-oferta">
                      <input type="radio" name="image" value="Berlin" onchange="fillPlace(this.value)">
                  </label>
                  <label>
                      <img src="https://media.discordapp.net/attachments/474300077964263424/1192069516365144184/received_1081600709658208.jpg?ex=65a7bc40&is=65954740&hm=356a267f88cad7ddd5b69dae732f7eb4255316729611f2d53d96e8cdc2466c8d&=&format=webp&width=668&height=670" alt="pan od zdatka" class="img-oferta">
                      <input type="radio" name="image" value="pan od zdatka" onchange="fillPlace(this.value)">
                  </label>
              </section>
              
            <div id="formularz">
              <label>Tytuł</label>
              <input type="text" name="title"><br>
              <label>Realizacja</label><select name="real">
                  <option value="stacjonarnie" selected="selected">Stacjonarnie</option>
                  <option value="online">On-line</option>
                  <option value="nazywo">Na żywo + On-line</option>
              </select><br>
              <label>Dzień</label>
              <select name="day" size="6" multiple="multiple">
                  <option value="poniedzialek">Poniedziałek</option>
                  <option value="wtorek">Wtorek</option>
                  <option value="sroda">Środa</option>
                  <option value="czwartek">Czwartek</option>
                  <option value="piatek">Piątek</option>
                  <option value="sobota">Sobota</option>
                  <option value="niedziela">Niedziela</option>
              </select><br>
              <label>Godzina</label>
              <input type="time" name="time">
              <label>Czas trwania (zaznacz godziny)</label>
              <input type="range" name="duration" value="0" max="24" oninput="numrange.value = this.value">
              <output id="numrange">1</output><br>
              <label>Miejsce</label>
              <input type="text" name="place"><br>
              <label>Opis do spotkania</label><br>
              <textarea name="desc"></textarea>
              <input type="submit" name="setBtn" value="Zapisz">  
              
        </div>
        </form>
    </div>
        <script>
          function fillFormFromJSON(link) {
    var jsonPath = link.getAttribute('data-json-path');
    console.log('JSON path:', jsonPath);

    fetch('get_json.php?jsonPath=' + encodeURIComponent(jsonPath))
        .then(response => response.json())
        .then(data => {
            console.log('JSON data:', data);
            document.getElementsByName('title')[0].value = data.title;
            document.getElementsByName('real')[0].value = data.realization;
            document.getElementsByName('day')[0].value = data.day;
            document.getElementsByName('time')[0].value = data.time;
            document.getElementsByName('duration')[0].value = data.duration;
            document.getElementById('numrange').value = data.duration;
            document.getElementsByName('place')[0].value = data.place;
            document.getElementsByName('desc')[0].value = data.desc;
        })
        .catch(error => console.error('Error loading JSON:', error));
}
            
        function fillPlace(value) {
        document.getElementsByName('place')[0].value = value;
    }
    </script>
</body>
</html>
