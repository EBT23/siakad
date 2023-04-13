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
                <a href="javascript:;" data-tw-toggle="modal" data-tw-target="#tambahModal" class="btn btn-primary shadow-md mr-2">Add Semester</a>
            </div>
            <div class="hidden md:block mx-auto text-slate-500"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>

    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">ID</th>
                    <th class="whitespace-nowrap">NAMA SEMESTER</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($semester as $no => $s)
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex">
                                {{ $no +1 }}
                            </div>
                        </td>
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ $s->semester }}</a>
                            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal" data-tw-target="#editModal1{{ $s->id }}" >
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                 <!-- BEGIN: Edit Modal Content -->
                                 <div id="editModal1{{ $s->id }}" class="modal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <!-- BEGIN: Modal Header -->
                                            <div class="modal-header">
                                                <h2 class="font-medium text-base mr-auto">Edit Semester</h2>
                                            </div>
                                            <!-- END: Modal Header -->
                                            <!-- BEGIN: Modal Body -->
                                            <form action="{{ route('semester.edit', ['id' => $s->id]) }}" method="POST">
                                                @Pcsrf
                                            <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                                <div class="col-span-12 sm:col-span-lg">
                                                    <label for="role">Nama Semester</label>
                                                    <input id="role" value="{{ $s->semester }}" name="role" type="text" class="form-control">
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
    <!-- END: Data List -->


        <div id="tambahModal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Add Role</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <form action="{{ route('semester.post') }}" method="POST">
                        @csrf
                    <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                        <div class="col-span-12 sm:col-span-lg">
                            <label for="nama_semester">Nama Semester</label>
                            <input id="nama_semester" name="nama_semester" type="text" class="form-control" 
                            aria-describedby="nama_semester" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Simpan</button>
                    </div>
                    </form>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <!-- END: Modal Footer -->
                </div>
            </div>
        </div>

         <!-- BEGIN: Delete Confirmation Modal -->
    <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Apakah kamu yakin?</div>
                        <div class="text-slate-500 mt-2">Apakah Anda benar-benar ingin menghapus data ini? <br>Proses ini tidak dapat dibatalkan.</div>
                    </div>
                    <form action="hapus_semester/{{ $s->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-danger w-24">Delete</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Delete Confirmation Modal -->

        @endsection