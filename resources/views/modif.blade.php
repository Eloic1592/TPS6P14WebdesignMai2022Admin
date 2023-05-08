@extends('forme.forme')
@section('title') Modifier cet article @endsection

@section('content')
<div class="pagetitle">
      <h1>Changer le contenu de cet article</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Changer le contenu de cet article</a></li>

        </ol>
      </nav>
    </div>


    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Modifier l'article</h5>
                        <!-- Floating Labels Form -->
                        <form class="row g-3" action="{{ url('Article/modifierarticle') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="idarticle" class="form-control" id="floatingZip" value=  "{{ $Article->id }}" />
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre" value="{{ $Article->titre }}" required/>
                                <label for="floatingSelect">titre</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="resume" class="form-control" id="resume" placeholder="Resume" value="{{ $Article->resume }}" required/>
                                <label for="floatingZip">resume</label>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" name="categorie" class="form-control" id="floatingZip" placeholder="categorie" value="{{ $Article->categorie }}" required />
                                <label for="floatingZip">categorie</label>
                            </div>
                        </div>
                        <h5 class="card-title">Contenu de l'article</h5>
                        <!-- TinyMCE Editor -->
                        <textarea class="tinymce-editor" name="contenu"  required>
                            {{ $Article->contenu }}
                        </textarea><!-- End TinyMCE Editor -->
                        <div class="col-12">
                            <label for="yourPassword" class="form-label">Ajouter une photo</label>
                            <input type="file" name="image" class="form-control" id="image" onclick="document.getElementById('image').click()" >
                            <div class="invalid-feedback">Ajouter une photo</div>
                        </div>
                        <input type="hidden" id="myfilename" name="myfilename" value="{{ $Article->image }}">

                            <div class="col-md-12">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>

                            </div>
                        </form><!-- End floating Labels Form -->
                        @if(session()->has('success'))
                        @section('message')
                        @section('type_message')alert alert-success alert-dismissible fade show @endsection
                        {{ session('success') }}
                        @endsection
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Pré-remplir le nom de fichier
        var filename = document.getElementById('myfilename').value;
        document.getElementById('image').setAttribute('value', filename);
        document.getElementById('image').addEventListener('change', function() {
            var newfilename = this.value.split('\\').pop();
            document.getElementById('myfilename').setAttribute('value', newfilename);
        });
    </script>

@endsection

