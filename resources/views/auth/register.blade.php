@extends('auth.layouts.app-login')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body">
                            
                                <h2 class="card-title">REGISTER</h2>
                          <form class="forms-sample">
                            <div class="form-group">
                              <label for="exampleInputUsername1">Username</label>
                              <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" />
                            </div>
                            {{-- <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" />
                            </div> --}}
                            <div class="form-group">
                              <label for="exampleInputPassword1">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                            </div>
                            <button type="submit" class="btn btn-primary me-2"> Login </button>
                            <button type="submit" class="btn btn-github me-2"> Register </button>
                          </form>
                        </div>
                      </div>
                    </div>   
                    <div class="col-md-6 grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body text-black-50">
                            <h1>SISTEM AKADEMIK SD</h1>
                        </div>
                      </div>
                    </div>   
            </div>
        </div>
    </div>
    <!-- container-scroller -->
  