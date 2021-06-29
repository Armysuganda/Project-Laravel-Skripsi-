        @extends('layouts.admin')

        @section('title')
         Produk Galery    
        @endsection

        @section('content')

        <!-- Page Content -->
        <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Galery</h2>
                <p class="dashboard-subtitle">
                  Daftar Galery Produk 
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart">
                            <div class="card-body">
                                <a href="{{ route('product-gallery.create') }}" class="btn btn-primary mb-3">
                                + Tambah Gallery Baru
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>   
                                            <tr>
                                                <th>ID</th>
                                                <th>Produk</th>
                                                <th>Photo</th>
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
                    proccesing: true,
                    serverSide: true,
                    ordering: true,
                    ajax: {
                        url: '{!! route('product-gallery.index') !!}',
                    },
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'product.nama', name: 'product.nama' },
                        { data: 'photo', name: 'photo' },

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