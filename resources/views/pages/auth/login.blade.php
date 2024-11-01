<x-layout.auth title="login">

    <div class="flex text-center items-center justify-center min-h-screen">
        <div class="left xl:w-5/12 xl:px-32 lg:px-32 px-10 items-center justify-center text-center">
            <div class="logo">
                <p class="text-[#4a28c4] font-bold text-2xl">LoGo.</p>
            </div>
            <div class="title mt-8 space-y-2">
                <h1 class="text-4xl font-semibold">Selamat Datang</h1>
                <p>Hallo! EduSphere Teman Belajarmu untuk Masa Depan.</p>
            </div>

            <form class="space-y-5 items-center mt-10">
                <div class="group-input">
                    <label for="simple-search" class="sr-only">Email</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="ri-mail-fill text-xl text-gray-600"></i>
                        </div>
                        <input type="text" id="simple-search"
                            class="py-4 bg-gray-50 border border-gray-300 text-black text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-white dark:border-gray-400 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Email" required />
                    </div>
                </div>
                <div class="group-input">
                    <label for="password" class="sr-only">Password</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <i class="ri-git-repository-private-fill text-xl text-gray-600"></i>
                        </div>
                        <input type="password" id="password"
                            class="py-4 bg-gray-50 border border-gray-300 text-black text-base rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-white dark:border-gray-400 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Password" required />
                        <button type="button" class="absolute inset-y-0 end-0 flex items-center pe-3"
                            onclick="togglePassword('password')">
                            <i class="ri-eye-off-line text-xl text-gray-600" id="password-toggle"></i>
                        </button>
                    </div>
                </div>
                <div class="group-input flex justify-between">
                    <div class="option flex items-center space-x-2 mb-2">
                        <input type="checkbox" id="option1" name="description"
                            class="checkbox w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                        <label for="option1" class="text-base text-gray-600">Remember me</label>
                    </div>
                    <a href="#" class="text-[#085cd7] font-medium">Forgot Password?</a>
                </div>
                <button class="mt-5 w-full bg-[#4a28c4] text-white py-4 rounded-xl text-lg">Log In</button>
            </form>
            <div class="flex text-center items-center justify-center mt-5 gap-1">
                <p class="font-medium text-gray-600">Tidak memiliki akun?</p>
                <a href="#" class="text-[#085cd7] font-medium">Registrasi</a>
            </div>
        </div>
        <div
            class="right xl:w-7/12 px-2 rounded-l-3xl bg-[#4a28c4] h-[100vh] items-center justify-center text-center hidden xl:flex">
            <div id="default-carousel" class="relative w-full  h-full justify-between" data-carousel="slide">
                <!-- title wrapper -->
                <div class="title text-white text-2xl mt-8">Judul</div>

                <!-- Carousel wrapper -->
                <div class=" relative w-full h-full overflow-hidden rounded-lg  items-center justify-center my-24">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="images justify-center items-center text-center flex">
                            <img src="{{ asset('auth/images/login/image-slider.png') }}" class=" w-[550px] h-auto"
                                alt="...">
                        </div>
                        <div class="text space-y-3 mt-16">
                            <h1 class="text-white text-2xl font-semibold">Connect with every application.</h1>
                            <p class="text-white">Simple Dashboard System</p>
                        </div>
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="images justify-center items-center text-center flex">
                            <img src="{{ asset('auth/images/login/animation.gif') }}"
                                class=" w-[550px] h-auto rounded-xl" alt="...">
                        </div>
                        <div class="text space-y-3 mt-16">
                            <h1 class="text-white text-2xl font-semibold">Connect with every application.</h1>
                            <p class="text-white">Simple Dashboard System</p>
                        </div>
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="images justify-center items-center text-center flex">
                            <img src="./images/login/image-slider.png" class=" w-[550px] h-auto" alt="...">
                        </div>
                        <div class="text space-y-3 mt-16">
                            <h1 class="text-white text-2xl font-semibold">Connect with every application.</h1>
                            <p class="text-white">Simple Dashboard System</p>
                        </div>
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="images justify-center items-center text-center flex">
                            <img src="{{ asset('auth/images/login/animation.gif') }}"
                                class=" w-[550px] h-auto rounded-xl" alt="...">
                        </div>
                        <div class="text space-y-3 mt-16">
                            <h1 class="text-white text-2xl font-semibold">Connect with every application.</h1>
                            <p class="text-white">Simple Dashboard System</p>
                        </div>
                    </div>
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="images justify-center items-center text-center flex">
                            <img src="{{ asset('auth/images/login/image-slider.png') }}" class=" w-[550px] h-auto"
                                alt="...">
                        </div>
                        <div class="text space-y-3 mt-16">
                            <h1 class="text-white text-2xl font-semibold">Connect with every application.</h1>
                            <p class="text-white">Simple Dashboard System</p>
                        </div>
                    </div>
                </div>

                <!-- Controls and Indicators Container -->
                <div
                    class="absolute bottom-0 mb-5 left-1/2 -translate-x-1/2 z-30 flex items-center justify-between w-[80%]">
                    <!-- Tombol Sebelumnya -->
                    <button type="button" class="px-2 py-2 bg-gray-700 rounded-full" data-carousel-prev>
                        <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                    </button>

                    <!-- Indikator Slider -->
                    <div class="flex space-x-3">
                        <button type="button" class="w-3 h-3 rounded-full bg-gray-300 active:bg-blue-500"
                            aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-gray-300 active:bg-blue-500"
                            aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-gray-300 active:bg-blue-500"
                            aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-gray-300 active:bg-blue-500"
                            aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                        <button type="button" class="w-3 h-3 rounded-full bg-gray-300 active:bg-blue-500"
                            aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                    </div>

                    <!-- Tombol Berikutnya -->
                    <button type="button" class="px-2 py-2 bg-gray-700 rounded-full" data-carousel-next>
                        <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('auth-scripts')
        <script>
            function togglePassword(inputId) {
                var passwordInput = document.getElementById(inputId);
                var eyeIcon = document.getElementById(inputId + '-toggle');
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.remove('ri-eye-off-line');
                    eyeIcon.classList.add('ri-eye-line');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.remove('ri-eye-line');
                    eyeIcon.classList.add('ri-eye-off-line');
                }
            }
        </script>
    @endpush
</x-layout.auth>
