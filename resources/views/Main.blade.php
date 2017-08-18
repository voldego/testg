
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/semantic.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/mystyles/styles.css') }}">
@yield('styles')

</head>

<body>
<div class="ui top fixed secondary pointing menu">
  <a class="item">
  	<h3 class="ui header logo">Gestion Fiduciaire</h3>
    
  </a>
  
  <div class="right menu">
  	<a class="ui item">
  		<i class="alarm outline icon"></i> 23
  	</a>
  	<a class="ui item" href="/users/liste">
  		<i class="user outline icon"></i>Utilisateurs
  	</a>
    <a class="ui item">
      Se déconnecter
    </a>
  </div>
</div>

<div class="ui grid bodygrid">
  <div class="three wide column sidebargrid">
	  	<div class="ui vertical menu thesidebar">
	  <div class="item">
	    <div class="header"><i class="home icon"></i><a href="/">Dashboard</a></div>
	  </div>
	  <div class="item">
	    <div class="header"><i class="folder open outline icon"></i>Dossier Juridique</div>
	    <div class="menu">
	      <a class="item" href="/dj/liste">Liste dossier juridique</a>
	      <a class="item" href="/personals/liste">Responsables</a>
	    </div>
	  </div>
	  <div class="item">
	    <div class="header"><i class="dollar icon"></i>Gestion Commerciale</div>
	    <div class="menu">
	      <a class="item" href="/devis/liste">Devis</a>	
	      <a class="item" href="/facture/liste">Factures</a>
	      
	    </div>
	  </div>
	  <div class="item">
	    <div class="header"><i class="calculator icon"></i>Gestion Comptabilité</div>
	    <div class="menu">
	      <a class="item" href="/personnel/liste">Personnel</a>
	      <a class="item">Grand Livre</a>
	      <a class="item">Balance</a>
	    </div>
	  </div>
	  <div class="item">
	    <div class="header"><i class="address card outline icon"></i>Fiscalité</div>
	    <div class="menu">
	      <a class="item" href="/cnss/liste">CNSS</a>
	      <a class="item" href="/tva/liste">TVA</a>
	      <a class="item">Taux</a>
	      <a class="item" href="/ir/liste">IR</a>
	      <a class="item" href="/is/liste">IS</a>
	      <a class="item">Acomptes</a>
	      <a class="item">PV</a>
	      <a class="item">Cotisation</a>
	    </div>
	  </div>
	   <div class="item">
	    <div class="header"><i class="building outline icon"></i>Gestion de domicilisation</div>
	    <div class="menu">
	      <a class="item">Dossier de domicilisation</a>
	      <a class="item">Contrat de prestation</a>
	      <a class="item">Contrat de location</a>
	      <a class="item">Mail</a>
	    </div>
	  </div>
	</div>
	  </div>
  <div class="thirteen wide column centergrid">
  	@yield('content')

  </div>
</div>
<script
  src="{{ asset('assets/jquery.min.js') }}"></script>
<script src="{{ asset('assets/semantic.min.js') }}"></script>
@yield('scripts')
<script>	
$(document).ready(function(){
	 $("#lol").click(function(){
	        $('.ui.sidebar').sidebar('toggle');
	  });
});



</script>
</body>

</html>