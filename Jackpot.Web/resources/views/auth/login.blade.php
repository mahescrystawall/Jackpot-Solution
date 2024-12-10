<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>JACKPOT - Log In</title>
</head>

<body>

    <main class="w-[100vw] h-[100vh] bg-jcolor8">
        <div
            class="px-4 mx-auto max-w-screen-xl md:max-w-screen-lg 2xl:max-w-screen-xl text-center h-full content-center ">
            <section>
                <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 bg-black-600 rounded-3xl ">

                    <div class="w-full bg-white border rounded-lg shadow-[10px_10px_0px_0_rgba(0,173,181,1)] dark:border md:mt-0 sm:max-w-md xl:p-0 relative" >
                        
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <div class="w-[100%] text-left">
                                <span
                                    class="text-md leading-tight tracking-tight text-gray-500 text-left">
                                    JACKPOT
                                <span>
                            </div>
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl text-left uppercase">
                                Sign In
                            </h1>
                            <form class="max-w-md mx-auto" action="{{ route('postlogin') }}" method="POST">
                                @csrf
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="text" name="username" id="floating_email"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="floating_email"
                                        class="peer-focus:font-medium absolute text-lg text-black-500 dark:text-gray-400 duration-300 transform left-0 -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                                        address</label>
                                </div>
                                <div class="relative z-0 w-full mb-5 group">
                                    <input type="password" name="password" id="floating_password"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" " required />
                                    <label for="floating_password"
                                        class="peer-focus:font-medium left-0 absolute text-lg text-black-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                                </div>
                                <div class="flex gap-5 self-stretch mt-6 font-semibold uppercase max-md:mr-2">
                                    <button type="submit"
                                        class="px-12 py-2 text-xl text-white whitespace-nowrap bg-jblue1 rounded-xl max-md:px-5 hover:bg-jblue1-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 uppercase">
                                        Login
                                    </button>
                                    <div class="flex flex-col my-auto text-base text-black">
                                        <button type="submit"
                                            class="flex gap-3 hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            <span class="uppercase">Login with Demo</span>
                                            <img loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/b19d10cba04e44e6a290692865305dd3/bf5702d17dbb663aab58d2eba6ad73a7b65884a4ae39eeeb4f0e97d56ab5b09b?apiKey=b19d10cba04e44e6a290692865305dd3&"
                                                class="object-contain shrink-0 my-auto aspect-[3.23] w-[29px]" alt="" />
                                        </button>
                                        <div class="shrink-0 h-px bg-black border border-black border-solid w-[136px]"
                                            aria-hidden="true"></div>
                                    </div>
                                </div>
                                <div class="mt-16 text-base text-black max-md:mt-10 text-left">
                                    <span class="text-stone-500">For Support:</span>
                                    <a href="#"
                                        class="hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        <span class="border-b border-gray-600">info.live@gmail.com</span></a>
                                    
                                    <div class="mt-7 text-xs font-light text-black">
                                        This site is protected by reCAPTCHA and the Google
                                        <a href="#"
                                            class="text-black hover:text-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            Privacy Policy
                                        </a>
                                        and
                                        <a href="#"
                                            class="text-black hover:text-blue-600 border-b border-gray-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            Terms
                                        </a>
                                        of Service apply.
                                    </div>
                                  
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

</body>

</html>