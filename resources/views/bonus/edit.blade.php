<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Company Form - Laravel 10 CRUD Tutorial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Data</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('bonus.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('bonus.update', $bonus->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total Pembayaran Bonus (Rupiah):</strong>
                        <input type="number" value="{{ $bonus->total_bonus }}" name="total_bonus" class="form-control"
                            required><br>
                        @error('total_bonus')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Karyawan 1:</strong>
                        <input type="text" id="employee1" name="employee1" class="form-control"
                            value="{{ $bonus->employee1 }}" required>
                        @error('employee1')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Persentase Bonus (%) Karyawan 1:</strong>
                        <input type="number" placeholder="1 - 100" name="percentage1" min="0" max="100"
                            class="form-control" required><br>
                        @error('percentage1')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Karyawan 2:</strong>
                        <input type="text" value="{{ $bonus->employee2 }}" name="employee2" class="form-control"
                            required>
                        @error('employee2')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Persentase Bonus (%) Karyawan 2:</strong>
                        <input type="number" placeholder="1 - 100" name="percentage2" min="0" max="100"
                            class="form-control" required><br>
                        @error('percentage2')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Karyawan 3:</strong>
                        <input type="text" value="{{ $bonus->employee3 }}" name="employee3" class="form-control"
                            required>
                        @error('employee3')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Persentase Bonus (%) Karyawan 3:</strong>
                        <input type="number" placeholder="1 - 100" name="percentage3" min="0" max="100"
                            class="form-control" required>
                        @error('percentage3')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>
