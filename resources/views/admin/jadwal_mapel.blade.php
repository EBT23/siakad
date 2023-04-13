@extends('../layout/' . $layout)

@section('subhead')
    <title>Admin {{ $title }}</title>
@endsection
@section('subcontent')
            @if (Session::has('success'))
				<div class="alert alert-success">
					{{ Session::get('success') }}
				</div>
			@endif
    <h2 class="intro-y text-lg font-medium mt-10">{{ $title }}</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="text-center">
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#tambahModal" class="btn btn-primary shadow-md mr-2">Add Jadwal Mapel</a>
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>

@endsection