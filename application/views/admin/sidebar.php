<?php $settings = $this->Adminmodel->get('settings', true, 'settingId', '1'); ?>
<div data-simplebar class="sidebar-menu-scroll">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
       <!-- Left Menu Start -->
       <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>
            <li class="<?= (!empty($page) && $page == 'dashboard')? 'mm-active' : ''; ?>"><a href="<?=base_url('admin/dashboard')?>" class="waves-effect"><i class="fas fa-home"></i> Dashboard</a></li>
			
			
			<li class="<?= (!empty($page) && $page == 'cms')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'cms')? 'mm-active' : ''; ?>">
                    <i class="fa fa-bookmark"></i>
                    <span>CMS</span>
                </a>
			   
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'about_us')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/cms/about_us') ?>" class="<?= (!empty($subpage) && $subpage == 'about_us')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">About Us</span>
                        </a>
                    </li>
				   
				    <li class="">
                        <a href="<?= base_url('admin/cms/privacy') ?>" class="">
                            <span class="hide-menu">Privacy Policy</span>
                        </a>
                    </li>
				   
				    <li class="">
                        <a href="<?= base_url('admin/cms/terms') ?>" class="">
                            <span class="hide-menu">Terms & Condition</span>
                        </a>
                    </li>
					
					<li class="">
                        <a href="<?= base_url('admin/cms/help') ?>" class="">
                            <span class="hide-menu">Help & Support</span>
                        </a>
                    </li>
				   
				    <li class="<?= (!empty($subpage) && $subpage == 'faq')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/faq') ?>" class="<?= (!empty($subpage) && $subpage == 'faq')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">Faq</span>
                        </a>
                    </li>
					
					<!--<li class="<?= (!empty($subpage) && $subpage == 'banner')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/cms/banner') ?>" class="<?= (!empty($subpage) && $subpage == 'banner')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">Banner Block</span>
                        </a>
                    </li>
					
					<li class="<?= (!empty($subpage) && $subpage == 'home_block')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/cms/home_block') ?>" class="<?= (!empty($subpage) && $subpage == 'home_block')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">Home Block</span>
                        </a>
                    </li>
					
					<li class="<?= (!empty($subpage) && $subpage == 'feature')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/feature') ?>" class="<?= (!empty($subpage) && $subpage == 'feature')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">Feature</span>
                        </a>
                    </li>
					
					<li class="<?= (!empty($subpage) && $subpage == 'event_process')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/cms/event_step_process') ?>" class="<?= (!empty($subpage) && $subpage == 'event_process')? 'mm-active' : ''; ?>">
                            <span class="hide-menu">Event Planning Process </span>
                        </a>
                    </li>-->
					
                </ul>
            </li>
			
			<li class="<?= (!empty($subpage) && $subpage == 'menu')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($subpage) && $subpage == 'menu')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Menu</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'menu')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/menu') ?>" class="<?= (!empty($subpage) && $subpage == 'menu')? 'active' : ''; ?>">
                            <span class="hide-menu">Menu List</span>
                        </a>
                    </li>
                </ul>
            </li>
			
			<li class="<?= ((@$subpage == 'role' || @$subpage == 'roleAssignment'))? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= ((@$subpage == 'role' || @$subpage == 'roleAssignment')) ? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage User Role</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'role')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/role') ?>" class="<?= (!empty($subpage) && $subpage == 'role')? 'active' : ''; ?>">
                            <span class="hide-menu">Role List</span>
                        </a>
                    </li>
					
					<li class="<?= (!empty($subpage) && $subpage == 'roleAssignment')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/roleAssignment') ?>" class="<?= (!empty($subpage) && $subpage == 'roleAssignment')? 'active' : ''; ?>">
                            <span class="hide-menu">Role Assignment Mgnt</span>
                        </a>
                    </li>
					
                </ul>
            </li>
			 
			<li class="<?= (!empty($subpage) && $subpage == 'globaladmin')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($subpage) && $page == 'globaladmin')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Global Admin</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($page) && $page == 'globaladmin')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/globaladmin') ?>" class="<?= (!empty($subpage) && $subpage == 'globaladmin')? 'active' : ''; ?>">
                            <span class="hide-menu">Global Admin List</span>
                        </a>
                    </li>
                </ul>
            </li>
			
			<li class="<?= (!empty($subpage) && $subpage == 'users')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Participants</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($page) && $page == 'Users List')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/users') ?>" class="<?= (!empty($subpage) && $subpage == 'users')? 'active' : ''; ?>">
                            <span class="hide-menu">Participants List</span>
                        </a>
                    </li>
                </ul>
            </li>
			
			
			<li class="<?= (!empty($subpage) && $subpage == 'health-coach')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Health Coach</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($page) && $page == 'Health Coach')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/users/health_coach') ?>" class="<?= (!empty($subpage) && $subpage == 'health-coach')? 'active' : ''; ?>">
                            <span class="hide-menu">Health Coach List</span>
                        </a>
                    </li>
                </ul>
            </li>
			
			<li class="<?= (!empty($subpage) && $subpage == 'coach-admin')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Coach Admin</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'coach-admin')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/users/coach_admin') ?>" class="<?= (!empty($subpage) && $subpage == 'coach-admin')? 'active' : ''; ?>">
                            <span class="hide-menu">Coach Admin List</span>
                        </a>
                    </li>
                </ul>
            </li>
			
			
			<li class="<?= (!empty($subpage) && ($subpage == 'health-group' || $subpage == 'health-group-admin'))? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Health Group</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
				
                    <li class="<?= (!empty($subpage) && $subpage == 'health-group')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/healthgroup') ?>" class="<?= (!empty($subpage) && $subpage == 'health-group')? 'active' : ''; ?>">
                            <span class="hide-menu">Health Group List</span>
                        </a>
                    </li>
					
					<li class="<?= (!empty($subpage) && $subpage == 'health-group-admin')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/healthgroup/health_group_admin') ?>" class="<?= (!empty($subpage) && $subpage == 'health-group-admin')? 'active' : ''; ?>">
                            <span class="hide-menu">Health Group Admin List</span>
                        </a>
                    </li>
					
                </ul>
            </li>
			
			
			<li class="<?= (!empty($subpage) && $subpage == 'health-plan')? 'mm-active' : ''; ?>">
                <a href="javascript: void(0);" class="has-arrow waves-effect <?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
                   <i class="fa fa-bookmark"></i>
                   <span>Manage Health Plan</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li class="<?= (!empty($subpage) && $subpage == 'health-plan')? 'mm-active' : ''; ?>">
                        <a href="<?= base_url('admin/healthplan') ?>" class="<?= (!empty($subpage) && $subpage == 'health-plan')? 'active' : ''; ?>">
                            <span class="hide-menu">Health Plan List</span>
                        </a>
                    </li>
                </ul>
            </li>
			
			<li class="<?= (!empty($subpage) && $subpage == 'sponsors')? 'mm-active' : ''; ?>">
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
            </li>
			 
			 
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
			
			<li class="<?= (!empty($page) && $page == 'deals')? 'mm-active' : ''; ?>">
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
            </li>
			
			
			
        </ul>
    </div>
    <!-- Sidebar -->
 </div>
</div>
<!-- Left Sidebar End -->