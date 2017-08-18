@extends('Main')

@section('styles')
	<style type="text/css">
		.ui.fixed.selectable.celled.table tbody tr td{
			text-align: center;
		}
		.ui.fixed.selectable.celled.table thead tr th{
			text-align: center;
		}
		.ui.secondary.menu.devismenu .right.menu .item{
			padding-right: 2px;
			padding-left: 2px;
			margin-left: 1px;
			margin-right: 1px;
		}
    
	</style>
@endsection
@section('content')
<div class="ui breadcrumb">
  <a class="section" href="/">Dashboard</a>
  <i class="right chevron icon divider"></i>
  <a class="section">Gestion Comptabilité</a>
  <i class="right arrow icon divider"></i>
  <div class="active section">Personnel</div>
</div>


<table class="ui single line striped table">
  <thead>
    <tr><th colspan="4">
      Fiche Personnel : {{ $personnel->name }}
    </th>
  </tr></thead>
  <tbody>
    <tr>
      <td class="collapsing">
        <strong>Nom et Prénom : </strong>
      </td>
      <td>{{ $personnel->name }}</td>
      <td class="collapsing">
        <strong>N° CIN : </strong>
      </td>
      <td>{{ $personnel->cin }}</td>
    </tr>
    <tr>
      <td>
        <strong>N° Tél : </strong> 
      </td>
      <td>{{ $personnel->tel }}</td>
       <td>
        <strong>Email : </strong> 
      </td>
      <td>{{ $personnel->email }}</td>
    </tr>
    <tr >
      <td>
        <strong>Date de Naissance : </strong> 
      </td>
      <td colspan="4">{{ $personnel->date_naissance }}</td>
    </tr>
    <tr>
      <td>
        <strong>Adresse : </strong> 
      </td>
      <td colspan="4">{{ $personnel->adresse }}</td>
    </tr>
    <tr>
      <td>
         <strong>N° CNSS : </strong>
      </td>
      <td>{{ $personnel->cnss }}</td>
      <td>
         <strong>Fonction : </strong>
      </td>
      <td>{{ $personnel->fonction }}</td>
    </tr>
    <tr>
      <td>
        <strong>Banque : </strong>
      </td>
      <td>{{ $personnel->banque }}</td>
      <td>
        <strong>N° RIB : </strong>
      </td>
      <td>{{ $personnel->rib }}</td>
    </tr>
    <tr>
      <td>
        <strong>Adresse Banque : </strong>
      </td>
      <td colspan="4">{{ $personnel->adresse_banque }}</td>
    </tr>
    <tr>
      <td>
        <strong>Etat : </strong>
      </td>
      <td colspan="4">{{ $personnel->etat }}</td>
    </tr>
    
  </tbody>
</table>
<h4 class="ui header">Contrats de Travail : </h4>
<table class="ui selectable celled table">
  <thead>
    <tr>
      <th>Date Embauche</th>
      <th>Type Contrat</th>
      <th>Salaire initial</th>
      <th>Date résilience</th>
      <th>Etat</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <td>ddfd</td>
      <td>df</td>
      <td>{dfdf</td>
      <td>qsd</td>
      <td>qs</td>
      <td>
        <a class="edit-contrat" id-contrat=""><i class="write icon" ></i></a>
        <a href="/delete/personnel/contrat/{{id"><i class="trash outline icon"></i></a>
      </td>
    </tr> 
    
    
  </tbody>
</table>
<button class="ui primary right floated button" id="add-contrat">Ajouter</button>
<br>

<h4 class="ui header">Bulletin de Paie : </h4>
<table class="ui selectable celled table">
  <thead>
    <tr>
      <th>Période</th>
      <th>Date de paie</th>
      <th>Montant</th>
      <th>Cotisations</th>
      <th>Nb jours travaillé</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <td>ddfd</td>
      <td>df</td>
      <td>{dfdf</td>
      <td>qsd</td>
      <td>qs</td>
      <td>
        <a class="edit-paie" id-paie=""><i class="write icon" ></i></a>
        <a href="/delete/b-paie/{{id"><i class="trash outline icon"></i></a>
      </td>
    </tr> 
    
    
  </tbody>
</table>
<button class="ui primary right floated button" id="add-bpaie">Ajouter</button>
<br>


<h4 class="ui header">Attestation de Travail : </h4>
<table class="ui selectable celled table">
  <thead>
    <tr>
      <th>Période</th>
      <th>Fonction</th>
      <th>Date de Remise</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <td>ddfd</td>
      <td>df</td>
      <td>qs</td>
      <td>
        <a class="edit-at" id-at=""><i class="write icon" ></i></a>
        <a href="/delete/att-travail/{{id"><i class="trash outline icon"></i></a>
      </td>
    </tr> 
    
    
  </tbody>
</table>
<button class="ui primary right floated button" id="add-at">Ajouter</button>
<br>

<h4 class="ui header">Attestation de Congé : </h4>
<table class="ui selectable celled table">
  <thead>
    <tr>
      <th>Période</th>
      <th>Nb jours de congé</th>
      <th>Date de Remise</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <td>ddfd</td>
      <td>df</td>
      <td>qs</td>
      <td>
        <a class="edit-ac" id-ac=""><i class="write icon" ></i></a>
        <a href="/delete/att-conge"><i class="trash outline icon"></i></a>
      </td>
    </tr> 
    
    
  </tbody>
</table>
<button class="ui primary right floated button" id="add-ac">Ajouter</button>
<br>


<div class="ui modal" id="contrat">
  <i class="close icon"></i>
  <div class="content">
    <form class="ui form" method="POST" id="form-contrat">
    {{ csrf_field() }}
          <div class="two fields">
            <div class="field">
              <label>Type de Contrat : </label>
              <input type="text" name="type" id="type">
            </div>
             <div class="field">
                <label>Date d'embauche : </label>
                <input type="date" placeholder="01/01/1990" name="date-embauche" id="date-embauche">
              </div>
          </div>
          <div class="two fields">
            <div class="field">
              <label>Salaire initial : </label>
              <input type="text" name="salaire" id="salaire">
            </div>
          </div>
          <div class="two fields">
            <div class="field">
              <label>Etat : </label>
              <input type="text" name="cetat" id="cetat">
            </div>
             <div class="field">
                <label>Date de Résiliation : </label>
                <input type="date" placeholder="01/01/1990" name="date-resil" id="date-resil">
              </div>
          </div>
          <button class="ui positive right floated button" type="submit">Valider</button>
          <br>
          <br>
            <div class="ui error message"></div>
    </form>
  </div>

</div>


<div class="ui modal" id="b-paie">
  <i class="close icon"></i>
  <div class="content">
    <form class="ui form" method="POST" id="form-bpaie">
    {{ csrf_field() }}
          <div class="two fields">
            <div class="field">
              <label>Période : </label>
              <input type="text" name="b-periode" id="b-periode">
            </div>
             <div class="field">
                <label>Date de Paie : </label>
                <input type="date" placeholder="01/01/1990" name="date-paie" id="date-paie">
              </div>
          </div>
          <div class="two fields">
            <div class="field">
              <label>Montant : </label>
              <input type="text" name="montant" id="montant">
            </div>
          </div>
          <div class="two fields">
            <div class="field">
              <label>Cotisations : </label>
              <input type="text" name="cotisation" id="cotisation">
            </div>
             <div class="field">
                <label>Nb Jours Travaillé : </label>
                <input type="text"  name="jour-trav" id="jour-trav">
              </div>
          </div>
          <button class="ui positive right floated button" type="submit">Valider</button>
          <br>
          <br>
            <div class="ui error message"></div>
    </form>
  </div>

</div>

<div class="ui modal" id="att-travail">
  <i class="close icon"></i>
  <div class="content">
    <form class="ui form" method="POST" id="form-at">
    {{ csrf_field() }}
          <div class="two fields">
            <div class="field">
              <label>Période : </label>
              <input type="text" name="t-periode" id="t-periode">
            </div>
             <div class="field">
              <label>Fonction : </label>
              <input type="text" name="fonction" id="fonction">
            </div>
          </div>
          <div class="two fields">
            <div class="field">
                <label>Date de Remise : </label>
                <input type="date" placeholder="01/01/1990" name="date-remise" id="date-remise">
            </div>
            
          </div>
          <button class="ui positive right floated button" type="submit">Valider</button>
          <br>
          <br>
            <div class="ui error message"></div>
    </form>
  </div>

</div>

<div class="ui modal" id="att-conge">
  <i class="close icon"></i>
  <div class="content">
    <form class="ui form" method="POST" id="form-ac">
    {{ csrf_field() }}
          <div class="two fields">
            <div class="field">
              <label>Période : </label>
              <input type="text" name="c-periode" id="c-periode">
            </div>
             <div class="field">
              <label>Nb jours Congé : </label>
              <input type="text" name="dconge" id="dconge">
            </div>
          </div>
          <div class="two fields">
            <div class="field">
                <label>Date de Remise : </label>
                <input type="date" placeholder="01/01/1990" name="date-remise2" id="date-remise2">
            </div>
            
          </div>
          <button class="ui positive right floated button" type="submit">Valider</button>
          <br>
          <br>
            <div class="ui error message"></div>
    </form>
  </div>

</div>



@endsection

@section('scripts')
<script>
$(document).ready(function(){
      $("#add-contrat").click(function(){
              $('#contrat').modal('show');
              $("#form-contrat").attr('action', '/personnel/{{ $personnel->id }}/contrat');  
              $("#type").val("");
              $("#date-embauche").val("");
              $("#salaire").val("");
              $("#cetat").val("");
              $("#date-resil").val("");
                
        });
      $(".edit-contrat").click(function(){
              $('#contrat').modal('show');  
              $.get( "/personnel/contrat/"+$(this).attr("id-contrat"), function( data ) {
                $("#type").val("");
                $("#date-embauche").val("");
                $("#salaire").val("");
                $("#cetat").val("");
                $("#date-resil").val("");
              });
                $("#form-contrat").attr('action', '/update/personnel/contrat/'+$(this).attr("id-contrat"));
        });

      $("#add-bpaie").click(function(){
              $('#b-paie').modal('show');
              $("#form-bpaie").attr('action', '/personnel/{{ $personnel->id }}/paie');  
              $("#b-periode").val("");
              $("#date-paie").val("");
              $("#montant").val("");
              $("#jour-trav").val("");
              $("#cotisation").val("");
                
        });
      $(".edit-paie").click(function(){
              $('#b-paie').modal('show');  
              $.get( "/personnel/paie/"+$(this).attr("id-paie"), function( data ) {
                $("#b-periode").val("");
                $("#date-paie").val("");
                $("#montant").val("");
                $("#jour-trav").val("");
                $("#cotisation").val("");
              });
                $("#form-bpaie").attr('action', '/update/personnel/paie/'+$(this).attr("id-paie"));
        });

      $("#add-at").click(function(){
              $('#att-travail').modal('show');
              $("#form-at").attr('action', '/personnel/{{ $personnel->id }}/at');  
              $("#t-periode").val("");
              $("#date-remise").val("");
              $("#fonction").val("");
                
        });
      $(".edit-at").click(function(){
              $('#att-travail').modal('show');  
              $.get( "/personnel/at/"+$(this).attr("id-at"), function( data ) {
                $("#t-periode").val("");
                $("#date-remise").val("");
                $("#fonction").val("");
              });
                $("#form-at").attr('action', '/update/personnel/at/'+$(this).attr("id-at"));
        });

      $("#add-ac").click(function(){
              $('#att-conge').modal('show');
              $("#form-ac").attr('action', '/personnel/{{ $personnel->id }}/ac');  
              $("#c-periode").val("");
              $("#date-remise2").val("");
              $("#dconge").val("");
                
        });
      $(".edit-ac").click(function(){
              $('#att-conge').modal('show');  
              $.get( "/personnel/ac/"+$(this).attr("id-ac"), function( data ) {
                $("#t-periode").val("");
                $("#date-remise").val("");
                $("#fonction").val("");
              });
                $("#form-ac").attr('action', '/update/personnel/ac/'+$(this).attr("id-ac"));
        });









      $('.ui.dropdown').dropdown();
      $('.ui.form').form({
              fields: {
                type: {
                  identifier: 'type',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Type de Contrat est vide.'
                    }
                  ]
                },
                bperiode: {
                  identifier: 'b-periode',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Période est vide.'
                    }
                  ]
                },
                tperiode: {
                  identifier: 't-periode',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Période est vide.'
                    }
                  ]
                },
                cperiode: {
                  identifier: 'c-periode',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Période est vide.'
                    }
                  ]
                },
                fonction: {
                  identifier: 'fonction',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Fonction est vide.'
                    }
                  ]
                },
                dconge: {
                  identifier: 'dconge',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Nb Jours Congé est vide.'
                    }
                  ]
                },
                jour_trav: {
                  identifier: 'jour-trav',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Nb Jours Travaillé est vide.'
                    }
                  ]
                },
                cotisation: {
                  identifier: 'cotisation',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Cotisation est vide.'
                    }
                  ]
                },
                montant: {
                  identifier: 'montant',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Montant est vide.'
                    }
                  ]
                },
                cetat: {
                  identifier: 'cetat',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Etat est vide.'
                    }
                  ]
                },
                salaire: {
                  identifier: 'salaire',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Salaire initial est vide.'
                    }
                  ]
                },
                date_embauche: {
                  identifier: 'date-embauche',
                  rules: [{
                      type   : 'empty',
                      prompt : "Champs Date d'embauche est vide."
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date d'embauche n'est pas valide dd/mm/yyyy"
                    }
                    ]
                },
                date_resil: {
                  identifier: 'date-resil',
                  rules: [{
                      type   : 'empty',
                      prompt : "Champs Date de Résiliation est vide."
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date de Résiliation n'est pas valide dd/mm/yyyy"
                    }
                    ]
                },
                date_paie: {
                  identifier: 'date-paie',
                  rules: [{
                      type   : 'empty',
                      prompt : "Champs Date de Paie est vide."
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date de Paie n'est pas valide dd/mm/yyyy"
                    }
                    ]
                },
                date_remise: {
                  identifier: 'date-remise',
                  rules: [{
                      type   : 'empty',
                      prompt : "Champs Date de Remise est vide."
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date de Remise n'est pas valide dd/mm/yyyy"
                    }
                    ]
                },
                date_remise2: {
                  identifier: 'date-remise2',
                  rules: [{
                      type   : 'empty',
                      prompt : "Champs Date de Remise est vide."
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date de Remise n'est pas valide dd/mm/yyyy"
                    }
                    ]
                }




      }
  });



});

</script>
@endsection