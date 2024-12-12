var alamatAPI = 'API/';
var durasiCache = 1800000;
var user = null;
var baseURLWPaint = '';

async function apiPOST(target, param, fungsi, listObjek){
    if(localStorage['timeout'] < Date.now()){
        localStorage['timeout'] = null;
        localStorage['data_user'] = null;
        location.reload();
        return;
    }
    
    var cek = (listObjek === undefined);
    if(cek === false){
        cek = cekInput(listObjek);
    }
    
    if(cek){
        var data = '';
        if(param !== null){
            data = JSON.stringify(param);
        }
        $.ajax({
            type: "POST",
            url: alamatAPI + target,
            data: data,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(hasil){
                if(hasil['status'] === "sukses"){
                    localStorage['timeout'] = Date.now()+durasiCache;
                    if(hasil['pesan'] > ''){
                        toastr.success(hasil['pesan']);
                    }
                    fungsi(hasil);                    
                }else if(hasil['status'] === "logout"){
                    localStorage['timeout'] = null;
                    localStorage['data_user'] = null;
                    location.reload();
                }else{
                    localStorage['timeout'] = Date.now()+durasiCache;
                    Swal.fire({
                         position: 'center',
                         icon: 'warning',
                         title: "&nbsp;"+hasil['pesan'],
                         showCloseButton: true
                    });
                    fungsi(null);  
                }
            },
            error: function(errMsg) {
                Swal.fire({
                     position: 'center',
                     icon: 'warning',
                     title: "&nbsp;Error Hubungi..<br>Tim IT SIMRSHEBAT !!!",    
                     showCloseButton: true
                });
                console.log(JSON.stringify(errMsg));
                fungsi(null);
            }
        });
    }    
}

function newTabPOST(alamat, param){
    
  var f = document.createElement("form");
  f.setAttribute("method", "post");
  f.setAttribute("action", alamat);
  f.setAttribute("target", "tempform");
  Object.entries(param).forEach(entry => {
    const [key, value] = entry;
    var input = document.createElement("input");
    input.setAttribute("type", "text");
    input.setAttribute("name", key);
    input.value = value;    
    f.appendChild(input);
  });
  document.body.appendChild(f);
  window.open('', "tempform");
  f.submit();
  f.remove();
}

function hitungUmur(tgl_lahir, umur){
    lahir = document.getElementById(tgl_lahir).value.split("-");
    sekarang = new Date();
    var d1 = lahir[2];
    var m1 = lahir[1];
    var y1 = lahir[0];
    var d2 = sekarang.getDate();
    var m2 = 1 + sekarang.getMonth();
    var y2 = sekarang.getFullYear();
    var month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if(d1 > d2){
        d2 = d2 + month[m2 - 1];
        m2 = m2 - 1;
    }
    if(m1 > m2){
        m2 = m2 + 12;
        y2 = y2 - 1;
    }
    var d = d2 - d1;
    var m = m2 - m1;
    var y = y2 - y1;
    document.getElementById(umur).value = y+' tahun, '+m+' bulan, '+d+' hari';
}

function optionChildByParent(data, parent, target, kolom){
    var opsi = document.getElementById(target);
    var param = document.getElementById(parent).value;
    opsi.innerHTML = '';
    var defaultValue = '';
    data.forEach( child => {
        if(child[kolom[0]] == param){
            var option = document.createElement('option');
            option.value = child[kolom[1]];
            option.innerHTML = child[kolom[2]];
            opsi.appendChild(option);
            if(defaultValue == ''){
                defaultValue = child[kolom[1]];
            }
        }
    });
    opsi.value = defaultValue;
}

function optionParentByChild(kdChild, tabelData, elementOpsi, kolom){
    var kdParent = '';
    var opsi = document.getElementById(elementOpsi);
    opsi.innerHTML = '';
    tabelData.forEach(child => {
        if(child[kolom[1]] == kdChild){
            kdParent = child[kolom[0]];
        }
    });

    tabelData.forEach( child => {
        if(child[kolom[0]] == kdParent){
            var option = document.createElement('option');
            option.value = child[kolom[1]];
            option.innerHTML = child[kolom[2]];
            opsi.appendChild(option);
        }
    });

    opsi.value = kdChild;
    return kdParent;
}

function cekInput(listInput){
    var hilang = null;
    listInput.every(input =>{
        var objek = document.getElementById(input);
        if(objek !== null){
            if(objek.value === null || objek.value === ''){
                hilang = objek;
                return false;
            }
        }
        return true;
    });
    
    if(hilang === null){
        return true;
    }else{
        // Swal.fire({
        //      position: 'center',
        //      icon: 'warning',
        //      title: "&nbsp;Field belum diisi !!!",    
        //      showCloseButton: true
        // });
        introJs().setOptions({            
            steps:[              
              {
                element: hilang,
                title: "<h5 style='color:white;'>Field Belum Di isi!!</h5>",
                position: "top"
              }
            ],    
            //tooltipClass        : 'customTooltip',
            showProgress        : false,
            showBullets         : false,
            showButtons         : false,            
            disableInteraction  : false,
            dontShowAgain       : false,
            exitOnOverlayClick  : true,
            overlayOpacity      : 0,
        }).onchange(function() {        
            hilang.focus();            
        }).oncomplete(() => {    

        }).start();

        $(hilang).keyup(function() {
            introJs().exit();  
        });

        return false;
    }
}

function WPaintX(id){
    var masterElement   = document.getElementById(id);
    var imgElement      = document.createElement('img');
    masterElement.appendChild(imgElement);
    var paintElement    = document.createElement('div');
    paintElement.setAttribute('id', id+'-paint');
    paintElement.style.display  = 'none';
    paintElement.style.width    = '400px';
    paintElement.style.height   = '400px';
    masterElement.appendChild(paintElement);
    imgElement.src              = '';
    imgElement.onload = function() {
        paintElement.style.width = this.width+'px';
        paintElement.style.height = this.height+'px';
        $('#'+paintElement.id).wPaint('resize');
    };
    
    $('#'+paintElement.id).wPaint({
        path: baseURLWPaint,
        menuOffsetLeft: -35,
        menuHandle: false,
        saveImg: saveImg
    });
    
    function saveImg(image) {
        imgElement.src = image;
        paintElement.style.display = 'none';
        imgElement.style.display = 'block';
    }
    
    this.show = () => {
        $('#'+paintElement.id).wPaint('clear');
        $('#'+paintElement.id).wPaint('bg', imgElement.src);
        imgElement.style.display = 'none';
        paintElement.style.display = 'block';
    };
    
    this.hideEditor = () => {
        imgElement.style.display = 'block';
        paintElement.style.display = 'none';
    };
    
    this.getData = () => {
        var data=$('#'+paintElement.id).wPaint('image');
        saveImg(data);
        return imgElement.src;
    };
    
    this.setSRC = (url_gambar) => {
        $('#'+paintElement.id).wPaint('clear');
        imgElement.src = url_gambar;
    };
}

function Paint(id){
    var masterElement = document.getElementById(id);
    var imgElement = document.createElement('img');
    masterElement.appendChild(imgElement);
    var paintElement = document.createElement('div');
    paintElement.setAttribute('id', id+'-paint');
    masterElement.appendChild(paintElement);
    imgElement.src = '';
    
    this.show = () => {
        var varPaint = Painterro({
            id: id+'-paint',
            defaultTool: 'brush',
            onBeforeClose: function(hasUnsavedChaged, done){
                varPaint.save();
                done(true);
            },
            saveHandler: function (image, done) {
               imgElement.src = image.asDataURL();
               done(true);
            },
            colorScheme: {
                inputBorderColor: '#000000'
            },
            hiddenTools: ['select', 'settings', 'pixelize', 'crop', 'line', 'arrow', 'rect', 'ellipse', 'rotate', 'resize',  'save', 'open', 'zoomin', 'zoomout', 'bucket']
        });
        
        if(imgElement.src == ''){
            varPaint.show();
        }else if(imgElement.src.includes("base64")){
            varPaint.loadImage(imgElement.src, 'image/png');
            varPaint.show(false);
        }else{
            varPaint.show(imgElement.src);
        }
        
    };
    
    this.getData = () => {
        return imgElement.src;
    };
    this.setSRC = (url_gambar) => {
        imgElement.src = url_gambar;
        
    };
    
    this.setGambar = (url_gambar) => {
        varPaint = Painterro({
            id: id+'-paint',
            defaultTool: 'brush',
            onBeforeClose: function(hasUnsavedChaged, done){
                varPaint.save();
                done(true);
            },
            saveHandler: function (image, done) {
               imgElement.src = image.asDataURL();
               done(true);
            },
            colorScheme: {
                inputBorderColor: '#000000'
            },
            hiddenTools: ['select', 'settings', 'pixelize', 'crop', 'line', 'arrow', 'rect', 'ellipse', 'rotate', 'resize',  'save', 'open', 'zoomin', 'zoomout', 'bucket']
        });
        varPaint.show(url_gambar);
    };
}

function DrawingPaint(id, opsi){
    var elementDIV = document.getElementById(id);
    var canvas = document.createElement('canvas');
    canvas.height =  opsi === undefined || opsi['height'] === undefined ? 500 : opsi['height'];
    canvas.width = opsi === undefined || opsi['width'] === undefined ? 500 : opsi['width'];
    canvas.style.borderStyle = 'solid';
    canvas.setAttribute('id', id+'-canvas');
    elementDIV.appendChild(canvas);
    
    var toolbar = document.createElement('div');
    toolbar.classList.add('input-group');
    toolbar.classList.add('p-2');
    var clearButton = document.createElement('button');
    clearButton.classList.add('btn');
    clearButton.classList.add('btn-outline-secondary');
    clearButton.innerHTML = 'Reset';
    toolbar.appendChild(clearButton);
    var undoButton = document.createElement('button');
    undoButton.classList.add('btn');
    undoButton.classList.add('btn-outline-secondary');
    undoButton.innerHTML = 'Undo';
    toolbar.appendChild(undoButton);
    var redoButton = document.createElement('button');
    redoButton.classList.add('btn');
    redoButton.classList.add('btn-outline-secondary');
    redoButton.innerHTML = 'Redo';
    toolbar.appendChild(redoButton);
    var colorPicker = document.createElement('input');
    colorPicker.classList.add('form-control');
    colorPicker.setAttribute('type', 'color');
    toolbar.appendChild(colorPicker);
    elementDIV.appendChild(toolbar);
    
    var ctx = canvas.getContext('2d');
    ctx.fillStyle = "white";
    ctx.fillRect(0, 0, canvas.width, canvas.height);
    ctx.strokeStyle = "black";
    ctx.lineWidth = 3;
    ctx.lineJoin = ctx.lineCap = 'round';
    let writingMode = false;
    var arrayStep = new Array();
    var step = -1;
    
    canvas.addEventListener('pointerdown', handlePointerDown);
    canvas.addEventListener('pointermove', handlePointerMove);
    canvas.addEventListener('pointerout', handlePointerOut);
    canvas.addEventListener('pointerenter', handlePointerEnter);
    
    function handlePointerDown(event) {   
        writingMode = true;
        ctx.beginPath();
        ctx.moveTo(event.offsetX, event.offsetY);
    };
    
    function handlePointerEnter(event) {  
        if (event.pressure != 0){
            writingMode = true;
            ctx.beginPath();
            ctx.moveTo(event.offsetX, event.offsetY);
        }
    };
    
    function handlePointerOut(event) { 
        if(writingMode){
            ctx.lineTo(event.offsetX, event.offsetY);
            ctx.stroke();
            writingMode = false;
        }
    }
    
    function handlePointerMove(event) {    
        if (event.pressure == 0){
            writingMode = false;
        }else{
            ctx.lineTo(event.offsetX, event.offsetY);
            ctx.stroke();
            addStep();
        }
    }
    
    function getCursorPosition (event){
        positionX = event.clientX - event.target.getBoundingClientRect().x;
        positionY = event.clientY - event.target.getBoundingClientRect().y;
        return [positionX, positionY];
    }
    
    function clearPad() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }
    
    function addStep() {
        step++;
        if (step < arrayStep.length) { arrayStep.length = step; }
        arrayStep.push(canvas.toDataURL());
    }
    
    function redo(){
        if (step < arrayStep.length-1) {
            step++;
            var canvasPic = new Image();
            canvasPic.src = arrayStep[step];
            canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); };
        }
    }
    
    function undo(){
        if (step > 0) {
            step--;
            var canvasPic = new Image();
            canvasPic.src = arrayStep[step];
            canvasPic.onload = function () { ctx.drawImage(canvasPic, 0, 0); };
        }
    }
    
    clearButton.addEventListener('click', (event) => {
        event.preventDefault();
        this.setPolosBG();
    });
    
    undoButton.addEventListener('click', (event) => {
        undo();
    });
    
    redoButton.addEventListener('click', (event) => {
        redo();
    });
    
    colorPicker.addEventListener('change', (event) => {
        ctx.strokeStyle = colorPicker.value;
    });
    
    this.getBase64 = ()=>{
        return canvas.toDataURL("image/jpeg").split(';base64,')[1];
    };
    
    this.setGambarBG = (url)=>{
        clearPad();
        var background = new Image();
        background.crossOrigin="anonymous";
        background.src = url;

        background.onload = function(){
            ctx.drawImage(background, 0, 0, background.width, background.height, 0, 0, canvas.width, canvas.height);   
        };
    };
    
    this.setPolosBG = (warna = 'white')=>{
        clearPad();
        ctx.fillStyle = warna;
        ctx.fillRect(0, 0, canvas.width, canvas.height);
    };
}


function AutoComplete(id, zIndex = 20000){
    var element = document.getElementById(id);
    var data = [];
    var listSuggest = [];
    var max = 10;
    var selectedSuggest = -1;
    var notHover = true;
    var value = null;
    var lastContent = '';
    var width = '0px';
    element.addEventListener('keyup', keyUp);
    element.addEventListener('keydown', keyDown);
    element.addEventListener('focusout', cekFocus);
    function onPilihFunc(){}
    
    function keyDown(event){
        if(event.key == 'ArrowUp' || event.key == 'ArrowDown'){
            event.preventDefault();
        }
    }
    
    function keyUp(event){
        if(event.key == 'Enter'){
            event.preventDefault();
            pilih(listSuggest[selectedSuggest]);
        }else if(event.key == 'ArrowUp'){
            if(selectedSuggest > -1){
                var jumlahSuggest =listSuggest.length;
                unSelect(document.getElementById(id+'-hint'+'-'+selectedSuggest));
                selectedSuggest = (jumlahSuggest + selectedSuggest - 1) % jumlahSuggest;
                select(document.getElementById(id+'-hint'+'-'+selectedSuggest));
            }
        }else if(event.key == 'ArrowDown'){
            if(selectedSuggest > -1){
                var jumlahSuggest =listSuggest.length;
                unSelect(document.getElementById(id+'-hint'+'-'+selectedSuggest));
                selectedSuggest = (jumlahSuggest + selectedSuggest + 1) % jumlahSuggest;
                select(document.getElementById(id+'-hint'+'-'+selectedSuggest));
            }
        }else if(event.key.length == 1 || event.key == 'Backspace' || event.key == 'Delete'){
            removeHint();
            var kunci = element.value.toUpperCase();
            if(kunci != lastContent){
                value = null;
            }
            notHover = true;
            var kotak = element.getBoundingClientRect();
            const viewHeight = document.documentElement.clientHeight;
            var hint = document.createElement('div');
            width = kotak.width+'px';
            hint.setAttribute('id', id+'-hint');
            hint.style.position = 'fixed';
            hint.style.top = kotak.bottom+'px';
            hint.style.left = kotak.left+'px';
            hint.style.zIndex = zIndex;
            hint.style.background  = 'white';
            hint.style.fontSize  = '13px';
            hint.style.overflowY = 'scroll';
            hint.style.maxHeight = '250px';
            
            listSuggest = [];
            if(kunci != '' && data.length > 0){
                data.forEach(opsi => {
                    if(opsi.label.toUpperCase().includes(kunci)){
                        if(listSuggest.length < max){
                            listSuggest.push(opsi);
                        }
                    }
                });
                
                if(listSuggest.length > 0){
                    selectedSuggest = 0;
                    for(var i=0; i<listSuggest.length; i++){
                        var opsi = listSuggest[i];
                        var button = document.createElement('button');
                        button.setAttribute('id', id+'-hint'+'-'+i);
                        button.innerHTML = opsi.label;
                        button.value = i;
                        button.onclick = (e)=>{
                            pilih(listSuggest[e.srcElement.value]);
                        };
                        button.onmouseenter = ()=>{
                            notHover = false;
                        };
                        button.onmouseleave = ()=>{
                            notHover = true;
                        };
                        if(i == 0){
                            select(button);
                        }else{
                            var br = document.createElement('br');
                            hint.appendChild(br);
                            unSelect(button);
                        }                        
                        hint.appendChild(button);
                    }
                    
                    document.body.appendChild(hint);
                    if(kotak.y > (viewHeight * 0.6)){
                        var hintSize = hint.getBoundingClientRect();
                        hint.style.top = (kotak.top - hintSize.height + window.pageYOffset)+'px';
                    }
                }else{
                    selectedSuggest = -1;
                }
            }
        }
    }
    
    function pilih(terpilih){
        notHover = true;
        value = terpilih.value;
        element.value = terpilih.label;
        lastContent = terpilih.label;
        removeHint();
        onPilihFunc();
    }
    
    function removeHint(){
        var hint = document.getElementById(id+'-hint');
        if(hint != null){
            hint.remove();
        }
    }
    
    function cekFocus(){
        if(notHover){
            removeHint();
        }
    }
    
    function select(target){
        target.style.background = 'green';
        target.style.color = 'white';
        target.style.width = width;
        target.style.border = 'none';
        target.style.textAlign = 'left';
    }
    
    function unSelect(target){
        target.style.background = 'white';
        target.style.color = 'black';
        target.style.width = width;
        target.style.border = 'none';
        target.style.textAlign = 'left';
        target.style.borderBottom = '2px solid black';
    }
    
    this.getValue = ()=>{
        return value;
    };
    
    this.setValue = (kata)=>{
        value = null;
        element.value = '';
        data.forEach((opsi)=>{
            if(opsi.label.toUpperCase() == kata.toUpperCase()){
                value = opsi.value;
                element.value = kata;
            }
        });
    };

    this.reset = ()=>{
        notHover = true;
        value = null;
        element.value = '';
        lastContent = '';
        focus = true;
    };
    
    this.addData = (value, label)=>{
        var indek = data.length;
        data.push({
            value: value,
            label: label
        });
    };
    
    this.onPilih = (fungsiBaru) => {
        onPilihFunc = fungsiBaru;
    };
    
    this.resetData = ()=>{
        data = [];
    };
}

function AutoCompleteObat(id, zIndex = 20000){
    var element = document.getElementById(id);
    var data = [];
    var listSuggest = [];
    var max = 50;
    var selectedSuggest = -1;
    var notHover = true;
    var value = null;
    var lastContent = '';
    var width = '0px';
    element.addEventListener('keyup', keyUp);
    element.addEventListener('keydown', keyDown);
    element.addEventListener('focusout', cekFocus);
    function onPilihFunc(){}
    
    function keyDown(event){
        if(event.key == 'ArrowUp' || event.key == 'ArrowDown'){
            event.preventDefault();
        }
    }
    
    function keyUp(event){
        if(event.key == 'Enter'){
            event.preventDefault();
            pilih(listSuggest[selectedSuggest]);
        }else if(event.key == 'ArrowUp'){
            if(selectedSuggest > -1){
                var jumlahSuggest =listSuggest.length;
                unSelect(document.getElementById(id+'-hint'+'-'+selectedSuggest));
                selectedSuggest = (jumlahSuggest + selectedSuggest - 1) % jumlahSuggest;
                select(document.getElementById(id+'-hint'+'-'+selectedSuggest));
            }
        }else if(event.key == 'ArrowDown'){
            if(selectedSuggest > -1){
                var jumlahSuggest =listSuggest.length;
                unSelect(document.getElementById(id+'-hint'+'-'+selectedSuggest));
                selectedSuggest = (jumlahSuggest + selectedSuggest + 1) % jumlahSuggest;
                select(document.getElementById(id+'-hint'+'-'+selectedSuggest));
            }
        }else if(event.key.length == 1 || event.key == 'Backspace' || event.key == 'Delete'){
            removeHint();
            var kunci = element.value.toUpperCase();
            if(kunci != lastContent){
                value = null;
            }
            notHover = true;
            var kotak = element.getBoundingClientRect();
            const viewHeight = document.documentElement.clientHeight;
            var hint = document.createElement('div');
            width = kotak.width+'px';
            hint.setAttribute('id', id+'-hint');
            hint.style.position = 'fixed';
            hint.style.top = kotak.bottom+'px';
            hint.style.left = kotak.left+'px';
            hint.style.zIndex = zIndex;
            hint.style.background  = 'white';
            hint.style.fontSize  = '13px';
            hint.style.overflowY = 'scroll';
            hint.style.maxHeight = '250px';
            
            listSuggest = [];
            if(kunci != '' && data.length > 0){
                data.forEach(opsi => {
                    if(opsi.label.toUpperCase().includes(kunci)){
                        if(listSuggest.length < max){
                            listSuggest.push(opsi);
                        }
                    }
                });
                
                if(listSuggest.length > 0){
                    selectedSuggest = 0;
                    for(var i=0; i<listSuggest.length; i++){
                        var opsi = listSuggest[i];
                        var button = document.createElement('button');
                        button.setAttribute('id', id+'-hint'+'-'+i);
                        button.innerHTML = opsi.label;
                        button.value = i;
                        button.onclick = (e)=>{
                            pilih(listSuggest[e.srcElement.value]);
                        };
                        button.onmouseenter = ()=>{
                            notHover = false;
                        };
                        button.onmouseleave = ()=>{
                            notHover = true;
                        };
                        if(i == 0){
                            select(button);
                        }else{
                            var br = document.createElement('br');
                            hint.appendChild(br);
                            unSelect(button);
                        }                        
                        hint.appendChild(button);
                    }
                    
                    document.body.appendChild(hint);
                    if(kotak.y > (viewHeight * 0.6)){
                        var hintSize = hint.getBoundingClientRect();
                        hint.style.top = (kotak.top - hintSize.height + window.pageYOffset)+'px';
                    }
                }else{
                    selectedSuggest = -1;
                }
            }
        }
    }
    
    function pilih(terpilih){
        notHover = true;
        value = terpilih.value;
        element.value = terpilih.label;
        lastContent = terpilih.label;
        removeHint();
        onPilihFunc();
    }
    
    function removeHint(){
        var hint = document.getElementById(id+'-hint');
        if(hint != null){
            hint.remove();
        }
    }
    
    function cekFocus(){
        if(notHover){
            removeHint();
        }
    }
    
    function select(target){
        target.style.background = 'green';
        target.style.color = 'white';
        target.style.width = width;
        target.style.border = 'none';
        target.style.textAlign = 'left';
    }
    
    function unSelect(target){
        target.style.background = 'white';
        target.style.color = 'black';
        target.style.width = width;
        target.style.border = 'none';
        target.style.textAlign = 'left';
        target.style.borderBottom = '2px solid black';
    }
    
    this.getValue = ()=>{
        return value;
    };
    
    this.setValue = (kata)=>{
        value = null;
        element.value = '';
        data.forEach((opsi)=>{
            if(opsi.label.toUpperCase() == kata.toUpperCase()){
                value = opsi.value;
                element.value = kata;
            }
        });
    };

    this.reset = ()=>{
        notHover = true;
        value = null;
        element.value = '';
        lastContent = '';
        focus = true;
    };
    
    this.addData = (value, label)=>{
        var indek = data.length;
        data.push({
            value: value,
            label: label
        });
    };
    
    this.onPilih = (fungsiBaru) => {
        onPilihFunc = fungsiBaru;
    };
    
    this.resetData = ()=>{
        data = [];
    };
}

function SHA1(msg) {
 function rotate_left(n,s) {
 var t4 = ( n<<s ) | (n>>>(32-s));
 return t4;
 };
 function lsb_hex(val) {
 var str='';
 var i;
 var vh;
 var vl;
 for( i=0; i<=6; i+=2 ) {
 vh = (val>>>(i*4+4))&0x0f;
 vl = (val>>>(i*4))&0x0f;
 str += vh.toString(16) + vl.toString(16);
 }
 return str;
 };
 function cvt_hex(val) {
 var str='';
 var i;
 var v;
 for( i=7; i>=0; i-- ) {
 v = (val>>>(i*4))&0x0f;
 str += v.toString(16);
 }
 return str;
 };
 function Utf8Encode(string) {
 string = string.replace(/\r\n/g,'\n');
 var utftext = '';
 for (var n = 0; n < string.length; n++) {
 var c = string.charCodeAt(n);
 if (c < 128) {
 utftext += String.fromCharCode(c);
 }
 else if((c > 127) && (c < 2048)) {
 utftext += String.fromCharCode((c >> 6) | 192);
 utftext += String.fromCharCode((c & 63) | 128);
 }
 else {
 utftext += String.fromCharCode((c >> 12) | 224);
 utftext += String.fromCharCode(((c >> 6) & 63) | 128);
 utftext += String.fromCharCode((c & 63) | 128);
 }
 }
 return utftext;
 };
 var blockstart;
 var i, j;
 var W = new Array(80);
 var H0 = 0x67452301;
 var H1 = 0xEFCDAB89;
 var H2 = 0x98BADCFE;
 var H3 = 0x10325476;
 var H4 = 0xC3D2E1F0;
 var A, B, C, D, E;
 var temp;
 msg = Utf8Encode(msg);
 var msg_len = msg.length;
 var word_array = new Array();
 for( i=0; i<msg_len-3; i+=4 ) {
 j = msg.charCodeAt(i)<<24 | msg.charCodeAt(i+1)<<16 |
 msg.charCodeAt(i+2)<<8 | msg.charCodeAt(i+3);
 word_array.push( j );
 }
 switch( msg_len % 4 ) {
 case 0:
 i = 0x080000000;
 break;
 case 1:
 i = msg.charCodeAt(msg_len-1)<<24 | 0x0800000;
 break;
 case 2:
 i = msg.charCodeAt(msg_len-2)<<24 | msg.charCodeAt(msg_len-1)<<16 | 0x08000;
 break;
 case 3:
 i = msg.charCodeAt(msg_len-3)<<24 | msg.charCodeAt(msg_len-2)<<16 | msg.charCodeAt(msg_len-1)<<8 | 0x80;
 break;
 }
 word_array.push( i );
 while( (word_array.length % 16) !== 14 ) word_array.push( 0 );
 word_array.push( msg_len>>>29 );
 word_array.push( (msg_len<<3)&0x0ffffffff );
 for ( blockstart=0; blockstart<word_array.length; blockstart+=16 ) {
 for( i=0; i<16; i++ ) W[i] = word_array[blockstart+i];
 for( i=16; i<=79; i++ ) W[i] = rotate_left(W[i-3] ^ W[i-8] ^ W[i-14] ^ W[i-16], 1);
 A = H0;
 B = H1;
 C = H2;
 D = H3;
 E = H4;
 for( i= 0; i<=19; i++ ) {
 temp = (rotate_left(A,5) + ((B&C) | (~B&D)) + E + W[i] + 0x5A827999) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 for( i=20; i<=39; i++ ) {
 temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0x6ED9EBA1) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 for( i=40; i<=59; i++ ) {
 temp = (rotate_left(A,5) + ((B&C) | (B&D) | (C&D)) + E + W[i] + 0x8F1BBCDC) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 for( i=60; i<=79; i++ ) {
 temp = (rotate_left(A,5) + (B ^ C ^ D) + E + W[i] + 0xCA62C1D6) & 0x0ffffffff;
 E = D;
 D = C;
 C = rotate_left(B,30);
 B = A;
 A = temp;
 }
 H0 = (H0 + A) & 0x0ffffffff;
 H1 = (H1 + B) & 0x0ffffffff;
 H2 = (H2 + C) & 0x0ffffffff;
 H3 = (H3 + D) & 0x0ffffffff;
 H4 = (H4 + E) & 0x0ffffffff;
 }
 var temp = cvt_hex(H0) + cvt_hex(H1) + cvt_hex(H2) + cvt_hex(H3) + cvt_hex(H4);

 return temp.toUpperCase();
}

function normOtomatis(target){
  var normx = target;
  var norm;
  if (normx != ''){
    if(normx.length == 6){
      norm = normx.substr(0,1)+''+normx.substr(1,2)+''+normx.substr(3,2)+''+normx.substr(-1);
    }else if(normx.length == 5){
      norm = '0'+normx.substr(0,2)+''+normx.substr(2,2)+''+normx.substr(-1);
    }else if(normx.length == 4){
      norm = '00'+normx.substr(0,1)+''+normx.substr(1,2)+''+normx.substr(-1);
    }else if(normx.length == 3){
      norm = '000'+normx.substr(0,2)+''+normx.substr(-1);
    }else if(normx.length == 2){
      norm = '0000'+normx.substr(0,1)+''+normx.substr(-1);
    }else if(normx.length == 1){
      norm = '00000'+normx.substr(-1);
    // }else if(norm.length == 1){
    //   normx = '0-00-00-0'+norm.substr(-1);
    }else{
      norm = normx;
    }
    return norm;
  }else{
    norm = '';
    return norm;
  }
}

function max_date(target){
  var date           = new Date();
  var day            = date.getDate();
  var month          = date.getMonth() + 1;
  var year           = date.getFullYear();
  if(day < 10){
    day  = '0' + day;
  }
  if(month < 10){
    month = '0' + month;
  }
  var minDate = year +'-'+month+'-'+day;
  document.getElementById(target).setAttribute("max", minDate);
  
}

function format_ribuan(bilangan) 
{
    if (!bilangan) {
        return 0;
    }
    
    bilangan = bilangan.toString().replace(/[^-\d]/g, '');
    
    if (bilangan == '-')
        return 0;
    
    bilangan = parseFloat( bilangan );

    let minus = bilangan.toString().substr(0,1) == '-' ? '-' : '';
    
    var reverse = bilangan.toString().split('').reverse().join(''),
        ribuan  = reverse.match(/\d{1,3}/g);
        ribuan  = ribuan.join('.').split('').reverse().join('');
    
    return minus + ribuan;
}

function onlyUnique(value, index, self) {
  return self.indexOf(value) === index;
}

function groupBy(objectArray, property) {
  return objectArray.reduce((acc, obj) => {
    const key = obj[property];
    const curGroup = acc[key] ?? [];

    return { ...acc, [key]: [...curGroup, obj] };
  }, {});
}

function Umur(tgl_lahir){
    lahir = tgl_lahir.split("-");
    sekarang = new Date();
    var d1 = lahir[2];
    var m1 = lahir[1];
    var y1 = lahir[0];
    var d2 = sekarang.getDate();
    var m2 = 1 + sekarang.getMonth();
    var y2 = sekarang.getFullYear();
    var month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
    if(d1 > d2){
        d2 = d2 + month[m2 - 1];
        m2 = m2 - 1;
    }
    if(m1 > m2){
        m2 = m2 + 12;
        y2 = y2 - 1;
    }
    var d = d2 - d1;
    var m = m2 - m1;
    var y = y2 - y1;
    var result = y+' tahun, '+m+' bulan, '+d+' hari';
    return result;
}
function setInt (number) {
    if (!number)
        return 0;
    
    number = parseFloat( number.toString().replace(/[^-\d]/g, '') );
    if (!number)
        return 0;
    return number;
}

function numberformat(data){

    if (!data)
        return 0;
    //var  bilangan = data;
    //datax = '714.3875';
    var number_string = data.toString(),
        split   = number_string.split('.'),
        sisa    = split[0].length % 3,
        rupiah  = split[0].substr(0, sisa),
        ribuan  = split[0].substr(sisa).match(/\d{1,3}/gi);
       //console.log(sisa);     
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + '.' + split[1] : rupiah;
    //console.log(rupiah);
    return rupiah;

}

function formatMoney(number, decimalCount = 2, decimal = ",", ribuan = ".") {
    try {
        decimalCount = Math.abs(decimalCount);
        decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

        const negativeSign = number < 0 ? "-" : "";

        let i = parseInt(number = Math.abs(Number(number) || 0).toFixed(decimalCount)).toString();
        let j = (i.length > 3) ? i.length % 3 : 0;

        return negativeSign +
            (j ? i.substr(0, j) + ribuan : '') +
            i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + ribuan) +
            (decimalCount ? decimal + Math.abs(number - i).toFixed(decimalCount).slice(2) : "");
    } catch (e) {
        console.log(e)
    }
};

function aptpembulatan(total){
    var hasil;
    var angkasplit;
    var angkasubstr;
    var pembulatan=100;
    var hasilfinal=0;
    
    
    if(total == 0 || total == '' || total == undefined){
        return hasilfinal;
    } else{
        angkasplit = total.toString().split(".");//buang angka dibelakang koma 
        angkasubstr= angkasplit[0].toString().substr(-2); //get 2 angka dari belakang setelah di buang koma
        
        if(angkasubstr == '00'){
            hasil=0;
        } else{
            hasil = pembulatan-parseInt(angkasubstr);
        }
        
        hasilfinal = hasil + parseInt(angkasplit[0]);
        console.log(hasilfinal);
        return toFormat(hasilfinal);
        
        console.log(angkasplit[0]);
        console.log(angkasubstr);
        console.log(hasil);
        console.log(hasilfinal);
    }
    
}

function aptpembulatannotitik(total){
    var hasil;
    var angkasplit;
    var angkasubstr;
    var pembulatan=100;
    var hasilfinal=0;
    
    
    if(total == 0 || total == '' || total == undefined){
        return hasilfinal;
    } else{
        angkasplit = total.toString().split(".");//buang angka dibelakang koma 
        angkasubstr= angkasplit[0].toString().substr(-2); //get 2 angka dari belakang setelah di buang koma
        
        if(angkasubstr == '00'){
            hasil=0;
        } else{
            hasil = pembulatan-parseInt(angkasubstr);
        }
        
        hasilfinal = hasil + parseInt(angkasplit[0]);
        // console.log(hasilfinal);
        return hasilfinal;
        
        console.log(angkasplit[0]);
        console.log(angkasubstr);
        console.log(hasil);
        console.log(hasilfinal);
    }
    
}

function toFormat(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");
}

function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
  
      return false;
    return true;
}

function onCall_listpasien(view, url){
    var param = {
        view  : view,
        url   : url
    }
    
    var data = JSON.stringify(param);
    $('.'+view).load('Rekammedisirna/viewListPasien?data='+data);
}