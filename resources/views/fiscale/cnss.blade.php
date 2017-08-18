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
  <div class="active section">CNSS</div>
</div>

<div class="ui secondary menu devismenu">
  <div class="right menu">
	  <div class="item">
	  	<div class="ui olive button" id="add">
	  		<i class="plus icon"></i>
		  	Déclarer une CNSS
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
    <th>Client</th>
    <th>Masse Salariale</th>
    <th>Pénalité CNSS</th>
    <th>Pénalité AMO</th>
    <th>Date Paiement</th>
    <th>Date Dépôt</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  @foreach($cnss as $c)
    <tr>
      <td>{{ $c->exercice }}</td>
      <td>{{ $c->client }}</td>
      <td>{{ $c->masse_salariale }} DH</td>
      <td>{{ $c->pen_cnss }} DH</td>
      <td>{{ $c->pen_amo }} DH</td>
      <td>{{ $c->date_pay }}</td>
      <td>{{ $c->date_depot }}</td>
      <td>
      <a href="#" class="edit" cnss-id="{{ $c->id }}"><i class="write icon"></i></a>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <a href="/delete/cnss/{{ $c->id }}" ><i class="trash outline icon"></i></a>
		
      </td>
    </tr>
    @endforeach
    
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
  <div class="header">Ajouter une Déclaration CNSS :</div>
  <div class="content">
    <form class="ui form" method="POST" id="formudpate">
      {{ csrf_field() }}
            <div class="two fields">
              <div class="field">
                <label>Exercice : </label>
                <input type="text" placeholder="2017" name="exercice" id="exercice">
              </div>
              <div class="field">
                <label>Client : </label>
                <div class="ui selection dropdown">
                  <input type="hidden" name="client" id="client">
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
                <label>Masse Salariale : </label>
                <input type="text" placeholder="0.00" name="masse" id="masse">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Pénalité CNSS : </label>
                <input type="text" value="0.00" name="pencnss" id="pencnss">
              </div>
              <div class="field">
                <label>Pénalité AMO : </label>
                <input type="text" value="0.00" name="penamo" id="penamo">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Date Paiement : </label>
                <input type="text" placeholder="jj/mm/aaaa" name="datepay" id="datepay">
              </div>
              <div class="field">
                <label>Date Dépôt : </label>
                <input type="text" placeholder="jj/mm/aaaa" name="datedep" id="datedep">
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
            $("#formudpate").attr('action','/cnss/');  
            $("#exercice").val()="";
            $("#client").val()="";
            $("#masse").val()="";
            $("#pencnss").val()="";
            $("#penamo").val()="";
            $("#datepay").val()="";
            $("#datedep").val()="";
            
        });
      $(".edit").click(function(){
              $('.ui.modal').modal('show');  
              $.get( "/cnss/"+$(this).attr("cnss-id"), function( data ) {
                $("#exercice").val(data.exercice);
                $("#client").val(data.client);
                $("#masse").val(data.masse_salariale);
                $("#pencnss").val(data.pen_cnss);
                $("#penamo").val(data.pen_amo);
                $("#datepay").val(data.date_pay);
                $("#datedep").val(data.date_depot);
              });
                $("#formudpate").attr('action', '/update/cnss/'+$(this).attr("cnss-id"));
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
                exercice: {
                  identifier: 'exercice',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Objet est vide.'
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
                datedep: {
                  identifier: 'datedep',
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
                penamo: {
                  identifier: 'penamo',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Pénalité AMO est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : "Champs Pénalité AMO n'est pas valide"
                    }
                  ]
                },
                pencnss: {
                  identifier: 'pencnss',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Pénalité CNSS est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : "Champs Pénalité CNSS n'est pas valide"
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
                }
              }
              
  });

});

</script>
@endsection