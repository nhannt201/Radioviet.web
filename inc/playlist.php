<?php
class Playlist extends Init {
	function getChannel() {
		$query_it = "SELECT * FROM channel";
		$check = $this->db->query($query_it);
		if ($check->num_rows > 0) {
			while ($row = $check->fetch_assoc()) {
				if (Playlist::hasChannelChild($row['id'])) { //co kenh phu
				echo '<li class="list-group-item-no2 d-flex justify-content-between align-items-center" data-toggle="modal" data-target="#thongbao" onClick="clickPlay('.$row['id'].', \''.$row['name'].'\', \''.$row['stream'].'\', 1);">
              <div class="left-slide"><img src="'.$row['img'].'" class="image-parent img-fluid"/>
				<span class="title-radio">'.$row['name'].'</span>
			  </div>
			  <span class="badge" id="playing_now_'.$row['id'].'">&nbsp;</span>
			</li>';
				} else {
						echo '<li class="list-group-item-no2 d-flex justify-content-between align-items-center" onClick="clickPlay('.$row['id'].', \''.$row['name'].'\', \''.$row['stream'].'\', 0);">
              <div class="left-slide"><img src="'.$row['img'].'" class="image-parent img-fluid"/>
				<span class="title-radio">'.$row['name'].'</span>
			  </div>
			  <span class="badge" id="playing_now_'.$row['id'].'">&nbsp;</span>
			</li>';
				}
			}
		}
	}
	
	function getChannelAdmin() {
		$query_it = "SELECT * FROM channel";
		$check = $this->db->query($query_it);
		if ($check->num_rows > 0) {
			while ($row = $check->fetch_assoc()) {
				$id = $row['id'];
				$name = $row['name'];
				$stream_link = $row['stream'];
				$img_link = $row['img'];
				if (Playlist::hasChannelChild($id)) {
					echo '<li class="list-group-item-no2 d-flex justify-content-between align-items-center" onClick="editShow('.$id.', \''.$name.'\', \''.$stream_link.'\', \''.$img_link.'\', 1);">
					  <div class="left-slide"><img src="'.$row['img'].'" class="image-parent img-fluid"/>
						<span class="title-radio">'.$row['name'].'</span>
					  </div>			
					</li>';
				} else {
						echo '<li class="list-group-item-no2 d-flex justify-content-between align-items-center" onClick="editShow('.$id.', \''.$name.'\', \''.$stream_link.'\', \''.$img_link.'\', 0);">
					  <div class="left-slide"><img src="'.$row['img'].'" class="image-parent img-fluid"/>
						<span class="title-radio">'.$row['name'].'</span>
					  </div>			
					</li>';
				}
				
			}
		}
	}
	
	function hasChannelChild($channel_id) {
		$query_it = "SELECT * FROM channel_child WHERE channel = '$channel_id'";
		$check = $this->db->query($query_it);
		if ($check->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}
	
	function getChannelChild($channel_id) {
		$query_it = "SELECT * FROM channel_child WHERE channel = '$channel_id'";
		$check = $this->db->query($query_it);
		if ($check->num_rows > 0) {
			$varr = "";
			while ($row = $check->fetch_assoc()) {			
				$id = $row['id'];
				$name = $row['name'];	
				$varr .= '<option value="'.$id.'">'.$name.'</option>';				
			}
			echo $varr;
		} else {
			echo '<option value="0">(Không có kênh nào)</option>';
		}
	}
	
	function getChannelChildIndex($channel_id) {
		$query_it = "SELECT * FROM channel_child WHERE channel = '$channel_id'";
		$check = $this->db->query($query_it);
		if ($check->num_rows > 0) {
			$varr = '<div id="msg_child"></div><ul class="list-group">';
			while ($row = $check->fetch_assoc()) {			
				$name = $row['name'];	
				$varr .= '<li class="list-group-item d-flex justify-content-between align-items-center" onClick="clickPlayChild('.$row['id'].', \''.$row['name'].'\', \''.$row['stream'].'\');"> 
					<span class="title-radio">'.$name.'</span>
				</li>';				
			}
			echo $varr.'</ul>';
		}
	}
	function getListChannel() {
		$query_it = "SELECT * FROM channel";
		$check = $this->db->query($query_it);
		if ($check->num_rows > 0) {
			$varr = "";
			while ($row = $check->fetch_assoc()) {			
				$id = $row['id'];
				$name = $row['name'];	
				$varr .= '<option value="'.$id.'">'.$name.'</option>';				
			}
			echo $varr;
		}
	}
	
	function getName($actioname, $id) {
		$query_it = "SELECT * FROM channel WHERE id=$id";
		$check = $this->db->query($query_it);
		if ($check->num_rows > 0) {
			$row = $check->fetch_assoc();
				echo $row[$actioname];
		}
	}
	
	function getSite($id) {
		$query_it = "SELECT * FROM setting";
		$check = $this->db->query($query_it);
		$row = $check->fetch_assoc();
		switch ($id) {
			case 'title':
				echo $row['title'];
			break;
			case 'content':
				echo $row['content'];
			break;
			case 'email':
				echo $row['email'];
			break;
			case 'privary':
				echo $row['privary'];
			break;
			case 'default_stream':
				echo $row['default_stream'];
			break;
			case 'default_stream_title':
				echo $row['default_stream_title'];
			break;
			case 'default_stream_image':
				echo $row['default_stream_image'];
			break;
		}
		
	}
	
	function getDataChild($id) {
		$query_it = "SELECT * FROM channel_child WHERE id=$id";
		$check = $this->db->query($query_it);
		if ($check->num_rows > 0) {
			$row = $check->fetch_assoc();
				echo '<div class="form-group row">
					<label class="col-sm-3 col-form-label">Tên kênh phụ</label>
					<div class="col-sm-9">
					  <input type="text" class="form-control" value="'.$row['name'].'" name="rad_name_edit_child" id="rad_name_edit_child" placeholder="Tên của kênh radio, vd: Huyện Cao Lãnh">
					</div>
				  </div>
				  <div class="form-group row">
					<label class="col-sm-3 col-form-label">Luồng Radio</label>
					<div class="col-sm-9">
					  <input type="url" class="form-control" value="'.$row['stream'].'" name="rad_name_link_child" id="rad_name_link_child" placeholder="Link stream .m3u8">
					</div>
				  </div><div id="note_edit_child"></div>';
		}
	}
	//Update and Insert
	function addChannel($radname, $stream, $radimg) {
		$query = "INSERT INTO channel (name, stream, img) VALUES ('$radname','$stream','$radimg')";
		$rs = $this->db->query($query);
	}
	
	function addChannelChild($radname, $stream, $channel) {
		$query = "INSERT INTO channel_child (channel, name, stream) VALUES ('$channel', '$radname','$stream')";
		$rs = $this->db->query($query);
	}
	
	function updateChannel($radname, $stream, $radimg, $id) {
		$query = "UPDATE channel SET name='$radname', stream='$stream', img='$radimg' WHERE id='$id'";
		$rs = $this->db->query($query);
	}
	
	function updateChannelChild($id, $radname, $stream) {
		$link_stream = str_replace("|", "?", $stream);
		$link_stream = str_replace("_-_", "&", $link_stream);
		$link_stream = str_replace("[[]", "=", $link_stream);
		$query = "UPDATE channel_child SET name='$radname', stream='$link_stream' WHERE id='$id'";
		$rs = $this->db->query($query);
	}
	
	function updateSetting($title, $content, $email, $privary, $default_stream, $default_stream_title, $default_stream_image) {
		$query = "UPDATE setting SET title='$title', content='$content', email='$email', privary='$privary', default_stream='$default_stream', default_stream_title='$default_stream_title', default_stream_image='$default_stream_image'";
		$rs = $this->db->query($query);
	}
	
	//Delete
	function delChannelChild($idd) {
		$query = "DELETE FROM channel_child WHERE id='$idd'";
		$rs = $this->db->query($query);
	}
}