@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
  <h4>Edit Book / Magazine</h4>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('books.update', $book) }}" method="POST">
    @csrf @method('PUT')
    <div class="row">
      <!-- same fields as create, but with $book->… values -->
      <div class="col-md-6 mb-3">
        <label class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ old('name', $book->name) }}"
               class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Edition / Volume</label>
        <input type="text" name="edition"
               value="{{ old('edition', $book->edition) }}"
               class="form-control">
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Price ($) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="price"
               value="{{ old('price', $book->price) }}"
               class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Frequency <span class="text-danger">*</span></label>
        <select name="publication_frequency" class="form-control" required>
          @foreach($frequencies as $key => $label)
            <option value="{{ $key }}"
              {{ old('publication_frequency', $book->publication_frequency) == $key ? 'selected' : '' }}>
              {{ $label }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-12 mb-3">
        <label class="form-label">Description / Notes</label>
        <textarea name="notes" rows="3" class="form-control">{{ old('notes', $book->notes) }}</textarea>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
