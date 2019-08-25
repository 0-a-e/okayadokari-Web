<?php
$on = "0";
$on = $_GET["onof"];
$pass = $_GET["pass"]; 

$file = '/home/pi/webfan.txt';
chmod( $file, 0777 );
if(!empty($pass)) {

if($pass == "uuparupa555"){

if($on == "on"){

if(file_exists($file)) {

$FANS = "FANは既にONです。";
$erd =  '<script>swal({        title: "😔",        text: "ファンは既にONです。",        icon: "error"    });</script>';

}else{

touch($file);
$erd =  '<script>swal({        title: "😉",        text: "ファンはONになりました。",        icon: "success"    });</script>';
$FANS = "FANがONになりました。(1分前後のタイムラグが発生します。）";
}
if(!empty($on)) {
$FANSTATUS = '<div class="card border-secondary mb-3"><div class="card-header">FAN状態</div><div class="card-content"></br>' . $FANS . '</br></br>' . '</div></div>';
}

}elseif ($on == "off"){

if(file_exists($file)) {
unlink($file);
$erd =  '<script>swal({        title: "😉",        text: "ファンはOFFになりました。",        icon: "success"    });</script>';
$FANS = "FANがOFFになりました。";
}else{
$erd =  '<script>swal({        title: "😔",        text: "ファンは既にOFFです。",        icon: "error"    });</script>';
$FANS = "FANは既にOFFです。(1分前後のタイムラグが発生します。）";
}
if(!empty($on)) {
$FANSTATUS = '<div class="card border-secondary mb-3"><div class="card-header">FAN状態</div><div class="card-content"></br>' . $FANS . '</br></br>' . '</div></div>';

}
}else {
$erd =  '<script>swal({        title: "😔",        text: "ファンの操作に失敗しました。",        icon: "error"    });</script>';
$FANS =  "失敗しました。";
if(!empty($on)) {
$FANSTATUS = '<div class="card border-secondary mb-3"><div class="card-header">FAN状態</div><div class="card-content"></br>' . $FANS . '</br></br>' . '</div></div>';

}

}

//if(!empty($on)) {
//$FANSTATUS = '<div class="card"><h5>FAN状態</h5>' . $FANS . '</br>' . '</div>';
//}

}else{
$erd =  '<script>swal({        title: "😭",        text: "パスワードが間違っているためファンを操作できませんでした。",        icon: "error"    });</script>';
}

}else{
if(!empty($on)){
$erd =  '<script>swal({        title: "😢",        text: "パスワードが空のためファンを操作できませんでした。",        icon: "error"    });</script>';
}
}
 chmod( $file, 0777 );
?>
<head>
<meta charset="utf-8">

<title>オカヤドカリモニター</title>

 <!-- Compiled and minified CSS -->
  
<link rel="stylesheet" href="/bootstrap.min.css">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.7/push.min.js"></script>
<script>navigator.serviceWorker.register('/service-worker.js');</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
          <meta name="viewport" content="width=device-width,initial-scale=1.0">    
<style>
/* * {
text-align: center;
}*/
.center {
display: inline-block;
  width: 100%;

}
.card {
/*width: 80%;*/
text-alig n: center;
border-radius: 20px;
}
#water {
display: inline-block;
/*width: 25%;*/
}
#moisture { 
display: inline-block;   
/*width: 25%;*/
}
#temp { 
display: inline-block;   
/*width: 25%; */
}
.radius1{
  width: 100px;
  height:100px;
  border-radius:100%;
  position:relative;
/*  top:10%;
  left:0%; 
  -webkit-transform:translate(-10%,-50%);
  transform:translate(-10%,-50%);
*/
}
.radius2{
  width: 100px;
  height:100px;
  border-radius:100%;
  position:relative;
 /* top:10%;
  left:40%;
  -webkit-transform:translate(-10%,-50%);
  transform:translate(-10%,-50%);
*/
}
.radius3{
  width: 100px;
  height:100px;
  border-radius:100%;
  position:relative;
/*  top:10%;
  left: 90%;
  -webkit-transform:translate(-10%,-50%);
  transform:translate(-10%,-50%);
*/
}
h1, .h1 { 
  color: #fff;

    font-size: 5.0rem;
}
.radius .border-animation{
  display:block;
  width:100%;
  height:100%;
  position:relative;
  border-radius:100%;
}
.radius .border-animation{
  z-index:1;
}
.ba1{
  opacity: 0.8;
  animation: rounder1 1.5s linear 1.5s infinite alternate;
  background:#204dc9;
}
.rel {
position: relative;

}
.ba2{
  opacity: 0.8;
  animation: rounder1 1.5s linear 1.5s infinite alternate;
  background:#20c980;
}

.ba3{
  opacity: 0.8;
  animation: rounder1 1.5s linear 1.5s infinite alternate;
  background: #ff1100;
}


@keyframes rounder1 {
  from {transform:scale(0.8);}
  to {transform:scale(1);}
}
</style>
</head>
<body>
<!--
-->
 <nav class="navbar navbar-expand-sm navbar-dark mt-3 mb-3" style="background-color: #03a87c;">
<a href="#" class="brand-logo"><img src="./yadoicon.jpg" width="60" style="border-radius: 400px;"></img></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./Webcam.php">ライブカメラ</a>
                </li>
            </ul>
        </div>
    </nav>
<div class="card border-secondary text-white" id="kinkyu">
<div class="card-header"><h2>緊急</h2></div>
<dic class="card-body">
    <div class="" id="kinkyu1"></div>
    <div class="" id="kinkyu2"></div>
    <div class="" id="kinkyu3"></div>
</div>
</div>
</br>
<div class="card border-secondary mb-3">

  <div class="card-header">ステータス</div>
  <div class="card-body" style="text-align: center;">
<div id="temp"></div>
<div id="water"></div>
<div id="moisture"></div>
</div>
</div>

<div class="card border-secondary mb-3">

  <div class="card-header">グラフ</div>
  <div class="card-body">
    <canvas id="ondo1"></canvas>
       <canvas id="mizu1"></canvas>
　　　　　　　　<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
    <script>

console.log(getCSV2());
console.log(getCSV());
function getCSV(){
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "ondolist.csv", true); // アクセスするファイルを指定
    req.send(null); // HTTPリクエストの発行

    req.onload = function(){
	co(req.responseText,1);

  }
}
function getCSV2(){
    var req = new XMLHttpRequest(); // HTTPでファイルを読み込むためのXMLHttpRrequestオブジェクトを生成
    req.open("get", "waterlist.csv", true); // アクセスするファイルを指定
    req.send(null); // HTTPリクエストの発行

    req.onload = function(){
        co(req.responseText,2);

  }
}

function co(txxt,vals){
console.log("1ndCheck:" + txxt);
if(vals == "1"){
 var arr = txxt.split('\n');
  //1次元配列を2次元配列に変換
  var res = [];
  for(var i = 0; i < arr.length; i++){
    //空白行が出てきた時点で終了
    if(arr[i] == '') break;

    //","ごとに配列化
    res[i] = arr[i].split(',');

    for(var i2 = 0; i2 < res[i].length; i2++){
      //数字の場合は「"」を削除
      if(res[i][i2].match(/\-?\d+(.\d+)?(e[\+\-]d+)?/)){
        res[i][i2] = parseFloat(res[i][i2].replace('"', ''));
      }
    }
  }

    console.log("2ndCheck" + res);
    var asd = "[" + res + "]";
    console.log(asd);
    var ctx = document.getElementById("ondo1");
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['３時間半〜４時間前', '３時間〜３時間半前', '２時間半〜３時間前', '１時間半〜２時間前', '１時間〜１時間半前', '３０分〜１時間前', '現在~30分前'],
      datasets: [
        {
          label: '気温(度）',
          data: res,
          borderColor: "#50A97D",
          backgroundColor: "rgba(0,0,0,0)"
        },
      ],
    },
    options: {
      title: {
        display: true,
        text: '温度'
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 40,
            suggestedMin: 0,
            stepSize: 10,
            callback: function(value, index, values){
              return  value +  '度'
            }
          }
        }]
      },
    }
    });
console.log("ASDCHECK" + asd)

}else if (vals == "2"){
 var ar3r = txxt.split('\n');
  //1次元配列を2次元配列に変換
  var sres = [];
  for(var i = 0; i < ar3r.length; i++){
    //空白行が出てきた時点で終了
    if(ar3r[i] == '') break;

    //","ごとに配列化
    sres[i] = ar3r[i].split(',');

    for(var i2 = 0; i2 < sres[i].length; i2++){
      //数字の場合は「"」を削除
      if(sres[i][i2].match(/\-?\d+(.\d+)?(e[\+\-]d+)?/)){
        sres[i][i2] = parseFloat(sres[i][i2].replace('"', ''));
      }
    }
  }
   console.log("2ndCheck" + sres);
    var ctx = document.getElementById("mizu1");
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['３時間半〜４時間前', '３時間〜３時間半前', '２時間半〜３時間前', '１時間半〜２時間前', '１時間〜１時間半前', '３０分〜１時間前', '現在~30分前'],
      datasets: [
    {
      label: '水分数値',
      data: sres,
      borderColor: "rgba(0,0,255,1)",
      backgroundColor: "rgba(0,0,0,0)"
    }
      ],
    },
    options: {
      title: {
        display: true,
        text: '温度'
      },
      scales: {
        yAxes: [{
          ticks: {
            suggestedMax: 40,
            suggestedMin: 0,
            stepSize: 10,
            callback: function(value, index, values){
              return  value +  '度'
            }
          }
        }]
      },
    }
    });
}
}
 </script>
</div>
</div>

<?php echo $FANSTATUS; ?>
<div class="card border-secondary mb-3">
<div class="card-header">状態</div>
    <div class="card-body">
温度クラス:<div id="tempc"></div>
湿度クラス:<div id="waterc"></div>
水分クラス:<div id="moisturec"></div>
温度:<div id="ondo"></div>
湿度:<div id="mz"></div>
土壌水分:<div id="wat"></div>
Arduinoのステータス:<div id="arduinostatus"></div>
最終更新時刻:<div id="latest"></div>
 </div>
</div>
<div class="card  border-secondary mb-3">
<div class="card-header">ファン</div>
<div class="card-content">
<form method="GET">
 <div style="text-align: center;" class="form-group">


<label for="sword">パスワード<input id="sword" type="password" class="form-control" name="pass" style=""></label>

<div class="btn-group btn-group-toggle" data-toggle="buttons">
  <label class="btn btn-primary">
    <input type="radio" name="onof" value="on" id="option1" autocomplete="off" checked=""> ON
  </label>
  <label class="btn btn-primary">
    <input type="radio" name="onof" value="off" id="option2" autocomplete="off"> OFF
  </label>
</div>

</br>
<input name="none" value="ファンの動作状態を変更" type="submit" class="btn btn-primary">
</form>
</div>
</div>
</div>
</br>
<div class="card  border-secondary mb-3">
<div class="card-header">JSONデーター</div>
    <div style="text-align: center;" class="card-content">
</br>
<span id="koko"></span>
    </div>
</br>
</div>
</div>
<script type="text/javascript">
const xhr = new XMLHttpRequest();
var json;

if (! /^http/.test(location.href)) {
//　alert('この環境じゃ動かないです');
 swal({
        title: 'この環境では正常に動作しません。',
        text: 'ブラウザを更新してください',
        icon: 'error'
    });
} else {
　document.getElementById('koko').innerHTML = getFile('./totalog.json');
}

function getFile ( name ) {
　var obj = new XMLHttpRequest();
　var text = null;
　
　if (obj) {
　　obj./*@if(@_jscript) onreadystatechange @else@*/ onload /*@end@*/ = function () {
　　　if (4 == this.readyState) {
　　　　if (200 == this.status) text = this.responseText;
　　　　if (404 == this.status) text = 'Error! No file.';
　　　}
　　};
　　obj.open( 'GET', name, false );
　　obj.send();
　};
　return text;
}

xhr.open('GET', './totalog.json', false); // GETでローカルファイルを開く
          xhr.onload = () => {
              json = xhr.responseText;
          };
          xhr.onerror = () => {
             console.log("en");
          };

         xhr.send();

xhr.open('GET', './chk.json', false); // GETでローカルファイルを開く
          xhr.onload = () => {
              logjson = xhr.responseText;
          };
          xhr.onerror = () => {
             console.log("en");
          };

         xhr.send();

console.log(json);
if(!json){
console.log("JSON IS EMPTY!!!!!")

var options = {
  title: '読み込みエラー',
  icon: "error",
  text: "申し訳ございません。読み込みエラーが発生しました。🔄ボタンを押してリロードしてください。このエラーは連続で発生することがあります。",
  buttons: {
    cancel: "キャンセル", // キャンセルボタン
    ok: "🔄"
  }
};


swal(options)
  // then() メソッドを使えばクリックした時の値が取れます
  .then(function(val) {
    if (val) {
      swal({title: "リロード中...しばらくお待ちください...", icon: "success", button: false});
      setTimeout('location.reload(true)', 0.8*1000);
    } else {
      // キャンセルボタンを押した時の処理
      // valには 'null' が返ってきます
      swal({
        text: "キャンセルされました。このページは正常に動作できません。正常動作に戻す場合、キャッシュを削除してリロードしてください。",
        icon: "warning"
      });
    }
});
}else if(json == '{nOFF'){
console.log("JSON IS EMPTY2!!!!!")

var options = {
  title: '読み込みエラー',
  icon: "error",
  text: "申し訳ございません。読み込みエラーが発生しました。🔄ボタンを押してリロードしてください。このエラーは連続で発生することがあります。",
  buttons: {
    cancel: "キャンセル", // キャンセルボタン
    ok: "🔄"
  }
};


swal(options)
  // then() メソッドを使えばクリックした時の値が取れます
  .then(function(val) {
    if (val) {
      swal({title: "リロード中...しばらくお待ちください...", icon: "success", button: false});
      setTimeout('location.reload(true)', 0.8*1000);
    } else {
      // キャンセルボタンを押した時の処理
      // valには 'null' が返ってきます
      swal({
        text: "キャンセルされました。このページは正常に動作できません。正常動作に戻す場合、キャッシュを削除してリロードしてください。",
        icon: "warning"
      });
    }
});

}else if (json == "{yON"){

console.log("JSON IS EMPTY3!!!!!")

var options = {
  title: '読み込みエラー',
  icon: "error",
  text: "申し訳ございません。読み込みエラーが発生しました。🔄ボタンを押してリロードしてください。このエラーは連続で発生することがあります。",
  buttons: {
    cancel: "キャンセル", // キャンセルボタン
    ok: "🔄"
  }
};


swal(options)
  // then() メソッドを使えばクリックした時の値が取れます
  .then(function(val) {
    if (val) {
      swal({title: "リロード中...しばらくお待ちください...", icon: "success", button: false});
      setTimeout('location.reload(true)', 0.8*1000);
    } else {
      // キャンセルボタンを押した時の処理
      // valには 'null' が返ってきます
      swal({
        text: "キャンセルされました。このページは正常に動作できません。正常動作に戻す場合、キャッシュを削除してリロードしてください。",
        icon: "warning"
      });
    }
});


}else if(json == '{"water": "0" }'){

console.log("JSON IS EMPTY3!!!!!")

var options = {
  title: '読み込みエラー',
  icon: "error",
  text: "申し訳ございません。読み込みエラーが発生しました。🔄ボタンを押してリロードしてください。このエラーは連続で発生することがあります。",
  buttons: {
    cancel: "キャンセル", // キャンセルボタン
    ok: "🔄"
  }
};


swal(options)
  // then() メソッドを使えばクリックした時の値が取れます
  .then(function(val) {
    if (val) {
      swal({title: "リロード中...しばらくお待ちください...", icon: "success", button: false});
      setTimeout('location.reload(true)', 0.8*1000);
    } else {
      // キャンセルボタンを押した時の処理
      // valには 'null' が返ってきます
      swal({
        text: "キャンセルされました。このページは正常に動作できません。正常動作に戻す場合、キャッシュを削除してリロードしてください。",
        icon: "warning"
      });
    }
});
}else{
var njson = JSON.parse(json);
console.log(logjson);
var ljson = JSON.parse(logjson);
console.log(ljson["arduino"]);

if (njson["temp"] == 4) {
document.getElementById('temp').innerHTML = '<div class="radius radius1"><span class="border-animation ba1 white-text"><h1>4</h1></span>温度</div>';
}else if (njson["temp"] == 3) {
document.getElementById('temp').innerHTML = '<div class="radius radius1"><span class="border-animation ba2 white-text"><h1>3</h1></span>温度</div>';
}else if (njson["temp"] <= 2) {
//alert("緊急：急いで確認してください。" + "温度:" + njson["temp"]);
 swal({
        title: '緊急',
        text: '温度が不足しています。' + njson["temp"],
        icon: 'error'
    });
document.querySelector('#kinkyu').classList.add('bg-danger');
document.getElementById('temp').innerHTML = '<div class="radius radius1"><span class="border-animation ba3 white-text"><h1>!</h1></span>温度</div>';
document.getElementById('kinkyu1').innerHTML = "温度が低下、または過度に上昇しています。ステータス:" + njson["temp"] + " 温度:" + njson["Temprature"] + "度";
}


if (njson["water"] == 4) {
document.getElementById('water').innerHTML = '<div class="radius radius2"><span class="border-animation ba1 white-text"><h1>4</h1></span>水分</div>';
}else if (njson["water"] == 3) {
document.getElementById('water').innerHTML = '<div class="radius radius2"><span class="border-animation ba2 white-text"><h1>3</h1></span>水分</div>';
}else if (njson["water"] <= 2) {
document.querySelector('#kinkyu').classList.add('bg-danger');
//alert("緊急：急いで確認してください。" + "水分:" + njson["water"]);
 swal({
        title: '緊急',
        text: '水分が不足しています。' + njson["water"],
        icon: 'error'
    });
document.getElementById('water').innerHTML = '<div class="radius radius2"><span class="border-animation ba3 white-text"><h1>!</h1></span>水分</div>';
document.getElementById('kinkyu2').innerHTML = "水分が過度に不足しています。ステータス:" + njson["water"] + "センサー値:" + njson["watersensor"];
}


if (njson["situdo"] == 4) {
document.getElementById('moisture').innerHTML = '<div class="radius radius3"><span class="border-animation ba1 white-text"><h1>' + njson["situdo"] + '</h1></span>湿度</div>';
}else if (njson["situdo"] == 3) {
document.getElementById('moisture').innerHTML = '<div class="radius radius3"><span class="border-animation ba2 white-text"><h1>3</h1></span>湿度</div>';
}else if (njson["situdo"] <= 2) {
document.getElementById('moisture').innerHTML = '<div class="radius radius3"><span class="border-animation ba3 white-text"><h1>!</h1></span>湿度</div>';
document.querySelector('#kinkyu').classList.add('bg-danger');
//alert("緊急：急いで確認してください。" + "湿度:" + njson["situdo"]);
 swal({
        title: '緊急',
        text: '湿度が不足しています。' + njson["situdo"],
        icon: 'error'
    });
document.getElementById('kinkyu3').innerHTML = "湿度が過度に不足しています。ステータス:" + njson["situdo"] + "センサー値:" + njson["Temprature"];
}
document.getElementById('wat').innerHTML = njson["watersensor"];
document.getElementById('moisturec').innerHTML = njson["water"];
document.getElementById('mz').innerHTML = njson["Humidity"];
document.getElementById('tempc').innerHTML = njson["temp"];
document.getElementById('waterc').innerHTML = njson["situdo"];
document.getElementById('ondo').innerHTML = njson["Temprature"];
document.getElementById('arduinostatus').innerHTML = ljson["arduino"];
document.getElementById('latest').innerHTML = ljson["date"];
}
</script>
<?php echo $erd; ?>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>

