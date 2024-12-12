<div class="col-md-12 p-2" id="resepRWJ_daftarresepRWJ">
  <div class="card card-outline card-default" style="margin-bottom:0;">
    
    <div class="overlay-wrapper" id="resepRWJ_daftarresepRWJ_loading">
      <div class="overlay dark">
        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
      </div>
    </div>

    <div class="card-body p-2 darkgrey-custom">
      <div class="row row-custom">
        <div class="col-sm-auto">          
          <div class="form-group">
            <label>No. Resep :</label>
            <input type="text" class="form-control form-control-xs" placeholder="Entry Resep">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Cari No. RM / Nama Pasien :</label>
            <div class="input-group input-group-sm mb-3">
              <div class="input-group-prepend">                
                <button type="button" class="btn btn-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:25px;"></button>
                <ul class="dropdown-menu">
                  <li class="dropdown-item resepRWJ_daftarresep_norm" onclick="resepRWJ_daftarresep_shownorm()">No. RekamMedik</a></li>
                  <li class="dropdown-item resepRWJ_daftarresep_nmapasien" onclick="resepRWJ_daftarresep_shownmapasien()">Nama Pasien</a></li>
                </ul>
              </div>
              <!-- /btn-group -->
              <input type="text" class="form-control form-control-xs" placeholder="Entry No. RM" id="resepRWJ_daftarresep_cri_norm">
              <input type="text" class="form-control form-control-xs" placeholder="Entry Nama Pasien" id="resepRWJ_daftarresep_cri_nmapasien">
            </div>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Tgl. Resep :</label>
            <input type="date" class="form-control form-control-xs" id="resepRWJ_daftarresep_tgl_awal">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>s/d</label>
            <input type="date" class="form-control form-control-xs" id="resepRWJ_daftarresep_tgl_akhir">
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Status Posting :</label>
            <select class="form-control form-control-xs">
              <option>Posting</option>
              <option>Belum Posting</option>
            </select>
          </div>
        </div>        
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Poliklinik :</label>
            <select class="form-control form-control-xs" id="resepRWJ_daftarresep_poliklinik"></select>
          </div>
        </div>
        <div class="col-sm-auto">
          <div class="form-group">
            <label>Jumlh Pasien :</label>
            <select class="form-control form-control-xs">
              <option>10 Pasien</option>
              <option>15 Pasien</option>
              <option>20 Pasien</option>
              <option>25 Pasien</option>
              <option>30 Pasien</option>
            </select>
          </div>
        </div>      
      </div>
    </div>
    <div class="col-sm-3">          
      <div class="form-group">
        <label>Autocomplete:</label>
        <input type="text" class="form-control form-control-xs autocomplete" id="autocomplete" placeholder="Pencarian Produk">
      </div>
    </div>

    <!-- card-outline -->
  </div>   
</div>

<div class="col-md-12 p-2" id="resepRWJ_daftarresepRWJ2">
  <div class="card card-outline">
    <div class="overlay-wrapper" id="resepRWJ_daftarresepRWJ_loading2">
      <div class="overlay">
        <i class="fas fa-3x fa-sync-alt fa-spin"></i>
      </div>
    </div>
    
    <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
      <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
        <div>
          <div class="card-header p-1">
            <div class="row">
              <div class="col-md-12">
                <h6 class="hr6-custom"><i class="fas fa-heartbeat"></i> Daftar Resep Rawat Jalan</h6>
              </div>
              <div class="col-md-3">
                <div class="form_group">
                  <label>Pencarian Obat</label>
                  <select class="eresepRWJ_pencarianobat form-control form-control-xs" id="eresepRWJ_pencarianobat">
                    <!-- <optgroup data-anag="Month" data-col1="Col1" data-col2="Col2"> -->

                        <!-- <option data-anag="January" data-col1="jan1" data-col2="jan2" value="JAN">January</option>
                        <option data-anag="February" data-col1="feb1" data-col2="feb2" value="FEB">February</option>
                        <option data-anag="March" data-col1="mar1" data-col2="mar2" value="MAR">March</option>
                        <option data-anag="April" data-col1="apr1" data-col2="apr2" value="APR">April</option> -->
                    <!-- </optgroup> -->
                  </select>
                  <select id="example2" style="width:400px"></select>
                </div>
              </div>
            </div>

            <!-- END LETAK BUTTON -->            
          </div>
        </div>
      </div>

      <table id="resepRWJ_tabledaftarresep" class="table table-striped table-sm choose">
        <thead>
          <tr>
            <th width="5">#</th>
            <th width="100">No. Resep</th>
            <th width="100">No. RM</th>
            <th>Nama Pasien</th>
            <th width="100">Penjamin</th>
            <th width="100">Poliklinik</th>
            <th width="200">SEP</th>
            <th width="80">Act</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>      
    </div>

  </div>  
</div>

<script type="text/javascript">  

document.getElementById('resepRWJ_daftarresep_tgl_awal').value = "2023-05-11";
document.getElementById('resepRWJ_daftarresep_tgl_akhir').value = "2023-05-30";
$('#resepRWJ_daftarresep_cri_norm').show();
$('#resepRWJ_daftarresep_cri_nmapasien').hide();

tampilkan_isi_resepRWJ();
resepRWJ_daftarresep_unit();
setTimeout(refresh, 1000);

  $(document).ready(function() {
    
    //$.fn.select2.defaults.set("theme", "classic");    
    var kode= '';
    var jsonresp = [{
      "id": "1",
      "name": "January",
      "col1": "jan1",
      "col2": "jan2"
    },
    {
      "id": "2",
      "name": "February",
      "col1": "feb1",
      "col2": "feb2"
    }, {
      "id": "3",
      "name": "March",
      "col1": "mar1",
      "col2": "mar2"
    }, {
      "id": "4",
      "name": "April",
      "col1": "apr1",
      "col2": "apr2"
    }
  ];
    var param = [{
      "kode": "1",
    }
  ];
    

    /*$(".eresepRWJ_pencarianobat").select2({
      placeholder: "Ketikan Nama Obat1",
      templateResult: formatRepo,
      templateSelection: formatRepoSelection,
      ajax: {
        url: "http://localhost/clone/DartoMakanYuyu/cross_ci3/Apotek/pencarianobat3",
        delay: 500,
        dataType: 'json',
        method: 'GET',
        data: function(params) {
          return {
                term: params.term,
                page: params.page || 1,
                obatcari : params.term,
            };
        },
        processResults: function(data,  params) {
          console.log(data.total_count);
          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 2) < data.total_count
            }
          };
          
        }
      }
    });*/
    tampil_obat();
    $(".eresepRWJ_pencarianobat").select2({
        //data: tampil_obat(kode),
        delay: 250,
        processResults: function (data, params) {
          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        },
        cache: true,
        placeholder: "Ketikan Nama Obat2",
        allowClear: true,
        minimumInputLength: 4,
        templateResult: formatRepo2,
        templateSelection: formatRepoSelection
        // query: function(q) {
        //   var pageSize, results, that = this;
        //   pageSize = 20; // or whatever pagesize
        //   results = [];
        //   if (q.term && q.term !== '') {
        //     // HEADS UP; for the _.filter function i use underscore (actually lo-dash) here
        //     results = _.filter(that.data, function(e) {
        //       return e.text.toUpperCase().indexOf(q.term.toUpperCase()) >= 0;
        //     });
        //     console.log(q);
        //     console.log(q.term);
        //   } else if (q.term === '') {
        //     results = that.data;
        //   }
        //   q.callback({
        //     results: results.slice((q.page - 1) * pageSize, q.page * pageSize),
        //     more: results.length >= q.page * pageSize,
        //   });
        // },
        
    
        
    });   
     
    // $('.js-example-basic-single').on('select2:opening select2:closing', function( event ) {
    //     var $searchfield = $(this).parent().find('.select2-search__field');
    //     $searchfield.prop('disabled', true);
    // });    

    /*$(".eresepRWJ_pencarianobatxxx").select2({
      ajax: {
        url: "Apotek/pencarianobat2",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            q: params.term, // search term
            page: params.page
          };
        },
        processResults: function (data, params) {          
          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        },
        cache: true
      },
      placeholder: 'Search for a repository',
      minimumInputLength: 1,
      templateResult: formatRepo,
      templateSelection: formatRepoSelection
    });*/

});

$(document).on('select2:open', () => {
  document.querySelector('.select2-search__field').focus();
});

$(document).on('keyup', '.select2-search__field', function(e) {
  //var kode = '';
  // var kode = $(this).val();    
  // if (kode.length >= 2) {
  //   tampil_obat(kode);
  // }
});

$(document).on('keydown', '.select2-search__field', function(event) {  
  switch(event.which){
    case 13:
    //$("#resepRWJ_daftarresep_tgl_awal").trigger('focus');    
    break;
  }
});

$('#eresepRWJ_pencarianobat').on('select2:selecting', function(e) {
  switch(e.which){
    case 13:
    //$("#resepRWJ_daftarresep_tgl_awal").trigger('focus');
    break;
  }
});

$('#eresepRWJ_pencarianobat').on('select2:select', function(e) {
  //$("#resepRWJ_daftarresep_tgl_awal").trigger('focus');
  console.log($(this).val())
});
$('#eresepRWJ_pencarianobat').on('select2:clearing', function(e) {
  return 'Ketikan Kode Diagnosa';
});

function tampil_obat() {
  // var param = {
  //     obatcari: kode
  //   };
  //   apiPOST('Apotek/pencarianobat2', param, hasil => {
  //     // var penjamin = '';
  //     var repo = hasil['items'];      
  //     //for (var i = 0; i < a.length; i++) {
  //       //penjamin += '<option value="' + a[i]['kd_prd'] + '">' + a[i]['nama_obat'] + ' | ' + a[i]['kd_satuan'] + '</option>';        
  //     //}
  // })
  var param = {
    obatcari: ''
  };
  apiPOST('Apotek/pencarianobat2', param, hasil => {
    var penjamin = '';
    var a = hasil['items'];      
      penjamin += '<option>Cari Obat</option>';
    for (var i = 0; i < a.length; i++) {
      penjamin += '<option data-anag="' + a[i]['kd_prd'] + '" data-col1="' + a[i]['nama_obat'] + '" data-col2="' + a[i]['kd_satuan'] + '" data-col3="' + a[i]['fractions'] + '" data-col4="' + a[i]['kegunaanobat'] + '" value="' + a[i]['kd_prd'] + '">' + a[i]['nama_obat'] +'</option>';
    }
    document.getElementById('eresepRWJ_pencarianobat').innerHTML = penjamin;
  })

}

function formatRepo2 (repo) {
  //console.log(repo);
  
  if (repo.loading) {
    return repo.text;
  }

  var kd_prd      = $(repo.element).data('anag');
  var nm_obat     = $(repo.element).data('col1');
  var kd_sat      = $(repo.element).data('col2');
  var fractions   = $(repo.element).data('col3');
  var keg_obt     = $(repo.element).data('col4');
  
  var $container = $(
    "<div class='select2-result-repository clearfix'>" +      
      "<div class='select2-result-repository__meta'>" +
      "<div class='row'>" +
        "<div class='col-sm-3 select2-result-repository__title'></div>" +
        "<div class='col-sm-9 select2-result-repository__description'></div>" +
      "</div>" +
        "<div class='select2-result-repository__statistics' style='display:flex;justify-content: left; flex-direction: column;'>" +
          "<div class='select2-result-repository__forks'><i class='fa fa-pencil'></i> </div>" +
          "<div class='select2-result-repository__stargazers'><i class='fa fa-heart'></i> </div>" +
          "<div class='select2-result-repository__watchers'><i class='fa fa-check'></i> </div>" +
        "</div>" +
      "</div>" +
    "</div>"
  );

  $container.find(".select2-result-repository__title").text(kd_prd);
  $container.find(".select2-result-repository__description").text(nm_obat);
  $container.find(".select2-result-repository__forks").append(" "+ kd_sat);
  $container.find(".select2-result-repository__stargazers").append(" "+fractions);
  $container.find(".select2-result-repository__watchers").append(" "+keg_obt);  

  return $container;
}

function formatRepo (repo) {
  //console.log(repo);
  
  if (repo.loading) {
    return repo.text;
  }

  // var kd_prd      = $(repo.element).data('anag');
  // var nm_obat     = $(repo.element).data('col1');
  // var kd_sat      = $(repo.element).data('col2');
  // var persediaan  = $(repo.element).data('col3');
  // var keg_obt     = $(repo.element).data('col4');
  
  var $container = $(
    "<div class='select2-result-repository clearfix'>" +      
      "<div class='select2-result-repository__meta'>" +
      "<div class='row'>" +
        "<div class='col-sm-3 select2-result-repository__title'></div>" +
        "<div class='col-sm-9 select2-result-repository__description'></div>" +
      "</div>" +
        "<div class='select2-result-repository__statistics' style='display:flex;justify-content: space-evenly;'>" +
          "<div class='select2-result-repository__forks'><i class='fa fa-check'></i> </div>" +
          "<div class='select2-result-repository__stargazers'><i class='fa fa-heart'></i> </div>" +
          "<div class='select2-result-repository__watchers'><i class='fa fa-check'></i> </div>" +
        "</div>" +
      "</div>" +
    "</div>"
  );

  $container.find(".select2-result-repository__title").text(repo.kd_prd);
  $container.find(".select2-result-repository__description").text(repo.nama_obat);
  $container.find(".select2-result-repository__forks").append(repo.kd_satuan);
  $container.find(".select2-result-repository__stargazers").append(repo.kd_sub_jns);
  $container.find(".select2-result-repository__watchers").append(repo.kegunaanobat);  

  return $container;
}

function formatRepoSelection (repo) {
  //var nama_obat = "12345";
  var nm_obat     = $(repo.element).data('col1');    
  return nm_obat || repo.text;
  //return repo.nama_obat || repo.text;
  
}

function resepRWJ_daftarresep_unit() {
  var param = {
    idfar : user['id_far']
  }
  apiPOST('Apotek/getUnitOrderResep', param, hasil => {
    var data = hasil['data'];
    var unit = '';
      unit += '<option value="0">- Semua Poli -</option>';
    for (var i = 0; i < data.length; i++) {
      unit += '<option value="'+ data[i]['id_unit'] +'">'+ data[i]['nama_unit'].toUpperCase()+'</option>';
    }
    document.getElementById('resepRWJ_daftarresep_poliklinik').innerHTML = unit;
  });

}

function resepRWJ_daftarresep_shownorm(){
  $('#resepRWJ_daftarresep_cri_norm').show();
  $('#resepRWJ_daftarresep_cri_nmapasien').hide();
  $("#resepRWJ_daftarresep_cri_norm").trigger('focus');
}

function resepRWJ_daftarresep_shownmapasien(){
  $('#resepRWJ_daftarresep_cri_norm').hide();
  $('#resepRWJ_daftarresep_cri_nmapasien').show();
  $("#resepRWJ_daftarresep_cri_nmapasien").trigger('focus');
}

function tampilkan_isi_resepRWJ(){  
  var Baris = '<tr>';  
  for (var i = 0; i < 19; i++) {
    var no = i+1;
        Baris += '<td>'+no+'</td>';
        Baris += '<td>12345'+no+'</td>';
        Baris += '<td>00000'+no+'</td>';
        Baris += '<td>Edwin'+no+'</td>';
        Baris += '<td>BPJS NON PBI</td>';
        Baris += '<td>Mata</td>';
        Baris += '<td>00012662222'+no+'</td>';
        Baris += '<td><a href="#" class="panggilan btn btn-xs btn-info" onclick="cek()"><i class="fa fa-edit"></i><p hidden>Penerimaan Resep RWJ</p></a> <button type="button" class="btn btn-xs btn-danger" id="hapusResepRWJ'+no+'"><i class="fa fa-trash"></i></button></td>';
      Baris += "</tr>";
  }
  $('#resepRWJ_tabledaftarresep tbody').append(Baris);
}

function refresh() {       
  $('#resepRWJ_daftarresepRWJ_loading').hide();
  $('#resepRWJ_daftarresepRWJ_loading2').hide();
}

function cek(){
  $('.content-wrapper').IFrame('createTab', 'Home', 'index.html', 'index', false);
  //window.location.href = "eresepRWJ";
}


$(function() {  
  /*apiPOST('Apotek/pencarianobat2', null, hasil => {
    var data = hasil['data'];
    var kd_produk = [];
    for (var i = 0; i < data.length; i++) {
      kd_produk.push(data[i]['id_unit']+' || '+data[i]['nama_unit']);
    }
    
    $(".autocomplete").autocomplete({
      source: kd_produk
    });

  });
*/
  var param = {
    obatcari: '',
  };
  var field;

  field = new AutoComplete("autocomplete");
  apiPOST('Apotek/getObat_eresep', param, hasil => {
    if (hasil !== null) {
      var list = hasil['data'];
      list.forEach(baru => {
        field.addData(baru['kd_prd'], baru['nama_obat'] + ' || ' + baru['kd_satuan']);
      });
    }
  });
  
});
</script>