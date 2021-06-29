        @extends('layouts.admin')

        @section('title')
         Product     
        @endsection

        @section('content')

        <!-- Page Content -->
        <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Produk</h2>
                <p class="dashboard-subtitle">
                  Daftar Produk 
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart">
                            <div class="card-body">
                                <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">
                                + Tambah Produk Baru
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Pemilik</th>
                                                <th>Kategori</th>
                                                <th>Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                            <body></body>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
                   
        @endsection

        @push('addon-script')
            <script>
                var datatable = $('#crudTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ordering: true,
                    ajax: {
                        url: '{!! url()->current() !!}',
                    },
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'nama', name: 'nama' },
                        { data: 'user.nama', name: 'user.nama' },
                        { data: 'category.nama', name: 'category.nama' },
                        { data: 'harga', name: 'harga' },
                        {
                            data: 'action', 
                            name: 'action',
                            orderable: false,
                            searcable: false,
                            width: '15%'
                        },
                    ] 
                })
            </script>
            
        @endpush