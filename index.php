<?php
require("config.php");
$getPlaylist = new Playlist();
if (isset($_GET['s'])) {
	header('Location: /');
}
?>
<!doctype html>
<html lang="vi">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	 <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelementplayer.css" crossorigin="anonymous">
    <title><?php $getPlaylist->getSite("title"); ?></title>
	<meta name="Description" content="<?php $getPlaylist->getSite("content"); ?>">
	 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script src="http://code.jquery.com/jquery-2.1.3.min.js" integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelement-and-player.min.js" crossorigin="anonymous"></script>
	<script src="js/process.js" type="text/javascript"></script>
		<script src="https://cdn.jsdelivr.net/npm/hls.js@latest" type="text/javascript"></script>
  </head>
  <body>
  <div id="include_all">
   <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="navbar-brand" onClick="reloadpage();"><?php $getPlaylist->getSite("title"); ?></div>
      <div id="menu_will"><button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
      </button> </div>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <div class="nav-link" data-toggle="modal" data-target="#privary">Điều khoản</div>
          </li>
          <li class="nav-item">
            <div class="nav-link" data-toggle="modal" data-target="#lienhe">Liên hệ</div>
          </li>
          <li class="nav-item mobile_hidden">
            <a class="nav-link" href="http://amthanhviet.net" target="_blank">Amthanhviet.net</a>
          </li>
        </ul>
        
      </div>
	  
    </nav>
    <!-- Begin page content -->
    <main role="main" class="container">
			<div class="list-group">		
					<div id="loading_channel">
						<li class="list-group-item-no2 d-flex justify-content-between align-items-center">
							Đang tải danh sách kênh...
						</li>	
					</div>
			</div>
			<div class="space_empty">
			</div>
    </main>
	<!-- Modal -->
	<div class="modal fade" id="thongbao" tabindex="-1" role="dialog" aria-labelledby="thongbaoMS"
	  aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="thongbaoMS">Radio huyện</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<div id="radio_phu"></div>	
			
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			
		  </div>
		</div>
	  </div>
	</div>
	<!--Privary-->
	<div class="modal fade" id="privary" tabindex="-1" role="dialog" aria-labelledby="privaryMS"
	  aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="privaryMS">Điều khoản dịch vụ</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<?php $getPlaylist->getSite("privary"); ?>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			
		  </div>
		</div>
	  </div>
	</div>
	<!--Conact-->
	<div class="modal fade" id="lienhe" tabindex="-1" role="dialog" aria-labelledby="lienheMS"
	  aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="modal-title" id="lienheMS">Liên hệ:</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			Email: <?php $getPlaylist->getSite("email"); ?>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			
		  </div>
		</div>
	  </div>
	</div>
    <div class="radio bg-dark"  id="radio_stream">
	<div id="radio_img_div" style="display: none">
		<img src="<?php $getPlaylist->getSite("default_stream_image"); ?>" id="radio_img_src"/>
	</div>
	<div id="radio_player">
	<div id="load_text"></div>
     <div class="media-wrapper" id="changeRadio" >	
		<div style="display: none;" id="load_play"  allow="autoplay">
		<audio class="mep-playlist"  data-showplaylist="false" controls  preload="auto"  autoplay="true" width="auto"  allow="autoplay"> 
		<source src="<?php $getPlaylist->getSite("default_stream"); ?>" type="application/x-mpegURL" /> </audio>
		</div>
	</div>
	</div>
	
    </div>
		<!--Float right-->
		<div class="mode_section" id="mode_section">
			<img src="https://i.imgur.com/XcRANIm.png" onClick='mode_listen();' id="img_mode" class="image-mode"/>
		</div>
	</div>
	<div id="note_st" class="radio mode-full bg-dark" style="display: none;">
		<div class="center-screen"><h3>Radio Việt</h3><hr style="color: white; border: 0; margin-top: 1rem; margin-bottom: 1rem; border-top: 1px solid #ffffff;" ><h4>Bạn đang Offline</h4><p>Đang chờ mạng...</p>
		
<svg version="1.1" class="svg-mode" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 472.951 472.951" style="enable-background:new 0 0 472.951 472.951;" xml:space="preserve">
<g>
	<g>
		<g>
			<path style="fill:#ffffff;" d="M462.557,77.627c-14.323-25.556-41.488-41.423-70.889-41.423c-13.835,0-27.54,3.585-39.602,10.364
				l-152.557,85.635l17.55,31.279l152.565-85.635c6.747-3.78,14.371-5.779,22.069-5.779c16.428,0,31.596,8.852,39.594,23.11
				c5.909,10.535,7.356,22.752,4.072,34.408c-3.268,11.656-10.876,21.346-21.411,27.255l-138.291,77.604
				c-2.634-16.851-10.494-32.392-22.793-44.699c-21.687-21.663-56.063-29.328-84.935-18.964l-12.485,4.495l12.128,33.734
				l12.534-4.471c16.127-5.869,35.319-1.496,47.406,10.567c6.974,6.982,11.388,15.826,12.786,25.41
				c-0.585-0.138-1.171-0.285-1.731-0.447c-11.681-3.284-21.354-10.9-27.271-21.476l-6.519-11.518l-31.303,17.59l6.56,11.518
				c10.6,18.915,27.93,32.571,48.836,38.44c0.723,0.187,1.455,0.39,2.187,0.561c-1.105,1.398-2.284,2.731-3.536,3.983
				l-114.32,114.328c-8.551,8.543-19.931,13.241-32.035,13.241c-12.112,0-23.492-4.698-32.027-13.241
				c-8.535-8.543-13.233-19.907-13.233-32.027c0-12.112,4.698-23.483,13.233-32.018l99.291-99.282l-25.369-25.369l-99.282,99.282
				C8.446,319.427,0,339.806,0,361.468c0,21.679,8.446,42.049,23.776,57.396c15.339,15.339,35.709,23.768,57.388,23.768
				s42.049-8.429,57.388-23.768l114.345-114.32c8.372-8.405,14.81-18.566,18.842-29.71c6.625-1.764,12.924-4.3,18.777-7.6
				l140.99-79.115c18.875-10.608,32.514-27.946,38.375-48.828C475.749,118.4,473.148,96.493,462.557,77.627z"/>
		</g>
		<g>
			<g>
				<path style="fill:#ffffff;" d="M173.171,141.769c4.503-0.821,7.511-5.145,6.69-9.657l-17.103-94.942
					c-0.821-4.519-5.162-7.527-9.665-6.722c-4.511,0.821-7.527,5.145-6.706,9.673l17.111,94.925
					C164.311,139.575,168.644,142.574,173.171,141.769z"/>
			</g>
		</g>
		<g>
			<g>
				<path style="fill:#ffffff;" d="M43.561,191.776l94.934-17.119c4.519-0.821,7.527-5.145,6.706-9.657
					c-0.821-4.528-5.145-7.543-9.649-6.722L40.61,175.405c-4.503,0.797-7.519,5.145-6.698,9.657
					C34.717,189.582,39.058,192.589,43.561,191.776z"/>
			</g>
		</g>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
</div>
	</div>
    <!-- Optional JavaScript -->
   
	<script type="text/javascript">
	//default	
		var macdinh_d = 0;
		var player = document.getElementById("load_text");
		player.innerHTML = "Đang tải Radio...";
	setTimeout(function(){ 
		reload();
		
		if (document.getElementById("load_play").style) {
			document.getElementById("load_play").style.display = "block";
		}
		player.innerHTML = "<?php $getPlaylist->getSite('default_stream_title'); ?>";
		
	}, 2000);

	function reload() {
		var it = document.getElementById("load_play");
			if (it) {
				if (macdinh_d == 0) {

				} else {
					it.innerHTML = "";
				}
			}
		var mediaElements = document.querySelectorAll('video, audio');
		
		for (var i = 0, total = mediaElements.length; i < total; i++) {
			new MediaElementPlayer(mediaElements[i], {
				features: ['prevtrack', 'playpause', 'nexttrack', 'current',  'progress','volume', 'playlist', 'shuffle', 'loop', 'fullscreen'],
				autoplay: true
			});
		}
	}
	
		var ad1 = '<audio class="mep-playlist" data-showplaylist="false" controls  preload="auto"  autoplay="true" width="auto">\
		<source src="';
		var ad2 = '" type="application/x-mpegURL"/> </audio>';
		var play_now = -1;
		function clickPlay(id, title, stream, st) {
			macdinh_d = 1;
			if (play_now == -1) {
				play_now = id;
			} else {
				document.getElementById("playing_now_" + play_now).innerHTML = "&nbsp;";
				play_now = id;
			}
			
			if (st == 1) {
				getReturn("interface.php?num=12&channel=" + id, "radio_phu");
			}
			
			//Get img
			getReturn("interface.php?num=0&id=" + id, "radio_img_div", '<img src="','" id="radio_img_src"/>');
			var dangphat = document.getElementById("playing_now_" + id);	
			
			//Get radio
				document.getElementById('changeRadio').innerHTML = ad1 + stream + ad2;
			//}  
		
			
			reload();
			dangphat.innerHTML = '<img src="https://i.imgur.com/gOFal2s.gif" class="image-playing"/>';
			player.innerHTML = "Đang phát " + title;
			
			
			
			setTimeout(function(){ //Auto play radio
				if ( document.querySelectorAll('audio')) {
					 document.querySelectorAll('audio')[0].play(); 
				}	
			 }, 1000);
		}	
		
		function clickPlayChild(id, title, stream) {
			var ckk = stream.includes("rtmp");
			player.innerHTML = "Đang phát " + title;
			if (ckk) {
				document.getElementById("changeRadio").innerHTML = '\
				  <div style=" height: 22px;margin:0 auto;" id="playerpop_wrapper">	\
				<object tabindex="0" name="playerpop_hungdlv" id="playerpop_hungdlv" bgcolor="#000000" data="player.swf" type="application/x-shockwave-flash" height="100%" width="100%">\
					<param name="allowfullscreen" value="false">\
					<param name="autoplay" value="true">\
					<param name="allowscriptaccess" value="always">\
					<param name="seamlesstabbing" value="true">\
					<param name="wmode" value="opaque">\
					<param name="flashvars" value="streamer='+stream+'">\
				</object>\
				</div>';
				//Check Flash
				var Flash = false; 
					try { 
						Flash =  
						Boolean(new ActiveXObject('ShockwaveFlash.ShockwaveFlash')); 
					} catch (exception) { 
						Flash = ('undefined' != typeof navigator.mimeTypes[ 
							'application/x-shockwave-flash']); 
					} 
					if(!Flash) {
						
						if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
							document.getElementById("changeRadio").innerHTML = "Vì lý do bảo mật. Kênh này không thể phát trên thiết bị của bạn!";
							//Không thể phát kênh này vì lý do bảo mật
						} else {
							alert("Bạn cần bật Adobe Flash Player trên trình duyệt của bạn để có thể phát được kênh này!");
						}
					} 
				//
			} else {
					document.getElementById('changeRadio').innerHTML = ad1 + stream + ad2;
					reload();
			}
			
			document.getElementById("msg_child").innerHTML = '<div class="alert alert-success">Đang phát '+title+'</div>';
		}
	
		setTimeout(function(){ //Auto play radio
			 getReturn("interface.php?num=2", "loading_channel");
		}, 2000);
		
		function reloadpage() {
			document.getElementById("loading_channel").innerHTML = '<li class="list-group-item-no2 d-flex justify-content-between align-items-center">\
							Đang tải danh sách kênh...\
						</li>';
			 getReturn("interface.php?num=2", "loading_channel");
		}
	</script>
  </body>
</html>