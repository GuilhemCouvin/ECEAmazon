<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
  <div class="row">
    <div class="span12">
      <form class="form-horizontal span6">
        <fieldset>
          <legend>Payement</legend>
       
          <div class="control-group">
            <label class="control-label">Numero de Carte de Crédit</label>
            <div class="controls">
                  <input type="text" class="input-block-level" autocomplete="off" maxlength="16" pattern="\d{16}" title="Chiffre CB" required>
            </div>
          </div>
       
          <div class="control-group">
            <label class="control-label">Date d'éxpiration</label>
            <div class="controls">
                <div class="row-fluid">
                <div class="span3">
                <input type="text" class="input-block-level" autocomplete="off" maxlength="2" pattern="\d{4}" title="Mois" required>

                </div>
                  <div class="span3">
                 <input type="text" class="input-block-level" autocomplete="off" maxlength="4" pattern="\d{4}" title="Annee" required>

                  </div>
                </div>
            </div>
          </div>
       
          <div class="control-group">
            <label class="control-label">CVV</label>
            <div class="controls">
              <div class="row-fluid">
                <div class="span3">
                  <input type="text" class="input-block-level" autocomplete="off" maxlength="3" pattern="\d{3}" title="Trois chiffres au dos" required>
                </div>
                <div class="span8">
                  <!-- screenshot may be here -->
                </div>
              </div>
            </div>
          </div>
       
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Payer</button>
            <button type="button" class="btn">Annuler</button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</div>