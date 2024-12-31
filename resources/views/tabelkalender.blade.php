<table id="add-row" class="display table table-striped table-hover">
    <thead>
        <tr>
            <th>Hari</th>
            <th>Tanggal</th>
            <th>Agenda</th>
            <th>Jurnal</th>
            <th>Transaksi</th>
            <th>Riwayat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datesInMonth as $date)
        <tr>
            <td>{{ \Carbon\Carbon::parse($date)->translatedFormat('l') }}</td> <!-- Hari (Senin, Selasa, dll) -->
            <td>{{ \Carbon\Carbon::parse($date)->translatedFormat('j') }}</td>  <!-- Tanggal (1, 2, 3, dll) -->
            <td>
                @foreach ($schedules as $schedule)
                    @if ($schedule->type == 'Mingguan' && \Carbon\Carbon::parse($date)->format('l') == $schedule->day && $date->gte(now()))
                        <!-- Tampilkan untuk jadwal mingguan -->
                        <br>
                        <div style="background-color: blue">
                            <div class="mt-3 ml-2 mr-2 text-white">{{ $schedule->id_asset }} - {{ $schedule->asset_name }}</div>
                            <div class="ml-2 mb-3 mr-2 text-white">{{ $schedule->activity }} - {{ $schedule->description }}</div>
                        </div>
                    @elseif ($schedule->type == 'Bulanan' && \Carbon\Carbon::parse($date)->format('j') == $schedule->date && $date->gte(now()))
                        <!-- Tampilkan untuk jadwal bulanan -->
                        <br>
                        <div style="background-color: blue">
                            <div class="mt-3 ml-2 mr-2 text-white">{{ $schedule->id_asset }} - {{ $schedule->asset_name }}</div>
                            <div class="ml-2 mb-3 mr-2 text-white">{{ $schedule->activity }} - {{ $schedule->description }}</div>
                        </div>
                    @elseif ($schedule->type == 'Kustom' && \Carbon\Carbon::parse($date)->format('Y-m-d') == $schedule->custom_date->format('Y-m-d'))
                        <!-- Tampilkan untuk jadwal kustom -->
                        <br>
                        <div style="background-color: blue">
                            <div class="mt-3 ml-2 mr-2 text-white">{{ $schedule->id_asset }} - {{ $schedule->asset_name }}</div>
                            <div class="ml-2 mb-3 mr-2 text-white">{{ $schedule->activity }} - {{ $schedule->description }}</div>
                        </div>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($journals as $journal)
                    @if (\Carbon\Carbon::parse($date)->format('Y-m-d') == $journal->date->format('Y-m-d'))
                        <!-- Tampilkan untuk jadwal jurnal -->
                        <br>
                        <div style="background-color: blue">
                            <div class="mt-3 ml-2 mr-2 text-white">{{ $journal->id_asset }} - {{ $journal->asset_name }}</div>
                            <div class="ml-2 mb-3 mr-2 text-white">{{ $journal->incident }} - {{ $journal->description }}</div>
                        </div>
                    @endif
                @endforeach
            </td>
            <td>
                @foreach ($finances as $finance)
                    @if (\Carbon\Carbon::parse($date)->format('Y-m-d') == $finance->date->format('Y-m-d'))
                        <!-- Tampilkan untuk jadwal jurnal -->
                        <br>
                        <div style="background-color: blue">
                            <div class="mt-3 ml-2 mr-2 text-white">{{ $finance->id_asset }} - {{ $finance->asset_name }}</div>
                            <div class="ml-2 mb-3 mr-2 text-white">{{ $finance->category }} - {{ $finance->description }}</div>
                        </div>
                    @endif                
                @endforeach
            </td>
            <td></td>
        </tr>
        @endforeach
    </tbody>
</table>