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
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">ID</th>
                        <th class="whitespace-nowrap">KELAS</th>
                        <th class="whitespace-nowrap">SEMESTER</th>
                        <th class="whitespace-nowrap">TAHUN AJARAN</th>
                        <th class="whitespace-nowrap">MATA PELAJARAN</th>
                        <th class="whitespace-nowrap">DARI JAM</th>
                        <th class="whitespace-nowrap">SAMPAI JAM</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($jadwal_mapel as $no => $jm)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    {{ $no +1 }}
                                </div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $jm->kelas }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $jm->nama_mapel }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $jm->semester }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $jm->tahun_ajaran }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $jm->dari }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $jm->sampai }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#editModal1{{ $jm->id }}" >
                                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                     <!-- BEGIN: Edit Modal Content -->
                                     <div id="editModal1{{ $jm->id }}" class="modal" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <!-- BEGIN: Modal Header -->
                                                <div class="modal-header">
                                                    <h2 class="font-medium text-base mr-auto">Edit Jadwal Mapel</h2>
                                                </div>
                                                <!-- END: Modal Header -->
                                                <!-- BEGIN: Modal Body -->
                                                <form action="" method="POST">
                                                    @csrf
                                                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                    <div class="col-span-12 sm:col-span-lg">
                                                        <label for="role">Nama Role</label>
                                                        <input id="role" value="" name="role" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <!-- BEGIN: Modal Footer -->
                                                <div class="modal-footer">
                                                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                                    <button type="submit" class="btn btn-primary w-20">Simpan</button>
                                                </div>
                                                <!-- END: Modal Footer -->
                                            </form>
                                                <!-- END: Modal Body -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END: Modal Content -->

                                    <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal">
                                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
            <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">...</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevron-right"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">
                            <i class="w-4 h-4" data-lucide="chevrons-right"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>
    </div>
@endsection