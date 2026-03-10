{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--<title>laravel webcam capture image and save from camera - ItSolutionStuff.com</title>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />--}}
{{--<style type="text/css">--}}
{{--#results { padding:20px; border:1px solid; background:#ccc; }--}}
{{--</style>--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="container">--}}
{{--<h1 class="text-center">Laravel webcam capture image and save from camera - ItSolutionStuff.com</h1>--}}

{{--<form method="POST" action="{{ route('webcam.capture') }}">--}}
{{--@csrf--}}
{{--<div class="row">--}}
{{--<div class="col-md-6">--}}
{{--<div id="my_camera"></div>--}}
{{--<br/>--}}
{{--<input type=button value="Take Snapshot" onClick="take_snapshot()">--}}
{{--<input type="hidden" name="image" class="image-tag">--}}
{{--</div>--}}
{{--<div class="col-md-6">--}}
{{--<div id="results">Your captured image will appear here...</div>--}}
{{--</div>--}}
{{--<div class="col-md-12 text-center">--}}
{{--<br/>--}}
{{--<button class="btn btn-success">Submit</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--<input type="file" accept=".someext" capture="environment">--}}
    {{--<input type="file" id="file-upload" accept="image/*" capture @change="setImage" />--}}
{{--</form>--}}
{{--</div>--}}

{{--<script language="JavaScript">--}}
{{--Webcam.set({--}}
{{--width: 490,--}}
{{--height: 350,--}}
{{--image_format: 'jpeg',--}}
{{--jpeg_quality: 90--}}
{{--});--}}

{{--Webcam.attach( '#my_camera' );--}}

{{--function take_snapshot() {--}}
{{--Webcam.snap( function(data_uri) {--}}
{{--$(".image-tag").val(data_uri);--}}
{{--document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';--}}
{{--} );--}}
{{--}--}}
{{--</script>--}}

{{--</body>--}}
{{--</html>--}}


{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--<script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js"></script>--}}
{{--<script src="https://raw.githubusercontent.com/mebjas/html5-qrcode/master/minified/html5-qrcode.min.js"></script>--}}
{{--</head>--}}
{{--<body>--}}
{{--<div class="input-group">--}}
{{--<input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Cari Kode Barang/ Barcode">--}}
{{--<div class="input-group-append">--}}
{{--<button class="btn btn-primary" id="btnsearch" type="button">--}}
{{--<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"--}}
{{--width="20" height="20"--}}
{{--viewBox="0 0 50 50"--}}
{{--style=" fill:#000000;"><path d="M 21 3 C 11.621094 3 4 10.621094 4 20 C 4 29.378906 11.621094 37 21 37 C 24.710938 37 28.140625 35.804688 30.9375 33.78125 L 44.09375 46.90625 L 46.90625 44.09375 L 33.90625 31.0625 C 36.460938 28.085938 38 24.222656 38 20 C 38 10.621094 30.378906 3 21 3 Z M 21 5 C 29.296875 5 36 11.703125 36 20 C 36 28.296875 29.296875 35 21 35 C 12.703125 35 6 28.296875 6 20 C 6 11.703125 12.703125 5 21 5 Z"></path></svg>--}}
{{--</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--<script>--}}
{{--const html5QrCode = new Html5Qrcode("qr-reader");--}}
{{--const qrCodeSuccessCallback = (decodedText, decodedResult) => {--}}
{{--/* handle success */--}}
{{--console.log(`Scan result: ${decodedText}`, decodedResult);--}}
{{--document.getElementById('kode').value=decodedText;--}}
{{--// ...--}}
{{--html5QrcodeScanner.clear();--}}
{{--};--}}
{{--const config = { fps: 10, qrbox: 250 };--}}
{{--// Select front camera or fail with `OverconstrainedError`.--}}
{{--// html5QrCode.start({ facingMode: { exact: "environment"} }, config, qrCodeSuccessCallback);--}}
{{--html5QrCode.start({ facingMode: { exact: "environment"} }, config, qrCodeSuccessCallback);--}}
{{--}--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}

{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--<meta charset="UTF-8">--}}
{{--<meta name="viewport"--}}
{{--content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">--}}
{{--<meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}
{{--<link rel="stylesheet" href="style.css">--}}
{{--<title>Document</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<style>--}}
{{--.screenshot-image {--}}
{{--width: 150px;--}}
{{--height: 90px;--}}
{{--border-radius: 4px;--}}
{{--border: 2px solid whitesmoke;--}}
{{--box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.1);--}}
{{--position: absolute;--}}
{{--bottom: 5px;--}}
{{--left: 10px;--}}
{{--background: white;--}}
{{--}--}}

{{--.display-cover {--}}
{{--display: flex;--}}
{{--justify-content: center;--}}
{{--align-items: center;--}}
{{--width: 70%;--}}
{{--margin: 5% auto;--}}
{{--position: relative;--}}
{{--}--}}

{{--video {--}}
{{--width: 100%;--}}
{{--background: rgba(0, 0, 0, 0.2);--}}
{{--}--}}

{{--.video-options {--}}
{{--position: absolute;--}}
{{--left: 20px;--}}
{{--top: 30px;--}}
{{--}--}}

{{--.controls {--}}
{{--position: absolute;--}}
{{--right: 20px;--}}
{{--top: 20px;--}}
{{--display: flex;--}}
{{--}--}}

{{--.controls > button {--}}
{{--width: 45px;--}}
{{--height: 45px;--}}
{{--text-align: center;--}}
{{--border-radius: 100%;--}}
{{--margin: 0 6px;--}}
{{--background: transparent;--}}
{{--}--}}

{{--.controls > button:hover svg {--}}
{{--color: white !important;--}}
{{--}--}}

{{--@media (min-width: 300px) and (max-width: 400px) {--}}
{{--.controls {--}}
{{--flex-direction: column;--}}
{{--}--}}

{{--.controls button {--}}
{{--margin: 5px 0 !important;--}}
{{--}--}}
{{--}--}}

{{--.controls > button > svg {--}}
{{--height: 20px;--}}
{{--width: 18px;--}}
{{--text-align: center;--}}
{{--margin: 0 auto;--}}
{{--padding: 0;--}}
{{--}--}}

{{--.controls button:nth-child(1) {--}}
{{--border: 2px solid #D2002E;--}}
{{--}--}}

{{--.controls button:nth-child(1) svg {--}}
{{--color: #D2002E;--}}
{{--}--}}

{{--.controls button:nth-child(2) {--}}
{{--border: 2px solid #008496;--}}
{{--}--}}

{{--.controls button:nth-child(2) svg {--}}
{{--color: #008496;--}}
{{--}--}}

{{--.controls button:nth-child(3) {--}}
{{--border: 2px solid #00B541;--}}
{{--}--}}

{{--.controls button:nth-child(3) svg {--}}
{{--color: #00B541;--}}
{{--}--}}

{{--.controls > button {--}}
{{--width: 45px;--}}
{{--height: 45px;--}}
{{--text-align: center;--}}
{{--border-radius: 100%;--}}
{{--margin: 0 6px;--}}
{{--background: transparent;--}}
{{--}--}}

{{--.controls > button:hover svg {--}}
{{--color: white;--}}
{{--}--}}
{{--</style>--}}
{{--<div class="display-cover">--}}
{{--<video autoplay></video>--}}
{{--<canvas class="d-none"></canvas>--}}

{{--<div class="video-options">--}}
{{--<select name="" id="" class="custom-select">--}}
{{--<option value="">Select camera</option>--}}
{{--</select>--}}
{{--</div>--}}

{{--<img class="screenshot-image d-none" alt="">--}}

{{--<div class="controls">--}}
{{--<button class="btn btn-danger play" title="Play"><i data-feather="play-circle"></i></button>--}}
{{--<button class="btn btn-info pause d-none" title="Pause"><i data-feather="pause"></i></button>--}}
{{--<button class="btn btn-outline-success screenshot d-none" title="ScreenShot"><i data-feather="image"></i></button>--}}
{{--</div>--}}
{{--</div>--}}

{{--<script src="https://unpkg.com/feather-icons"></script>--}}
{{--<script >--}}
{{--feather.replace();--}}

{{--const controls = document.querySelector('.controls');--}}
{{--const cameraOptions = document.querySelector('.video-options>select');--}}
{{--const video = document.querySelector('video');--}}
{{--const canvas = document.querySelector('canvas');--}}
{{--const screenshotImage = document.querySelector('img');--}}
{{--const buttons = [...controls.querySelectorAll('button')];--}}
{{--let streamStarted = false;--}}

{{--const [play, pause, screenshot] = buttons;--}}

{{--const constraints = {--}}
{{--video: {--}}
{{--width: {--}}
{{--min: 1280,--}}
{{--ideal: 1920,--}}
{{--max: 2560,--}}
{{--},--}}
{{--height: {--}}
{{--min: 720,--}}
{{--ideal: 1080,--}}
{{--max: 1440--}}
{{--},--}}
{{--}--}}
{{--};--}}

{{--cameraOptions.onchange = () => {--}}
{{--const updatedConstraints = {--}}
{{--...constraints,--}}
{{--deviceId: {--}}
{{--exact: cameraOptions.value--}}
{{--}--}}
{{--};--}}

{{--startStream(updatedConstraints);--}}
{{--};--}}

{{--play.onclick = () => {--}}
{{--if (streamStarted) {--}}
{{--video.play();--}}
{{--play.classList.add('d-none');--}}
{{--pause.classList.remove('d-none');--}}
{{--return;--}}
{{--}--}}
{{--if ('mediaDevices' in navigator && navigator.mediaDevices.getUserMedia) {--}}
{{--const updatedConstraints = {--}}
{{--...constraints,--}}
{{--deviceId: {--}}
{{--exact: cameraOptions.value--}}
{{--}--}}
{{--};--}}
{{--startStream(updatedConstraints);--}}
{{--}--}}
{{--};--}}

{{--const pauseStream = () => {--}}
{{--video.pause();--}}
{{--play.classList.remove('d-none');--}}
{{--pause.classList.add('d-none');--}}
{{--};--}}

{{--const doScreenshot = () => {--}}
{{--canvas.width = video.videoWidth;--}}
{{--canvas.height = video.videoHeight;--}}
{{--canvas.getContext('2d').drawImage(video, 0, 0);--}}
{{--screenshotImage.src = canvas.toDataURL('image/webp');--}}
{{--screenshotImage.classList.remove('d-none');--}}
{{--};--}}

{{--pause.onclick = pauseStream;--}}
{{--screenshot.onclick = doScreenshot;--}}

{{--const startStream = async (constraints) => {--}}
{{--const stream = await navigator.mediaDevices.getUserMedia(constraints);--}}
{{--handleStream(stream);--}}
{{--};--}}


{{--const handleStream = (stream) => {--}}
{{--video.srcObject = stream;--}}
{{--play.classList.add('d-none');--}}
{{--pause.classList.remove('d-none');--}}
{{--screenshot.classList.remove('d-none');--}}

{{--};--}}


{{--const getCameraSelection = async () => {--}}
{{--const devices = await navigator.mediaDevices.enumerateDevices();--}}
{{--const videoDevices = devices.filter(device => device.kind === 'videoinput');--}}
{{--const options = videoDevices.map(videoDevice => {--}}
{{--return `<option value="${videoDevice.deviceId}">${videoDevice.label}</option>`;--}}
{{--});--}}
{{--cameraOptions.innerHTML = options.join('');--}}
{{--};--}}

{{--getCameraSelection();--}}
{{--</script>--}}
{{--</body>--}}
{{--</html>--}}


{{--<html>--}}
{{--<head>--}}
{{--<style>--}}
{{--body, input {font-size:14pt}--}}
{{--input, label {vertical-align:middle}--}}
{{--.qrcode-text {padding-right:1.7em; margin-right:0}--}}
{{--.qrcode-text-btn {display:inline-block; background:url('http://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg') 50% 50% no-repeat; height:1em; width:1.7em; margin-left:-1.7em; cursor:pointer}--}}
{{--.qrcode-text-btn > input[type=file] {position:absolute; overflow:hidden; width:1px; height:1px; opacity:0}--}}

{{--</style>--}}
{{--</head>--}}
{{--<body>--}}
{{--<input type=text size=16 placeholder="Tracking Code" class=qrcode-text><label class=qrcode-text-btn><input type=file accept="image/*" capture=environment onclick="return showQRIntro();" onchange="openQRCamera(this);" tabindex=-1></label>--}}
{{--<input type=button value="Go" disabled>--}}
{{--<script href="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>--}}
{{--<script>--}}
{{--const qrcode = window.qrcode;--}}

{{--const video = document.createElement("video");--}}
{{--const canvasElement = document.getElementById("qr-canvas");--}}
{{--const canvas = canvasElement.getContext("2d");--}}

{{--const qrResult = document.getElementById("qr-result");--}}
{{--const outputData = document.getElementById("outputData");--}}
{{--const btnScanQR = document.getElementById("btn-scan-qr");--}}

{{--let scanning = false;--}}

{{--qrcode.callback = res => {--}}
{{--if (res) {--}}
{{--outputData.innerText = res;--}}
{{--scanning = false;--}}

{{--video.srcObject.getTracks().forEach(track => {--}}
{{--track.stop();--}}
{{--});--}}

{{--qrResult.hidden = false;--}}
{{--canvasElement.hidden = true;--}}
{{--btnScanQR.hidden = false;--}}
{{--}--}}
{{--};--}}

{{--btnScanQR.onclick = () => {--}}
{{--navigator.mediaDevices--}}
{{--.getUserMedia({ video: { facingMode: "environment" } })--}}
{{--.then(function(stream) {--}}
{{--scanning = true;--}}
{{--qrResult.hidden = true;--}}
{{--btnScanQR.hidden = true;--}}
{{--canvasElement.hidden = false;--}}
{{--video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen--}}
{{--video.srcObject = stream;--}}
{{--video.play();--}}
{{--tick();--}}
{{--scan();--}}
{{--});--}}
{{--};--}}

{{--function tick() {--}}
{{--canvasElement.height = video.videoHeight;--}}
{{--canvasElement.width = video.videoWidth;--}}
{{--canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);--}}

{{--scanning && requestAnimationFrame(tick);--}}
{{--}--}}

{{--function scan() {--}}
{{--try {--}}
{{--qrcode.decode();--}}
{{--} catch (e) {--}}
{{--setTimeout(scan, 300);--}}
{{--}--}}
{{--}--}}

{{--</script>--}}
{{--</body>--}}
{{--</html>--}}


        {{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
    {{--<title>QR Code Scanner</title>--}}
    {{--<meta charset="UTF-8"/>--}}
    {{--<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>--}}
    {{--<link rel="stylesheet" href="src/styles.css"/>--}}
    {{--<script src="https://rawgit.com/sitepoint-editors/jsqrcode/master/src/qr_packed.js"></script>--}}
{{--</head>--}}

{{--<body>--}}
{{--<style>--}}
    {{--html {--}}
        {{--height: 100%;--}}
    {{--}--}}

    {{--body {--}}
        {{--font-family: sans-serif;--}}
        {{--padding: 0 10px;--}}
        {{--height: 100%;--}}
        {{--background: black;--}}
        {{--margin: 0;--}}
    {{--}--}}

    {{--h1 {--}}
        {{--color: white;--}}
        {{--margin: 0;--}}
        {{--padding: 15px;--}}
    {{--}--}}

    {{--#container {--}}
        {{--text-align: center;--}}
        {{--margin: 0;--}}
    {{--}--}}

    {{--#qr-canvas {--}}
        {{--margin: auto;--}}
        {{--width: calc(100% - 20px);--}}
        {{--max-width: 400px;--}}
    {{--}--}}

    {{--#btn-scan-qr {--}}
        {{--cursor: pointer;--}}
    {{--}--}}

    {{--#btn-scan-qr img {--}}
        {{--height: 10em;--}}
        {{--padding: 15px;--}}
        {{--margin: 15px;--}}
        {{--background: white;--}}
    {{--}--}}

    {{--#qr-result {--}}
        {{--font-size: 1.2em;--}}
        {{--margin: 20px auto;--}}
        {{--padding: 20px;--}}
        {{--max-width: 700px;--}}
        {{--background-color: white;--}}
    {{--}--}}
{{--</style>--}}
{{--<div id="container">--}}
    {{--<h1>QR Code Scanner</h1>--}}
    {{--<a id="btn-scan-qr" onclick="clickme()">--}}
        {{--<img src="https://dab1nmslvvntp.cloudfront.net/wp-content/uploads/2017/07/1499401426qr_icon.svg"/>--}}
    {{--</a>--}}
        {{--<canvas hidden="" id="qr-canvas"></canvas>--}}

        {{--<div id="qr-result" hidden="">--}}
            {{--<b>Data:</b>--}}
            {{--<span id="outputData"></span>--}}
        {{--</div>--}}
{{--</div>--}}

{{--<script>--}}
    {{--const qrcode = window.qrcode;--}}

    {{--const video = document.createElement("video");--}}
    {{--const canvasElement = document.getElementById("qr-canvas");--}}
    {{--const canvas = canvasElement.getContext("2d");--}}

    {{--const qrResult = document.getElementById("qr-result");--}}
    {{--const outputData = document.getElementById("outputData");--}}
    {{--const btnScanQR = document.getElementById("btn-scan-qr");--}}

    {{--let scanning = false;--}}
    {{--function clickme(){--}}
        {{--navigator.mediaDevices--}}
            {{--.getUserMedia({video: {facingMode: "environment"}})--}}
            {{--.then(function (stream) {--}}
                {{--scanning = true;--}}
                {{--qrResult.hidden = true;--}}
                {{--btnScanQR.hidden = true;--}}
                {{--canvasElement.hidden = false;--}}
                {{--video.setAttribute("playsinline", true); // required to tell iOS safari we don't want fullscreen--}}
                {{--video.srcObject = stream;--}}
                {{--video.play();--}}
                {{--tick();--}}
                {{--scan();--}}
            {{--});--}}
    {{--}--}}
    {{--qrcode.callback = res => {--}}
        {{--if (res) {--}}
            {{--outputData.innerText = res;--}}
            {{--scanning = false;--}}

            {{--video.srcObject.getTracks().forEach(track => {--}}
                {{--track.stop();--}}
            {{--});--}}

            {{--qrResult.hidden = false;--}}
            {{--canvasElement.hidden = true;--}}
            {{--btnScanQR.hidden = false;--}}
        {{--}--}}
    {{--};--}}



    {{--function tick() {--}}
        {{--canvasElement.height = video.videoHeight;--}}
        {{--canvasElement.width = video.videoWidth;--}}
        {{--canvas.drawImage(video, 0, 0, canvasElement.width, canvasElement.height);--}}

        {{--scanning && requestAnimationFrame(tick);--}}
    {{--}--}}

    {{--function scan() {--}}
        {{--try {--}}
            {{--qrcode.decode();--}}
        {{--} catch (e) {--}}
            {{--setTimeout(scan, 300);--}}
        {{--}--}}
    {{--}--}}

{{--</script>--}}
{{--</body>--}}
{{--</html>--}}
{{--<device type="media" onchange="update(this.data)"></device>--}}
{{--<video autoplay></video>--}}
{{--<script>--}}
    {{--function update(stream) {--}}
        {{--document.querySelector('video').src = stream.url;--}}
    {{--}--}}
{{--</script>--}}
{{--<script src="https://unpkg.com/dynamsoft-camera-enhancer@2.1.0/dist/dce.js"></script>--}}
{{--<div id="enhancerUIContainer" style="height: 100vh;"></div>--}}
{{--<button id="capture">Capture</button>--}}




{{--<script>--}}
    {{--let enhancer = null;--}}
    {{--(async () => {--}}
        {{--enhancer = await Dynamsoft.DCE.CameraEnhancer.createInstance();--}}
        {{--document.getElementById("enhancerUIContainer").appendChild(enhancer.getUIElement());--}}
        {{--await enhancer.open(true);--}}
    {{--})();--}}
{{--</script>--}}
{{--<script>--}}
    {{--document.getElementById('capture').onclick = () => {--}}
        {{--if (enhancer) {--}}
            {{--let frame = enhancer.getFrame();--}}

            {{--let width = screen.availWidth;--}}
            {{--let height = screen.availHeight;--}}
            {{--let popW = 640, popH = 640;--}}
            {{--let left = (width - popW) / 2;--}}
            {{--let top = (height - popH) / 2;--}}

            {{--popWindow = window.open('', 'popup', 'width=' + popW + ',height=' + popH +--}}
                {{--',top=' + top + ',left=' + left + ', scrollbars=yes');--}}

            {{--popWindow.document.body.appendChild(frame.canvas);--}}
        {{--}--}}
    {{--};--}}
{{--</script>--}}


<script src="https://reeteshghimire.com.np/wp-content/uploads/2021/05/html5-qrcode.min_.js"></script>
<style>
    .result{
        background-color: green;
        color:#fff;
        padding:20px;
    }
    .row{
        display:flex;
    }
</style>
<div class="row">
    <div class="col">
        <div style="width:500px;" id="reader"></div>
    </div>
    <div class="col" style="padding:30px;">
        <h4>SCAN RESULT</h4>
        <div id="result">Result Here</div>
    </div>
</div>
<script type="text/javascript">
    function onScanSuccess(qrCodeMessage) {
        document.getElementById('result').innerHTML = '<span class="result">'+qrCodeMessage+'</span>';
    }
    function onScanError(errorMessage) {
        //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 250 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
</script>