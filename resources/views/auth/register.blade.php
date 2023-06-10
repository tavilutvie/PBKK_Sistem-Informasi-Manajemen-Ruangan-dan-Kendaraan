@extends('layouts.template')

@include('partials.navbar')

@section('main_content')

<section class="gradient-custom">
  <div class="container py-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong bg-dark text-white" style="border-radius: 15px;">
          <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 text-center">Registration</h3>
            <form action="/register" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="nama_depan" id="firstName" class="form-control form-control-lg" required/>
                    <label class="form-label" for="firstName">First Name</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4">

                  <div class="form-outline">
                    <input type="text" name="nama_belakang" id="lastName" class="form-control form-control-lg" required/>
                    <label class="form-label" for="lastName">Last Name</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 d-flex align-items-center">

                  <div class="form-outline w-100">
                    <input type="text" name="username" class="form-control form-control-lg" id="username" required/>
                    <label for="username" class="form-label">Username</label>
                  </div>

                </div>
                <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                        <input type="email" name="email" id="email" class="form-control form-control-lg" required/>
                        <label class="form-label" for="email">E-mail</label>
                    </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                        <input type="tel" name="nomor_telepon" id="phoneNumber" class="form-control form-control-lg" required/>
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                    </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                        <input type="password" name="password" id="password" class="form-control form-control-lg" required/>
                        <label class="form-label" for="password">New Password</label>
                    </div>

                    </div>
                <div class="col-md-6 mb-4 pb-2">

                  <div class="form-outline">
                    <input type="password" name="re_password" id="new_password" class="form-control form-control-lg" required/>
                    <label class="form-label" for="new_password">Re-Type Password</label>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-4 pb-2">

                    <div class="form-outline">
                        <input type="number" name="nip" id="nip" class="form-control form-control-lg" required/>
                        <label class="form-label" for="nip">NIM / NRP</label>
                    </div>

                </div>

                <div class="col-md-6 mb-4">

                  <h6 class="mb-2 pb-1">Jabatan: </h6>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="jabatan" type="radio" name="inlineRadioOptions" id="jabatanDosen"
                      value="tendik"/>
                    <label class="form-check-label" for="jabatanDosen">Dosen/Tendik</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="jabatan" type="radio" name="inlineRadioOptions" id="jabatanMahasiswa"
                      value="mahasiswa" checked/>
                    <label class="form-check-label" for="jabatanMahasiswa">Mahasiswa</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" name="jabatan" type="radio" name="inlineRadioOptions" id="otherJabatan"
                      value="lainnya" />
                    <label class="form-check-label" for="otherJabatan">Lainnya</label>
                  </div>

                </div>
              </div>
              
                <div class="w-100 col-md-6 mb-4">
                  <div class="mb-3">
                    <label for="formFile" class="form-label">Kartu Tanda Pengenal</label>
                    <input class="form-control" type="file" id="formFile" name="foto_tanda_pengenal" accept=".png, .jpg, .jpeg">
                  </div>
                </div>

              <div class="mt-4 pt-2 d-flex justify-content-center">
                <button class="btn btn-outline-light btn-lg px-5" type="submit">Submit</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection