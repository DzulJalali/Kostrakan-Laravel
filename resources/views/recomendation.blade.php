
    <div class="row">
        @foreach($contentsByContentBasedFiltering as $contentsByContentBasedFiltering)
        <div class="card " style="width: 15rem;">
            <a href="/detail/{{ $contentsByContentBasedFiltering['building_id'] }}" style="text-decoration: none;">
                <div class="inner">
                    <img class="card-img" src="{{ asset('uploads/' . $contentsByContentBasedFiltering['gambar1']) }}">
                </div>
                <div class="card-body">
                    <span class="e53_74">{{ $contentsByContentBasedFiltering['harga'] }}</span><br>
                    <span class="e53_74">{{ $contentsByContentBasedFiltering['nama_tipe'] }}</span><br>
                    <span class="e53_76">{{ $contentsByContentBasedFiltering['alamat'] }}</span><br>
                    <span class="e53_77">{{ $contentsByContentBasedFiltering['published_date'] }}</span><br>
                </div>
            </a>
        </div>
        @endforeach
    </div>