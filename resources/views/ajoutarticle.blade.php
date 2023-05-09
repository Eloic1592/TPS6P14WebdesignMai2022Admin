@extends('forme.forme')
@section('title') Ajouter un article-Liste de vos articles @endsection

@section('content')
<div class="pagetitle">
      <h1>Ajouter un nouvel article</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Liste des articles</a></li>

        </ol>
      </nav>
    </div>


    {{-- Content --}}
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ajouter un nouveau contenu</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Article/ajoutcontenu') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="idauteur" class="form-control" id="floatingZip" value=  "{{ session('auteur')->id }}" />
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre" required/>
                                <label for="floatingSelect">titre</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="resume" class="form-control" id="resume" placeholder="Resume" required/>
                                <label for="floatingZip">resume</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="categorie" class="form-control" id="floatingZip" placeholder="categorie" required />
                                <label for="floatingZip">categorie</label>
                            </div>
                        </div>
                        <h5 class="card-title">Contenu de l'article</h5>
                        <!-- TinyMCE Editor -->
                        <textarea class="tinymce-editor" name="contenu" required>
                        </textarea><!-- End TinyMCE Editor -->

                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Ajouter une photo</label>
                            <input type="file" name="image" class="form-control" id="password" required>
                            <div class="invalid-feedback">Ajouter une photo</div>
                        </div>

                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                            </div>
                        </form><!-- End floating Labels Form -->
                    </div>
                </div>
            </div>
        </div>
        @if(session()->has('success'))
        @section('message')
        @section('type_message')alert alert-success alert-dismissible fade show @endsection
        {{ session('success') }}
        @endsection
        @endif
    </section>

@endsection

