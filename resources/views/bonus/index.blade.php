<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-header">
                            <h3>List Bonus</h3>
                        </div>
                        <p>
                            <a class="btn btn-primary" href="{{ route('bonus.create') }}">Add New</a>
                        </p>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Buruh A</th>
                                <th class="text-center">Bonus</th>
                                <th class="text-center">Buruh B</th>
                                <th class="text-center">Bonus</th>
                                <th class="text-center">Buruh C</th>
                                <th class="text-center">Bonus</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bonuses as $bonus)
                                <tr>
                                    <td class="text-center">{{ $bonus->employee1 }}</td>
                                    <td class="text-center">{{ number_format($bonus->percentage1 * 100) }}%</td>
                                    <td class="text-center">{{ $bonus->employee2 }}</td>
                                    <td class="text-center">{{ number_format($bonus->percentage2 * 100) }}%</td>
                                    <td class="text-center">{{ $bonus->employee3 }}</td>
                                    <td class="text-center">{{ number_format($bonus->percentage3 * 100) }}%</td>
                                    <td class="text-center">
                                        <a href="{{ route('bonus.show', $bonus->id) }}"
                                            class="btn btn-secondary btn-sm">detail</a>
                                        <a href="{{ route('bonus.edit', ['id' => $bonus->id]) }}"
                                            class="btn btn-secondary btn-sm">edit</a>
                                        <a href="#" class="btn btn-sm btn-danger"
                                            onclick="
                            event.preventDefault();
                            if (confirm('Do you want to remove this?')) {
                              document.getElementById('delete-row-{{ $bonus->id }}').submit();
                            }">
                                            delete
                                        </a>
                                        <form id="delete-row-{{ $bonus->id }}"
                                            action="{{ route('bonus.destroy', ['id' => $bonus->id]) }}" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            @csrf
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $bonuses->links() !!}
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this item?')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>

</html>
