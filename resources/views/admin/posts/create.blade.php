@extends('layouts.app')

@section('content')
    <div class="container">
        <header>
            <h1>Crea un nuovo Post</h1>
        </header>

        <form action="{{ route('admin.posts.store') }}" method="post">
            @csrf
            <div class="row mb-3">
                <div class="col-12">
                    <!-- TITOLO -->
                    <div class="form-group">
                        <label for="title">Titolo</label>
                        <input type="text" class="form-control" id="title"
                            name="title">
                    </div>
                </div>
                <div class="col-12">
                    <!-- CONTENUTO POST -->
                    <div class="form-group">
                        <label for="content">Contenuto</label>
                        <textarea id="content" rows="6" class="form-control" name="content"
                            placeholder="Contenuto del post.."></textarea>
                    </div>
                </div>
                <div class="col-2">
                    <img src="https://icons.iconarchive.com/icons/ccard3dev/dynamic-yosemite/1024/Preview-icon.png"
                        alt="placeholder" class="img-fluid" id="preview">
                </div>
                <div class="col-10 d-flex flex-column justify-content-center">
                    <!-- IMMAGINE -->
                    <div class="form-group">
                        <label for="image">Immagine</label>
                        <input type="url" class="form-control" id="image"
                            name="image">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
            <a href="{{ route('admin.posts.index') }}"
                class="btn btn-secondary">Indietro</a>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        const placeholder =
            "https://icons.iconarchive.com/icons/ccard3dev/dynamic-yosemite/1024/Preview-icon.png";
        const imgInput = document.getElementById('image');
        const imgPreview = document.getElementById('preview');

        imgInput.addEventListener('change', e => {
            const url = imgInput.value;
            if (url) imgPreview.setAttribute('src', url);
            else imgPreview.setAttribute('src', placeholder);
        })
    </script>
@endsection
