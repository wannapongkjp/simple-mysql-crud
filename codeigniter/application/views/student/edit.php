<?php echo $header;?>

<div class="uk-container">
	<div class="uk-grid">
		<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
			<?php echo $left_menu;?>
		</div>
		<div class="tm-main uk-width-medium-3-4">
			<form class="uk-form uk-form-horizontal" action="<?php echo site_url('student/edit/'.$item->id);?>" method="post">
				<br /> <br />
				<div class="uk-clearfix">
					<div class="uk-float-left">
						<h2>จัดการนักศึกษา [แก้ไข]</h2>
					</div>
					<div class="uk-float-right">
						<a href="<?php echo site_url("student");?>"
							style="padding-right: 20px;"><span class="uk-icon-undo"></span> ยกเลิก</a> 
						<input class="uk-button uk-button-success" type="submit" value="บันทึก">
					</div>
				</div>
				<hr />
				<article class="uk-article">
                                <div class="uk-form-row">
                                    <label class="uk-form-label uk-text-right">ชื่อ</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-width-1-1 uk-form-large" type="text" name="firstname" value="<?php echo $item->firstname;?>">
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label uk-text-right">นามสกุล</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-width-1-1 uk-form-large" type="text" name="lastname" value="<?php echo $item->lastname;?>">
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label uk-text-right">อีเมล์</label>
                                    <div class="uk-form-controls">
                                        <input class="uk-width-1-1 uk-form-large" type="text" name="email" value="<?php echo $item->email;?>">
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label uk-text-right" for="form-h-s">สถานศึกษา</label>
                                    <div class="uk-form-controls">
                                        <select id="form-h-s" name="college_id">
                                        <?php 
										for($i=0; $i<count($colleges); $i++){
											$college = $colleges[$i];
											$selected = '';
											if($college->id == $item->college_id){
												$selected = 'selected="selected"';
											}
										?>
                                            <option value="<?php echo $college->id;?>" <?php echo $selected;?>><?php echo $college->name;?></option>
                                        	<?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="uk-form-row">
                                    <label class="uk-form-label uk-text-right" for="form-h-s">สถานนะ</label>
                                    <div class="uk-form-controls">
                                        <select id="form-h-s" name="status">
                                            <option value="1" <?php echo ($item->status==1)?'selected="selected"':'';?>>เผยแพร่</option>
                                            <option value="0" <?php echo ($item->status==0)?'selected="selected"':'';?>>ไม่เผยแพร่</option>
                                        </select>
                                    </div>
                                </div>
				</article>
			</form>
		</div>
	</div>
</div>

<?php echo $footer;?>
