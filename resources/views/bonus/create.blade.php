<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Add Data</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('bonus.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form id="form" action="{{ route('bonus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pembayaran Bonus (Rupiah):</strong>
                        <input type="number" id="total_bonus" name="total_bonus" class="form-control" required><br>
                        @error('total_bonus')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Karyawan 1:</strong>
                        <input type="text" id="employee1" name="employee1" class="form-control" required>
                        @error('employee1')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Persentase Bonus (%) Karyawan 1:</strong>
                        <input type="number" id="percentage1" name="percentage1" min="0" max="100"
                            step="0.01" class="form-control" placeholder="1 - 100" required><br>
                        @error('percentage1')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Karyawan 2:</strong>
                        <input type="text" id="employee2" name="employee2" class="form-control" required>
                        @error('employee2')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Persentase Bonus (%) Karyawan 2:</strong>
                        <input type="number" id="percentage2" name="percentage2" min="0" max="100"
                            step="0.01" class="form-control" placeholder="1 - 100" required><br>
                        @error('percentage2')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Karyawan 3:</strong>
                        <input type="text" id="employee3" name="employee3" class="form-control" required>
                        @error('employee3')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Persentase Bonus (%) Karyawan 3:</strong>
                        <input type="number" id="percentage3" name="percentage3" min="0" max="100"
                            step="0.01" class="form-control" placeholder="1 - 100" required>
                        @error('percentage3')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="button" class="btn btn-primary ml-3" onclick="validateForm()">Submit</button>
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        @if ($errors->any())
            var errorMessage = '';
            @foreach ($errors->all() as $error)
                errorMessage += "{{ $error }}\n";
            @endforeach
            alert(errorMessage);
        @endif
    });
</script>
<script>
    function validateForm() {
        var totalBonus = document.getElementById('total_bonus').value;
        var percentage1 = document.getElementById('percentage1').value;
        var percentage2 = document.getElementById('percentage2').value;
        var percentage3 = document.getElementById('percentage3').value;

        if (totalBonus === '' || percentage1 === '' || percentage2 === '' || percentage3 === '') {
            alert('Semua kolom harus diisi');
            return false;
        }

        if (parseFloat(percentage1) + parseFloat(percentage2) + parseFloat(percentage3) !== 100) {
            alert('Total persentase harus sama dengan 100%');
            return false;
        }

        // Jika semua validasi berhasil, submit form
        document.getElementById('form').submit();
    }
</script>

</html>
