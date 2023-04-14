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

  <!-- BEGIN: Data List -->
  <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
    <table class="table table-report -mt-2">
        <thead>
            <tr>
                <th class="whitespace-nowrap">ID</th>
                <th class="whitespace-nowrap">Kelas</th>
                <th class="text-center whitespace-nowrap">Semester</th>
                <th class="text-center whitespace-nowrap">Tahun Ajaran</th>
                <th class="text-center whitespace-nowrap">Mapel</th>
                <th class="text-center whitespace-nowrap">Dari</th>
                <th class="text-center whitespace-nowrap">Sampai</th>
                <th class="text-center whitespace-nowrap">Actions</th>
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
                        <a href="" class="font-medium whitespace-nowrap">{{ $jm->kl }}</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $jm->sm }}</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $jm->ta }}</a>
                        <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"></div>
                    </td>
                    <td>
                        <a href="" class="font-medium whitespace-nowrap">{{ $jm->mp }}</a>
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
                                            <h2 class="font-medium text-base mr-auto">Edit Jadwal Mata Pelajaran</h2>
                                        </div>
                                        <!-- END: Modal Header -->
                                        <!-- BEGIN: Modal Body -->
                                        <form action="{{ route('jadwal.mapel.edit', ['id' => $jm->id]) }}" method="POST">
                                            @csrf
                                        <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                                            <label for="id_kelas">Kelas</label>
                                            <select class="col-span-12 sm:col-span-lg" name="id_kelas" id="id_kelas" >
                                                @foreach($kelas as $kl)
                                                <option value="{{ $kl->id }}" {{ $kl->id == $jm->id_kelas ? 'selected' : '' }}  >{{ $kl->kelas }}</option>
                                                @endforeach
                                            </select>
                                            <label for="id_semester">Semester</label>
                                            <select class="col-span-12 sm:col-span-lg" name="id_semester" id="id_semester" >
                                                 @foreach($semester as $sm)
                                                 <option value="{{ $sm->id }}" {{ $sm->id == $jm->id_semester ? 'selected' : '' }}  >{{ $sm->semester }}</option>
                                                 @endforeach
                                             </select>
                                             <label for="nama_mapel">Mapel</label>
                                             <select class="col-span-12 sm:col-span-lg" name="id_mapel" id="id_mapel" >
                                                 @foreach($mapel as $mp)
                                                 <option value="{{ $mp->id }}" {{ $mp->id == $jm->id_mapel ? 'selected' : '' }}  >{{ $mp->nama_mapel }}</option>
                                                 @endforeach
                                             </select>
                                             <label for="id_thn_ajaran">Tahun Ajaran</label>
                                           <select class="col-span-12 sm:col-span-lg" name="id_thn_ajaran" id="id_thn_ajaran" >
                                                @foreach($thn_ajaran as $ta)
                                                <option value="{{ $ta->id }}" {{ $ta->id == $jm->id_thn_ajaran ? 'selected' : '' }}  >{{ $ta->tahun_ajaran }}</option>
                                                @endforeach
                                            </select>
                                            <div class="col-span-12 sm:col-span-lg">
                                                <label for="dari">Dari</label>
                                                <input id="dari" value="{{ $jm->dari }}" name="dari" type="date" class="form-control">
                                            </div>
                                            <div class="col-span-12 sm:col-span-lg">
                                                <label for="sampai">Sampai</label>
                                                <input id="sampai" value="{{ $jm->sampai }}" name="sampai" type="date" class="form-control">
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
                <form action="" method="POST">
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





    <!-- BEGIN: Modal Content -->
    <div id="tambahModal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- BEGIN: Modal Header -->
                <div class="modal-header">
                    <h2 class="font-medium text-base mr-auto">Add Role</h2>
                </div>
                <!-- END: Modal Header -->
                <!-- BEGIN: Modal Body -->
                <form action="{{ route('jadwal.mapel.post') }}" method="POST">
                    @csrf
                <div class="modal-body grid grid-cols-12 gap-4 gap-y-3">
                    <select class="col-span-12 sm:col-span-lg" name="id_kelas" id="id_kelas" >
                        <option selected>-pilih kelas-</option>
                        @foreach($kelas as $k)
                        <option value="{{ $k->id }}" >{{ $k->kelas }}</option>
                        @endforeach
                    </select>
                    <select class="col-span-12 sm:col-span-lg" name="id_semester" id="id_semester" >
                        <option selected>-pilih semester-</option>
                        @foreach($semester as $sm)
                        <option value="{{ $sm->id }}" >{{ $sm->semester }}</option>
                        @endforeach
                    </select>
                    <select class="col-span-12 sm:col-span-lg" name="id_thn_ajaran" id="id_thn_ajaran" >
                        <option selected>-pilih tahun ajaran-</option>
                        @foreach($thn_ajaran as $ta)
                        <option value="{{ $ta->id }}" >{{ $ta->tahun_ajaran }}</option>
                        @endforeach
                    </select>
                    <select class="col-span-12 sm:col-span-lg" name="id_mapel" id="id_semester" >
                        <option selected>-pilih mapel-</option>
                        @foreach($mapel as $mp)
                        <option value="{{ $mp->id }}" >{{ $mp->nama_mapel }}</option>
                        @endforeach
                    </select>
                   
                    <div class="col-span-12 sm:col-span-lg">
                        <label for="dari">Dari</label>
                        <input id="dari" name="dari" type="date" class="form-control" 
                        aria-describedby="dari" required>
                    </div>
                    <div class="col-span-12 sm:col-span-lg">
                        <label for="sampai">Sampai</label>
                        <input id="sampai" name="sampai" type="date" class="form-control" 
                        aria-describedby="sampai" required>
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
    <!-- END: Modal Content -->     
@endsection