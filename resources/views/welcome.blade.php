<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Image on PDF</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="antialiased bg-light">
    <div class="container">
        <div class="card border-0 bg-light">
            <div class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center fw-bold">Add Image on PDF</h4>
                <p class="text-danger">*pdf and image must be required.</p>

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('modify.pdf') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="pdf" class="fw-bold">Pdf</label>
                        <input class="form-control" type="file" name="pdf" accept=".pdf" required>
                        @error('pdf')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="x_axis" class="fw-bold">X Axis (Dimension only mm)</label>
                        <input name="x_axis" class="form-control" placeholder="X Axis" type="number"
                            value="{{ old('x_axis') }}">
                    </div>
                    <div class="mb-3">
                        <label for="y_axis" class="fw-bold">Y Axis (Dimension only mm)</label>
                        <input name="y_axis" class="form-control" placeholder="Y Axis" type="number"
                            value="{{ old('y_axis') }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="fw-bold">Image</label>
                        <input class="form-control" type="file" name="image" accept="image/*" required>
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="height" class="fw-bold">Height</label>
                        <input name="height" class="form-control" placeholder="Height" type="number"
                            value="{{ old('height') }}">
                    </div>
                    <div class="mb-3">
                        <label for="width" class="fw-bold">Width</label>
                        <input name="width" class="form-control" placeholder="Width" type="number"
                            value="{{ old('width') }}">
                    </div>
                    <div class="mb-3 text-center">
                        <button type="submit" title="Generate" class="btn btn-primary btn-block"> Generate </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
