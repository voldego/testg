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
  <a class="section">Fiscale</a>
  <i class="right arrow icon divider"></i>
  <a class="section" href="/tva/liste">TVA</a>
  <i class="right arrow icon divider"></i>
  <div class="active section">Détails TVA</div>
</div>


<table class="ui single line celled striped table">
  <thead>
    <tr><th colspan="2">
      Fiche TVA
    </th>
  </tr></thead>
  <tbody>
    <tr>
      <td class="collapsing">
        <strong>Exercice : </strong>
      </td>
      <td>{{ $tva->exercice }}</td>
    </tr>
    <tr>
      <td>
        <strong>Période : </strong>
      </td>
      <td>{{ $tva->periode }}</td>
    </tr>
    <tr>
      <td>
        <strong>CA HT : </strong> 
      </td>
      <td>{{ $tva->ca_ht }} DH</td>
    </tr>
    <tr>
      <td>
         <strong>Déposé le : </strong>
      </td>
      <td>{{ $tva->date_depot }}</td>
    </tr>
    <tr>
      <td>
         <strong>TVA Collectée : </strong>
      </td>
      <td>{{ $tva->tva_col }} DH</td>
    </tr>
    <tr>
      <td>
         <strong>Crédit Précedent : </strong>
      </td>
      <td>{{ $tva->credit_precedent }} DH</td>
    </tr>
    <tr>
      <td>
        <strong>TVA Due : </strong>
      </td>
      <td>{{ $tva->tva_due }} DH</td>
    </tr>
    <tr>
      <td>
        <strong>Crédi TVA de la Période : </strong>
      </td>
      <td>{{ $tva->credit_tva_periode }} DH</td>
    </tr>
    <tr>
      <td>
        <strong>Observation : </strong>
      </td>
      <td>{{ $tva->observation }}</td>
    </tr>
   
  </tbody>
</table>

<button class="ui primary right floated button" id="add">Editer la Déclaration TVA</button>

<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">Ajouter une nouvelle Préstation :</div>
  <div class="content">
    <form class="ui form">
              <div class="field">
                <label>Libellé : </label>
                <input type="text" placeholder="Objet">
              </div>
          <div class="two fields">
            <div class="field">
              <label>Total HT : </label>
              <input type="text" placeholder="0.00">
            </div>
            <div class="field">
              <label>Taxable : </label>
                <div class="ui selection dropdown">
                  <input name="gender" type="hidden">
                  <i class="dropdown icon"></i>
                  <div class="default text">Oui</div>
                  <div class="menu">
                    <div class="item" data-value="1">Oui</div>
                    <div class="item" data-value="0">Non</div>
                  </div>
                </div>
              </div>
          </div>

    </form>
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Annuler
    </div>
    <div class="ui positive right labeled icon button">
      Valider
      <i class="checkmark icon"></i>
    </div>
  </div>
</div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function(){
      $("#add").click(function(){
            $('.ui.modal').modal('show');
            
        });
      $('.ui.dropdown').dropdown();
});

</script>
@endsection