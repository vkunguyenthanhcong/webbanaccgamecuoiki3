<!-- JS thêm giỏ hàng -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#muangay").click(function(event){
			event.preventDefault();
			var	id = $('#id').val();
			var	masp = $('#masp').val();
			var	gia = $('#gia').val();
			var	tensp = $('#tensp').val();
            var	image = $('#image').val();
						var	soluong = $('#soluong').val();
						var	size = $('#size').val();
						var	muangay = $('#muangay').val();
			$.ajax({
			    type: "POST",
			    url: "themgiohang.php",
			    data: { id:id, masp:masp, gia:gia, tensp:tensp, image:image, soluong:soluong, size:size, muangay:muangay},
			    success: function(query){
						$('#xemgiohang').html(query)
					}
			});
			$.ajax({
				url: "tongdonhang.php",
				success: function(data){
					$('#tongdonhang').html(data); 
				}
			});
			$.ajax({
				url: "tonggia.php",
				success: function(result){
					$('#tonggia').html("Tổng: " + result + " <span style='color: red'>VNĐ</span>")
				}
			});
		});
        
	});
</script>
<!-- Hiển thị -->
<script>
	$.ajax({
		url: "tongdonhang.php",
		success: function(data){
			$('#tongdonhang').html(data)
		}
	});
	$.ajax({
		url: "tonggia.php",
		success: function(result){
			$('#tonggia').html("Tổng: " + result + " <span style='color: red'>VNĐ</span>")
		}
	});
	$.ajax({
			    url: "themgiohang.php",
			    success: function(query){
						$('#xemgiohang').html(query)
					}
			});
</script>
<!-- JS xóa giỏ hàng -->
<script>
function xoagiohang(stt){
    $.ajax({
        url: "xoagiohang.php?stt="+stt,
        type: "get",
        success: function(ketqua){  
        }
    });
		$.ajax({
		url: "tongdonhang.php",
		success: function(data){
			$('#tongdonhang').html(data)
		}
	});
	$.ajax({
		url: "tonggia.php",
		success: function(result){
			$('#tonggia').html("Tổng: " + result + " <span style='color: red'>VNĐ</span>")
		}
	});
	$.ajax({
			    url: "themgiohang.php",
			    success: function(query){
						$('#xemgiohang').html(query)
					}
			});
}
</script>

<!-- Xem các sản phẩm yêu thích -->


<script type="text/javascript">
	$(document).ready(function(){
		$("#yeuthich").click(function(event){
			event.preventDefault();
			var	tensp = $('#tensp').val();
			var	hinhsp = $('#hinhsp').val();
			var	giasp = $('#giasp').val();
			var	iduser = $('#iduser').val();
			var	idsp = $('#idsp').val();
			$.ajax({
			    type: "POST",
			    url: "spyeuthich.php",
			    data: { tensp:tensp, hinhsp:hinhsp, giasp:giasp, iduser:iduser, idsp:idsp},
			    success: function(query){
						$('#spyeuthich').html(query)
					}
			});
			$.ajax({
				url: "tongtym.php",
				success: function(data){
					$('#tongtym').html(data)
				}
			});
			$.ajax({
			    url: "spyeuthich.php",
			    success: function(ketqua){
						$('#spyeuthich').html(ketqua)
					}
			});
		});
        
	});
</script>
<script>
	$.ajax({
		url: "tongtym.php",
		success: function(data){
			$('#tongtym').html(data)
		}
	});
	$.ajax({
		url: "spyeuthich.php",
		success: function(data){
			$('#spyeuthich').html(data)
		}
	});
</script>