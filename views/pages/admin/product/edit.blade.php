        @extends('layouts.admin')

        @section('title')
            Produk     
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
                   Edit Produk
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
                                <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Produk</label>
                                                <input type="text" name="nama" class="form-control" value="{{ $item->nama }}" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Pemilik Produk</label>
                                                <select name="users_id" class="form-control">
                                                    <option value="{{ $item->users_id }}" selected>{{ $item->user->nama }}</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->nama }}</option>                                                       
                                                    @endforeach
                                                </select>                                        
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kategori Produk</label>
                                                <option value="{{ $item->categories_id }}" selected>{{ $item->category->nama }}</option> 
                                                <select name="categories_id" class="form-control">      
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->nama }}</option>                                                       
                                                    @endforeach
                                                </select>                                        
                                            </div>
                                        </div>
                                         
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Harga Product</label>
                                                <input type="number" name="harga" class="form-control" value="{{ $item->harga }}" required> 
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Deksripsi Product</label>
                                                <textarea name="deskripsi" id="editor">{!! $item->deskripsi !!}</textarea>
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

        @push('addon-script')
            <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
            <script>
                    CKEDITOR.replace( 'editor' );
            </script>
        @endpush