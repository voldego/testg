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
  <div class="active section">Utilisateurs</div>
</div>

<div class="ui secondary menu devismenu">
  <div class="right menu">
	  <div class="item">
	  	<div class="ui olive button" id="add">
	  		<i class="plus icon"></i>
		  	Ajouter un Utilisateur
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
    <th>Rôle</th>
    <th>Etat</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role }}</td>
        <td>{{ $user->etat }} </td>
        <td>
        <a class="edit" user-id="{{ $user->id }}" href="#"><i class="write icon"></i></a>
        <i class="file pdf outline icon"></i>
        <i class="send icon"></i>
        <a href="/delete/user/{{ $user->id }}"><i class="trash outline icon"></i></a>
      
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
  <div class="header">Ajouter un nouveau devis :</div>
  <div class="content">
    <form class="ui form" method="POST" id="formudpate">
    {{ csrf_field() }}
            <div class="two fields">
              <div class="field">
                <label>Nom et Prénom : </label>
                <input type="text" placeholder="Nom et Prénom" name="name" id="name">
              </div>
              <div class="field">
                <label>Email : </label>
                <input type="text" placeholder="email" name="email" id="email">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
                <label>Mot de passe : </label>
                <input type="password" placeholder="Mot de passe" name="pass" id="pass">
              </div>
            </div>
            <div class="two fields">
              <div class="field">
              <label>Rôle : </label>
                <div class="ui selection dropdown">
                  <input name="role" type="hidden" id="role">
                  <i class="dropdown icon"></i>
                  <div class="default text" id="roled"></div>
                  <div class="menu">
                    <div class="item" data-value="admin">Admin</div>
                    <div class="item" data-value="utilisateur">Utilisateur</div>
                  </div>
                </div>
              </div>
              <div class="field">
              <label>Etat : </label>
                <div class="ui selection dropdown">
                  <input name="etat" type="hidden" id="etat">
                  <i class="dropdown icon"></i>
                  <div class="default text" id="etatd"></div>
                  <div class="menu">
                    <div class="item" data-value="active">Active</div>
                    <div class="item" data-value="bloqué">Bloqué</div>
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
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function(){
      $("#add").click(function(){
            $('.ui.modal').modal('show');
            $("#formudpate").attr('action','/user/');  
            $("#name").val()="";
            $("#email").val()="";
            $("#pass").val()="";
            $("#role").val()="";
            $("#etat").val()="";
            
        });
      $(".edit").click(function(){
              $('.ui.modal').modal('show');  
              $.get( "/user/"+$(this).attr("user-id"), function( data ) {
                $("#name").val(data.name);
                $("#email").val(data.email);
                $("#pass").val("");
                $("#roled").val(data.role);
                $("#etatd").val(data.etat);
              });
                $("#formudpate").attr('action', '/update/user/'+$(this).attr("user-id"));
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
                email: {
                  identifier: 'email',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Email est vide.'
                    }
                  ]
                },
                role: {
                  identifier: 'role',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Rôle est vide.'
                    }
                  ]
                },
                 etat: {
                  identifier: 'etat',
                  rules: [
                    {
                      type   : 'empty',
                      prompt : 'Champs Etat est vide.'
                    }
                  ]
                },
 
                pass: {
                  identifier: 'pass',
                  rules: [{
                      type   : 'empty',
                      prompt : 'Champs Mot de passe est vide.'
                    }
                    ]
                }
              }
  });



});

</script>
@endsection