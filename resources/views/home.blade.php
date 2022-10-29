@extends('layout.main')

@section('konten')


<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Data Sewa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $sewa->count() }}  Data</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Annual) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $admin->count() }}  Data</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-lock fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tasks Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pelanggan
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $pelanggan->count() }}  Data</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-users fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Mobil</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mobil->count() }}  Data</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-car fa-2x text-gray-300" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-15">

                            <!-- Collapsable Card Example -->
                            <div class="card shadow mb-10 ">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Tentang Aplikasi Sewa Mobil</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample">
                                    <div class="card-body">
                                        Sewa Mobil merupakan perusahaan yang bergerak pada bidang jasa. Jasa yang ditawarkan pada perusahaan ini ialah sewa mobil dan antar – jemput ke bandara ataupun keluar kota. Dalam persaingan dunia bisnis pelayanan terhadap pelanggan sangat diutamakan, seperti kenyamanan, ketepatan waktu, serta kemudahan-kemudahan yang bisa meningkatkan daya tarik pelanggan terhadap perusahaan.
                                        Rental mobil, sewa mobil, atau agen sewa mobil adalah perusahaan yang menyewakan mobil untuk jangka waktu yang singkat, umumnya mulai dari beberapa jam sampai beberapa minggu. Sering diatur dengan banyak cabang lokal (yang memungkinkan pengguna untuk mengembalikan kendaraan ke lokasi yang berbeda), dan terutama terletak di dekat bandara atau daerah kota yang sibuk. Agen penyewaan mobil terutama melayani orang-orang yang membutuhkan kendaraan sementara, misalnya, mereka yang tidak memiliki mobil sendiri, pelancong yang berada di luar kota, atau pemilik kendaraan yang rusak atau hancur yang sedang menunggu perbaikan atau kompensasi asuransi . Agen penyewaan mobil juga dapat melayani kebutuhan industri yang bergerak sendiri, dengan menyewa van atau truk, dan di pasar tertentu, jenis kendaraan lain seperti sepeda motor atau skuter juga dapat ditawarkan. Di samping penyewaan dasar kendaraan, agen penyewaan mobil biasanya juga menawarkan produk tambahan seperti asuransi, sistem navigasi global positioning system (GPS), sistem hiburan, ponsel, WiFi portabel dan kursi keselamatan anak. 
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>

@endsection
