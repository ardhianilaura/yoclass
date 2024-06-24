<!-- CSS Script -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://twitter.github.io/typeahead.js/css/examples.css" /> 
  <style>
    .box
    {
      width:100%;
      max-width: 650px;
      margin:0 auto;
    }
    .container{
      margin-top: 50px;
    }
    .twitter-typeahead, .tt-hint, .tt-input, .tt-menu { 
        width: 100%;
    }
  </style>
<div class="container-fluid">
    
    <div class="alert alert-success" role="alert">
        <i class="fas fa-user-graduate"></i> Form Masuk Halaman Input Nilai
    </div>
 
    <form method="post" action="<?php echo base_url('Nilai/nilai_aksi') ?>">
        
        <div class="form-group">
            <label>NIS</label><br>
            <input name="nis" class="form-control" placeholder="Pilih NIS Siswa" id="NIS" required></input>
            <?php echo form_error('nis','<div class="text-danger small ml-2">','</div>') ?>
        </div>
 
        <div class="form-group">
            <label>Kode Mata Pelajaran</label>
            <input name="kode_mapel" class="form-control" placeholder="Pilih Kode Mata Pelajaran" id="kode_mapel" required></input>
            </select>
            <?php echo form_error('kode_mapel','<div class="text-danger small ml-2">','</div>') ?>
        </div>
 
        <button type="submit" class="btn btn-primary">Proses</button>
 
        <!-- Jquery, Bootstrap dan Typehead -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
 
  <script src="https://twitter.github.io/typeahead.js/js/handlebars.js"></script>
  <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
 
  <!-- Page Script -->
    </form>
</div>
 
  <script>
  $(document).ready(function(){
 
    var nis_data = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch:'<?php echo base_url(); ?>Nilai/get_autocomplete_nis',
      remote:{
        url:'<?php echo base_url(); ?>Nilai/get_autocomplete_nis/%QUERY',
        wildcard:'%QUERY'
      }
    });
    
    var mapel_data = new Bloodhound({
      datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
      queryTokenizer: Bloodhound.tokenizers.whitespace,
      prefetch:'<?php echo base_url(); ?>Nilai/get_autocomplete_mapel',
      remote:{
        url:'<?php echo base_url(); ?>Nilai/get_autocomplete_mapel/%QUERY',
        wildcard:'%QUERY'
      }
    });
 
    $('#NIS').typeahead(null, {
      nama: 'nis',
      display: 'nis',
      source:nis_data,
      limit:10, 
      templates:{
        suggestion:Handlebars.compile('<div class="row"><div class="col-md-12">{{display_data}}</div></div>')
      }
    });
 
    $('#kode_mapel').typeahead(null, {
      nama: 'mapel',
      display: 'kode_mapel',
      source:mapel_data,
      limit:10, 
      templates:{
        suggestion:Handlebars.compile('<div class="row"><div class="col-md-12">{{display_data}}</div></div>')
      }
    });
 
  });
  </script>