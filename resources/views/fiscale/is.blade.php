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
  <a class="section">Fiscalité</a>
  <i class="right arrow icon divider"></i>
  <div class="active section">IS</div>
</div>

<div class="ui secondary menu devismenu">
  <div class="right menu">
	  <div class="item">
	  	<div class="ui olive button" id="add">
	  		<i class="plus icon"></i>
		  	Déclarer un Impôt
	  	</div>
	  </div>
    <div class="item">
      <div class="ui icon input">
        <input type="text" placeholder="Search...">
        <i class="search link icon"></i>
      </div>
    </div>

  </div>
</div>


<table class="ui fixed selectable celled table">
  <thead>
    <tr>
    <th>Exercice</th>
    <th>CA HT</th>
    <th>Résultat Comptable</th>
    <th>Résultat Fiscale</th>
    <th>Impôt à payer</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
    @foreach($is as $i)
    <tr>
      <td>{{ $i->exercice }}</td>
      <td>{{ $i->ca_ht }} DH</td>
      <td>{{ $i->r_comptable }} DH</td>
      <td>{{ $i->r_fiscale }} DH</td>
      <td>{{ $i->impot }} DH</td>
      <td>
      <a href="#" class="edit" is-id="{{ $i->id }}"><i class="write icon"></i></a>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <a href="/delete/is/{{ $i->id }}"><i class="trash outline icon"></i></a>
		
      </td>
    </tr>
    @endforeach
    
  </tbody>
  <tfoot>
    <tr>
    <th colspan="6">
      <div class="ui right floated pagination menu">
        <a class="icon item">
          <i class="left chevron icon"></i>
        </a>
        <a class="item">1</a>
        <a class="item">2</a>
        <a class="item">3</a>
        <a class="item">4</a>
        <a class="icon item">
          <i class="right chevron icon"></i>
        </a>
      </div>
    </th>
  </tr>
  </tfoot>
</table>

<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">Ajouter une Déclaration impôt :</div>
  <div class="content">
    <form class="ui form" method="POST" id="formudpate">
      {{ csrf_field() }}
            <div class="two fields">
              <div class="field">
                <label>Exercice : </label>
                <input type="text" placeholder="2017" name="exercice" id="exercice">
              </div>
              <div class="field">
                <label>CA HT : </label>
                <input type="text" value="0.00" name="caht" id="caht">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Résultat Comptable : </label>
                <input type="text" value="0.00" name="rc" id="rc">
              </div>
              <div class="field">
                <label>Résultat Fiscale : </label>
                <input type="text" value="0.00" name="rf" id="rf">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Impôt à payer : </label>
                <input type="text" value="0.00" name="ipay" id="ipay">
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
      $("#add").click(function(){
            $('.ui.modal').modal('show');
            $("#formudpate").attr('action','/is/');  
            $("#exercice").val()="";
            $("#caht").val()="";
            $("#rc").val()="";
            $("#rf").val()="";
            $("#ipay").val()="";
            
        });
      $(".edit").click(function(){
              $('.ui.modal').modal('show');  
              $.get("/is/"+$(this).attr("is-id"), function( data ) {
                $("#exercice").val(data.exercice);
                $("#caht").val(data.ca_ht);
                $("#rc").val(data.r_comptable);
                $("#rf").val(data.r_fiscale);
                $("#ipay").val(data.impot);
              });
                $("#formudpate").attr('action', '/update/is/'+$(this).attr("is-id"));
        });
      $('.ui.form').form({
              fields: {
                periode: {
                  identifier: 'periode',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Période est vide.'
                    }
                  ]
                },
                exercice: {
                  identifier: 'exercice',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Exerice est vide.'
                    }
                  ]
                },
                datepay: {
                  identifier: 'datepay',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Champs Date Paiement est vide.'
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date n'est pas valide dd/mm/yyyy"
                    }
                    ]
                },
                masse: {
                  identifier: 'masse',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Masse Salariale est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : "Champs Masse Salariale n'est pas valide"
                    }
                  ]
                },
                mir: {
                  identifier: 'mir',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Montant IR est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : "Champs Montant IR n'est pas valide"
                    }
                  ]
                },
                quitance: {
                  identifier: 'quitance',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Quittance est vide.'
                    }
                  ]
                }
              }
        
              
  });

});

</script>
@endsection