// page principale
@extends('forme')

@section('title') Accueil @endsection

@section('content')
    <div class="pagetitle">
        <h1>Liste des articles</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Articles</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row align-items-top">
        @foreach($articles as $articles)
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $articles->titre }}</h5>
                        <div ><emp>{{ $articles->resume }}</emp></div>
                        <p><div class="col-md-12">
                            <div class="text-center">
                                <button class="btn btn-primary"><a href="{{ url('article/getarticle', ['id' => $articles->id]) }}" style="color: white;"><i class="bi bi-arrow-right-short"></i></a></button>
                                <button class="btn btn-primary"><a href="{{ url('article/redirecteditArticle', ['id' => $articles->id]) }}" style="color: white;"><i class="bi bi-pencil-fill"></i></a></button>

                            </div>
                        </div></p>
                    </div>
                </div>
            </div>
            @endforeach
            {!! $link !!}

                    <!-- Pagination with icons -->
                    <nav aria-label="Page navigation example">
                    </nav><!-- End Pagination with icons -->

        </div>
    </section>
@endsection

