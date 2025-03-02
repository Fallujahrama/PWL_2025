<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <!-- Tag form yang menampilkan link untuk mengedit item -->
    <form action="{{ route('items.update', $item) }}" method="POST">
        <!-- Direktif Blade yang menambahkan token CSRF pada form -->
        @csrf
        <!-- Direktif Blade yang menentukan metode PUT untuk mengedit item -->
        @method('PUT')

        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $item->name }}" required>
        <br>

        <label for="description">Description:</label>
        <textarea name="description" required>{{ $item->description }}</textarea>
        <br>

        <button type="submit">Update Item</button>
    </form>

    <!-- Tag anchor yang menampilkan link untuk kembali ke daftar item -->
    <a href="{{ route('items.index') }}">Back to List</a>
</body>
</html>