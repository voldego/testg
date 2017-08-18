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
  <div class="active section">Devis</div>
</div>

<div class="ui secondary menu devismenu">
  <div class="right menu">
	  	
	  <div class="item">
	  	<div class="ui olive button" id="add">
	  		<i class="plus icon"></i>
		  	Ajouter un Devis
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
    <th>Client</th>
    <th>Objet</th>
    <th>Date d'Editon</th>
    <th>Total HT</th>
    <th>Total TTC</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
    @foreach($devis as $dv)
      <tr>
        <td>{{ $dv->client }}</td>
        <td>{{ $dv->objet }}</td>
        <td>{{ $dv->date_edition }}</td>
        <td>{{ $dv->total_ht }} DH</td>
        <td>{{ $dv->total_ttc }} DH</td>
        <td>
        <a href="/devis/{{ $dv->id }}/details"><i class="browser icon"></i></a>
        <a class="edit" devis-id="{{ $dv->id }}" href="#"><i class="write icon"></i></a>
        <i class="file pdf outline icon"></i>
        <i class="send icon"></i>
        <a href="/delete/devis/{{ $dv->id }}"><i class="trash outline icon"></i></a>
      
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
  <div class="header">Ajouter un nouveau devis :</div>
  <div class="content">
    <form class="ui form" method="POST" id="formudpate">
    {{ csrf_field() }}
            <div class="two fields">
              <div class="field">
              <label>Client : </label>
                <div class="ui selection dropdown">
                  <input name="client" type="hidden">
                  <i class="dropdown icon"></i>
                  <div class="default text">Client</div>
                  <div class="menu">
                    <div class="item" data-value="1">Client1</div>
                    <div class="item" data-value="2">Client2</div>
                  </div>
                </div>
              </div>
              <div class="field">
                <label>Objet : </label>
                <input type="text" placeholder="Objet" name="objet" id="objet">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Date d'Edition : </label>
                <input type="date" placeholder="01/01/2000" name="date" id="date">
              </div>
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
            $("#formudpate").attr('action','/devis/');  
            $("#objet").val()="";
            $("#date").val()="";
            
        });
      $(".edit").click(function(){
              $('.ui.modal').modal('show');  
              $.get( "/devis/"+$(this).attr("devis-id"), function( data ) {
                $("#objet").val(data.objet);
                $("#date").val(data.date_edition);
              });
                $("#formudpate").attr('action', '/update/devis/'+$(this).attr("devis-id"));
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
                date: {
                  identifier: 'date',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Champs Date est vide.'
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date n'est pas valide dd/mm/yyyy"
                    }
                    ]
                }
              }
  });



});

</script>
@endsection