<!DOCTYPE html>
<html>
<head>
    <title>Prakiraan Cuaca</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Prakiraan Cuaca Jakarta Seminggu ke Depan</h1>

    <form method="GET" action="{{ url('/weather') }}">
        {{-- <label for="lat">Latitude:</label>
        <input type="text" id="lat" name="lat" value="{{ request()->get('lat', '-6.2088') }}" required disabled>
        <label for="lon">Longitude:</label>
        <input type="text" id="lon" name="lon" value="{{ request()->get('lon', '106.8456') }}" required disabled> --}}
        <label for="date">Tanggal (YYYY-MM-DD):</label>
        <input type="date" id="date" name="date" value="{{ request()->get('date') }}">
        <button type="submit">Cari</button>
    </form>

    @if(isset($data['data']))
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Cuaca</th>
                    <th>Suhu Maks</th>
                    <th>Suhu Min</th>
                </tr>
            </thead>
            <tbody>
                @if($data['data'])
                    @foreach($data['data'] as $day)
                        @if(!isset($selectedDate) || \Carbon\Carbon::parse($day['datetime'])->format('Y-m-d') == $selectedDate)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($day['datetime'])->format('Y-m-d') }}</td>
                                <td>{{ $day['weather']['description'] }}</td>
                                <td>{{ $day['max_temp'] }}°C</td>
                                <td>{{ $day['min_temp'] }}°C</td>
                            </tr>
                        @endif
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">Data cuaca tidak tersedia untuk tanggal ini.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    @else
        <p>Data cuaca tidak tersedia.</p>
    @endif
</body>
</html>
