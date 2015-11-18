<script src="/assets/js/bootstrap-button.js" charset="utf-8"></script>
<script src="/assets/js/bootstrap-modal.js" charset="utf-8"></script>
<script src="/assets/js/bootstrap-tooltip.js" charset="utf-8"></script>
<script src="/assets/js/bootstrap-popover.js" charset="utf-8"></script>
<script src="/js/jquery.contextmenu.r2.js?_<?filemtime("../../js/jquery.contextmenu.r2.js")?>" charset="utf-8"></script>

<!-- global JS -->
<script src="./js/global.js?_<?=filemtime('js/global.js')?>" type="text/javascript" charset="utf-8"></script>

<!-- NAVIGATION -->
<script src="./js/navigation.js?_<?=filemtime('js/navigation.js')?>" type="text/javascript" charset="utf-8"></script>
<script src="./js/globalnav.js?_<?=filemtime('js/globalnav.js')?>" type="text/javascript" charset="utf-8"></script>

<!-- TOOLBAR -->
<link rel="stylesheet" href="./css/toolbar.css?_<?=filemtime('css/toolbar.css')?>" type="text/css">


<link href="/css/bootstrap.css?_<?filemtime("../../css/bootstrap.css")?>" rel="stylesheet">
<script src="/js/message.js" type="text/javascript" charset="utf-8"></script>
<script langauge="javascript">
	function excelView(src, office) {
		var url="./schedule.php" + '?src='+src+'&office='+office;
		pageopen('#schedule_main', './schedule.php', 'message', 'GET?src='+src+'&office='+office)
		listToggle();
		
	}
	function listToggle() {
		$('#filelist').slideToggle();
	}
	function save() {
		$('#save').addClass('disabled');
		$('#save').html('저장중...');

	}
	$('#schedule_main').contextMenu('scheduleMenu', {
		bindings: {
			'delete' : function(t) {
				alert("준비중");
			},
			'insert' : function(t) {
				alert("준비중");
			},
			'admin' : function(t) {
				$('#myModal').modal('show');
			}
		}
	});
	$('.download').tooltip();
	$('.path').tooltip();
</script>
<div class="contextMenu" id="scheduleMenu">
<ul>

</ul>
</div>
<?
	function mkList($office_list) {
		$office_list = explode("\n", $office_list);
		$cnt_folder_root = 4;
		$cnt_folder = 0;
		foreach ($office_list as $i => $list_path) {
			$arr_file = explode("/", $list_path);
			$file_name = array_pop($arr_file);
			$file_post = explode(".", $file_name);
			if (count($file_post) > 1) {
				$file_post = $file_post[1];
			} else {
				$file_post = "";
			}
			if ($file_post == "" && $cnt_folder == 0) {	 // First Folder 
				switch ($file_name) {
					case "기체반":
						$office = "giche";
						break;
					case "정보실":
						$office = "jungbo";
						break;
					case "상황실":
						$office = "sanghwang";
						break;
					default:
						$office = "";
						break;
				}
				$cnt_now_dir = count($arr_file);
				$cnt_folder++;
				echo "<li>".$file_name."</li>";
				echo "<ul>";
			} else if ($file_post == "" && $cnt_now_dir < count($arr_file) && $cnt_folder > 0) { // New Folder
				$cnt_folder++;
				echo "<li>".$file_name."</li>";
				echo "<ul>";
				$cnt_now_dir = count($arr_file);
			} else if ($file_post == "" && $cnt_now_dir > count($arr_file) && $cnt_folder > 0 ) { // New Folder in prev Folder that more than 2 depth
				$i = $cnt_now_dir - count($arr_file);
				echo "</ul>";
				$cnt_folder--;
				while ($i-- > 0) {
					echo "</ul>";
					$cnt_folder--;
				}
				$cnt_folder++;
				echo "<li>".$file_name."</li>";
				echo "<ul>";
				$cnt_now_dir = count($arr_file);				
			} else if ($file_post == "" && $cnt_now_dir == count($arr_file) && $cnt_folder > 0 ) { // New Folder in prev Folder
				echo "</ul>";
				$cnt_folder--;
				$cnt_folder++;
				echo "<li>".$file_name."</li>";
				echo "<ul>";				
			} else if (count($arr_file) == 0) { // end List
				while ($cnt_folder-- > 0) {
					echo "</ul>";
				}
			} else { // Files
				$list_path="/data/NAS_Guest/스케쥴/기체반/스케쥴201309.xlsx";
				$office="giche";
				echo "<li><a href='javascript:excelView(\"".$list_path."\", \"".$office."\");'>".$file_name."</a>&nbsp&nbsp<a rel='tooltip' data-placement='right' title='download' class='download' href='".$list_path."'><span>down</span></a></li>";
			}
		}
	}
?>

<link rel="stylesheet" href="./schedule.css?_<?=filemtime('./schedule.css')?>">
<nav id="header">
	<ul>
		<li><a href="javascript:listToggle();">리스트</a></li>
	</ul>
</nav>
<div id="filelist">
	<ul id="giche_list">
	<?
		mkList(shell_exec('find /data/NAS_Guest/스케쥴/기체반'));
	?>
	</ul>
	<ul id="jungbo_list">
	<?
	mkList(shell_exec('find /data/NAS_Guest/스케쥴/정보실'));
	?>
	</ul>
	<ul id="sanghwang_list">
	<?
		mkList(shell_exec('find /data/NAS_Guest/스케쥴/상황실'));
	?>
	</ul>
</div>
<div id="schedule_main">
</div>

 
<!-- Modal -->
<div id="bootstrap">
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">스케쥴 관리</h3>
  </div>
  <div class="modal-body">
    <p>Schedule Auto Upload</p>
    <input type="text" placeholder="Schedule Local PATH"><a rel='tooltip' class="path" title='...' data-placement="right" href="#"><img src="/img/icon/32/places/folder.png" style="vertical-align: sub;padding-left: 1em;"></a>
     <label class="checkbox">
      <input type="checkbox"> Enable
    </label>
    <p>테스트</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">닫기</button>
    <a href="javascript:save();"><button id="save" class="btn btn-primary">저장</button></a>
  </div>
</div>
</div>