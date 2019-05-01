<div class="loader text-center display-4">
    <section>
        <div id="one">
            <div id="two">
                <div id="three">
                    <div id="four"></div>
                </div>
            </div>
        </div>
        <p style="font-size: larger"></p>
        <div id="dots">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </section>
</div>
<nav class="navbar navbar-expand-md bg-khaki navbar-dark na sticky-top fixed-top mb-5">
    <!-- Brand -->
    <a class="navbar-brand text-dark" href="#">Other My Exercise</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="http://mohsen.ghalbeasia.ir/03" target="_blank">03</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://mohsen.ghalbeasia.ir/04" target="_blank">04</a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    05
                </a>
                <div class="dropdown-menu" aria-labelledby="Preview">
                    <a class="dropdown-item" href="http://mohsen.ghalbeasia.ir/05.1" target="_blank">05.1</a>
                    <a class="dropdown-item" href="http://mohsen.ghalbeasia.ir/05.2" target="_blank">05.2</a>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://mohsen.ghalbeasia.ir/06" target="_blank">06</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://mohsen.ghalbeasia.ir/07" target="_blank">07</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://mohsen.ghalbeasia.ir/08" target="_blank">08</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://mohsen.ghalbeasia.ir/09" target="_blank">09</a>
            </li>
        </ul>
        <div style="padding: 0 30%;cursor: text"><h6>05.2</h6></div>
    </div>
</nav>
<div class="container mt-5">
   <div class="row">
       <div class="col-12  mx-auto mt-5 pt-4 pb-1 haft table-responsive ">
           <div class="col-lg-10 mx-auto mt-5 m">
               <form action=""method="post">
                   <div class="searchTerm mb-5 p-3">
                       <input id="search" type="text" name="word" autocomplete="off"  placeholder="Search ...">

                       <select class="mr-2" id="by" name="by">
                           <option value="name" selected>ByName</option>
                           <option value="capital">By Capital</option>
                           <option value="lang">By Language</option>
                       </select>
                       <button id="btn" type="submit"><i class="searchbtn fa fa-search fa-2x"></i></button>
                       <img class="img-fluid" src="assets/images/25.gif" alt="loading..." width="30" id="img">
                       <div class="icon">

                       </div>
               </form>
           </div>
           <div class="res"></div>
           <div class="tab mt-5">
               <br>
               <br>
               <br>
               <h1>Countries List</h1>

               <table border="1" cellpadding="10" class="table  table-bordered table-striped table-hover table-light" id="all_text">
                   <tr>
                       <thead>
                       <th>#</th>
                       <th>Name</th>
                       <th> Code </th>
                       <th>Capital</th>
                       <th>Flag</th>
                       <th>More</th>
                       </thead>
                   </tr>
                   <?php $countries=get_countries_list();
                   foreach ( $countries as $index => $country):?>

                       <tr id="<?=$country['alpha3Code'];?>">

                           <td><?=$index+1; ?></td>
                           <td><?= $country['name']; ?></td>
                           <td><?= $country['alpha3Code']; ?></td>
                           <td><?= $country['capital']; ?></td>
                           <td title="<?= $country['name']; ?>` Flag"> <img class="zoom" src="<?= $country['flag']; ?>" alt="" width="50"></td>
                           <td><button type="button" class="btn wrap btn-primary" data-toggle="modal" data-target="#modal-<?=$index; ?>"> View </button></td>
                       </tr>


                       <div class="modal fade" id="modal-<?= $index; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                   <div class="modal-header">
                                       <h5 class="modal-title" id="exampleModalLabel">More information about <span class="text-primary"><?= ucwords($country['name']); ?></span></h5>
                                       <button type="button" class="close float-left text-left ml-0" data-dismiss="modal" aria-label="Close">
                                           <span aria-hidden="true">&times;</span>
                                       </button>
                                   </div>
                                   <div class="modal-body text-left">
                                       <?php

                                       echo '<b>'.'Borders : '.'</b>';
                                       $tems=get_countries_list();
                                       if($country['borders']!=''){
                                           $bords=$country['borders'];
                                           foreach ($bords as  $bord) {
                                               foreach ($tems as $k => $temp)
                                               {
                                                   if(strcasecmp($bord,$temp['alpha3Code'])==0)
                                                       if($k!=count($country['borders']))
                                                           echo "<a  href=\"#".$temp['alpha3Code']."\"  target=\"_blank\">".$temp['name'].'</a>'.' ,';
                                               }
                                           }
                                       }
                                       echo
                                           '<br>'.'<b>' . 'Alpha2Code : '. '</b>' .$country['alpha2Code'] . '<br>'.
                                           '<b>'. 'Alpha3Code : '.'</b>' . $country['alpha3Code'] . '<br>'.
                                           '<b>' . 'Capital : '.'</b>' . $country['capital'] . '<br>'.
                                           '<b>' . ' Area : '.'</b>' . $country['area'] . '<br>'.
                                           '<b>' . 'Region : '.'</b>' .$country['region'].'<br>'.
                                           '<b>' . 'Language : '.'</b>' .$country['languages'][0]['name'].'<br>'.
                                           '<b>' . 'Calling Code : '.'</b>' .'+'.$country['callingCodes'][0];

                                       ?>
                                   </div>
                                   <div class="modal-footer">
                                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   </div>
                               </div>
                           </div>
                       </div>
                   <?php endforeach; ?>

               </table>
           </div>
       </div>
   </div>
</div>