<?php
function cut($s,$str){
    for($i=0;$i<strlen($s);$i++){
        array_shift($str);
    }
    return $str;
}
$url='../countries.json';
$json= file_get_contents($url);
$countries=json_decode($json,true);
$q= $_POST['key'];
$by=$_POST['by'];
$hint=[];
sleep(1);
switch ($by){
    case "name":
        if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($countries as $country) {
                if (stristr($q, substr($country['name'], 0, $len))) {
                    $hint[] = $country;
                }
            }
        }
        break;
    case "capital":
        if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($countries as $country) {
              if($country['capital']!=''){
                  if (stristr($q, substr($country['capital'], 0, $len))) {
                      $hint[] = $country;
                  }
              }
            }
        }
        break;
    case "lang":
        if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            foreach($countries as $country) {
                if (stristr($q, substr($country['languages'][0]['name'], 0, $len))) {
                    $hint[] = $country;
                }
            }
        }
        break;

}

?>
<!--//دراین قسمت ;html مورد نیاز را به کاربر میفرستیم.-->

<?php if ($q!=''):?>
    <div class="container-fluid mb-5">
        <div  class=" row mt-5 pt-5" >
            <nav class=" bg-transparent col-6 mx-auto b-block" id="myScrollspy" style=";padding: 0; margin-top: -6rem; ">
                <ul id="hide" class=" nav nav-pills flex-column" style="margin-bottom: 30px;box-shadow: 0 4px 6px 0 rgba(32,33,36,0.28);border-radius:1rem; ">
                    <?php if(count($hint)==0&&$q!='') :?>
                        <li style="width: 100% ;padding: 2rem 0 1rem 0;" class="text-danger text-center">
                           <b> There Is No Suggestion For Your Query</b>
                        </li>
                    <?php endif;?>
                    <?php if(count($hint))
                    {
                        switch ($by)
                        {
                            case "name":
                                foreach ($hint as $key => $item){
                                    $trim=ltrim(strtolower($item['name']),$q);
                                    echo " <li style=\"width: 100%;\" class=\"  nav-item\">";
                                    echo " <a id=\"linkk".$key."\"class=\"text-dark wrap nav-link \" style=\" \" href=\"#".$item['alpha3Code']."\">"."<strong>".ucwords($q)."</strong>" . $trim . "</a>";
                                    echo "</li>";
                                }
                                break;
                            case "capital":
                                foreach ($hint as $key => $item){
                                    $trim=ltrim(strtolower($item['capital']),$q);
                                    echo " <li style=\"width: 100%;\" class=\"  nav-item\">";
                                    echo " <a id=\"linkk".$key."\" class=\"text-dark wrap nav-link \" style=\" \" href=\"#".$item['alpha3Code']."\">"."<strong>".ucwords($q)."</strong>" . $trim ." (".$item['name'].")". "</a>";
                                    echo "</li>";
                                }
                                break;
                            case "lang":
                                foreach ($hint as $key => $item){
                                    $trim=ltrim(strtolower($item['languages'][0]['name']),$q);
                                    echo " <li style=\"width: 100%;\" class=\"  nav-item\">";
                                    echo " <a id=\"linkk".$key."\"class=\"text-dark wrap nav-link \" style=\" \" href=\"#".$item['alpha3Code']."\">"."<strong>".ucwords($q)."</strong>" . $trim ." (".$item['name'].")". "</a>";
                                    echo "</li>";
                                }
                                break;
                        }
                    }
                    ?>
                </ul >
            </nav>
        </div>
    </div>
<?php endif;?>