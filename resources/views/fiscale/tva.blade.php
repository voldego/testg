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
  <div class="active section">TVA</div>
</div>

<div class="ui secondary menu devismenu">
  <div class="right menu">
      <div class="item">
          <div class="ui olive button" id="add">
            <i class="plus icon"></i>
            Ajouter une Déclaration TVA
        </div>
      </div>
	  	
	  </div>
    <div class="item">
      <div class="ui icon input">
        <input type="text" placeholder="Search...">
        <i class="search link icon"></i>
      </div>
    </div>

  </div>

<table class="ui fixed selectable celled table">
  <thead>
    <tr>
    <th>Exercice</th>
    <th>Période</th>
    <th>CA HT</th>
    <th>Déposé le</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  @foreach($tva as $t)
    <tr>
      <td>{{ $t->exercice }}</td>
      <td>{{ $t->periode }}</td>
      <td>{{ $t->ca_ht }} DH</td>
      <td>{{ $t->date_depot }}</td>
      <td>
      <a href="/tva/{{ $t->id }}/details"><i class="browser icon"></i></a>
      <a href="#" tva-id="{{ $t->id }}" class="edit"><i class="write icon"></i></a>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <a href="/delete/tva/{{ $t->id }}"><i class="trash outline icon"></i></a>
		
      </td>
    </tr>
    @endforeach
    
  </tbody>
  <tfoot>
    <tr>
    <th colspan="5">
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
  <div class="header">Ajouter une Déclaration TVA :</div>
  <div class="content">
    <form class="ui form" method="POST" id="formudpate">
      {{ csrf_field() }}
            <div class="two fields">
              <div class="field">
                <label>Exercice : </label>
                <input type="text" placeholder="2017" name="exercice" id="exercice">
              </div>
              <div class="field">
                <label>Période : </label>
                <input type="text" placeholder="Période" name="periode" id="periode">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>CA HT : </label>
                <input type="text" value="0.00" name="caht" id="caht">
              </div>
              <div class="field">
                <label>Crédit Précedent : </label>
                <input type="text" value="0.00" name="cp" id="cp">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>TVA Collectée : </label>
                <input type="text" value="0.00" name="tvacol" id="tvacol">
              </div>
              <div class="field">
                <label>TVA Due : </label>
                <input type="text" value="0.00" name="tvadue" id="tvadue">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Déposé le : </label>
                <input type="text" placeholder="jj/mm/aaaa" name="datedep" id="datedep">
              </div>
              <div class="field">
                <label>Crédit TVA de la période : </label>
                <input type="text" value="0.00" name="ctva" id="ctva">
              </div>
            </div>
            <div class="field">
                <label>Observation : </label>
                <input type="text"  name="observation" id="observation">
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
            $("#formudpate").attr('action','/tva/');  
            $("#exercice").val("");
            $("#periode").val("");
            $("#caht").val("");
            $("#cp").val("");
            $("#tvacol").val("");
            $("#tvadue").val("");
            $("#ctva").val("");
            $("#datedep").val("");
            $("#observation").val("");
        });
      $(".edit").click(function(){
              $('.ui.modal').modal('show');  
              $.get("/tva/"+$(this).attr("tva-id"), function( data ) {
                $("#exercice").val(data.exercice);
                $("#periode").val(data.periode);
                $("#caht").val(data.ca_ht);
                $("#cp").val(data.credit_precedent);
                $("#tvacol").val(data.tva_col);
                $("#tvadue").val(data.tva_due);
                $("#ctva").val(data.credit_tva_periode);
                $("#datedep").val(data.date_depot);
                $("#observation").val(data.observation);
              });
                $("#formudpate").attr('action', '/update/tva/'+$(this).attr("tva-id"));
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
                observation: {
                  identifier: 'observation',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Observation est vide.'
                    }
                  ]
                },
                datedep: {
                  identifier: 'datedep',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Champs Date Déposition est vide.'
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date n'est pas valide dd/mm/yyyy"
                    }
                    ]
                },
                caht: {
                  identifier: 'caht',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs CA HT est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : "Champs CA HT n'est pas valide"
                    }
                  ]
                },
                tvacol: {
                  identifier: 'tvaol',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs TVA Collectée est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : "Champs TVA Collectée n'est pas valide"
                    }
                  ]
                },
                cp: {
                  identifier: 'cp',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Crédit Précedent est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : "Champs Crédit Précedent n'est pas valide"
                    }
                  ]
                },
                tvadue: {
                  identifier: 'tvadue',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs TVA Due est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : "Champs TVA Due n'est pas valide"
                    }
                  ]
                },
              ctva: {
                  identifier: 'ctva',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Crédi TVA de la Période est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : "Champs Crédi TVA de la Période n'est pas valide"
                    }
                  ]
                }
              }
        
              
  });

});

</script>
@endsection