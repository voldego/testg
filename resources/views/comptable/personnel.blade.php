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
  <div class="active section">Personel</div>
</div>

<div class="ui secondary menu devismenu">
  <div class="right menu">
	  <div class="item">
	  	<div class="ui olive button" id="add">
	  		<i class="plus icon"></i>
		  	Ajouter un Personel
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
    <th>Nom et Prénom</th>
    <th>Email</th>
    <th>N° Tél</th>
    <th>Fonction</th>
    <th>Etat</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
    @foreach($personnels as $personnel)
      <tr>
        <td>{{ $personnel->name }}</td>
        <td>{{ $personnel->email }}</td>
        <td>{{ $personnel->tel }}</td>
        <td>{{ $personnel->fonction }} </td>
        <td>{{ $personnel->etat }} </td>
        <td>
        <a href="/personnel/{{ $personnel->id }}/details"><i class="browser icon"></i></a>
        <a class="edit" personnel-id="{{ $personnel->id }}" href="#"><i class="write icon"></i></a>
        <i class="file pdf outline icon"></i>
        <i class="send icon"></i>
        <a href="/delete/personnel/{{ $personnel->id }}"><i class="trash outline icon"></i></a>
      
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
  <div class="header">Ajouter un Personnel :</div>
  <div class="content">
    <form class="ui form" method="POST" id="formudpate">
    {{ csrf_field() }}
            <div class="two fields">
              <div class="field">
                <label>Nom et Prénom : </label>
                <input type="text" placeholder="Nom et Prénom" name="name" id="name">
              </div>
              <div class="field">
                <label>CIN : </label>
                <input type="text" placeholder="B121321" name="cin" id="cin">
              </div>
              
            </div>
            <div class="two fields">
               <div class="field">
                <label>Date de naissance : </label>
                <input type="date" placeholder="01/01/1990" name="date" id="date">
              </div>
              
            </div>
           
            <div class="two fields">
              <div class="field">
                <label>Email : </label>
                <input type="text" placeholder="email" name="email" id="email">
              </div>
              <div class="field">
                <label>N° Tél : </label>
                <input type="text"  name="tel" id="tel">
              </div>
            </div>
            <div class="field">
                <label>Adresse : </label>
                <input type="text" placeholder="adresse" name="adresse" id="adresse">
              </div>
            <div class="two fields">
             <div class="field">
                <label>N° CNSS : </label>
                <input type="text" placeholder="123456789" name="cnss" id="cnss">
              </div>
              <div class="field">
                <label>Fonction : </label>
                <input type="text" name="fonction" id="fonction">
              </div>
            </div>
            <div class="two fields">
                <div class="field">
                  <label>Banque : </label>
                  <input type="text" name="banque" id="banque">
                </div>
                <div class="field">
                  <label>N° RIB : </label>
                  <input type="text" placeholder="12345678901234" name="rib" id="rib">
                </div>
            </div>
            <div class="field">
                  <label>Adresse Banque : </label>
                  <input type="text" name="abanque" id="abanque">
            </div>
            <div class="field">
                <label>Etat : </label>
                <div class="ui selection dropdown">
                  <input type="hidden" name="etat" id="etat">
                  <i class="dropdown icon"></i>
                  <div class="default text">etat1</div>
                  <div class="menu">
                    <div class="item" data-value="etat1">etat1</div>
                    <div class="item" data-value="etat2">etat2</div>
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
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function(){
      $("#add").click(function(){
            $('.ui.modal').modal('show');
            $("#formudpate").attr('action','/personnel/');  
            $("#name").val("");
            $("#cin").val("");
            $("#tel").val("");
            $("#email").val("");
            $("#adresse").val("");
            $("#date").val("");
            $("#cnss").val("");
            $("#rib").val("");
            $("#fonction").val("");
            $("#banque").val("");
            $("#abanque").val("");
            $("#etat").val("");
            
        });
      $(".edit").click(function(){
              $('.ui.modal').modal('show');  
              $.get( "/personnel/"+$(this).attr("personnel-id"), function( data ) {
                $("#name").val(data.name);
                $("#cin").val(data.cin);
                $("#tel").val(data.tel);
                $("#email").val(data.email);
                $("#adresse").val(data.adresse);
                $("#date").val(data.date_naissance);
                $("#cnss").val(data.cnss);
                $("#rib").val(data.rib);
                $("#fonction").val(data.fonction);
                $("#banque").val(data.banque);
                $("#abanque").val(data.adresse_banque);
                $("#etat").val(data.etat);
              });
                $("#formudpate").attr('action', '/update/personnel/'+$(this).attr("personnel-id"));
        });
      $('.ui.dropdown').dropdown();
      $('.ui.form').form({
              fields: {
                name: {
                  identifier: 'name',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Nom et Prénom est vide.'
                    }
                  ]
                },
                adresse: {
                  identifier: 'adresse',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Adresse est vide.'
                    }
                  ]
                },
                etat: {
                  identifier: 'etat',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs etat est vide.'
                    }
                  ]
                },
                banque: {
                  identifier: 'banque',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Nom de Banque est vide.'
                    }
                  ]
                },
                abanque: {
                  identifier: 'abanque',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Adresse de la banque est vide.'
                    }
                  ]
                },
                cin: {
                  identifier: 'cin',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs N° CIN est vide.'
                    }
                  ]
                },
                tel: {
                  identifier: 'tel',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs N° Tél est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : 'Champs N° Tél est invalide.'
                    }

                  ]
                },
                cnss: {
                  identifier: 'tel',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs N° CNSS est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : 'Champs N° CNSS est invalide.'
                    }

                  ]
                },
                date: {
                  identifier: 'date',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Champs Date de Naissance est vide.'
                    },
                    {
                      type: "regExp[/^(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)\\d\\d$/]",
                      prompt: "Champs Date de Naissance n'est pas valide dd/mm/yyyy"
                    }
                    ]
                },
                rib: {
                  identifier: 'rib',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs N° RIB est vide.'
                    },
                    {
                      type   : 'number',
                      prompt : 'Champs N° RIB est invalide.'
                    }

                  ]
                },
                email: {
                  identifier: 'email',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Email est vide.'
                    }
                  ]
                }
              }
  });



});

</script>
@endsection