        @extends('layouts.admin')

        @section('title')
        Galery Product      
        @endsection

        @section('content')

        <!-- Page Content -->
        <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Produk Galery</h2>
                <p class="dashboard-subtitle">
                   Bikin Galery Produk Baru 
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>  
                                    @endforeach
                                </ul>
                            </div>

                        @endif 
                        <div class="cart">
                            <div class="card-body">
                                <form action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nama">Produk</label>
                                                <select name="products_id" class="form-control">
                                                    @foreach ($products as $product)    
                                                        <option value="{{ $product->id }}">{{ $product->nama }}</option>      
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Foto Produk</label>
                                                <input type="file" name="photo" class="form-control" required>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="row">
                                        <div class="col text-right">
                                            <button type="submit" class="btn btn-success px-5">
                                                Simpan Sekarang
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
                   
        @endsection
 