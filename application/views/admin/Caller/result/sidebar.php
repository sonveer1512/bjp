<div id="scrollbar">
                <div class="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li class="nav-item">
                            <a href="<?=base_url()?>Dashboard" class="nav-link menu-link" >
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                            </a>
                            
                        </li> <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-apps-2-line"></i> <span data-key="t-apps">Access Management</span>
                            </a>
                            <div class="collapse menu-dropdown" id="sidebarApps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="<?=base_url()?>Subadmin" class="nav-link" data-key="t-calendar"> Sub Admin </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?=base_url()?>DepartmentAdmin" class="nav-link" data-key="t-chat"> Department Admin </a>
                                    </li>
                                    
                                   
                                   
                                   
                                   
                                    
                                   
                                    <li class="nav-item">
                                        <a href="#sidebarTickets" class="nav-link" data-bs-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="sidebarTickets" data-key="t-supprt-tickets">
                                            Employee Management
                                        </a>
                                        <div class="collapse menu-dropdown" id="sidebarTickets">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                     <a href="#callermgmt" class="nav-link" data-bs-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="sidebarTickets" data-key="t-supprt-tickets">
                                            Caller Management
                                        </a>
                                        <div class="collapse menu-dropdown" id="callermgmt">
                                             <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="<?=base_url()?>CallerAdmin" class="nav-link"
                                                        data-key="t-ticket-details"> Caller Admin </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="caller_upload_data.php" class="nav-link"
                                                        data-key="t-ticket-details"> Upload Data </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="feedback_list.php" class="nav-link"
                                                        data-key="t-ticket-details"> Feedback List </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="work_alloted_list.php" class="nav-link"
                                                        data-key="t-ticket-details"> Work Alloted List </a>
                                                </li>
                                                <li class="nav-item">
                                                     <a href="#resultuploaded" class="nav-link" data-bs-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="sidebarTickets" data-key="t-supprt-tickets">
                                            Result Of Uploaded List
                                        </a>
                                        <div class="collapse menu-dropdown" id="resultuploaded">
                                            <ul class="nav nav-sm flex-column">
                                                 <li class="nav-item">
                                                    <a href="not_intrested.php" class="nav-link"
                                                        data-key="t-ticket-details"> Not Interested </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="show_intrest.php" class="nav-link"
                                                        data-key="t-ticket-details">Show Interest</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="later_intrested.php" class="nav-link"
                                                        data-key="t-ticket-details">Later</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="confirm_intrested.php" class="nav-link"
                                                        data-key="t-ticket-details">Confirm</a>
                                                </li>
                                            </ul>
                                        </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="caller.php" class="nav-link"
                                                        data-key="t-ticket-details"> Payments</a>
                                                </li>
                                                 <li class="nav-item">
                                                    <a href="caller.php" class="nav-link"
                                                        data-key="t-ticket-details"> Others</a>
                                                </li>
                                               
                                             </ul>
                                        </div>
                                                </li>
                                                <li class="nav-item">
                                                   <a href="#marketing" class="nav-link" data-bs-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="sidebarTickets" data-key="t-supprt-tickets">
                                            Marketing
                                        </a>
                                        <div class="collapse menu-dropdown" id="marketing">
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a href="marketing.php" class="nav-link"
                                                        data-key="t-ticket-details"> Marketing Admin</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="follow_lead.php" class="nav-link"
                                                        data-key="t-ticket-details"> Follow The Lead</a>
                                                </li>
                                            </ul>
                                        </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="operation.php" class="nav-link"
                                                        data-key="t-ticket-details"> Operation </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="designing.php" class="nav-link"
                                                        data-key="t-ticket-details"> Designing </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="finance.php" class="nav-link"
                                                        data-key="t-ticket-details"> Finance</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                           <li class="nav-item">
                            <a class="nav-link menu-link" href="exhibitors.php">
                                <i class="ri-movie-2-line"></i> <span data-key="t-layouts">Exhibitors </span>
                            </a>
                            
                        </li>

                        <li class="nav-item">
                            <a class="nav-link menu-link" href="payments.php">
                                <i class="ri-wallet-line"></i> <span data-key="t-layouts">Payment </span>
                            </a>
                            
                        </li> <!-- end Dashboard Menu -->
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="expense.php">
                                <i class="ri-line-chart-line"></i> <span data-key="t-layouts">Expense Sheet </span>
                            </a>
                            
                        </li>
                         <li class="nav-item">
                            <a class="nav-link menu-link" href="services.php">
                                <i class="ri-service-line"></i> <span data-key="t-layouts">Services  </span>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="users.php">
                                <i class="ri-user-line"></i> <span data-key="t-layouts">Users  </span>
                            </a>
                            
                        </li>
                         <li class="nav-item">
                            <a class="nav-link menu-link" href="#docs" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-folders-line"></i> <span data-key="t-apps">Documents Of Users</span>
                            </a>
                            <div class="collapse menu-dropdown" id="docs">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="empdocs.php" class="nav-link" data-key="t-calendar"> Employee Documents </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="exedocs.php" class="nav-link" data-key="t-calendar">Exhibitors documents </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="subdocs.php" class="nav-link" data-key="t-chat">Subadmin Documents </a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-settings-5-line"></i> <span data-key="t-layouts">Setting Management  </span>
                            </a>
                            
                        </li>
                         <li class="nav-item">
                            <a class="nav-link menu-link" href="#report" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarApps">
                                <i class="ri-alert-line"></i> <span data-key="t-apps">Reporting Section </span>
                            </a>
                            <div class="collapse menu-dropdown" id="report">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-calendar"> Clients </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-calendar">Events </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-chat">Check Records / Updates </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="#" class="nav-link" data-key="t-chat">Payments</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-currency-line"></i> <span data-key="t-layouts">Payment Details  </span>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-article-line"></i> <span data-key="t-layouts">Change Status Of Forms</span>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-settings-5-line"></i> <span data-key="t-layouts">Manage Setting</span>
                            </a>
                            
                        </li>
                         <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-lock-password-line"></i> <span data-key="t-layouts">Change Password</span>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-calendar-event-line"></i> <span data-key="t-layouts">Create Events</span>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-phone-line"></i> <span data-key="t-layouts">Create Calls</span>
                            </a>
                            
                        </li>
                          <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-clapperboard-line"></i> <span data-key="t-layouts">Create Event</span>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-task-line"></i> <span data-key="t-layouts">Task</span>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link menu-link" href="#">
                                <i class="ri-file-text-line"></i> <span data-key="t-layouts">Invoice</span>
                            </a>
                            
                        </li>


                    </ul>
                </div>
                <!-- Sidebar -->
            </div>