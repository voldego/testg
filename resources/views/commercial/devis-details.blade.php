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
  <a class="section">Gestion Commerciale</a>
  <i class="right arrow icon divider"></i>
  <a class="section" href="/devis/liste">Devis</a>
  <i class="right arrow icon divider"></i>
  <div class="active section">Détails Devis</div>
</div>


<table class="ui single line celled striped table">
  <thead>
    <tr><th colspan="2">
      Fiche Devis
    </th>
  </tr></thead>
  <tbody>
    <tr>
      <td class="collapsing">
        <strong>Client : </strong>
      </td>
      <td>{{ $devis->client }}</td>
    </tr>
    <tr>
      <td>
        <strong>Objet : </strong> 
      </td>
      <td>{{ $devis->objet }}</td>
    </tr>
    <tr>
      <td>
         <strong>Date d'Edition : </strong>
      </td>
      <td>{{ $devis->date_edition }}</td>
    </tr>
    <tr>
      <td>
        <strong>Montant HT : </strong>
      </td>
      <td>{{ $devis->total_ht }} DH</td>
    </tr>
    <tr>
      <td>
        <strong>Montant TTC : </strong>
      </td>
      <td>{{ $devis->total_ttc }} DH</td>
    </tr>
    
  </tbody>
</table>
<h4 class="ui header">Listes des Préstations : </h4>
<table class="ui selectable celled table">
  <thead>
    <tr>
      <th>Libellé</th>
      <th>Montant</th>
      <th>Taxable</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($devis->prestation as $prestation)
    <tr>
      <td>{{ $prestation->libelle }}</td>
      <td>{{ $prestation->montant_ht }} DH</td>
      <td>{{ $prestation->taxable }}</</td>
      <td>
        <a class="add2" id-prest="{{ $prestation->id }}"><i class="write icon" ></i></a>
        <a href="/delete/devis/prestation/{{ $prestation->id }}"><i class="trash outline icon"></i></a>
      </td>
    </tr> 
    @endforeach
    
  </tbody>
</table>
<button class="ui primary right floated button" id="add">Ajouter une Préstation</button>

<div class="ui modal" id="modal">
  <i class="close icon"></i>
  <div class="header">Ajouter une nouvelle Préstation :</div>
  <div class="content">
    <form class="ui form" method="POST" id="formudpate">
    {{ csrf_field() }}
              <div class="field">
                <label>Libellé : </label>
                <input type="text" placeholder="Libellé" name="libelle" id="libelle">
              </div>
          <div class="two fields">
            <div class="field">
              <label>Montant HT : </label>
              <input type="text" placeholder="0.00" name="montantht" id="montantht">
            </div>
            <div class="field">
              <label>Taxable : </label>
                <div class="ui selection dropdown">
                  <input type="hidden" name="taxable" id="taxable">
                  <i class="dropdown icon"></i>
                  <div class="default text"></div>
                  <div class="menu">
                    <div class="item" data-value="Oui">Oui</div>
                    <div class="item" data-value="Non">Non</div>
                  </div>
                </div>
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
              $('#modal').modal('show');
              $("#formudpate").attr('action', '/devis/{{ $devis->id }}/prestation');  
              $("#libelle").val()='';
              $("#montantht").val()='';
              $("#taxable").val()='';
                
        });
      $(".add2").click(function(){
              $('#modal').modal('show');  
              $.get( "/devis/prestation/"+$(this).attr("id-prest"), function( data ) {
                $("#libelle").val(data.libelle);
                $("#montantht").val(data.montant_ht);
                $("#taxable").val(data.taxable);
              });
                $("#formudpate").attr('action', '/update/devis/prestation/'+$(this).attr("id-prest"));
        });
      $('.ui.dropdown').dropdown();
      $('.ui.form').form({
              fields: {
                libelle: {
                  identifier: 'libelle',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Libellé est vide.'
                    }
                  ]
                },
                montantht: {
                  identifier: 'montantht',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Total HT est vide.'
                    }
                  ]
                },
                taxable: {
                  identifier: 'taxable',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Taxable est vide.'
                    }
                  ]
                }
              }
  });



});

</script>
@endsection