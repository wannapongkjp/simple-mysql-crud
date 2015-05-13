<?php echo $header;?>

<div class="uk-container">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $left_menu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4">
			<br /> <br />
			<div class="uk-clearfix">
				<div class="uk-float-left">
					<h2>จัดการนักศึกษา</h2>
				</div>
				<div class="uk-float-right">
					<a href="<?php echo site_url("student/add");?>"
						class="uk-button uk-button-success"><span class="uk-icon-plus"></span>
						เพิ่ม</a>
				</div>
			</div>
			<hr />
			<table class="uk-table uk-table-hover uk-table-condensed">
				<thead>
					<tr>
						<th style="width: 50px;">#</th>
						<th>ชื่อ-สกุล</th>
						<th>ชื่อสถานศึกษา</th>
						<th>สถานนะ</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					for($i=0; $i<count($items); $i++){
						$item = $items[$i];
					?>
					<tr>
						<td><?php echo ($i+1);?></td>
						<td><?php echo $item->firstname;?> <?php echo $item->lastname;?></td>
						<td><?php echo $item->college_name;?></td>
						<td>
							<?php 
							if($item->status==1){
							?>
								<span class="uk-icon-check uk-text-success"></span>
							<?php }else{ ?>
								<span class="uk-icon-remove uk-text-danger"></span>
							<?php } ?>
						</td>
						<td>
							<a href="<?php echo site_url("student/edit/".$item->id);?>" class="uk-text-success uk-button uk-button-small">
								<span class="uk-icon-edit"></span></a> 
							<a href="<?php echo site_url("student/delete/".$item->id);?>" style="margin-left: 5px;" class="uk-text-danger uk-button uk-button-small">
								<span class="uk-icon-remove"></span></a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php echo $footer;?>
