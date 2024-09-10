<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prakiraan Cuaca - Ivan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-3">Prakiraan Cuaca Jakarta Seminggu ke Depan</h1>
        <form method="GET" action="{{ url('/weather') }}">
            {{-- <label for="lat">Latitude:</label>
            <input type="text" id="lat" name="lat" value="{{ request()->get('lat', '-6.2088') }}" required disabled>
            <label for="lon">Longitude:</label>
            <input type="text" id="lon" name="lon" value="{{ request()->get('lon', '106.8456') }}" required disabled> --}}
            <label for="date" class="form-label">Tanggal:</label>
            <input type="date" class="form-control mb-1" id="date" name="date" value="{{ request()->get('date') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
    </div>
    <br>
    <div class="container">
        @if(isset($data['data']))
        <table class="table table-bordered">
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
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>