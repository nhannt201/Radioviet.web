<?php
session_start();
if (isset($_POST['loginn'])) {
	$user = htmlspecialchars($_POST['userr']);
	$pass = htmlspecialchars($_POST['passs']);
	if ($user == "admin") {
		if ($pass == "@Radioviet66") {
			$_SESSION['log_suc'] = "success";
			header('Location: /admin-panel.html');
		} else {
			echo '<script>alert("Đăng nhập không hợp lệ!");</script>';
		}
	} else {
		echo '<script>alert("Đăng nhập không hợp lệ!");</script>';
	}
}
if (!isset($_SESSION['log_suc'])) {
	?>
	
<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="robots" content="noindex" />
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Đăng nhập quản trị Radio VIet</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <style>
	html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;

}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
	</style>
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="">
      <img class="mb-4" src="https://i.imgur.com/qIGWwMp.png"  width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Đăng nhập cPanel <br> Radioviet.net</h1>
      <label class="sr-only">Tài khoản</label>
      <input type="text" name="userr" class="form-control" placeholder="Tài khoản quản trị" required>
      <label class="sr-only">Mật khẩu</label><hr>
      <input type="password" name="passs" class="form-control" placeholder="Mã bảo mật" required>
      <button class="btn btn-lg btn-primary btn-block" name="loginn" type="submit">Đăng nhập</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
  </body>
</html>

	<?php
} else {
require("config.php");
$getPlaylist = new Playlist();
?>
<!doctype html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Cpanel - Radio Viet</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	 <!-- Custom styles for this template -->
    <link href="css/cpanel.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/admin-panel.html">Radio Việt</a>
      <!--<input class="form-control form-control-dark w-100" type="text" placeholder="Tìm kiếm kênh" aria-label="Tìm kiếm kênh">-->
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="/out.php">Đăng xuất</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" id="nav_manage" onClick="manageChannel();">
                  <span data-feather="radio"></span>
                  Quản lý kênh 
                </a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" id="nav_add" onClick="addChannel();">
                  <span data-feather="plus-circle"></span>
                  Thêm kênh
                </a>
              </li>
			  <li class="nav-item" >
                <a class="nav-link" id="nav_add_child" onClick="addChannelChild();">
                  <span data-feather="plus-circle"></span>
                  Thêm kênh phụ
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="nav_setting" onClick="Caidat();">
                  <span data-feather="settings"></span>
                  Cài đặt trang
                </a>
              </li>
              
            </ul>

         
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Quản lý kênh</h1>
            <!--<div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>-->
			
          </div>
          <div class="table-responsive">
			<div class="list-group">		
					<div id="loading_channel">
						<?php $getPlaylist->getChannelAdmin(); ?>
					</div>	
			</div>
          </div>
		
   
 

        </main>
		<!--Edit-->
		<div id="edit_show" class="radio mode-full bg-light" style="display: none;">
			<div class="trinhedit">
			 <div class="d-md-flex">
				<div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="width: 100%; height: 400px;">
			 <h1 class="h2" id="channel_name">Chỉnh sửa - Kênh radio</h1>
			 <hr>
				
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Tên Radio</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" name="radio_name" id="radio_name" placeholder="Tên của kênh radio, vd: VOV4">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Luồng Radio (.m3u8)</label>
					<div class="col-sm-10">
					  <input type="url" class="form-control" name="link_radio" id="link_radio" placeholder="Link stream .m3u8">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Ảnh/logo Radio</label>
					<div class="col-sm-10">
					  <input type="url" class="form-control" name="link_img" id="link_img" placeholder="Link ảnh radio, http://abc.com/background.jpg">
					</div>
				  </div>
					<div id="btn_update" class="float-right">
						<button  class="btn btn-danger float-right" onClick="closeShow();" >Huỷ cập nhật</button>
						<button  class="btn btn-primary float-right" onClick="updateShow();" data-toggle="modal" data-target="#thongbao">Cập nhật kênh</button>
					</div><br><br>				
					<!--Kenhphu-->
					<div id="kenhphu_show" style="display: none;">
				 <h1 class="h2" id="channel_name">Kênh phụ</h1>
				 <hr>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Tên kênh</label>
					<div class="col-sm-10">
					  <select id="channel_child_id" class="custom-select">
						
					  </select>
					</div>
				  </div>
				  <div id="btn_edit_child" class="float-right">
						<button  class="btn btn-primary float-right" onClick="" data-toggle="modal" data-target="#edit_modal">Chỉnh sửa</button>
					</div>
					</div>
			</div>
		</div></div></div>
		<!--Add-->
		<div id="add_show" class="radio mode-full bg-light" style="display: none;">
			<div class="trinhedit">
			 <h1 class="h2" id="channel_name">Thêm mới - Kênh radio</h1>
			 <hr>
				
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Tên Radio</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" name="radio_name_new" id="radio_name_new" placeholder="Tên của kênh radio, vd: VOV4">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Luồng Radio (.m3u8)</label>
					<div class="col-sm-10">
					  <input type="url" class="form-control" name="link_radio_new" id="link_radio_new" placeholder="Link stream .m3u8">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Ảnh/logo Radio</label>
					<div class="col-sm-10">
					  <input type="url" class="form-control" name="link_img_new" id="link_img_new" placeholder="Link ảnh radio, http://abc.com/background.jpg">
					</div>
				  </div>
					<div id="btn_add_new" class="float-right">
						<button  class="btn btn-primary float-right" onClick="addnewShow();" data-toggle="modal" data-target="#thongbao">Thêm kênh</button>
					</div><br><br><br>
					<div class="alert alert-warning" id="canhbao_add" style="display: none">
					  
					</div>
			</div>
		</div>
		<!--Add channel child-->
		<div id="add_child_show" class="radio mode-full bg-light" style="display: none;">
			<div class="trinhedit">
			 <h1 class="h2" id="channel_name">Thêm kênh phụ - Kênh radio</h1>
			 <hr>
				 <div class="form-group row">
					<label class="col-sm-2 col-form-label">Kênh Radio</label>
					<div class="col-sm-10">
					  <select id="channel_id" class="custom-select">
						<?php $getPlaylist->getListChannel(); ?>
					  </select>
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Tên kênh phụ</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" name="radio_name_new_child" id="radio_name_new_child" placeholder="Tên của kênh radio, vd: Huyện Cao Lãnh">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Luồng Radio</label>
					<div class="col-sm-10">
					  <input type="url" class="form-control" name="link_radio_new_child" id="link_radio_new_child" placeholder="Link stream .m3u8">
					</div>
				  </div>
					<div id="btn_add_child_new" class="float-right">
						<button  class="btn btn-primary float-right" onClick="addnewchildShow();" data-toggle="modal" data-target="#thongbao">Thêm kênh phụ</button>
					</div>
			</div>
		</div>
      </div>
	  <!--Setting-->>
		<div id="caidat" class="radio mode-full bg-light" style="display: none;">
			<div class="trinhedit">
			<div class="d-md-flex">
				<div class="overflow-auto p-3 mb-3 mb-md-0 mr-md-3 bg-light" style="width: 100%; height: 400px;">
			 <h1 class="h2" id="channel_name">Cài đặt trang</h1>
			 <hr>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Tên trang</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" value="<?php $getPlaylist->getSite("title"); ?>" name="sitename" id="sitename" placeholder="Tên của trang web">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Mô tả</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" value="<?php $getPlaylist->getSite("content"); ?>" name="descname" id="descname" placeholder="Mô tả nội dung trang web">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Email liên hệ</label>
					<div class="col-sm-10">
					   <input type="text" class="form-control" value="<?php $getPlaylist->getSite("email"); ?>" name="email_contact" id="email_contact"  placeholder="Địa chỉ email người dùng hay khách sẽ liên hệ"/>
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Điều khoản</label>
					<div class="col-sm-10">
					  <textarea class="form-control" name="privary" id="privary" rows="2" placeholder="Điều khoản và quyền riêng tư"><?php $getPlaylist->getSite("privary"); ?></textarea>
					</div>
				  </div>  
				  <hr>
				   <div class="form-group row">
					<label class="col-sm-2 col-form-label">Tên Radio mặc định</label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" value="<?php $getPlaylist->getSite("default_stream_title"); ?>" name="rad_def" id="rad_def" placeholder="Tên stream mặc định, ví dụ Quảng cáo về...">
					</div>
				  </div>
				   <div class="form-group row">
					<label class="col-sm-2 col-form-label">Link stream mặc định</label>
					<div class="col-sm-10">
					  <input type="url" class="form-control" value="<?php $getPlaylist->getSite("default_stream"); ?>" name="link_def" id="link_def" placeholder="Link stream khi mở ứng dụng hay trang web">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-2 col-form-label">Link ảnh radio mặc định</label>
					<div class="col-sm-10">
					  <input type="url" class="form-control" value="<?php $getPlaylist->getSite("default_stream_image"); ?>" name="link_img_def" id="link_img_def" placeholder="Link ảnh radio khi mở Fullscreen Player">
					</div>
				  </div>
					<div class="float-right">
						<button  class="btn btn-primary float-right" onClick="updateSetting();" data-toggle="modal" data-target="#thongbao">Cập nhật</button>
					</div>
			</div>
		</div>
      </div></div></div>
	  <!--Modal Thongbao-->
		  <div class="modal fade" id="thongbao" tabindex="-1" role="dialog" aria-labelledby="xonglabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="xonglabel">Thông báo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body" id="change_content">
				
				 Cập nhật thành công!
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
					
			  </div>
			</div>
		  </div>
		</div>
		<!--Modal Edit-->
		<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="editlabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="editlabel">Chỉnh sửa kênh phụ</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body" id="edit_child_content">
				 <div class="form-group row">
					<label class="col-sm-3 col-form-label">Tên kênh phụ</label>
					<div class="col-sm-9">
					  <input type="text" class="form-control" name="rad_name_edit_child" id="rad_name_edit_child" placeholder="Tên của kênh radio, vd: Huyện Cao Lãnh">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-3 col-form-label">Luồng Radio</label>
					<div class="col-sm-9">
					  <input type="url" class="form-control" name="rad_name_link_child" id="rad_name_link_child" placeholder="Link stream .m3u8">
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<div id="bt_edit_child">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				</div>
			  </div>
			</div>
		  </div>
		</div>
    </div>
	<!--Modal Delete-->
		<div class="modal fade" id="xoadel" tabindex="-1" role="dialog" aria-labelledby="editlabel"
		  aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="editlabel">Thông báo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body" id="edit_child_content">
				Xoá kênh phụ hoàn tất!		
			  </div>
			  <div class="modal-footer">
				<div id="bt_edit_child">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				</div>
			  </div>
			</div>
		  </div>
		</div>
    </div>
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js" integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM=" crossorigin="anonymous"></script>
	

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
	<script type="text/javascript">
		function editShow(id, name, stream, img, num) {
			document.getElementById("edit_show").style.display = "block";
			document.getElementById("radio_name").value = name;
			document.getElementById("link_radio").value = stream;
			document.getElementById("link_img").value = img;
			document.getElementById("btn_update").innerHTML = '<button  class="btn btn-danger" onClick="closeShow();" >Huỷ cập nhật</button>\
			<button  class="btn btn-primary" onClick="updateShow('+id+');" data-toggle="modal" data-target="#thongbao">Cập nhật kênh</button>';
			if (num == 1) {
				document.getElementById("kenhphu_show").style.display = "block";
				getReturn("interface.php?num=8&channel=" + id, "channel_child_id");
				document.getElementById("btn_edit_child").innerHTML = '<div class="float-right"><button  class="btn btn-primary" onClick="editChannelChild('+id+');" data-toggle="modal" data-target="#edit_modal">Chỉnh sửa</button>\
				</div>';
			} else {
				document.getElementById("kenhphu_show").style.display = "none";
			}
		}
		function delChannelChild(idd, id_child) {
			getReturn("interface.php?num=13&channel_child=" + id_child);
			getReturn("interface.php?num=8&channel=" +idd, "channel_child_id");
		}
		function editChannelChild(idd) {
			var id_channel_child = document.getElementById("channel_child_id").value;
			if (((id_channel_child)) == 0) {
				document.getElementById("edit_child_content").innerHTML = "Không có kênh nào để thực hiện chỉnh sửa!";
				document.getElementById("bt_edit_child").innerHTML = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>';
			} else {
				document.getElementById("bt_edit_child").innerHTML = '<button type="button" onClick="updateChild('+id_channel_child+', '+idd+');" class="btn btn-primary">Cập nhật</button>\
				<button  class="btn btn-danger" onClick="delChannelChild('+idd+', '+id_channel_child+');" data-dismiss="modal" data-toggle="modal" data-target="#xoadel">Xoá</button>\
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>';
				getReturn("interface.php?num=9&channel_child=" + id_channel_child, "edit_child_content");
			}

		}
		function updateShow(id) {
			var name_rd = document.getElementById("radio_name").value;
			var link_rd = document.getElementById("link_radio").value;
			var img_rd = document.getElementById("link_img").value;
			getReturn("interface.php?num=4&radname=" + name_rd + "&stream=" + link_rd + "&radimg=" + img_rd + "&id=" + id);
			document.getElementById("edit_show").style.display = "none";
			getReturn("interface.php?num=5", "loading_channel");
		}
		function updateChild(idd_child, idd) {
			var okk = true;
			var name_rd = document.getElementById("rad_name_edit_child").value;
			var link_rd = document.getElementById("rad_name_link_child").value;
			link_rd= link_rd.replace("?", "|");
			link_rd= link_rd.replace("?", "|");
			link_rd= link_rd.replace("?", "|");
			link_rd= link_rd.replace("&", "_-_");
			link_rd= link_rd.replace("&", "_-_");
			link_rd= link_rd.replace("&", "_-_");
			link_rd= link_rd.replace("&", "_-_");
			link_rd= link_rd.replace("=", "[[]");
			link_rd= link_rd.replace("=", "[[]");
			link_rd= link_rd.replace("=", "[[]");
			link_rd= link_rd.replace("=", "[[]");
			link_rd= link_rd.replace("=", "[[]");
			link_rd= link_rd.replace("=", "[[]");
			if (name_rd.length < 5) {
				okk = false;
			}
			if (link_rd.length < 5) {
				okk = false;
			}
			if (okk) {
				//alert("interface.php?num=10&radname=" + name_rd + "&stream=" + link_rd + "&id=" + idd_child);
				getReturn("interface.php?num=10&radname=" + name_rd + "&stream=" + link_rd + "&id=" + idd_child);
				document.getElementById("note_edit_child").innerHTML = '<div class="alert alert-success">\
				 Cập nhật thành công!!\
				</div>';
				getReturn("interface.php?num=8&channel=" +idd, "channel_child_id");
			} else {
				document.getElementById("note_edit_child").innerHTML = '<div class="alert alert-warning">\
 Vui lòng nhập đầy đủ thông tin hợp lệ!\
</div>';
			}
		}
		function updateSetting() {
			var title = document.getElementById("sitename").value;
			var descname = document.getElementById("descname").value;
			var email = document.getElementById("email_contact").value;
			var privary = document.getElementById("privary").value;
			
			var rad_def = document.getElementById("rad_def").value;
			var link_def = document.getElementById("link_def").value;
			var link_img_def = document.getElementById("link_img_def").value;
			if (link_img_def.length < 5) {
				link_img_def = "https://i.imgur.com/TOTvne1.png";
			}
			
			getReturn("interface.php?num=11&title=" + title + "&content=" + descname + "&email=" + email + "&privary=" + privary + "&default_stream=" + link_def + "&default_stream_title=" + rad_def + "&default_stream_image=" + link_img_def, "loading_channel");
		}
		function closeShow() {
			document.getElementById("edit_show").style.display = "none";
		}
		function addChannel() {
			document.getElementById("add_show").style.display = "block";
			document.getElementById("caidat").style.display = "none";
			document.getElementById("add_child_show").style.display = "none";
			document.getElementById("nav_add").className  = "nav-link active";
			document.getElementById("nav_setting").className  = "nav-link";
			document.getElementById("nav_manage").className  = "nav-link";
			document.getElementById("nav_add_child").className  = "nav-link";
		}
		function addChannelChild() {  //
			document.getElementById("add_child_show").style.display = "block";
			document.getElementById("caidat").style.display = "none";
			document.getElementById("nav_add_child").className  = "nav-link active";
			document.getElementById("nav_setting").className  = "nav-link";
			document.getElementById("nav_add").className  = "nav-link";
			document.getElementById("nav_manage").className  = "nav-link";
		}
		function manageChannel() {
			document.getElementById("add_show").style.display = "none";
			document.getElementById("add_child_show").style.display = "none";
			document.getElementById("caidat").style.display = "none";
			document.getElementById("nav_manage").className  = "nav-link active";
			document.getElementById("nav_setting").className  = "nav-link";
			document.getElementById("nav_add").className  = "nav-link";
			document.getElementById("nav_add_child").className  = "nav-link";
			 getReturn("interface.php?num=5", "loading_channel");
			closeShow();
		}
		function Caidat() { //nav_setting
			document.getElementById("caidat").style.display = "block";
			document.getElementById("nav_setting").className  = "nav-link active";
			document.getElementById("nav_add_child").className  = "nav-link";
			document.getElementById("nav_add").className  = "nav-link";
			document.getElementById("nav_manage").className  = "nav-link";
		}
		function addnewShow() {
			var okk = true;
			var name = document.getElementById("radio_name_new").value;
			if (name.length < 5) {
				okk = false;
			}
			var stream = document.getElementById("link_radio_new").value;
			if (stream.length < 5) {
				okk = false;
			}
			var img = document.getElementById("link_img_new").value;
			if (img.length < 5) {
				okk = false;
			}
			if (okk) {
				getReturn("interface.php?num=3&radname=" + name + "&stream=" + stream + "&radimg=" + img);
				document.getElementById("change_content").innerHTML = "Thêm kênh mới thành công!";
				document.getElementById("canhbao_add").style.display = "none";
				name = "";
				stream= "";
				img = "";
			} else { //change_content
				document.getElementById("canhbao_add").innerHTML = "Vui lòng nhập đầy thông tin và dữ liệu hợp lệ!";
				document.getElementById("canhbao_add").style.display = "block";
				document.getElementById("change_content").innerHTML = "Vui lòng nhập đầy thông tin và dữ liệu hợp lệ!";
			}		
		}
		
		function addnewchildShow() {
			var luachon =  document.getElementById("channel_id").value;
			var okk = true;
			var name = document.getElementById("radio_name_new_child").value;
			if (name.length < 5) {
				okk = false;
			}
			var stream = document.getElementById("link_radio_new_child").value;
			if (stream.length < 5) {
				okk = false;
			}
			if (okk) {
				getReturn("interface.php?num=7&radname=" + name + "&stream=" + stream + "&channel=" + luachon);
				document.getElementById("change_content").innerHTML = "Thêm kênh phụ thành công!";
				document.getElementById("canhbao_add").style.display = "none";
				name = "";
				stream= "";
			} else { //change_content
				//document.getElementById("canhbao_add").innerHTML = "Vui lòng nhập đầy thông tin và dữ liệu hợp lệ!";
				//document.getElementById("canhbao_add").style.display = "block";
				document.getElementById("change_content").innerHTML = "Vui lòng nhập đầy thông tin và dữ liệu hợp lệ!";
			}	
		}
		
		setTimeout(function(){ //Auto play radio
			 getReturn("interface.php?num=5", "loading_channel");
		}, 2000);
		//Function
		function getReturn(url_get, idget="", start="", end="") {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			
		  if (this.readyState == 4 && this.status == 200) {	
				if (idget.length > 0) {
					if (document.getElementById(idget)) { // Check xem ID co ton tai khong
						document.getElementById(idget).innerHTML =  start + this.responseText + end;
					}		else {
							
					}
				}
		  }
		};
		xhttp.open("GET", url_get, true);
		xhttp.send();
	}
	</script>


  </body>
</html>

<?php } ?>
