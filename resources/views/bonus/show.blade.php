<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <h3>Pembayaran : Rp. {{ $bonus->total_bonus }}</h3>
                                <tr>
                                    <th class="text-center">Nama Karyawan</th>
                                    <th class="text-center">Presentasi Bonus</th>
                                    <th class="text-center">Total Bonus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ $bonus->employee1 }}</td>
                                    <td class="text-center">{{ number_format($bonus->percentage1 * 100) }}%</td>
                                    <td class="text-center">Rp. {{ $bonus->bonus1 }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ $bonus->employee2 }}</td>
                                    <td class="text-center">{{ number_format($bonus->percentage2 * 100) }}%</td>
                                    <td class="text-center">Rp. {{ $bonus->bonus2 }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center">{{ $bonus->employee3 }}</td>
                                    <td class="text-center">{{ number_format($bonus->percentage3 * 100) }}%</td>
                                    <td class="text-center">Rp. {{ $bonus->bonus3 }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('bonus.index') }}" enctype="multipart/form-data">
                                Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
