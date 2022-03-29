@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
            @method('put')
            @csrf
            <div class="row">

                <div class="col-8">
                    <!-- TITOLO -->
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control" id="title"
                            name="title" @error('title') is-valid @enderror
                            value="{{ old('title', $post->title) }}">
                    </div>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-4">
                    <label for="category">Catogoria</label>
                    <select class="form-control" id="category" name="category_id"
                        @error('category_id') is-valid @enderror>
                        <option value=""> Nessuna categoria</option>
                        @foreach ($categories as $category)
                            <option
                                @if (old('category_id', $post->category_id) == $category->id) selected @endif
                                value="{{ $category->id }}">
                                {{ $category->label }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <!-- CONTENUTO POST -->
                    <div class="form-group">
                        <label for="description">Contenuto</label>
                        <textarea id="description" rows="6" class="form-control" name="content"
                            @error('content') is-valid @enderror
                            placeholder="Contenuto del post..">{{ old('content', $post->content) }}</textarea>
                    </div>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12">
                    <!-- IMMAGINE -->
                    <div class="form-group">
                        <label for="image">Immagine</label>
                        <input type="url" class="form-control" id="image"
                            name="image" value="{{ old('image', $post->image) }}">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{ route('admin.posts.index') }}"
                class="btn btn-secondary">Indietro</a>
        </form>
    </div>
@endsection
