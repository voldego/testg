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
  <div class="active section">Liste Dossiers Juridique</div>
</div>

<div class="ui secondary menu devismenu">
  <div class="right menu">
      <div class="item">
        <div class="ui olive button" id="add">
          <i class="plus icon"></i>
          Ajouter un dossier juridique
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
    <th>Raison Social</th>
    <th>Activité</th>
    <th>Date de Création</th>
    <th>Etat</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
    <tr>
      <td>MIT</td>
      <td>Education</td>
      <td>07-12-2016</td>
      <td>Incomplet</td>
      <td>
      <i class="browser icon"></i>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr class="negative">
      <td>MIT</td>
      <td>Education</td>
      <td>07-12-2016</td>
      <td>Incomplet</td>
      <td>
      <i class="browser icon"></i>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr>
      <td>MIT</td>
      <td>Education</td>
      <td>07-12-2016</td>
      <td>Incomplet</td>
      <td>
      <i class="browser icon"></i>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr>
      <td>MIT</td>
      <td>Education</td>
      <td>07-12-2016</td>
      <td>Incomplet</td>
      <td>
      <i class="browser icon"></i>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr class="negative">
      <td>MIT</td>
      <td>Education</td>
      <td>07-12-2016</td>
      <td>Incomplet</td>
      <td>
      <i class="browser icon"></i>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
      <i class="send icon"></i>
      <i class="trash outline icon"></i>
      </td>
    </tr>
    <tr>
     <td>MIT</td>
      <td>Education</td>
      <td>07-12-2016</td>
      <td>Incomplet</td>
      <td>
      <i class="browser icon"></i>
      <i class="write icon"></i>
      <i class="file pdf outline icon"></i>
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



<div class="ui modal">
  <i class="close icon"></i>
  <div class="content">
    <div class="ui tabular menu">
      <div class="item" data-tab="tab-name">Informations sur l'entreprise</div>
      <div class="item" data-tab="tab-name2">Etats</div>
    </div>
    <form class="ui form">
          <div class="ui active tab" data-tab="tab-name">
            <div class="field">
              <label>Raison Social : </label>
              <input type="text" placeholder="Raison Social">
            </div>
            <div class="three fields">
              <div class="field">
                <label>Tél fixe : </label>
                <input type="text" placeholder="Tél fixe">
              </div>
              <div class="field">
                <label>Fax : </label>
                <input type="text" placeholder="Fax">
              </div>
              <div class="field">
              <label>Email : </label>
              <input type="text" placeholder="Email">
            </div>
          </div>
          <div class="field">
            <label>Adresse</label>
            <input type="text"  placeholder="Adresse">
          </div>
          <div class="three fields">
            <div class="field">
              <label>Activité : </label>
              <input type="text" placeholder="Activité">
            </div>
          </div>
          <div class="three fields">
            <div class="field">
              <label>Forme juridique : </label>
              <input type="text" placeholder="Forme juridique">
            </div>
            <div class="field">
              <label>Capital : </label>
              <input type="text" placeholder="Capital">
            </div>
            <div class="field">
              <label>Date création : </label>
              <input type="text" placeholder="Date création">
            </div>
            
          </div>
          
          </div>
          <div class="ui tab" data-tab="tab-name2">
            <!-- Tab Content !-->
            <div class="four fields">
              <div class="field">
                <h4 class="ui dividing header">Certificat Négatif : </h4>
                <div class="ui selection dropdown">
                  <input type="hidden" name="gender">
                  <i class="dropdown icon"></i>
                  <div class="default text">Etat</div>
                  <div class="menu">
                    <div class="item" data-value="1">Complet</div>
                    <div class="item" data-value="0">Incomplet</div>
                  </div>
                </div>
              </div>
              <div class="field">
                <h4 class="ui dividing header">Statut : </h4>
                <div class="ui selection dropdown">
                  <input type="hidden" name="gender">
                  <i class="dropdown icon"></i>
                  <div class="default text">Etat</div>
                  <div class="menu">
                    <div class="item" data-value="1">Complet</div>
                    <div class="item" data-value="0">Incomplet</div>
                  </div>
                </div>
              </div>
              <div class="field">
                 <h4 class="ui dividing header">Patente : </h4>
                 <div class="ui selection dropdown">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                       <div class="default text">Etat</div>
                          <div class="menu">
                              <div class="item" data-value="1">Complet</div>
                              <div class="item" data-value="0">Incomplet</div>
                        </div>
                  </div>
              </div>
              <div class="field">
                 <h4 class="ui dividing header">Registre du commerce : </h4>
                 <div class="ui selection dropdown">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                       <div class="default text">Etat</div>
                          <div class="menu">
                              <div class="item" data-value="1">Complet</div>
                              <div class="item" data-value="0">Incomplet</div>
                        </div>
                  </div>
              </div>
          </div>
          <div class="four fields">
             <div class="field">
                 <h4 class="ui dividing header">Siège Social : </h4>
                 <div class="ui selection dropdown">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                       <div class="default text">Type</div>
                          <div class="menu">
                              <div class="item" data-value="1">Complet</div>
                              <div class="item" data-value="0">Incomplet</div>
                        </div>
                  </div>

                  <div class="ui selection dropdown" style="margin-top: 3px;">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                       <div class="default text">Etat</div>
                          <div class="menu">
                              <div class="item" data-value="1">Complet</div>
                              <div class="item" data-value="0">Incomplet</div>
                        </div>
                  </div>
              </div>
              <div class="field">
                 <h4 class="ui dividing header">CNSS : </h4>
                 <div class="ui selection dropdown">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                       <div class="default text">Type</div>
                          <div class="menu">
                              <div class="item" data-value="1">Complet</div>
                              <div class="item" data-value="0">Incomplet</div>
                        </div>
                  </div>
                  <div class="ui selection dropdown" style="margin-top: 3px;">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                       <div class="default text">Etat</div>
                          <div class="menu">
                              <div class="item" data-value="1">Complet</div>
                              <div class="item" data-value="0">Incomplet</div>
                        </div>
                  </div>
              </div>
              <div class="field">
                 <h4 class="ui dividing header">Annonce Légal : </h4>
                 <div class="ui selection dropdown">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                       <div class="default text">Etat</div>
                          <div class="menu">
                              <div class="item" data-value="1">Complet</div>
                              <div class="item" data-value="0">Incomplet</div>
                        </div>
                  </div>
                  <input type="text" placeholder="date public" style="margin-top: 3px;">

                </div>
                <div class="field">
                 <h4 class="ui dividing header">Cachet : </h4>
                 <div class="ui selection dropdown">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                       <div class="default text">Etat</div>
                          <div class="menu">
                              <div class="item" data-value="1">Complet</div>
                              <div class="item" data-value="0">Incomplet</div>
                        </div>
                  </div>

                </div>

          </div>
          <div class="three fields">
              <div class="field">
                <h4 class="ui dividing header">Ouverture de Compte : </h4>
                <div class="ui selection dropdown">
                  <input type="hidden" name="gender">
                  <i class="dropdown icon"></i>
                  <div class="default text">Etat</div>
                  <div class="menu">
                    <div class="item" data-value="1">Complet</div>
                    <div class="item" data-value="0">Incomplet</div>
                  </div>
                </div>
              </div>
              <div class="field">
                <h4 class="ui dividing header">Archivage dossier juridique : </h4>
                <div class="ui selection dropdown">
                  <input type="hidden" name="gender">
                  <i class="dropdown icon"></i>
                  <div class="default text">Etat</div>
                  <div class="menu">
                    <div class="item" data-value="1">Complet</div>
                    <div class="item" data-value="0">Incomplet</div>
                  </div>
                </div>
              </div>
              <div class="field">
                 <h4 class="ui dividing header">Etat dossier juridique : </h4>
                 <div class="ui selection dropdown">
                      <input type="hidden" name="gender">
                      <i class="dropdown icon"></i>
                       <div class="default text">Etat</div>
                          <div class="menu">
                              <div class="item" data-value="1">Complet</div>
                              <div class="item" data-value="0">Incomplet</div>
                        </div>
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


@endsection
@section('scripts')
<script>
$(document).ready(function(){
      $("#add").click(function(){
            $('.ui.modal').modal('show');
            $('.tabular.menu .item').tab();
        });
      $('.ui.dropdown').dropdown();
      $('.tabular.menu .item').tab();
});

</script>
@endsection