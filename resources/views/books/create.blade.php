@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
  <h4>Add New Book / Magazine</h4>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" name="name" value="{{ old('name') }}"
               class="form-control" required>
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Edition / Volume</label>
        <input type="text" name="edition" value="{{ old('edition') }}"
               class="form-control">
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Price ($) <span class="text-danger">*</span></label>
        <input type="number" step="0.01" name="price" value="{{ old('price') }}"
               class="form-control" required>
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Frequency <span class="text-danger">*</span></label>
        <select name="publication_frequency" class="form-control" required>
          <option value="">Select one…</option>
          @foreach($frequencies as $key => $label)
            <option value="{{ $key }}"
              {{ old('publication_frequency') == $key ? 'selected' : '' }}>
              {{ $label }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="col-md-12 mb-3">
        <label class="form-label">Description / Notes</label>
        <textarea name="notes" rows="3" class="form-control">{{ old('notes') }}</textarea>
      </div>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
</div>
@endsection
