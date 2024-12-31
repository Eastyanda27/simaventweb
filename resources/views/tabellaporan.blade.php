<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Laporan</th>
            <th>Pengirim</th>
            <th>Auditor</th>
            <th>Periode</th>
            <th>Jumlah Aset</th>
            <th>Total Nilai Aset</th>
            <th>Jumlah Aset Kondisi Baik</th>
            <th>Jumlah Aset Kondisi Buruk</th>
            <th>Total Aset Kendaraan</th>
            <th>Total Aset Tanah & Bangunan</th>
            <th>Total Aset Elektronik</th>
            <th>Total Aset Perabotan</th>
            <th>Catatan</th>
            <th>Pesan Balasan</th>
            <th>Status Laporan</th>
            <th style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($report as $Report)
            <tr onclick="window.location.href='/aset/{{ $Report->id_report }}/view';" style="cursor: pointer;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $Report->id_report }}</td>
                <td>{{ $Report->Sender->employee_name ?? '-' }}</td>
                <td>{{ $Report->Auditors->employee_name ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::createFromDate($Report->report_year, $Report->report_month, 1)->translatedFormat('F') }} {{ $Report->report_year }}</td>
                <td>{{ $Report->total_asset }}</td>
                <td>{{ $Report->total_value }}</td>
                <td>{{ $Report->assets_in_good_condition }}</td>
                <td>{{ $Report->assets_in_bad_condition }}</td>
                <td>{{ $Report->total_vehicle }}</td>
                <td>{{ $Report->total_building }}</td>
                <td>{{ $Report->total_electronic }}</td>
                <td>{{ $Report->total_furniture }}</td>
                <td>{{ $Report->notes }}</td>
                <td>{{ $Report->reply_notes }}</td>
                <td>{{ $Report->status }}</td>
                <td>
                    <div class="form-button-action">
                        @if(auth()->user()->isAdmin())
                            <a href="/inspeksi/{{ $Report->id_report }}/edit" class="btn btn-primary my-1 mx-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="/inspeksi/{{ $Report->id_report }}/destroy" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" data-toggle="tooltip" class="btn btn-danger my-1 ml-1" data-original-title="Hapus" onclick="return confirm('Yakin mau hapus data?')">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        @elseif(auth()->user()->isKabid())
                            <form action="/inspeksi/{{ $Report->id_report }}/destroy" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" data-toggle="tooltip" class="btn btn-danger my-1 ml-1" data-original-title="Hapus" onclick="return confirm('Yakin mau hapus data?')">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </form>
                            <button id="triggerModal_{{ $Report->id_report }}" class="btn btn-primary my-1 ml-1" onclick="console.log('{{ $Report->id_report }}'); openModal('{{ $Report->id_report }}', event)" data-toggle="modal">
                                <i class="bi bi-check2-circle"></i>
                            </button>                     
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>