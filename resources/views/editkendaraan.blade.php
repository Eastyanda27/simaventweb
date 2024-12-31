@extends('/main')

@section("container")
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Edit Kendaraan {{ $vehicle->asset_name }}</h4>
        </div>
        <div class="card">
            <div class="col-12 mt-4">  
                <form action="/kendaraan/{{ $vehicle->id_asset }}/update" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Sub-Kategori</label>
                                <select name="sub_category" id="sub_category" class="form-control @error('sub_category') @enderror">
                                    @foreach ($category as $Category)
                                        <option value="{{ $Category->id }}">{{ $Category->sub_category }}</option>
                                    @endforeach
                                    @foreach ($sub_category as $Sub_category)
                                        <option value="{{ $Sub_category->id }}">{{ $Sub_category->sub_category }}</option>
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
                                <label>Nama Aset *</label>
                                <input name="asset_name" id="asset_name" type="text" class="form-control @error('asset_name') is-invalid @enderror" placeholder="Isi Nama Aset" value="{{ $vehicle->asset_name }}" required>
                                @error('asset_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Plat Nomor Kendaraan</label>
                                <input name="number_plate" id="number_plate" type="text" class="form-control @error('number_plate') is-invalid @enderror" placeholder="Isi Plat No Kendaraan" value="{{ $vehicle->number_plate }}">
                                @error('number_plate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Merk Kendaraan *</label>
                                <input name="brand" id="brand" type="text" class="form-control @error('brand') is-invalid @enderror" placeholder="(misal: Honda)" value="{{ $vehicle->brand }}" required>
                                @error('brand')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Model *</label>
                                <input name="type" id="type" type="text" class="form-control @error('type') is-invalid @enderror" placeholder="(misal: Brio/Scoppy)" value="{{ $vehicle->type }}" required>
                                @error('type')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Ukuran CC</label>
                                <input name="cc_size" id="cc_size" type="number" class="form-control @error('cc_size') is-invalid @enderror" placeholder="(misal: 500cc)" value="{{ $vehicle->cc_size }}">
                                @error('cc_size')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>No Rangka</label>
                                <input name="frame_number" id="frame_number" type="text" class="form-control @error('frame_number') is-invalid @enderror" placeholder="Isi No Rangka Kendaraan" value="{{ $vehicle->frame_number }}">
                                @error('frame_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>No Mesin</label>
                                <input name="machine_number" id="machine_number" type="text" class="form-control @error('machine_number') is-invalid @enderror" placeholder="Isi No Mesin" value="{{ $vehicle->machine_number }}">
                                @error('machine_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>No BPKB</label>
                                <input name="bpkb_number" id="bpkb_number" type="text" class="form-control @error('bpkb_number') is-invalid @enderror" placeholder="Isi No BPKB" value="{{ $vehicle->bpkb_number }}">
                                @error('bpkb_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Warna Kendaraan</label>
                                <input name="color" id="color" type="text" class="form-control @error('color') is-invalid @enderror" placeholder="Isi Warna Kendaraan" value="{{ $vehicle->color }}" required>
                                @error('color')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Tahun Pembuatan *</label>
                                <input name="production_year" id="production_year" type="text" class="form-control @error('production_year') is-invalid @enderror" placeholder="Isi Tahun Pembuatan" value="{{ $vehicle->production_year }}" required>
                                @error('production_year')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Keterangan Tambahan</label>
                                <input name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Isi Keterangan (jika ada)" value="{{ $vehicle->description }}">
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
                                    @foreach ($assetHolder as $AssetHolder)
                                        <option value="{{ $AssetHolder->id }}">{{ $AssetHolder->employee_name }}</option>
                                    @endforeach
                                    @foreach ($otherHolders as $OtherHolders)
                                        <option value="{{ $OtherHolders->id }}">{{ $OtherHolders->employee_name }}</option>
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
                                <input name="user_entry" id="user_entry" type="text" class="form-control @error('user_entry') is-invalid @enderror" placeholder="" value="{{ $user_entry }}" readonly hidden required>
                                @error('user_entry')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-bd">
                        <a href="/kendaraan" class="btn btn-danger">Tutup</a>
                        <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection