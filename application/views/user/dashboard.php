<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="row">
            <div class="col-12">
               <div class="page-title-box d-flex align-items-center justify-content-between">
                  <h4 class="mb-0"><?=$title?></h4>
                  <div class="page-title-right">
                     <ol class="breadcrumb m-0">
                        <!--<li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>-->
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- end page title -->
         <div class="row">
            <div class="col-xl-12">
               <div class="row h-100">
                  <div class="col-md-6 col-xl-4">
                     <div class="card overflow-hidden card-h-100 custom-shadow rounded-lg border">
                      <a href="<?= base_url('admin/users') ?>">
					  <?php $users = $this->Adminmodel->count('users', array('user_type' => 1));?>
                        <div class="card-body">
                           <div class="d-flex justify-content-between">
                              <h5 class="font-size-15 text-uppercase mb-0">Participants</h5>
                              <div class="avatar-xs">
                                 <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                 <i class="fa fa-users text-primary"></i>
                                 </span>
                              </div>
                           </div>
                           <h3 class="font-size-24"><?=@$users?></h3>
                           <!-- <p class="text-muted mb-0">Recent Deals</p> -->
                        </div>
                      </a>
                        <!-- end card-body -->
                        <!-- Project chart -->
                        <div id="project-chart"></div>
                     </div>
                     <!-- end card -->
                  </div>
                  <!-- end col-->
                  <!--<div class="col-md-6 col-xl-4">
                    <a href="<?= base_url('admin/event') ?>">
					 <?php $event = $this->Adminmodel->count('event', '');?>
                     <div class="card overflow-hidden card-h-100 custom-shadow rounded-lg border">
                        <div class="card-body">
                           <div class="d-flex justify-content-between">
                              <h5 class="font-size-15 text-uppercase mb-0">Event</h5>
                              <div class="avatar-xs">
                                 <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                 <i class="fa fa-bookmark text-primary"></i>
                                 </span>
                              </div>
                           </div>
                           <h3 class="font-size-24"><?=@$event?></h3>

                        </div>

                        <div id="ongoing-chart"></div>
                     </div>
                   </a>

                  </div>-->
                  <!-- end col-->
                  <div class="col-xl-4">
                    <a href="<?= base_url('admin/users/health_coach') ?>">
					 <?php $health_coach = $this->Adminmodel->count('users', array('user_type' => 2));?>
                     <div class="card overflow-hidden card-h-100 custom-shadow rounded-lg border">
                        <div class="card-body">
                           <div class="d-flex justify-content-between">
                              <h5 class="font-size-15 text-uppercase mb-0">Health Coaches</h5>
                              <div class="avatar-xs">
                                 <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                 <i class="fa fa-link text-primary"></i>
                                 </span>
                              </div>
                           </div>
                           <h3 class="font-size-24"><?=@$health_coach?></h3>

                        </div>

                        <div id="completed-chart"></div>
                     </div>
                   </a>

                  </div>


				  <div class="col-xl-4">
                    <a href="<?= base_url('admin/users/coach_admin') ?>">
					 <?php $coach_admin = $this->Adminmodel->count('coach_admin', '');?>
                     <div class="card overflow-hidden card-h-100 custom-shadow rounded-lg border">
                        <div class="card-body">
                           <div class="d-flex justify-content-between">
                              <h5 class="font-size-15 text-uppercase mb-0">Coach Admin</h5>
                              <div class="avatar-xs">
                                 <span class="avatar-title rounded bg-soft-primary font-size-20 mini-stat-icon">
                                 <i class="fa fa-link text-primary"></i>
                                 </span>
                              </div>
                           </div>
                           <h3 class="font-size-24"><?=@$coach_admin?></h3>

                        </div>

                        <div id="completed-chart"></div>
                     </div>
                   </a>

                  </div>

                  <!-- end col -->
               </div>
               <!-- end row -->
            </div>
            <!-- end col -->

         </div>
         <!-- end row-->


         <!-- end row -->
         <div class="row">
            <div class="col-xl-12">
               <!--<div class="card custom-shadow rounded-lg border">
                  <div class="card-body">
                     <a href="<?= base_url('admin/hotdeals') ?>"><h4 class="card-title mb-4">Recent Hot Deals</h4></a>
                     <div class="">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                           <thead class="thead-light text-center">
                              <tr>
                                 <td>Sl No.</td>
                                 <th>Deal Name</th>
                                 <th>Vendor Name</th>
                                 <th>Created Date</th>
                                 <th>Exipry Date</th>
                                 <th width="80">Action</th>
                              </tr>
                           </thead>
                           <tbody class="text-center">
                            <?php foreach ($dealList as $key => $v): ?>
                    <tr>
                      <td><?= $key+1 ?></td>

                      <td><?=substr(@$v->title,0,20); ?>.. </td>
                      <td><?=substr(@$v->business_name,0,15); ?>..</td>
                      <td><?= date('d-M-Y', strtotime(@$v->created)) ?></td>
                      <td><?= date('d-M-Y', strtotime(@$v->hotdeal_expiry)) ?></td>
                      <td><a href="<?= base_url('admin/deals/view/dashboard/'.@$v->dealId) ?>" class="btn btn-outline-primary btn-sm">View Details</a></td>

                    </tr>
                  <?php endforeach ?>


                           </tbody>
                        </table>
                     </div>
                  </div>

               </div>-->
               <!-- end card -->
            </div>
            <!-- end col -->

         </div>
         <!-- end col -->
      </div>
   </div>
   <!-- End Page-content -->