<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Mua bán sản phẩm game Liên Quân Mobile</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>


    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css"/>
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <style>
        body {
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background-color: #fafafa;
        }

        a:hover {
            color: red;
        }

        .form-input {
            width: 100%;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #eee;
            transition: 0.25s ease;
            outline: none;
        }

        .form-input:focus {
            border: 1px solid green;
        }

        .form-field {
            position: relative;
        }

        .form-label {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 23px;
            pointer-events: none;
            user-select: none;
        }

        .form-input:not(:placeholder-shown) + .form-label,
        .form-input:focus + .form-label {
            top: 0;
            padding: 10px;
            display: inline-block;
            background-color: white;
            transition: 0.25s
        }

        @media screen and (max-width: 800px) {
            .yeuthich {
                margin-top: 20px;
            }
        }
        /*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: rgba(0, 0, 0, 0.1);
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid black;
  border-color: transparent transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent transparent transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: black;
  padding: 8px 16px;
  border: 1px solid black;
  border-color: transparent transparent transparent transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: white;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
    </style>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
<body style="background-color:#f5f5f5">
<?php session_start ();?>
<div style="margin-bottom: 30px;">
    <?php include ( 'header.php' ) ?>
</div>
<!-- SECTION -->
<?php
$_GET[ 'masp' ];
require_once 'lib/connection.php';
$row = mysqli_fetch_array ( mysqli_query ( $conn , "SELECT * FROM phukien where masp = " . $_GET[ 'masp' ] ) );
?>
<?php
if ( isset( $_SESSION[ 'user_id' ] ) == false ) {
    $id = 1;
} else {
    $id = $_SESSION[ 'user_id' ];
}
?>
<div class="container">
    <div class="row"
         style="background-color: white;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-bottom: 30px;">
        <div class="col-md-5" style=" margin-top: 10px;">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">

                    <div class="item active">
                        <img src="photo/<?php echo $row[ 'image' ] ?>" style="max-width: 100%">
                        <input type="hidden" id="hinhsp" value="<?php echo $row[ 'image' ] ?>">
                    </div>
                    <?php
                    $masp = $_GET[ 'masp' ];
                    $result = mysqli_query ( $conn , "SELECT * FROM imagesphukien  WHERE masp = '$masp'" );
                    if($result->num_rows > 0){
                    while($data = mysqli_fetch_array ( $result )){
                    $imageURL = 'photo/' . $data[ "file_name" ];
                    ?>
                    <div class="item ">
                        <img src="<?php echo $imageURL; ?>" style="max-width: 100%">
                    </div>
                    <?php }
                    }else{ ?>
                    <?php } ?>

                </div>

                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <br>

        </div>

        <div class="col-md-7" style=" margin-top: 10px;">
            <div>
                <p style="font-size: 25px; text-align: center"><?php echo $row[ 'tensp' ]; ?></p>
            </div>
            <div style="background-color: #fafafa; padding: 10px;"><span
                    style="text-decoration-line: line-through; margin-right: 10px; margin-left: 10px">₫<?php echo ( $row[ 'gia' ] + 10000 ); ?> </span><span
                    style="color: #ee4d2d; font-size: 30px">₫<?php $a = number_format ( $row[ 'gia' ] , 0 , '.' , '.' ); echo $a ?></span>
            </div>
            <br>
            <div>
                <!-- Phần yêu thích sản phẩm -->

                <input type="hidden" id="tensp" value="<?php echo ( $row[ 'tensp' ] ); ?>">
                <input type="hidden" id="giasp" value="<?php echo ( $row[ 'gia' ] ); ?>">
                <input type="hidden" id="hinhsp" value="<?php echo $row[ 'image' ] ?>">
                <input type="hidden" id="idsp" value="<?php echo $row[ 'masp' ] ?>">
                <input type="hidden" id="iduser" value="<?php echo isset( $_SESSION[ "user_id" ] ) ?>">
                <!-- Phần yêu thích sản phẩm -->
            </div>
            <div class="col-md-12">
                <p>Mã giảm giá của shop: Coming soon...</p>
            </div>
            <div class="row col-md-12">
                <div class="col-md-2">
                    <p>Vận chuyển</p>
                </div>
                <div class="col-md-10 row">
                    <div class="col-md-1">
                        <img src="https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg//assets/1cdd37339544d858f4d0ade5723cd477.png"
                             width="25" height="15" class="_2geN66">
                    </div>
                    <div class="col-md-4">
                        <span>Miễn Phí Vận Chuyển</span>
                    </div>
                </div>
            </div>
            <div style="margin-top: 15px" class="col-md-12">
                <form action="#" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="masp" id="masp" value="<?php echo $_GET[ 'masp' ] ?>">
                    <input type="hidden" name="gia" id="gia" value="<?php echo $row[ 'gia' ] ?>">
                    <input type="hidden" name="tensp" id="tensp" value="<?php echo $row[ 'tensp' ] ?>">
                    <input type="hidden" name="gia" id="gia" value="<?php echo $row[ 'gia' ] ?>">
                    <input type="hidden" name="image" id="image" value="<?php echo $row[ 'image' ] ?>">
                    <div class="buttons_added">
                        <label for="">Số lượng</label>
                        <input style="background-color: transparent; border: 1px solid black;" class="minus is-form"
                               type="button" value="-">
                        <input aria-label="quantity" class="input-qty" max="100" min="1" name="soluong" id="soluong"
                               type="number" value="1">
                        <input style="background-color: transparent; border: 1px solid black;" class="plus is-form"
                               type="button" value="+"><br><br>
                        <label>Chọn size </label>
                        <div class="custom-select" style="width: 200px">
                        <select name="size" id="size">
                            <option value="S">Size S</option>
                            <option value="M">Size M</option>
                            <option value="L">Size L</option>
                            <option value="XL">Size XL</option>
                            <option value="2XL">Size 2XL</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-12 row" style="margin-top: 30px; margin-left: -30px">
                        <div class="col-md-5">
                            <button style="border:1px solid #ee4d2d; background-color: #fff8e4; padding: 10px;font-size: 20px; "
                                    name="muangay" type="submit" id="muangay">Thêm vào giỏ hàng <i
                                    class="fa fa-cart-arrow-down"></i></button>
                        </div>
                        <div class="col-md-5 yeuthich">
                            <button id="yeuthich"
                                    style="border:1px solid #ee4d2d; background-color: #fff8e4; padding: 10px 50px 10px 50px;font-size: 20px;">
                                Yêu thích <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
            </div>
            </form>

        </div>
        <div class="col-md-12" style=" padding :20px; margin-top:30px">
            <h3 style="margin-bottom: 20px;"><u>Giới thiệu sản phẩm</u></h3>
            <p><?php echo $row[ 'mota' ] ?></p>
        </div>

    </div>
</div>
<div class="container">
    <div class="box_form ">
        <H3>Bình luận / Đánh giá sản phẩm</H3>

        <input type="hidden" name="fullname" id="fullname" value="<?php echo isset( $_SESSION[ "fullname" ] ) ?>">
        <input type="hidden" name="idsp" id="idsp" value="<?php echo $_GET[ "masp" ] ?>">
        <textarea name="binhluan" id="binhluan"></textarea><br>
        <script>
            CKEDITOR.replace('binhluan');
        </script>
        <button class=" btn btn-info" style="border-radius : 50px" type="submit" name="comment" id="comment">Bình luận
        </button>

    </div>

    <div class="col-md-12" style="margin-top: 30px" id="xembinhluan">
    </div>
</div>
<div>
    <?php include "footer.php" ?>
</div>


<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script>//<![CDATA[
$('input.input-qty').each(function () {
    var $this = $(this),
        qty = $this.parent().find('.is-form'),
        min = Number($this.attr('min')),
        max = Number($this.attr('max'))
    if (min == 0) {
        var d = 0
    } else d = min
    $(qty).on('click', function () {
        if ($(this).hasClass('minus')) {
            if (d > min) d += -1
        } else if ($(this).hasClass('plus')) {
            var x = Number($this.val()) + 1
            if (x <= max) d += 1
        }
        $this.attr('value', d).val(d)
    })
})
//]]></script>
<?php include "ajax.php"; ?>
<script>
    $(document).ready(function () {
        $("#comment").click(function () {
            var binhluan = CKEDITOR.instances['binhluan'].getData();
            var fullname = $('#fullname').val();
            var idsp = $('#idsp').val();
            var comment = $('#comment').val();
            $.ajax({
                url: "binhluan.php?masp=" + <?php echo $_GET[ "masp" ] ?>,
                type: "POST",
                data: {
                    fullname: fullname, idsp: idsp, binhluan: binhluan, comment: comment
                },

                success: function (binhluan) {

                    $('#xembinhluan').html(binhluan)

                }
            });
        });
        CKEDITOR.replace('binhluan');
    });
</script>
<script>
    $.ajax({
        url: "binhluan.php?masp=" + <?php echo $_GET[ "masp" ] ?>,
        success: function (xembl) {
            $('#xembinhluan').html(xembl)
        }
    });
</script>
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

</body>
</html>

