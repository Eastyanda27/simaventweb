@extends('/main')

@section("container")
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Perabotan & Alat: {{ $furniture->asset_name }}</h4>
        </div>
        <div class="card">
            <div class="col-12 mt-4">  
                <form action="/perabotan/{{ $furniture->id_asset }}/update" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="asset_category">Kategori</label>
                                <select name="asset_category" id="asset_category" class="form-control @error('asset_category') @enderror" required>
                                    @foreach ($category as $Category)
                                        <option value="{{ $Category->asset_category }}">{{ $Category->asset_category }}</option>
                                    @endforeach
                                    <option value="Elektronik">Elektronik</option>
                                    <option value="Mesin">Mesin</option>
                                </select>
                                @error('asset_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="sub_category">Sub-Kategori</label>
                                <select name="sub_category" id="sub_category" class="form-control @error('sub_category') @enderror" required>
                                    @foreach ($category as $Category)
                                        <option value="{{ $Category->id }}">{{ $Category->sub_category }}</option>
                                    @endforeach
                                </select>
                                @error('sub_category')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="asset_name">Nama Aset *</label>
                                <input name="asset_name" id="asset_name" type="text" class="form-control @error('asset_name') is-invalid @enderror" placeholder="Isi Nama Aset" value="{{ $furniture->asset_name }}" required>
                                @error('asset_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="brand">Merk</label>
                                <input name="brand" id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" placeholder="Isi Merk Barang" value="{{ $furniture->brand }}">
                                @error('brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="type">Model</label>
                                <input name="type" id="type" type="text" class="form-control @error('type') is-invalid @enderror" placeholder="Isi Model Barang" value="{{ $furniture->type }}">
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="specification">Spesifikasi</label>
                                <input name="specification" id="specification" type="text" class="form-control @error('specification') is-invalid @enderror" placeholder="Isi Spesifikasi Barang" value="{{ $furniture->specification }}">
                                @error('specification')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="warranty_period">Masa Garansi</label>
                                <input name="warranty_period" id="warranty_period" type="number" class="form-control @error('warranty_period') is-invalid @enderror" placeholder="Isi Masa Garansi Barang" value="{{ $furniture->warranty_period }}">
                                @error('warranty_period')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="price">Harga</label>
                                <input name="price" id="price" type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Isi Harga Barang" value="{{ $furniture->price }}" required>
                                @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label for="quantity">Jumlah Barang</label>
                                <input name="quantity" id="quantity" type="number" class="form-control @error('quantity') is-invalid @enderror" placeholder="Isi Jumlah Barang" value="{{ $furniture->quantity }}" required>
                                @error('quantity')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="condition">Kondisi *</label>
                                <select name="condition" id="condition" class="form-control @error('condition') is-invalid @enderror" required>
                                    <option value="{{ $furniture->condition }}">{{ $furniture->condition }}</option>
                                    <option value="Sangat Baik">Sangat Baik</option>
                                    <option value="Baik">Baik</option>
                                    <option value="Rusak Ringan">Rusak Ringan</option>
                                    <option value="Rusak Berat">Rusak Berat</option>
                                </select>
                                @error('condition')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Keterangan</label>
                                <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Keterangan (jika ada)" value="{{ $furniture->description }}">
                                @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Penanggung Jawab Aset *</label>
                                <select name="asset_holder" id="asset_holder" class="form-control @error('asset_holder') @enderror" required>
                                    @foreach ($holder as $Holder)
                                        <option value="{{ $Holder->id }}">{{ $Holder->employee_name }}</option>
                                    @endforeach
                                    @foreach ($asset_holder as $Asset_holder)
                                        <option value="{{ $Asset_holder->id }}">{{ $Asset_holder->employee_name }}</option>
                                    @endforeach
                                </select>
                                @error('asset_holder')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input name="user_entry" id="user_entry" type="text" class="form-control @error('user_entry') is-invalid @enderror" placeholder="" value="{{ $user_entry }}" readonly hidden>
                                @error('user_entry')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <a href="/elektronik" class="btn btn-danger">Tutup</a>
                        <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection