<?php if ( isset( $_GET[ "loai" ] ) ) { ?>
    <?php
    include "lib/connection.php";

    $loai = $_GET[ "loai" ];
    $result = mysqli_query ( $conn , "select count(masp) as total from phukien where loai ='$loai'" );
    $row = mysqli_fetch_assoc ( $result );
    $total_records = $row[ 'total' ];
    $current_page = isset( $_GET[ 'page' ] ) ? $_GET[ 'page' ] : 1;
    $limit = 10;
    $total_page = ceil ( $total_records / $limit );
    if ( $current_page > $total_page ) {
        $current_page = $total_page;
    } else if ( $current_page < 1 ) {
        $current_page = 1;
    }
    $start = ( $current_page - 1 ) * $limit;
    $result = mysqli_query ( $conn , "SELECT * FROM phukien WHERE loai = '$loai'  LIMIT $start, $limit" );
    ?>
    <div class="container-fluid" style="margin-top: 50px; margin-bottom: 50px; padding-left: 10%;">

        <?php while ($row = mysqli_fetch_assoc ( $result )) { ?>
            <a href="chitiet-phukien.php?masp=<?php echo ( $row[ 'masp' ] ) ?>">
                <div class="col-md-2 sanpham" id="<?php echo ( $row[ 'loai' ] ) ?>"
                     style="padding:10px;border-radius: 10px;background-color: white;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-bottom: 30px; margin-right: 20px;">
                    <img style="max-width: 100%;  border-radius: 10px" src="photo/<?php echo ( $row[ 'image' ] ) ?>"
                         alt="">
                    <p style="margin: 15px;"><?php echo ( $row[ 'tensp' ] ) ?></p>
                    <div class="row">
                        <div class="col-sm-11">
                            <span style="color: red">₫</span>
                            <span style="color : red; font-size: 18px;"><?php $a = number_format ( $row[ 'gia' ] , 0 , '.' , '.' );
                                echo $a ?></span>
                        </div>
                        <div class="col-sm-1 freeship" style="position: absolute;  ;right: 30px; ">
                            <div class="pcmall-shopmicrofe_1vMsxF">
                                <svg height="12" viewBox="0 0 20 12" width="20"
                                     class="shopee-svg-icon icon-free-shipping">
                                    <g fill="none" fill-rule="evenodd" transform="">
                                        <rect fill="#00bfa5" fill-rule="evenodd" height="9" rx="1" width="12"
                                              x="4"></rect>
                                        <rect height="8" rx="1" stroke="#00bfa5" width="11" x="4.5" y=".5"></rect>
                                        <rect fill="#00bfa5" fill-rule="evenodd" height="7" rx="1" width="7" x="13"
                                              y="2"></rect>
                                        <rect height="6" rx="1" stroke="#00bfa5" width="6" x="13.5" y="2.5"></rect>
                                        <circle cx="8" cy="10" fill="#00bfa5" r="2"></circle>
                                        <circle cx="15" cy="10" fill="#00bfa5" r="2"></circle>
                                        <path d="m6.7082481 6.7999878h-.7082481v-4.2275391h2.8488017v.5976563h-2.1405536v1.2978515h1.9603297v.5800782h-1.9603297zm2.6762505 0v-3.1904297h.6544972v.4892578h.0505892c.0980164-.3134765.4774351-.5419922.9264138-.5419922.0980165 0 .2276512.0087891.3003731.0263672v.6210938c-.053751-.0175782-.2624312-.038086-.3762568-.038086-.5122152 0-.8758247.3017578-.8758247.75v1.8837891zm3.608988-2.7158203c-.5027297 0-.8536919.328125-.8916338.8261719h1.7390022c-.0158092-.5009766-.3446386-.8261719-.8473684-.8261719zm.8442065 1.8544922h.6544972c-.1549293.571289-.7050863.9228515-1.49238.9228515-.9864885 0-1.5903965-.6269531-1.5903965-1.6464843 0-1.0195313.6165553-1.6669922 1.5872347-1.6669922.9580321 0 1.5366455.6064453 1.5366455 1.6083984v.2197266h-2.4314412v.0351562c.0221328.5595703.373095.9140625.9169284.9140625.4110369 0 .6924391-.1376953.8189119-.3867187zm2.6224996-1.8544922c-.5027297 0-.853692.328125-.8916339.8261719h1.7390022c-.0158091-.5009766-.3446386-.8261719-.8473683-.8261719zm.8442064 1.8544922h.6544972c-.1549293.571289-.7050863.9228515-1.49238.9228515-.9864885 0-1.5903965-.6269531-1.5903965-1.6464843 0-1.0195313.6165553-1.6669922 1.5872347-1.6669922.9580321 0 1.5366455.6064453 1.5366455 1.6083984v.2197266h-2.4314412v.0351562c.0221328.5595703.373095.9140625.9169284.9140625.4110369 0 .6924391-.1376953.8189119-.3867187z"
                                              fill="#fff"></path>
                                        <path d="m .5 8.5h3.5v1h-3.5z" fill="#00bfa5"></path>
                                        <path d="m0 10.15674h3.5v1h-3.5z" fill="#00bfa5"></path>
                                        <circle cx="8" cy="10" fill="#047565" r="1"></circle>
                                        <circle cx="15" cy="10" fill="#047565" r="1"></circle>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>

                </div>
            </a>
        <?php }; ?>
    </div>
    <div class="pagination" style="margin-left: 40%; margin-right: 40%;">
        <?php
        if ( $current_page > 1 && $total_page > 1 ) {
            echo '<a href="phu-kien.php?page=' . ( $current_page - 1 ) . '">Prev</a> | ';
        }
        for ($i = 1; $i <= $total_page; $i++) {
            if ( $i == $current_page ) {
                echo '<span>' . $i . '</span> | ';
            } else {
                echo '<a href="phu-kien.php?page=' . $i . '">' . $i . '</a> | ';
            }
        }
        if ( $current_page < $total_page && $total_page > 1 ) {
            echo '<a href="phu-kien.php?page=' . ( $current_page + 1 ) . '">Next</a> | ';
        }
        ?>
    </div>
    </div>
<?php } else { ?>
    <?php
    include "lib/connection.php";

    $result = mysqli_query ( $conn , "select count(masp) as total from phukien" );
    $row = mysqli_fetch_assoc ( $result );
    $total_records = $row[ 'total' ];
    $current_page = isset( $_GET[ 'page' ] ) ? $_GET[ 'page' ] : 1;
    $limit = 10;
    $total_page = ceil ( $total_records / $limit );
    if ( $current_page > $total_page ) {
        $current_page = $total_page;
    } else if ( $current_page < 1 ) {
        $current_page = 1;
    }
    $start = ( $current_page - 1 ) * $limit;
    $result = mysqli_query ( $conn , "SELECT * FROM phukien LIMIT $start, $limit" );
    ?>
    <div class="container-fluid" style="margin-top: 50px; margin-bottom: 50px; padding-left: 10%;">

        <?php while ($row = mysqli_fetch_assoc ( $result )) { ?>
            <a href="chitiet-phukien.php?masp=<?php echo ( $row[ 'masp' ] ) ?>">
                <div class="col-md-2 xemphukien sanpham" id="<?php echo ( $row[ 'loai' ] ) ?>"
                     style="padding:5px; padding-bottom: 20px;border-radius: 5px;background-color: white;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-bottom: 30px; margin-right: 20px;">
                    <img class="image" style="max-width: 100%;  border-radius: 5px" src="photo/<?php echo ( $row[ 'image' ] ) ?>"
                         alt="">
                    
                    <p style="margin: 15px;"><?php echo ( $row[ 'tensp' ] ) ?></p>
                    <div class="row">
                        <div class="col-sm-11">
                            <span style="color: red">₫</span>
                            <span style="color : red; font-size: 18px;"><?php $a = number_format ( $row[ 'gia' ] , 0 , '.' , '.' );
                                echo $a ?></span>
                        </div>
                        <div class="col-sm-1 freeship" style="position: absolute;  ;right: 30px; ">
                            <div class="pcmall-shopmicrofe_1vMsxF">
                                <svg height="12" viewBox="0 0 20 12" width="20"
                                     class="shopee-svg-icon icon-free-shipping">
                                    <g fill="none" fill-rule="evenodd" transform="">
                                        <rect fill="#00bfa5" fill-rule="evenodd" height="9" rx="1" width="12"
                                              x="4"></rect>
                                        <rect height="8" rx="1" stroke="#00bfa5" width="11" x="4.5" y=".5"></rect>
                                        <rect fill="#00bfa5" fill-rule="evenodd" height="7" rx="1" width="7" x="13"
                                              y="2"></rect>
                                        <rect height="6" rx="1" stroke="#00bfa5" width="6" x="13.5" y="2.5"></rect>
                                        <circle cx="8" cy="10" fill="#00bfa5" r="2"></circle>
                                        <circle cx="15" cy="10" fill="#00bfa5" r="2"></circle>
                                        <path d="m6.7082481 6.7999878h-.7082481v-4.2275391h2.8488017v.5976563h-2.1405536v1.2978515h1.9603297v.5800782h-1.9603297zm2.6762505 0v-3.1904297h.6544972v.4892578h.0505892c.0980164-.3134765.4774351-.5419922.9264138-.5419922.0980165 0 .2276512.0087891.3003731.0263672v.6210938c-.053751-.0175782-.2624312-.038086-.3762568-.038086-.5122152 0-.8758247.3017578-.8758247.75v1.8837891zm3.608988-2.7158203c-.5027297 0-.8536919.328125-.8916338.8261719h1.7390022c-.0158092-.5009766-.3446386-.8261719-.8473684-.8261719zm.8442065 1.8544922h.6544972c-.1549293.571289-.7050863.9228515-1.49238.9228515-.9864885 0-1.5903965-.6269531-1.5903965-1.6464843 0-1.0195313.6165553-1.6669922 1.5872347-1.6669922.9580321 0 1.5366455.6064453 1.5366455 1.6083984v.2197266h-2.4314412v.0351562c.0221328.5595703.373095.9140625.9169284.9140625.4110369 0 .6924391-.1376953.8189119-.3867187zm2.6224996-1.8544922c-.5027297 0-.853692.328125-.8916339.8261719h1.7390022c-.0158091-.5009766-.3446386-.8261719-.8473683-.8261719zm.8442064 1.8544922h.6544972c-.1549293.571289-.7050863.9228515-1.49238.9228515-.9864885 0-1.5903965-.6269531-1.5903965-1.6464843 0-1.0195313.6165553-1.6669922 1.5872347-1.6669922.9580321 0 1.5366455.6064453 1.5366455 1.6083984v.2197266h-2.4314412v.0351562c.0221328.5595703.373095.9140625.9169284.9140625.4110369 0 .6924391-.1376953.8189119-.3867187z"
                                              fill="#fff"></path>
                                        <path d="m .5 8.5h3.5v1h-3.5z" fill="#00bfa5"></path>
                                        <path d="m0 10.15674h3.5v1h-3.5z" fill="#00bfa5"></path>
                                        <circle cx="8" cy="10" fill="#047565" r="1"></circle>
                                        <circle cx="15" cy="10" fill="#047565" r="1"></circle>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </a>

        <?php }; ?>
    </div>
    <div class="pagination" style="margin-left: 40%; margin-right: 40%;">
        <?php
        if ( $current_page > 1 && $total_page > 1 ) {
            echo '<a href="phu-kien.php?page=' . ( $current_page - 1 ) . '">Prev</a> | ';
        }
        for ($i = 1; $i <= $total_page; $i++) {
            if ( $i == $current_page ) {
                echo '<span>' . $i . '</span> | ';
            } else {
                echo '<a href="phu-kien.php?page=' . $i . '">' . $i . '</a> | ';
            }
        }
        if ( $current_page < $total_page && $total_page > 1 ) {
            echo '<a href="phu-kien.php?page=' . ( $current_page + 1 ) . '">Next</a> | ';
        }
        ?>
    </div>
    </div>
<?php } ?>