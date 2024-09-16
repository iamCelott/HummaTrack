<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register | Attex - Responsive Tailwind CSS 3 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
        content="A fully featured admin theme which can be used to build CRM, CMS, etc., Tailwind, TailwindCSS, Tailwind CSS 3"
        name="description">
    <meta content="coderthemes" name="author">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="assets/js/config.js"></script>
</head>

<body class="">
    <div class="flex items-stretch h-screen relative ">


        <div class=" w-full h-screen relative hidden lg:block" style="background-color: #e6f5ff">
            <div class="logo absolute " style="top: 40px;left:40px;">
                <a href="/" class="flex gap-2">
                    <img src="{{ asset('assets/images/polymer.png') }}" alt="" style="width: 40px">
                    <h3 style="font-size: 30px;font-weight: 800; color:#2176FF;">Humma<span
                            style="color: black">Track</span></h3>
                </a>
            </div>
            <div class=" flex mt-auto justify-center items-center text-center h-screen">
                <div class="xl:w-2/4 w-full mx-auto">
                    <img src="{{ asset('assets/images/loginregister.png') }}" alt="" data-aos="zoom-in"
                        data-aos-duration="1000" data-aos-delay="200">
                </div>
            </div>
        </div>

        <div class="bg-white lg:max-w-[50%] z-10 p-12 relative w-full h-full  dark:bg-gray-800">
            <div class="relative flex flex-col items-center justify-center h-full">
                <div class="flex justify-center">
                    <div class=" px-32 mx-auto">
                        <div class=" overflow-hidden">
                            <div class="p-9">
                                <div class="text-start mx-auto w-4/4">
                                    <h2 class="text-dark/70 text-start text-2xl font-bold dark:text-light/80 mb-2">
                                        Daftar</h2>
                                    <p class="text-gray-700 mb-9" style="min-width: 400px">Gabung untuk mulai
                                        kontribusi!
                                    </p>
                                </div>
                                <style>
                                    input::-webkit-outer-spin-button,
                                    input::-webkit-inner-spin-button {
                                        -webkit-appearance: none;
                                        margin: 0;
                                    }

                                    .form-header .stepIndicator.active {
                                        font-weight: 600;
                                        color: #2176FF;
                                    }

                                    .form-header .stepIndicator.finish {
                                        font-weight: 600;
                                        color: #2176FF;
                                    }

                                    .form-header .stepIndicator::before {
                                        content: "";
                                        position: absolute;
                                        left: 50%;
                                        bottom: 5%;
                                        transform: translateX(-50%);
                                        z-index: 9;
                                        width: 100%;
                                        height: 7px;
                                        background-color: #D0D0D0;
                                        border-radius: 5px;
                                    }

                                    .form-header .stepIndicator.active::before {
                                        background-color: #2176FF;
                                    }

                                    .form-header .stepIndicator.finish::before {
                                        background-color: #2176FF;
                                    }

                                    .form-header .stepIndicator.active::after {
                                        background-color: #2176FF;
                                    }

                                    .form-header .stepIndicator.finish::after {
                                        background-color: #2176FF;
                                    }

                                    .form-header .stepIndicator:last-child:after {
                                        display: none;
                                    }

                                    #signUpForm input.invalid {
                                        border: 2px solid #ffaba5;
                                    }

                                    .step {
                                        display: none;
                                    }
                                </style>
                                <link rel="stylesheet"
                                    href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" />
                                <!-- google font -->
                                <link
                                    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap"
                                    rel="stylesheet">
                                @if (session('success'))
                                    <div class="form-header flex gap-3 mb-4 text-xs text-center">
                                        <span class="stepIndicator active  flex-1 pb-8 relative">Step 1</span>
                                        <span class="stepIndicator active flex-1 pb-8 relative">Step 2</span>
                                        <span class="stepIndicator active flex-1 pb-8 relative">Selesai</span>
                                    </div>
                                    <!-- end step indicators --> <!-- step one -->
                                    <div class="mb-6 flex justify-center " style="margin: 50px 0">
                                        <img src="{{ asset('assets/images/register.png') }}" style="width: 50%"
                                            alt="">
                                    </div>
                                    <div class="form-footer flex gap-3 justify-center">
                                        <a href="{{ route('login') }}"
                                            style="
                                        padding: 10px 45px;
                                        border-radius:10px;
                                        margin-top:20px;
                                        color:#fefefe;
                                        border:1px solid white;
                                        background:linear-gradient(to right, #4D00FF, #00C8FF);
                                        ">Login
                                            Sekarang</a>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <span>Lakukan<a href="{{ route('register') }}" style="color: #2176FF;margin:0 0 0 10px;">Registrasi ulang!</a></span>
                                    </div>
                                @else
                                    <form id="signUpForm" class=" bg-white" method="POST"
                                        action="{{ route('register') }}">
                                        @csrf <!-- start step indicators -->
                                        <div class="form-header flex gap-3 mb-4 text-xs text-center">
                                            <span class="stepIndicator flex-1 pb-8 relative">Step 1</span>
                                            <span class="stepIndicator flex-1 pb-8 relative">Step 2</span>
                                            <span class="stepIndicator flex-1 pb-8 relative">Selesai</span>
                                        </div>
                                        <!-- end step indicators --> <!-- step one -->
                                        <div class="step">
                                            <div class="mb-6">
                                                <x-input-label for="name" :value="__('Nama')" />
                                                <x-text-input id="name" class="block mt-1 w-full" type="text"
                                                    name="name" :value="old('name')" required autofocus
                                                    autocomplete="name" />
                                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                            </div>
                                            <div class="mb-6">
                                                <label for="phone_number"
                                                    class='block font-bold text-sm text-gray-700 dark:text-gray-300'>Nomor
                                                    Telepon</label>
                                                <x-text-input id="phone_number" class="block mt-1 w-full" type="number"
                                                    name="phone_number" :value="old('phone_number')" required
                                                    autocomplete="phone_number" />
                                                <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                                            </div>
                                            <div class="flex items-center justify-between"
                                                style="margin: 25px 0 30px 0">
                                                <div class="line"
                                                    style="height: 1px; width: 50%;background-color: gray;margin-right:10px;">
                                                </div>
                                                <span class="text-gray">atau</span>
                                                <div class="line"
                                                    style="height: 1px; width: 50%;background-color: gray;margin-left:10px;">
                                                </div>
                                            </div>

                                            <div class="flex items-center justify-start mt-4 mb-6">
                                                <style>
                                                    .gugel:hover {
                                                        background-color: rgba(230, 230, 230, .2);
                                                        transition: .1s;
                                                    }
                                                </style>
                                                <button type='button' class="gugel flex items-center bg-white"
                                                    style="
                                                padding:7px 7px;
                                                width:100%;
                                                border-radius:10px;
                                                color:#fefefe;
                                                border:2px solid rgba(0,0,0,.1);
                                                ">
                                                    <img src="{{ asset('assets/images/google-icon.png') }}"
                                                        alt="" style="width:30px;">
                                                    <span class="text-gray-700"
                                                        style="margin: 0px 0px 0px 10px">Google</span>
                                                </button>
                                            </div>
                                        </div> <!-- step two -->
                                        <div class="step">
                                            <div class="mb-6">
                                                <x-input-label for="email" :value="__('Email')" />
                                                <x-text-input id="email" class="block mt-1 w-full" type="email"
                                                    name="email" :value="old('email')" required
                                                    autocomplete="username" />
                                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                            </div>
                                            <div class="mt-4">
                                                <x-input-label for="password" :value="__('Password')" />
                                                <x-text-input id="password" class="block mt-1 w-full"
                                                    type="password" name="password" required
                                                    autocomplete="new-password" />
                                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                            </div>
                                            <div class="form-header gap-2 mb-4 text-xs">
                                                <div class="flex gap-1 w-2/4 mt-5 mb-2">
                                                    <span id="pw-weakest"
                                                        class="pwIndicator flex-1 pb-2 rounded relative "
                                                        style="background-color: rgba(255,255,255.2)"></span>
                                                    <span id="pw-weak"
                                                        class="pwIndicator flex-1 pb-2 rounded relative    "
                                                        style="background-color: rgba(255,255,255.2)"></span>
                                                    <span id="pw-medium"
                                                        class="pwIndicator flex-1 pb-2 rounded relative  "
                                                        style="background-color: rgba(255,255,255.2)"></span>
                                                    <span id="pw-strong"
                                                        class="pwIndicator flex-1 pb-2 rounded relative  "
                                                        style="background-color: rgba(255,255,255.2)"></span>
                                                </div>
                                                <p id="textPwIndicator" class="textPwIndicator"></p>
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    const passwordInput = document.getElementById('password');
                                                    const pwWeakest = document.getElementById('pw-weakest');
                                                    const pwWeak = document.getElementById('pw-weak');
                                                    const pwMedium = document.getElementById('pw-medium');
                                                    const pwStrong = document.getElementById('pw-strong');
                                                    const textPwIndicator = document.getElementById('textPwIndicator');

                                                    function updatePasswordStrength() {
                                                        const password = passwordInput.value;
                                                        let strength = 0;

                                                        // Reset indicators
                                                        [pwWeakest, pwWeak, pwMedium, pwStrong].forEach(el => el.classList.remove('active'));

                                                        if (password.length > 0) {
                                                            if (password.length < 8) {
                                                                strength = 1; // Sangat Lemah
                                                                textPwIndicator.textContent = 'Sangat Lemah';
                                                                pwWeakest.style.backgroundColor = "red";
                                                                pwWeak.style.backgroundColor = "rgba(230,230,230,.4)";
                                                                pwMedium.style.backgroundColor = "rgba(230,230,230,.4)";
                                                                pwStrong.style.backgroundColor = "rgba(230,230,230,.4)";
                                                            } else if (password.length < 10) {
                                                                strength = 2; // Lemah
                                                                textPwIndicator.textContent = 'Lemah';
                                                                pwWeakest.style.backgroundColor = "orange";
                                                                pwWeak.style.backgroundColor = "orange";
                                                                pwMedium.style.backgroundColor = "rgba(230,230,230,.4)";
                                                                pwStrong.style.backgroundColor = "rgba(230,230,230,.4)";
                                                            } else if (password.length < 15) {
                                                                strength = 3; // Kuat
                                                                textPwIndicator.textContent = 'Kuat';
                                                                pwWeakest.style.backgroundColor = "green";
                                                                pwWeak.style.backgroundColor = "green";
                                                                pwMedium.style.backgroundColor = "green";
                                                                pwStrong.style.backgroundColor = "rgba(230,230,230,.4)";
                                                            } else if (password.length >= 15) {
                                                                strength = 4; // Sangat Kuat
                                                                textPwIndicator.textContent = 'Sangat Kuat';
                                                                pwWeakest.style.backgroundColor = "darkgreen";
                                                                pwWeak.style.backgroundColor = "darkgreen";
                                                                pwMedium.style.backgroundColor = "darkgreen";
                                                                pwStrong.style.backgroundColor = "darkgreen";
                                                            }
                                                        } else {
                                                            textPwIndicator.textContent = '';
                                                            pwWeakest.style.backgroundColor = "rgba(230,230,230,.4)";
                                                            pwWeak.style.backgroundColor = "rgba(230,230,230,.4)";
                                                            pwMedium.style.backgroundColor = "rgba(230,230,230,.4)";
                                                            pwStrong.style.backgroundColor = "rgba(230,230,230,.4)";
                                                        }
                                                    }

                                                    passwordInput.addEventListener('input', updatePasswordStrength);
                                                });
                                            </script>
                                            <div class="flex items-center justify-between"
                                                style="margin: 25px 0 30px 0">
                                                <div class="line"
                                                    style="height: 1px; width: 50%;background-color: gray;margin-right:10px;">
                                                </div>
                                                <span class="text-gray">atau</span>
                                                <div class="line"
                                                    style="height: 1px; width: 50%;background-color: gray;margin-left:10px;">
                                                </div>
                                            </div>

                                            <div class="flex items-center justify-start mt-4 mb-6">
                                                <style>
                                                    .gugel:hover {
                                                        background-color: rgba(230, 230, 230, .2);
                                                        transition: .1s;
                                                    }
                                                </style>
                                                <button type='button' class="gugel flex items-center bg-white"
                                                    style="
                                                padding:7px 7px;
                                                width:100%;
                                                border-radius:10px;
                                                color:#fefefe;
                                                border:2px solid rgba(0,0,0,.1);
                                                ">
                                                    <img src="{{ asset('assets/images/google-icon.png') }}"
                                                        alt="" style="width:30px;">
                                                    <span class="text-gray-700"
                                                        style="margin: 0px 0px 0px 10px">Google</span>
                                                </button>
                                            </div>
                                        </div> <!-- step three -->
                                        <!-- start previous / next buttons -->
                                        <div class="form-footer flex gap-3 justify-center"> <button type="button"
                                                id="prevBtn"
                                                style="
                                            padding: 10px 45px;
                                            border-radius:10px;
                                            margin-top:20px;
                                            color:#4D00FF;
                                            border:2px solid #4D00FF;
                                            background:white;
                                            "
                                                onclick="nextPrev(-1)" style="width: 50%">Previous</button> <button
                                                type="button" id="nextBtn"
                                                style="
                                            padding: 10px 45px;
                                            border-radius:10px;
                                            margin-top:20px;
                                            color:#fefefe;
                                            border:1px solid white;
                                            background:linear-gradient(to right, #4D00FF, #00C8FF);
                                            "
                                                onclick="nextPrev(1)" style="width: 50%">Next</button> </div>
                                        <!-- end previous / next buttons -->
                                    </form><!-- tailwind css -->

                                    <div class="text-center" style="margin-top: 30px" id="loginDirect">
                                        <p class="text-muted">Sudah punya akun? <a href="{{ route('login') }}"
                                                class="text-muted  ms-1 link-offset-3 "
                                                style="color:#246AFF ">Login!</a></p>
                                    </div>
                                    <script>
                                        var currentTab = 0; // Current tab is set to be the first tab (0)
                                        showTab(currentTab); // Display the current tab

                                        function showTab(n) {
                                            // This function will display the specified tab of the form...
                                            var x = document.getElementsByClassName("step");
                                            x[n].style.display = "block";
                                            //... and fix the Previous/Next buttons:
                                            if (n == 0) {
                                                document.getElementById("prevBtn").style.display = "none";
                                            } else {
                                                document.getElementById("prevBtn").style.display = "inline";
                                            }
                                            if (n == 1) {
                                                document.getElementById("nextBtn").innerHTML = "Submit";
                                            } else if (n == 2) {
                                                document.getElementById("nextBtn").style.display = "none";
                                            } else {
                                                document.getElementById("nextBtn").innerHTML = "Next";
                                            }
                                            //... and run a function that will display the correct step indicator:
                                            fixStepIndicator(n)
                                        }

                                        function nextPrev(n) {
                                            // This function will figure out which tab to display
                                            var x = document.getElementsByClassName("step");
                                            // Exit the function if any field in the current tab is invalid:
                                            if (n == 1 && !validateForm()) return false;
                                            // Hide the current tab:
                                            x[currentTab].style.display = "none";
                                            // Increase or decrease the current tab by 1:
                                            currentTab = currentTab + n;
                                            // if you have reached the end of the form...
                                            if (currentTab >= x.length) {
                                                // ... the form gets submitted:
                                                document.getElementById("nextBtn").style.display = "none";
                                                document.getElementById("prevBtn").style.display = "none";
                                                document.getElementById("loginDirect").style.display = "none";
                                                document.getElementById("signUpForm").submit();
                                                return false;
                                            }
                                            // Otherwise, display the correct tab:
                                            showTab(currentTab);
                                        }

                                        function validateForm() {
                                            // This function deals with validation of the form fields
                                            var x, y, i, valid = true;
                                            x = document.getElementsByClassName("step");
                                            y = x[currentTab].getElementsByTagName("input");
                                            // A loop that checks every input field in the current tab:
                                            for (i = 0; i < y.length; i++) {
                                                // If a field is empty...
                                                if (y[i].value == "") {
                                                    // add an "invalid" class to the field:
                                                    y[i].className += " invalid";
                                                    // and set the current valid status to false
                                                    valid = false;
                                                }
                                            }
                                            // If the valid status is true, mark the step as finished and valid:
                                            if (valid) {
                                                document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
                                            }
                                            return valid; // return the valid status
                                        }

                                        function fixStepIndicator(n) {
                                            // This function removes the "active" class of all steps...
                                            var i, x = document.getElementsByClassName("stepIndicator");
                                            for (i = 0; i < x.length; i++) {
                                                x[i].className = x[i].className.replace(" active", "");
                                            }
                                            //... and adds the "active" class on the current step:
                                            x[n].className += " active";
                                        }
                                    </script>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Plugin Js -->
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/lucide/umd/lucide.min.js"></script>
    <script src="assets/libs/%40frostui/tailwindcss/frostui.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- App Js -->
    <script src="assets/js/app.js"></script>

    <!-- Swiper Plugin Js -->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Swiper Auth Demo Js -->
    <script src="assets/js/pages/auth-swiper.js"></script>
    <script>
        AOS.init();
    </script>
</body>


<!-- Mirrored from coderthemes.com/attex/tailwind/layouts/auth-register-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 05:27:55 GMT -->

</html>


<!-- Login Card -->
