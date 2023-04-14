@extends('../layout/' . $layout)

@section('head')
    <title>Register - ADMIN</title>
@endsection

@section('content')
    <div class="container sm:px-10">
        <div class="block xl:grid grid-cols-2 gap-4">
            <!-- BEGIN: Register Info -->
            <div class="hidden xl:flex flex-col min-h-screen">
                <a href="" class="-intro-x flex items-center pt-5">
                    <img alt="Midone - HTML Admin Template" class="w-6" src="{{ asset('dist/images/logo.svg') }}">
                    <span class="text-white text-lg ml-3">
                        SIAKAD
                    </span>
                </a>
                <div class="my-auto">
                    <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="{{ asset('dist/images/illustration.svg') }}">
                    <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">SISTEM AKADEMIK SD</div>
                </div>
            </div>
            <!-- END: Register Info -->
            <!-- BEGIN: Register Form -->
            <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                    <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left text-white">Sign Up</h2>
                    <div class="intro-x mt-2 text-slate-400 dark:text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        <div class="intro-x mt-5">
                            <input type="text" name="name" id="name" class="intro-x login__input form-control py-3 px-4 block" placeholder="Nama">
                            <input type="number" name="tlp" id="tlp" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="No Telepon">
                            <div class="mt-3">
                                <select class="intro-x login__input form-control py-3 px-4 block" name="gender" id="gender" aria-placeholder="gender">
                                    <option selected>-jenis kelamin-</option>
                                    <option value="1" >Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <input type="email" name="email" id="email" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Email">
                            <input type="password" name="password" name="password" class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password">
                        </div>
                        <div class="intro-x mt-1 xl:mt-2 text-center xl:text-left ">
                            <button type="submit" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top text-white">Register</button>
                            <a  href="{{ route('login.index') }}" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top text-white">Login</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END: Register Form -->
        </div>
    </div>
@endsection
