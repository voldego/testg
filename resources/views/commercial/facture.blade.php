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
  <div class="active section">Factures</div>
</div>

<div class="ui secondary menu devismenu">
  <div class="right menu">
  		<div class="item">
  			<div class="ui olive button" id="add">
	  		<i class="plus icon"></i>
		  	Ajouter une Facture
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
    <th>N° Facture</th>
    <th>Client</th>
    <th>Objet</th>
    <th>Date D'Editon</th>
    <th>Total TTC</th>
    <th>Total Payé</th>
    <th>Etat</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>F38Dec2016</td>
      <td>MIT</td>
      <td>Facture</td>
      <td>07-12-2016</td>
      <td>1200.00</td>
      <td>1200.00</td>
      <td class="positive"><i class="icon checkmark"></i> Payé</td>
      <td>
      <a href="/facture/1/details"><i class="browser icon"></i></a>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
		
      </td>
    </tr>
    <tr class="negative">
      <td>F38Dec2016</td>
      <td>MIT</td>
      <td>Facture</td>
      <td>07-12-2016</td>
      <td>1200.00</td>
      <td>0.00</td>
      <td><i class="icon close"></i>Impayé</td>
      <td>
      <a href="/facture/1/details"><i class="browser icon"></i></a>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
		
      </td>
    </tr>
    <tr>
      <td>F38Dec2016</td>
      <td>MIT</td>
      <td>Facture</td>
      <td>07-12-2016</td>
      <td>1200.00</td>
      <td>1200.00</td>
      <td class="positive"><i class="icon checkmark"></i>Payé</td>
      <td>
      <a href="/facture/1/details"><i class="browser icon"></i></a>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
		
      </td>
    </tr>
    <tr>
      <td>F38Dec2016</td>
      <td>MIT</td>
      <td>Facture</td>
      <td>07-12-2016</td>
      <td>1200.00</td>
      <td>1200.00</td>
      <td class="positive"><i class="icon checkmark"></i>Payé</td>
      <td>
      <a href="/facture/1/details"><i class="browser icon"></i></a>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
		
      </td>
    </tr>
    <tr class="negative">
      <td>F38Dec2016</td>
      <td>MIT</td>
      <td>Facture</td>
      <td>07-12-2016</td>
      <td>1200.00</td>
      <td>0.00</td>
      <td><i class="icon close"></i>Impayé</td>
      <td>
      <a href="/facture/1/details"><i class="browser icon"></i></a>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
		
      </td>
    </tr>
    <tr>
     <td>F38Dec2016</td>
      <td>MIT</td>
      <td>Facture</td>
      <td>07-12-2016</td>
      <td>1200.00</td>
      <td>1200.00</td>
      <td class="positive"><i class="icon checkmark"></i>Payé</td>
      <td>
      <a href="/facture/1/details"><i class="browser icon"></i></a>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
		
      </td>
    </tr>
    
  </tbody>
  <tfoot>
    <tr>
    <th colspan="8">
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
  <div class="header">Ajouter un nouvelle Facture :</div>
  <div class="content">
    <form class="ui form" method="POST" action="/data">
      {{ csrf_field() }}
            <div class="two fields">
              <div class="field">
                <label>Client : </label>
                <div class="ui selection dropdown">
                  <input name="gender" type="hidden" name="client">
                  <i class="dropdown icon"></i>
                  <div class="default text">Client</div>
                  <div class="menu">
                    <div class="item" data-value="1">Client1</div>
                    <div class="item" data-value="0">Client2</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Code Facture : </label>
                <input type="text" placeholder="REF" name="codefacture">
              </div>
              <div class="field">
                <label>Taux de TVA : </label>
                <input type="text" placeholder="20%" name="tva">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Date d'Edition : </label>
                <input type="text" placeholder="jj/mm/aaaa" name="dateedit">
              </div>
              <div class="field">
                <label>Date d'Echéance : </label>
                <input type="text" placeholder="jj/mm/aaaa" name="dateecheance">
              </div>
            </div>
            <div class="field">
              <label>Objet : </label>
              <input type="text" placeholder="Objet" name="objet">
            </div>
            <button class="ui positive right floated button" type="submit">Valider</button>
          <br>
          <br>
            <div class="ui error message"></div>
    </form>
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
      $('.ui.form').form({
              fields: {
                client: {
                  identifier: 'client',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Client est vide.'
                    }
                  ]
                },
                objet: {
                  identifier: 'objet',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Objet est vide.'
                    }
                  ]
                },
                dateedit: {
                  identifier: 'dateedit',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Champs Date Edition est vide.'
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date n'est pas valide dd/mm/yyyy"
                    }
                    ]
                },
                dateecheance: {
                  identifier: 'dateecheance',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Champs Date Echéance est vide.'
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date n'est pas valide dd/mm/yyyy"
                    }
                    ]
                },
                tva: {
                  identifier: 'tva',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Taux TVA est vide.'
                    }
                  ]
                },
                codefacture: {
                  identifier: 'codefacture',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Code Facture est vide.'
                    }
                  ]
                }
              }
  });

});

</script>
@endsection