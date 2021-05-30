<footer class="page-footer green">
    <div class="container">
      <div class="row">
        <div class="col s4">
          <h5 class="white-text">Informations</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Mentions légales</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Presse</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Fabrication</a></li>
          </ul>
        </div>
        <div class="col s4">
          <h5 class="white-text">Service Client</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!">Contactez-nous</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Livraison & Retour</a></li>
            <li><a class="grey-text text-lighten-3" href="#!">Conditions de vente</a></li>
          </ul>
        </div>
        <div class="col s4">
          <h5 class="white-text">Réseaux Sociaux</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="#!"><i class="fab fa-facebook-square"></i>Facebook</a></li>
            <li><a class="grey-text text-lighten-3" href="#!"><i class="fab fa-instagram"></i>Instagram</a></li>
            <li><a class="grey-text text-lighten-3" href="#!"><i class="far fa-newspaper"></i>Inscrivez vous à la newsletter</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      © 2021 Copyright 
      @if(!Auth::check())<a class="grey-text text-lighten-4 right" href="{{ route('login') }}">Connexion</a>@endif
      </div>
    </div>
  </footer>