<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu">
        </div>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
                <a href="<?= base_url() ?>Dashboard" class="nav-link menu-link">
                    <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">डैशबोर्ड</span>
                </a>

            </li> <!-- end Dashboard Menu -->
          <!--
            <li class="nav-item">
                <?php if ($this->rbac->hasPrivilege('sub_admin', 'can_view')) { ?>
                    <a href="<?= base_url() ?>Subadmin" class="nav-link menu-link">
                        <i class="ri-shield-user-line"></i> <span data-key="t-dashboards">सब एडमिन</span>
                    </a>
                <?php } ?>

            </li>
            <?php if ($this->rbac->hasPrivilege('supervisor', 'can_view')) { ?>
                <li class="nav-item">
                    <a href="<?= base_url() ?>Supervisor" class="nav-link menu-link">
                        <i class="ri-user-settings-line"></i> <span data-key="t-dashboards">सुपरवाइजर</span>
                    </a>
                <?php } ?>
                </li>
          -->
          	<li class="nav-item">
                <?php if ($this->rbac->hasPrivilege('staff', 'can_view')) { ?>
                    <a href="<?= base_url() ?>Staff" class="nav-link menu-link">
                      <i class="ri-shield-user-line"></i> <span data-key="t-dashboards">स्टाफ</span>
                    </a>
                <?php } ?>

            </li>
          
          		<li class="nav-item">
                <?php if ($this->rbac->hasPrivilege('Campaign', 'can_view')) { ?>
                    <a href="<?= base_url() ?>Campaign" class="nav-link menu-link">
                      <i class="ri-customer-service-line"></i> <span data-key="t-dashboards">कैंपेन</span>
                    </a>
                <?php } ?>

            </li>

                <?php if ($this->rbac->hasPrivilege('panchayat_samiti', 'can_view')) { ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#side_panchayatsamiti" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="side_panchayatsamiti">
                            <i class="ri-home-gear-line"></i> <span data-key="t-apps">पंचायत समिति</span>
                        </a>
                        <div class="collapse menu-dropdown" id="side_panchayatsamiti">
                            <ul class="nav nav-sm flex-column">

                                <?php if ($this->rbac->hasPrivilege('panchayat_samiti', 'can_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>panchayatsamiti" class="nav-link" data-key="t-calendar">पंचायत समिति</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->rbac->hasPrivilege('gram_panchayat', 'can_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>grampanchayat" class="nav-link" data-key="t-chat">ग्राम पंचायत</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->rbac->hasPrivilege('gram_name', 'can_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>gram" class="nav-link" data-key="t-chat">ग्राम</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                <?php } ?>

                <?php if ($this->rbac->hasPrivilege('nagar_palika', 'can_view')) { ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#nagarpalika" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-home-smile-2-line"></i> <span data-key="t-apps">नगर पालिका</span>
                        </a>
                        <div class="collapse menu-dropdown" id="nagarpalika">
                            <ul class="nav nav-sm flex-column">

                                <?php if ($this->rbac->hasPrivilege('nagar_palika', 'can_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>nagarpalika" class="nav-link" data-key="t-calendar">नगर पालिका</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->rbac->hasPrivilege('vard', 'can_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>ward" class="nav-link" data-key="t-chat">वार्ड</a>
                                    </li>
                                <?php } ?>


                            </ul>
                        </div>
                    </li>
                <?php } ?>

                <?php if ($this->rbac->hasPrivilege('all_data', 'can_view')) { ?>
                    <!-- <li class="nav-item">
                        <a href="<?= base_url() ?>userdata" class="nav-link menu-link">
                            <i class="ri-database-2-line"></i><span data-key="t-dashboards">All Data</span>
                        </a>

                    </li> -->
                <?php } ?>
          
          		<li class="nav-item">
                    <a class="nav-link menu-link" href="#userdata" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                      <i class="ri-home-smile-2-line"></i> <span data-key="t-apps">मतदाता</span>
                    </a>
                    <div class="collapse menu-dropdown" id="userdata">
                      <ul class="nav nav-sm flex-column">

                        <?php if ($this->rbac->hasPrivilege('bjp_user_data', 'can_view')) { ?>
                        <li class="nav-item">
                          <a href="<?= base_url() ?>userdata" class="nav-link" data-key="t-chat">सभी मतदाता</a>
                        </li>
                        <?php } ?>
                        
                        <?php if ($this->rbac->hasPrivilege('all_user_data', 'can_view')) { ?>
                        <li class="nav-item">
                          <a href="<?= base_url() ?>alluserdata" class="nav-link" data-key="t-calendar">सत्यापित मतदाता</a>
                        </li>
                        <?php } ?>
                        
                      </ul>
                    </div>
            </li>

                <?php if ($this->rbac->hasPrivilege('user_data', 'can_view')) { ?>
                    <!-- <li class="nav-item">
                        <a class="nav-link menu-link" href="#userdata" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-home-smile-2-line"></i> <span data-key="t-apps">Voter Data</span>
                        </a>
                        <div class="collapse menu-dropdown" id="userdata">
                            <ul class="nav nav-sm flex-column">

                                <?php if ($this->rbac->hasPrivilege('all_user_data', 'can_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>alluserdata" class="nav-link" data-key="t-calendar">All Voter Data</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->rbac->hasPrivilege('bjp_user_data', 'can_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>bjpuserdata" class="nav-link" data-key="t-chat">BJP Data</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->rbac->hasPrivilege('congress_user_data', 'can_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>congressuserdata" class="nav-link" data-key="t-chat">Congress Data</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->rbac->hasPrivilege('fake_data', 'can_view')) { ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>fakedata" class="nav-link" data-key="t-chat">Fake Data</a>
                                    </li>
                                <?php } ?>


                            </ul>
                        </div>
                    </li> -->
                <?php } ?>
                <?php if ($this->rbac->hasPrivilege('master', 'can_view')) { ?>
          			<li class="nav-item">
                        <a class="nav-link menu-link" href="#karyekarini" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                            <i class="ri-home-smile-2-line"></i> <span data-key="t-apps">कार्यकर्ता</span>
                        </a>
                        <div class="collapse menu-dropdown" id="karyekarini">
                            <ul class="nav nav-sm flex-column">

                                <?php if ($this->rbac->hasPrivilege('all_user_data', 'can_view')) { ?>
                                    <li class="nav-item">
                                      	<a class="nav-link menu-link" href="#jila" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                            <span data-key="t-apps">जिला</span>
                                        </a>
                                      	<div class="collapse menu-dropdown" id="jila">
                            				<ul class="nav nav-sm flex-column">
                                              <li class="nav-item">
                                                	<a href="<?= base_url() ?>master/leveldata/1" class="nav-link" data-key="t-calendar">जिला कार्यकारिणी</a>
                                              </li>
                                              <?php  ?>
                                              <li class="nav-item">
                                                	<a href="<?= base_url() ?>master/morchadata/1" class="nav-link" data-key="t-calendar">मोर्चा</a>
                                              </li>
                                          </ul>
                                      </div>
                                    </li>
                                <?php } ?>

                                <?php if ($this->rbac->hasPrivilege('bjp_user_data', 'can_view')) { ?>
                                    <li class="nav-item">
                                      	<a class="nav-link menu-link" href="#vidhansabhakar" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                            <span data-key="t-apps">विधानसभा</span>
                                        </a>
                                      	<div class="collapse menu-dropdown" id="vidhansabhakar">
                            				<ul class="nav nav-sm flex-column">
                                              <li class="nav-item">
                                                	<a href="<?= base_url() ?>master/leveldata/2" class="nav-link" data-key="t-calendar">विधानसभा कार्यकारिणी</a>
                                              </li>
                                              <?php  ?>
                                              <li class="nav-item">
                                                	<a href="<?= base_url() ?>master/morchadata/2" class="nav-link" data-key="t-calendar">मोर्चा</a>
                                              </li>
                                          </ul>
                                      </div>
                                    </li>
                                <?php } ?>

                                <?php if ($this->rbac->hasPrivilege('congress_user_data', 'can_view')) { ?>
                                    <li class="nav-item">
                                      	<a class="nav-link menu-link" href="#mandalkar" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                            <span data-key="t-apps">मंडल</span>
                                        </a>
                                      	<div class="collapse menu-dropdown" id="mandalkar">
                            				<ul class="nav nav-sm flex-column">
                                              <li class="nav-item">
                                                	<a href="<?= base_url() ?>master/leveldata/4" class="nav-link" data-key="t-calendar">मंडल कार्यकारिणी</a>
                                              </li>
                                              <?php  ?>
                                              <li class="nav-item">
                                                	<a href="<?= base_url() ?>master/morchadata/4" class="nav-link" data-key="t-calendar">मोर्चा</a>
                                              </li>
                                          </ul>
                                      </div>
                                    </li>
                                <?php } ?>

                                <?php if ($this->rbac->hasPrivilege('fake_data', 'can_view')) { ?>
                                    <li class="nav-item">
                                      	<a class="nav-link menu-link" href="#booth" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                                            <span data-key="t-apps">बूथ</span>
                                        </a>
                                      	<div class="collapse menu-dropdown" id="booth">
                            				<ul class="nav nav-sm flex-column">
                                              <li class="nav-item">
                                                	<a href="<?= base_url() ?>master/leveldata/6" class="nav-link" data-key="t-calendar">बूथ समिति</a>
                                              </li>
                                              <?php  ?>
                                          </ul>
                                      </div>
                                    </li>
                                <?php } ?>


                            </ul>
                        </div>
                    </li>
                <?php } ?>
          
          		<?php if ($this->rbac->hasPrivilege('master', 'can_view')) { ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>master">
                            <i class="ri-mastercard-line"></i> <span data-key="t-master">संगठन संरचना</span>
                        </a>
                    </li>
                <?php } ?>
          
          		<?php if ($this->rbac->hasPrivilege('master', 'can_view')) { ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>shop_owner">
                            <i class="ri-mastercard-line"></i> <span data-key="t-master">शॉप ओनर्स</span>
                        </a>
                    </li>
                <?php } ?>
               
                <?php if ($this->rbac->hasPrivilege('admin_permission', 'can_view')) { ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>AdminPermission">
                            <i class="ri-key-2-line"></i> <span data-key="t-admin_permission">एडमिन परमिशन</span>
                        </a>
                    </li>
                <?php } ?>
          
                <li class="nav-item">
                  <a class="nav-link menu-link" href="<?= base_url() ?>templates">
                    <i class="ri-key-2-line"></i> <span data-key="t-templates">मैसेज टेम्पलेट</span>
                  </a>
                </li>
          
          		 <?php if ($this->rbac->hasPrivilege('student_data', 'can_view')) { ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>StudentData">
                            <i class="ri-user-add-line"></i> <span data-key="t-admin_permission">स्टूडेंट डाटा</span>
                        </a>
                    </li>
                <?php } ?>
           		<?php if ($this->rbac->hasPrivilege('student_data', 'can_view')) { ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>Newuploadeddata">
                            <i class="ri-user-add-line"></i> <span data-key="t-admin_permission">नया उप्लोडेड डाटा</span>
                        </a>
                    </li>
                <?php } ?>
          
          		<?php if ($this->rbac->hasPrivilege('calling_data', 'can_view')) { ?>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="<?= base_url() ?>CallingData">
                            <i class="ri-phone-line"></i> <span data-key="t-admin_permission">कालिंग डाटा</span>
                        </a>
                    </li>
                <?php } ?>


        </ul>
    </div>
    <!-- Sidebar -->
</div>