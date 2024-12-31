<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Laporan</th>
            <th>Pengirim</th>
            <th>Auditor</th>
            <th>Periode</th>
            <th>Kode & Nama Aset</th>
            <th>Kondisi</th>
            <th>Pesan Tambahan</th>
            <th>Pesan Balasan</th>
            <th>Status Laporan</th>
            <th style="width: 10%"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($inspeksi as $Inspeksi)
            <tr onclick="window.location.href='/aset/{{ $Inspeksi->dataAset->id_asset }}/view';" style="cursor: pointer;">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $Inspeksi->id_report }}</td>
                <td>{{ $Inspeksi->Sender->employee_name ?? 'N/A' }}</td>
                <td>{{ $Inspeksi->Auditors->employee_name ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::createFromDate($Inspeksi->year, $Inspeksi->month, 1)->translatedFormat('F') }} {{ $Inspeksi->year }}</td>
                <td>{{ $Inspeksi->dataAset->id_asset }} - {{ $Inspeksi->dataAset->asset_name ?? 'N/A' }}</td>
                <td>{{ $Inspeksi->conditions }}</td>
                <td>{{ $Inspeksi->message }}</td>
                <td>{{ $Inspeksi->reply_message }}</td>
                <td>{{ $Inspeksi->status }}</td>
                <td>
                    <div class="form-button-action">
                        @if(auth()->user()->isStaff())
                            <a href="/inspeksi/{{ $Inspeksi->id_report }}/print" class="btn btn-success my-1 mr-1">
                                <i class="bi bi-printer-fill"></i>
                            </a>
                            <a href="/inspeksi/{{ $Inspeksi->id_report }}/edit" class="btn btn-primary my-1 mx-1">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="/inspeksi/{{ $Inspeksi->id_report }}/destroy" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" data-toggle="tooltip" class="btn btn-danger my-1 ml-1" data-original-title="Hapus" onclick="return confirm('Yakin mau hapus data?')">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        @elseif(auth()->user()->isAdmin())
                            <form action="/inspeksi/{{ $Inspeksi->id_report }}/destroy" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" data-toggle="tooltip" class="btn btn-danger my-1 ml-1" data-original-title="Hapus" onclick="return confirm('Yakin mau hapus data?')">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </form>
                            <button id="triggerModal_{{ $Inspeksi->id_report }}" class="btn btn-primary my-1 ml-1" onclick="console.log('{{ $Inspeksi->id_report }}'); openModal('{{ $Inspeksi->id_report }}', event)" data-toggle="modal">
                                <i class="bi bi-check2-circle"></i>
                            </button>                          
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>