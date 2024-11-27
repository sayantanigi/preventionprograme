<?php 

$settings = $this->Adminmodel->get('settings', true, 'settingId', '1'); 
//print_r(@$this->session->userdata('USERROLEID'));die;
?>
<div data-simplebar class="sidebar-menu-scroll">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
       <!-- Left Menu Start -->
       <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>
			
			<?php
			    $dashBoardMgnt = $this->Adminmodel->get_by('role_assignments', 'single', array('role_id' => @$this->session->userdata('USERROLEID'), 'menu_id' => 1), '', 1);
				//print_r($dashBoardMgnt);die;
			?>
			
			<?php if(@$dashBoardMgnt->has_read_access == 1 || @$dashBoardMgnt->has_write_access == 1 || @$dashBoardMgnt->has_full_access == 1){ ?>
                <li class="<?= (!empty($page) && $page == 'dashboard')? 'mm-active' : ''; ?>"><a href="<?=base_url('user/dashboard')?>" class="waves-effect"><i class="fas fa-home"></i> Dashboard</a></li>
			<?php } ?>
			
			
			
			
			<?php
			    $globalAdminMgnt = $this->Adminmodel->get_by('role_assignments', 'single', array('role_id' => @$this->session->userdata('USERROLEID'), 'menu_id' => 2), '', 1);
			?>
			<?php if(@$globalAdminMgnt->has_read_access == 1 || @$globalAdminMgnt->has_write_access == 1 || @$globalAdminMgnt->has_full_access == 1){ ?> 
				<li class="<?= (!empty($subpage) && $subpage == 'globaladmin')? 'mm-active' : ''; ?>">
					<a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($subpage) && $page == 'globaladmin')? 'mm-active' : ''; ?>">
					   <i class="fa fa-bookmark"></i>
					   <span>Manage Global Admin</span>
					</a>
					<ul class="sub-menu" aria-expanded="true">
						<li class="<?= (!empty($page) && $page == 'globaladmin')? 'mm-active' : ''; ?>">
							<a href="<?= base_url('user/globaladmin') ?>" class="<?= (!empty($subpage) && $subpage == 'globaladmin')? 'active' : ''; ?>">
								<span class="hide-menu">Global Admin List</span>
							</a>
						</li>
					</ul>
				</li>
			<?php } ?>	
			
			
			<?php
			    $participantMgnt = $this->Adminmodel->get_by('role_assignments', 'single', array('role_id' => @$this->session->userdata('USERROLEID'), 'menu_id' => 3), '', 1);
			?>
			<?php if(@$participantMgnt->has_read_access == 1 || @$participantMgnt->has_write_access == 1 || @$participantMgnt->has_full_access == 1){ ?>
				<li class="<?= (!empty($subpage) && $subpage == 'users')? 'mm-active' : ''; ?>">
					<a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
					   <i class="fa fa-bookmark"></i>
					   <span>Manage Participants</span>
					</a>
					<ul class="sub-menu" aria-expanded="true">
						<li class="<?= (!empty($page) && $page == 'Users List')? 'mm-active' : ''; ?>">
							<a href="<?=base_url('user/users')?>" class="<?= (!empty($subpage) && $subpage == 'users')? 'active' : ''; ?>">
								<span class="hide-menu">Participants List</span>
							</a>
						</li>
					</ul>
				</li>
			<?php } ?>

			
			<?php
			    $healthCoachMgnt = $this->Adminmodel->get_by('role_assignments', 'single', array('role_id' => @$this->session->userdata('USERROLEID'), 'menu_id' => 4), '', 1);
			?>
			<?php if(@$healthCoachMgnt->has_read_access == 1 || @$healthCoachMgnt->has_write_access == 1 || @$healthCoachMgnt->has_full_access == 1){ ?>
				<li class="<?= (!empty($subpage) && $subpage == 'health-coach')? 'mm-active' : ''; ?>">
					<a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
					   <i class="fa fa-bookmark"></i>
					   <span>Manage Health Coach</span>
					</a>
					<ul class="sub-menu" aria-expanded="true">
						<li class="<?= (!empty($page) && $page == 'Health Coach')? 'mm-active' : ''; ?>">
							<a href="#" class="<?= (!empty($subpage) && $subpage == 'health-coach')? 'active' : ''; ?>">
								<span class="hide-menu">Health Coach List</span>
							</a>
						</li>
					</ul>
				</li>
			<?php } ?>
			
			
			<?php
			    $coachAdminMgnt = $this->Adminmodel->get_by('role_assignments', 'single', array('role_id' => @$this->session->userdata('USERROLEID'), 'menu_id' => 5), '', 1);
			?>
			<?php if(@$coachAdminMgnt->has_read_access == 1 || @$coachAdminMgnt->has_write_access == 1 || @$coachAdminMgnt->has_full_access == 1){ ?>
				<li class="<?= (!empty($subpage) && $subpage == 'coach-admin')? 'mm-active' : ''; ?>">
					<a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
					   <i class="fa fa-bookmark"></i>
					   <span>Manage Coach Admin</span>
					</a>
					<ul class="sub-menu" aria-expanded="true">
						<li class="<?= (!empty($subpage) && $subpage == 'coach-admin')? 'mm-active' : ''; ?>">
							<a href="#" class="<?= (!empty($subpage) && $subpage == 'coach-admin')? 'active' : ''; ?>">
								<span class="hide-menu">Coach Admin List</span>
							</a>
						</li>
					</ul>
				</li>
			<?php } ?>
			
			<?php
			    $healthGroupMgnt = $this->Adminmodel->get_by('role_assignments', 'single', array('role_id' => @$this->session->userdata('USERROLEID'), 'menu_id' => 6), '', 1);
			?>
			<?php if(@$healthGroupMgnt->has_read_access == 1 || @$healthGroupMgnt->has_write_access == 1 || @$healthGroupMgnt->has_full_access == 1){ ?>
				<li class="<?= (!empty($subpage) && ($subpage == 'health-group' || $subpage == 'health-group-admin'))? 'mm-active' : ''; ?>">
					<a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
					   <i class="fa fa-bookmark"></i>
					   <span>Manage Health Group</span>
					</a>
					<ul class="sub-menu" aria-expanded="true">
					
						<li class="<?= (!empty($subpage) && $subpage == 'health-group')? 'mm-active' : ''; ?>">
							<a href="#" class="<?= (!empty($subpage) && $subpage == 'health-group')? 'active' : ''; ?>">
								<span class="hide-menu">Health Group List</span>
							</a>
						</li>
						
						<li class="<?= (!empty($subpage) && $subpage == 'health-group-admin')? 'mm-active' : ''; ?>">
							<a href="#" class="<?= (!empty($subpage) && $subpage == 'health-group-admin')? 'active' : ''; ?>">
								<span class="hide-menu">Health Group Admin List</span>
							</a>
						</li>
						
					</ul>
				</li>
			<?php } ?>
			
			<!--<li class="<?= (!empty($subpage) && $subpage == 'health-plan')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Health Plan</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'health-plan')? 'mm-active' : ''; ?>">
                        <a href="#" class="<?= (!empty($subpage) && $subpage == 'health-plan')? 'active' : ''; ?>">
                            <span class="hide-menu">Health Plan List</span>
                        </a>
                    </li>
                </ul>
            </li>-->
			
			<!--<li class="<?= (!empty($subpage) && $subpage == 'sponsors')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Sponsors</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'sponsors')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/sponsors') ?>" class="<?= (!empty($subpage) && $subpage == 'sponsors')? 'active' : ''; ?>">
                            <span class="hide-menu">Sponsors List</span>
                        </a>
                    </li>
                </ul>
            </li>-->
			 
			 
			<!--<li class="<?= (!empty($subpage) && $subpage == 'event')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Event</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($page) && $page == 'Event List')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/event') ?>" class="<?= (!empty($subpage) && $subpage == 'event')? 'active' : ''; ?>">
                            <span class="hide-menu">Manage Event</span>
                        </a>
                    </li> 
                </ul>
            </li>-->
			 
			
			
			
			<!--<li class="<?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Subscription</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'subscription')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/subscription') ?>" class="<?= (!empty($subpage) && $subpage == 'subscription')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">Subscription</span>
                        </a>
                    </li>
                </ul>
            </li>-->
			
			<!--<li class="<?= (!empty($page) && $page == 'Transaction')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'Transaction')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Transaction</span>
                </a>
				
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'transaction')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/transaction') ?>" class="<?= (!empty($subpage) && $subpage == 'transaction')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">All Transaction</span>
                        </a>
                    </li>
                </ul>
				
				<ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'payment_report')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/report') ?>" class="<?= (!empty($subpage) && $subpage == 'payment_report')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">Payment Report</span>
                        </a>
                    </li>
                </ul>
				
            </li>-->
			
			<!--<li class="<?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Subscriber</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'subscriber')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/subscribe/subscriber') ?>" class="<?= (!empty($subpage) && $subpage == 'subscriber')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">Subscriber</span>
                        </a>
                    </li>
                </ul>
            </li>-->
			
			<!--<li class="<?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Contact Query</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'contact')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/contact') ?>" class="<?= (!empty($subpage) && $subpage == 'contact')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">Manage Contact</span>
                        </a>
                    </li>
                </ul>
            </li>-->
			
			
			
        </ul>
    </div>
    <!-- Sidebar -->
 </div>
</div>
<!-- Left Sidebar End -->