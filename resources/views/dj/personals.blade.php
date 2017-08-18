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
  <a class="section">Dossier Juridique</a>
  <i class="right arrow icon divider"></i>
  <div class="active section">Liste des Responsables</div>
</div>

<div class="ui secondary menu devismenu">
  <div class="right menu">
      
	  	
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
    <th>Nom et Prénom</th>
    <th>Raison Social</th>
    <th>Tél</th>
    <th>Email</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>Azri Hamza</td>
      <td>Freelance</td>
      <td>0620-30-23-11</td>
      <td>azri.hamza@gmail.com</td>
      <td>
      <i class="write icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr>
     <td>Azri Hamza</td>
      <td>Freelance</td>
      <td>0620-30-23-11</td>
      <td>azri.hamza@gmail.com</td>
      <td>
      <i class="write icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr>
      <td>Azri Hamza</td>
      <td>Freelance</td>
      <td>0620-30-23-11</td>
      <td>azri.hamza@gmail.com</td>
      <td>
      <i class="write icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr>
      <td>Azri Hamza</td>
      <td>Freelance</td>
      <td>0620-30-23-11</td>
      <td>azri.hamza@gmail.com</td>
      <td>
      <i class="write icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr>
      <td>Azri Hamza</td>
      <td>Freelance</td>
      <td>0620-30-23-11</td>
      <td>azri.hamza@gmail.com</td>
      <td>
      <i class="write icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr>
     <td>Azri Hamza</td>
      <td>Freelance</td>
      <td>0620-30-23-11</td>
      <td>azri.hamza@gmail.com</td>
      <td>
      <i class="write icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    
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

@endsection