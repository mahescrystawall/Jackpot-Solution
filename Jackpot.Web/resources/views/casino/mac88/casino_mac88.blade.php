<div class="mb-4 mt-2" x-data="{ activeTab: 'mac88_all' }">
    <ul class="grid grid-cols-2 md:grid-cols-7 items-center  w-full text-sm text-center" role="tablist">
       <li class="flex-auto w-full" role="presentation">
             <button
                @click="activeTab = 'mac88_all'"
                :class="activeTab === 'mac88_all' 
                   ? 'bg-[#03777C] text-[#EEEEEE] ' 
                   : 'border border-jcolor1 text-jcolor9 '"
                class="flex flex-col items-center px-3 py-6 w-full rounded-tl-md hover:border-jblue2 hover:text-jwhite2 gap-1"
             >
               <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
                  <path d="M13.0469 1.47786C12.7421 1.17314 12.3288 1.00195 11.8979 1.00195C11.4669 1.00195 11.0536 1.17314 10.7489 1.47786L9.14238 3.08436C9.13156 2.6607 8.95566 2.25803 8.65218 1.96222C8.34871 1.6664 7.94168 1.50085 7.51788 1.50086H3.76788C3.33691 1.50086 2.92358 1.67206 2.61883 1.97681C2.31409 2.28155 2.14288 2.69488 2.14288 3.12586V12.8759C2.14288 13.3068 2.31409 13.7202 2.61883 14.0249C2.92358 14.3297 3.33691 14.5009 3.76788 14.5009H13.5179C13.9489 14.5009 14.3622 14.3297 14.6669 14.0249C14.9717 13.7202 15.1429 13.3068 15.1429 12.8759V9.12586C15.1429 8.70282 14.978 8.29644 14.6831 7.99309C14.3883 7.68974 13.9868 7.51333 13.5639 7.50136L15.1684 5.89736C15.4731 5.59261 15.6443 5.17931 15.6443 4.74836C15.6443 4.3174 15.4731 3.9041 15.1684 3.59936L13.0469 1.47786ZM10.2309 7.50086H9.14288V6.41286L10.2309 7.50086ZM11.4559 2.18486C11.5139 2.1268 11.5828 2.08075 11.6587 2.04933C11.7345 2.01791 11.8158 2.00174 11.8979 2.00174C11.98 2.00174 12.0613 2.01791 12.1371 2.04933C12.2129 2.08075 12.2818 2.1268 12.3399 2.18486L14.4609 4.30636C14.5189 4.36439 14.565 4.4333 14.5964 4.50914C14.6278 4.58498 14.644 4.66627 14.644 4.74836C14.644 4.83045 14.6278 4.91173 14.5964 4.98757C14.565 5.06341 14.5189 5.13232 14.4609 5.19036L12.3399 7.31136C12.2818 7.36941 12.2129 7.41546 12.1371 7.44688C12.0613 7.4783 11.98 7.49447 11.8979 7.49447C11.8158 7.49447 11.7345 7.4783 11.6587 7.44688C11.5828 7.41546 11.5139 7.36941 11.4559 7.31136L9.33438 5.19036C9.27633 5.13232 9.23028 5.06341 9.19886 4.98757C9.16744 4.91173 9.15127 4.83045 9.15127 4.74836C9.15127 4.66627 9.16744 4.58498 9.19886 4.50914C9.23028 4.4333 9.27633 4.36439 9.33438 4.30636L11.4559 2.18486ZM8.14288 3.12586V7.50086H3.14288V3.12586C3.14288 2.78086 3.42288 2.50086 3.76788 2.50086H7.51788C7.86288 2.50086 8.14288 2.78086 8.14288 3.12586ZM3.14288 12.8759V8.50086H8.14288V13.5009H3.76788C3.42288 13.5009 3.14288 13.2209 3.14288 12.8759ZM9.14288 8.50086H13.5179C13.8629 8.50086 14.1429 8.78086 14.1429 9.12586V12.8759C14.1429 13.2209 13.8629 13.5009 13.5179 13.5009H9.14288V8.50086Z" fill="white"/>
               </svg>
                ALL
             </button>
       </li>

       <li class="flex-auto w-full" role="presentation">
             <button
                @click="activeTab = 'dragon_tiger'"
                :class="activeTab === 'dragon_tiger' 
                    ? 'bg-[#03777C] text-[#EEEEEE] ' 
                    : 'border border-jcolor1 text-jcolor9 '"
                class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
             >
             <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
               <g clip-path="url(#clip0_69_2409)">
               <path d="M10.2313 0.658289C9.74278 0.66257 9.24734 0.785601 8.77331 1.04401C9.86697 0.96457 10.8284 1.2997 11.0966 2.10457C7.06972 1.57795 2.96378 5.64645 10.1053 9.76666C12.043 10.8846 10.711 13.7603 6.84565 12.1134C1.69403 9.91851 2.06828 5.83945 3.92372 3.70513C4.15253 4.09038 4.34303 4.52369 4.51547 4.97857C5.11131 3.45998 6.27759 2.8342 7.44031 2.2032C5.80916 1.43507 4.2525 1.74123 2.7245 2.46588C3.04831 2.64538 3.3215 2.88785 3.55747 3.17588C0.00878048 5.29823 1.12706 11.9384 5.78891 14.6299C11.7218 18.0553 18.751 10.4975 12.2938 8.03426C7.56137 6.22894 8.80303 3.66223 11.1054 4.09188L11.1874 5.42391L15.6044 6.65438L16.2577 4.75885C15.3533 4.36782 14.6262 3.92832 14.0361 3.38876C14.0757 2.50613 13.703 1.62298 12.9765 0.74032C13.0002 1.17135 12.9953 1.60226 12.9267 2.03332C12.2327 1.1557 11.2476 0.649352 10.2314 0.65832L10.2313 0.658289ZM11.5887 2.70123C12.3075 2.92835 12.9863 3.35329 13.5262 4.07916C12.4722 4.57354 11.3661 3.91291 11.5887 2.70126V2.70123Z" fill="#C9C9C9"/>
               </g>
               <defs>
               <clipPath id="clip0_69_2409">
               <rect width="16" height="16" fill="white" transform="translate(0.928589)"/>
               </clipPath>
               </defs>
               </svg>
                DRAGON TIGER
             </button>
       </li>
         <li class="flex-auto w-full" role="presentation">
            <button
               @click="activeTab = 'baccarat'"
               :class="activeTab === 'baccarat' 
                  ? 'bg-[#03777C] text-[#EEEEEE] ' 
                  : 'border border-jcolor1 text-jcolor9 '"
               class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
            >
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
               <path d="M11.5476 1.33398H4.88094C4.14761 1.33398 3.54761 1.93398 3.54761 2.66732V13.334C3.54761 14.0673 4.14761 14.6673 4.88094 14.6673H11.5476C12.2809 14.6673 12.8809 14.0673 12.8809 13.334V2.66732C12.8809 1.93398 12.2809 1.33398 11.5476 1.33398ZM11.5476 13.334H4.88094V2.66732H11.5476V13.334ZM8.21427 5.33398C7.48094 5.33398 6.88094 5.93398 6.88094 6.66732C6.88094 6.93398 6.94761 7.13398 7.08094 7.33398H6.88094C6.14761 7.33398 5.54761 7.93398 5.54761 8.66732C5.54761 9.40065 6.14761 10.0007 6.88094 10.0007C7.28094 10.0007 7.61427 9.80065 7.88094 9.53399L7.21427 11.334H9.21427L8.54761 9.53399C8.81427 9.80065 9.14761 10.0007 9.54761 10.0007C10.2809 10.0007 10.8809 9.40065 10.8809 8.66732C10.8809 7.93398 10.2809 7.33398 9.54761 7.33398H9.34761C9.48094 7.13398 9.54761 6.86732 9.54761 6.66732C9.54761 5.93398 8.94761 5.33398 8.21427 5.33398Z" fill="#C9C9C9"/>
               </svg>
               BACCARAT
            </button>
      </li>
      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = 'sicbo'"
            :class="activeTab === 'sicbo' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
         <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16" fill="none">
            <path d="M9.56676 10.6664C9.90257 11.1142 10.3707 11.4449 10.905 11.6118C11.4392 11.7787 12.0124 11.7732 12.5434 11.5962C13.0743 11.4192 13.5361 11.0797 13.8634 10.6256C14.1907 10.1716 14.3668 9.62609 14.3668 9.06641C14.3668 8.46481 14.1598 7.91547 13.8238 7.46961L13.8334 7.46641L8.50009 1.06641L3.16676 7.46641L3.17636 7.46961C2.826 7.92838 2.63533 8.48916 2.63342 9.06641C2.63342 9.62609 2.80952 10.1716 3.13678 10.6256C3.46403 11.0797 3.92585 11.4192 4.45682 11.5962C4.98778 11.7732 5.56097 11.7787 6.0952 11.6118C6.62943 11.4449 7.09761 11.1142 7.43342 10.6664L7.96676 9.95601V12.2664C7.96676 13.8664 5.30009 13.8664 5.30009 13.8664C5.15864 13.8664 5.02299 13.9226 4.92297 14.0226C4.82295 14.1226 4.76676 14.2583 4.76676 14.3997C4.76676 14.5412 4.82295 14.6768 4.92297 14.7769C5.02299 14.8769 5.15864 14.9331 5.30009 14.9331H11.7001C11.8415 14.9331 11.9772 14.8769 12.0772 14.7769C12.1772 14.6768 12.2334 14.5412 12.2334 14.3997C12.2334 14.2583 12.1772 14.1226 12.0772 14.0226C11.9772 13.9226 11.8415 13.8664 11.7001 13.8664C11.7001 13.8664 9.03342 13.8664 9.03342 12.2664V9.95601L9.56676 10.6664Z" fill="#C9C9C9"/>
            </svg>
            SICBO
         </button>
      </li>
      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = 'roulette'"
            :class="activeTab === 'roulette' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g clip-path="url(#clip0_69_2427)">
               <path d="M16.1189 7.99935C16.1189 12.0527 12.8389 15.3327 8.7856 15.3327C4.73227 15.3327 1.45227 12.0527 1.45227 7.99935C1.45227 3.94602 4.73227 0.666016 8.7856 0.666016C12.8389 0.666016 16.1189 3.94602 16.1189 7.99935ZM9.45227 2.70602C10.8723 2.88602 12.1656 3.63268 13.0323 4.77268L14.1923 4.10602C13.6445 3.33363 12.9384 2.68681 12.1211 2.20861C11.3038 1.73041 10.394 1.4318 9.45227 1.33268V2.70602ZM3.37894 4.10602L4.53894 4.77268C4.96864 4.20784 5.50649 3.7342 6.12113 3.37938C6.73578 3.02456 7.41491 2.79565 8.11894 2.70602V1.33268C7.17722 1.4318 6.26741 1.73041 5.45011 2.20861C4.6328 2.68681 3.92674 3.33363 3.37894 4.10602ZM2.71227 10.7327L3.8656 10.066C3.59167 9.41144 3.4506 8.70893 3.4506 7.99935C3.4506 7.28976 3.59167 6.58726 3.8656 5.93268L2.71227 5.26602C2.32004 6.12387 2.11703 7.05608 2.11703 7.99935C2.11703 8.94262 2.32004 9.87483 2.71227 10.7327ZM8.11894 13.2927C7.41491 13.203 6.73578 12.9741 6.12113 12.6193C5.50649 12.2645 4.96864 11.7909 4.53894 11.226L3.37894 11.8927C3.92674 12.6651 4.6328 13.3119 5.45011 13.7901C6.26741 14.2683 7.17722 14.5669 8.11894 14.666V13.2927ZM14.1923 11.8927L13.0323 11.226C12.6026 11.7909 12.0647 12.2645 11.4501 12.6193C10.8354 12.9741 10.1563 13.203 9.45227 13.2927V14.626C11.3523 14.4327 13.0789 13.4393 14.1923 11.8927ZM14.8589 10.7327C15.6523 8.99935 15.6523 6.99935 14.8589 5.26602L13.7056 5.93268C13.9795 6.58726 14.1206 7.28976 14.1206 7.99935C14.1206 8.70893 13.9795 9.41144 13.7056 10.066L14.8589 10.7327ZM10.7856 7.99935L8.7856 4.66602L6.7856 7.99935L8.7856 11.3327L10.7856 7.99935Z" fill="#C9C9C9"/>
               </g>
               <defs>
               <clipPath id="clip0_69_2427">
               <rect width="16" height="16" fill="white" transform="translate(0.785645)"/>
               </clipPath>
               </defs>
               </svg>
            
            ROULETTE
         </button>
      </li>
      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = 'pocker'"
            :class="activeTab === 'pocker' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g clip-path="url(#clip0_69_2433)">
               <path d="M4.76378 2.5749C4.70676 2.57753 4.65046 2.58872 4.59678 2.60811L1.35559 3.79752C1.2155 3.84893 1.09018 3.96493 1.02747 4.10033C0.964747 4.23565 0.957528 4.40652 1.0089 4.54658L3.0939 10.2302C3.14525 10.3702 3.26122 10.4966 3.39659 10.5592C3.53197 10.622 3.70284 10.6292 3.84284 10.5778L7.08409 9.38836C7.22418 9.33699 7.3495 9.22102 7.41222 9.08565L7.41315 9.08368C7.47509 8.94861 7.4819 8.77877 7.43078 8.63936L5.34578 2.95574C5.29468 2.81636 5.17959 2.69061 5.04503 2.62761L5.04309 2.62668C4.9754 2.59527 4.89862 2.57805 4.8214 2.57486C4.80209 2.57408 4.78297 2.57396 4.76378 2.5749ZM5.98453 3.00065L7.97962 8.43815C8.08607 8.72917 8.07272 9.05054 7.9425 9.33174C7.81234 9.61269 7.57596 9.83046 7.28531 9.93721L6.42781 10.2517L8.30281 10.3386C8.45187 10.3455 8.6125 10.2867 8.72281 10.1862C8.83306 10.0857 8.90625 9.93093 8.91318 9.78186L9.19443 3.73499C9.20137 3.58599 9.14356 3.42443 9.04309 3.31411C8.94259 3.2038 8.78784 3.13068 8.63878 3.12371L5.9845 3.00058L5.98453 3.00065ZM9.76578 4.03971L9.49621 9.80927C9.48182 10.1188 9.34519 10.4099 9.11634 10.6188C8.88723 10.8272 8.58482 10.936 8.2755 10.9216L7.46112 10.8835L9.62906 11.6052C9.77062 11.6523 9.94193 11.6398 10.0753 11.573C10.2087 11.5061 10.3202 11.3766 10.3673 11.2351L12.2784 5.49099C12.3255 5.34936 12.313 5.17808 12.2462 5.04468C12.1794 4.91124 12.0499 4.79874 11.9083 4.75171L9.76581 4.03977L9.76578 4.03971ZM3.35753 4.61299C4.12184 5.39224 5.48315 5.16736 5.88097 6.0358C6.25206 6.84602 5.42753 7.47349 4.6944 7.23602L5.22565 8.19796L4.63878 8.41377L4.297 7.42352C3.97231 8.13052 2.95159 8.16558 2.60459 7.40696C2.18178 6.48268 3.35525 5.71321 3.35753 4.61299ZM12.7775 5.83861L10.922 11.4196C10.8243 11.7135 10.6139 11.9565 10.337 12.0954L10.3341 12.0963C10.0578 12.2337 9.73828 12.2562 9.44543 12.1588L8.80868 11.947L10.1622 13.1041C10.2756 13.2011 10.4392 13.2535 10.588 13.2419C10.7367 13.2302 10.8885 13.1531 10.9855 13.0397L14.9191 8.43624C15.016 8.3228 15.0684 8.16015 15.0567 8.0114C15.0451 7.86265 14.9671 7.7099 14.8536 7.61296L12.7775 5.83858L12.7775 5.83861Z" fill="#C9C9C9"/>
               </g>
               <defs>
               <clipPath id="clip0_69_2433">
               <rect width="16" height="16" fill="white" transform="translate(0.0714111)"/>
               </clipPath>
               </defs>
            </svg>
            
            POCKER
         </button>
      </li>
      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = 'lucky'"
            :class="activeTab === 'lucky' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
         <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.69051 11.3333L10.3572 6V4.66667H6.35718V6H9.02384L6.35718 11.3333M13.0238 12.6667H3.69051V3.33333H13.0238M13.0238 2H3.69051C3.33689 2 2.99775 2.14048 2.7477 2.39052C2.49765 2.64057 2.35718 2.97971 2.35718 3.33333V12.6667C2.35718 13.0203 2.49765 13.3594 2.7477 13.6095C2.99775 13.8595 3.33689 14 3.69051 14H13.0238C13.3775 14 13.7166 13.8595 13.9667 13.6095C14.2167 13.3594 14.3572 13.0203 14.3572 12.6667V3.33333C14.3572 2.97971 14.2167 2.64057 13.9667 2.39052C13.7166 2.14048 13.3775 2 13.0238 2Z" fill="#C9C9C9"/>
            </svg>
            
            LUCKY
         </button>
      </li>

      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = 'andar_bahar'"
            :class="activeTab === 'andar_bahar' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-tl-md hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
         <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2.64282 7.33398C2.64282 5.44865 2.64282 4.50532 3.22882 3.91998C3.81416 3.33398 4.75749 3.33398 6.64282 3.33398H7.97616C9.86149 3.33398 10.8048 3.33398 11.3902 3.91998C11.9762 4.50532 11.9762 5.44865 11.9762 7.33398V10.6673C11.9762 12.5527 11.9762 13.496 11.3902 14.0813C10.8048 14.6673 9.86149 14.6673 7.97616 14.6673H6.64282C4.75749 14.6673 3.81416 14.6673 3.22882 14.0813C2.64282 13.496 2.64282 12.5527 2.64282 10.6673V7.33398Z" stroke="#C9C9C9" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M6.00551 7.84264L6.26084 7.53797C6.74751 6.95797 6.99018 6.66797 7.30951 6.66797C7.62951 6.66797 7.87218 6.95797 8.35818 7.53797L8.61351 7.84264C9.07751 8.39664 9.30951 8.67397 9.30951 9.0013C9.30951 9.32864 9.07751 9.60597 8.61351 10.16L8.35818 10.4646C7.87151 11.0446 7.62884 11.3346 7.30951 11.3346C6.98951 11.3346 6.74684 11.0446 6.26084 10.4646L6.00551 10.16C5.54151 9.60597 5.30951 9.32864 5.30951 9.0013C5.30951 8.67397 5.54151 8.39664 6.00551 7.84264Z" stroke="#C9C9C9" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M11.9255 12.6673C12.6562 12.2587 12.9048 11.3607 13.4015 9.56534L14.1042 7.02534C14.6015 5.23 14.8502 4.332 14.4282 3.62467C14.0062 2.91734 13.0788 2.67667 11.2242 2.19534L9.91284 1.85534C8.05818 1.374 7.13084 1.13334 6.40018 1.542C5.88018 1.83267 5.60484 2.37134 5.30951 3.306" stroke="#C9C9C9" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            
            ANDAR BAHAR
         </button>
      </li>

      <li class="flex-auto w-full" role="presentation">
            <button
               @click="activeTab = 'teenpatti'"
               :class="activeTab === 'teenpatti' 
                  ? 'bg-[#03777C] text-[#EEEEEE] ' 
                  : 'border border-jcolor1 text-jcolor9 '"
               class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
            >
            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
               <g clip-path="url(#clip0_69_2455)">
               <path d="M8.38861 1.5C8.90861 1.50667 9.40195 1.82 9.59528 2.33333L12.9286 10.3C12.9886 10.4733 13.0219 10.6667 13.0153 10.8333C13.0077 11.0908 12.9264 11.3408 12.7811 11.5535C12.6357 11.7661 12.4324 11.9327 12.1953 12.0333L7.28195 14.0667C7.10862 14.1467 6.92862 14.1667 6.75528 14.1667C6.49472 14.1609 6.24155 14.0789 6.02709 13.9308C5.81264 13.7827 5.64629 13.575 5.54862 13.3333L2.24195 5.36667C1.96195 4.69333 2.28862 3.91333 2.96862 3.63333L7.87528 1.6C8.04195 1.54 8.21528 1.5 8.38861 1.5ZM10.7086 1.5H11.6753C12.0289 1.5 12.368 1.64048 12.6181 1.89052C12.8681 2.14057 13.0086 2.47971 13.0086 2.83333V7.06667L10.7086 1.5ZM14.3486 2.52667L15.2419 2.90667C15.4037 2.97251 15.5508 3.06964 15.6749 3.19247C15.799 3.3153 15.8977 3.46143 15.9652 3.62246C16.0327 3.7835 16.0677 3.95627 16.0683 4.13089C16.0689 4.3055 16.035 4.47851 15.9686 4.64L14.3486 8.54667V2.52667ZM8.38861 2.81333L3.46195 4.86L6.77528 12.8667L11.7086 10.8267L8.38861 2.81333ZM6.69528 5.69333L8.84862 7.3L8.55528 9.97333L6.40195 8.36L6.69528 5.69333Z" fill="#C9C9C9"/>
               </g>
               <defs>
               <clipPath id="clip0_69_2455">
               <rect width="16" height="16" fill="white" transform="translate(0.928589)"/>
               </clipPath>
               </defs>
               </svg>
               
               TENPATTI
            </button>
      </li>
      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = '32cards'"
            :class="activeTab === '32cards' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
         <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_69_2455)">
            <path d="M8.38861 1.5C8.90861 1.50667 9.40195 1.82 9.59528 2.33333L12.9286 10.3C12.9886 10.4733 13.0219 10.6667 13.0153 10.8333C13.0077 11.0908 12.9264 11.3408 12.7811 11.5535C12.6357 11.7661 12.4324 11.9327 12.1953 12.0333L7.28195 14.0667C7.10862 14.1467 6.92862 14.1667 6.75528 14.1667C6.49472 14.1609 6.24155 14.0789 6.02709 13.9308C5.81264 13.7827 5.64629 13.575 5.54862 13.3333L2.24195 5.36667C1.96195 4.69333 2.28862 3.91333 2.96862 3.63333L7.87528 1.6C8.04195 1.54 8.21528 1.5 8.38861 1.5ZM10.7086 1.5H11.6753C12.0289 1.5 12.368 1.64048 12.6181 1.89052C12.8681 2.14057 13.0086 2.47971 13.0086 2.83333V7.06667L10.7086 1.5ZM14.3486 2.52667L15.2419 2.90667C15.4037 2.97251 15.5508 3.06964 15.6749 3.19247C15.799 3.3153 15.8977 3.46143 15.9652 3.62246C16.0327 3.7835 16.0677 3.95627 16.0683 4.13089C16.0689 4.3055 16.035 4.47851 15.9686 4.64L14.3486 8.54667V2.52667ZM8.38861 2.81333L3.46195 4.86L6.77528 12.8667L11.7086 10.8267L8.38861 2.81333ZM6.69528 5.69333L8.84862 7.3L8.55528 9.97333L6.40195 8.36L6.69528 5.69333Z" fill="#C9C9C9"/>
            </g>
            <defs>
            <clipPath id="clip0_69_2455">
            <rect width="16" height="16" fill="white" transform="translate(0.928589)"/>
            </clipPath>
            </defs>
            </svg>
            
            32CARDS
         </button>
      </li>
      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = 'others'"
            :class="activeTab === 'others' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
         <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_69_2467)">
            <path d="M7.98115 0.979333C8.01864 0.840641 8.10958 0.722465 8.23404 0.650701C8.3585 0.578937 8.50634 0.559438 8.64515 0.596476L15.5252 2.43876C15.6643 2.47576 15.783 2.56649 15.8552 2.69101C15.9274 2.81553 15.9473 2.96364 15.9103 3.10276L13.2703 12.9519C13.2328 13.0909 13.1417 13.2092 13.017 13.281C12.8923 13.3528 12.7441 13.3721 12.6052 13.3348L5.72515 11.4925C5.58625 11.4552 5.4678 11.3644 5.3958 11.2399C5.32381 11.1154 5.30415 10.9674 5.34115 10.8285L7.98115 0.979333Z" stroke="#C9C9C9" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M7.4806 2.89648L1.47375 4.50677C1.33484 4.54401 1.21639 4.63485 1.1444 4.75934C1.0724 4.88383 1.05275 5.0318 1.08975 5.17077L3.72746 15.0199C3.76494 15.1589 3.85605 15.2772 3.98078 15.349C4.1055 15.4208 4.25363 15.4402 4.3926 15.4028L7.8326 14.4816" stroke="#C9C9C9" stroke-width="1.14286" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_69_2467">
            <rect width="16" height="16" fill="white" transform="translate(0.500061)"/>
            </clipPath>
            </defs>
            </svg>
            
            OTHERS
         </button>
      </li>
      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = 'lottery'"
            :class="activeTab === 'lottery' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
         <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.59039 2.93721C7.74022 2.76796 7.92428 2.63246 8.13039 2.53965C8.33649 2.44685 8.55995 2.39886 8.78599 2.39886C9.01203 2.39886 9.23549 2.44685 9.4416 2.53965C9.64771 2.63246 9.83176 2.76796 9.98159 2.93721C10.2202 2.79875 10.4725 2.68535 10.7344 2.59881C10.5122 2.2897 10.2197 2.03789 9.88096 1.86415C9.54225 1.69041 9.16707 1.59973 8.78639 1.59961C8.40538 1.59957 8.02983 1.69025 7.69081 1.86414C7.3518 2.03803 7.05905 2.29014 6.83679 2.59961C7.10133 2.68654 7.35253 2.79908 7.59039 2.93721ZM3.18559 6.39961C3.18542 5.89582 3.34379 5.40476 3.63826 4.99599C3.93273 4.58723 4.34836 4.28149 4.82627 4.1221C5.30417 3.96271 5.82012 3.95774 6.301 4.10792C6.78189 4.25809 7.20332 4.55578 7.50559 4.95881C7.78829 4.88727 8.07651 4.83963 8.36719 4.81641C8.13133 4.40238 7.80597 4.04624 7.41489 3.77401C7.0238 3.50179 6.57686 3.32033 6.10668 3.24291C5.63651 3.16548 5.15498 3.19403 4.69725 3.32648C4.23953 3.45893 3.81716 3.69193 3.46098 4.00847C3.10481 4.32501 2.82382 4.71709 2.63854 5.1561C2.45326 5.59511 2.36835 6.06995 2.39003 6.54596C2.41171 7.02197 2.53942 7.48714 2.76384 7.90748C2.98826 8.32783 3.30372 8.69276 3.68719 8.97561C3.74426 8.68601 3.82506 8.40628 3.92959 8.13641C3.69452 7.91231 3.50737 7.64284 3.37949 7.34431C3.2516 7.04577 3.18564 6.72438 3.18559 6.39961ZM11.9856 3.19961C11.4206 3.19941 10.8655 3.34882 10.377 3.63266C9.88839 3.91651 9.48369 4.32465 9.20399 4.81561C9.49946 4.83961 9.78693 4.88734 10.0664 4.95881C10.2657 4.69356 10.5178 4.47251 10.8068 4.30962C11.0958 4.14673 11.4155 4.04553 11.7456 4.01241C12.0757 3.97929 12.4091 4.01497 12.7247 4.11721C13.0404 4.21944 13.3314 4.386 13.5794 4.60637C13.8274 4.82675 14.027 5.09614 14.1656 5.39756C14.3042 5.69897 14.3789 6.02586 14.3848 6.35757C14.3907 6.68929 14.3278 7.01863 14.2 7.3248C14.0722 7.63097 13.8824 7.90732 13.6424 8.13641C13.7459 8.40681 13.8267 8.68654 13.8848 8.97561C14.4273 8.57576 14.8298 8.01481 15.0348 7.37275C15.2397 6.7307 15.2367 6.04032 15.0262 5.40007C14.8157 4.75981 14.4084 4.20238 13.8624 3.80724C13.3164 3.41211 12.6596 3.19946 11.9856 3.19961ZM5.18559 9.99961C5.18559 9.52685 5.27871 9.05872 5.45963 8.62195C5.64054 8.18518 5.90572 7.78832 6.24001 7.45403C6.5743 7.11973 6.97116 6.85456 7.40793 6.67364C7.8447 6.49273 8.31283 6.39961 8.78559 6.39961C9.25835 6.39961 9.72648 6.49273 10.1633 6.67364C10.6 6.85456 10.9969 7.11973 11.3312 7.45403C11.6655 7.78832 11.9306 8.18518 12.1116 8.62195C12.2925 9.05872 12.3856 9.52685 12.3856 9.99961C12.3856 10.9544 12.0063 11.8701 11.3312 12.5452C10.656 13.2203 9.74037 13.5996 8.78559 13.5996C7.83081 13.5996 6.91514 13.2203 6.24001 12.5452C5.56488 11.8701 5.18559 10.9544 5.18559 9.99961ZM8.78559 5.59961C7.61864 5.59961 6.49948 6.06318 5.67432 6.88834C4.84916 7.7135 4.38559 8.83266 4.38559 9.99961C4.38559 11.1666 4.84916 12.2857 5.67432 13.1109C6.49948 13.936 7.61864 14.3996 8.78559 14.3996C9.95255 14.3996 11.0717 13.936 11.8969 13.1109C12.722 12.2857 13.1856 11.1666 13.1856 9.99961C13.1856 8.83266 12.722 7.7135 11.8969 6.88834C11.0717 6.06318 9.95255 5.59961 8.78559 5.59961ZM7.58559 7.99961C7.47951 7.99961 7.37776 8.04175 7.30275 8.11677C7.22774 8.19178 7.18559 8.29352 7.18559 8.39961C7.18559 8.5057 7.22774 8.60744 7.30275 8.68245C7.37776 8.75747 7.47951 8.79961 7.58559 8.79961H9.37759C9.29546 8.91694 9.21013 9.04628 9.12159 9.18761C8.73519 9.80521 8.29919 10.6644 8.18879 11.55C8.18093 11.6028 8.18369 11.6565 8.19691 11.7082C8.21014 11.7599 8.23356 11.8083 8.26579 11.8508C8.29803 11.8933 8.33844 11.9289 8.38464 11.9555C8.43083 11.9822 8.48189 11.9993 8.5348 12.0059C8.58772 12.0125 8.64142 12.0085 8.69275 11.9941C8.74409 11.9796 8.79201 11.955 8.83371 11.9218C8.87542 11.8886 8.91005 11.8473 8.93559 11.8005C8.96112 11.7537 8.97703 11.7023 8.98239 11.6492C9.07199 10.9348 9.43599 10.194 9.79999 9.61161C10.0041 9.28574 10.2294 8.97361 10.4744 8.67721L10.484 8.66601L10.4864 8.66281C10.5369 8.60499 10.5697 8.53384 10.5809 8.45787C10.5921 8.3819 10.5812 8.30432 10.5495 8.23439C10.5177 8.16445 10.4666 8.10513 10.402 8.0635C10.3375 8.02187 10.2624 7.99969 10.1856 7.99961H7.58559Z" fill="#C9C9C9"/>
            </svg>
            
            
            LOTTERY
         </button>
      </li>
      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = 'cricketwar'"
            :class="activeTab === 'cricketwar' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
         <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_69_2481)">
            <path d="M3.40477 5.33372L2.47144 4.40039M5.40477 7.33372L6.07144 8.00039M8.07144 10.0004L8.7381 10.6671M10.7381 12.6671L11.6714 13.6004" stroke="#C9C9C9" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M8.07145 14.6673C11.7534 14.6673 14.7381 11.6825 14.7381 8.00065C14.7381 4.31875 11.7534 1.33398 8.07145 1.33398C4.38955 1.33398 1.40479 4.31875 1.40479 8.00065C1.40479 11.6825 4.38955 14.6673 8.07145 14.6673Z" stroke="#C9C9C9" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M5.40477 3.33372L4.47144 2.40039M7.40477 5.33372L8.07144 6.00039M10.0714 8.00039L10.7381 8.66706M13.6714 11.6004L12.7381 10.6671" stroke="#C9C9C9" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_69_2481">
            <rect width="16" height="16" fill="white" transform="translate(0.0714111)"/>
            </clipPath>
            </defs>
            </svg>
            
            CRICKETWAR
         </button>
      </li>
      <li class="flex-auto w-full" role="presentation">
         <button
            @click="activeTab = 'hi_lo'"
            :class="activeTab === 'hi_lo' 
               ? 'bg-[#03777C] text-[#EEEEEE] ' 
               : 'border border-jcolor1 text-jcolor9 '"
            class="flex flex-col items-center px-3 py-6 w-full rounded-none hover:border-jblue2 hover:text-jwhite2 gap-1"
         >
         <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_69_2490)">
            <path d="M7.83716 5.58707C7.75288 5.67017 7.70507 5.78334 7.70423 5.9017C7.7034 6.02006 7.74962 6.1339 7.83272 6.21818C7.91582 6.30246 8.029 6.35027 8.14736 6.35111C8.26571 6.35194 8.37955 6.30572 8.46383 6.22262L10.1349 4.56929V12.5204C10.1349 12.6383 10.1818 12.7513 10.2651 12.8347C10.3485 12.918 10.4615 12.9648 10.5794 12.9648C10.6973 12.9648 10.8103 12.918 10.8937 12.8347C10.977 12.7513 11.0238 12.6383 11.0238 12.5204V4.56929L12.6683 6.22262C12.7097 6.26377 12.7589 6.29635 12.8129 6.31851C12.8669 6.34067 12.9248 6.35196 12.9832 6.35176C13.0416 6.35155 13.0994 6.33984 13.1532 6.31731C13.2071 6.29477 13.256 6.26184 13.2972 6.2204C13.3383 6.17896 13.3709 6.12982 13.3931 6.07579C13.4152 6.02176 13.4265 5.96389 13.4263 5.90549C13.4261 5.8471 13.4144 5.78931 13.3918 5.73544C13.3693 5.68156 13.3364 5.63266 13.2949 5.59151L10.5794 2.87595L7.83716 5.58707Z" fill="#C9C9C9"/>
            <path d="M8.55724 10.1154C8.55775 10.0271 8.53196 9.94067 8.48316 9.8671C8.43436 9.79354 8.36476 9.73617 8.28323 9.70232C8.2017 9.66847 8.11194 9.65966 8.02538 9.67703C7.93883 9.69439 7.8594 9.73714 7.79724 9.79982L6.13502 11.4487V3.50204C6.13502 3.38417 6.08819 3.27112 6.00484 3.18777C5.92149 3.10442 5.80845 3.0576 5.69057 3.0576C5.5727 3.0576 5.45965 3.10442 5.3763 3.18777C5.29295 3.27112 5.24613 3.38417 5.24613 3.50204V11.4487L3.58835 9.79982C3.54691 9.75867 3.49777 9.72609 3.44374 9.70393C3.38971 9.68177 3.33184 9.67048 3.27345 9.67068C3.21505 9.67089 3.15726 9.68259 3.10339 9.70513C3.04952 9.72767 3.00061 9.7606 2.95946 9.80204C2.91831 9.84348 2.88573 9.89262 2.86357 9.94665C2.84142 10.0007 2.83012 10.0585 2.83033 10.1169C2.83074 10.2349 2.87799 10.3478 2.96168 10.4309L5.69057 13.1465L8.41946 10.4309C8.46226 10.3901 8.49649 10.3412 8.52015 10.287C8.54381 10.2329 8.55642 10.1745 8.55724 10.1154Z" fill="#C9C9C9"/>
            </g>
            <defs>
            <clipPath id="clip0_69_2490">
            <rect width="16" height="16" fill="white" transform="matrix(0 -1 1 0 0.357178 16)"/>
            </clipPath>
            </defs>
            </svg>
            
            HI LOW
         </button>
      </li>
      

       
       
    </ul>

    <!-- Tab Content -->
    <div class="mt-4 text-white">
       <div x-show="activeTab === 'mac88_all'" class="">
             @include('casino.mac88.all')
       </div>
       <div x-show="activeTab === 'dragon_tiger'" class="">
          {{-- @include('casino.casino_fun_games') --}}
       </div>
       <div x-show="activeTab === 'baccarat'" class="">
        {{-- @include('casino.casino_mac88_virtuals') --}}
     </div>
     <div x-show="activeTab === 'sicbo'" class="">
        {{-- @include('casino.casino_win_go_games') --}}
     </div>
    </div>
 </div>

 