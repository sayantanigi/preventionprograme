
        <div class="section exvent-hero-section d-lg-flex d-block align-items-center inner-page-hero" style="background-image: url(<?=base_url('assets/images/')?>bg/about_page_bg.jpg);">
            <img class="shape-1 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape1.png" alt="">
            <img class="shape-2 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape2.png" alt="">

            <div class="container">
                <div class="row exvent-hero-row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="page-title">
                            <h2 class="section-title"><?=$page?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pricing-area pricing-area-4 py-5">
            <div class="py-5 pricing-wrapper">
                <div class="container">
                    <div class="row justify-content-center">
					        <?php
							//echo  (!empty(@$this->Mymodel->count_invite_people_byuser_freesub(@$userId)) ? @$this->Mymodel->count_invite_people_byuser_freesub(@$userId) : 0);
							if(!empty($sub)){  
								if (is_array($sub) || is_object($sub)) {
									$i = 1;
								    foreach($sub as $k => $v){
										if($i == 1){
											$price_color = 'blue-text';
											$button_color = 'btn-blue';
										}elseif($i == 2){
											$price_color = 'pink-text';
											$button_color = '';
										}elseif($i == 3){
											$price_color = 'orange-text';
											$button_color = '';
										}
										elseif($i == 4){
											$price_color = 'pink-text';
											$button_color = '';
										}else{
											$price_color = 'orange-text';
											$button_color = '';
										}
										
										
										if(@$v->pck_type == 'Free'){
											$link = 'javascript:void(0)';
											
										}else{
											$link = base_url('payment?subId='.base64_encode(@$v->id).'&&uId='.base64_encode(@$userId).'&&amo='.base64_encode(@$v->amount).'');
										}
										if(@$i == 4){
											$style = 'style="margin: 70px"';
										}else{
											$style = '';
										}
										
										if(@$v->id == @$subId->sub_id){
											if(@$subId->subscription == 'Free'){
												 $invitation_limit = @$v->invitation_limit;
												
												 $invited = (!empty(@$this->Mymodel->count_invite_people_byuser_freesub(@$userId)) ? @$this->Mymodel->count_invite_people_byuser_freesub(@$userId) : 0);
												 
												if($invitation_limit <= $invited){
													$sub_status =  '(Expired)';
												}else{
													$sub_status =  '(Active)';
												}											
											}else{
                                                $expire_date = date('Y-m-d', strtotime(@$subId->end_date));
                                                $current_date = date('Y-m-d');
                                                if($expire_date >= $current_date){
													$sub_status =  '(Active)';
												}else{
													$sub_status =  '(Expired)';
												}												
											} 
										}else{
											$sub_status =  '';
										}
										
										
									echo    '<div class="col-lg-4 col-sm-7" '.@$style.'>
												<div class="price-card text-center shadow">
													<img src="'.base_url('assets/images/shape/price_card_shape4.png').'" alt="Shape" class="price-card-shape img-fluid">
													<div class="price-header">
														<span class="price-plan">'.@$v->name.'</span>
														<h3 class="price-ammount '.@$price_color.'"><sup>$</sup>'.@$v->amount.'<sup>/'.@$v->duration.'</sup></h3>
													</div>
													<div class="price-body">
														'.@$v->description.'
													</div>
													<div class="price-footer">
														<a href="'.$link.'" class="btn price-btn '.@$button_color.'"> Choose Plan '.(@$sub_status).'</a>
													</div>
												</div>
								            </div>';
										$i++;	
								    }
								}
						    } 
							?>
                           
							
                        </div>

                </div>
            </div>
        </div>