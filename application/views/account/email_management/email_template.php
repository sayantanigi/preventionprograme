<?php
    $settings=$this->Mymodel->get_single_row_info('*', 'settings', '', '', 1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Email</title>
	<meta charset="utf-8">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
	<div style="width:600px;margin: 0 auto;background: #fff;font-family: 'Poppins', sans-serif; border: 1px solid #e6e6e6;">
		<div>
			<a href="<?php echo base_url(); ?>" title="logo" target="_blank">
			    <img style="width: 100%;height: 120px;" src="<?php echo base_url('uploads/logo/'.@$settings->logo.''); ?>" title="logo" alt="logo">
			</a>
		</div>
		<div style="padding: 30px 30px 15px 30px;box-sizing: border-box;">
			<p style="font-size:24px;">
			    <?= $body;?> 
			</p>
			<p style="font-size:24px;">
				
				<?php if(!empty(@$attachment)){ ?>
					<i class="fas fa-paperclip"></i><a href="<?=base_url('uploads/email/'.@$attachment.'')?>" download><?=@$attachment?></a>
				<?php } ?>
				
				
			</p>
			<p style="font-size:20px;">Thank you!</p>
			<li style="font-size:20px;list-style: none;">sincerly</li>
			<li style="list-style: none;"><b>Team MadeToSplit</b></li>
			<ul style="list-style: none;padding: 0;box-sizing: border-box; margin: 4px 0;">
				<li style="vertical-align: top;display: inline-block;"><b style="font-size:10px;margin-bottom: 10px;">Let's Explore Together !</b></li>
				<li style="display: inline-block;"><a href="<?= @$settings->facebook ?>"><img src="<?php echo base_url('assets/images/facebook2x.png')?>" height="35px"></a></li>
				<li style="display: inline-block;"><a href="<?= @$settings->linkedin ?>"><img src="<?php echo base_url('assets/images/linkedin2x.png')?>" style="height:35px;"></a></li>
				<li style="display: inline-block;"><a href="<?= @$settings->twitter ?>"><img src="<?php echo base_url('assets/images/twitter2x.png')?>" style="height:35px;"></a></li>
			</ul>
			<!--<li style="list-style:none;"><b>visit us:</b> <span><?=@$settings->address?></span></li>-->
			<?php $phone=preg_replace('/\d{3}/', '$0-', str_replace('.', null, trim($settings->phone)), 2);?>
			<li style="list-style:none;"><b>call us:</b> <span><?=@$phone?></span></li>
			<li style="list-style:none"><b>Email us:</b> <span><?=@$settings->email?></span></li>
			<!--<p>Click here to <a href="< ?= base_url('unsubscribe/'.$email)?>">unsubscribe </a> from our mailling list.</p>-->
		</div>
		<footer style="height:25px;width:100%;background: #F44C0D;"><span style="padding-left: 10px;"> copyright &copy; <?= date('Y')?> MadeToSplit-All right reserverd</span></footer>
	</div>
</body>
</html>
