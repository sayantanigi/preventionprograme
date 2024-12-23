<style>
 .section-paragraph > ul, ol {
    padding: 0;
    list-style: unset;
    margin: 0;
}
</style>

        <div class="section exvent-hero-section d-lg-flex d-block align-items-center inner-page-hero" style="background-image: url(<?=base_url('assets/images/')?>bg/about_page_bg.jpg);">
            <img class="shape-1 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape1.png" alt="">
            <img class="shape-2 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape2.png" alt="">

            <div class="container">
                <div class="row exvent-hero-row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="page-title">
                            <h2 class="section-title">About Us</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-section about-page section-padding-03">
		<div class="container">
		 
		   <div class="col-lg-12">
		       <div class="row">
				<div class="col-lg-8">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="section-title mb-3">
									<h5 class="sub-title orange">About </h5>
									<h2 class="title"><?=$about->heading?></h2>
								</div>
							</div>
						</div>
						<div class="mt-4 section-paragraph">
						<?=$about->description?>
							<!--<p>we are passionate about connecting people and sharing information about exciting events happening around the world. Whether you're looking for concerts, festivals, conferences, or any other kind of event, we've got you covered.</p>-->

							<!--<h4 class="mb-2 text-uppercase">Our Mission:</h4>
							<p>Our mission is to be the go-to destination for event enthusiasts who want to discover, explore, and stay updated on the latest happenings in their area and beyond. We aim to provide a comprehensive platform where event organizers can showcase their events and attendees can easily find the experiences they are seeking.</p>-->
							
						</div>
					</div>
				</div>
				
				<div class="col-lg-4">
					<div class="container">
                        <img src="<?=base_url('uploads/about_us/'.$about->image.'')?>">
					</div>
				</div>
				</div>
			
            </div>
            </div>
			
			
			
			
        </div>
         