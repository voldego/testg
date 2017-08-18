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
  <div class="active section">IR</div>
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
    <th>Période</th>
    <th>Masse Salariale</th>
    <th>Montant IR</th>
    <th>Date Paiement</th>
    <th>Quittance</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  @foreach($ir as $i)
    <tr>
      <td>{{ $i->exercice }}</td>
      <td>{{ $i->periode }}</td>
      <td>{{ $i->masse_salariale }} DH</td>
      <td>{{ $i->montant_ir }} DH</td>
      <td>{{ $i->date_pay }}</td>
      <td>{{ $i->quittance }}</td>
      <td>
      <a href="#" class="edit" ir-id="{{ $i->id }}"><i class="write icon"></i></a>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <a href="/delete/ir/{{ $i->id }}"><i class="trash outline icon"></i></a>
      </td>
    </tr>
    @endforeach
    
  </tbody>
  <tfoot>
    <tr>
    <th colspan="7">
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
                <label>Période : </label>
                <input type="text" placeholder="Période" name="periode" id="periode">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Masse Salariale : </label>
                <input type="text" value="0.00" name="masse" id="masse">
              </div>
              <div class="field">
                <label>Montant IR : </label>
                <input type="text" value="0.00" name="mir" id="mir">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Date Paiement : </label>
                <input type="text" placeholder="jj/mm/aaaa" name="datepay" id="datepay">
              </div>
              <div class="field">
                <label>Quittance : </label>
                <input type="text" value="" name="quitance" id="quittance">
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
            $("#formudpate").attr('action','/ir/');  
            $("#exercice").val()="";
            $("#periode").val()="";
            $("#masse").val()="";
            $("#mir").val()="";
            $("#datepay").val()="";
            $("#quittance").val()="";
            
        });
      $(".edit").click(function(){
              $('.ui.modal').modal('show');  
              $.get( "/ir/"+$(this).attr("ir-id"), function( data ) {
                $("#exercice").val(data.exercice);
                $("#periode").val(data.periode);
                $("#masse").val(data.masse_salariale);
                $("#mir").val(data.montant_ir);
                $("#datepay").val(data.date_pay);
                $("#quittance").val(data.quittance);
              });
                $("#formudpate").attr('action', '/update/ir/'+$(this).attr("ir-id"));
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