<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-jcolor4 border-r border-jblue2 sm:translate-x-0 text-jcolor9" aria-label="Sidebar">
   <div class="h-full px-3 pb-4 overflow-y-auto bg-jcolor4">

   
      <div class="mb-4">
         <ul class="flex items-center w-full text-sm text-center gap-3" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="bg-[#00ADB5] text-[#EEEEEE] shadow-[5px_5px_0px_0_rgba(3,119,124,1)]" data-tabs-inactive-classes="shadow-[5px_5px_0px_0_rgba(46,46,46,1)]" role="tablist">
            <li class="flex-auto w-full" role="presentation">
                  <button class="inline-block p-3 w-full bg-jcolor5 text-jcolor9 rounded-md hover:text-jwhite2 hover:border hover:border-jblue1" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">
                     Casino
                  </button>
            </li>
            <li class="flex-auto w-full" role="presentation">
                  <button class="inline-block p-3 w-full bg-jcolor5 text-jcolor9 rounded-md hover:text-jwhite2 hover:border hover:border-jblue1" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">
                     Sports
                  </button>
            </li>
         </ul>
      </div>
      <div id="default-styled-tab-content">
         <div class="hidden" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
            <ul class="space-y-2">
               <li>
                  <a href="#" class="flex items-center p-2 rounded-lg {{ Request::is('/home') ? 'active' : 'font-semibold text-jwhite1' }} hover:bg-jblue1 hover:text-dark group">
                     <svg class="w-5 h-5 {{ Request::is('/home') ? 'active' : 'text-jblue1' }} text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                     </svg>
                     <span class="ms-3">Int Casino</span>
                  </a>
               </li>
            </ul>
         </div>
         <div class="hidden" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
         <ul class="space-y-2">
               <li>
                  <a href="#" class="flex items-center p-2 rounded-lg {{ Request::is('/home') ? 'active' : 'font-semibold text-jwhite1' }} hover:bg-jblue1 hover:text-dark group">
                     <svg class="w-5 h-5 {{ Request::is('/home') ? 'active' : 'text-jblue1' }} text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                        <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                        <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                     </svg>
                     <span class="ms-3">Inplay</span>
                  </a>
               </li>
            </ul>
         </div>
      </div>

      
   </div>
</aside>