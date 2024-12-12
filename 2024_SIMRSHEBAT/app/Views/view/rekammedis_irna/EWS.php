<div class="card">
<div class="card-body">
<div class="row">
<div class="col-md-6">
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label" title="ID">ID</label>
</div>
<div class="col-md-5">
<label class="col-form-label" id="dacpantauews_id">0</label>
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Petugas</label>
</div>
<div class="col-md-7">
<div class="input-group">
<select name="jnspjId" id="dacpantauews_jnsapjId" class="form-control">
<option value="1">Perawat / Bidan</option>
<option value="2">Dokter</option>
</select>
</div>
</div>
</div>
<div class="form-group row" id="dacpantauews_divpj1">
<div class="col-md-3">
<label class="col-form-label">Perawat / Bidan</label>
</div>
<div class="col-md-7">
<select id="dacpantauews_apjId" name="apjId" class="form-control select2-hidden-accessible" data-select2-id="dacpantauews_apjId" tabindex="-1" aria-hidden="true"><option value="1" selected="" data-select2-id="10">UMUM</option></select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="8"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-dacpantauews_apjId-container"><span class="select2-selection__rendered" id="select2-dacpantauews_apjId-container" role="textbox" aria-readonly="true" title="UMUM"><span class="select2-selection__clear" data-select2-id="18">×</span>UMUM</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
</div>
<div class="col-md-1">
<button id="dacpantauews_btpjdef" class="btn btn-warning" type="button" title="Default PJ">
&nbsp;&nbsp;<!-- <i class="fas fa-undo"></i> -->&nbsp;&nbsp;
</button>
</div>
</div>
<div class="form-group row" id="dacpantauews_divpj2" style="display: none;">
<div class="col-md-3">
<label class="col-form-label">Dokter</label>
</div>
<div class="col-md-7">
<select id="dacpantauews_apj2Id" name="apjId" class="form-control select2-hidden-accessible" data-select2-id="dacpantauews_apj2Id" tabindex="-1" aria-hidden="true"><option value="11" selected="" data-select2-id="12">dr. I WAYAN MERTHA, Sp.PD, KGH</option></select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="9"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-dacpantauews_apj2Id-container"><span class="select2-selection__rendered" id="select2-dacpantauews_apj2Id-container" role="textbox" aria-readonly="true" title="dr. I WAYAN MERTHA, Sp.PD, KGH"><span class="select2-selection__clear" data-select2-id="19">×</span>dr. I WAYAN MERTHA, Sp.PD, KGH</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
</div>
<div class="col-md-1">
<button id="dacpantauews_btpj2def" class="btn btn-warning" type="button" title="Default PJ">
&nbsp;&nbsp;<!-- <i class="fas fa-undo"></i> -->&nbsp;&nbsp;
</button>
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Tanggal</label>
</div>
<div class="col-md-6">
<div class="input-group date" id="dacpantauews_datgl" data-target-input="nearest">
<input id="dacpantauews_atgl" name="atgl" type="text" class="form-control 
datetimepicker-input" data-target="#dacpantauews_datgl" data-toggle="datetimepicker" onkeydown="return false">
<div class="input-group-append" data-target="#dacpantauews_datgl" data-toggle="datetimepicker">
<div class="input-group-text"><!-- <i class="far fa-calendar"></i> --></div>
</div>
</div>
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Jam</label>
</div>
<div class="col-md-6">
<div class="input-group date" id="dacpantauews_dajam" data-target-input="nearest">
<input id="dacpantauews_ajam" name="ajam" type="text" class="form-control datetimepicker-input" data-target="#dacpantauews_dajam" data-toggle="datetimepicker" onkeydown="return false">
<div class="input-group-append" data-target="#dacpantauews_dajam" data-toggle="datetimepicker">
<div class="input-group-text"><!-- <i class="far fa-calendar"></i> --></div>
</div>
</div>
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Kesadaran</label>
</div>
<div class="col-md-6">
<select name="bsadar" id="dacpantauews_bsadar" class="form-control">
<option value="1">Alert (Sadar)</option>
<option value="2">Voice (Memberikan Reaksi Pada Suara)</option>
<option value="3">Pain (Memberikan Reaksi Pada Rasa Sakit)</option>
<option value="4">Unconscious (Tidak Sadar)</option>
</select>
</div>
<div class="col-md-2">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bsadarskor" onkeyup="dacpantauewsex.hasilskor();">
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Tekanan Darah</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_btensi1" onkeyup="dacpantauewsex.onChangetensi();">
<label class="col-form-label">/</label>
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_btensi2" onkeyup="dacpantauewsex.onChangetensi();">
<span class="input-group-append">
<span class="input-group-text">mmHg</span>
</span>
</div>
</div>
<div class="col-md-2">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_btensiskor" onkeyup="dacpantauewsex.hasilskor();">
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Nadi</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bnadi" onkeyup="dacpantauewsex.onChangenadi();">
<span class="input-group-append ">
<span class="input-group-text">x/Menit</span>
</span>
</div>
</div>
<div class="col-md-2">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bnadiskor" onkeyup="dacpantauewsex.hasilskor();">
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Suhu</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bsuhu" onkeyup="dacpantauewsex.onChangesuhu();">
<span class="input-group-append">
<span class="input-group-text">°C</span>
</span>
</div>
</div>
<div class="col-md-2">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bsuhuskor" onkeyup="dacpantauewsex.hasilskor();">
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Pernafasan</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_brespirasi" onkeyup="dacpantauewsex.onChangerespirasi();">
<span class="input-group-append">
<span class="input-group-text">x/Menit</span>
</span>
</div>
</div>
<div class="col-md-2">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_brespirasiskor" onkeyup="dacpantauewsex.hasilskor();">
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">SPO2</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bspo2" onkeyup="dacpantauewsex.onChangespo2();">
<span class="input-group-append">
<span class="input-group-text">%</span>
</span>
</div>
</div>
<div class="col-md-2">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bspo2skor" onkeyup="dacpantauewsex.hasilskor();">
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Oksigen</label>
</div>
<div class="col-md-6">
<div class="row" id="dacpantauews_boksigen">
<div class="col-md-6">
<div class="form-group">
<div class="row custom-control custom-checkbox custom-control-inline">
<input name="dacpantauews_boksigen" value="1" type="radio" class="custom-control-input" id="dacpantauews_boksigen_1">
<label class="custom-control-label" for="dacpantauews_boksigen_1">Tidak</label>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<div class="row custom-control custom-checkbox custom-control-inline">
<input name="dacpantauews_boksigen" value="2" type="radio" class="custom-control-input" id="dacpantauews_boksigen_2">
<label class="custom-control-label" for="dacpantauews_boksigen_2">Ya</label>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-2">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_boksigenskor" onkeyup="dacpantauewsex.hasilskor();">
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label" id="dacpantauews_ltotskor" style="color: red;">TOTAL SKOR</label>
</div>
<div class="col-md-6">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_btotskor" style="color: red;">
</div>
</div>
</div>

<div class="col-md-6">
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Skala Nyeri</label>
</div>
<div class="col-md-7">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bnyeri">
</div>
</div>
<div class="form-group row" id="dacpantauews_div1">
<div class="col-md-3">
<label class="col-form-label">Skala Jatuh</label>
</div>
<div class="col-md-7">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bjatuh">
</div>
</div>
<div class="form-group row" id="dacpantauews_div2">
<div class="col-md-3">
<label class="col-form-label">GCS</label>
</div>
<div class="col-md-7">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_bgcs">
</div>
</div>
<div class="form-group row" id="dacpantauews_div3">
<div class="col-md-3">
<label class="col-form-label" title="Pupil">Pupil</label>
</div>
<div class="col-md-3">
<div class="input-group">
<span class="input-group-prepend"> <span class="input-group-text">Kiri</span>
</span> <select name="epupil1" id="dacpantauews_epupil1" class="form-control">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</div>
</div>
<div class="col-md-4">
<div class="input-group">
<span class="input-group-prepend"> <span class="input-group-text">Kanan</span>
</span> <select name="epupil2" id="dacpantauews_epupil2" class="form-control">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select> <span class="input-group-append"> <span class="input-group-text">mm</span>
</span>
</div>
</div>
</div>
<div class="form-group row" id="dacpantauews_div4">
<div class="col-md-3">
<label class="col-form-label">EKG</label>
</div>
<div class="col-md-7">
<input type="text" class="form-control" id="dacpantauews_bekg">
</div>
</div>
<div class="form-group row" id="dacpantauews_div5">
<div class="col-md-3">
<label class="col-form-label">Gula Darah</label>
</div>
<div class="col-md-7">
<input type="text" class="form-control" id="dacpantauews_bgula">
</div>
</div>
<div class="form-group row" id="dacpantauews_div6">
<div class="col-md-3">
<label class="col-form-label">Masalah</label>
</div>
<div class="col-md-7">
<input type="text" class="form-control" id="dacpantauews_bmasalah">
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Keseimbangan Cairan</label>
</div>
<div class="col-md-7">
<div class="row" id="dacpantauews_cairan">
<div class="col-md-6">
<div class="form-group">
<div class="row custom-control custom-checkbox custom-control-inline">
<input name="dacpantauews_cairan" value="1" type="radio" class="custom-control-input" id="dacpantauews_cairan_1">
<label class="custom-control-label" for="dacpantauews_cairan_1">Tidak</label>
</div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<div class="row custom-control custom-checkbox custom-control-inline">
<input name="dacpantauews_cairan" value="2" type="radio" class="custom-control-input" id="dacpantauews_cairan_2">
<label class="custom-control-label" for="dacpantauews_cairan_2">Ya</label>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="dacpantauews_cairanin" style="display: none;">
<div class="form-group row">
<div class="col-md-3"></div>
<div class="col-md-9">
<div class="row">
<div class="col-md-6">
<div class="form-group row">
<div class="custom-control custom-checkbox custom-control-inline">
<input name="dacpantauews_cairanin" value="1" type="checkbox" class="custom-control-input" id="dacpantauews_cairanin_1">
<label class="custom-control-label" for="dacpantauews_cairanin_1">Intake</label>
</div>
</div>
<div class="row" id="dacpantauews_div_cairanin1" style="display: none;">
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Oral</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_inoral" onkeyup="dacpantauewsex.getScorein();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Infus</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_ininfus" onkeyup="dacpantauewsex.getScorein();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Lain-Lain</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_inlain" onkeyup="dacpantauewsex.getScorein();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Jumlah</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input disabled="disabled" type="number" onfocus="this.select();" class="form-control" id="dacpantauews_intotal" onkeyup="dacpantauewsex.getScoreall();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
</div>

</div>
<div class="col-md-6">
<div class="form-group row">
<div class="custom-control custom-checkbox custom-control-inline">
<input name="dacpantauews_cairanin" value="2" type="checkbox" class="custom-control-input" id="dacpantauews_cairanin_2">
<label class="custom-control-label" for="dacpantauews_cairanin_2">Output</label>
</div>
</div>

<div class="row" id="dacpantauews_div_cairanin2" style="display: none;">
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Urine</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_outurine" onkeyup="dacpantauewsex.getScoreout();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Muntah</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_outmuntah" onkeyup="dacpantauewsex.getScoreout();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Draine</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_outdraine" onkeyup="dacpantauewsex.getScoreout();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Faeses</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_outfaeses" onkeyup="dacpantauewsex.getScoreout();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Darah</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_outdarah" onkeyup="dacpantauewsex.getScoreout();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Lain-Lain</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input type="number" onfocus="this.select();" class="form-control" id="dacpantauews_outlain" onkeyup="dacpantauewsex.getScoreout();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
<div class="col-md-12">
<div class="form-group row">
<div class="col-md-5">
<label class="col-form-label">Jumlah</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input disabled="disabled" type="number" onfocus="this.select();" class="form-control" id="dacpantauews_outtotal" onkeyup="dacpantauewsex.getScoreall();"> <span class="input-group-append"> <span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Jumlah Total</label>
</div>
<div class="col-md-6">
<div class="input-group">
<input disabled="disabled" type="number" onfocus="this.select();" class="form-control" id="dacpantauews_cairantotskor" onkeyup="dacpantauewsex.getScoreall();">
<span class="input-group-append ">
<span class="input-group-text">cc</span>
</span>
</div>
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Keterangan</label>
</div>
<div class="col-md-8">
<textarea rows="3" name="dacpantauews_cairanket" id="dacpantauews_cairanket" style="width:100%;" class="form-control"></textarea>
</div>
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">Mean Arterial Pressure (MAP)</label>
</div>
<div class="col-md-7">
<div class="input-group">
<input disabled="disabled" type="number" onfocus="this.select();" class="form-control" id="dacpantauews_map">
</div>
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">MONITOR EVALUASI</label>
</div>
<div class="col-md-7">
<select name="bevaluasi" id="dacpantauews_bevaluasi" class="form-control">
<option value="1">Minimal 6 jam sekali</option>
<option value="2">Minimal 4 jam sekali</option>
<option value="3">Minimal 1 jam sekali</option>
<option value="4">Pasang monitor</option>
</select>
</div>
</div>
<div class="form-group row">
<div class="col-md-3">
<label class="col-form-label">ASUHAN YANG DIBERIKAN</label>
</div>
<div class="col-md-9">
<textarea rows="6" name="dacpantauews_bintervensi" id="dacpantauews_bintervensi" style="width:100%;" class="form-control"></textarea>
</div>
</div>
</div>
</div>
</div>
<div class="card-footer">
	<button id="dacpantauews_btsave" type="button" class="btn btn-sm btn-primary"> Simpan</button>
<button id="dacpantauews_btreset" type="button" class="btn btn-sm btn-warning"> Reset</button>
<button id="dacpantauews_btdelete" type="button" class="btn btn-sm btn-danger" style="display:none;"> Hapus</button>
</div>
</div>