<x-template title="Form Artikel">
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <form method="post" class="was-validated" style="width: 26rem;">
            @csrf
            <h2 style="text-align: center;">Form Artikel</h2>
            <p></p>
            <x-form.group for="title" label="Judul">
                {{-- <label for="title">Judul</label> --}}
                <input type="text" name="title" class="form-control" id="title" required>
            </x-form.group>
            <x-form.group for="content" label="Isi">
                {{-- <label for="content">Isi</label> --}}
                <textarea name="content" id="content" class="form-control" required></textarea>
            </x-form.group>
            <div class="mb-3"><button type="submit" class="btn btn-primary">Simpan</button></div>
        </form>
    </div>
</x-template>
