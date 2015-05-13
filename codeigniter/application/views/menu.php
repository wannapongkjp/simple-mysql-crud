<?php 
$module = $this->uri->segment(1);
?>
<ul class="tm-nav uk-nav">
	<li class="uk-nav-header">เมนู</li>
	<li <?php echo ($module=="college")?'class="uk-active"':'';?>>
		<a href="<?php echo site_url("college");?>"><span class="uk-icon-user"></span> จัดการสถานศึกษา</a>
	</li>
	<li <?php echo ($module=="student" || $module=="")?'class="uk-active"':'';?>>
		<a href="<?php echo site_url("student");?>"><span class="uk-icon-user"></span> จัดการนักศึกษา</a>
	</li>
</ul>