<?php
require("config.php");
if (isset($_GET['num'])) {
	$getAction = new Playlist();
	$num = $_GET['num'];
	switch ($num) {
		case '0':
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$getAction->getName('img', $id);
			}
		break;
		case '1':
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$getAction->getName('stream', $id);
			}
		break;
		case '2':
			$getAction->getChannel();
		break;
		case '3': //Add New
			if (isset($_GET['radname'])) {
				if (isset($_GET['stream'])) {
					if (isset($_GET['radimg'])) {
						$radname = htmlspecialchars($_GET['radname']);
						$stream = htmlspecialchars($_GET['stream']);
						$radimg = htmlspecialchars($_GET['radimg']);
						$getAction->addChannel($radname, $stream, $radimg);
					}
				}
			}
			
		break;
		case '4': //Update Channel
			if (isset($_GET['radname'])) {
				if (isset($_GET['stream'])) {
					if (isset($_GET['radimg'])) {
						if (isset($_GET['id'])) {
							$radname = htmlspecialchars($_GET['radname']);
							$stream = htmlspecialchars($_GET['stream']);
							$radimg = htmlspecialchars($_GET['radimg']);
							$idd = htmlspecialchars($_GET['id']);
							$getAction->updateChannel($radname, $stream, $radimg, $idd);
						}
					}
				}
			}
		break;
		case '5':
			$getAction->getChannelAdmin();
		break;
		case '6':
			$getAction->getListChannel();
		break;
		case '7': //Update Channel
			if (isset($_GET['radname'])) {
				if (isset($_GET['stream'])) {
						if (isset($_GET['channel'])) {
							$radname = htmlspecialchars($_GET['radname']);
							$stream = htmlspecialchars($_GET['stream']);
							$channel = htmlspecialchars($_GET['channel']);	
							$getAction->addChannelChild($radname, $stream, $channel);
						}
				}
			}
		break;
		case '8':		
			if (isset($_GET['channel'])) {
				$id_kenh = $_GET['channel'];
				$getAction->getChannelChild($id_kenh);
			}
		break;
		case '9':		
			if (isset($_GET['channel_child'])) {
				$id_kenh_child = $_GET['channel_child'];
				$getAction->getDataChild($id_kenh_child);
				
			}
		break;
		case '10':		
			if (isset($_GET['radname'])) {
				if (isset($_GET['stream'])) {
						if (isset($_GET['id'])) {
							$radname = htmlspecialchars($_GET['radname']);
							$stream = ($_GET['stream']);
							$idd = htmlspecialchars($_GET['id']);
							$getAction->updateChannelChild($idd, $radname, $stream);
						}
				}
			}
		break;
		case '11':
			if (isset($_GET['title'])) {
				if (isset($_GET['content'])) {
					if (isset($_GET['email'])) {
						if (isset($_GET['privary'])) {
							if (isset($_GET['default_stream'])) {
								if (isset($_GET['default_stream_title'])) {
									if (isset($_GET['default_stream_image'])) {
										$title = htmlspecialchars($_GET['title']);
										$content = htmlspecialchars($_GET['content']);
										$privary = htmlspecialchars($_GET['privary']);
										$email = htmlspecialchars($_GET['email']);
										
										$default_stream = htmlspecialchars($_GET['default_stream']);
										$default_stream_title = htmlspecialchars($_GET['default_stream_title']);
										$default_stream_image = htmlspecialchars($_GET['default_stream_image']);
										
										$getAction->updateSetting($title, $content, $email, $privary, $default_stream, $default_stream_title, $default_stream_image);
									}
								}
							}
						}
					}
				}
			}
		break;
		case '12':
			if (isset($_GET['channel'])) {
				$channel = htmlspecialchars($_GET['channel']);
				$getAction->getChannelChildIndex($channel);
			}
		break;
		case '13':
			if (isset($_GET['channel_child'])) {
				$channel = htmlspecialchars($_GET['channel_child']);
				$getAction->delChannelChild($channel);
			}
		break;
	}
}