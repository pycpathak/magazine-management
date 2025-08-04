
@extends('layouts.user_type.auth')
@section('content')
<div class="container-fluid py-4">
  <div class="d-flex justify-content-between mb-3">
    <h4>Books / Magazines</h4>
    <a href="{{ route('books.create') }}" class="btn btn-sm btn-primary">+ New Book</a>
  </div>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <div class="card">
    <div class="card-body table-responsive">
      <table class="table table-hover align-items-center">
        <thead>
          <tr>
            <th>Book Name</th>
            <th>Author Name</th>
            <th>Edition</th>
            <th>Price</th>
            <th>Frequency</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @forelse($books as $book)
          <tr>
            <td>{{ $book->book_name }}</td>
            <td>{{ $book->author_name }}</td>
            <td>{{ $book->book_edition }}</td>
            <td>${{ number_format($book->price, 2) }}</td>
            <td>{{ $book->publication_frequency }}</td>
            <td>
              <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-info">Edit</a>
              <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete this book?')">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" class="text-center">No records found.</td></tr>
        @endforelse
        </tbody>
      </table>

      {{-- {{ $books->links() }} --}}
    </div>
  </div>
</div>
@endsection
