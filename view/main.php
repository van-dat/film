
<main>
    <div class="container" style="background-color: #1a1a20;">
      <div class="row ">
        <div class="col-lg-9 col-md-8 col-12 m-0  pb-2">
          <?php
            if(!isset($_GET['id'])){
              echo'
              <div class="content-heading m-0">
              <span class="h-text">Fanpage Facebook</span>
            </div>
            <div class="position-relative overflow-hidden  ">
              <img src="./asset/img/Fanpage.webp" class="img-fluid" alt="">
              <div class="position-absolute" style="top: 0; left: 0; zoom: 0.7;">
                <img src="./asset/img/290942541_395928692516693_5123194549793268467_n.png" class="img-fluid" alt="">
              </div>
            </div>              
              ';
            }
          ?>
          <div class="position-relative" style="height: 10px;"></div>
          <div class="content">
            <div class="content-heading m-0">
              <span class="h-text">
                <?php
                if(isset($_GET['id'])) {
                  $id = $_GET['id'];
                  $kqcateq = getcategory($id);
                 echo($kqcateq[$id-1]['NameCategory']);
                }else {
                  echo'mới nhất';
                }
                ?>
              </span>
            </div>
            <div class="content-film d-flex flex-wrap">
            <?php 
                    if(isset($kq) && count($kq)>0){
                        foreach ($kq as $ds) {
                            echo'
                            <div class="col-6 col-md-4 col-lg-3 img-pd">
                                <div class="film overflow-hidden  position-relative rounded-3">
                                <a href="index.php?act=view&id='.$ds['ID'].'">
                                    <figure class="m-0 overflow-hidden">
                                    <img src="./img_upload/'.$ds['ImgFilm'].'" alt="img" class="img-fluid img">
                                    </figure>
                                    <div class="film-heading ">
                                    <span class="f-heading">'.$ds['NameFilm'].'</span>
                                    </div>
                                    <span class="episode">
                                    '.$ds['Episode'].'
                                    </span>
                                </a>
                                </div>
                            </div>
                            ';
                        }
                    }
                ?>
            </div>
          </div>
          <div class="page">
            <a class="link-page" href="">Xem tất cả</a>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-12">
          <div class="favourite ">
            <div class="content-heading bd position-relative">
              <span class="h-text">
                xem nhiều
              </span>
            </div>
            <div class="list-film">
              <?php
                $kqfavour = getfavourit();
                if(isset($kqfavour)) {
                  foreach ($kqfavour as $ds) {
                    echo'
                    <div class="item-film overflow-hidden">
                      <a href="index.php?act=view&id='.$ds['ID'].'" class="text-decoration-none d-flex" style="color: #FFF; font-size: 13px; ">
                        <figure class="overflow-hidden m-0">
                          <img src="./img_upload/'.$ds['ImgFilm'].'" alt="" class="img-favourite img-fluid img">
                        </figure>
                        <div class="favourite-heading">
                          <span class="text-capitalize">'.$ds['NameFilm'].'</span>
                        </div>
                      </a>
                    </div>
                    ';
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>