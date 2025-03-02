<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>
    <h1>Add Item</h1>
    <!-- Tag form yang menampilkan link untuk menambahkan item baru -->
    <form action="{{ route('items.store') }}" method="POST">
        <!-- Direktif Blade yang menambahkan token CSRF pada form -->
        @csrf
        <!-- Label untuk input nama item -->
        <label for="name">Name:</label>
        <!-- Input text untuk nama item -->
        <input type="text" name="name" required>
        <br>

        <!-- Label untuk input deskripsi item -->
        <label for="description">Description:</label>
        <!-- Input textarea untuk deskripsi item -->
        <textarea name="description" required></textarea>
        <br>

        <!-- Tombol submit untuk menambahkan item -->
        <button type="submit">Add Item</button>
    </form>
    <!-- Tag anchor yang menampilkan link untuk kembali ke daftar item -->
    <a href="{{ route('items.index') }}">Back to List</a>
    </body>
</html>