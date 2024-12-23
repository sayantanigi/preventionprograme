<?php
$userId = $this->session->userdata('loguserId');
$user_sub_id = $this->Mymodel->get_single_row_info('sub_id', 'transaction', 'user_id='.$userId.' and payment_type="1"', 'id DESC', 1);
if(!empty($user_sub_id)){
	$user_sub_name = $this->Mymodel->get_single_row_info('name', 'subscription', 'id='.@$user_sub_id->sub_id.'', '', 1);
	$user_sub_name_1 = $user_sub_name->name;
}else{
	$user_sub_name_1 = '';
}
?>
<style>
.compose-active{
	background: #f7931e !important;
	padding: 6px !important;
	width: 70% !important;
	color: #fff !important;
	border-radius: 5px !important;
}
</style>
<div class="col-lg-4">
                        <div class="speaker-wrapper speaker-col">
                            <div class="single-speaker">
                            </div>
                            <ul class="profilenav mt-4">
                                <li><a href="<?=base_url('mailer/new_compose_mail')?>" class="<?=(@$page == 'Compose New Mail') ? 'compose-active' : ''; ?>">Compose</a></li>
                                <li><a href="<?=base_url('mailer/existing_template')?>" class="<?=(@$page == 'List of Template') ? 'compose-active' : ''; ?>">Use Template</a></li>
                                <li><a href="<?=base_url('mailer/list_send_mail')?>" class="<?=(@$page == 'List of Sent Mail') ? 'compose-active' : ''; ?>">Sent</a></li>
                                <li><a href="<?=base_url('mailer')?>" class="<?=(@$page == 'Draft List') ? 'compose-active' : ''; ?>">List of Drafts</a></li>
                            </ul>
                        </div>
                    </div>