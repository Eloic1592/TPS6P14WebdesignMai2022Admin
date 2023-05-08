    {{-- NAVBAR --}}
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">


            <li class="nav-item">
                <a class="nav-link " href="{{route('auteur.accueilauteur')}}">
                  <i class="bi bi-journal-text"></i><span>Liste des articles</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('article.ajouterarticle')}}">
                  <i class="bi bi-journal-text"></i><span>Ajouter un article</span>
                </a>
              </li>

            {{-- <li class="nav-item">
                 <a class="nav-link " data-bs-target="#echeances-nav" data-bs-toggle="collapse" href="#">
                   <i class="bi bi-journal-text"></i><span>Portefeuille</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="echeances-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                   <li>
                     <a href="">
                       <i class="bi bi-circle"></i><span>Demande de recharge</span>
                     </a>
                   </li>
                 </ul>
            </li> --}}

         </ul>
</aside>
