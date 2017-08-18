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
  <div class="active section">Détails Facture</div>
</div>


<table class="ui single line celled striped table">
  <thead>
    <tr><th colspan="2">
      Fiche Facture
    </th>
  </tr></thead>
  <tbody>
    <tr>
      <td class="collapsing">
        <strong>N° Facture : </strong>
      </td>
      <td>F38Dec2016</td>
    </tr>
    <tr>
      <td>
        <strong>Client : </strong>
      </td>
      <td>Mit</td>
    </tr>
    <tr>
      <td>
        <strong>Objet : </strong> 
      </td>
      <td>Devis objet</td>
    </tr>
    <tr>
      <td>
         <strong>Date d'édition : </strong>
      </td>
      <td>07/06/2017</td>
    </tr>
    <tr>
      <td>
         <strong>Date d'écheance : </strong>
      </td>
      <td>07/06/2017</td>
    </tr>
    <tr>
      <td>
        <strong>Taux TVA : </strong>
      </td>
      <td>20%</td>
    </tr>
    <tr>
      <td>
        <strong>Montant TTC : </strong>
      </td>
      <td>1250.00 DH</td>
    </tr>
    <tr>
      <td>
        <strong>Montant Payé : </strong>
      </td>
      <td>1000.00 DH</td>
    </tr>
    <tr>
      <td>
        <strong>Etat : </strong>
      </td>
      <td><strong>Impayé</strong></td>
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
    <tr>
      <td>Produit 1</td>
      <td>1200.00 DH</td>
      <td>Oui</td>
      <td>
        <i class="write icon"></i>
        <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr>
      <td>Produit 2</td>
      <td>650.00 DH</td>
      <td>Non</td>
      <td>
        <i class="write icon"></i>
        <i class="trash outline icon"></i>
      </td>
    </tr> 
    <tr>
      <td>Produit 3</td>
      <td>1590.00</td>
      <td>Non</td>
      <td>
        <i class="write icon"></i>
        <i class="trash outline icon"></i>
      </td>
    </tr>
  </tbody>
</table>
<button class="ui primary right floated button" id="add">Ajouter une Préstation</button>

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