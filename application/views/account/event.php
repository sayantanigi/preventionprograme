
        <div class="section exvent-hero-section d-lg-flex d-block align-items-center inner-page-hero" style="background-image: url(<?=base_url('assets/images/')?>bg/about_page_bg.jpg);">
            <img class="shape-1 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape1.png" alt="">
            <img class="shape-2 img-fluid" src="<?=base_url('assets/images/')?>shape/hero_shape2.png" alt="">

            <div class="container">
                <div class="row exvent-hero-row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <div class="page-title">
                            <h2 class="section-title"><?=@$page?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <div class="event-list-page-wrap py-5">
            <div class="container">
                <div class="event-list-search shadow">
                    <form action="<?=base_url('search')?>" Method="GET">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <div class="single-form">
                                    <i class="fas fa-search"></i>
                                    <input type="text" placeholder="Search Event" name="event" id="event" value="<?=@$_GET['event']?>">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="single-form form-border">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <input type="text" placeholder="Location" name="location" id="location" value="<?=@$_GET['location']?>">
									<input type="hidden" placeholder="Near"  name="latitude" id="latitude" value="<?=@$_GET['latitude']?>">
									<input type="hidden" placeholder="Near" name="longitude" id="longitude" value="<?=@$_GET['longitude']?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-btn text-end">
                                    <button class="event-topbar-btn btn btn-orange" type="submit">Find Event</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Event List Content Start -->
                <div class="event-list-content-wrap">
                    <div class="tab-content">
                        
                        <div class="tab-pane show active" id="list">
						 <input type="hidden" name="total_count" id="total_count" value="<?php echo !empty($eventCount) ? $eventCount : ''; ?>" />
							<?php  if (!empty($event)) {  ?>
								<?php if (is_array($event) || is_object($event)) { ?>
									<?php foreach($event as $k => $v){ ?>
										<div class="event-list-item event-list d-lg-flex align-items-center post-item" relid="<?php echo $v->event_id; ?>">
										    
											<div class="event-img">
											    <?php
												    $gallerySql = $this->db->query("select image from event_gallery where event_id = ".@$v->event_id." ORDER BY id DESC LIMIT 1")->row();
													echo '<a href="'.base_url('event/details?eId='.base64_encode(@$v->event_id).'').'"><img src="'.(!empty(@$gallerySql->image) ? base_url('uploads/event/'.@$gallerySql->image.'') : base_url('uploads/noimage.jpg')).'" alt="" style="width: 400px;height: 240px;"></a>';
												?>
												
												<span class="cat">Featured</span>
											</div>
											
											<div class="event-list-content">
												<h3 class="title"><a href="<?=base_url('event/details?eId='.base64_encode(@$v->event_id).'')?>"><?=@$v->event_name?></a></h3>
												<div class="meta-data">
													<span><i class="far fa-clock"></i> <?=@$v->event_time?></span>
													<span><i class="fas fa-map-marker-alt"></i>    <?=@$v->event_address?></span>
												</div>
												<div class="event-desc">
													<p><?=strip_tags(substr(@$v->event_description,0,200))?></p>
												</div>
												<a class="ticket-link" href="<?=base_url('event/details?eId='.base64_encode(@$v->event_id).'')?>">View Details</a>
											</div>
										</div>
									<?php } ?>
								<?php } ?>
							<?php }else{
								echo '<div style="padding: 50px;font-size: 18px;font-weight: 800;text-align: center;">No event found.</div>';
							} ?>
                            <!-- Event List Item EEnd -->
                        </div>
                    </div>
                </div>
                <!-- Event List Content End -->

                <!--<div class="event-next-prev-btn text-center">
                    <a class="event-btn" href="event-list.html"><i class="flaticon-back"></i> Previous</a>
                    <a class="event-btn btn-next" href="event-list.html">Next <i class="flaticon-next"></i></a>
                </div>-->
            </div>
        </div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtg6oeRPEkRL9_CE-us3QdvXjupbgG14A&libraries=places"></script>		
<script>
window.onbeforeunload = function () {
    window.scrollTo(0,0);
};
$(document).ready(function(){
        windowOnScroll();
});
function windowOnScroll() {
       $(window).on("scroll", function(e){
        if (($(window).scrollTop() >= ($(document).height() - $(window).height())*0.7)){
            if($(".post-item").length < $("#total_count").val()) {
                var lastId = $(".post-item:last").attr("relid");
                getMoreData(lastId);
            }
        }
    });
}
function getMoreData(lastId) {
      $(window).off("scroll");
    $.ajax({
        url: '<?php echo base_url(); ?>event/loadAllevent?lastId=' + lastId,
        type: "get",
        beforeSend: function ()
        {
            $('.ajax-loader').show();
        },
        success: function (data) {
        	   setTimeout(function() {
					$('.ajax-loader').hide();
					$("#list").append(data);
					windowOnScroll();
        	}, 1000);
        }
   });
}

google.maps.event.addDomListener(window, 'load', function () {
        var places = new google.maps.places.Autocomplete(document.getElementById('location'));
        google.maps.event.addListener(places, 'place_changed', function () {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
			$('#latitude').val(place.geometry['location'].lat());
			$('#longitude').val(place.geometry['location'].lng());
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        var address = results[0].formatted_address;
                        var pin = results[0].address_components[results[0].address_components.length - 1].long_name;
                        var country = results[0].address_components[results[0].address_components.length - 2].long_name;
                        var state = results[0].address_components[results[0].address_components.length - 3].long_name;
                        var city = results[0].address_components[results[0].address_components.length - 4].long_name;
                        // document.getElementById('event_country').value = country;
                        // document.getElementById('event_state').value = state;
                        // document.getElementById('event_city').value = city;
                        // document.getElementById('event_zipcode').value = pin;
                    }
                }
            });
        });
 });
</script>		