@extends('layouts.base')
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/plus-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/plus-admin-template/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
      @include('layouts.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        @include('layouts.navbar')
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <div class="header-left">
                <button class="btn btn-primary mb-2 mb-md-0 me-2"> Create new document </button>
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button>
              </div>
              <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
                <div class="d-flex align-items-center">
                  <a href="#">
                    <p class="m-0 pe-3">Dashboard</p>
                  </a>
                  <a class="ps-3 me-4" href="#">
                    <p class="m-0">ADE-00234</p>
                  </a>
                </div>
                <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                  <i class="mdi mdi-plus-circle"></i> Add Prodcut </button>
              </div>
            </div>
            <!-- first row starts here -->
            <div class="row">
              <div class="col-xl-12 stretch-card grid-margin">
                <div class="card">
                  <div class="card-body">
                      
                    <h2 class="card-title">Form Tambah Data Role</h2>
                    <form class="forms-sample" method="POST" action="{{ route('role.post') }}">
                     @csrf
                      <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="role">Nama Role</label>
                            <input type="text" class="form-control" id="role" name="role" placeholder="Role" />
                          </div>
                         
                          <button type="submit" class="btn btn-primary me-2"> Simpan </button>
                        </div>
                      </div>
                    </form>
                  </div>

                  <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <table id="example" class="table table-striped" style="width:100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Name</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($role as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{  $item->role }}</td>
                            <td class="d-flex flex-row-reverse">
                                <a  class="btn btn-outline-primary mr-5" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}">
                                    <i class="fa fa-pencil fa-fw"></i>
                                  </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                                        <a type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('role.edit', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                  <div class="form-group">
                                                    <label for="role">Nama Role</label>
                                                    <input type="text" class="form-control" id="role" name="role" value="{{ $item->role }}" />
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                              </div>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <form action="hapus_role/{{ $item->id }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Anda yakin akan menghapus ini? ')" class="btn btn-outline-danger"
                                        type="submit"><i class="fa fa-trash-o fa-fw"></i></button>
                                </form>
                            </td>
                         </tr>
                        @endforeach
                        
                      </tbody>
                      <tfoot>
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama Role</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </tfoot>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Button trigger modal -->
  
            
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
  