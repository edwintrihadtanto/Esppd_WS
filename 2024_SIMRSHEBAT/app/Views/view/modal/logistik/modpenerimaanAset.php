<div class="col-md-12 p-2" id="ModPemakaianLogistik_list1">
    <div class="row p-1">
        <div class="card-body p-1" style="max-height: 420px; overflow: auto;">
            <div class="card" style="box-shadow: 0 0 3px #343a40; margin-bottom: 0;">
                <div>
                    <div class="card-header p-1 darkgrey-custom">
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="hr6-custom" id="penerimaanAset_titleheader"><i class="fas fa-boxes"></i> </i> Tambah Aset</h6>
                                <div>
                                    <button type="button" class="btn bg-gradient-secondary btn-xs" type="submit" id='penerimaanAset_btn_tambah' onclick="bukamodpenerimaanAset(null)"> <i class="fas fa-user-plus"></i> Simpan</button>
                                    <button type="button" class="btn btn-outline-danger btn-xs" onclick="ModPenerimaanAset_kembalikeawal()"><i class="fa fa-arrow-left"></i> Kembali</button>
                                    <button type="button" class="btn btn-info btn-xs" onclick="ModPenerimaanAset_refresh()"><i class="fa fa-sync-alt fa-spin"></i> Refresh Data</button>
                                </div>
                            </div>
                        </div>
                        <!-- END LETAK BUTTON -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row p-1">
        <div class="col-md-6 col-sm-6 col-12 p-1">
            <div class="info-box mb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="90">No. Faktur</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_id_permintaan" hidden>
                            <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_nofaktur">
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Tgl. Pembelian</td>
                        <td>:</td>
                        <td>
                            <input type="date" class="form-control form-control-xs" id="ModPenerimaanAset_tglkirim">
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Tgl. Pemakaian</td>
                        <td>:</td>
                        <td>
                            <input type="date" class="form-control form-control-xs" id="ModPenerimaanAset_tglkirim">
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Tgl. Akhir Penyusutan</td>
                        <td>:</td>
                        <td>
                            <input type="date" class="form-control form-control-xs" id="ModPenerimaanAset_tglkirim">
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Perkiraan Umur</td>
                        <td>:</td>
                        <td>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-xs">Bulan</span>
                                </div>
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_bulan">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-xs">Tahun</span>
                                </div>
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_tahun">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Harga Beli</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_tglkirim">
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Harga Beli</td>
                        <td>:</td>
                        <td>
                            <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_tglkirim">
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-12 p-1">
            <div class="info-box mb-0">
                <table class="table table-striped table-sm" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td width="90">Aset Berwujud</td>
                        <td>:</td>
                        <td>
                            <div class="custom-control custom-checkbox ">
                                <input name="ModPenerimaanAset_asetberwujud" type="checkbox" class="custom-control-input" id="ModPenerimaanAset_asetberwujud">
                                <label class="custom-control-label" for="ModPenerimaanAset_asetberwujud"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Penghitungan Susut</td>
                        <td>:</td>
                        <td>
                            <div class="custom-control custom-checkbox ">
                                <input name="ModPenerimaanAset_penghitungsusut" type="checkbox" class="custom-control-input" id="ModPenerimaanAset_penghitungsusut">
                                <label class="custom-control-label" for="ModPenerimaanAset_penghitungsusut"></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Status</td>
                        <td>:</td>
                        <td>
                            <select class="form-control form-control-xs" id="ModPenerimaanAset_tglkirim">
                                <option value="0">--Pilih--</option>
                                <option value="1">Aktif</option>
                                <option value="2">Terjual</option>
                                <option value="3">Hilang</option>
                                <option value="4">Rusak</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Gudang Aset</td>
                        <td>:</td>
                        <td>
                            <select class="form-control form-control-xs" id="ModPenerimaanAset_gudangaset">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Supplier Aset</td>
                        <td>:</td>
                        <td>
                            <select class="form-control form-control-xs" id="ModPenerimaanAset_supplieraset">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Metode Penyusutan</td>
                        <td>:</td>
                        <td>
                            <select class="form-control form-control-xs" id="ModPenerimaanAset_tglkirim">
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Masa Manfaat</td>
                        <td>:</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_bulan">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-xs">Tahun</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Tarif Penyusutan</td>
                        <td>:</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_bulan">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-xs">%</span>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">COA Fixed Asset</td>
                        <td>:</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_coafixed_kode" hidden>
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_coafixed" disabled>
                                <button type="button" class="btn btn-danger btn-xs" onclick="kosongInput_Paset(1)"><i class="fa fa-times"></i></button>
                                <button type="button" class="btn btn-info btn-xs" onclick="DaftarListAccount_Paset(1)"><i class="fa fa-search"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">COA Akumulasi</td>
                        <td>:</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_coaakumulasi_kode" hidden>
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_coaakumulasi" disabled>
                                <button type="button" class="btn btn-danger btn-xs" onclick="kosongInput_Paset(2)"><i class="fa fa-times"></i></button>
                                <button type="button" class="btn btn-info btn-xs" onclick="DaftarListAccount_Paset(2)"><i class="fa fa-search"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">COA Beban Penyusutan</td>
                        <td>:</td>
                        <td>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_coabebanpen_kode" hidden>
                                <input type="text" class="form-control form-control-xs" id="ModPenerimaanAset_coabebanpen" disabled>
                                <button type="button" class="btn btn-danger btn-xs" onclick="kosongInput_Paset(3)"><i class="fa fa-times"></i></button>
                                <button type="button" class="btn btn-info btn-xs" onclick="DaftarListAccount_Paset(3)"><i class="fa fa-search"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td width="90">Keterangan</td>
                        <td>:</td>
                        <td>
                            <textarea class="form-control form-control-sm" id="ModPermintaanLogistik_ket" name="ModPermintaanLogistik_ket" style="height:50px;"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="mod_ListAccountpenerimaanAset_content"></div>


<script>
    $('.modpenerimaanAset_content').show();
    getGudangUnit()
    getSupllierLogistik()

    function getGudangUnit() {
        apiPOST('Logistik/getGudangUnit', null, hasil => {
            var data = '';
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                data += '<option value="' + a[i]['id_gudang_unit'] + '">' + a[i]['nama_gudang'] + '</option>';
            }
            document.getElementById('ModPenerimaanAset_gudangaset').innerHTML = data;
        });
    }

    function getSupllierLogistik() {
        apiPOST('Logistik/getSupllierLogistik', null, hasil => {
            var data = '';
            var a = hasil['data'];
            for (var i = 0; i < a.length; i++) {
                data += '<option value="' + a[i]['id_supplier_logistik'] + '">' + a[i]['nama_supplier'] + '</option>';
            }
            document.getElementById('ModPenerimaanAset_supplieraset').innerHTML = data;
        });
    }

    function ModPenerimaanAset_kembalikeawal() {
        $('.modpenerimaanAset_content').hide();
        $('#penerimaanAset_listaset1').show();
        $('#penerimaanAset_listaset2').show();
    }

    function ListAccountpenerimaanAset_pilih(flag, id_coa, coa) {
        keluarmodpenerimaanAsetListAccount_Account()
        if (flag == 1) {
            document.getElementById("ModPenerimaanAset_coafixed_kode").value = id_coa;
            document.getElementById("ModPenerimaanAset_coafixed").value = coa;
        }
        if (flag == 2) {
            document.getElementById("ModPenerimaanAset_coaakumulasi_kode").value = id_coa;
            document.getElementById("ModPenerimaanAset_coaakumulasi").value = coa;
        }
        if (flag == 3) {
            document.getElementById("ModPenerimaanAset_coabebanpen_kode").value = id_coa;
            document.getElementById("ModPenerimaanAset_coabebanpen").value = coa;
        }
    }

    function kosongInput_Paset(flag) {
        if (flag == 1) {
            document.getElementById("ModPenerimaanAset_coafixed_kode").value = '';
            document.getElementById("ModPenerimaanAset_coafixed").value = '';
        }
        if (flag == 2) {
            document.getElementById("ModPenerimaanAset_coaakumulasi_kode").value = '';
            document.getElementById("ModPenerimaanAset_coaakumulasi").value = '';
        }
        if (flag == 3) {
            document.getElementById("ModPenerimaanAset_coabebanpen_kode").value = '';
            document.getElementById("ModPenerimaanAset_coabebanpen").value = '';
        }
    }

    function DaftarListAccount_Paset(flag) {
        var data = {
            flag: flag
        }
        var datax = JSON.stringify(data);
        $('.mod_ListAccountpenerimaanAset_content').load('Aset/modpenerimaanAsetListAccount?data=' + datax);
    }
</script>